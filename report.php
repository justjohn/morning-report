<?php
include("functions.php");

header("Content-Type: audio/mpegurl");

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
print("#EXTM3U\n\n");
foreach ($list as $item) {
    $title = $item["title"];
    $url = $item["enclosure"][0]["url"];
    $length = 0; //$item["enclosure"][0]["length"];
    print("#EXTINF:$length,$title\n");
    print("$url\n\n");
}

?>
