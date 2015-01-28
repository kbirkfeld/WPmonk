<?php

/*Reads WP xml file and parses data
* @var string $wp formats WP data properly
* @var string $string contains WP data
* @var object $item contains WP Blog/Post data
* @return $item 
*/

function getWpPosts($fileName) {
$wp = file_get_contents($fileName);
$wp = str_replace("content:encoded>","content>",$wp);
$wp = str_replace("wp:", "", $wp);

$string = simplexml_load_string($wp);
$item = $string->channel->item;
return $item;
}

?>
