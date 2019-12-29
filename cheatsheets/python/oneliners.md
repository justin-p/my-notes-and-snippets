# Python Oneliners

## HTTP

Start a webserver that hosts the current pwd.

| Python2                         | Python3                     |
|---------------------------------|-----------------------------|
| Python -m SimpleHTTPServer 8000 | Python3 -m http.server 8000 |

## FTP

Start a ftp that hosts the current pwd.

| Python2                         | Python3                     |
|---------------------------------|-----------------------------|
| Python -m pyftpdlib             | Python3 -m pyftpdlib        |

## unicode character

Print a unicode character

| Python2                         | Python3                      |
|---------------------------------|------------------------------|
| Python -c "print unichr(234)"   | Python3 -c "print(chr(234))" |
