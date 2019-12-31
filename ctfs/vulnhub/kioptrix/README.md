# Kioptrix

## Level 1

### Enum

| Time                        | Proto | port    | Service/URL                        | Other |
|-----------------------------|-------|---------|------------------------------------|-------|
| 2019-12-29 23:00 (GMT+1)    | TCP   | 22      | SSH                                | OpenSSH 2.9p2 (protocol 1.99) <br> ssh-hostkey 1024 <br> Server supports SSHv1 <br> old key exchange / ciphers : DH SHA1/AES128-CBC|
| 2019-12-29 23:00 (GMT+1)    | TCP   | 80      | HTTP                               | Apache httpd 1.3.20 <br> Unix Red-Hat/Linux <br> mod_ssl/2.8.4 <br> OpenSSL/0.9.6b <br> Potentially risky methods: TRACE <br> HTTP-Title: Test Page for the Apache Web Server on Red Hat Linux
| 2019-12-29 23:00 (GMT+1)    | TCP   | 111     | rpcbind                            | 2 (RPC #100000) |
| 2019-12-29 23:00 (GMT+1)    | TCP   | 139     | netbios-ssn                        | Samba smbd 2.2.1a <br> workgroup MYGROUP <br> ADMIN$ no anon access <br> IPC$ no anon access |
| 2019-12-29 23:00 (GMT+1)    | TCP   | 443     | HTTPS                              | Apache/1.3.20 <br> Unix Red-Hat/Linux <br> mod_ssl/2.8.4 <br> OpenSSL/0.9.6b <br> SSLv2 <br> |
| 2019-12-29 23:00 (GMT+1)    | TCP   | 32768   | RPCstatus                          | 1 (RPC #100024) | 

#### TCP

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

#### UDP

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

#### 192.168.88.129 - 80/443

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

##### Nikto

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

##### dirbuster

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

##### gobuster

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

#### 192.168.88.129 - 111/139

| Time                | command/module                       | Finding                    |
|---------------------|--------------------------------------|----------------------------|
| 2019-12-31 13:22:06 | auxiliary(scanner/smb/smb_version)   | Samba 2.2.1a               |
| 2019-12-31 13:35:59 | nmap/smbclient                       | NetBIOS <br> KIOPTRIX      |
| 2019-12-31 13:35:59 | nmap/smbclient                       | workgroup <br> MYGROUP     |
| 2019-12-31 13:35:59 | smbclient                            | ADMIN$ <br>  no anon acces |
| 2019-12-31 13:35:59 | smbclient                            | IPC$ <br> no anon acces    |

##### MSF

```bash
msf5 auxiliary(scanner/smb/smb_version)
```

```bash
[*] 192.168.88.129:139    - Host could not be identified: Unix (Samba 2.2.1a)
[*] 192.168.88.129:445    - Scanned 1 of 1 hosts (100% complete)
[*] Auxiliary module execution completed
```

##### smbclient

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

#### 192.168.88.129 - 22

| Time                | command/module                       | Finding       |
|---------------------|--------------------------------------|---------------|
| 2019-12-31 13:22:06 | nmap                                 | OpenSSH 2.9p2 |
| 2019-12-31 13:44:47 | ssh                                  | old key exchange / ciphers <br> DH SHA1/AES128-CBC|

##### SSH

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
