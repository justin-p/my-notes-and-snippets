# gobuster

## General scan

```bash
./go/bin/gobuster dir -u http://example.com -w /usr/share/wordlists/dirb/common.txt -t 40 -e
```

## Bigger wordlist and extensions

```bash
gobuster dir -u http://example.com -w /usr/share/wordlists/dirbuster/directory-list-2.3-medium.txt -x php,txt,html -t 40 -e
```
