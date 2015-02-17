<?php

class Tools {
  
    /*JSON encodes data and posts to API
    * @param string $url contains API url
    * @param array $content contains WP data
    * @return $result_array  
    */
    
    public static function post($url, $content) {
        $ch = curl_init();

        if($ch === false)
        {
            die('Failed to create curl object');
        }   

        $data_string = json_encode($content); 
//        print_r($data_string);
//        die();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-AUTH-TOKEN: P1KdvgA5ONXrzu5jHw7YrKTDdWv6wVVk_305ed3251218d3906d3fddc10aa5ceac402bf2ff14aa',
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))
        );
        
        
        //post request
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        $result = curl_exec($ch);
        curl_close($ch);

        $result_array = json_decode($result, true);

        if  (isset($result_array['error'])) {
           throw new Exception($result_array['error']);
        }
        return $result_array;
    }
    
    /*Gives a dropdown list of all Blogs
    * 
    * @return $options containing all Blogs with BlogId  
    */
    
    public static function getAllBlogsAsOptions() {
        $options = array (
            4501 => 'Dog',
            4139 => 'Lizard',
            4505 => 'Bird' 
        );
        return $options;
    }
    
}
?>
