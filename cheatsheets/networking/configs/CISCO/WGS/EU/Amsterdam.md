```
!
hostname Amsterdam
!
no ip domain lookup
!
interface Loopback0
 ip address 10.10.10.5 255.255.255.255
!
interface FastEthernet0/0
 ip address 172.20.199.254 255.255.248.0
 ip nat inside
 duplex auto
 speed auto
!
interface FastEthernet0/1
 ip address dhcp
 ip nat outside
 duplex auto
 speed auto
!
router ospf 123
 router-id 10.10.10.5
 log-adjacency-changes
 network 10.10.10.5 0.0.0.0 area 0
 network 172.20.192.0 0.0.7.255 area 0
 default-information originate
!
ip classless
!
no ip http server
no ip http secure-server
ip nat inside source list NONAT interface FastEthernet0/1 overload
ip nat inside source static udp 192.168.1.61 22 interface FastEthernet0/1 22
ip nat inside source static tcp 192.168.1.61 21 interface FastEthernet0/1 21
ip nat inside source static tcp 192.168.1.61 80 interface FastEthernet0/1 80
ip nat inside source static tcp 192.168.1.61 22 interface FastEthernet0/1 22
!
ip access-list extended NONAT
 deny   ip 192.168.1.0 0.0.0.255 192.168.2.0 0.0.0.255
 permit ip 192.168.1.0 0.0.0.255 any
ip access-list extended VPN
 permit ip 192.168.1.0 0.0.0.255 192.168.2.0 0.0.0.255
!
line con 0
 exec-timeout 0 0
 logging synchronous
!
end
```