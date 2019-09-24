# tr

replace lowercase letters with uppercase

    cat file1 | tr "[a-z]" "[A-Z]"
    cat file1 | tr "[:lower:]" "[:upper:]"

replace spaces with tabs

    echo "file1 file2 file3" | tr [:space:] '\t'

remove specified characters

    echo 'abcdefg' | tr -d 'a'

remove all the digits from the string

    echo "123a467b890c" | tr -d [:digit:]

remove all characters execpt digets

    echo "123a467b890c" | tr -cd [:digit:]

