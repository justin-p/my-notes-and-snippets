GRE staat voor:
Generic Routing Encapsulation
Met GRE kun je routing protecolen(OSPF, EIGRP) over een tunnel sturen.


IPsec staat voor:
Internet Protocol Security.
Dit is een verzamling van afspraken.

isakmp staat voor :
Internet Security Association Key Management Protocol.
is een protecool gemaakt voor Security Associations en cryptographic keys in een internet omgeving. 


AES staat voor :
Advanced Encryption Standard
Dit is een computer versleutelingstechniek (encryptie).
Het is de opvolger van  "Data Encryption Standard" (DES).

SHA staat voor : 
Secure Hash Algorithm
Dit is een verzameling gerelateerde HASH functies ontworpen door de NSA (National Security Agency ).



-----------------------------
GRE Tunnel opbouwen.


Amsterdam


1. We maken een tunnel interface aan.
Tunnel0 <enter>

2. We voegen een IP aan dit adress toe.
ip add 172.30.144.1  255.255.255.252 <enter>

3. We geven aan wat de source is. (De WAN interface)
tunnel source fa0/1 <enter>

4. we geven wat de destination is. (WAN IP andere router)
tunnel destination 133.2.15.181 <enter>

5. We voegen een route toe om het prive verkeer over de GRE tunnel te sturen.
ip route 192.168.2.0 255.255.255.0 172.30.144.2 <enter>

6. We maken een access-list aan om GRE data door ipsec te laten lopen.
ip access-list extended VPN <enter>
permit gre host 122.2.10.77 host 133.2.15.181 <enter>



Colombo


1. We maken een tunnel interface aan.
Tunnel0 <enter>

2. We voegen een IP aan dit adress toe.
ip add 172.30.144.2  255.255.255.252 <enter>

3. We geven aan wat de source is. (De WAN interface)
tunnel source fa0/1 <enter>

4. we geven aan dat dit zijn destination is.
tunnel destination 122.2.10.77 <enter>

5. We voegen een route toe om het prive verkeer over de GRE tunnel te sturen.
ip route 192.168.1.0 255.255.255.0 172.30.144.1 <enter>

6. We maken een access-list aan om GRE data door ipsec te laten lopen.
ip access-list extended VPN <enter>
permit gre host 133.2.15.181 host 122.2.10.77  <enter>


-----

Site to Site VPN

Om een site to site op te bouwen moeten we door 2 fases heen, 
het opbouwen van een verborgen tunnel en het verbergen van de data in die tunnel.


Fase 1

Verborgen tunnel opbouwen

de stappen:
encryption 
authentication 
hashing 
group

Amsterdam

1. We zetten isakpm aan
crypto isakmp enable <enter>

2. We kiezen voor policy 1
crypto isakmp policy 1 <enter>

3.We zetten encryption aan en we kiezen voor AES
encryption aes <enter>

4.We zorgen er voor dat er geautenficeerd moeten worden met de een key, de pre-shared key.
authentication pre-share <enter>

5.We zorgen er voor dat de data gehashed wordt zodat er geen vinger afdrukken kunnen worden achter gelaten/.
hash sha <enter>

6. We gebruiken groep 2. Dit zorgt er voor dat de data niet te lezen is.
group 2 <enter>

7. We verlaten config modus
Exit <enter>

8. We maken een Pre-shared key aan die CISCO heet en alleen 133.2.15.181 mag hier mee verbinden.
crypto isakmp key CISCO address 133.2.15.181 <enter>


Colombo

1. We zetten isakpm aan
crypto isakmp enable <enter>

2. We kiezen voor policy 1
crypto isakmp policy 1 <enter>

3.We zetten encryption aan en we kiezen voor AES
encryption aes <enter>

4.We zorgen er voor dat er geautenficeerd moeten worden met de een key, de pre-shared key.
authentication pre-share <enter>

5.We zorgen er voor dat de data gehashed wordt zodat er geen vinger afdrukken kunnen worden achter gelaten/.
hash sha <enter>

6. We gebruiken groep 2. Dit zorgt er voor dat de data niet te lezen is.
group 2 <enter>

7. We verlaten config modus
Exit <enter>

8. We maken een Pre-shared key aan die CISCO heet en alleen 133.2.15.181 mag hier mee verbinden.
crypto isakmp key CISCO address 122.2.10.77 <enter>
------------------------------------------------------------------------------------------------





Fase 2

Data door de tunnel verbergen
de stappen:

transformset
crypto map
acceslist
crypto map linken
IP nat aanpassen

Amsterdamn

1. We maken een transform-set aan genaamt DAVINCI1 die de data (ESP) encrypt met AES en de sha hash gebruikt.
crypto ipsec transform-set AMSTERDAMTRANS esp-aes esp-sha-hmac <enter>

2. We maken een crypto map voor ipsec-isakmp aan genaamt DORD1 met het nummer 10.
crypto map AMSTERDAMMAP 10 ipsec-isakmp <enter>

3. We zetten de peer hier neer ( WAN kant van de andere router)
set peer 133.2.15.181 <enter>

4. Hier geven we aan dat de we DAVINCI1 transform-set gebruiken.
set transform-set AMSTERDAMTRANS <enter> 

5. Alle adresses uit sourcelist VPN worden door deze map toegelaten of geblokkeerd.
match address VPN <enter>

6. De adressen van MIJN netwerk die naar het andere netwerk gaan worden toegelaten.
ip access-list extended VPN <enter>
permit ip 192.168.1.0 0.0.0.255 192.168.2.0 0.0.0.255 <enter>

7. Op de WAN interface linken wij de DORD1 cyrpto map.
crypto map AMSTERDAMMAP <enter>

8. Nu passen we de NONAT source list aan zodat het tunnel verkeer niet over internet gaat.
ip access-list extended NONAT <enter>
deny ip 192.168.1.0 0.0.0.63 192.168.2.0 0.0.0.63 <enter>
permit ip 192.168.1.0 0.0.0.63 any <enter>
 
9. We zorgen er voor dat de NONAT acceslist de nat source list word.
ip nat inside source list NONAT interface FastEthernet0/1 overload <enter>




Colombo

1. We maken een transform-set aan genaamt DAVINCI1 die de data (ESP) encrypt met AES en de sha hash gebruikt.
crypto ipsec transform-set COLOMBOTRANS esp-aes esp-sha-hmac <enter>

2. We maken een crypto map voor ipsec-isakmp aan genaamt COLOMBOMAP met het nummer 10.
crypto map COLOMBOMAP 10 ipsec-isakmp <enter>

3. We zetten de peer hier neer ( WAN kant van de andere router)
set peer 122.2.10.77 <enter>

4. Hier geven we aan dat de we COLOMBOTRANS transform-set gebruiken.
set transform-set COLOMBOTRANS <enter> 

5. Alle adresses uit sourcelist VPN worden door deze map toegelaten of geblokkeerd.
match address VPN <enter>

6. De adressen van MIJN netwerk die naar het andere netwerk gaan worden toegelaten.
ip access-list extended VPN <enter>
permit ip 192.168.2.0 0.0.0.255 192.168.1.0 0.0.0.255 <enter>

7. Op de WAN interface linken wij de DORD1 cyrpto map.
crypto map COLOMBOMAP <enter>

8. Nu passen we de NONAT source list aan zodat het tunnel verkeer niet over internet gaat.
ip access-list extended NONAT <enter>
deny ip 192.168.2.0 0.0.0.63 192.168.1.0 0.0.0.63 <enter>
permit ip 192.168.2.0 0.0.0.63 any <enter>
 
9. We zorgen er voor dat de NONAT acceslist de nat source list word.
ip nat inside source list NONAT interface FastEthernet0/1 overload <enter>
------------------------------------------------------------------------------------------------


Met "sh cryto ipsec sa" kunnen wij informatie zien van de tunnel
 
