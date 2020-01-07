```
hostname Colombo
!
no ip domain lookup
!
interface GigabitEthernet0/0
 ip address 172.30.199.254 255.255.248.0
 ip nat inside
 duplex auto
 speed auto
!
interface GigabitEthernet0/1
 ip address dhcp
 ip nat outside
 duplex auto
 speed auto
 crypto map COLOMBOMAP
!
router ospf 123
 router-id 10.10.10.10
 log-adjacency-changes
 network 10.10.10.10 0.0.0.0 area 0
 network 172.30.192.0 0.0.7.255 area 0
 default-information originate
!
ip classless
!
no ip http server
no ip http secure-server
!
ip nat inside source list NONAT interface GigabitEthernet0/1 overload
ip nat inside source static tcp 192.168.2.58 3389 interface GigabitEthernet0/1 20059
ip nat inside source static tcp 192.168.2.59 3389 interface GigabitEthernet0/1 20060
ip nat inside source static tcp 192.168.2.60 3389 interface GigabitEthernet0/1 20061
ip nat inside source static tcp 192.168.2.61 3389 interface GigabitEthernet0/1 20062
!
ip access-list extended NONAT
 deny   ip 192.168.2.0 0.0.0.255 192.168.1.0 0.0.0.255
 permit ip 192.168.2.0 0.0.0.255 any
ip access-list extended VPN
 permit ip 192.168.2.0 0.0.0.255 192.168.1.0 0.0.0.255
!
 exec-timeout 0 0
 logging synchronous
!
end
!
```