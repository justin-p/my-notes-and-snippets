## based of https://github.com/ClaudioESSilva/SQLServer-PowerShell/blob/master/Convert-FolderContentToMarkdownTableOfContents.ps1
Function Convert-FolderContentToMarkdownTableOfContents {
    <#
        .SYNOPSIS
        Create a Table of Contents in markdown

        .DESCRIPTION
        This function can be used to generate a markdown file that contains a Table of Contents based on the contents of a folder

        .PARAMETER BaseFolder
        It’s the folder’s location on the disk

        .PARAMETER RelativeFolder
        to build the URL for each file. This will be added as a link

        .PARAMETER Excludefolder
        A folder to exclude.

        .PARAMETER FiletypeFilter
        to filter the files on the folder

        .EXAMPLE
        Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter "*.md" -BaseFolder "C:\_git\github\sec-stuff" -BaseURL "."
        ## Index
        * /cheatsheets/ascii-table
          * [ascii-table](/cheatsheets/ascii-table/ascii-table.xlsx)
        * /code/php
          * [php](/code/php/php.md)
        * /code/php/assert
          * [php - assert()](/code/php/assert/php - assert().php)
        * /code/php/simple_shell
          * [simple_shell_magic.jpg](/code/php/simple_shell/simple_shell_magic.jpg.php)
          * [simple_shell.php%00](/code/php/simple_shell/simple_shell.php%00.gif)
          * [simple_shell](/code/php/simple_shell/simple_shell.php)
        * /code/powershell
          * [Convert-FolderContentToMarkdownTableOfContents](/code/powershell/Convert-FolderContentToMarkdownTableOfContents.ps1)
        * /code/python
          * [python](/code/python/python.md)
        * /code/python/Blackhat-Python/ch2
          * [udp_socket](/code/python/Blackhat-Python/ch2/udp_socket.py)
          * [tcp_socket](/code/python/Blackhat-Python/ch2/tcp_socket.py)
          * [bh_sshRcmd](/code/python/Blackhat-Python/ch2/bh_sshRcmd.py)
          * [bh_sshcmd](/code/python/Blackhat-Python/ch2/bh_sshcmd.py)
          * [bhpnet](/code/python/Blackhat-Python/ch2/bhpnet.py)
          * [tcp_server](/code/python/Blackhat-Python/ch2/tcp_server.py)
          * [tcp_proxy](/code/python/Blackhat-Python/ch2/tcp_proxy.py)
          * [bh_sshserver](/code/python/Blackhat-Python/ch2/bh_sshserver.py)
        .NOTES
    #>    
        
    param (
        [string]$BaseFolder,
        [string]$Subfolder,
        [string]$RelativeFolder = ".",
        [string]$Excludefolder,        
        [string]$FiletypeFilter = "*.md"
    )

    $nl = [System.Environment]::NewLine
    $TOC = "## Index$nl"

    #If ($Excludefolder) {
    #    $repoFolderStructure = Get-ChildItem -Path $BaseFolder -Directory | Where-Object Name -NotMatch "\.github|\.git" | where-object {$_.Name -ne $Excludefolder}
    #} Else {
    #    $repoFolderStructure = Get-ChildItem -Path $BaseFolder -Directory | Where-Object Name -NotMatch "\.github|\.git"
    #}
    $repoFolderStructure=@()
    (Get-ChildItem -Directory -Recurse) | Sort-Object -Unique | ForEach-Object {
        $repoFolderStructure += Get-ChildItem $_.Fullname -file
    }
    $repoFolderStructure = $repoFolderStructure | Sort-Object Directory | Group-Object "directory"
    foreach ($Folder in $repoFolderStructure) {
        $Path = ($($Folder.Name.ToString().Replace($BaseFolder, [string]::Empty)).Replace("\", "/"))
        $TOC += "* $($Path) $nl"
        foreach ($md in ($FOlder.Group)) {
            $fileName = $md.Name -replace $md.Extension
            $fileName = $fileName -replace " ","_"
            $TOC += "  * [$fileName]($(""$Path/$($md.Name)""))$nl"
        } 
    }
    Return $TOC

    #ForEach ($dir in ($repoFolderStructure | Sort-Object -Property Name)) {
    #    $repoStructure = Get-ChildItem -Path $dir.FullName -File -Filter $FiletypeFilter -Recurse
    #
    #    $TOC += "* $($dir.Name) $nl"
    #
    #    foreach ($md in ($repoStructure | Sort-Object -Property Name)) {
    #        if ($Subfolder) {
    #            $suffix = $($Subfolder + $($md.Directory.ToString().Replace($BaseFolder, [string]::Empty))).Replace('\','/') 
    #        }
    #        Else {
    #            $suffix = $($md.Directory.ToString().Replace($BaseFolder, [string]::Empty)).Replace("\", "/")
    #        }
    #        $fileName = $md.Name -replace $md.Extension
    #        $TOC += "  * [$fileName]($(""$baseURL$suffix/$($md.Name)""))$nl"
    #    }
    #}
}