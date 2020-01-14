#!/usr/bin/env python3

import os
import sys
import pathlib
import argparse
import nmap
import socket
import subprocess


def verboseprint(*args, **kwargs): 
    # verbose print function if verbose arg is given
    if cmdargs.verbose:
        print("[V]", *args, **kwargs) 

def debugprint(*args, **kwargs): 
    # debug print
    if cmdargs.debug:
        print("[D]", *args, **kwargs)     

def infoprint(*args, **kwargs): 
    # info print
    print("[+]", *args, **kwargs) 

def warningprint(*args, **kwargs): 
    # warning print
    print("[!]", *args, **kwargs) 

def errorprint(*args, **kwargs): 
    # error print
    print("[x]", *args, **kwargs) 

def SetupFolderStructure(output_folder):
    """
    setup folder structure
    """
    folderpaths = ["/scans","/web","/loot"]
    for path in folderpaths:
        folder = pathlib.Path(output_folder + path).absolute()
        infoprint(f"Creating {folder}")
        folder.mkdir(parents=True, exist_ok=True)
    filepaths = ["README.md"]
    for file in filepaths:
        f = open(file,'w+')
        f.close()

def NmapScanner(ip, scantype):
    try:
        nm = nmap.PortScanner()
    except:
        errorprint('Unable to find nmap, exiting program.')
        sys.exit()
    if scantype == 'simple-udp':
        scanArgs = '-sU -T4 -oN scans/simple_udp.nmap -oG scans/simple_udp.nmap'
    elif scantype == 'simple-tcp':
        scanArgs = '-sS -T4 -p80 -oN scans/simple_tcp.nmap -oG scans/simple_tcp.nmap'
    elif scantype == 'full-tcp':
        scanArgs = '-A -T4 -p- -oN scans/full_tcp.nmap -oG scans/full_tcp.nmap'
    infoprint(f'Running a {scantype} ({scanArgs}) scan against {ip}')
    if scanArgs is None:
        nm.scan(ip)
    else:
        nm.scan(ip, arguments=scanArgs)
    return nm

def TCPServicesScan(ip):
    nmapresults = NmapScanner(ip,'full-tcp')    

    if True == nmapresults[ip].has_tcp(80):
        infoprint("Port 80 is open.")
        NiktoScanner(ip,output_folder)
        GobusterScanner(ip,output_folder)

def UDPServicesScan(ip):
    NmapScanner(ip,'simple-udp')

def NiktoScanner(host,output_folder):
    infoprint("Running nikto")
    cmd = ["/usr/bin/nikto", "-host", host,"-output", (output_folder + "/scans/nikto.txt")]
    FNULL = open(os.devnull, 'w')
    subprocess.Popen(cmd, stdout=FNULL).wait()

def GobusterScanner(host,output_folder):
    infoprint("Running gobuster")
    pass

def main(ip,output_folder):
    ## set output_folder to current folder if its currently set to 'False'
    if not output_folder:
        output_folder = str(pathlib.Path.cwd())
    else:
        output_folder = output_folder
        path = pathlib.Path(output_folder)
        if path.exists() == False:
            errorprint(f"Could not find path {output_folder}")
            sys.exit()
    SetupFolderStructure(output_folder)
    
    ## make this run in parallel 
    TCPServicesScan(ip)
    UDPServicesScan(ip)
    ## make this run in parallel 


if __name__ == '__main__':
    ## initiate the parser with a description
    parser = argparse.ArgumentParser(description = 'Basic enumeration automation for CTFs/HTB/Boot2Root/etc')
    optional = parser._action_groups.pop()
    required = parser.add_argument_group('required arguments')
    required.add_argument("-i", "--ip", help="ip to scan", required=True)
    optional.add_argument("-o", "--output-folder", help="output folder",default=False)
    optional.add_argument("-v", "--verbose", help="show verbose", action="store_true")
    optional.add_argument("-d", "--debug", help="show debug", action="store_true")

    parser._action_groups.append(optional)
    cmdargs = parser.parse_args()
    # if a hostname was supplied, transform it to a ip
    ip = socket.gethostbyname(cmdargs.ip)
    main(ip,cmdargs.output_folder)