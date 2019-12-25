# Setup SSHD

**Only give access to specific users and groups.** 

With the "AllowUsers" keyword, you are able to tell your server which users are allowed to connect to your server through SSH. To do so, edit the SSHD-configuration file \(`/etc/ssh/sshd_config`\). The same can be done for groups with the "AllowGroups" keyword instead.

An example of a configuration rule with AllowUsers: 

`AllowUsers beheer` 

The example above tells our system that only the user "beheer" is allowed to authenticate using SSH.

**Do not allow the user root to access the server over SSH.**  

The "root" is the a account that has _all_ the permissions on the system, if someone with bad intentions is able to logon with root its game-over.

In the SSH-configuration file there is a options to enable/disable root logon. You will see the following rule/line: `PermitRootLogin value`

Make sure to adjust it to the following: `PermitRootLogin no` 

**Only allow authentication with private keys.** 

To further secure the server we are going to only allow SSH logins on the server with SSH keys. 

```text
PubkeyAuthentication yes
PasswordAuthentication no
```

In order to process the changes made, use the following command: sudo service sshd restart

