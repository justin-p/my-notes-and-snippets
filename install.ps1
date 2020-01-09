if (!(Test-Path ("C:\_git\github\"))) {
    mkdir "C:\_git\github\"
}

Set-Location "C:\_git\github\"
git clone https://github.com/justin-p/my-notes-and-snippets 

Set-Location "C:\_git\github\my-notes-and-snippets\private"
git clone --depth 1 https://github.com/justin-p/my-private-notes-and-snippets

Set-Location "C:\_git\github\my-notes-and-snippets\external"
git clone --depth 1 https://github.com/redhuntlabs/Awesome-Asset-Discovery
git clone --depth 1 https://github.com/swisskyrepo/PayloadsAllTheThings
git clone --depth 1 https://github.com/OWASP/CheatSheetSeries OWASP-CheatSheetSeries

npm install -g gitbook-cli
npm install -g gitbook-summary