# https://www.geeksforgeeks.org/print-all-combinations-of-given-length/
f=open('passlist.txt','w+')
def printAllKLength(set, k):  
    n = len(set)  
    printAllKLengthRec(set, "", n, k) 

def printAllKLengthRec(set, prefix, n, k): 
    if (k == 0) : 
        print(prefix)
        f.write(prefix)
        f.write("\n") 
        return
  
    for i in range(n): 
        newPrefix = prefix + set[i] 

        printAllKLengthRec(set, newPrefix, n, k - 1) 
  
if __name__ == "__main__": 

    set1 = ['a','b','c','d','1','2','3','4','5','6','7','8','9','0','!','@','#'] 
    k = 8
    printAllKLength(set1, k)

f.close()
