import io
import sys
import os
import string
from PIL import Image
import argparse
from zipfile import ZipFile 

# initiate the parser with a description
parser = argparse.ArgumentParser(description = 'Program that helps solve a CTF challange. Recursive zips, each zip has a password. Password is morse code embeded in a file called pwn.png')
optional = parser._action_groups.pop()
required = parser.add_argument_group('required arguments')
required.add_argument("-p", "--path", help="fullpath to folder containing files", required=True)
required.add_argument("-z", "--zipfile", help="zipfile to unzip", required=True)
required.add_argument("-m", "--morse-code-file", help="filename that contains morse code", required=True)
required.add_argument("-i", "--inital-password", help="initalpassword of the first zip", required=True)
optional.add_argument("-l", "--lower-case-morse", help="transform morse to lower case, default is uppercase", action="store_true")
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

def convert_to_binaryimage(file):
    '''
    ensures our file is in 'binary'. A pixel is either black or white.
    '''
    debugprint('starting convert_to_binaryimage')
    img = Image.open(file).convert('L')
    # get the unique color values from our image
    c1,c2=list(set(list(img.getdata())))
    # convert gray to black and white
    img = img.point(lambda x: 0 if x==c1 else 255, '1')
    img.save(file.replace(".png","_binary.png"))


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

def convertFromBinaryMorse(morselist,on,off):
    '''
    replace binary values with morse code
    '''
    morse = []
    debugprint('starting convertMorse')
    for line in morselist:
        if line != '1111111111111111111111111':
            if line != '0000000000000000000000000':
                linefixed=line.replace((on + on + on),'-').replace(on,'.').replace(off,'')
                morse.append(linefixed)
                debugprint(f'binary : {line}')
                debugprint(f'morse  : {linefixed}')
    morse = " ".join(morse)
    return morse

def decodeMorse(message,lower_case_morse):
    '''
    source https://gist.github.com/dcdeve/3dfba6566029f87b01aa3e38d6e1e26b
    '''
    debugprint('starting decodeMorse')
    if lower_case_morse:
        debugprint('lower_case_morse mode enabled')  
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
            debugprint("Character not found, returning <CNF>")
            decodeMessage += '<CNF>'
    if lower_case_morse:
        decodeMessage=(decodeMessage.lower())
    verboseprint(f"Message : {message}")
    verboseprint(f"Decoded : {decodeMessage}")
    return decodeMessage

def getPasswordFromFile(path, filename, lower_case_morse):
    '''
    function that uses convert_to_grayscale, getMorse and decodeMorse to get the password for the next zip.
    '''
    debugprint('starting getPasswordFromFile')      
    convert_to_binaryimage(path + filename)
    img = Image.open(path + (filename.replace('.png','_binary.png')))
    width, height = img.size
    morseInBinary = getMorseInBinary(width, height, img)
    on,off = detectBinaryMorse(morseInBinary)
    message = convertFromBinaryMorse(morseInBinary, on, off)
    password = decodeMorse(message,lower_case_morse)
    infoprint(f"Decoded password : {password}")
    return password

def unzip(path,zip_file_name,morse_code_file,password,recursive,lower_case_morse):
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
                    zip.extract(zip_info, path)                    
            except KeyboardInterrupt:
                warningprint("Exiting program")
                sys.exit()
            except RuntimeError as err:
                errorprint(f"RuntimeError: {err}")
                sys.exit()
        if recursive == True:
            password=getPasswordFromFile(path,morse_code_file,lower_case_morse)
            unzip(path,nextzip,morse_code_file,password,recursive,lower_case_morse)
        else:
            verboseprint(f"next file to extract is {nextzip}")
            return nextzip
        
if __name__ == "__main__":
    nextzip=unzip(cmdargs.path,cmdargs.zipfile,cmdargs.morse_code_file,cmdargs.inital_password,False,cmdargs.lower_case_morse)
    password=getPasswordFromFile(cmdargs.path,cmdargs.morse_code_file,cmdargs.lower_case_morse)
    unzip(cmdargs.path,nextzip,cmdargs.morse_code_file,password,True,cmdargs.lower_case_morse)