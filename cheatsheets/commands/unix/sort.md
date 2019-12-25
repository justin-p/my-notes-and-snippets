# sort

sort something

```text
cat file1 | sort
```

sort by 5th column

```text
ls -al | sort -n -k5
```

sort numerically by column two

```text
ps auxw | sort -nk2
```

reverse sort numerically by column two

```text
ps auxw | sort -rnk2
```

sort a file contents to file

```text
sort file1 > file1.sorted
```

scramble instead of sort

```text
sort -R file1
sort -R file1 --random-source=/dev/random
```

ignore case

```text
sort -f file1
sort -fs file1
```

