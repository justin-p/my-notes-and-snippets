import random
import sys
import os
import string
import time

def loadwordlist(file):
    return [line.rstrip('\n') for line in open(file)]

def randomword(wordlist,min,max):
    return wordlist[random.randrange(min,max)]

def clear_screen(s):
    time.sleep(s)
    os.system('cls' if os.name == 'nt' else 'clear')

def get_input():
    letter=input('Enter a letter: ')
    try:
        if len(letter) > 1:
            ERR_MSG='input is longer than 1 character.'
            raise(ERR_MSG)
        elif not letter.replace(' ', '').isalpha():
            ERR_MSG='input contains a non-alpha character'
            raise(ERR_MSG)
        else:
            return (letter.upper())
    except:
        print(f'ERROR: {ERR_MSG}')
        time.sleep(0.5)
        raise

def FindIndex(list, element):
    PosList = []
    for i in range(len(list)): 
        if list[i] == element:
            PosList.append(i)
    return PosList

def change_char(word, index, replacewith):
    #https://www.quora.com/How-do-you-change-one-character-in-a-string-in-Python
    return word[:index]+replacewith+word[index+1:]

def check_input(user_in,word,available_characters,hidden_word,dead_counter):
    try:
        if user_in not in available_characters:
            ERR_MSG=f'{user_in} has already been guessed.'
            raise(ERR_MSG)
        else:
            CharIndex = FindIndex(list(word),user_in)
            if not (CharIndex == list()):
                for index in CharIndex:
                    hidden_word=change_char(hidden_word,index,user_in)
            else:
                dead_counter+=1                    
            available_characters[:] = available_characters
            available_characters.remove(user_in)
    except:
        print(f'ERROR: {ERR_MSG}')
        time.sleep(0.5)
    finally:
        return available_characters,hidden_word,dead_counter

def start_menu():
    print("Hangman")
    menu_input = input("Press enter to start. ")
    clear_screen(0)
    if menu_input == 'debug':
        return True
    else:
        return False

def play_outro(state,word):
    if state == 'won':
        print(f"Correct! The word is {word}")
        print("You won!")
        time.sleep(1)
    elif state == 'lost':
        print("You died!")
        print(f"The word was {word}")
        time.sleep(1)
    if state == 'exit':
        print("\n")
        print("Bye!")
        sys.exit(0)

def play_hangman(wordlist):
    word = randomword(wordlist,0,len(wordlist))
    length_word = len(word)
    hidden_word = "_"*length_word
    available_characters = list(string.ascii_lowercase.upper())
    win_lose = 'unknown'
    dead_counter = 0
    max_dead_counter = 6
    # play_intro
    debug_status = start_menu()    
    while win_lose == 'unknown':
        try:
            if debug_status:print(f"DEBUG enabled. The word is {word}")
            print(f"Wrong guesses:\t\t\t {dead_counter} out of {max_dead_counter}")
            print(f"Available characters left:\t {''.join(available_characters)}")
            print(f"Word:\t\t\t\t {hidden_word}")
            user_in = get_input()
            available_characters,hidden_word,dead_counter=check_input(user_in,word,available_characters,hidden_word,dead_counter)
            if hidden_word == word:
                win_lose = 'won'
                play_outro(win_lose,word)
            if dead_counter >= max_dead_counter:
                print(f"{dead_counter} out of {max_dead_counter} wrong guesses")
                win_lose = 'lost'
                play_outro(win_lose,word)
            
        except (KeyboardInterrupt):
            play_outro('exit',word)
        except:
            pass
        finally:
            clear_screen(0.2)
    return

def main():
    wordlist = loadwordlist('data/sowpods.txt')
    play_hangman(wordlist)

if __name__ == '__main__':
    main()