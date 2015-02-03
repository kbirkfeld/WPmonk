<?php
include 'tools.php';
include 'wptools.php';
include 'blog.php';
include 'blogpost.php';

$blogId = (int)$_POST['blogs'];
$fileName = $_POST['WPfile'];
$items = getWpPosts($fileName);
$convertedItems = BlogPost::convert_wp_blogpost($items, $blogId);

foreach($convertedItems as $convertedItem) {
    $posts .= BlogPost::create($blogId, $convertedItem);
}

if (isset($posts)){
    echo "Your import was successful";
} else {
    echo "Please try your import again";
}

?>