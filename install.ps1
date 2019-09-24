if (!(Test-Path ("C:\_git\github\notes"))) {
    mkdir "C:\_git\github\notes"
}

Set-Location "C:\_git\github\notes"
git clone https://github.com/justin-p/my-notes-and-snippets 
git clone https://github.com/redhuntlabs/Awesome-Asset-Discovery
git clone https://github.com/swisskyrepo/PayloadsAllTheThings
git clone https://github.com/OWASP/CheatSheetSeries OWASP-CheatSheetSeries
