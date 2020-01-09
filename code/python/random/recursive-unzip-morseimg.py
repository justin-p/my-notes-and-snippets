import io
import sys
import os
import string
import imageio
from PIL import Image
import argparse
from zipfile import ZipFile 

# initiate the parser with a description
parser = argparse.ArgumentParser(description = 'Program that helps solve a CTF challange. Recursive zips, each zip has a password. Password is morse code embeded in a file called pwn.png')
optional = parser._action_groups.pop()
required = parser.add_argument_group('required arguments')
required.add_argument("-p", "--path", help="fullpath to folder containing files", required=True)
required.add_argument("-z", "--zipfile", help="zipfile to unzip", required=True)
required.add_argument("-i", "--inital-password", help="initalpassword of the first zip", required=True)
optional.add_argument("-v", "--verbose", help="show verbose", action="store_true")
optional.add_argument("-d", "--debug", help="show debug", action="store_true")
parser._action_groups.append(optional)
cmdargs = parser.parse_args()

def debugprint(*args, **kwargs): 
    '''
    debug print
    '''
    if cmdargs.debug:
        print("[D]", *args, **kwargs)   

def verboseprint(*args, **kwargs): 
    '''
    verbose print function if verbose arg is given
    '''
    if cmdargs.verbose:
        print("[V]", *args, **kwargs) 

def infoprint(*args, **kwargs):
    '''
    info print
    '''
    print("[+]", *args, **kwargs) 

def warningprint(*args, **kwargs):
    '''
    warning print
    '''  
    print("[!]", *args, **kwargs) 

def errorprint(*args, **kwargs): 
    '''
    error print
    '''
    print("[x]", *args, **kwargs) 

def convert_to_grayscale(file):
    '''
    ensures our file is in grey scale. this helps with detecting pixel values as white (255) or black (0).
    '''
    debugprint('starting convert_to_grayscale')
    img = imageio.imread(file, as_gray=True)
    imageio.imwrite((file.replace(".png","_grey.png")), img)

def getMorseInBinary(width,height,img):
    '''
    create a list that contains each line of morse code in our image in a binary format.
    '''
    debugprint('starting getMorseInBinary')
    morse = []
    lineofmorse=""
    for y in range(0, height): 
        for x in range(0, width):
            if 255 == img.getpixel((x,y)):
                lineofmorse=lineofmorse+'0'
            elif 0 == img.getpixel((x,y)):
                lineofmorse=lineofmorse+'1' 
        morse.append(lineofmorse)
        lineofmorse=""
    debugprint(morse)
    return morse

def detectBinaryMorse(morselist):
    '''
    ensure the right on and off values are used
    '''
    debugprint('starting detectBinaryMorse') 
    if '1111111111111111111111111' in morselist:
        debugprint("1111111111111111111111111 mode")
        on='0'
        off='1'
    elif '0000000000000000000000000' in morselist:
        debugprint("0000000000000000000000000 mode")
        on='1'
        off='0'
    return on,off

def convertBinaryMorse(morselist,on,off):
    '''
    replace binary values with morse code
    '''
    morse = []
    debugprint('starting convertMorse')
    debugprint(f'before: \n {morselist}')
    for line in morselist:
        if line != '1111111111111111111111111':
            if line != '0000000000000000000000000':
                line=line.replace((on + on + on),'-').replace(on,'.').replace(off,'')
                morse.append(line)
    debugprint(f'after: \n {morse}')
    return morse


def decodeMorse(message):
    '''
    source https://gist.github.com/dcdeve/3dfba6566029f87b01aa3e38d6e1e26b
    '''
    debugprint('starting decodeMorse')    
    morseAlphabet = {
        "A": ".-",
        "B": "-...",
        "C": "-.-.",
        "D": "-..",
        "E": ".",
        "F": "..-.",
        "G": "--.",
        "H": "....",
        "I": "..",
        "J": ".---",
        "K": "-.-",
        "L": ".-..",
        "M": "--",
        "N": "-.",
        "O": "---",
        "P": ".--.",
        "Q": "--.-",
        "R": ".-.",
        "S": "...",
        "T": "-",
        "U": "..-",
        "V": "...-",
        "W": ".--",
        "X": "-..-",
        "Y": "-.--",
        "Z": "--..",
        " ": "/",
        "1" : ".----",
        "2" : "..---",
        "3" : "...--",
        "4" : "....-",
        "5" : ".....",
        "6" : "-....",
        "7" : "--...",
        "8" : "---..",
        "9" : "----.",
        "0" : "-----",
        ".": ".-.-.-",
        ",": "--..--",
        ":": "---...",
        "?": "..--..",
        "'": ".----.",
        "-": "-....-",
        "/": "-..-.",
        "@": ".--.-.",
        "=": "-...-"
    }

    inverseMorseAlphabet = dict((v, k) for (k, v) in morseAlphabet.items())

    messageSeparated = message.split(' ')
    decodeMessage = ''
    for char in messageSeparated:
        if char in inverseMorseAlphabet:
            decodeMessage += inverseMorseAlphabet[char]
        else:
            # CNF = Character not found
            decodeMessage += '<CNF>'
    return decodeMessage

def getPasswordFromFile(path, filename):
    '''
    function that uses convert_to_grayscale, getMorse and decodeMorse to get the password for the next zip.
    '''
    debugprint('starting getPasswordFromFile')      
    infoprint("Getting password from png")
    convert_to_grayscale(path + filename)
    img = Image.open(path + (filename.replace('.png','_grey.png')))
    width, height = img.size
    binarymorse = getMorseInBinary(width, height, img)
    on,off = detectBinaryMorse(binarymorse)
    morse = convertBinaryMorse(binarymorse, on, off)
    password=""
    for row in morse:
        password = password + decodeMorse(row) 
    return(password)

def unzip(path,zip_file_name,password,recursive):
    with ZipFile((path + zip_file_name), 'r') as zip:
        files = zip.namelist()
        verboseprint(f"found {files}")
        for file in files:
            password_in_bytes=str.encode(password)   
            verboseprint(f"setting password to {password_in_bytes}")
            zip.setpassword(password_in_bytes)
            infoprint(f"extracting {file}")
            try:
                for zip_info in zip.infolist():
                    if zip_info.filename[-1] == '/':
                        continue
                    zip_info.filename = os.path.basename(zip_info.filename)
                    if '.zip' in file:
                        nextzip=file.split('/')[-1]
                        verboseprint(f"next file to extract is {nextzip}")
                    zip.extract(zip_info, path)                    
                    #zip.extract(file)
            except KeyboardInterrupt:
                warningprint("Exiting program")
                sys.exit()
            except RuntimeError as err:
                errorprint(f"RuntimeError: {err}")
                sys.exit()
        if recursive == True:
            password=getPasswordFromFile(path,"pwd.png")
            unzip(path,nextzip,password,True)
        else:
            return nextzip
        

if __name__ == "__main__":
    nextzip=unzip(cmdargs.path,cmdargs.zipfile,cmdargs.inital_password,False)
    password=getPasswordFromFile(cmdargs.path,"pwd.png")
    print(password)
    unzip(cmdargs.path,nextzip,password,True)
