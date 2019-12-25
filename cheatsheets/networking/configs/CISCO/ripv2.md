```
hostname amsterdam

!
interface fa0/1
ip address (meestal HB INSIDE)
ip nat inside (verbonden met het prive netwerk)
no shutdown

!
interface fa0/0
ip address dhcp
ip nat outside (verbonden met de public netwerk / ISP)
no shutdown

!
ip route 0.0.0.0 0.0.0.0 ip van de provider (lijstje server vlak bij silano buro)
!

!
ip nat inside source list 1 interface fa0/0 overload
Laat alle inside hosts-adressen toe tot het internet via het gedeelde interface fa0/0 .
!

access-list 1 permit any

!
router rip
version 2
network (net id)
default-information originate
no auto-summary
!

ip nat inside source static tcp (prive ip) (poort) interface (intfa0/0) (poort)


!

IP DHCP POOL 1
network netid+SB
default-router (Default Gateway)
DNS 1.1.1.1

!

ip dhcp exclude

__________________________________________
IP HELPER AAN DE KANT VAN DE PC ( van server ) 
```