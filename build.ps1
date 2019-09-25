#Requires -Version 5
param (
    [parameter()]
    [switch]$UpdateToc,
    [switch]$UpdateExternal
)

Function GenerateToc {
    . $PSScriptRoot\code\powershell\Convert-FolderContentToMarkdownTableOfContents.ps1
    $main   = Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter '*.md' -BaseFolder $PSScriptRoot -BaseURL '.' -excludefolder "external"
    $python = Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter "*.py" -BaseFolder "$PSScriptRoot\code\python" -Subfolder '\code\python' -BaseURL "."
    $php    = Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter "*.php" -BaseFolder "$PSScriptRoot\code\php" -Subfolder '\code\php' -BaseURL "."
    Write-Output "# Notes-and-Snippets

A place where I store my notes from stuff I learned, cheatsheets, code small snippets, etc.

$main
" > $PSScriptRoot\README.md
    Write-Output "$python" > $PSScriptRoot\code\python\python.md
    Write-Output "$php" > $PSScriptRoot\code\php\php.md
    
}
if ($UpdateToc) {
    try {
        GenerateToc
    }
    catch {
        $PSCmdlet.ThrowTerminatingError($PSItem)
    }
}
If ($UpdateExternal) {
    Set-Location "C:\_git\github\my-notes-and-snippets\external"
    gci | foreach-object {
        if (!($_.fullname -match ".gitkeep")) {
            cd $_.fullname
            git pull
        }
    }
    Set-Location "C:\_git\github\my-notes-and-snippets"
}
