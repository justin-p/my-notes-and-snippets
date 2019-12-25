```
hostname Delta
!
!
!
!
!
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
interface Loopback0
 ip address 10.40.40.40 255.255.255.0
!
interface FastEthernet0/1
 no switchport
 ip address 192.168.1.206 255.255.255.252
 duplex auto
 speed auto
!
interface FastEthernet0/2
 no switchport
 ip address 172.16.100.101 255.255.255.252
 duplex auto
 speed auto
!
interface FastEthernet0/3
 no switchport
 ip address 172.16.100.106 255.255.255.252
 duplex auto
 speed auto
!
interface FastEthernet0/4
 no switchport
 ip address 172.16.100.97 255.255.255.252
 duplex auto
 speed auto
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
 ip address 172.16.100.94 255.255.255.224
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
 network 172.16.100.104 0.0.0.3 area 0
 network 172.16.100.100 0.0.0.3 area 0
 network 172.16.100.64 0.0.0.31 area 0
 network 172.16.100.96 0.0.0.3 area 0
 network 192.168.1.204 0.0.0.3 area 1
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