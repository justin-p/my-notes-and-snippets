# Generating and using SSH keys

SSH keys allow you to connect to servers with a secret key AND password. If configured correctly, without the key a person would not be able to authenticate itself through SSH, even if it somehow got posession of your a user accounts password.

For more information, see [http://blakesmith.me/2010/02/08/understanding-public-key-private-key-concepts.html](http://blakesmith.me/2010/02/08/understanding-public-key-private-key-concepts.html)

For generating and using SSH keys with the application "PuTTY", you can use this manual.

If you do not have PuTTY on your own system yet, click here to install it.

If you have PuTTY installed, double-check whether PuTTYgen is installed as well.

Start PuTTYgen and press the "Generate" button.

Move your mouse over "Key" area of the PuTTYgen window until it is completely filled green.

Copy the text from the text field with the title "Public key for pasting into OpenSSH authorized\_keys file:". The text you copied should be entered on the server you are configuring SSH authentication on. This can be done with the following commands:

```text
mkdir ~/.ssh 
chmod 0700 ~/.ssh 
touch ~/.ssh/authorized_keys 
chmod 0644 ~/.ssh/authorized_keys
```

You will edit the file \(~/.ssh/authorized\_keys\) using the command:

`sudo vim ~/.ssh/authorized_keys`

Press the 'i' key on your keyboard once to enter "input-mode" within Vim. Paste the text we copied earlier from PuTTYgen in the current file. Save the file by pressing "ESC", typing ":wq!" and pressing "ENTER". You can then save your private key on your own system by pressing the "Save private key" button within PuTTYgen. The private key should be kept to yourself and is used to authenticate yourself against the public key that we placed on the server.

Adjusting the file owner, permissions and group:

```text
chown beheer:beheer ~/.ssh -R
chmod 0700 ~/.ssh
chmod 0644 ~/.ssh/authorized_keys
```

