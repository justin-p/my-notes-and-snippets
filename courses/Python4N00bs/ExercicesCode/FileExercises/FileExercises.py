import os
import string
#from collections import Counter
os.chdir('C:\\_git\\github\\Python4N00bs\\ExercicesCode\\FileExercises')
with open('python.txt','r') as fhandle:
    og_lines = fhandle.readlines()
lines=([(line.rstrip('\n')).lower() for line in og_lines if line != '\n'])
cleaned_lines=([line.translate(str.maketrans('', '', string.punctuation)) for line in lines])
headings=([line for line in cleaned_lines if len(line) < 50])
with open('headings.txt','w+') as fhandle:
    for h in headings:
        fhandle.write(h + ' ')
words=(' '.join(cleaned_lines).rsplit(' '))
uniquewords=list(set(words))
#dir_w= Counter(words)
wordcounts={word:words.count(word) for word in uniquewords}
meaningfull_words={key:value for (key, value) in wordcounts.items() if value <= 3 and len(key) >= 4}
print(meaningfull_words)