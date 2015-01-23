<?php
//Put all tools related to WP here

$wp = file_get_contents('WPmonk.xml');
$wp = str_replace("content:encoded>","content>",$wp);
$wp = str_replace("wp:", "", $wp);
$string = simplexml_load_string($wp);
$items = $string->channel->item;
$id = 4505;

function getwpPosts($id) 
{
    //Initialize cURL
    $ch = curl_init();
 
    //Execute the curl resource
    curl_setopt($ch, CURLOPT_URL, "http://write-api.monkcms.com/api/v1/Blog/$id");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        'X-AUTH-TOKEN: P1KdvgA5ONXrzu5jHw7YrKTDdWv6wVVk_305ed3251218d3906d3fddc10aa5ceac402bf2ff14aa'
    ));
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);
        
    return json_decode($output, true);
}

?>
