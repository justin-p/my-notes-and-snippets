wierd_list=[5,3,4,56,67,8,8,8,8,9,5,5,5,90,'paul']
for entry in wierd_list:
    try:
        if int(entry) > 3:
            print(entry)
    except ValueError:
        pass