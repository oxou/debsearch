<?php

//
// Copyright (C) 2022 Nurudin Imsirovic <github.com/oxou>
//
// This script provides the ability to search direct links to .DEB files
// of Debian packages.
//
// In order to use this script you need PHP-CLI
//
// Created: 2022-12-03 02:53 AM
// Updated: 2022-12-05 07:53 PM
//

// Check that the arguments are provided
$arg1 = $argv[1] ?? null;

if ($arg1 == null || empty(trim($arg1))) {
    $usage = <<<a
Usage: debsearch <package-name>\n
a;
    echo $usage;
    die(1);
}

$base_url = "https://packages.debian.org/sid/amd64/{PKGNAME}/download";
$pkg_url = str_replace("{PKGNAME}", $arg1, $base_url);
$mirror_match = "ftp.de.debian.org";
$has_mirror = false;

$page_result = file_get_contents($pkg_url);
$page_result_size = strlen($page_result);

function str_between($x, $a , $b) {
    if (strlen($x) == 0)
        return null;

    // Fix "passing null to parameter"
    $a = (string) $a;
    $b = (string) $b;

    if (strlen($b) == 0)
        return explode($a, $x, 2)[1];

    $x = explode($a, $x, 2)[1];
    $x = explode($b, $x, 2)[0];

    return $x;
}

if (str_contains($page_result, "No such package."))
    die("ERROR: No such package.\n");

if (!str_contains($page_result, $mirror_match))
    die("ERROR: Mirror $mirror_match not found.\n");
else
    $has_mirror = true;

if ($has_mirror) {
    $url = str_between($page_result, "<li><a href=\"http://" . $mirror_match . "/debian/", ".deb\">");
    echo "http://$mirror_match/debian/" . $url . ".deb\n";
}

die(0);

?>