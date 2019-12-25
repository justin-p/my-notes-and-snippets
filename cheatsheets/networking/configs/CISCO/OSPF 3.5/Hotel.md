```
!
hostname Hotel
!
ip routing
!
interface Loopback0
 ip address 10.40.40.40 255.255.255.0
!
interface FastEthernet0/1
 no switchport
 ip address 192.168.1.206 255.255.255.252
!
interface FastEthernet0/4
 no switchport
 ip address 172.16.100.97 255.255.255.252
!
interface FastEthernet0/24
 no switchport
 ip address 172.16.100.94 255.255.255.224
!
router ospf 1
 log-adjacency-changes
 network 10.40.40.0 0.0.0.255 area 0
 network 172.16.100.64 0.0.0.31 area 0
 network 172.16.100.96 0.0.0.3 area 0
 network 192.168.1.204 0.0.0.3 area 1
!
end
```