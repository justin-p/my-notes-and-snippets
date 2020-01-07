# Gather e-mail addresses

## External services

| Service                          | info                    |
|----------------------------------|-------------------------|
| [hunter.io](https://hunter.io)   | find email addresses    |
| [emailrep](https://emailrep.io/) | get e-mail 'reputation' |

## TheHarvester

### Basic Synatx

```bash
theHarvester -d [domain] -l [depth] -b [search engine name]
```

### Scan domain on google

```bash
theHarvester -d justin-p.me -l 500 -b google
```

### Save results in a HTML and XML file

```bash
theHarvester -d justin-p.me -l 500 -b google -f exportfile
```
