<?php
error_reporting(0); //This is used to stop the server from displaying error messages
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["vanierProfilePicture"]["name"]);
if(move_uploaded_file($_FILES["vanierProfilePicture"]["tmp_name"], $target_file)){
    echo json_encode(array("Code"=>1, "Status"=>"Success", "Message"=>"Upload successful"));
}else{
    echo json_encode(array("Code"=>2, "Status"=>"Error", "Message"=>"Sorry, there was an error uploading your file."));
}