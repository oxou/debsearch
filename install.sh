#!/bin/bash

if [ $EUID != 0 ]; then
    echo "You must be root to use this script."
    exit 1
fi

echo "#!/usr/bin/env php" >> /usr/bin/debsearch
cat cli.php >> /usr/bin/debsearch
chmod +x /usr/bin/debsearch

echo "debsearch installed."
