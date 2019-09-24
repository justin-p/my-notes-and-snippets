# tar

    -z : Work on gzip compression automatically when reading archives.
    -x : Extract tar.gz archive.
    -v : Produce verbose output i.e. display progress and extracted file list on screen.
    -f : Read the archive from the archive to the specified file. In this example, read backups.tar.gz archive.
    -t : List the files in the archive.
    -r : Append files to the end of the tarball.
    --delete (GNU/Linux tar only) : Delete files from the tarball.

extracting tar.gz file

    tar -zxvf file1.tar.gz

extract file2 from file.tar.gz tarball

    tar -zxvf file1.tar.gz file1

list files

    tar -tvf file1.tar.gz

create a tarball

    tar -cvf file.tar file1 file2 file3

add files to an existing tarball

    tar -rf file.tar file4

delete files from a tarball

    tar -f file.tar --delete file4
