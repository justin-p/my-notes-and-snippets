```
!
hostname Alfa
!
!
!
!
ip dhcp excluded-address 192.168.1.190
!
ip dhcp pool ClientsArea1
 network 192.168.1.176 255.255.255.240
 default-router 192.168.1.190
 dns-server 172.16.100.93
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
 ip address 192.168.1.193 255.255.255.252
 duplex auto
 speed auto
!
interface FastEthernet0/2
 no switchport
 ip address 192.168.1.201 255.255.255.252
 duplex auto
 speed auto
!
interface FastEthernet0/3
!
interface FastEthernet0/4
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
 no switchport
 ip address 192.168.1.190 255.255.255.240
 ip helper-address 192.168.1.190
 duplex auto
 speed auto
!
interface GigabitEthernet0/1
!
interface GigabitEthernet0/2
!
interface Vlan1
 no ip address
 shutdown
!
router ospf 1
 log-adjacency-changes
 network 192.168.1.192 0.0.0.3 area 1
 network 192.168.1.176 0.0.0.15 area 1
 network 192.168.1.200 0.0.0.3 area 1
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
!
line aux 0
!
line vty 0 4
 login
!
!
!
end
```