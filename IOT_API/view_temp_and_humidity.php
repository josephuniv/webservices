<?php
$host = "josephdatabase.cguvtsjez4ks.ca-central-1.rds.amazonaws.com"; // Endpoint of RDS from AWS
$user_name = "vanier_database"; //Username for the RDS Database Server
$password = "master_paasword_vanier_db"; // Password for the RDS Database Server
$database = "Vanier_Web_Service"; // Database name for the RDS Database Server

$connect = mysqli_connect($host, $user_name, $password, $database);
if($connect){
    $sql = "SELECT * FROM iot_data"; // Creating the SQL Query to execute
    $query = mysqli_query($connect, $sql); // Executing the SQL Query
    $all_rows = array();
    while($row = mysqli_fetch_assoc($query)){ //Processing the result from SQL
        //print_r($row); //This line can be used to look at the raw array
        $row_object = array(
            "data_id" => $row['data_id'],
            "device_id" => $row['device_id'],
            "temperature" => $row['temperature'],
            "humidity" => $row['humidity'],
        );
        array_push($all_rows, $row_object);  
    }
    echo json_encode($all_rows);
}
else{
    $output = array("status" => "Error", "error_description" => "Connection Error");
    echo json_encode($output);
}
mysqli_close($connect); //Closing the MySQL Connection