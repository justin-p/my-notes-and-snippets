nested_list=[[1,2],[3,5]]
count_num = 0 
for nums in nested_list:
    count_sub = 0
    for sub_nums in nums:
        if sub_nums == 5:
            nested_list[count_num][count_sub] = 4
        count_sub += 1
    count_num += 1
print(nested_list)