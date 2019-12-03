import os
'''
function that iterates over input.
it splits each item in a list on the '-' string
and stores the first result as the key and the second result as the value 
'''
def list_to_dict(lines):
    return({ (l.split('-')[0]) : (l.split('-')[1]) for l in lines })
## read in the lines of the browsing_info file
with open('C:\\_git\\github\\Python4N00bs\\Exercises\\browsing_info.txt','r') as fhandle:
    og_lines = fhandle.readlines()
## strip each newline char
lines=([(line.rstrip('\n')) for line in og_lines])
## convert lines into a dict using list_to_dict
browsing_dict=(list_to_dict(lines))
## get the value of the 'IP address' key out of the dictionary and store it in IP
ip=browsing_dict['IP address']