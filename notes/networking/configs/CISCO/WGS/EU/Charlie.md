```
hostname Charlie
!
ip routing
!
no ip domain-lookup
!
interface Loopback0
 ip address 10.10.10.3 255.255.255.255
!
interface FastEthernet0/1
 no switchport
 no ip address
 duplex auto
 speed auto
!
interface FastEthernet0/2
 no switchport
 no ip address
 duplex auto
 speed auto
!
interface FastEthernet0/3
 no switchport
 no ip address
 duplex auto
 speed auto
!
interface FastEthernet0/4
 no switchport
 ip address 172.20.175.254 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/5
 no switchport
 ip address 172.20.183.254 255.255.248.0
 duplex auto
 speed auto
!
interface Vlan1
 no ip address
 shutdown
!
router ospf 123
 log-adjacency-changes
 network 172.20.168.0 0.0.7.255 area 1
 network 172.20.176.0 0.0.7.255 area 1
 network 172.20.184.0 0.0.7.255 area 1
 network 10.10.10.3 0.0.0.0 area 1
!
line con 0
 exec-timeout 0 0
 logging synchronous
!
end
!
```