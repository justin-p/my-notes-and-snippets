# Responder

## Basic usage

run responder on eth0

`responder -I eth0`

## Anaylise mode

`responder -I eth1 -A`

## Set and forget (silent for users)

!!! likely break stuff on the network !!!

- Verbose
- Enable answers for netbios wredir suffix queries.
- Enable answers for netbios domain suffix queries.
- Start the WPAD rogue proxy server.
- Fingerprint a host that issued an NBT-NS or LLMNR query.

`responder -I eth1 -rdwfv`

## Set and forget (interactive)

!!! likely break stuff on the network !!!

all of silent and:

- Force NTLM/Basic authentication on wpad.dat file
- Return a Basic HTTP authentication. Default: NTLM

`responder -I eth1 -wFfbrdwv`