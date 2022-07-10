<?php
//This page would only be displayed if the user has the correct Key
if(isset($_GET['apiKey']))
{
    // http://localhost/webservices/class2/api_key.php?apiKey=Abc@123
    $apiKey = $_GET['apiKey'];
    if($apiKey == "Abc@123")
    {
        //Success
        $error="You have successfully entered the correct API Key!";
    }
    else{
        $error = array(
            "Error Code" => 2,
            "Error Description" => "apiKey is incorrect. Please try again with the corrrect API Key"
        );
        //echo json_encode($error);
    }
}
else
{
    $error = array(
        "Error Code" => 1,
        "Error Description" => "apiKey missing"
    );
    
}
echo json_encode($error);