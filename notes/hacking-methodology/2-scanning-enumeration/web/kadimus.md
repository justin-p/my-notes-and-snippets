# kadimus

LFI Scan & Exploit Tool (@hc0d3r - P0cL4bs Team)

## general scan, through burp and save results

```
kadimus -u http://192.168.56.103/?page=login --proxy http://127.0.0.1:8080 --output outputfile
```

## get file

```
kadimus -u http://192.168.56.103/?page=login --parameter page --get-source --filename "login" --proxy http://127.0.0.1:8080
``` 