# grep

## Find a string

Find the string `somestring` in data.txt

```bash
grep somestring data.txt
```

## Regex find

Find strings that start with 8 in data.txt

```bash
grep -E ^8.* data.txt
```

## Quietly find

Quietly grep something. Useful in bash scripts where you just want to check if its true.

```bash
grep -q somestring data.txt
```

```bash
if echo $curl_output | grep -q "regular user"; then
  echo "[-] $CurrentID out of $MaxCookieID is not a admin session."
else
  echo "[+] $CurrentID out of $MaxCookieID is a admin session."
  echo "$(echo $curl_output | grep Password)"
  break
fi
```

## Negative grep

Negative grep. Find something that does not equal somestring.

```bash
grep -v somestring data.txt
```

