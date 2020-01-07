```
!
hostname Colombo
!
!
!
!
ip dhcp excluded-address 10.10.10.62
!
ip dhcp pool ClientsRipV2
 network 10.10.10.32 255.255.255.224
 default-router 10.10.10.62
 dns-server 172.16.100.93
!
!
!
!
!
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 ip address 10.10.10.1 255.255.255.224
 duplex auto
 speed auto
!
interface FastEthernet0/1
 ip address 10.10.10.62 255.255.255.224
 ip helper-address 10.10.10.62
 duplex auto
 speed auto
!
router rip
 version 2
 network 10.0.0.0
 no auto-summary
!
ip classless
ip route 0.0.0.0 0.0.0.0 10.10.10.30 
!
!
!
no cdp run
!
!
!
!
!
line con 0
!
line aux 0
!
line vty 0 4
 login
!
!
!
end
```