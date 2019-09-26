# md5sum

display the hash value

```text
md5sum file1
```

validate multiple files

```text
md5sum file1 file2 file3 > hashes
md5sum --check hashes
```

display only modified files

```text
md5sum --quiet --check hashes
```

identify invalid hash values

```text
md5sum --warn --check hashes
```

