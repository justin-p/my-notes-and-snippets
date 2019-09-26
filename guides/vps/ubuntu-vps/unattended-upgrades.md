# Unattended upgrades

The file "50unattended-upgrades" can be manually adjusted to send mails if unattended upgrades fail on the server. sudo vim /etc/apt/apt.conf.d/50unattended-upgrades Next, change the line: //Unattended-Upgrade::Mail "root"; To: Unattended-Upgrade::Mail "support@domain.tld"; And change the line: //Unattended-Upgrade::MailOnlyOnError "true"; To: Unattended-Upgrade::MailOnlyOnError "true";

