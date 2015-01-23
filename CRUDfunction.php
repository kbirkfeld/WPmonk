<?php
function get_blog($id) 
{
    //Initialize cURL
    $ch = curl_init();
 
    //Execute the curl resource
    curl_setopt($ch, CURLOPT_URL, "http://write-api.monkcms.com/api/v1/BlogPost/$id");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        'X-AUTH-TOKEN: P1KdvgA5ONXrzu5jHw7YrKTDdWv6wVVk_305ed3251218d3906d3fddc10aa5ceac402bf2ff14aa'
    ));
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);
        
    return json_decode($output, true);
}

function post_blogpost($data) 
{
    $ch = curl_init();
    
    if($ch === false)
    {
        die('Failed to create curl object');
    }   

    $data_string = json_encode($data);  
    //echo $data_string;
      
    curl_setopt($ch, CURLOPT_URL, "http://write-api.monkcms.com/api/v1/BlogPost/");
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
    if  ($result['Error']) {
       throw new Exception($result['Error']);
    }
    return $result_array;
    
    //$create_id = $result_array["id"];
    //return $create_id;
        
    //$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    //echo $http_status;
    
    //return json_decode($output, true);
}

function post_blog($data) 
{
    $ch = curl_init();
    
    if($ch === false)
    {
        die('Failed to create curl object');
    }   

    $data_string = json_encode($data);  
      
    curl_setopt($ch, CURLOPT_URL, "http://write-api.monkcms.com/api/v1/Blog");
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
       throw new Exception(print_r($result,true));
    }
    return $result_array;
}


function put_blog($id, $data) {

    $data_string = json_encode($data); 
        
    //connection to api
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://write-api.monkcms.com/api/v1/BlogPost/$id");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-AUTH-TOKEN: P1KdvgA5ONXrzu5jHw7YrKTDdWv6wVVk_305ed3251218d3906d3fddc10aa5ceac402bf2ff14aa',
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))
    );

    //put request
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      

    $result = curl_exec($ch);

    //echo $result; 

    //$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //echo $http_status;

    curl_close($ch); 
}

function del_blog($id) {
    //connection to api
    $ch = curl_init();
    //CHANGE URL TO SPECIFY WHAT PAGE TO DELETE
    curl_setopt($ch, CURLOPT_URL, "http://write-api.monkcms.com/api/v1/BlogPost/$id");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-AUTH-TOKEN: P1KdvgA5ONXrzu5jHw7YrKTDdWv6wVVk_305ed3251218d3906d3fddc10aa5ceac402bf2ff14aa',
    'Content-Type: application/json'                                                                                
    ));

    //delete request
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");      
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    echo "it was successful";
    curl_close($ch);
} 

function list_data($id) {
    //connection to api
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://write-api.monkcms.com/api/v1/BlogPost?BlogId=$id");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-AUTH-TOKEN: P1KdvgA5ONXrzu5jHw7YrKTDdWv6wVVk_305ed3251218d3906d3fddc10aa5ceac402bf2ff14aa',
    'Content-Type: application/json'                                                                                
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);
        
    return json_decode($output, true);
}

?>
