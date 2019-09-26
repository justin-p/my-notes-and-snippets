# uniq

show each unique line.

```text
uniq file1
```

show how many times a line accurse.

```text
uniq -c file1
```

only print duplicate lines

```text
uniq -D file1
```

only print non-repetitive lines

```text
uniq -u file1
```

avoid comparing set number of initial characters

```text
uniq -s 4 file1
```

limit comparison to set number of chars

```text
uniq -w 3 file1
```

uniq comparison case insensitive

```text
uniq -i file1
```

uniq output NUL-terminated

```text
uniq -z file1
```

