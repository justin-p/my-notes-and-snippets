print("custom nested list function.\n")
# 'flatten' a nested list
def flatten(li):
    result=[]
    for sub_i in li:
        for i in sub_i:
            result.append(i)
    return result
    
# do math. input multiplied by input
def calculate(n):
    return n*n

# define lists
nested_list=[[1,2],[3,5]]
bigger_nested_list = [[1,2,3,4],[5,6,7,8],[9,10,11,12]]
wierd_netsted_list = [[1,2,3],[4,5,6,7],[8,]]

# flaten the list, call math function on each item in the flatend list with map, convert the result back to a list and print the outcome.
print(list(map(calculate, flatten(nested_list))))
print(list(map(calculate, flatten(bigger_nested_list))))
print(list(map(calculate, flatten(wierd_netsted_list))))
print("\n")