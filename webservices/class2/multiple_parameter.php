<?php
if(isset($_GET['first_name']) && isset($_GET['last_name'])){
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    echo json_encode("Welcome $first_name $last_name");
}
else{
    echo json_encode("Hello World!");
}