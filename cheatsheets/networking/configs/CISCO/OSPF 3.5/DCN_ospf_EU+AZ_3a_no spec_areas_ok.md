```
Area 0
	Clients
	IP     172. 16.100. 64
	MASK   255.255.255.224
	WILD   0  .0  .0  . 31

	256-224=32

		1e
		NETID  172. 16.100. 64
		LB     172. 16.100. 65
		HB     172. 16.100. 94
		BC     172. 16.100. 95




	Router
	IP     172. 16.100. 96
	MASK   255.255.255.252
        WILD   0  .0  .0  .  3
   
    256-252=4
	
		1e
	        NETID  172. 16.100. 96
		LB     172. 16.100. 97 
		HB     172. 16.100. 98
		BC     172. 16.100. 99
		
		2e
		NETID  172. 16.100.100
		LB     172. 16.100.101
		HB     172. 16.100.102
		BC     172. 16.100.103
		
		3e
		NETID  172. 16.100.104
		LB     172. 16.100.105
		HB     172. 16.100.106
		BC     172. 16.100.107
		
		4e
		NETID  172. 16.100.108
		LB     172. 16.100.109
		HB     172. 16.100.110
		BC     172. 16.100.111



Area 1
	Clients 
	IP     192.168.  1.160
	MASK   255.255.255.240
	WILD   0  .0  .0  . 15
	
	256-240=16
	
		1e
		NETID   192.168.  1.160
		LB      192.168.  1.161
		HB      192.168.  1.174
		BC      192.168.  1.175
		
		2e
		NETID   192.168.  1.176
		LB      192.168.  1.177
		HB      192.168.  1.190
		BC      192.168.  1.191		
	
	
	
	Routers 
	IP     192.168.  1.192
	MASK   255.255.255.252
	WILD   0  .0  .0  .  3
	
	256-252=4
	
		1e
		NETID   192.168.  1.192
		LB      192.168.  1.193
		HB      192.168.  1.194
		BC      192.168.  1.195
		
		2e
		NETID   192.168.  1.196
		LB      192.168.  1.197
		HB      192.168.  1.198
		BC      192.168.  1.199
		
		3e
		NETID   192.168.  1.200
		LB      192.168.  1.201
		HB      192.168.  1.202
		BC      192.168.  1.203	
		
		4e
		NETID   192.168.  1.204
		LB      192.168.  1.205
		HB      192.168.  1.206
		BC      192.168.  1.207			



Area 2

	Routers 
	IP     192.168.  2. 80
	MASK   255.255.255.248
	WILD   0  .0  .0  .  7

	256-248=8
	
		1e
		NETID   192.168.  2.80
		LB      192.168.  2.81
		HB      192.168.  2.86
		BC      192.168.  2.87
		
		2e
		NETID   192.168.  2.88
		LB      192.168.  2.89
		HB      192.168.  2.94
		BC      192.168.  2.95
		
		3e
		NETID   192.168.  2.96
		LB      192.168.  2.97
		HB      192.168.  2.102
		BC      192.168.  2.103	




Area 3

	Clients 
	IP     192.168.  3.128
	MASK   255.255.255.192
	WILD   0  .0  .0  . 63
	
	256-192=64
	
		1e
		NETID   192.168.  3.128
		LB      192.168.  3.129
		HB      192.168.  3.190
		BC      192.168.  3.191
	
	
	
	Routers
	IP     192.168.  3.192
	MASK   255.255.255.252
	WILD   0  .0  .0  .  3
	
	256-252=4
	
		1e
		NETID   192.168.  3.192
		LB      192.168.  3.193
		HB      192.168.  3.194
		BC      192.168.  3.195
	
		2e
		NETID   192.168.  3.196
		LB      192.168.  3.197
		HB      192.168.  3.198
		BC      192.168.  3.199
		
		3e
		NETID   192.168.  3.200
		LB      192.168.  3.201
		HB      192.168.  3.202
		BC      192.168.  3.203
		
		4e
		NETID   192.168.  3.204
		LB      192.168.  3.205
		HB      192.168.  3.206
		BC      192.168.  3.207
		
		5e
		NETID   192.168.  3.208
		LB      192.168.  3.209
		HB      192.168.  3.210
		BC      192.168.  3.211
		
		6e
		NETID   192.168.  3.212
		LB      192.168.  3.213
		HB      192.168.  3.214
		BC      192.168.  3.215
		
		7e
		NETID   192.168.  3.216
		LB      192.168.  3.217
		HB      192.168.  3.218
		BC      192.168.  3.219
		
		8e
		NETID   192.168.  3.220
		LB      192.168.  3.221
		HB      192.168.  3.222
		BC      192.168.  3.223
		
		9e
		NETID   192.168.  3.224
		LB      192.168.  3.225
		HB      192.168.  3.226
		BC      192.168.  3.227
		
		10e
		NETID   192.168.  3.228
		LB      192.168.  3.229
		HB      192.168.  3.230
		BC      192.168.  3.231
		
		11e
		NETID   192.168.  3.232
		LB      192.168.  3.233
		HB      192.168.  3.234
		BC      192.168.  3.235
		
RipV2

	IP     10 . 10 .10  .0
	MASK   255.255.255.224
	WILD   0  .0  .0  . 31
	
	256-224=32
	
		1e
		NETID   10 . 10 .10 .0
		LB      10 . 10 .10 .1
		HB      10 . 10 .10 .30
		BC      10 . 10 .10 .31
		
		2e
		NETID   10 . 10 .10 .32
		LB      10 . 10 .10 .33
		HB      10 . 10 .10 .62
		BC      10 . 10 .10 .63
	




Area 0

Delta
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.2.102     1   FULL/DR         00:00:34    172.16.100.102  FastEthernet0/2
192.168.3.234     1   FULL/DR         00:00:33    172.16.100.105  FastEthernet0/3
172.16.100.98     1   FULL/BDR        00:00:34    172.16.100.98   FastEthernet0/4

Echo
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.1.206     1   FULL/BDR        00:00:37    172.16.100.101  FastEthernet0/1
192.168.3.234     1   FULL/DR         00:00:37    172.16.100.110  FastEthernet0/2
192.168.2.97      1   FULL/BDR        00:00:37    192.168.2.97    FastEthernet0/3

Golf
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.1.206     1   FULL/BDR        00:00:39    172.16.100.106  FastEthernet0/1
192.168.2.102     1   FULL/BDR        00:00:39    172.16.100.109  FastEthernet0/2
192.168.3.233     1   FULL/BDR        00:00:38    192.168.3.233   FastEthernet0/3


Amsterdam
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.1.206     1   FULL/DR         00:00:34    172.16.100.97   FastEthernet0/0

Router		Router ID	DR/BDR
Delta		192.198.1.206	BDR
Echo		192.168.2.102	DR
Golf		192.168.3.234	DR
Amsterdam	172.16.100.98	BDR

Router		Router ID	DR/BDR
Delta		10.40.40.40	BDR
Echo		10.50.50.50	DR
Golf		10.70.70.70	DR
Amsterdam	10.10.10.10	BDR




Area 1

alfa
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.1.197     1   FULL/BDR        00:00:30    192.168.1.194   FastEthernet0/1
192.168.1.205     1   FULL/DR         00:00:30    192.168.1.202   FastEthernet0/2

bravo
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.1.201     1   FULL/DR         00:00:33    192.168.1.193   FastEthernet0/1
192.168.1.205     1   FULL/DR         00:00:33    192.168.1.198   FastEthernet0/2

charlie
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.1.201     1   FULL/BDR        00:00:33    192.168.1.201   FastEthernet0/1
192.168.1.197     1   FULL/BDR        00:00:33    192.168.1.197   FastEthernet0/2
192.168.1.206     1   FULL/DR         00:00:33    192.168.1.206   FastEthernet0/3

Delta
Neighbor ID     Pri   State           Dead Time   Address         Interface
192.168.1.205     1   FULL/BDR        00:00:34    192.168.1.205   FastEthernet0/1

Router		Router ID	DR/BDR
Alfa		192.168.1.201 	DR
Bravo		192.168.1.197 	BDR
Charlie		192.168.1.205 	BDR
Delta		192.168.1.206 	DR
```