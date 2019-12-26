# Python

## Python2

[source](https://devhints.io/python)

### Lists

```python
list = []
list[i:j]  # returns list subset
list[-1]   # access last element
list[:-1]  # return all but the last element

list[i] = val
list[i:j] = otherlist  # replace ith to jth element with otherlist
del list[i:j]
list.append(item)
list.extend(list)
list.insert(0, item)
list.pop()
list.remove(i)
list1 + list2     # combine two list
set(list)         # remove duplicate elements from a list


list.reverse()
list.count(item)
sum(list)

list.sort()

zip(list1, list2)
sorted(list)
",".join(list)
```

### Dict

```python
dict.keys()
dict.values()
"key" in dict
dict["key"]   # throws KeyError
dict.get("key")
dict.setdefault("key", 1)
```

### Iteration

```python
for item in ["a", "b", "c"]:
for i in range(4):     # 0 to 3
for i in range(4, 8):  # 4 to 7
for key, val in dict.items():
```

### [String](https://docs.python.org/2/library/stdtypes.html#string-methods)

```python
str[0:4]
len(str)

string.replace("-", " ")
",".join(list)
"hi {0}".format('j')
str.find(",")
str.index(",")   # same, but raises IndexError
str.count(",")
str.split(",")

str.lower()
str.upper()
str.title()

str.lstrip()
str.rstrip()
str.strip()

str.islower()
```

### Casting

```python
int(str)
float(str)
```

### Comprehensions

```python
[fn(i) for i in list]            # .map
map(fn, list)                    # .map, returns iterator

filter(fn, list)                 # .filter, returns iterator
[fn(i) for i in list if i > 0]   # .filter.map
```

### Regex

```python
import re

re.match(r'^[aeiou]', str)
re.sub(r'^[aeiou]', '?', str)
re.sub(r'(xyz)', r'\1', str)

expr = re.compile(r'^...$')
expr.match(...)
expr.sub(...)
```


## Python3

### Variables and data types
```python
#!/bin/python3

# Constant
print("This is a constant: ")
print(10)

#Variable
a = 10
print("This is a variable: ")
print(a)

print("Let's change the value of the variable: ")
a = 20
print(a)

print("Let's change it into a word: ")
a = "twenty"
print(a)

valid_variable_name_1 = 1
print(valid_variable_name_1)

## check type
y = True
type(y)


## convert to other type
chars = '420'
print(type(chars))
nums = int(chars)
print(type(nums))

## User input
user_choice = input("Pick a number! Any number! ")
print("You picked the number ", end='')
print(user_choice)


```

### Operations in Python

    Addition +
    Subtraction - 
    Multiplication *
    Division /
    Integer division //
    Modulus (remainder) %
    Raising to a power **
    Matrix multiplication @


```python
#!/bin/python3

## A variable can be operated upon in-place:
var = 5
var *= 2
print(var)

var -= 3
print(var)
```

####  relational operators

    Greater than: a > b
    Less than: a < b
    Equal to: a == b
    Greater than or equal to: a >= b
    Less than or equal to: a <= b
    Not equal to: a != b

```python
#!/bin/python3

bird = 10
word = 10

# Haven't you heard?
bird == word
```

```python
#!/bin/python3

## In Python, operators that make logical combinations of expressions are called logical operators. They are the words and and or.
100 > 90 and "good" == "bad"
```

### Strings

#### Methods

```python
#!/bin/python3

name = "python programming"

capital_name = name.capitalize()
all_caps_name = name.upper()
replace_t_name = name.replace('t','+')
words_in_name = name.split(' ')

print(capital_name)
## Python programming
```

#### Formating

```python
#!/bin/python3

name = "Justin"
age = 69

print("My name is {0} and I am {1} years old".format(name, age))
## My name is Justin and I am 69 years old

print(f"My name is {name} and I am {age} years old")
## My name is Justin and I am 69 years old


sun_mass = 1.989e30
pi = 3.141592653589793238

print("The value of pi is: {0:.4f}\nThe mass of the sun is: {1:.0E} kg".format(pi, sun_mass))
## The value of pi is: 3.1416
## The mass of the sun is: 2E+30 kg
```

### tuples, lists, sets, and dictionarie

```python
#!/bin/python3

list_1 = [1, 2, 3, 4, 5]
list_2 = list()

dict_1 = {"Luck":10, "Skill":20, "Concentrated power of will":15, "Pleasure":5, "Pain":50}
dict_2 = dict()

tuple_1 = (1, 3, 5, 7, 9)

set_1 = {1, 1, 2, 3, 5, 8, 13}
```


#### list extend

```python
#!/bin/python3

names = ["Vikram", "Boby", "Ahmed"]
names.extend(["Arjen", "Bart", "Benedikt"])
print(names)
```

#### List slicing

```python
#!/bin/python3

a_list = [12, 65, 34, -19, -18, 43, -24, -5, 0, 7, 17]

# Slice from somewhere in the middle
sub_list_mid = a_list[3:6]

# Slice the first five elements
sub_list_start = a_list[:5]

# Slice from element 5 to the end
sub_list_end = a_list[5:]

# Slice the last five elements
sub_list_last = a_list[-5:]

# Make a copy of the list
a_list_copy = a_list[:]
```

#### List methods

```python
#!/bin/python3

a_list_copy.sort()
a_list_copy.reverse()

charlist = "Nothing but a string"
charlist[4:8]
## 'ing '
```

#### Dict update

```python
#!/bin/python3

dict_1.update({"Reason to remember the name" : 100})
# Or use this
dict_1["Reason to remember the name"] = 100
```

### Conditional statements

```python
#!/bin/python3

a_number = input("Enter a number between one and a hundred: ")
a_number = int(a_number)

if a_number < 1:
    print("That's too small!")
elif a_number > 100:
    print("That's too large!")
else:
    print("A wise choice!")


a = [1, 2, 3, 4, 5, 6]
if 1 in a:
    print("We got one!")

b = map(str, a)
list(b)
```

### Iteration statements

```python
#!/bin/python3

counter = 5
while counter > 0:
    print("Counter value " + str(counter))
    counter -= 1

some_list = [1, 3, 5, 7, 9]
for iterator in some_list:
    print(iterator)

num_list = [1, 2, 3, 4, 5]
word_list = ["one", "two", "three", "four", "five"]


for num, word in zip(num_list, word_list):
    print("Num = " + str(num))
    print("Word = " + str(word))


for num, word in enumerate(word_list, 1):
    print("Num = " + str(num))
    print("Word = " + str(word))


outer = 1

while outer < 10:
    inner = 1
    while inner < outer:
        print(str(inner), end='')
        inner += 1
    print('')
    outer += 1


lottery_nums = [4, 8, 15, 16, 23, 42]

for index, value in enumerate(lottery_nums):
    
    counter = 1
    while counter < 100:
        if counter == lottery_nums[index]:
            print(str(counter))
            break
        counter += 1


for letter in "everest":
    if letter == "e":
        continue
    print(letter)
```

#### common coding patterns with loops

```python
#!/bin/python3

word = "excessivenesses"

counter = 0 # Don't forget this step
for letter in word:
    if letter == 'e':
        counter += 1

print(counter)



x = 20
y = 8

original_x = x
original_y = y

while y != 0:
    temp = y
    y = x % y
    x = temp

print("Highest common factor of {0} and {1} is {2}".format(original_x, original_y, x))


numbers=[11,89,89,1,32,44,71,62,4]
c=0
t=0
for n in numbers:
    c+=1
    t+=n
print(t / n)
```

####  Listo comprehendo!

```python
#!/bin/python3

# Here is our list:
weird_list = [5, 3, 5, 2, 4, 5, 7, 0, 1, 'Paul']

# Let's make an empty list to store the results of our checks
resulting_list = []

# Let's loop through each element in the list one by one
for element in weird_list:
    
    # First we check if the element is a number (let's just say an integer for now)
    if type(element) == int:
        
        # If it is, then we check if it is greater than 3, and then print it
        if element > 3:
            resulting_list.append(element)

# Print the result
print(resulting_list)
## much smaller
print([element for element in weird_list if type(element) == int and element > 3])


num_range=range(1,10)
odd_list=([n for n in num_range if (n % 2) !=0])
print(odd_list)

num_range=range(1,10)
odd_squares=([(n*n) for n in num_range if (n % 2) != 0])
even_squares=([(n*n) for n in num_range if (n % 2) == 0])
print(odd_squares)
print(even_squares)


string="Telephone number +31 657 890 123"
ints=([i for i in string if i.isdigit() == True])
print(ints)




# This is a dictionary in Python. It consists of key:value pairs.
fort_minor = {"Luck":10, "Skill":20, "Concentrated power of will":15, "Pleasure":5, "Pain":50}

# We can access the items in a dictionary using the .items() method
print( fort_minor.items() )

# The keys used in the dictionary can be accessed via the .keys() method
print( fort_minor.keys() )

# And if you just want the values associated with the keys, use the .values() method
print( fort_minor.values() )


Twenty_percent_or_less = {key:value for (key, value) in fort_minor.items() if value <= 20}
print(Twenty_percent_or_less)


cool_bois = {"Kees":1, "Gerart":4, "Jaap":3, "Joop":2, "David":2}
multilinguals= {key:value for (key, value) in cool_bois.items() if value >= 3}
print(multilinguals)


numbers = range(1,10)
numbers_and_their_squares = {n:n**2 for n in numbers}
print(numbers_and_their_squares)


num_range=range(1,10)
odd_dir={n:('even' if (n % 2) == 0 else 'odd') for n in num_range}
print(odd_dir)

```


### Import

```python
#!/bin/python3

import os
os.getcwd() # Get working directory. This is the directory in which your Python code is currently running.
os.listdir() # List all files and folders in a specified directory (default is current working directory)

# Create a new directory
new_directory = "test"
if not os.path.exists(new_directory):
    os.mkdir(new_directory)
    print("Directory " , new_directory ,  " Created ")
else:    
    print("Directory " , new_directory ,  " already exists")



import glob
# List all files that match this wildcard pattern
print(glob.glob("*.ipynb"))



import math
nums=[0,1,2,3,4]
for n in nums:
    Xpi=n*math.pi
    print(math.sin(Xpi))
    print(math.cos(Xpi))


## alias import
import datetime import datetime as data
print(dt.now())
```

### File handeling

```python
#!/bin/python3

fhandle = open("myFile.txt","w+")
## Let's take a look at this statement more closely. The "open" keyword signifies that a file is being opened, for you to operate on it. The first argument to the open function is the name of the file. Here, we append .txt to our file name because it is a standard test file. The second argument is a flag, signifying what mode you are opening it in. Flags can be "r" for read only, "w" for write only - overwriting any previous data in the file, "a" for append, which is a write-only mode in which new data is written to the file without overwriting the existing data it contains. The + signifies that the file will be created, if it does not already exist.



## write 99 lines
lines = range(1,100)
for line in lines:
    fhandle.write("This is line {0}\n".format(line))

## close handle
fhandle.close()


## Append
fhandle = open("myFile.txt","a+")
fhandle.write("Here's an additional line\n")
fhandle.write("And a final line for the road\n")
fhandle.close()


## Read in entire file
fhandle = open("myFile.txt", "r+")
contents = fhandle.read()
fhandle.close()

contents[:20]



## Read in each line of the file
fhandle = open("myFile.txt","r+")
counter = 20
while counter > 0:
    single_line = fhandle.readline()
    print(single_line)
    counter -= 1   
fhandle.close()

## Read in all lines as a list
fhandle = open("myFile.txt","r+")
all_lines = fhandle.readlines()
print(all_lines[:20])


with open("myFile.txt", "a+") as fhandle:
    fhandle.write("I lied. Here is one more line\n")


with open("myFile.txt", "r+") as fhandle:
    all_lines = fhandle.readlines()
print(all_lines[-3:])


txt=['When we connect we are created with by someone seems to have had a field day with caps lock enabled. It seems we have a some sort of shell where every command we type is converted to uppercase. We are able to call some environment variables though.\n','I then decided to try some random environment variables.\n','Since this yielded no results I to read over the bash man page where I stumbled on Special Parameters.\n','Where $0 looked someone what promising. This could contain something like /bin/sh.','Which seemed to be the case. This gave me a /bin/sh shell where I spawned /bin/bash and proceeded to cat the password file.\n']
with open("justin-p.me.txt", "w+") as fhandle:
    for l in txt:
        fhandle.write(l)
```

### Try/Except

```python
#!/bin/python3

# Let's try to read a file that doesn't exist:
try:
    f = open("imaginaryfile.txt", "r")
    f.readline()
except:
    print("That didn't work! Maybe this file does not exist?")
```

### Functions

```python
#!/bin/python3

def bmi_calculator(h, w):
    bmi = w / (h ** 2)


def volume_of_cylinder(h=10, r=5):
    vol = 3.14159 * r ** 2 * h    



## Python also allows us to write functions that take in a variable number of arguments. There are two ways you can do this. You can pass a parameter called *args to the function, or/and a parameter called **kwargs.
## The former implies that you are passing a list of arguments, which in the function will be accessed as a list named args. The latter implies that you are passing a dictionary, which in the function will be accessed by kwargs. Let's take a look at some examples.

def multiplier(*args):
    result = 1
    for num in args:
        result *= num
    print("After multiplying all these numbers together we get: " + str(result))


def display_stats(**kwargs):
    for key, value in kwargs.items():
        print("The " + key + " is " + str(value))
display_stats(name="Vikram", age="29", job="PhD Student", hobby="Python Instructor")
```

### Classes

See https://colab.research.google.com/github/justin-p/my-notes-and-snippets/blob/master/courses/Python4N00bs/Python4n00bs_day_04.ipynb


### Sockets

```python
#!/bin/python3

import socket

HOST = '127.0.0.1'
PORT = 7777

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect((HOST,PORT))
```