# Subdomain gathering

## External services

| Service                                            | info                                            |
|----------------------------------------------------|-------------------------------------------------|
| [dnsdumpster](https://dnsdumpster.com/)            | dns recon & research, find & lookup dns records |
| [cert.sh](https://cert.sh)                         | Certficate fingerprint search engine            |

## [PSDNSDumpsterAPI](https://github.com/justin-p/PSDNSDumpsterAPI)

### Return the results from dnsdumpster as a PSObject.

``` 
$DomainInfo=Invoke-PSDnsDumpsterAPI -Domains 'justin-p.me'
```

## [sublist3r](https://github.com/aboul3la/Sublist3r)

### Enumerate subdomains of specific domain

```bash
sublist3r -d example.com
```

### Show only subdomains which have ports 80 and 443 open

```bash
sublist3r -d example.com -p 80,443
```

### Save results in txt file

```bash
sublist3r -d example.com -o ~/output/file.txt
```

## [OWASP Amass](https://github.com/OWASP/Amass/blob/master/doc/user_guide.md)

### The most basic use of the tool for subdomain enumeration

```bash
amass enum -d example.com
```

### Typical parameters for DNS enumeration

```bash
amass enum -v -src -ip -brute -min-for-recursive 2 -d example.com
```
