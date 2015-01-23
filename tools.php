<?php
//Put all generic tools here
class Tools {
    
    public static function post($url, $content)
    {
        $ch = curl_init();

        if($ch === false)
        {
            die('Failed to create curl object');
        }   

        $data_string = json_encode($content);  

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
        if  ($result['error']) {
           throw new Exception($result['error']);
        }
        return $result_array;
    }
    
}
?>
