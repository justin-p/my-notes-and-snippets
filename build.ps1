#Requires -Version 5
param (
    [parameter()]
    [switch]$UpdateToc,
    [switch]$UpdateExternal
)

Function GenerateToc {
    . $PSScriptRoot\code\powershell\Convert-FolderContentToMarkdownTableOfContents.ps1
    $main       = Convert-FolderContentToMarkdownTableOfContents -FiletypeFilter '*.md'   -BaseFolder "$PSScriptRoot" -BaseURL '.'
    Write-Output "# External resources
$main " > $PSScriptRoot\including_external.md
    Set-Location $PSScriptRoot
    book sm
}
#if ($UpdateToc) {
#    try {
#        GenerateToc
#    }
#    catch {
#        $PSCmdlet.ThrowTerminatingError($PSItem)
#    }
#}
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