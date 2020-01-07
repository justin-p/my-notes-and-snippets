```
!
version 12.2
no service pad
no service timestamps debug uptime
no service timestamps log uptime
no service password-encryption
!
hostname Foxtrot
!
!
no aaa new-model
ip subnet-zero
ip routing
!
vtp domain SwitchB
vtp mode transparent
!
!
!
!
!
spanning-tree mode pvst
spanning-tree extend system-id
!
vlan internal allocation policy ascending
!
vlan 2
 name RED
!
vlan 3
 name green
!
vlan 4
 name YELLOW
!
vlan 5
 name BLUE
!
vlan 6
 name orange
!
vlan 99
 name telnet
!
!
! 
!
!
!
interface FastEthernet0/1
 no switchport
 ip address 172.20.111.254 255.255.240.0
 speed 100
 duplex full
!
interface FastEthernet0/2
 no switchport
 ip address 172.20.183.254 255.255.248.0
 speed 10
 duplex full
!
interface FastEthernet0/3
 no switchport
 ip address 172.20.160.1 255.255.248.0
 speed 100
 duplex full
!
interface FastEthernet0/4
 no switchport
 ip address 172.20.184.1 255.255.248.0
 speed 10
 duplex full
!
interface FastEthernet0/5
 switchport mode dynamic desirable
!
interface FastEthernet0/6
 switchport mode dynamic desirable
!
interface FastEthernet0/7
 switchport mode dynamic desirable
!
interface FastEthernet0/8
 switchport mode dynamic desirable
!
interface FastEthernet0/9
 switchport mode dynamic desirable
!
interface FastEthernet0/10
 switchport mode dynamic desirable
!
interface FastEthernet0/11
 switchport mode dynamic desirable
!
interface FastEthernet0/12
 switchport mode dynamic desirable
!
interface FastEthernet0/13
 switchport mode dynamic desirable
!
interface FastEthernet0/14
 switchport mode dynamic desirable
!
interface FastEthernet0/15
 switchport mode dynamic desirable
!
interface FastEthernet0/16
 switchport mode dynamic desirable
!
interface FastEthernet0/17
 switchport mode dynamic desirable
!
interface FastEthernet0/18
 switchport mode dynamic desirable
!
interface FastEthernet0/19
 switchport mode dynamic desirable
!
interface FastEthernet0/20
 switchport mode dynamic desirable
!
interface FastEthernet0/21
 switchport mode dynamic desirable
!
interface FastEthernet0/22
 switchport mode dynamic desirable
!
interface FastEthernet0/23
 switchport mode dynamic desirable
!
interface FastEthernet0/24
 switchport mode dynamic desirable
!
interface GigabitEthernet0/1
 switchport mode dynamic desirable
!
interface GigabitEthernet0/2
 switchport mode dynamic desirable
!
interface Vlan1
 no ip address
 shutdown
!
router ospf 123
 log-adjacency-changes
 network 172.20.96.0 0.0.15.255 area 0
 network 172.20.160.0 0.0.7.255 area 0
 network 172.20.176.0 0.0.7.255 area 0
 network 172.20.184.0 0.0.7.255 area 0
!
ip classless
ip http server
ip http secure-server
!
!
!
control-plane
!
!
line con 0
line vty 0 4
 login
line vty 5 15
 login
!
end
```