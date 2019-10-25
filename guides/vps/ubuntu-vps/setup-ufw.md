# Setup UFW

UFW stands for uncomplicated firewall. UFW acctully is not a firewall itself, instead it is a configuration program for iptables. More information on UFW and on how to use it can be found on the following pages:

* [https://www.digitalocean.com/community/tutorials/ufw-essentials-common-firewall-rules-and-commands](https://www.digitalocean.com/community/tutorials/ufw-essentials-common-firewall-rules-and-commands)
* [https://www.digitalocean.com/community/tutorials/how-to-setup-a-firewall-with-ufw-on-an-ubuntu-and-debian-cloud-server](https://www.digitalocean.com/community/tutorials/how-to-setup-a-firewall-with-ufw-on-an-ubuntu-and-debian-cloud-server)
* [https://www.cyberciti.biz/faq/howto-configure-setup-firewall-with-ufw-on-ubuntu-linux/](https://www.cyberciti.biz/faq/howto-configure-setup-firewall-with-ufw-on-ubuntu-linux/) \(advanced UFW setups\)

First of all, make sure that UFW is installed on the server with the following command: `sudo apt install ufw`

In the most cases firewalls are configured to block all incoming traffic and allow all outgoing traffic by default. If this is your first time i'd recommend configuring it like described above. Todo this run the following 2 commands:

`sudo ufw default deny incoming`

`sudo ufw default allow outgoing`

Now that we blocked all incoming traffic we should ensure where still able to manage this machine after enabling the firewall. So make sure that SSH traffic is allowed in. In most cases, HTTP and HTTPS traffic is crucial as well. You can allow these 3 by running the commands below.

`sudo ufw allow ssh`

`sudo ufw allow http`

`sudo ufw allow https`

Now we need to make sure we enable the firewall. Todo this run `sudo ufw enable`

Afterwords you can check your config by running `sudo ufw status verbose`

