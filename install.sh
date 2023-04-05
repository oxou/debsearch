#!/bin/bash

sudo echo "#!/usr/bin/env php" >> /usr/bin/debsearch
sudo cat cli.php >> /usr/bin/debsearch

echo "debsearch installed."
