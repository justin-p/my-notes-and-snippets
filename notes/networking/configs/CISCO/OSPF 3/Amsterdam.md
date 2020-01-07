```
!
hostname Amsterdam
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
!
!
!
!
!
!
!
!
interface Loopback0
 ip address 10.10.10.10 255.255.255.0
!
interface FastEthernet0/0
 ip address 172.16.100.98 255.255.255.252
 duplex auto
 speed auto
!
interface FastEthernet0/1
 no ip address
 duplex auto
 speed auto
 shutdown
!
router ospf 1
 log-adjacency-changes
 network 172.16.100.96 0.0.0.3 area 0
!
ip classless
!
!
!
no cdp run
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
