# Bash

sourced from https://devhints.io/bash
## 'Good Guy' stuff

### Getting started

#### Example

```bash
#!/usr/bin/env bash

NAME="John"
echo "Hello $NAME!"
```

#### Variables

```bash
NAME="John"
echo $NAME
echo "$NAME"
echo "${NAME}!"
```

#### String quotes

```bash
NAME="John"
echo "Hi $NAME"  #=> Hi John
echo 'Hi $NAME'  #=> Hi $NAME
```

#### Shell execution

```bash
echo "I'm in $(pwd)"
echo "I'm in `pwd`"
# Same
```

See [Command substitution](http://wiki.bash-hackers.org/syntax/expansion/cmdsubst)

#### Conditional execution

```bash
git commit && git push
git commit || echo "Commit failed"
```

#### Functions

```bash
get_name() {
  echo "John"
}

echo "You are $(get_name)"
```

See: [Functions](#functions)

#### Conditionals

```bash
if [[ -z "$string" ]]; then
  echo "String is empty"
elif [[ -n "$string" ]]; then
  echo "String is not empty"
fi
```

See: [Conditionals](#conditionals)

#### Strict mode

```bash
set -euo pipefail
IFS=$'\n\t'
```

See: [Unofficial bash strict mode](http://redsymbol.net/articles/unofficial-bash-strict-mode/)

#### Brace expansion

```bash
echo {A,B}.js
```
| Code | Description |
| --- | --- |
| `{A,B}` | Same as `A B` |
| `{A,B}.js` | Same as `A.js B.js` |
| `{1..5}` | Same as `1 2 3 4 5` |

See: [Brace expansion](http://wiki.bash-hackers.org/syntax/expansion/brace)


#### Parameter expansions

##### Basics

```bash
name="John"
echo ${name}
echo ${name/J/j}    #=> "john" (substitution)
echo ${name:0:2}    #=> "Jo" (slicing)
echo ${name::2}     #=> "Jo" (slicing)
echo ${name::-1}    #=> "Joh" (slicing)
echo ${name:(-1)}   #=> "n" (slicing from right)
echo ${name:(-2):1} #=> "h" (slicing from right)
echo ${food:-Cake}  #=> $food or "Cake"
```

```bash
length=2
echo ${name:0:length}  #=> "Jo"
```

See: [Parameter expansion](http://wiki.bash-hackers.org/syntax/pe)

```bash
STR="/path/to/foo.cpp"
echo ${STR%.cpp}    # /path/to/foo
echo ${STR%.cpp}.o  # /path/to/foo.o

echo ${STR####*.}     # cpp (extension)
echo ${STR####*/}     # foo.cpp (basepath)

echo ${STR#*/}      # path/to/foo.cpp
echo ${STR####*/}     # foo.cpp

echo ${STR/foo/bar} # /path/to/bar.cpp
```

```bash
STR="Hello world"
echo ${STR:6:5}   # "world"
echo ${STR:-5:5}  # "world"
```

```bash
SRC="/path/to/foo.cpp"
BASE=${SRC####*/}   #=> "foo.cpp" (basepath)
DIR=${SRC%$BASE}  #=> "/path/to/" (dirpath)
```

#### Substitution

| Code | Description |
| --- | --- |
| `${FOO%suffix}` | Remove suffix |
| `${FOO#prefix}` | Remove prefix |
|   |   |
| `${FOO%%suffix}` | Remove long suffix |
| `${FOO####prefix}` | Remove long prefix |
|   |   |
| `${FOO/from/to}` | Replace first match |
| `${FOO//from/to}` | Replace all |
|   |   |
| `${FOO/%from/to}` | Replace suffix |
| `${FOO/#from/to}` | Replace prefix |

#### Comments

```bash
# Single line comment
```

```bash
: '
This is a
multi line
comment
'
```

#### Substrings
| Code | Description |
| --- | --- |
| `${FOO:0:3}`  | Substring _(position, length)_ |  
| `${FOO:-3:3}` | Substring from the right |  

#### Length

| Code | Description |
| --- | --- |
| `${#FOO}` | Length of `$FOO` |

#### Manipulation

```bash
STR="HELLO WORLD!"
echo ${STR,}   #=> "hELLO WORLD!" (lowercase 1st letter)
echo ${STR,,}  #=> "hello world!" (all lowercase)

STR="hello world!"
echo ${STR^}   #=> "Hello world!" (uppercase 1st letter)
echo ${STR^^}  #=> "HELLO WORLD!" (all uppercase)
```


#### Default values

| Code | Description |
| --- | --- |
| `${FOO:-val}`        | `$FOO`, or `val` if not set |
| `${FOO:=val}`        | Set `$FOO` to `val` if not set |
| `${FOO:+val}`        | `val` if `$FOO` is set |
| `${FOO:?message}`    | Show error message and exit if `$FOO` is not set |

The `:` is optional (eg, `${FOO=word}` works)

### Loops

#### Basic for loop

```bash
for i in /etc/rc.*; do
  echo $i
done
```

#### C-like for loop

```bash
for ((i = 0 ; i < 100 ; i++)); do
  echo $i
done
```

#### Ranges

```bash
for i in {1..5}; do
    echo "Welcome $i"
done
```

##### With step size

```bash
for i in {5..50..5}; do
    echo "Welcome $i"
done
```

#### Reading lines

```bash
< file.txt | while read line; do
  echo $line
done
```

#### Forever

```bash
while true; do
  ···
done
```

### Functions

#### Defining functions

```bash
myfunc() {
    echo "hello $1"
}
```

```bash
# Same as above (alternate syntax)
function myfunc() {
    echo "hello $1"
}
```

```bash
myfunc "John"
```

#### Returning values

```bash
myfunc() {
    local myresult='some value'
    echo $myresult
}
```

```bash
result="$(myfunc)"
```

#### Raising errors

```bash
myfunc() {
  return 1
}
```

```bash
if myfunc; then
  echo "success"
else
  echo "failure"
fi
```

#### Arguments

| Expression | Description                        |
| ---        | ---                                |
| `$#`       | Number of arguments                |
| `$*`       | All arguments                      |
| `$@`       | All arguments, starting from first |
| `$1`       | First argument                     |

See [Special parameters](http://wiki.bash-hackers.org/syntax/shellvars#special_parameters_and_shell_variables).

### Conditionals


#### Conditions

Note that `[[` is actually a command/program that returns either `0` (true) or `1` (false). Any program that obeys the same logic (like all base utils, such as `grep(1)` or `ping(1)`) can be used as condition, see examples.

| Condition                | Description           |
| ---                      | ---                   |
| `[[ -z STRING ]]`        | Empty string          |
| `[[ -n STRING ]]`        | Not empty string      |
| `[[ STRING == STRING ]]` | Equal                 |
| `[[ STRING != STRING ]]` | Not Equal             |
|                       |                    |
| `[[ NUM -eq NUM ]]`      | Equal                 |
| `[[ NUM -ne NUM ]]`      | Not equal             |
| `[[ NUM -lt NUM ]]`      | Less than             |
| `[[ NUM -le NUM ]]`      | Less than or equal    |
| `[[ NUM -gt NUM ]]`      | Greater than          |
| `[[ NUM -ge NUM ]]`      | Greater than or equal |
|                       |                    |
| `[[ STRING =~ STRING ]]` | Regexp                |
|                       |                    |
| `(( NUM < NUM ))`        | Numeric conditions    |

| Condition              | Description              |
| ---                    | ---                      |
| `[[ -o noclobber ]]`   | If OPTIONNAME is enabled |
| ---                    | ---                      |
| `[[ ! EXPR ]]`         | Not                      |
| `[[ X ]] && [[ Y ]]`   | And                      |
| `[[ X ]] || [[ Y ]]`   | Or                       |

#### File conditions

| Condition               | Description             |
| ---                     | ---                     |
| `[[ -e FILE ]]`         | Exists                  |
| `[[ -r FILE ]]`         | Readable                |
| `[[ -h FILE ]]`         | Symlink                 |
| `[[ -d FILE ]]`         | Directory               |
| `[[ -w FILE ]]`         | Writable                |
| `[[ -s FILE ]]`         | Size is > 0 bytes       |
| `[[ -f FILE ]]`         | File                    |
| `[[ -x FILE ]]`         | Executable              |
|                      |                      |
| `[[ FILE1 -nt FILE2 ]]` | 1 is more recent than 2 |
| `[[ FILE1 -ot FILE2 ]]` | 2 is more recent than 1 |
| `[[ FILE1 -ef FILE2 ]]` | Same files              |

##### Examples

```bash
if ping -c 1 google.com; then
  echo "It appears you have a working internet connection"
fi
```` 

```bash
if grep -q 'foo' ~/.bash_history; then
  echo "You appear to have typed 'foo' in the past"
fi
```

```bash
# String
if [[ -z "$string" ]]; then
  echo "String is empty"
elif [[ -n "$string" ]]; then
  echo "String is not empty"
fi
```

```bash
# Combinations
if [[ X ]] && [[ Y ]]; then
  ...
fi
```

```bash
# Equal
if [[ "$A" == "$B" ]]
```

```bash
# Regex
if [[ "A" =~ "." ]]
```

```bash
if (( $a < $b )); then
   echo "$a is smaller than $b"
fi
```

```bash
if [[ -e "file.txt" ]]; then
  echo "file exists"
fi
```

### Arrays

#### Defining arrays

```bash
Fruits=('Apple' 'Banana' 'Orange')
```

```bash
Fruits[0]="Apple"
Fruits[1]="Banana"
Fruits[2]="Orange"
```

#### Working with arrays

```bash
echo ${Fruits[0]}           # Element #0
echo ${Fruits[@]}           # All elements, space-separated
echo ${#Fruits[@]}          # Number of elements
echo ${#Fruits}             # String length of the 1st element
echo ${#Fruits[3]}          # String length of the Nth element
echo ${Fruits[@]:3:2}       # Range (from position 3, length 2)
```

#### Operations

```bash
Fruits=("${Fruits[@]}" "Watermelon")    # Push
Fruits+=('Watermelon')                  # Also Push
Fruits=( ${Fruits[@]/Ap*/} )            # Remove by regex match
unset Fruits[2]                         # Remove one item
Fruits=("${Fruits[@]}")                 # Duplicate
Fruits=("${Fruits[@]}" "${Veggies[@]}") # Concatenate
lines=(`cat "logfile"`)                 # Read from file
```

#### Iteration

```bash
for i in "${arrayName[@]}"; do
  echo $i
done
```

### Dictionaries


#### Defining

```bash
declare -A sounds
```

```bash
sounds[dog]="bark"
sounds[cow]="moo"
sounds[bird]="tweet"
sounds[wolf]="howl"
```

Declares `sound` as a Dictionary object (aka associative array).

#### Working with dictionaries

```bash
echo ${sounds[dog]} # Dog's sound
echo ${sounds[@]}   # All values
echo ${!sounds[@]}  # All keys
echo ${#sounds[@]}  # Number of elements
unset sounds[dog]   # Delete dog
```

#### Iteration

##### Iterate over values

```bash
for val in "${sounds[@]}"; do
  echo $val
done
```

##### Iterate over keys

```bash
for key in "${!sounds[@]}"; do
  echo $key
done
```

### Options

#### Options

```bash
set -o noclobber  # Avoid overlay files (echo "hi" > foo)
set -o errexit    # Used to exit upon error, avoiding cascading errors
set -o pipefail   # Unveils hidden failures
set -o nounset    # Exposes unset variables
```

#### Glob options

```bash
set -o nullglob    # Non-matching globs are removed  ('*.foo' => '')
set -o failglob    # Non-matching globs throw errors
set -o nocaseglob  # Case insensitive globs
set -o globdots    # Wildcards match dotfiles ("*.sh" => ".foo.sh")
set -o globstar    # Allow ** for recursive matches ('lib/**/*.rb' => 'lib/a/b/c.rb')
```

Set `GLOBIGNORE` as a colon-separated list of patterns to be removed from glob
matches.

### History


#### Commands
| Code | Description |
| --- | --- |
| `history` | Show history |
| `shopt -s histverify` | Don't execute expanded result immediately |

#### Expansions

| Code | Description |
| --- | --- |
| `!$` | Expand last parameter of most recent command |
| `!*` | Expand all parameters of most recent command |
| `!-n` | Expand `n`th most recent command |
| `!n` | Expand `n`th command in history |
| `!<command>` | Expand most recent invocation of command `<command>` |

#### Operations

| Code | Description |
| --- | --- |
| `!!` | Execute last command again |         
| `!!:s/<FROM>/<TO>/` | Replace first occurrence of `<FROM>` to `<TO>` in most recent command |
| `!!:gs/<FROM>/<TO>/` | Replace all occurrences of `<FROM>` to `<TO>` in most recent command |
| `!$:t` | Expand only basename from last parameter of most recent command |
| `!$:h` | Expand only directory from last parameter of most recent command |

`!!` and `!$` can be replaced with any valid expansion.

#### Slices

| Code | Description |
| --- | --- |
| `!!:n` | Expand only `n`th token from most recent command (command is `0`; first argument is `1`) |
| `!^` | Expand first argument from most recent command |
| `!$` | Expand last token from most recent command |
| `!!:n-m` | Expand range of tokens from most recent command |
| `!!:n-$` | Expand `n`th token to last from most recent command |

`!!` can be replaced with any valid expansion i.e. `!cat`, `!-2`, `!42`, etc.

### Miscellaneous

#### Numeric calculations

```bash
$((a + 200))      # Add 200 to $a
```

```bash
$((RANDOM%=200))  # Random number 0..200
```

#### Subshells

```bash
(cd somedir; echo "I'm now in $PWD")
pwd # still in first directory
```

#### Redirection

```bash
python hello.py > output.txt   # stdout to (file)
python hello.py >> output.txt  # stdout to (file), append
python hello.py 2> error.log   # stderr to (file)
python hello.py 2>&1           # stderr to stdout
python hello.py 2>/dev/null    # stderr to (null)
python hello.py &>/dev/null    # stdout and stderr to (null)
```

```bash
python hello.py < foo.txt      # feed foo.txt to stdin for python
```

#### Inspecting commands

```bash
command -V cd
#=> "cd is a function/alias/whatever"
```

#### Trap errors

```bash
trap 'echo Error at about $LINENO' ERR
```

or

```bash
traperr() {
  echo "ERROR: ${BASH_SOURCE[1]} at about ${BASH_LINENO[0]}"
}

set -o errtrace
trap traperr ERR
```

#### Case/switch

```bash
case "$1" in
  start | up)
    vagrant up
    ;;

  *)
    echo "Usage: $0 {start|stop|ssh}"
    ;;
esac
```

#### Source relative

```bash
source "${0%/*}/../share/foo.sh"
```

#### printf

```bash
printf "Hello %s, I'm %s" Sven Olga
#=> "Hello Sven, I'm Olga
```

#### Directory of script

```bash
DIR="${0%/*}"
```

#### Getting options

```bash
while [[ "$1" =~ ^- && ! "$1" == "--" ]]; do case $1 in
  -V | --version )
    echo $version
    exit
    ;;
  -s | --string )
    shift; string=$1
    ;;
  -f | --flag )
    flag=1
    ;;
esac; shift; done
if [[ "$1" == '--' ]]; then shift; fi
```

#### Heredoc

```sh
cat <<END
hello world
END
```

#### Reading input

```bash
echo -n "Proceed? [y/n]: "
read ans
echo $ans
```

```bash
read -n 1 ans    # Just one character
```

#### Special variables

| Code | Description |
| --- | --- |
| `$?` | Exit status of last task |
| `$!` | PID of last background task |
| `$$` | PID of shell |

See [Special parameters](http://wiki.bash-hackers.org/syntax/shellvars#special_parameters_and_shell_variables).

#### Go to previous directory

```bash
pwd # /home/user/foo
cd bar/
pwd # /home/user/foo/bar
cd -
pwd # /home/user/foo
```

#### Also see

* [Bash-hackers wiki](http://wiki.bash-hackers.org/) _(bash-hackers.org)_
* [Shell vars](http://wiki.bash-hackers.org/syntax/shellvars) _(bash-hackers.org)_
* [Learn bash in y minutes](https://learnxinyminutes.com/docs/bash/) _(learnxinyminutes.com)_
* [Bash Guide](http://mywiki.wooledge.org/BashGuide) _(mywiki.wooledge.org)_
* [ShellCheck](https://www.shellcheck.net/) _(shellcheck.net)_

### Random stuff (temp)

#### Usage of dash (-) in place of a filename

Using - as a filename to mean stdin/stdout is a convention that a lot of programs use. It is not a special property of the filename. The kernel does not recognise - as special so any system calls referring to - as a filename will use - literally as the filename.

With bash redirection, - is not recognised as a special filename, so bash will use that as the literal filename.

When cat sees the string - as a filename, it treats it as a synonym for stdin. To get around this, you need to alter the string that cat sees in such a way that it still refers to a file called -. The usual way of doing this is to prefix the filename with a path - ./-, or /home/Tim/-. This technique is also used to get around similar issues where command line options clash with filenames, so a file referred to as ./-e does not appear as the -e command line option to a program, for example.

```bash 
cat ./-
```

#### Find 

##### Example 1

In the current folder, find files that are readable, executable have a size of 1033 bytes, then send the files found over to cat.

```bash
find . -type f -readable ! -executable -size 1033c -exec cat {} \;
```

##### Example 2

In the current folder, find everything that has a size of 33 bytes, is owned by group bandit6 and user bandit7, redirect errors to /dev/null and send the stuff found over to cat.

```
find . -size 33c -group bandit6 -user bandit7 2> /dev/null -exec cat {} \;
```


#### Grep

##### find a string

Find the string `somestring` in data.txt

```bash
grep somestring data.txt
```

##### regex find

Find strings that start with 8 in data.txt

```bash
grep -E ^8.* data.txt
```

##### Quitetly find

Quitetly grep something. Usefull in bash sripts where you just want to check if its true.

```bash
grep -q somestring data.txt
```

```bash
if echo $curl_output | grep -q "regular user"; then
  echo "[-] $CurrentID out of $MaxCookieID is not a admin session."
else
  echo "[+] $CurrentID out of $MaxCookieID is a admin session."
  echo "$(echo $curl_output | grep Password)"
  break
fi
```

##### Negative grep

Negative grep. Find something that does not equal somestring.

```bash
grep -v somestring data.txt
```

#### cut

Split a string by something, select something that came before.

```bash
:/# echo "a string" | cut -d " " -f 1
a
:/# echo "a string" | cut -d " " -f 2
string
:/# echo "a string" | cut -d " " -f 3

```

#### xxd

##### Create a hexdump

```bash
xxd data.txt >> data.hex
```


##### Reverse a hexdump

```bash
xxd -r data.hex >> data.txt
```

##### skip to line 0x30

```bash
xxd -s 0x30 data.txt 

00000030: 6961 7c59 0a0a 3034 7c43 6869 6e61 7c4e  ia|Y..04|China|N
00000040: 0a30 357c 5275 7373 6961 7c59 0a30 367c  .05|Russia|Y.06|
00000050: 4a61 7061 6e7c 590a 0a30 377c 5369 6e67  Japan|Y..07|Sing
00000060: 7061 6f72 657c 590a 3038 7c53 6f75 7468  paore|Y.08|South
00000070: 204b 6f72 6561 7c4e 0a30 397c 4669 6e61   Korea|N.09|Fina
00000080: 6c61 6e64 7c59 0a31 307c 4972 656c 616e  land|Y.10|Irelan
00000090: 647c 590a                                d|Y.
```

##### dump untill line x30

```bash
xxd -l 0x30 data.txt

00000000: 4e6f 2e7c 436f 756e 7472 797c 5965 732f  No.|Country|Yes/
00000010: 4e6f 0a30 317c 496e 6469 617c 590a 3032  No.01|India|Y.02
00000020: 7c55 537c 590a 3033 7c41 7573 7472 616c  |US|Y.03|Austral
```

#### set column lenght

```
xxd -c 5 data.txt

00000000: 4e6f 2e7c 43  No.|C
00000005: 6f75 6e74 72  ountr
0000000a: 797c 5965 73  y|Yes
0000000f: 2f4e 6f0a 30  /No.0
00000014: 317c 496e 64  1|Ind
00000019: 6961 7c59 0a  ia|Y.
0000001e: 3032 7c55 53  02|US
00000023: 7c59 0a30 33  |Y.03
00000028: 7c41 7573 74  |Aust
0000002d: 7261 6c69 61  ralia
00000032: 7c59 0a0a 30  |Y..0
00000037: 347c 4368 69  4|Chi
0000003c: 6e61 7c4e 0a  na|N.
00000041: 3035 7c52 75  05|Ru
00000046: 7373 6961 7c  ssia|
0000004b: 590a 3036 7c  Y.06|
00000050: 4a61 7061 6e  Japan
```


#### Create binary dump

-b | -bits  
Switch to bits (binary digits) dump, rather than hexdump.  This option writes octets as eight digits "1"s and  "0"s  instead of  a  normal  hexadecimal  dump. Each line is preceded by a line number in hexadecimal and followed by an ascii (or ebcdic) representation. The command line switches -r, -p, -i do not work with this mode.

```
xxd -b data.txt
```


### openssl

#### General

##### Generate a new private key and Certificate Signing Request

```
openssl req -out CSR.csr -new -newkey rsa:2048 -nodes -keyout privateKey.key
```

##### Generate a self-signed certificate

```
openssl req -x509 -sha256 -nodes -days 365 -newkey rsa:2048 -keyout privateKey.key -out certificate.crt
```

##### Generate a certificate signing request (CSR) for an existing private key

```
openssl req -out CSR.csr -key privateKey.key -new
```

##### Generate a certificate signing request based on an existing certificate

```
openssl x509 -x509toreq -in certificate.crt -out CSR.csr -signkey privateKey.key
```

##### Remove a passphrase from a private key

```
openssl rsa -in privateKey.pem -out newPrivateKey.pem
```

##### Generate DH params with a given length:

```
openssl dhparam -out dhparams.pem [bits]
```

#### Checking

##### Check a Certificate Signing Request (CSR)

```
openssl req -text -noout -verify -in CSR.csr
```

##### Check a private key

```
openssl rsa -in privateKey.key -check
```

##### Check a certificate

```
openssl x509 -in certificate.crt -text -noout
```

##### Check a PKCS#12 file (.pfx or .p12)

```
openssl pkcs12 -info -in keyStore.p12
```

#### Debugging

##### Check an MD5 hash of the public key to ensure that it matches with what is in a CSR or private key

```
openssl x509 -noout -modulus -in certificate.crt | openssl md5
openssl rsa -noout -modulus -in privateKey.key | openssl md5
openssl req -noout -modulus -in CSR.csr | openssl md5
```

#### s_client

##### Check an SSL connection. 

```bash
openssl s_client -connect example.com:443
openssl s_client -host example.com -port 443
```

##### Make an SSL connection. Hide most info

```bash
openssl s_client --connect 127.0.0.1:30001 -quiet
depth=0 CN = localhost
verify error:num=18:self signed certificate
verify return:1
depth=0 CN = localhost
verify return:1
```


##### show full certificate chain

```
openssl s_client -showcerts -host example.com -port 443 </dev/null
```

##### Extract the certificate:

```
openssl s_client -connect example.com:443 2>&1 < /dev/null | sed -n '/-----BEGIN/,/-----END/p' > certificate.pem
```

##### Test for TLS/SSL version cipher

```
openssl s_client -host example.com -port 443 -ssl3 2>&1 </dev/null
```
Options:  
-ssl2  
-ssl3  
-tls1  
-tls1_1  
-tls1_2  


##### Test for spesefic cipher

```
openssl s_client -host example.com -port 443 -cipher ECDHE-RSA-AES128-GCM-SHA256 2>&1 </dev/null
```

#### Other

##### Measure SSL connection time without/with session reuse:

``` 
openssl s_time -connect example.com:443 -new
openssl s_time -connect example.com:443 -reuse
```

##### Measure speed of various security algorithms

```
openssl speed rsa2048
openssl speed ecdsap256
```

#### Converting

##### Convert a DER file (.crt .cer .der) to PEM

```
openssl x509 -inform der -in certificate.cer -out certificate.pem
```

##### Convert a PEM file to DER

```
openssl x509 -outform der -in certificate.pem -out certificate.der
```

##### Convert a PKCS#12 file (.pfx .p12) containing a private key and certificates to PEM

```
openssl pkcs12 -in keyStore.pfx -out keyStore.pem -nodes
```

##### Convert a PEM certificate file and a private key to PKCS#12 (.pfx .p12)

```
openssl pkcs12 -export -out certificate.pfx -inkey privateKey.key -in certificate.crt -certfile CACert.crt
```

#### List cipher suites

``` 
openssl ciphers -v
```

#### check certificate revocation status

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

### tmux

https://gist.githubusercontent.com/MohamedAlaa/2961058/raw/ddf157a0d7b1674a2190a80e126f2e6aec54f369/tmux-cheatsheet.markdown


start new:

    tmux

start new with session name:

    tmux new -s myname

attach:

    tmux a  #  (or at, or attach)

attach to named:

    tmux a -t myname

list sessions:

    tmux ls

<a name="killSessions"></a>kill session:

    tmux kill-session -t myname

<a name="killAllSessions"></a>Kill all the tmux sessions:

    tmux ls | grep : | cut -d. -f1 | awk '{print substr($1, 0, length($1)-1)}' | xargs kill

In tmux, hit the prefix `ctrl+b` (my modified prefix is ctrl+a) and then:

#### Sessions

    :new<CR>  new session
    s  list sessions
    $  name session

#### <a name="WindowsTabs"></a>Windows (tabs)

    c  create window
    w  list windows
    n  next window
    p  previous window
    f  find window
    ,  name window
    &  kill window

#### <a name="PanesSplits"></a>Panes (splits) 

    %  vertical split
    "  horizontal split
    
    o  swap panes
    q  show pane numbers
    x  kill pane
    +  break pane into window (e.g. to select text by mouse to copy)
    -  restore pane from window
    ⍽  space - toggle between layouts
    <prefix> q (Show pane numbers, when the numbers show up type the key to goto that pane)
    <prefix> { (Move the current pane left)
    <prefix> } (Move the current pane right)
    <prefix> z toggle pane zoom

#### <a name="syncPanes"></a>Sync Panes 

You can do this by switching to the appropriate window, typing your Tmux prefix (commonly Ctrl-B or Ctrl-A) and then a colon to bring up a Tmux command line, and typing:

```
:setw synchronize-panes
```

You can optionally add on or off to specify which state you want; otherwise the option is simply toggled. This option is specific to one window, so it won’t change the way your other sessions or windows operate. When you’re done, toggle it off again by repeating the command. [tip source](http://blog.sanctum.geek.nz/sync-tmux-panes/)


#### Resizing Panes

You can also resize panes if you don’t like the layout defaults. I personally rarely need to do this, though it’s handy to know how. Here is the basic syntax to resize panes:

    PREFIX : resize-pane -D (Resizes the current pane down)
    PREFIX : resize-pane -U (Resizes the current pane upward)
    PREFIX : resize-pane -L (Resizes the current pane left)
    PREFIX : resize-pane -R (Resizes the current pane right)
    PREFIX : resize-pane -D 20 (Resizes the current pane down by 20 cells)
    PREFIX : resize-pane -U 20 (Resizes the current pane upward by 20 cells)
    PREFIX : resize-pane -L 20 (Resizes the current pane left by 20 cells)
    PREFIX : resize-pane -R 20 (Resizes the current pane right by 20 cells)
    PREFIX : resize-pane -t 2 20 (Resizes the pane with the id of 2 down by 20 cells)
    PREFIX : resize-pane -t -L 20 (Resizes the pane with the id of 2 left by 20 cells)
    
    
#### Copy mode:

Pressing PREFIX [ places us in Copy mode. We can then use our movement keys to move our cursor around the screen. By default, the arrow keys work. we set our configuration file to use Vim keys for moving between windows and resizing panes so we wouldn’t have to take our hands off the home row. tmux has a vi mode for working with the buffer as well. To enable it, add this line to .tmux.conf:

    setw -g mode-keys vi

With this option set, we can use h, j, k, and l to move around our buffer.

To get out of Copy mode, we just press the ENTER key. Moving around one character at a time isn’t very efficient. Since we enabled vi mode, we can also use some other visible shortcuts to move around the buffer.

For example, we can use "w" to jump to the next word and "b" to jump back one word. And we can use "f", followed by any character, to jump to that character on the same line, and "F" to jump backwards on the line.

       Function                vi             emacs
       Back to indentation     ^              M-m
       Clear selection         Escape         C-g
       Copy selection          Enter          M-w
       Cursor down             j              Down
       Cursor left             h              Left
       Cursor right            l              Right
       Cursor to bottom line   L
       Cursor to middle line   M              M-r
       Cursor to top line      H              M-R
       Cursor up               k              Up
       Delete entire line      d              C-u
       Delete to end of line   D              C-k
       End of line             $              C-e
       Goto line               :              g
       Half page down          C-d            M-Down
       Half page up            C-u            M-Up
       Next page               C-f            Page down
       Next word               w              M-f
       Paste buffer            p              C-y
       Previous page           C-b            Page up
       Previous word           b              M-b
       Quit mode               q              Escape
       Scroll down             C-Down or J    C-Down
       Scroll up               C-Up or K      C-Up
       Search again            n              n
       Search backward         ?              C-r
       Search forward          /              C-s
       Start of line           0              C-a
       Start selection         Space          C-Space
       Transpose chars                        C-t

#### Misc

    d  detach
    t  big clock
    ?  list shortcuts
    :  prompt

#### Configurations Options:

    # Mouse support - set to on if you want to use the mouse
    * setw -g mode-mouse off
    * set -g mouse-select-pane off
    * set -g mouse-resize-pane off
    * set -g mouse-select-window off

    # Set the default terminal mode to 256color mode
    set -g default-terminal "screen-256color"

    # enable activity alerts
    setw -g monitor-activity on
    set -g visual-activity on

    # Center the window list
    set -g status-justify centre

    # Maximize and restore a pane
    unbind Up bind Up new-window -d -n tmp \; swap-pane -s tmp.1 \; select-window -t tmp
    unbind Down
    bind Down last-window \; swap-pane -s tmp.1 \; kill-window -t tmp

## 'Bad Guy' stuff

### Path vulnerability

If something searches the Path for a a command and where able to replace the path we can trick the system to execute something else.  
Whenever we use `ls` it will now actually run `cat`.

```bash
export PATH="/tmp/tmp:${PATH}"
cp /bin/cat /tmp/tmp/cat
mv /tmp/tmp/cat /tmp/tmp/ls
```