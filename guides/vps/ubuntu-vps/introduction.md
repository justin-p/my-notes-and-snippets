# Introduction

In this guide, we will be using the user account name "beheer". This is interchangeable between systems. I'd recommend choosing something that you like.

If you have root access to your server, follow the instructions below:

* Create new user with `adduser beheer`
* Change user to your new one to check whether it works `su beheer` 
* Try doing something you should not be able to do, like `apt-get install ncdu`. You will probably see a Error message. This is because this user account currently does not have rights to run this command. This is because this user has not been added to the sudoers group.
* Go back to root `exit` 
* Add the user to sudoers `sudo adduser beheer sudo`
* Try switching to the user and see if you are now able to install something.



