# Fail2Ban

If you ever connected something to the internet you might have noticed that within seconds people are knocking on your ports. To avoid people bruteforcing them self into your server you can setup Fail2Ban. Fail2Ban watches logfiles for incorrect logins and automatically bans IP's.

```bash
sudo apt update && sudo apt upgrade 
sudo apt install fail2ban
## Making the Fail2Ban configuration file. Never edit the file "jail.conf".
sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
## Open "jail.local"
sudo vim /etc/fail2ban/jail.local
## Setup IP exclusions
ignoreip = 127.0.0.1/8 an.ip.address.here another.goes.here.yeah one.for.another.person
## Setup for how long a IP will be banned. -1 for perm bans.
bantime = 21600
```

Restart Fail2Ban with the command: sudo service fail2ban restart

