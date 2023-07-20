<?php
add_action('rest_api_init', function () {
    register_rest_route(
        'custom-api/v1',
        '/get_data/',
        array(
            'methods'   => 'GET',
            'callback'  => 'get_data'
        )
    );
});

add_action('rest_api_init', function () {
    register_rest_route(
        'custom-api/v1',
        '/create_update_data/',
        array(
            'methods'   => 'POST',
            'callback'  => 'create_update_data'
        )
    );
});

function get_data(){
    global $wpdb;
   
    $resultPost  =   $wpdb->get_results("SELECT * FROM wp_create_update_user_data");

    return json_encode(array(
        'data' => $resultPost,
    ));
}

function create_update_data(){
    global $wpdb;
    $name                       =   $_POST['Name']?$_POST['Name']:'';
    $phone                      =   $_POST['Phone']?$_POST['Phone']:'';
    $email                      =   $_POST['Email']?$_POST['Email']:'';
    $address                    =   $_POST['Address']?$_POST['Address']:'';

    echo $phone;
    $find_flag                  =   $wpdb->get_col("SELECT `phone` FROM wp_create_update_user_data WHERE `phone` = '".$phone."'");

    if($find_flag){
        $insert_data            =   $wpdb->query($wpdb->prepare("UPDATE wp_create_update_user_data SET `name` = '$name', `email` = '$email',  `address` = '$address' WHERE `phone` = '".$phone."'"));
        
        if($insert_data){
            $response["statusCode"] = "200";
            $response["text"]       = "Record Updatated Sucessfully"; 
        }else{
            $response["statusCode"] = "201";
            $response["text"]       = "Updation Failed";
        }
    }else{
        $insert_data    =   $wpdb->query($wpdb->prepare("INSERT INTO wp_create_update_user_data(`name`,`phone`,`email`,`address`) VALUES('$name', '$phone', '$email', '$address')"));
        if($insert_data){
            $response["statusCode"] = "200";
            $response["text"]       = "Record Inserted Sucessfully"; 
        }else{
            $response["statusCode"] = "201";
            $response["text"]       = "Insertion Failed";
        }
    }

    return $response;
}

?>