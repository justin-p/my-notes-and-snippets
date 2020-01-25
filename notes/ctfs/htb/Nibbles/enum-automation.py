#!/usr/bin/env python3

import os
import sys
import pathlib
import argparse
import nmap
import socket
import subprocess
import threading

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

def NmapScanner(ip, scantype, output_folder):
    try:
        nm = nmap.PortScanner()
    except:
        errorprint('Unable to find nmap, exiting program.')
        sys.exit()
    if scantype == 'udp':
        scanArgs = str('-sU -T4 -oN ' + output_folder + '/scans/simple_udp.nmap -oG ' + output_folder + '/scans/simple_udp.gnmap')
    elif scantype == 'quick-tcp':
        scanArgs = str('-A -T4 -oN ' + output_folder + '/scans/simple_tcp.nmap -oG ' + output_folder + '/scans/simple_tcp.gnmap')
    elif scantype == 'full-tcp':
        scanArgs = str('-A -T4 -p- -oN ' + output_folder + '/scans/full_tcp.nmap -oG ' + output_folder + '/scans/full_tcp.gnmap')
    if scanArgs is None:
        infoprint(f'Running a default scan against {ip}')                
        nm.scan(ip)
        infoprint(f'Default scan against {ip} finished!')
    else:
        infoprint(f'Running a {scantype} ({scanArgs}) scan against {ip}')        
        nm.scan(ip, arguments=scanArgs)
        infoprint(f'{scantype} scan against {ip} finished!')
    return nm

def FullTCPScan(ip,output_folder):
    NmapScanner(ip,'full-tcp',output_folder)

def UDPScan(ip,output_folder):
    NmapScanner(ip,'udp',output_folder)

def QuickTCPAndServicesScan(ip,output_folder):
    nmapresults = NmapScanner(ip,'quick-tcp',output_folder)    

    if True == nmapresults[ip].has_tcp(80):
        infoprint("Port 80 is open.")
        NiktoScanner(ip,output_folder)
        GobusterScanner(ip,output_folder)

def NiktoScanner(ip,output_folder):
    cmd = ["/usr/bin/nikto", "-host", ("http://" + ip + "/"),"-output", (output_folder + "/scans/nikto.txt")]
    infoprint(f"Running Nikto ({cmd})")
    subprocess.Popen(cmd).wait()
    infoprint(f"Nikto scan against {ip} finished!")

def GobusterScanner(ip,output_folder):
    cmd = ["/root/go/bin/gobuster", "dir"," ", "-w", "/usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt", "-x", "txt,html", "-t", "20", "-e", " ","-u", ("http://" + ip + "/"), "-o", (output_folder + "/scans/gobuster_dir_med-txt-html.txt")]
    infoprint(f"Running gobuster ({cmd})")
    #FNULL = open(os.devnull, 'w')
    subprocess.Popen(cmd).wait()#, stdout=FNULL).wait()
    infoprint(f"Running gobuster scan against {ip} finished!")

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
    
    threading.Thread(target=QuickTCPAndServicesScan, args=(ip,output_folder)).start()
    threading.Thread(target=FullTCPScan, args=(ip,output_folder)).start()
    threading.Thread(target=UDPScan, args=(ip,output_folder)).start()

if __name__ == '__main__':
    ## initiate the parser with a description
    parser = argparse.ArgumentParser(description = 'Basic enumeration automation for CTFs/HTB/Boot2Root/etc')
    optional = parser._action_groups.pop()
    required = parser.add_argument_group('required arguments')
    required.add_argument("-ip", "--ip", help="ip to scan", required=True)
    optional.add_argument("-o", "--output-folder", help="output folder",default=False)
    optional.add_argument("-v", "--verbose", help="show verbose", action="store_true")
    optional.add_argument("-d", "--debug", help="show debug", action="store_true")

    parser._action_groups.append(optional)
    cmdargs = parser.parse_args()
    # if a hostname was supplied, transform it to a ip
    ip = socket.gethostbyname(cmdargs.ip)
    main(ip,cmdargs.output_folder)