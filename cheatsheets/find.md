# Find 

https://devhints.io/find

## Example 1

In the current folder, find files that are readable, executable have a size of 1033 bytes, then send the files found over to cat.

```bash
find . -type f -readable ! -executable -size 1033c -exec cat {} \;
```

## Example 2

In the current folder, find everything that has a size of 33 bytes, is owned by group bandit6 and user bandit7, redirect errors to /dev/null and send the stuff found over to cat.

```
find . -size 33c -group bandit6 -user bandit7 2> /dev/null -exec cat {} \;
```