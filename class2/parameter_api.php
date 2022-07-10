<?php
if(isset($_GET['first_name']) && isset($_GET['last_name'])) // isset is a PHP function used to check if a variable is assigned
{ // In PHP all variables start with a '$'
    $first_name = $_GET['first_name']; // If the name is passed in the get request, we store it's value in the variable $name
    $last_name = $_GET['last_name'];
    echo json_encode("Hello $first_name $last_name"); //We will output Hello followed by the name that we recieved in the request
}
else{
    // If the GET request does not have the name parameter, this else is executed
    echo json_encode("Hello World!");
}