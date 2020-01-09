# Steganography

## steghide 


### get info

```
root@kali:/mnt/hgfs/_shared_folder# steghide  info hawking
"hawking":
  format: jpeg
  capacity: 3.3 KB
Try to get information about embedded data ? (y/n) y
Enter passphrase: 
  embedded file "flag.txt":
    size: 1.6 KB
    encrypted: rijndael-128, cbc
    compressed: yes
```

### extract data

```
root@kali:/mnt/hgfs/_shared_folder# steghide --extract -sf hawking -p hawking
wrote extracted data to "flag.txt".
```