user_list = ['paul','marie','isabell','jochem']
n=int(input("Gimme dat number yo"))
if n < 0 or n > len(user_list):
    print(f"you dum dum, there are no more user then {len(user_list)}")
else:
    print(str(user_list[n-1]))