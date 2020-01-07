```
!
crypto ipsec transform-set AMSTERDAMTRANS esp-aes esp-sha-hmac
!
crypto map AMSTERDAMMAP 10 ipsec-isakmp
 set peer 125.2.13.101
 set transform-set AMSTERDAMTRANS
 match address VPN
!
interface FastEthernet0/1
 crypto map AMSTERDAMMAP
!
```