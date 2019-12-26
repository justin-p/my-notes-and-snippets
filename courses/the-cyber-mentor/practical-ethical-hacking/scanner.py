#!/bin/python3

import sys
import socket
from datetime import datetime

# Define our target
if len(sys.argv) == 2:
    target = socket.gethostbyname(sys.argv[1]) # Hostname to IPv4
else:
    print("Invalid amount of arguments")
    print("Syntax: python3 scanner.py <ip>")
# Banner
print("-"*50)
print(f"scanning target {target}")
print(f"Time started: {str(datetime.now())}")
print("-"*50)

try:
    for port in range(50,85):
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        socket.setdefaulttimeout(1)
        result = s.connect_ex((target,port)) # store error indicator
        if result == 0:
            print(f"port {port} is open")
        s.close()
except KeyboardInterrupt:
    print("\nExiting program")
    sys.exit()
except socket.gaierror:
    print(f"Hostname could not be resolved: {target}")
    sys.exit()
except socket.error:
    print(f"Couldn't connect to server: {target}")