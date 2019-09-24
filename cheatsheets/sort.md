# sort

sort something

    cat file1 | sort

sort by 5th column

    ls -al | sort -n -k5

sort numerically by column two

    ps auxw | sort -nk2

reverse sort numerically by column two

    ps auxw | sort -rnk2

sort a file contents to file

    sort file1 > file1.sorted

scramble instead of sort

    sort -R file1
    sort -R file1 --random-source=/dev/random

ignore case

    sort -f file1
    sort -fs file1
