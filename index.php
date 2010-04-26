<?php
include("functions.php");
$feeds = load_feeds();

$items = array();
foreach ($feeds as $url) {
    $rss = fetch_rss($url);
    $num_items = 1;
    $level = 0;
    foreach ($rss->items as $item) {
        $items[$level++][] = $item;
        $num_items--;
        if ($num_items == 0) break;
    }
}
$list = array();
foreach ($items as $level=>$level_items) {
    $list = array_merge($list, $level_items);
}
print("Current Feed:<br />\n");
foreach ($list as $item) {
    $title = $item["title"];
    $url = $item["enclosure"][0]["url"];
    print("<a href=\"$url\">$title</a><br />");
}

?>
