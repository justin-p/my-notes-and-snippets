# md5sum

display the hash value

    md5sum file1

validate multiple files

    md5sum file1 file2 file3 > hashes
    md5sum --check hashes

display only modified files

    md5sum --quiet --check hashes

identify invalid hash values

    md5sum --warn --check hashes
