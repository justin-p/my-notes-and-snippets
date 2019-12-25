```
hostname Bravo
!
ip dhcp excluded-address 192.168.1.126
!
ip dhcp pool BRAVOCLIENTS
 network 192.168.1.64 255.255.255.192
 default-router 192.168.1.126
 dns-server 1.1.2.1
ip routing
!
no ip domain-lookup
!
interface Loopback0
 ip address 10.10.10.2 255.255.255.255
!
interface FastEthernet0/1
 no switchport
 ip address 172.20.151.254 255.255.248.0
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
 ip address 172.20.160.1 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/4
 no switchport
 no ip address
 duplex auto
 speed auto
!
interface FastEthernet0/5
 no switchport
 ip address 172.20.176.1 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/23
 no switchport
 ip address 192.168.1.126 255.255.255.192
 duplex auto
 speed auto
!
interface FastEthernet0/24
 no switchport
 ip address 192.168.1.62 255.255.255.192
 duplex auto
 speed auto
!
interface Vlan1
 no ip address
 shutdown
!
router ospf 123
 router-id 10.10.10.2
 log-adjacency-changes
 network 192.168.1.0 0.0.0.63 area 1
 network 192.168.1.64 0.0.0.63 area 1
 network 172.20.144.0 0.0.7.255 area 1
 network 172.20.176.0 0.0.7.255 area 1
 network 172.20.160.0 0.0.7.255 area 1
 network 10.10.10.2 0.0.0.0 area 1
!
line con 0
 exec-timeout 0 0
 logging synchronous
!
end
!
```