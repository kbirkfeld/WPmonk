<?php
include 'CRUDfunction.php';

class BlogPost {
    
    public static $baseUrl = "http://write-api.monkcms.com/api/v1/BlogPost";
    
    /*Converts API properties into array
    * 
    * @param obj $item contains blogpost data
    * 
    * @return array of properties 
    */
    
    public static function convert_item_to_array($item, $blogId) {
        return array(
            'Name' => (string)$item->title,
            'Slug' => str_replace(" ", "-", strtolower((string)$item->content)),
            'Content' => (string)$item->content,
            'BlogId' => $blogId,
            'Associations' => array(
                'Category' => (string)$item->category->category_nicename
            ),
            'DateTimePosted' => (string)$item->post_date
        );
    }
    
    /*Loops through array of blog posts
    * 
    * @param string $fields contains blogpost fields
    * 
    * @return $convertedItems  
    */
    
    public static function convert_wp_blogpost($fields, $blogId) {
       $convertedItems = array();
        foreach ($fields as $field) {
            $convertedItems[] = self::convert_item_to_array($field, $blogId);
        }
        return $convertedItems;
    }

    /*Used on import.php to create blogposts
    * 
    * @param string $blogId is hardcoded blogId
    * @param array $content contains blogpost data
    * 
    * @return $post  
    */
    
    public static function create($blogId, $content) {
        $url = BlogPost::$baseUrl;
        $post = Tools::post($url, $content);
        return $post;
    }
}
?>
