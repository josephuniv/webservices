<?php
session_start();
if(isset($_SESSION['uid']) && isset($_SESSION['user_name'])){
    $output = array(
        "status" => "Success",
        "user_id" => $_SESSION['uid'],
        "user_name" => $_SESSION['user_name'],
        "message" => "You are logged in"        
    );    
}
else{
    $output = array(
        "status" => "error",
        "error_message" => "Not Authenticated",
        "error_description" => "Please log in using the Authenticate (login) API"
    );    
}
echo json_encode($output);