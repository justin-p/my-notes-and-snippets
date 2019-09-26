# tr

replace lowercase letters with uppercase

```text
cat file1 | tr "[a-z]" "[A-Z]"
cat file1 | tr "[:lower:]" "[:upper:]"
```

replace spaces with tabs

```text
echo "file1 file2 file3" | tr [:space:] '\t'
```

remove specified characters

```text
echo 'abcdefg' | tr -d 'a'
```

remove all the digits from the string

```text
echo "123a467b890c" | tr -d [:digit:]
```

remove all characters execpt digets

```text
echo "123a467b890c" | tr -cd [:digit:]
```

