# smblcient

## protocol negotiation failed: NT_STATUS_IO_TIMEOUT

```bash
Resolution: On Kali, edit /etc/samba/smb.conf

Add the following under global:
   client min protocol = CORE
   client max protocol = SMB3
```

## list

```bash
smbclient -L \\\\10.10.10.10\\
```