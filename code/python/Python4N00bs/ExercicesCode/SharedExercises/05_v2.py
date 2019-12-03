# built in list method way
# https://www.programiz.com/python-programming/methods/list
wierd_list=[5,3,4,56,67,8,8,8,8,9,5,5,5,90,'paul']
wierd_list.sort()

build_in_five = wierd_list.count(5)
build_in_eight = wierd_list.count(8)
wierd_list.remove("paul")
wierd_list.append("Pauline")

print(build_in_five)
print(build_in_eight)
print(wierd_list)