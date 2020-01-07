# Gather credentials

## External services

| Service                                            | info                                     |
|----------------------------------------------------|------------------------------------------|
| [weleakinfo](https://weleakinfo.com)               | Data Breach Search Engine                |
| [scylla.sh](https://scylla.sh)                     | db dumps and more (Search Engine)        |
| [hashes.org](https://hashes.org)                   | lookup hashes, leaks etc                 |
| [OnlineHashCrack](https://www.onlinehashcrack.com) | free online hash crack                   |

## BreachCompilation

`magnet:?xt=urn:btih:7ffbcd8cee06aba2ce6561688cf68ce2addca0a3&dn=BreachCompilation&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Ftracker.leechers-paradise.org%3A6969&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fglotorrents.pw%3A6969&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337`

## [breach-parse](https://github.com/hmaverickadams/breach-parse)

`./breach-parse.sh [@domain.tld] [output filename] "[output location]"`

## [h8mail](https://github.com/khast3x/h8mail)

### Query for a single target

```bash
$ h8mail -t target@example.com
```

### Query for list of targets, indicate config file for API keys, output to `pwned_targets.csv`

```bash
$ h8mail -t targets.txt -c config.ini -o pwned_targets.csv
```

### Query a list of targets without making API calls against local copy of the Breach Compilation

```bash
$ h8mail -t targets.txt -bc ../Downloads/BreachCompilation/ -sk
```

### Search every .gz file for targets found in targets.txt locally

```bash
$ h8mail -t targets.txt -gz /tmp/Collection1/ -sk
```