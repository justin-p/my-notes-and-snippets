# base64

Encode

```text
base64 -e
```

decode

```text
base64 -d
```

Ignore errors

```text
base64 -n
```

Ignore garbage

```text
base64 -i
```

## Examples

### Encode

```text
echo EncodeMe | base64 -e
```

### Decode

```text
echo RW5jb2RlTWU= | base64 -d
```

### Encode file

```text
base64 file1 > encodedfile1
```

### Decode file

```text
base64 -d encodedfile1 > file1
```

