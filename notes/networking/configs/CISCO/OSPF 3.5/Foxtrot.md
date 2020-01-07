```
!
hostname Foxtrot
!
ip routing
!
interface Loopback0
 ip address 10.20.20.20 255.255.255.0
!
interface FastEthernet0/1
 no switchport
 ip address 192.168.1.194 255.255.255.252
!
interface FastEthernet0/2
 no switchport
 ip address 192.168.1.197 255.255.255.252
!
interface FastEthernet0/24
 no switchport
 ip address 192.168.1.174 255.255.255.252
!
router ospf 1
 log-adjacency-changes
 network 10.20.20.0 0.0.0.255 area 0
 network 192.168.1.160 0.0.0.15 area 1
 network 192.168.1.192 0.0.0.3 area 1
 network 192.168.1.196 0.0.0.3 area 1
!
end
```