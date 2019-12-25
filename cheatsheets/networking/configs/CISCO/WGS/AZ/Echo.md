hostname Echo
!
ip dhcp excluded-address 192.168.2.190
!
ip dhcp pool ECHOCLIENTS
 network 192.168.2.128 255.255.255.192
 default-router 192.168.2.190
 dns-server 1.2.2.1
ip routing
!
no ip domain-lookup
!
interface Loopback0
 ip address 10.10.10.6 255.255.255.255
!
interface FastEthernet0/1
 no switchport
 ip address 172.30.144.1 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/2
 no switchport
 ip address 172.30.152.1 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/4
 no switchport
 ip address 172.30.168.1 255.255.248.0
 duplex auto
 speed auto
!
 interface FastEthernet0/24
 no switchport
 ip address 192.168.2.190 255.255.255.192
 duplex auto
 speed auto
!
router ospf 123
 router-id 10.10.10.6
 log-adjacency-changes
 network 192.168.2.128 0.0.0.63 area 1
 network 10.10.10.6 0.0.0.0 area 1
 network 172.30.168.0 0.0.7.255 area 1
 network 172.30.152.0 0.0.7.255 area 1
 network 172.30.144.0 0.0.7.255 area 1
!
line con 0
 exec-timeout 0 0
 logging synchronous
!
end
!