# hashcat

## basic wordlist

Attack NTLM hashes using wordlist, enable custom kernels (limits lenght of pass to 27, better speed), use workload 3 and save in cracked_hashes

```
hashcat -a 0 -m 1000 -O -w 3 hashfile wordlist -o cracked_hashes
```

## wordlist + rulelist

```
hashcat -a 0 -m 1000 -O -w 3 hashfile wordlist -o cracked_hashes -r rule
```

### one-rule-to-rule-them-all

https://www.notsosecure.com/one-rule-to-rule-them-all/  
https://github.com/NotSoSecure/password_cracking_rules  

## bruteforcing 

```
predefined charsets
?l = abcdefghijklmnopqrstuvwxyz
?u = ABCDEFGHIJKLMNOPQRSTUVWXYZ
?d = 0123456789
?s = «space»!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~
?a = ?l?u?d?s
?b = 0x00 - 0xff
```

?l?d?u is the same as:  
?ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789  
  
### Brute force all passwords length 1-8 with possible characters A-Z a-z 0-9   

`hashcat64 -m 500 hashes.txt -a  3  ?1?1?1?1?1?1?1?1 --increment -1 ?l?d?u`  

## username:hash format

hashfile

```
user:b4b9b02e6f09a9bd760f388b67351e2b
```

command

```
hashcat64.exe -a 0 -m 1000 -O hashfile wordlist -o cracked_hashes --username
```

### show username:hash:password

ones cracked use --show --username to show username:hash:password (it uses the potfile for this).

```
hashcat -m 1000 hashfile --show --username

user:b4b9b02e6f09a9bd760f388b67351e2b:hashcat
```

### output username:hash:password

output to file in format

```
hashcat -m 1000 hashfile --show --username -o user_hash_pass

user:b4b9b02e6f09a9bd760f388b67351e2b:hashcat
```

## [PRINCE Password Generation](https://github.com/hashcat/princeprocessor)

PRINCE (PRobability INfinite Chained Elements) is a hashcat utility for randomly generating probable passwords:

```
pp64.bin --pw-min=8 < dict.txt | head -20 shuf dict.txt | pp64.bin --pw-min=8 | head -20
```

## [Purple Rain](https://www.netmux.com/blog/purple-rain-attack)

Purple Rain attack uses a combination of Prince, a dictionary and random Mutation rules to dynamicaly create infinite combinations of passwords.

```
shuf dict.txt | pp64.bin --pw-min=8 | hashcat -a 0 -m 1000 -w 3 -O hashes.txt -g 300000
```
