hostname Foxtrot
!
ip routing
!
no ip domain-lookup
!
interface Loopback0
 ip address 10.10.10.8 255.255.255.255
!
interface FastEthernet0/4
 no switchport
 ip address 172.30.175.254 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/5
 no switchport
 ip address 172.30.183.254 255.255.248.0
 duplex auto
 speed auto
!
interface FastEthernet0/6
 no switchport
 ip address 172.30.184.1 255.255.248.0
 duplex auto
 speed auto
!
router ospf 123
 router-id 10.10.10.8
 log-adjacency-changes
 network 172.30.184.0 0.0.7.255 area 1
 network 172.30.168.0 0.0.7.255 area 1
 network 172.30.176.0 0.0.7.255 area 1
 network 10.10.10.8 0.0.0.0 area 1
!
line con 0
 exec-timeout 0 0
 logging synchronous
!
end
!