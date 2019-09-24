# openssl

## General

### Generate a new private key and Certificate Signing Request

```
openssl req -out CSR.csr -new -newkey rsa:2048 -nodes -keyout privateKey.key
```

### Generate a self-signed certificate

```
openssl req -x509 -sha256 -nodes -days 365 -newkey rsa:2048 -keyout privateKey.key -out certificate.crt
```

### Generate a certificate signing request (CSR) for an existing private key

```
openssl req -out CSR.csr -key privateKey.key -new
```

### Generate a certificate signing request based on an existing certificate

```
openssl x509 -x509toreq -in certificate.crt -out CSR.csr -signkey privateKey.key
```

### Remove a passphrase from a private key

```
openssl rsa -in privateKey.pem -out newPrivateKey.pem
```

### Generate DH params with a given length:

```
openssl dhparam -out dhparams.pem [bits]
```

## Checking

### Check a Certificate Signing Request (CSR)

```
openssl req -text -noout -verify -in CSR.csr
```

### Check a private key

```
openssl rsa -in privateKey.key -check
```

### Check a certificate

```
openssl x509 -in certificate.crt -text -noout
```

### Check a PKCS#12 file (.pfx or .p12)

```
openssl pkcs12 -info -in keyStore.p12
```

## Debugging

### Check an MD5 hash of the public key to ensure that it matches with what is in a CSR or private key

```
openssl x509 -noout -modulus -in certificate.crt | openssl md5
openssl rsa -noout -modulus -in privateKey.key | openssl md5
openssl req -noout -modulus -in CSR.csr | openssl md5
```

## s_client

### Check an SSL connection. 

```bash
openssl s_client -connect example.com:443
openssl s_client -host example.com -port 443
```

### Make an SSL connection. Hide most info

```bash
openssl s_client --connect 127.0.0.1:30001 -quiet
depth=0 CN = localhost
verify error:num=18:self signed certificate
verify return:1
depth=0 CN = localhost
verify return:1
```


### show full certificate chain

```
openssl s_client -showcerts -host example.com -port 443 </dev/null
```

### Extract the certificate:

```
openssl s_client -connect example.com:443 2>&1 < /dev/null | sed -n '/-----BEGIN/,/-----END/p' > certificate.pem
```

### Test for TLS/SSL version cipher

```
openssl s_client -host example.com -port 443 -ssl3 2>&1 </dev/null
```
Options:  
-ssl2  
-ssl3  
-tls1  
-tls1_1  
-tls1_2  


### Test for spesefic cipher

```
openssl s_client -host example.com -port 443 -cipher ECDHE-RSA-AES128-GCM-SHA256 2>&1 </dev/null
```

## Other

### Measure SSL connection time without/with session reuse:

``` 
openssl s_time -connect example.com:443 -new
openssl s_time -connect example.com:443 -reuse
```

### Measure speed of various security algorithms

```
openssl speed rsa2048
openssl speed ecdsap256
```

## Converting

### Convert a DER file (.crt .cer .der) to PEM

```
openssl x509 -inform der -in certificate.cer -out certificate.pem
```

### Convert a PEM file to DER

```
openssl x509 -outform der -in certificate.pem -out certificate.der
```

### Convert a PKCS#12 file (.pfx .p12) containing a private key and certificates to PEM

```
openssl pkcs12 -in keyStore.pfx -out keyStore.pem -nodes
```

### Convert a PEM certificate file and a private key to PKCS#12 (.pfx .p12)

```
openssl pkcs12 -export -out certificate.pfx -inkey privateKey.key -in certificate.crt -certfile CACert.crt
```

## List cipher suites

``` 
openssl ciphers -v
```

## check certificate revocation status

```
First, retrieve the certificate from a remote server:
openssl s_client -connect example.com:443 2>&1 < /dev/null | sed -n '/-----BEGIN/,/-----END/p' > cert.pem

You’d also need to obtain intermediate CA certificate chain. Use -showcerts flag to show full certificate chain, and manually save all intermediate certificates to chain.pem file:
openssl s_client -showcerts -host example.com -port 443 </dev/null

Read OCSP endpoint URI from the certificate:
openssl x509 -in cert.pem -noout -ocsp_uri

Request a remote OCSP responder for certificate revocation status using the URI from the above step (e.g. http://ocsp.stg-int-x1.letsencrypt.org).
openssl ocsp -header "Host" "ocsp.stg-int-x1.letsencrypt.org" -issuer chain.pem -VAfile chain.pem -cert cert.pem -text -url http://ocsp.stg-int-x1.letsencrypt.org
```