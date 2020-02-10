# Attack Vectors/Strategies

- At the start of the day or after lunch start up either
  - responder (llmnr)
  - mitm6 (IPv6)
- Run nessus/nmap scans to generate traffic
  - if scans take to long look for websites that are in scope.
    - Check for default creds on printers etc.
      - if we get in, check for Scan to Mail/SMB/FTP etc.
- Start relaying LLMNR hashes during the end of the day
