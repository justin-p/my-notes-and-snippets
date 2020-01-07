```
hostname Hotel
!
ip routing
!
no ip domain-lookup
!
interface Loopback0
 ip address 10.10.10.9 255.255.255.255
!
interface FastEthernet0/2
 no switchport
 ip address 172.30.159.254 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/3
 no switchport
 ip address 172.30.167.254 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/6
 no switchport
 ip address 172.30.191.254 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/24
 no switchport
 ip address 172.30.192.1 255.255.248.0
 duplex auto
 speed auto
!
router ospf 123
 router-id 10.10.10.9
 log-adjacency-changes
 network 172.30.192.0 0.0.7.255 area 0
 network 172.30.184.0 0.0.7.255 area 1
 network 172.30.152.0 0.0.7.255 area 1
 network 10.10.10.9 0.0.0.0 area 1
 network 172.30.160.0 0.0.7.255 area 1
!
line con 0
 exec-timeout 0 0
 logging synchronous
!
end
!
```