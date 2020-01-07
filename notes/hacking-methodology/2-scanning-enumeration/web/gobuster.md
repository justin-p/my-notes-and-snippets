# gobuster

## General scan

```bash
./go/bin/gobuster dir -u http://example.com -w /usr/share/wordlists/dirb/common.txt -t 40 -e
```

## Bigger wordlist and extensions

```bash
gobuster dir -u http://example.com -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,txt,html,sql -t 40 -e
```

## run trough burpsuite

```
~/go/bin/gobuster dir -u http://192.168.56.101:12380 -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,sql,html,txt  -t 40 -e -p http://127.0.0.1:8080
```