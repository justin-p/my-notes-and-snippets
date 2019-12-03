from funcy import flatten, isa
print("public library 'funcy' that supports deeper nests that my function.")
print("run: 'pip3 install funcy' before running script\n")
# do math. input multiplied by input
def calculate(n):
    return n*n

# define lists
nested_list=[[1,2],[3,5]]
wierd_netsted_list = [[1,2,3],[4,5,6,7],[8,]]
bigger_nested_list = [[1,2,3,4],[5,6,7,8],[9,10,11,12,]]
even_bigger_nested_list = [[1,2,3,4],[5,6,7,8],[9,10,11,12,[13,14,[15,16,17,[18,19,20],21,22,23],24,25],26,27],28,29]

# flaten the list, call math function on each item in the flatend list with map, convert the result back to a list and print the outcome.
print(list(map(calculate, flatten(nested_list))))
print(list(map(calculate, flatten(wierd_netsted_list))))
print(list(map(calculate, flatten(bigger_nested_list))))
print(list(map(calculate, flatten(even_bigger_nested_list))))
print("\n")