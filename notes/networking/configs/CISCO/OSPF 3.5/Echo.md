```
!
hostname Echo
!
ip routing
!
ip dhcp excluded-address 192.168.1.190
!
ip dhcp pool ClientsArea1
   network 192.168.1.176 255.255.255.240
   default-router 192.168.1.190
   dns-server 172.16.100.93
!
interface Loopback0
 ip address 10.10.10.10 255.255.255.0
!
interface FastEthernet0/1
 no switchport
 ip address 192.168.1.193 255.255.255.252
!
interface FastEthernet0/2
 no switchport
 ip address 192.168.1.201 255.255.255.252
!
interface FastEthernet0/24
 no switchport
 ip address 192.168.1.190 255.255.255.240
!
router ospf 1
 log-adjacency-changes
 network 10.10.10.0 0.0.0.255 area 0
 network 192.168.1.176 0.0.0.15 area 1
 network 192.168.1.192 0.0.0.3 area 1
 network 192.168.1.200 0.0.0.3 area 1
!
end
```