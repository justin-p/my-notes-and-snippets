# masscan

## scan all ports

```bash	
masscan 10.11.0.0/16
```

## scan port range

```bash
masscan 10.11.0.0/16 -p22-25 --rate 1000
```

## Scan 'n' Number of nmap‘s Top Ports

```bash
masscan 10.11.0.0/16 ‐‐top-ports 100 --rate 1000
```

## Output to file

```bash
-oX filename: Output to filename in XML.
-oG filename: Output to filename in Grepable format.
-oJ filename: Output to filename in JSON format.
```
