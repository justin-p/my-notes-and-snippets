# manual way
wierd_list=[5,3,4,56,67,8,8,8,8,9,5,5,5,90,'paul']
wierd_list = list(map(str, wierd_list))
wierd_list.sort()
# select all, count from backwords, store in wierd_list_reverse
wierd_list_reverse = wierd_list[::-1] 
five_counter=0
eight_counter=0
list_counter=0
for entry in wierd_list:
    if entry == 5 :
        list_counter += 1
        five_counter += 1
        continue
    elif entry == 8:
        list_counter += 1
        eight_counter += 1
        continue
    elif entry == "paul":
        wierd_list[list_counter] = "Pauline"
        list_counter += 1
    else:
        list_counter += 1
print(five_counter)
print(eight_counter)
print(wierd_list)
print(wierd_list_reverse)