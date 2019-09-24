# Random stuff (temp)

## Usage of dash (-) in place of a filename

Using - as a filename to mean stdin/stdout is a convention that a lot of programs use. It is not a special property of the filename. The kernel does not recognise - as special so any system calls referring to - as a filename will use - literally as the filename.

With bash redirection, - is not recognised as a special filename, so bash will use that as the literal filename.

When cat sees the string - as a filename, it treats it as a synonym for stdin. To get around this, you need to alter the string that cat sees in such a way that it still refers to a file called -. The usual way of doing this is to prefix the filename with a path - ./-, or /home/Tim/-. This technique is also used to get around similar issues where command line options clash with filenames, so a file referred to as ./-e does not appear as the -e command line option to a program, for example.

```bash 
cat ./-
```