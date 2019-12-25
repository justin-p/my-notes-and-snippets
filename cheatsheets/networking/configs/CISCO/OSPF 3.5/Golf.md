```
!
hostname Golf
!
ip routing
!
interface Loopback0
 ip address 10.30.30.30 255.255.255.0
!
interface FastEthernet0/1
 no switchport
 ip address 192.168.1.202 255.255.255.252
!
interface FastEthernet0/2
 no switchport
 ip address 192.168.1.198 255.255.255.252
!
interface FastEthernet0/3
 no switchport
 ip address 192.168.1.205 255.255.255.252
!
router ospf 1
 log-adjacency-changes
 network 10.30.30.0 0.0.0.255 area 0
 network 192.168.1.196 0.0.0.3 area 1
 network 192.168.1.200 0.0.0.3 area 1
 network 192.168.1.204 0.0.0.3 area 1
!
end
```