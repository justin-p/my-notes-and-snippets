def Exercise0(numbers):
    assert numbers == [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 'Test failed. Please check your code again!'
    print("Test 1 Passed!")

def Exercise1(pwdCheck):
    assert pwdCheck("$1nterKlaas"), 'Test failed. Please check your code again!'
    print("Test 1 Passed!")
    assert pwdCheck("P@kjesboot12"), 'Test failed. Please check your code again!'
    print("Test 2 Passed!")
    assert not pwdCheck("amerigo"), 'Test failed. Please check your code again!'
    print("Test 3 Passed!")
    assert not pwdCheck("cat"), 'Test failed. Please check your code again!'
    print("Test 4 Passed!")

def Exercise2(extent):
    assert extent(34, 30, 14, 50, 55) == 41, 'Test failed. Please check your code again!'
    print("Test 1 Passed!")
    assert extent(1, 10, 2, 9, 3, 8, 4, 7, 5, 6) == 9, 'Test failed. Please check your code again!'
    print("Test 2 Passed!")
    assert extent(1, 4, 5, 7, "a", "b", "c") == -1, 'Test failed. Please check your code again!'
    print("Test 3 Passed!")

def Exercise3(browsing_dict, IP):
    assert browsing_dict == {"Name":"Piet", "Browser":"Chrome", "User name":"Piet123",
                             "Password":"Py+h0n", "MAC address":"6a:2d:34:21:01:14",
                             "IP address":"186.166.122.104", "Start time":"10:05:51",
                             "End time":"13:11:33", "Keystrokes":"938"}, 'Test failed. Please check your code again!'
    print("Test 1 Passed!")
    assert IP == "186.166.122.104", 'Test failed. Please check your code again!'
    print("Test 2 Passed!")
