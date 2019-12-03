def intCounter(num_list):
    uniq_num_list = list(set(num_list))
    for n in uniq_num_list:
        if type(n) == int:
            times = num_list.count(n)
            print(f"The number {n} appears {times} times")
        else:
            print(f"{n} is not a Int")
def mode(num_list):
    uniq_num_list = list(set(num_list))
    total_counter={}
    for n in uniq_num_list:
        if type(n) == int:
            total_counter[(num_list.count(n))]=n
    return total_counter[max(total_counter, key=total_counter.get)]

num_list=[1, 'b', 1.10 , 2, 1, 3, 4, 6 ,8, 8, 8, 8, 8, 8, 'a']
#intCounter(num_list)
#print(mode(num_list))



