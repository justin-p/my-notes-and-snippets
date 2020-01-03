# Payloads

## Non-staged

- Sends exploit shellcode all at once  
- Larger in size and won't always work

```bash
windows/meterpreter_reverse_tcp
                   ^
```

## Staged

- Sends payload in stages  
- Can be less stable

```bash
windows/meterpreter/reverse_tcp
                   ^
```
