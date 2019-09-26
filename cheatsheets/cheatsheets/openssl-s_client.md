# s\_client

## Check an SSL connection

```text
openssl s_client -connect example.com:443
openssl s_client -host example.com -port 443
```

## Make an SSL connection. Hide most info

```text
openssl s_client --connect 127.0.0.1:30001 -quiet
depth=0 CN = localhost
verify error:num=18:self signed certificate
verify return:1
depth=0 CN = localhost
verify return:1
```

## show full certificate chain

```text
openssl s_client -showcerts -host example.com -port 443 </dev/null
```

## Extract the certificate

```text
openssl s_client -connect example.com:443 2>&1 < /dev/null | sed -n '/-----BEGIN/,/-----END/p' > certificate.pem
```

## Test for TLS/SSL version cipher

```text
openssl s_client -host example.com -port 443 -ssl3 2>&1 </dev/null
```

Options

```text
-ssl2  
-ssl3  
-tls1  
-tls1_1  
-tls1_2
```

## Test for specific cipher

```text
openssl s_client -host example.com -port 443 -cipher        ECDHE-RSA-AES128-GCM-SHA256 2>&1 </dev/null
```

## Measure SSL connection time without/with session reuse

```text
openssl s_time -connect example.com:443 -new
openssl s_time -connect example.com:443 -reuse
```

