import os
import sys
import argparse
from zipfile import ZipFile 

# initiate the parser with a description
parser = argparse.ArgumentParser(description = 'This program will recursively unzip zip files.')
optional = parser._action_groups.pop()
required = parser.add_argument_group('required arguments')
required.add_argument("-z", "--zipfile", help="fullpath to zipfile to unzip", required=True)
optional.add_argument("-p", "--password", help="password of zip file")
optional.add_argument("--file-as-password", help="use filename as password for the next zip", action="store_true")
optional.add_argument("-v", "--verbose", help="show verbose", action="store_true")
optional.add_argument("-d", "--debug", help="show debug", action="store_true")
parser._action_groups.append(optional)
cmdargs = parser.parse_args()

# verbose print function if verbose arg is given
def verboseprint(*args, **kwargs): 
    if cmdargs.verbose:
        print("[V]", *args, **kwargs) 
# debug print
def debugprint(*args, **kwargs): 
    if cmdargs.debug:
        print("[D]", *args, **kwargs)     
# info print
def infoprint(*args, **kwargs): 
    print("[+]", *args, **kwargs) 
# warning print
def warningprint(*args, **kwargs): 
    print("[!]", *args, **kwargs) 
# error print
def errorprint(*args, **kwargs): 
    print("[x]", *args, **kwargs) 

def unzip(file_name):
    with ZipFile(file_name, 'r') as zip:
        files = zip.namelist()
        verboseprint(f"found {files}")
        for file in files:
            if cmdargs.password:
                password_in_bytes=str.encode(cmdargs.password)
                verboseprint(f"setting password to {password_in_bytes}")
                zip.setpassword(password_in_bytes)
            elif cmdargs.file_as_password:
                password_in_bytes=str.encode(file.split(".")[0])   
                verboseprint(f"setting password to {password_in_bytes}")
                zip.setpassword(password_in_bytes)
            infoprint(f"extracting {file}")
            try:
                zip.extract(file)
            except KeyboardInterrupt:
                warningprint("Exiting program")
                sys.exit()
            except RuntimeError as err:
                errorprint(f"RuntimeError: {err}")
                sys.exit()
        unzip(file)

if __name__ == "__main__":
    unzip(cmdargs.zipfile)