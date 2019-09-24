# awk

[source](https://thornelabs.net/posts/awk-commands-cheat-sheet.html)

## Print N columns from all rows

Print the first column from all rows:

    awk '{print $1}'

Print the first and third columns from all rows:

    awk '{print $1, $3}'

The comma between the column parameters in the previous command will put a space between the outputted columns. However, you can change this behavior and use your own formatting:

    awk '{print $1 " --- " $3}'

## Change the field delimiter and print the second column

By default, awk will parse a row into columns using a space as the delimiter. The delimiter can be changed with the -F command line switch.

For example, change the delimiter to a semicolon:

    awk -F: '{print $2}'

The field delimiter could be anything such as an equal sign, -F=, or a period, -F..

## Print the last column from all rows

There are plenty of situations where you might need to print the last column from a given row, but you do not know how many columns are on that given row. The built-in variable NF can be used to solve this.

    awk '{print $NF}'

## Print the last column from the first row

Another built-in variable is NR which always contains the current row number. This can be used to do such things as printing the last column from only the first row:

    awk 'NR==1 {print $NF}'

## Print the first column from all rows matching a regular expression

If you want to print particular columns only from rows that match certain conditions, you can pass a regular expression:

    awk '/regular-expression-to-match/ {print $1}'

## Print the first column from all rows except rows matching a regular expression

You can also invert your regular expression match by putting an exclamation mark outside of the search field:

    awk '!/regular-expression-to-match/ {print $1}'
