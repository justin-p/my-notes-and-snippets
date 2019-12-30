# nmap

## General scan

```bash
nmap -T4 -A -oA outputfolder 10.10.10.10
```

## Scan for all TCP ports

```bash
nmap -T4 -p- -A 10.10.10.10
```

## General UDP scan

```bash
nmap -T4 -p -sU 10.10.10.10
```