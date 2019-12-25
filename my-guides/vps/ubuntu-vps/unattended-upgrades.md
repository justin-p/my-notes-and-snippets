# Unattended upgrades

Updates are importent. But where all lazy, so lets automate some of the process. To ensure our server always has the latest importent security updates we can use Unattended upgrades. Normally this is installed by default, but some hosting providers might use custom images. 

### **Install unattedned-upgrades**

```text
sudo apt-get install unattended-upgrades
sudo dpkg-reconfigure -plow unattended-upgrades
sudo vim /etc/apt/apt.conf.d/50unattended-upgrades
```

### **Configure unattended-upgrades**

#### **Auto reboot**

Some updates require a restart after installing, one of these things are new kernel updates. If you don't reboot the server it will not load the new kernel. To ensure where running on the latest version we can configure unattended-upgrades to auto reboot at a specifc time.

```text
// Automatically reboot *WITHOUT CONFIRMATION*
//  if the file /var/run/reboot-required is found after the upgrade
Unattended-Upgrade::Automatic-Reboot "true";

// If automatic reboot is enabled and needed, reboot at the specific
// time instead of immediately
//  Default: "now"
Unattended-Upgrade::Automatic-Reboot-Time "04:00";
```

#### Mail

The file "50unattended-upgrades" can be manually adjusted to send mails if unattended upgrades fail on the server. 

```text
// Send email to this address for problems or packages upgrades
// If empty or unset then no email is sent, make sure that you
// have a working mail setup on your system. A package that provides
// 'mailx' must be installed. E.g. "user@example.com"
Unattended-Upgrade::Mail "user@example.com";

// Set this value to "true" to get emails only on errors. Default
// is to always send a mail if Unattended-Upgrade::Mail is set
Unattended-Upgrade::MailOnlyOnError "true";
```

It is likely that the e-mails sent from the server are getting blocked by spamfilters. Make sure to have a public A-record for your FQDN. Also check your spam filter and/or configure things like MX, SPF, DKIM and DMARC.

