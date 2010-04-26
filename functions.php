<?php
include("lib/magpierss/rss_fetch.inc");

function print_a($arr) {
    print("<pre>");
    print_r($arr);
    print("</pre>");
}

function load_feeds($feed_file="feeds.inc") {
    $feeds = array();
    $lines = file($feed_file);
    foreach ($lines as $line) {
        $feeds[] = trim($line);
    }
    return $feeds;
}

?>
