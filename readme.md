
# debsearch

This script provides the ability to search direct links to .DEB files of Debian packages.

In order to use this script you need to have PHP installed.

# Installation

## Linux

1. `git clone --depth=1 https://github.com/oxou/debsearch`
2. `cd debsearch`
3. `chmod +x ./install.sh`
4. `./install.sh`

## Windows

1. `git clone --depth=1 https://github.com/oxou/debsearch`
2. `cd debsearch`
3. `notepad debsearch.bat`
4. Set {PHP_EXE} to the absolute path of `php.exe` and {CLI_PHP} to the absolute path of `cli.php` example: `C:\debsearch\cli.php`
5. Save `debsearch.bat` to `C:\Windows\System32`

# Usage

## Basics

```
$ debsearch
Usage: debsearch <package-name>

$ debsearch nano
http://ftp.de.debian.org/debian/pool/main/n/nano/nano_7.2-1_amd64.deb

$ debsearch a-package-that-does-not-exist
ERROR: No such package.
```

## wget + debsearch

```
$ wget $(debsearch netselect) -O netselect.deb
--2023-04-05 15:39:03--  http://ftp.de.debian.org/debian/pool/main/n/netselect/netselect_0.3.ds1-30.1_amd64.deb
Resolving ftp.de.debian.org (ftp.de.debian.org)... 141.76.2.4
Connecting to ftp.de.debian.org (ftp.de.debian.org)|141.76.2.4|:80... connected.
HTTP request sent, awaiting response... 200 OK
Length: 23208 (23K) [application/vnd.debian.binary-package]
Saving to: 'netselect.deb'

netselect.deb                                  100%[====================================================================================================>]  22.66K  --.-KB/s    in 0.06s

2023-04-05 15:39:03 (378 KB/s) - 'netselect.deb' saved [23208/23208]

$ sudo dpkg -i netselect.deb
Selecting previously unselected package netselect.
(Reading database ... 84165 files and directories currently installed.)
Preparing to unpack netselect.deb ...
Unpacking netselect (0.3.ds1-30.1) ...
Setting up netselect (0.3.ds1-30.1) ...
Processing triggers for man-db (2.10.2-1) ...

$ netselect
Usage: netselect [-v|-vv|-vvv] [-I] [-m max_ttl] [-s servers] [-t min_tries] host ...
```
