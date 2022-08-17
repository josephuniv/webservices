<?php
if(isset($_GET['name']) && isset($_GET['comment'])){
    $host = "josephdatabase.cguvtsjez4ks.ca-central-1.rds.amazonaws.com"; // Endpoint of RDS from AWS
    $user_name = "vanier_database"; //Username for the RDS Database Server
    $password = "master_paasword_vanier_db"; // Password for the RDS Database Server
    $database = "Vanier_Web_Service"; // Database name for the RDS Database Server

    $connect = mysqli_connect($host, $user_name, $password, $database);
    $name = strip_tags($_GET['name']);
    $comment = strip_tags($_GET['comment']);
    //$comment = $_GET['comment'];
    $sql = "INSERT INTO xss_data VALUES(NULL, '$name', '$comment')";
    if(mysqli_query($connect, $sql)){
        echo "Data Inserted!";
    }
}