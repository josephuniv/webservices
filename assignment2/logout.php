<?php
// http://webservicesvanierjoseph-env.eba-4bqnfdnx.ca-central-1.elasticbeanstalk.com/authenticate.php?username=2195417&password=password
session_start();
session_destroy();
$output = array(
    "status" => "success",
    "message" => "Logged Out",
    "description" => "You have been successfully logged out."
);
echo json_encode($output);