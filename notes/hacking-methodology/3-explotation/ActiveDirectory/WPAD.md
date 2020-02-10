# WPAD

Windows can use a upstream proxy. To make configuring this proxy easier WPAD can be used. Web Proxy Auto-Discovery Protocol (WPAD) is a method used by clients to locate the URL of a configuration file using DHCP and/or DNS. 

A attacker can serve a fake WPAD server and respond to client WPAD name resolutions. The client then requests the wpad.dat file from this fake WPAD Server. Responder creates an authentication screen and asks clients to enter the username and password they use in the domain.

## Attacking

[responder](https://github.com/lgandx/Responder) + [ntlmrelayx](https://github.com/SecureAuthCorp/impacket)

[mitm6](https://github.com/fox-it/mitm6) + [ntlmrelayx](https://github.com/SecureAuthCorp/impacket) + ([getSP.py](https://github.com/SecureAuthCorp/impacket) + ) [secretsdump.py](https://github.com/SecureAuthCorp/impacket)
