#!/usr/bin/python 

import socket,sys

address = '192.168.136.130'
port    = 9999

#offset  = ?

buff    = b""  # empty byte var

try:
	print(f'[+] Sending buffer: {str(len(buff))} bytes')
	s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	s.connect((address,port))
	s.recv(1024)			
	s.send(b"%s" % buff) 
except RuntimeError as Err:
	print(f'[!] Unable to connect to the application. {err}')
	sys.exit(0)
finally:
	s.close()
