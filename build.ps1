#Requires -Version 5
param (
    [parameter()]
    [switch]$UpdateToc
)

Function GenerateToc {
    . $PSScriptRoot\code\powershell\Convert-FolderContentToMarkdownTableOfContents.ps1
    $main   = Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter '*.md' -BaseFolder $PSScriptRoot -BaseURL '.'
    $python = Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter "*.py" -BaseFolder "$PSScriptRoot\code\python" -Subfolder '\code\python' -BaseURL "."
    $php    = Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter "*.php" -BaseFolder "$PSScriptRoot\code\php" -Subfolder '\code\php' -BaseURL "."
    Write-Output "# Notes-and-Snippets

A place where I store my notes from stuff I learned, cheatsheets, code small snippets, etc.

$main" > $PSScriptRoot\README.md
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

