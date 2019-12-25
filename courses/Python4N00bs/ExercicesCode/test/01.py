import string
def pwdCheck(pwd):
    ## Set check to false
    check = False
    #3 If any letter in pwd is uppercase and is lowercase and is a digit and is a value from string.punctuation 
    if (any(letter.isupper() for letter in pwd) and any(letter.islower() for letter in pwd) and any(letter.isdigit() for letter in pwd) and any(letter in string.punctuation for letter in pwd)):
        ## Set check to true
        check = True
    # Return check
    return check