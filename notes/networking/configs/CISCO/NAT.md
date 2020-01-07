```
line con 0
logg syn
no exec-timeout
no ip domain lookup


-----------------
int range fa0/1-24
spanning-tree portfast
-----------------
//alleen als er geen switch op het poortje hangt

DHCP
ip dhcp exclude (GATEWAY)
ip dhcp pool 1
network (shizzel)
default-router (gateway)
dns-server (dns server)

-----------------

IP NAT INSIDE/OUTSIDE

int fa0/0 (prive port)
ip nat inside

int fa0/1 (public port)
ip nat outside

//
Alleen als dit er niet staat
S*   0.0.0.0/0 [254/0] via 65.1.5.18

ip route 0.0.0.0 0.0.0.0 (IP Provider)
Zorgt er voor dat alles woordt doorgestuurd naar de provider.
Niewe routers doen dit automatish oude routers niet.
//

ip nat inside source list 1 (wan poort) overload
acces-list 1 permit any

------------------
show ip nat translation
------------------

NAT/PAT ---->
Altijd van binnen naar buiten

port forward <------
Buiten naar Binnen

ip nat inside static tcp 192.168.1.13 80 (WAN PORT of WAN IP) 80
ip nat inside static tcp 192.168.1.12 80 (WAN PORT of WAN IP) 81

ip nat inside static tcp 192.168.1.11 21 (WAN PORT of WAN IP) 21  
ip nat inside static tcp 192.168.1.11 20 (WAN PORT of WAN IP) 20    
------------------

```