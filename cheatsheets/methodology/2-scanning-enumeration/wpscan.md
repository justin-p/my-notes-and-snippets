# wpscan

## General scan (mostly passive)

get all vuln plugins/themes, get Timthumbs, config backups, Medias and users

`wpscan --url https://192.168.56.101:12380/blogblog/ --disable-tls-checks --enumerate vp,vt,tt,cb,dbe,u,m`

## General scan + WPVulnDB API

`wpscan --url https://192.168.56.101:12380/blogblog/ --disable-tls-checks --enumerate vp,vt,tt,cb,dbe,u,m --api-token TOKEN `

## Aggressive scan + WPVulnDB API (go ham)

`wpscan --url https://192.168.56.101:12380/blogblog/ --disable-tls-checks --enumerate ap,at,tt,cb,dbe,u,m --detection-mode aggressive --plugins-detection aggressive --plugins-version-detection aggressive --api-token TOKEN`
