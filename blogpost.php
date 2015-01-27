<?php
include 'CRUDfunction.php';

class BlogPost {
    
    public static $baseUrl = "http://write-api.monkcms.com/api/v1/BlogPost";
    
    /*Converts API properties into array
    * 
    * 
    * @return array of properties 
    */
    
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
    
    /*JSON encodes data and posts to API
    * @param string $url contains API url
    * @param array $content contains WP data
    * @return $result_array  
    */
    
    public static function convert_wp_blogpost($fields) {
       $convertedItems = array();
        foreach ($fields as $field) {
            $convertedItems[] = self::convert_item_to_array($field);
        }
        return $convertedItems;

//        foreach ($convertedItems as $convertedItem) {
//            try {
//                $new_post = post_blogpost($convertedItem);
//            } catch (Exception $ex) {
//                print_r($ex);
//            }
//        }
    }

    /*JSON encodes data and posts to API
    * @param string $url contains API url
    * @param array $content contains WP data
    * @return $result_array  
    */
    
    public static function create($blogId, $content) {
        $url = BlogPost::$baseUrl;
        $post = Tools::post($url, $content);
        return $post;
    }
}
?>
