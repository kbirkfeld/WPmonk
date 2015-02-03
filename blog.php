<?php

class Blog {
    
    public $baseUrl = "http://write-api.monkcms.com/api/v1/Blog";
    
    public $new_blog = array(
    'Name' => 'The Bird Blog',
    'Slug' => 'the-bird-blog',
    'Description' => 'All of your favorte birds are right here!',
    'DateTimeModified' => '2015-01-20 21:47:00'
    );
    
    /*Posts a new blog to the API
    *
    * @param array $content contains blog specific data
    * 
    * @return $post 
    */
    
    public static function create($content) {
        $url = Blog::baseUrl;
        $post = Tools::post($url, $content);
        return $post;
    }
}

?>
