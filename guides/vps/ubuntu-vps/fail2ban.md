# Fail2Ban

Updating the package cache and performing updates: sudo apt update && sudo apt upgrade Installing Fail2Ban: sudo apt install fail2ban Making the Fail2Ban configuration file. Never edit the file "jail.conf". sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local Open "jail.local": sudo vim /etc/fail2ban/jail.local Setting the Fail2Ban ban time: - Replace the value of the ban time to "-1". Configuring the e-mail settings of Fail2Ban: Set the "destemail" parameter in jail.local to "support@domain.tld" Set the "sender" parameter in jail.local to "fail2ban@fqdn-of-the-server-here" 

It is likely that the e-mails sent from the server are getting blocked by spamfilters. Make sure to have a public A-record for your FQDN. Also check your spam filter and/or configure things like MX, SPF, DKIM and DMARC.

Restart Fail2Ban with the command: sudo service fail2ban restart

