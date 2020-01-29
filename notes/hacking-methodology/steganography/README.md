# Steganography

https://0xrick.github.io/lists/stego/

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

## binwalk

Binwalk is a tool for searching binary files like images and audio files for embedded files and data. 

```
binwalk file
```


## foremost

Foremost is a program that recovers files based on their headers , footers and internal data structures.

```
foremost -i file
```

## NTFS Alternate Data Streams

[info](https://www.secjuice.com/ntfs-steganography-hiding-in-plain-sight/)

cmd

`dir /r`

powershell

`gci -recurse | % { gi $_.FullName -stream * } | where stream -ne ':$Data' | select filename,stream,@{'name'='identifier';"e"={"$($_.filename)$($_.stream)"}}`