# openssl

## General

### Generate a new private key and Certificate Signing Request

```text
openssl req -out CSR.csr -new -newkey rsa:2048 -nodes -keyout privateKey.key
```

### Generate a self-signed certificate

```text
openssl req -x509 -sha256 -nodes -days 365 -newkey rsa:2048 -keyout privateKey.key -out certificate.crt
```

### Generate a certificate signing request \(CSR\) for an existing private key

```text
openssl req -out CSR.csr -key privateKey.key -new
```

### Generate a certificate signing request based on an existing certificate

```text
openssl x509 -x509toreq -in certificate.crt -out CSR.csr -signkey privateKey.key
```

### Remove a passphrase from a private key

```text
openssl rsa -in privateKey.pem -out newPrivateKey.pem
```

### Generate DH params with a given length:

```text
openssl dhparam -out dhparams.pem [bits]
```

## Checking

### Check a Certificate Signing Request \(CSR\)

```text
openssl req -text -noout -verify -in CSR.csr
```

### Check a private key

```text
openssl rsa -in privateKey.key -check
```

### Check a certificate

```text
openssl x509 -in certificate.crt -text -noout
```

### Check a PKCS\#12 file \(.pfx or .p12\)

```text
openssl pkcs12 -info -in keyStore.p12
```

## Debugging

### Check an MD5 hash of the public key to ensure that it matches with what is in a CSR or private key

```text
openssl x509 -noout -modulus -in certificate.crt | openssl md5
openssl rsa -noout -modulus -in privateKey.key | openssl md5
openssl req -noout -modulus -in CSR.csr | openssl md5
```

### Measure speed of various security algorithms

```text
openssl speed rsa2048
openssl speed ecdsap256
```

## Converting

### Convert a DER file \(.crt .cer .der\) to PEM

```text
openssl x509 -inform der -in certificate.cer -out certificate.pem
```

### Convert a PEM file to DER

```text
openssl x509 -outform der -in certificate.pem -out certificate.der
```

### Convert a PKCS\#12 file \(.pfx .p12\) containing a private key and certificates to PEM

```text
openssl pkcs12 -in keyStore.pfx -out keyStore.pem -nodes
```

### Convert a PEM certificate file and a private key to PKCS\#12 \(.pfx .p12\)

```text
openssl pkcs12 -export -out certificate.pfx -inkey privateKey.key -in certificate.crt -certfile CACert.crt
```

## List cipher suites

```text
openssl ciphers -v
```

## check certificate revocation status

First, retrieve the certificate from a remote server:

```text
openssl s_client -connect example.com:443 2>&1 < /dev/null | sed -n '/-----BEGIN/,/-----END/p' > cert.pem
```

You’d also need to obtain intermediate CA certificate chain. Use -showcerts flag to show full certificate chain, and manually save all intermediate certificates to chain.pem file:

```text
openssl s_client -showcerts -host example.com -port 443 </dev/null
```

Read OCSP endpoint URI from the certificate:

```text
openssl x509 -in cert.pem -noout -ocsp_uri
```

Request a remote OCSP responder for certificate revocation status using the URI from the above step \(e.g. [http://ocsp.stg-int-x1.letsencrypt.org](http://ocsp.stg-int-x1.letsencrypt.org)\).

```text
openssl ocsp -header "Host" "ocsp.stg-int-x1.letsencrypt.org" -issuer chain.pem -VAfile chain.pem -cert cert.pem -text -url http://ocsp.stg-int-x1.letsencrypt.org
```

