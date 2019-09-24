if (!(Test-Path ("C:\_git\github\"))) {
    mkdir "C:\_git\github\"
}

Set-Location "C:\_git\github\"
git clone https://github.com/justin-p/my-notes-and-snippets 
if (!(Test-Path ("C:\_git\github\my-notes-and-snippets\external"))) {
    mkdir "C:\_git\github\my-notes-and-snippets\external"
}
Set-Location "C:\_git\github\my-notes-and-snippets\external"
git clone https://github.com/redhuntlabs/Awesome-Asset-Discovery
git clone https://github.com/swisskyrepo/PayloadsAllTheThings
git clone https://github.com/OWASP/CheatSheetSeries OWASP-CheatSheetSeries
