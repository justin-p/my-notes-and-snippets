# nc

[source](https://gist.githubusercontent.com/cmbaughman/c91f41ba7b2cf71106f1/raw/1d6e35f72817a81d0160517600c8a895217dd924/nc.md)

Netcat listening on port 567/TCP

```text
nc -l -p 567
```

Connecting to that port from another machine

```text
nc 1.2.3.4 5676
```

To pipe a text file to the listener

```text
cat infile | nc 1.2.3.4 567 -q 10
```

To have the listener save a received text file

```text
nc -l -p 567 > textfile
```

To transfer a directory, first at the receiving end set up

```text
nc -l -p 678 | tar xvfpz
```

Then send the directory

```text
tar zcfp - /path/to/directory | nc -w 3 1.2.3.4 678
```

To send a message to your syslog server \(the means emerg\)

```text
"echo '<0>message' | nc -w 1 -u syslogger 514"
```

Setting up a remote shell listener

```text
nc -v -e '/bin/bash' -l -p 1234 -t
or
nc l p 1234 e "c\windows\system32\cmd.exe"
```

Then telnet to port 1234 from elsewhere to get the shell.

Using netcat to make an HTTP request

```text
echo -e "GET http//www.google.com HTTP/1.0nn" | nc -w 5 www.google.com 80
```

Making a one-page webserver; this will feed homepage.txt to all comers.

```text
cat homepage.txt | nc -v -l -p 80
```

