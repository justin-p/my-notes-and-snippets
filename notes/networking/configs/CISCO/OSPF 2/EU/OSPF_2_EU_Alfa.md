```
!
version 12.2
no service timestamps log datetime msec
no service timestamps debug datetime msec
no service password-encryption
!
hostname Alfa
!
!
!
!
ip dhcp excluded-address 172.20.95.254
!
ip dhcp pool 1
 network 172.20.80.0 255.255.240.0
 default-router 172.20.95.254
 dns-server 172.20.111.253
ip routing
!
!
!
!
!
!
!
!
!
!
spanning-tree mode pvst
!
!
!
!
interface FastEthernet0/1
 no switchport
 ip address 172.20.95.254 255.255.240.0
 duplex full
 speed 100
!
interface FastEthernet0/2
 no switchport
 ip address 172.20.176.1 255.255.248.0
 duplex full
 speed 10
 ipv6 ospf cost 1
!
interface FastEthernet0/3
 no switchport
 ip address 172.20.168.1 255.255.248.0
 ip ospf cost 200
 duplex full
 speed 10
 ipv6 ospf cost 1
!
interface FastEthernet0/4
 no switchport
 ip address 172.20.152.1 255.255.248.0
 duplex full
 speed 100
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
interface GigabitEthernet0/1
!
interface GigabitEthernet0/2
!
interface Vlan1
 no ip address
 shutdown
!
router ospf 123
 log-adjacency-changes
 network 172.20.152.0 0.0.7.255 area 0
 network 172.20.176.0 0.0.7.255 area 0
 network 172.20.168.0 0.0.7.255 area 0
 network 172.20.80.0 0.0.15.255 area 0
!
ip classless
!
!
!
!
!
!
!
line con 0
line vty 0 4
 login
!
!
!
end
```