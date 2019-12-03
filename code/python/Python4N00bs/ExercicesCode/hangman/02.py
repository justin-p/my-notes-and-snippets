from asciimatics.effects import Stars, Print
from asciimatics.particles import RingFirework, SerpentFirework, StarFirework, \
    PalmFirework, DropScreen
from asciimatics.renderers import SpeechBubble, ColourImageFile, FigletText, ImageFile, Rainbow
from asciimatics.scene import Scene
from asciimatics.screen import Screen
from asciimatics.exceptions import ResizeScreenError
import simpleaudio as sa
import random
import sys
import os
import string
import time

def draw_gallow(dead_counter):
    if dead_counter == 0:
        print("""
        +-------------------------------+        
        |--|                            |        
        +-------------------------------+        
        |  |                 +-+                 
        |  |               +-+                   
        |  |             +-+                     
        |  |           +-+                       
        |  |         +-+                         
        |  |       +-+                         
        |  |     +-+                       
        |  |   +-+                               
        |  | +-+                                
        |  +-+                              
        |  |                                     
        |  |                                    
        |  |                                    
        |  |                                     
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
+-------+--+-------+                             
|                  |                             
+------------------+                             
""")    
    if dead_counter == 1:
        print("""
        +-------------------------------+        
        |--|                            |        
        +-------------------------------+        
        |  |                 +-+        |         
        |  |               +-+          |         
        |  |             +-+            |         
        |  |           +-+              |         
        |  |         +-+                |         
        |  |       +-+                 /-\         
        |  |     +-+                  |0|0|     
        |  |   +-+                     \_/          
        |  | +-+                                
        |  +-+                              
        |  |                                     
        |  |                                    
        |  |                                    
        |  |                                     
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
+-------+--+-------+                             
|                  |                             
+------------------+                             
""")    
    if dead_counter == 2:
        print("""
        +-------------------------------+        
        |--|                            |        
        +-------------------------------+        
        |  |                 +-+        |         
        |  |               +-+          |         
        |  |             +-+            |         
        |  |           +-+              |         
        |  |         +-+                |         
        |  |       +-+                 /-\         
        |  |     +-+                  |0|0|     
        |  |   +-+                     \_/          
        |  | +-+                        0        
        |  +-+                        000      
        |  |                         0            
        |  |                         0           
        |  |                        x            
        |  |                                     
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
+-------+--+-------+                             
|                  |                             
+------------------+                             
""")    
    if dead_counter == 3:
        print("""
        +-------------------------------+        
        |--|                            |        
        +-------------------------------+        
        |  |                 +-+        |         
        |  |               +-+          |         
        |  |             +-+            |         
        |  |           +-+              |         
        |  |         +-+                |         
        |  |       +-+                 /-\         
        |  |     +-+                  |0|0|     
        |  |   +-+                     \_/          
        |  | +-+                        0        
        |  +-+                        00000      
        |  |                         0     0       
        |  |                         0     0      
        |  |                        x       x     
        |  |                                     
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
+-------+--+-------+                             
|                  |                             
+------------------+                             
""")    
    if dead_counter == 4:
        print("""
        +-------------------------------+        
        |--|                            |        
        +-------------------------------+        
        |  |                 +-+        |         
        |  |               +-+          |         
        |  |             +-+            |         
        |  |           +-+              |         
        |  |         +-+                |         
        |  |       +-+                 /-\         
        |  |     +-+                  |0|0|     
        |  |   +-+                     \_/          
        |  | +-+                        0        
        |  +-+                        00000      
        |  |                         0  0  0       
        |  |                         0  0  0      
        |  |                        x   0   x     
        |  |                            0         
        |  |                            0         
        |  |                                    
        |  |                                     
        |  |                                    
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
+-------+--+-------+                             
|                  |                             
+------------------+                             
""")    
    if dead_counter == 5:
        print("""
        +-------------------------------+        
        |--|                            |        
        +-------------------------------+        
        |  |                 +-+        |         
        |  |               +-+          |         
        |  |             +-+            |         
        |  |           +-+              |         
        |  |         +-+                |         
        |  |       +-+                 /-\         
        |  |     +-+                  |0|0|     
        |  |   +-+                     \_/          
        |  | +-+                        0        
        |  +-+                        00000      
        |  |                         0  0  0       
        |  |                         0  0  0      
        |  |                        x   0   x     
        |  |                            0         
        |  |                            0         
        |  |                           0         
        |  |                          0           
        |  |                          0          
        |  |                         _0            
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
+-------+--+-------+                             
|                  |                             
+------------------+                             
""")    
    if dead_counter == 6:
        print("""
        +-------------------------------+        
        |--|                            |        
        +-------------------------------+        
        |  |                 +-+        |         
        |  |               +-+          |         
        |  |             +-+            |         
        |  |           +-+              |         
        |  |         +-+                |         
        |  |       +-+                 /-\         
        |  |     +-+                  |x|x|     
        |  |   +-+                     \_/          
        |  | +-+                        0        
        |  +-+                        00000      
        |  |                         0  0  0       
        |  |                         0  0  0      
        |  |                        x   0   x     
        |  |                            0         
        |  |                            0         
        |  |                           0 0        
        |  |                          0   0        
        |  |                          0   0       
        |  |                         _0   0_         
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
        |  |                                     
+-------+--+-------+                             
|                  |                             
+------------------+                             
""")

def loadwordlist(file):
    return [line.rstrip('\n') for line in open(file)]

def randomword(wordlist,min,max):
    return wordlist[random.randrange(min,max)]

def clear_screen(s):
    time.sleep(s)
    os.system('cls' if os.name == 'nt' else 'clear')

def play_sound_fx(fx):
    sa.WaveObject.from_wave_file(fx).play()

def FindIndex(list, element):
    PosList = []
    for i in range(len(list)): 
        if list[i] == element:
            PosList.append(i)
    return PosList

def change_char(word, index, replacewith):
    #https://www.quora.com/How-do-you-change-one-character-in-a-string-in-Python
    return word[:index]+replacewith+word[index+1:]

def start_screen(screen):
    scenes = []
    effects = [
        Print(screen, ColourImageFile(screen, "data\img\start_screen.gif", screen.height - 12, uni=screen.unicode_aware, dither=screen.unicode_aware),0 ,stop_frame=3000,speed=4),     
        Print(screen, FigletText("Hangman", font="doom"), y=screen.height -15),     
        Print(screen, SpeechBubble("Press X to continue..."), screen.height - 5, speed=1, transparent=False, start_frame=100)
    ]
    scenes.append(Scene(effects, -1))
    screen.play(scenes, stop_on_resize=False)

def death_screen(screen):
    scenes = []
    effects = [
        Print(screen, ColourImageFile(screen,"data\img\death_screen2.gif", uni=screen.unicode_aware, dither=screen.unicode_aware), 0, stop_frame=3000, speed=4), 
        Print(screen, SpeechBubble("Press X to continue..."), screen.height - 11, speed=1, transparent=False, start_frame=55)
    ]
    scenes.append(Scene(effects, -1))
    screen.play(scenes, stop_on_resize=False)

def win_screen(screen):
    scenes = []
    effects = [
        Stars(screen, screen.width),Print(screen,SpeechBubble("Press X to exit"), y=screen.height - 3, start_frame=300)
    ]
    for _ in range(20):
        fireworks = [
            (PalmFirework, 25, 30),
            (PalmFirework, 25, 30),
            (StarFirework, 25, 35),
            (StarFirework, 25, 35),
            (StarFirework, 25, 35),
            (RingFirework, 20, 30),
            (SerpentFirework, 30, 35),
        ]
        firework, start, stop = random.choice(fireworks)
        effects.insert(
            1,
            firework(screen,
                     random.randint(0, screen.width),
                     random.randint(screen.height // 8, screen.height * 3 // 4),
                     random.randint(start, stop),
                     start_frame=random.randint(0, 250)))

    effects.append(Print(screen,Rainbow(screen, FigletText("YOU WON")),screen.height // 2 - 6,speed=1,start_frame=60))
    effects.append(Print(screen,Rainbow(screen, FigletText("CONGRATULATIONS!")),screen.height // 2 + 1,speed=1,start_frame=60))
    scenes.append(Scene(effects, -1))

    screen.play(scenes, stop_on_resize=False)

def start_menu():   
    bg_wave_obj = sa.WaveObject.from_wave_file('data\sound\\bg_stage_select_alt.wav')
    bg_play_obj = bg_wave_obj.play()
    try:
        Screen.wrapper(start_screen)
    except ResizeScreenError:
        pass        
    play_sound_fx('data\sound\sfx_select.wav')
    clear_screen(0)
    bg_play_obj.stop()
    return False

def play_outro(state,word):
    if state == 'won':
        while True:
            try:
                play_sound_fx('data\sound\\bg_won.wav')
                Screen.wrapper(win_screen)
                sys.exit(0)
            except ResizeScreenError:
                pass
    elif state == 'lost':
        while True:
            try:
                play_sound_fx('data\sound\\bg_game_over.wav')
                Screen.wrapper(death_screen)
                sys.exit(0)
            except ResizeScreenError:
                pass
    if state == 'exit':
        print("\n")
        print("Bye!")
        sys.exit(0)

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

def check_input(user_in,word,available_characters,hidden_word,dead_counter):
    try:
        if user_in not in available_characters:
            ERR_MSG=f'{user_in} has already been guessed.'
            play_sound_fx('data\sound\sfx_error1.wav')
            play_sound_fx('data\sound\sfx_error2.wav')
            raise(ERR_MSG)
        else:
            CharIndex = FindIndex(list(word),user_in)
            if not (CharIndex == list()):
                for index in CharIndex:
                    hidden_word=change_char(hidden_word,index,user_in)
                    play_sound_fx('data\sound\sfx_correct.wav')
            else:
                dead_counter+=1
                play_sound_fx('data\sound\sfx_error1.wav')
                play_sound_fx('data\sound\sfx_error2.wav')                              
            available_characters[:] = available_characters
            available_characters.remove(user_in)
    except:
        print(f'ERROR: {ERR_MSG}')
        time.sleep(0.5)
    finally:
        return available_characters,hidden_word,dead_counter

def play_hangman(wordlist):
    word = randomword(wordlist,0,len(wordlist))
    length_word = len(word)
    hidden_word = "_"*length_word
    available_characters = list(string.ascii_lowercase.upper())
    win_lose = 'unknown'
    dead_counter = 0
    max_dead_counter = 6
    start_menu()    
    while win_lose == 'unknown':
        try:
            debug_status = True
            if debug_status:print(f"DEBUG enabled. The word is {word}")
            draw_gallow(dead_counter)
            print(f"Wrong guesses:\t\t\t {dead_counter} out of {max_dead_counter}")
            print(f"Available characters left:\t {''.join(available_characters)}")
            print(f"Word:\t\t\t\t {hidden_word}")
            user_in = get_input()
            available_characters,hidden_word,dead_counter=check_input(user_in,word,available_characters,hidden_word,dead_counter)
            if hidden_word == word:
                clear_screen(0)
                win_lose = 'won'
                play_outro(win_lose,word)
            if dead_counter >= max_dead_counter:
                clear_screen(0)
                print(f"Wrong guesses:\t\t\t {dead_counter} out of {max_dead_counter}")
                draw_gallow(dead_counter)
                time.sleep(0.25)
                win_lose = 'lost'
                clear_screen(0)
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