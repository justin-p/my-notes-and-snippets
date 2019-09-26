# cron

## Format

```text
Min  Hour Day  Mon  Weekday  Command
*    *    *    *    *        command to be executed
┬    ┬    ┬    ┬    ┬
│    │    │    │    └─  Weekday  (0=Sun .. 6=Sat)
│    │    │    └──────  Month    (1..12)
│    │    └───────────  Day      (1..31)
│    └────────────────  Hour     (0..23)
└─────────────────────  Minute   (0..59)
```

## Examples

| Example | Description |
| :--- | :--- |
| `0 * * * *` | every hour |
| `*/15 * * * *` | every 15 mins |
| `0 */2 * * *` | every 2 hours |
| `0 0 * * 0` | every Sunday midnight |
| `@reboot` | every reboot |

## Crontab

### Adding tasks easily

```text
echo "@reboot echo hi" | crontab
```

### Open in editor

```text
crontab -e
```

### List tasks

```text
crontab -l [-u user]
```

