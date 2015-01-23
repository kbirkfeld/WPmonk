<?php
include 'tools.php';
include 'wptools.php';
include 'blog.php';
include 'blogpost.php';

$blogId = 4505;
$wpPosts = getwpPosts($id);
foreach($wpPosts as $wpPost)
{
    BlogPost::create($blogId, $wpPost);
}

/*Converts item to an array
 * 
 * 
 * @return array
 */

//$convertedItems = array();
//
//foreach ($items as $item) {
//    $convertedItems[] = convert_item_to_array($item);
//}
//$converted_item = $convertedItems[1];
//
//foreach ($convertedItems as $convertedItem) {
//    try {
//        $new_post = post_blogpost($convertedItem);
//        print_r($new_post);
//    } catch (Exception $ex) {
//        print_r($ex);
//    }
//}

//try {
//    $create_blog = post_blog($new_blog);
//    print_r($create_blog);
//} catch (Exception $ex) {
//    print_r($ex->getMessage());
//}
?>
