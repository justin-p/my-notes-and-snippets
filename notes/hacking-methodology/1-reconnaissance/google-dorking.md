# Google Fu/Dorking

## External services

| Service                                                    | info                                            |
|------------------------------------------------------------|-------------------------------------------------|
| [GHDB](https://www.exploit-db.com/google-hacking-database) | Google Hacking Database                         |


## EXACT-MATCH

Force an exact-match search. Use this to refine results for ambiguous searches, or to exclude synonyms when searching for single words.

```
"Dank memes"
```

## OR

Search for X or Y. This will return results related to X or Y, or both.  
Note: The pipe (|) operator can also be used in place of "OR".

```
dank OR memes
dank | memes
```

## AND

Search for X and Y. This will return only results related to both X and Y.  
Note: It doesn’t really make much difference for regular searches, as Google defaults to "AND" anyway. But it’s very useful when paired with other operators.

```
dank AND memes
```

## EXCLUDE

Exclude a term or phrase. In our example, any pages returned will be related to (dank) memes but not fresh.

```
memes -fresh
```

## WILDCARD

Acts as a wildcard and will match any word or phrase.

```
dank * memes
```

## GROUP TERMS

Group multiple terms or search operators to control how the search is executed.

```
(fresh OR dank) memes
```

## PRICES

Search for prices. Also works for Euro (€), but not GBP (£) 🙁

```
liver $329
```

## DEFINE:

A dictionary built into Google, basically. This will display the meaning of a word in a card-like result in the SERPs.

```
define:mimikatz
```

![define](https://raw.githubusercontent.com/justin-p/my-notes-and-snippets/master/.gitbook/assets/IMG/define.png)

## CACHE:

Returns the most recent cached version of a web page (providing the page is indexed, of course).

```
cache:reddit.com
```

## FILETYPE:
Restrict results to those of a certain filetype. E.g., PDF, DOCX, TXT, PPT, XLSX, CSV, etc.  
Note: The "ext:" operator can also be used—the results are identical.

```
classified filetype:pdf
classified ext:pdf
```

## SITE:

Limit results to those from a specific website.

```
site:reddit.com
```

## RELATED:

Find sites related to a given domain.

```
related:reddit.com
```

## INTITLE:

Find pages with a certain word (or words) in the title.  
In our example, the exact words "index of /" in the title tag will be returned.

```
intitle:"index of /"
```

## ALLINTITLE:

Similar to "intitle", but only results containing all of the specified words in the title tag will be returned.

```
intitle:index of /
```

## INURL:

Find pages with a certain word (or words) in the URL. For this example, any results containing the word "memes" in the URL will be returned.

```
inurl:memes
```

## ALLINURL:

Similar to "inurl", but only results containing all of the specified words in the URL will be returned.

```
allinurl:dank memes
```

## INTEXT:

Find pages containing a certain word (or words) somewhere in the content. For this example, any results containing the word "memes" in the page content will be returned.

```
intext:memes
```

## ALLINTEXT:

Similar to "intext", but only results containing all of the specified words somewhere on the page will be returned.

```
allintext:dank memes
```

## AROUND(X)

Proximity search. Find pages containing two words or phrases within X words of each other. For this example, the words "dank" and "funny" must be present in the content and no further than four words apart.

```
dank AROUND(4) funny
```

## WEATHER:

Find the weather for a specific location. This is displayed in a weather snippet, but it also returns results from other "weather" websites.

```
weather:rotterdam
```

## STOCKS:

See stock information (i.e., price, etc.) for a specific ticker.

```
stocks:nintendo
```

## MAP:

Force Google to show map results for a locational search.

```
map:rotterdam
```

## MOVIE:

```
movie:war games
```

## IN

Convert one unit to another. Works with currencies, weights, temperatures, etc.

```
420 euros in usd
```

## SOURCE:

Find news results from a certain source in Google News.

```
malware source:security.nl
```

## #..#

Search for a range of numbers.

```
arcade 1980..1990
```

## INANCHOR:

Find pages that are being linked to with specific anchor text.

```
inanchor:apple iphone
```

## ALLINANCHOR:

Similar to "inanchor", but only results containing all of the specified words in the inbound anchor text will be returned.

```
allinanchor:apple iphone
```

## BLOGURL:

Find blog URLs under a specific domain. This was used in Google blog search, but I’ve found it does return some results in regular search.

```
blogurl:microsoft.com
```

## LOCATION:

Find results from a given area.

```
location:"rotterdam" taco
```
