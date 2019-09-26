# Packet manager - APT

Nearly all Linux distributions come preinstalled with a packet manager. A packet manager is an application that pulls software packages from a software library and installs them on the system.

**Example:** If you want to install a web server on Windows, you will first need to manually perform several steps to download the installer and install it on your system. 

On Linux \(Ubuntu in this example\), only a simple command is required: `apt install nginx`

The package manager \(APT\) makes sure that nginx \(the web server software\) gets downloaded from a trusted source and is properly installed on your system.

APT also has many other functionalities, like:

* Searching for available software packages in all software libraries.
* Updating old software packages.
* Updating your operating system \(system upgrade\).

**Warning:** On older Linux versions, you are possible required to extend the `apt` command to `apt-get`. 

**Examples on a apt usage:**

Performing package upgrades.`apt update && apt upgrade`

Searching for a package in the package library.`apt search nginx`

Where "nginx" is the name of the package we are looking for.

