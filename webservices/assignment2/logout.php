<?php
session_start();
session_destroy();
$output = array(
    "status" => "success",
    "message" => "Logged Out",
    "description" => "You have been successfully logged out."
);
echo json_encode($output);