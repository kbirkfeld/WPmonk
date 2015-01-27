<?php

class Blog {
    
    public $baseUrl = "http://write-api.monkcms.com/api/v1/Blog";
    
    public $new_blog = array(
    'Name' => 'The Bird Blog',
    'Slug' => 'the-bird-blog',
    'Description' => 'All of your favorte birds are right here!',
    'DateTimeModified' => '2015-01-20 21:47:00'
    );
    
    /*JSON encodes data and posts to API
    * @param string $url contains API url
    * @param array $content contains WP data
    * @return $result_array  
    */
    
    public static function create($blogId, $wpPost) {
        $url = Blog::baseUrl;
        $post = Tools::post($url, $content);
        return $post;
    }
}

?>
