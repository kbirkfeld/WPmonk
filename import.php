<?php
include 'tools.php';
include 'wptools.php';
include 'blog.php';
include 'blogpost.php';

$blogId = 4505;
$items = getWpPosts();
$convertedItems = BlogPost::convert_wp_blogpost($items);

foreach($convertedItems as $convertedItem) {
    BlogPost::create($blogId, $convertedItem);
}
?>
