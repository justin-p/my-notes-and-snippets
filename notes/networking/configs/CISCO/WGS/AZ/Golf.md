```
hostname Golf
!
ip dhcp excluded-address 192.168.2.126
!
ip dhcp pool GOLFCLIENTS
 network 192.168.2.64 255.255.255.192
 default-router 192.168.2.126
 dns-server 1.2.2.1
ip routing
!
no ip domain-lookup
!
interface Loopback0
 ip address 10.10.10.7 255.255.255.255
!
interface FastEthernet0/1
 no switchport
 ip address 172.30.151.254 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/3
 no switchport
 ip address 172.30.160.1 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/5
 no switchport
 ip address 172.30.176.1 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/23
 no switchport
 ip address 192.168.2.126 255.255.255.192
 duplex auto
 speed auto
!
interface FastEthernet0/24
 no switchport
 ip address 192.168.2.62 255.255.255.192
 duplex auto
 speed auto
!
router ospf 123
 router-id 10.10.10.7
 log-adjacency-changes
 network 10.10.10.7 0.0.0.0 area 1
 network 192.168.2.0 0.0.0.63 area 1
 network 192.168.2.64 0.0.0.63 area 1
 network 172.30.160.0 0.0.7.255 area 1
 network 172.30.176.0 0.0.7.255 area 1
 network 172.30.144.0 0.0.7.255 area 1
!
line con 0
 exec-timeout 0 0
 logging synchronous
!
end
!
```