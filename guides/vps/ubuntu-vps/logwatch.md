# Logwatch

Updating the package cache and performing updates: sudo apt update && sudo apt upgrade Installing Logwatch: sudo apt install logwatch Configuring Logwatch: sudo vim /usr/share/logwatch/default.conf/logwatch.conf Make sure to have the following parameters set: Output = mail Format = html MailTo = support@domain.tld MailFrom = logwatch@fqdn-van-de-server-hier Range = Today Detail = 10 Service = All Then: sudo vim /usr/share/logwatch/dist.conf/logwatch.conf Make sure to have the following parameters set: MailFrom = logwatch@fqdn-van-de-server-hier Then: sudo vim /etc/postfix/main.cf Make sure to have the following parameters set: mydestination = $myhostname, _FQDN of the server here_, localhost.localdomain, , localhost Testing Logwatch: logwatch --mailto support@domain.tld

It is likely that the e-mails sent from the server are getting blocked by spamfilters. Make sure to have a public A-record for your FQDN. Also check your spam filter and/or configure things like MX, SPF, DKIM and

