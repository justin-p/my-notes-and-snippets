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

        .PARAMETER FiletypeFilter
        to filter the files on the folder

        .EXAMPLE
        Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter "*.md" -BaseFolder "C:\_git\github\sec-stuff" -BaseURL "."
        ## Index
        * cheatsheets
          * [ascii-table](\cheatsheets\ascii-table.md)
          * [bash](\cheatsheets\bash.md)
          * [cron](\cheatsheets\cron.md)
          * [man](\cheatsheets\man.md)
          * [markdown](\cheatsheets\markdown.md)
          * [mysql](\cheatsheets\mysql.md)
        * code
        * ctf
          * [Bandit](\ctf\OTW\Bandit\Bandit.md)
          * [Natas](\ctf\OTW\Natas\Natas.md)

        .NOTES
        https://claudioessilva.eu/2017/09/18/generate-markdown-table-of-contents-based-on-files-within-a-folder-with-powershell/
    #>    
        
    param (
        [string]$BaseFolder,
        [string]$Subfolder,
        [string]$RelativeFolder = ".",
        [string]$FiletypeFilter = "*.md"
    )

    $nl = [System.Environment]::NewLine
    $TOC = "## Index$nl"

    $repoFolderStructure = Get-ChildItem -Path $BaseFolder -Directory | Where-Object Name -NotMatch "\.github|\.git"

    ForEach ($dir in ($repoFolderStructure | Sort-Object -Property Name)) {
        $repoStructure = Get-ChildItem -Path $dir.FullName -File -Filter $FiletypeFilter -Recurse

        $TOC += "* $($dir.Name) $nl"

        foreach ($md in ($repoStructure | Sort-Object -Property Name)) {
            if ($Subfolder) {
                $suffix = $($Subfolder + $($md.Directory.ToString().Replace($BaseFolder, [string]::Empty))).Replace('\','/') 
            }
            Else {
                $suffix = $($md.Directory.ToString().Replace($BaseFolder, [string]::Empty)).Replace("\", "/")
            }
            $fileName = $md.Name -replace $md.Extension
            $TOC += "  * [$fileName]($(""$baseURL$suffix/$($md.Name)""))$nl"
        }
    }
    Return $TOC
}