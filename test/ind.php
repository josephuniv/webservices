<?php
$first_name = $_GET['fname']; // If the name is passed in the get request, we store it's value in the variable $name
    $last_name = $_GET['lname'];
    echo json_encode("Hello $first_name $last_name");