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
        '/get_user_data/',
        array(
            'methods'   => 'POST',
            'callback'  => 'get_user_data'
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

function get_user_data(){
    global $wpdb;
    $mob_no                      =   $_POST['userMob']?$_POST['userMob']:'';

    $get_data  =   $wpdb->get_results("SELECT * FROM wp_create_update_user_data WHERE `phone` = $mob_no");

    if($get_data){
        $response_message   =   'success';
        $data               =   $get_data;
        $message            =   'Existing User';
    }

    return  [
        "success"   =>  ($response_message == 'success') ? true : false,
        "data"      =>  ($response_message == 'success') ? $data : '',
        "message"   =>  ($response_message == 'success') ? $message:'No Record Found.',
    ];
}

function create_update_data(){
    global $wpdb;
    $fname                      =   $_POST['FirstName']?$_POST['FirstName']:'';
    $lname                      =   $_POST['LastName']?$_POST['LastName']:'';
    $phone                      =   $_POST['Phone']?$_POST['Phone']:'';
    $new_phone                  =   $_POST['NewPhone']?$_POST['NewPhone']:'';
    $email                      =   $_POST['Email']?$_POST['Email']:'No Email Added';
    $address                    =   $_POST['Address']?$_POST['Address']:'';
    $operation_type             =   $_POST['Operation']?$_POST['Operation']:'';

    $find_flag                  =   $wpdb->get_col("SELECT `phone` FROM wp_create_update_user_data WHERE `phone` = '".$phone."'");

    if($find_flag){
        if($operation_type == 'update'){
            if($new_phone != ''){
                $update_data            =   $wpdb->query("UPDATE wp_create_update_user_data SET `first_name` = '$fname', `last_name` = '$lname', `phone` = '$new_phone', `email` = '$email', `address` = '$address' WHERE `phone` = '$phone'");
    
            }else{
                $update_data            =   $wpdb->query("UPDATE wp_create_update_user_data SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `address` = '$address' WHERE `phone` = '$phone'");
            }
           
            if($update_data){
                $response["statusCode"] = "200";
                $response["text"]       = "Record Updatated Sucessfully"; 
            }else{
                $response["statusCode"] = "201";
                $response["text"]       = "Updation Failed";
            }
        }else if($operation_type == 'insert'){
            $response["statusCode"] = "201";
            $response["text"]       = "This phone number is already registered.";
        }else{
            $response["statusCode"] = "201";
            $response["text"]       = "Something went wrong";
        }
    }else{
        $insert_data    =   $wpdb->query($wpdb->prepare("INSERT INTO wp_create_update_user_data(`first_name`,`last_name`,`phone`,`email`,`address`) VALUES('$fname', '$lname', '$phone', '$email', '$address')"));
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