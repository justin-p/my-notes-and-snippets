import io
import sys
import os
import string
from PIL import Image, ImageOps
import argparse
from zipfile import ZipFile 

# initiate the parser with a description
parser = argparse.ArgumentParser(description = 'Program that helps solve a CTF challenge. Recursive zips, each zip has a password. Password is morse code embedded in a file')
optional = parser._action_groups.pop()
required = parser.add_argument_group('required arguments')
required.add_argument("-p", "--path", help="fullpath to folder containing files", required=True)
required.add_argument("-z", "--zip-file-name", help="zipfile to unzip", required=True)
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

def printheader():
        print(f"""
Author\t\t: justin-p (https://github.com/justin-p)
Version\t\t: 1.0
Path\t\t: {cmdargs.path}
Zip\t\t: {cmdargs.zip_file_name}
Morse file:\t: {cmdargs.morse_code_file}
Pass\t\t: {cmdargs.inital_password}
Lowercase\t: {cmdargs.lower_case_morse}
""")

def convert_to_binaryimage(file):
    '''
    Ensures our file is in 'binary'. A pixel is either black or white.
    First convert all pixels to only black and white in RGB mode. 
    Then convert to grey scale mode (L).
    This ensures we have a easy on or off state 0 or 255, instead of (0,0,0) and (255,255,255)
    '''
    debugprint('starting convert_to_binaryimage')
    try:
        img = Image.open(file)
        c1,c2 = (list(set(list(img.getdata()))))
        img = img.convert("RGB")
        debugprint(f"update {c1} to (0  , 0  , 0)")
        debugprint(f"update {c2} to (255, 255, 255)")
        pixdata = img.load()
        for y in range(img.size[1]):
            for x in range(img.size[0]):
                if pixdata[x, y] == c1:
                    pixdata[x, y] = (0, 0, 0)
                elif pixdata[x, y] == c2:
                    pixdata[x, y] = (255, 255, 255)
        img = img.convert("L")
        img.save(file.replace(".png","_binary.png"))        
    except ValueError as err:
        errorprint(f"convert_to_binaryimage - {err}")
        sys.exit()

def getMorseInBinary(width,height,img):
    '''
    create a list that contains each line of morse code in our image in a binary format.
    '''
    debugprint('starting getMorseInBinary')
    morse = []
    lineofmorse=""
    for y in range(0, height): 
        c=0
        if cmdargs.debug:
            print("")
        debugprint(f"y {y} ", end = '')
        for x in range(0, width):
            pixelvalue=img.getpixel((x,y))            
            if c > 24:
                c=0
                if cmdargs.debug:
                    print(f"\t{pixelvalue}")
            else:
                if cmdargs.debug:
                    print(f"\t{pixelvalue} ", end = '')
            c=c+1
            if 255 == pixelvalue:
                lineofmorse=lineofmorse+'0'
            elif 0 == pixelvalue:
                lineofmorse=lineofmorse+'1' 
        morse.append(lineofmorse)
        lineofmorse=""
    if cmdargs.debug:
        print("\n")
    debugprint(f"morse list {morse}")
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
    debugprint('starting convertFromBinaryMorse')
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
        debugprint(f"morse : {char}")
        debugprint(f"char : {inverseMorseAlphabet[char]}")
    if lower_case_morse:
        decodeMessage=(decodeMessage.lower())
    verboseprint(f"Message\t: {message}")
    verboseprint(f"Decoded\t: {decodeMessage}")
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
    return password

def unzip(path,zip_file_name,morse_code_file,password,recursive,lower_case_morse):
    with ZipFile((path + zip_file_name), 'r') as zip:
        files = zip.namelist()
        verboseprint(f"Using file\t: {zip_file_name}")

        if recursive == True:
            password=getPasswordFromFile(path,morse_code_file,lower_case_morse)
        password_in_bytes=str.encode(password)

        verboseprint(f"Extracting\t: {', '.join(files)}")
        for file in files:
            zip.setpassword(password_in_bytes)
            try:
                for zip_info in zip.infolist():
                    if zip_info.filename[-1] == '/':
                        continue
                    zip_info.filename = os.path.basename(zip_info.filename)
                    if '.zip' in file:
                        nextzip=file.split('/')[-1]
                    zip.extract(zip_info, path)
            except KeyboardInterrupt:
                print("\n")
                warningprint("Exiting program")
                sys.exit()
            except RuntimeError as err:
                errorprint(f"Could not extract {zip_file_name}")
                errorprint(f"Most likely the password is wrong password.\n    RuntimeError '{err}'")
                sys.exit()
        infoprint(f"Unzipped '{zip_file_name}' using password '{password}'")
        if recursive == True:
            unzip(path,nextzip,morse_code_file,password,recursive,lower_case_morse)
        else:
            return nextzip
        
if __name__ == "__main__":
    printheader()
    nextzip=unzip(cmdargs.path,cmdargs.zip_file_name,cmdargs.morse_code_file,cmdargs.inital_password,False,cmdargs.lower_case_morse)
    try:
        unzip(cmdargs.path,nextzip,cmdargs.morse_code_file,'',True,cmdargs.lower_case_morse)
    except UnboundLocalError:
        infoprint("""Found the flag!
                                   .''.       
       .''.      .        *''*    :_\/_:     . 
      :_\/_:   _\(/_  .:.*_\/_*   : /\ :  .'.:.'.
  .''.: /\ :   ./)\   ':'* /\ * :  '..'.  -=:o:=-
 :_\/_:'.:::.    ' *''*    * '.\'/.' _\(/_'.':'.'
 : /\ : :::::     *_\/_*     -= o =-  /)\    '  *
  '..'  ':::'     * /\ *     .'/.\'.   '
      *            *..*         :
jgs     *
        *
""")