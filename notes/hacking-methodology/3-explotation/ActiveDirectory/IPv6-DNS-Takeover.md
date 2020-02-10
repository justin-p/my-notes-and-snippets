# IPv6-DNS-Takeover

Windows prefers IPv6 over IPv4. This enables us to perform a DNS takeover using mitm6 if IPv6 is not already in use in the network. When this attack is performed, it is also possible to make computer accounts and users authenticate to us over HTTP by spoofing the WPAD location and requesting authentication to use our rogue proxy.

## Attacking

Combine with [mitm6](https://github.com/fox-it/mitm6) + [ntlmrelayx](https://github.com/SecureAuthCorp/impacket) + ([getSP.py](https://github.com/SecureAuthCorp/impacket) + ) [secretsdump.py](https://github.com/SecureAuthCorp/impacket)

## Defense

### Mitigating mitm6

mitm6 abuses the fact that Windows queries for an IPv6 address even in IPv4-only environments. If you don't use IPv6 internally, the safest way to prevent mitm6 is to block DHCPv6 traffic and incoming router advertisements in Windows Firewall via Group Policy. Disabling IPv6 entirely may have unwanted side effects. Setting the following predefined rules to Block instead of Allow prevents the attack from working:

- (Inbound) Core Networking - Dynamic Host Configuration Protocol for IPv6(DHCPV6-In)
- (Inbound) Core Networking - Router Advertisement (ICMPv6-In)
- (Outbound) Core Networking - Dynamic Host Configuration Protocol for IPv6(DHCPV6-Out)

### Mitigating WPAD abuse

If WPAD is not in use internally, disable it via Group Policy and by disabling the WinHttpAutoProxySvc service.

### Mitigating relaying to LDAP

Relaying to LDAP and LDAPS can only be mitigated by enabling both LDAP signing and [LDAP channel binding.](https://support.microsoft.com/en-us/help/4034879/how-to-add-the-ldapenforcechannelbinding-registry-entry)

### Protected users

Consider adding Administrative users to the Protected Users group or marking them as 'Account is sensitive and cannot be delegated', which will prevent any impersonation of that user via delegation.
