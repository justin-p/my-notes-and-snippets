# SMB Relay

Use a captures hash to authenticated against a PC.

1. SMB signing has to be disabled. (nmap --script smb2-security-mode.nse -p 445 CIDR/HOST)
2. User credentials must have remote login access

## Attacking

Setup responder to not start a SMB and HTTP server. (vim /usr/share/responder/Responder.conf)

[responder](https://github.com/lgandx/Responder) + [ntlmrelayx](https://github.com/SecureAuthCorp/impacket)

## Defences

1. Enable SMB signing
   - pro: fixes attack
   - con: may cause slow down with file copies
2. Disable NTLM auth.
   - pro: fixes attack
   - con: if kerberos goes down windows falls back to NTLM
3. Account tiering.
    - Pro: Limits domain admins to specific task, setup multiple tiered accounts. (only login into servers with need of DA).
    - Con: may be difficult to implement/enforce.
4. Restrict local admin access.
    - Pro: Can prevent a lot of lateral movement
    - Con: May increase load on SD/IT admins.

### SMB signing GPO

`Computer Configuration > Policies > Windows Settings > Security Settings > Local Policies > Security Options`

#### Servers

Microsoft network server: Digitally sign communications (always) -> Enabled

If SMBv1 is needed: Microsoft network server: Digitally sign communications (if client agrees) -> Enabled

#### Clients

Microsoft network client: Digitally sign communications (always) -> Enabled

If SMBv1 is needed: Microsoft network client: Digitally sign communications (if server agrees) -> Enabled

### Restrict/Deny NTLM in Active Directory

`Computer Configurations -> Policies -> Windows Settings -> Security Settings -> Local Policies -> Security Options -> Network Security: Restrict NTLM: NTLM authentication in this domain`

`Deny all`

### Account tiering

See [this](https://www.petri.com/use-microsofts-active-directory-tier-administrative-model) and [this](https://docs.microsoft.com/en-us/windows-server/identity/securing-privileged-access/securing-privileged-access-reference-material)

### Restrict local admin access

[Try looking into LAPS.](https://blog.stealthbits.com/running-laps-in-the-race-to-security/)