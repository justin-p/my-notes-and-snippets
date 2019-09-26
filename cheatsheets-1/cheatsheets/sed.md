# sed

[source](https://lzone.de/cheat-sheet/sed)

## Command Syntax

```text
/abc/p      # Print all with "abc"
/abc/!p     # Print all without "abc"
/abc/d      # Delete all with "abc"
/abc/!d     # Delete all without "abc"

/start/,/end/!d     # Select a block

s/abc/def/
s/abc\(...\)ghi/\1/ # Back references 
            # (see below for correct Shell quoting)

/abc/{s/def/ghi)}   # Conditional replace
```

Appending lines

```text
aHallo                   # Append 'Hallo' after each line
5 aHallo                 # Append 'Hallo' after line #5
$ aHallo                 # Append 'Hallo' to end of file
```

Prepending lines

```text
sed -i '1s;^;new line 1\nanother new line 2\n;' <file>
```

## Advanced use of sed

### In-place Editing

To edit file use the -i option this safely changes the file contents without any output redirection needed.

```text
sed -i 's/abc/ABC/' myfile.txt
sed -i '/deleteme/d' *
```

### Drop grep

Often grep and sed are used together. In all those cases grep can be dropped. For example

```text
grep "pattern" file | sed "s/abc/def/"
```

can be written as

```text
sed -n "/pattern/p; s/abc/def/"
```

### Grouping with sed

Always use single quotes!

```text
sed 's/^.*\(pattern\).*/\1/'
```

### Single Quoting Single Quotes

If you want to do extraction and need a pattern based on single quotes use \x27 instead of trying to insert a single quote. For example:

```text
sed 's/.*var=\x27\([^\x27]*\)\x27.*/\1/'
```

to extract "some string" from "var='some string'". Or if you don't know about the quoting, but know there are quotes

```text
sed 's/.*var=.\([^"\x27]*\)..*/\1/'
```

### Conditional Replace with sed

```text
sed '/conditional pattern/{s/pattern/replacement/g}'
```

### Prefix files with a boilerplate using sed

```text
sed -i '1s/^/# DO NOT TOUCH THIS FILE!\n\n/' *
```

### Removing Newlines with sed

The only way to remove new line is this:

```text
sed ':a;N;$!ba;s/\n//g' file
```

Check out [this explanation](https://github.com/justin-p/my-notes-and-snippets/tree/74f716cc82d13ca4d6e66598d9ef57b85b0c2bd2/Removing-newlines-with-sed/README.md) if you want to know why.

### Selecting Blocks

```text
sed '/first line/,/last line/!d' file
```

