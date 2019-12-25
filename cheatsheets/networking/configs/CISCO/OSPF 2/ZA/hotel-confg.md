```
!
version 12.2
no service pad
no service timestamps debug uptime
no service timestamps log uptime
no service password-encryption
!
hostname Hotel
!
boot-start-marker
boot-end-marker
!
!
!
!
no aaa new-model
system mtu routing 1500
ip routing
!
!
!
!
!
!
!
!
spanning-tree mode pvst
spanning-tree extend system-id
!
vlan internal allocation policy ascending
!
!
!
interface FastEthernet0/1
 no switchport
 ip address 172.20.127.254 255.255.240.0
 speed 100
 duplex full
!
interface FastEthernet0/2
 no switchport
 ip address 172.20.175.254 255.255.248.0
 speed 10
 duplex full
!
interface FastEthernet0/3
 no switchport
 ip address 172.20.144.1 255.255.248.0
 speed 100
 duplex full
!
interface FastEthernet0/4
 no switchport
 ip address 172.20.191.254 255.255.248.0
 speed 10
 duplex full
!
interface FastEthernet0/5
!
interface FastEthernet0/6
!
interface FastEthernet0/7
!
interface FastEthernet0/8
!
interface FastEthernet0/9
!
interface FastEthernet0/10
!
interface FastEthernet0/11
!
interface FastEthernet0/12
!
interface FastEthernet0/13
!
interface FastEthernet0/14
!
interface FastEthernet0/15
!
interface FastEthernet0/16
!
interface FastEthernet0/17
!
interface FastEthernet0/18
!
interface FastEthernet0/19
!
interface FastEthernet0/20
!
interface FastEthernet0/21
!
interface FastEthernet0/22
!
interface FastEthernet0/23
!
interface FastEthernet0/24
!
interface FastEthernet0/25
!
interface FastEthernet0/26
!
interface FastEthernet0/27
!
interface FastEthernet0/28
!
interface FastEthernet0/29
!
interface FastEthernet0/30
!
interface FastEthernet0/31
!
interface FastEthernet0/32
!
interface FastEthernet0/33
!
interface FastEthernet0/34
!
interface FastEthernet0/35
!
interface FastEthernet0/36
!
interface FastEthernet0/37
!
interface FastEthernet0/38
!
interface FastEthernet0/39
!
interface FastEthernet0/40
!
interface FastEthernet0/41
!
interface FastEthernet0/42
!
interface FastEthernet0/43
!
interface FastEthernet0/44
!
interface FastEthernet0/45
!
interface FastEthernet0/46
!
interface FastEthernet0/47
!
interface FastEthernet0/48
!
interface GigabitEthernet0/1
!
interface GigabitEthernet0/2
!
interface GigabitEthernet0/3
!
interface GigabitEthernet0/4
!
interface Vlan1
 no ip address
 shutdown
!
router ospf 123
 log-adjacency-changes
 network 172.20.112.0 0.0.15.255 area 0
 network 172.20.144.0 0.0.7.255 area 0
 network 172.20.168.0 0.0.7.255 area 0
 network 172.20.184.0 0.0.7.255 area 0
!
ip classless
ip http server
ip http secure-server
!
ip sla enable reaction-alerts
!
!
line con 0
line vty 0 4
 login
line vty 5 15
 login
!
end
```