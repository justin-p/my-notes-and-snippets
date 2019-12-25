!
crypto ipsec transform-set COLOMBOTRANS esp-aes esp-sha-hmac
!
crypto map COLOMBOMAP 10 ipsec-isakmp
 set peer 115.1.13.37
 set transform-set COLOMBOTRANS
 match address VPN
!
interface GigabitEthernet0/1
 crypto map COLOMBOMAP
!