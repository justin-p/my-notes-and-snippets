# LLMNR/NBT-NS

By default when a DNS lookup fails windows tries to use 2 other components as a fallback. Link-Local Multicast Name Resolution (LLMNR) and Netbios Name Service (NBT-NS). LLLMNR was introduced in Windows Vista and is the successor to NBT-NS. 

These protocols help machines on the network identify hosts when DNS fails. So if one machine tries to resolve a particular host, but DNS resolution fails, the machine will then attempt to ask all other machines on the local network for the correct address via LLMNR or NBT-NS.

An attacker can listen on a network for these LLMNR (UDP/5355) or NBT-NS (UDP/137) broadcasts and respond to them, thus pretending that the attacker knows the location of the requested host.  

![example of LLMNR Poisoning](stern-llmnr_poison1.jpg)

## Attacking

[responder](https://github.com/lgandx/Responder) + [ntlmrelayx](https://github.com/SecureAuthCorp/impacket)

## Defence

1. Disable LLMNR and NBT-NS
2. Enable Network Access Control
3. Strong password policy (e.g., 14 characters and limit common word usage)

### LLMNR GPO

`Computer Configuration -> Administrative Templates -> Network -> DNS Client -> Turn Off Multicast Name Resolution -> Enabled`

### NBT-NS GPO (startup script)

```powershell
$regkey = "HKLM:SYSTEM\CurrentControlSet\services\NetBT\Parameters\Interfaces"
Get-ChildItem $regkey | ForEach { 
    Set-ItemProperty -Path "$regkey\$($_.pschildname)" -Name NetbiosOptions -Value 2 -Verbose
}
```
