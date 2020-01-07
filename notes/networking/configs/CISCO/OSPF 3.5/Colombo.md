```
!
hostname Colombo
!
interface Loopback0
 ip address 10.10.10.10 255.255.255.0
!
interface FastEthernet0/0
 ip address 172.16.100.98 255.255.255.252
 ip nat inside
 ip virtual-reassembly
 duplex auto
 speed auto
!
interface FastEthernet0/1
 ip address dhcp
 ip nat outside
 ip virtual-reassembly
 duplex auto
 speed auto
!
router ospf 1
 log-adjacency-changes
 network 172.16.100.96 0.0.0.3 area 0
 default-information originate
!
ip classless
!
ip nat inside source list 1 interface FastEthernet0/1 overload
ip nat inside source static tcp 192.168.1.177 20 124.2.12.93 20 extendable
ip nat inside source static tcp 192.168.1.177 21 124.2.12.93 21 extendable
ip nat inside source static tcp 192.168.1.173 80 124.2.12.93 80 extendable
!
access-list 1 permit any
!
end
```