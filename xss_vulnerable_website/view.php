<?php
    $host = "josephdatabase.cguvtsjez4ks.ca-central-1.rds.amazonaws.com"; // Endpoint of RDS from AWS
    $user_name = "vanier_database"; //Username for the RDS Database Server
    $password = "master_paasword_vanier_db"; // Password for the RDS Database Server
    $database = "Vanier_Web_Service"; // Database name for the RDS Database Server

    $connect = mysqli_connect($host, $user_name, $password, $database);
    $sql = "SELECT * FROM xss_data";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_assoc($query)){
        echo $row['name'];
        echo " : ";
        echo $row['comment'];
        echo "<br />";
    }
