<?php

/*Reads WP xml file and parses data
* @param string $wp formats WP data properly
* @param string $string contains WP data
* @param object $item contains WP Blog/Post data
* @return $item 
*/

function getWpPosts() {
$wp = file_get_contents('WPmonk.xml');
$wp = str_replace("content:encoded>","content>",$wp);
$wp = str_replace("wp:", "", $wp);

$string = simplexml_load_string($wp);
$item = $string->channel->item;
return $item;
}

?>
