def extent(*args):
    ## all num in args should be ints, otherwise return -1
    if (all((type(num)) == int for num in args)):
        ## setup a list, filter out unneeded doubles and sort it
        numbers=list(set(args))
        numbers.sort()
        ## return the last number in the list (lenght of numbers -1) minus first number in the list
        return numbers[len(numbers)-1]-numbers[0]
    else:
        return -1
print(extent(34, 30, 14, 50, 55,'a'))