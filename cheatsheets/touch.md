# touch

create a empty file

    touch file1

update timestamp and modification

    touch -am file

use timestamp of file4 on file 5

    touch -r file4 file5

make file7 30 seconds older than file6.

    touch -r file6 -B 30 file7

set timestamp to specific timestamp

    touch -d '1 May 2005 10:22' file8
    touch -d '14 May' file9
    touch -d '14:24' file9

avoid creating new file

    touch -c file10

