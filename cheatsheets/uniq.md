# Uniq

show each unique line.

    uniq file1

show how many times a line accurse.

    uniq -c file1

only print duplicate lines

    uniq -D file1

only print non-repetitive lines

    uniq -u file1

avoid comparing set number of initial characters

    uniq -s 4 file1

limit comparison to set number of chars

    uniq -w 3 file1

uniq comparison case insensitive

    uniq -i file1

uniq output NUL-terminated

    uniq -z file1
