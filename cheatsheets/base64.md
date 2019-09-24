# base64

Encode

    base64 -e

decode 

    base64 -d

Ignore errors

    base64 -n

Ignore garbage

    base64 -i

## Examples

### Encode

    echo EncodeMe | base64 -e

### Decode

    echo RW5jb2RlTWU= | base64 -d

### Encode file

    base64 file1 > encodedfile1

### Decode file

    base64 -d encodedfile1 > file1
