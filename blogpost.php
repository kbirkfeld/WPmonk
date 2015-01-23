<?php
class BlogPost {
    public static $baseUrl = "http://write-api.monkcms.com/api/v1/BlogPost";
    
    public static function convert_item_to_array($item) {
        return array(
            'Name' => (string)$item->title[0],
            'Slug' => str_replace(" ", "-", strtolower((string)$item->content[0])),
            'Content' => (string)$item->content[0],
            //Enter specific BlogId here:
            'BlogId' => 4505,
            'DateTimePosted' => (string)$item->post_date[0]
        );
    }
    
    public static function convert_wp_blogpost(/*$blogId, $wpPost*/$item)
    {
       $convertedItems = array();

        foreach ($items as $item) {
            $convertedItems[] = convert_item_to_array($item);
        }
        $converted_item = $convertedItems[1];

        foreach ($convertedItems as $convertedItem) {
            try {
                $new_post = post_blogpost($convertedItem);
                print_r($new_post);
            } catch (Exception $ex) {
                print_r($ex);
            }
        }
    }

    public static function create($blogId, $wpPost)
    {
        $content = BlogPost::convert_wp_blogpost($blogId, $wpPost);
        $url = BlogPost::$baseUrl;
        $post = Tools::post($url, $content);
        return $post;
    }
}
?>
