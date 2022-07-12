<?php
if(isset($_GET['device_id']) && isset($_GET['temperature']) && isset($_GET['humidity']))
{
    if(!empty($_GET['device_id']) && !empty($_GET['temperature']) && !empty($_GET['humidity'])){
        $host = "josephdatabase.cguvtsjez4ks.ca-central-1.rds.amazonaws.com"; // Endpoint of RDS from AWS
        $user_name = "vanier_database"; //Username for the RDS Database Server
        $password = "master_paasword_vanier_db"; // Password for the RDS Database Server
        $database = "Vanier_Web_Service"; // Database name for the RDS Database Server

        $connect = mysqli_connect($host, $user_name, $password, $database);

        if($connect){
            $device_id = $_GET['device_id']; //Parameter
            $temperature = $_GET['temperature']; //Parameter
            $humidity = $_GET['humidity']; //Parameter
            $sql = "INSERT INTO iot_data VALUES (NULL, '$device_id',$temperature,$humidity)"; //Preparing the MySQL Query from the parameters
            $query = mysqli_query($connect, $sql); //Executing the MySQL Query
            if($query){
                $output = array("status" => "Success", "description" => "Data inserted successfully");
                echo json_encode($output);
            }
            else{
                $output = array("status" => "Error", "error_description" => "Insertion Error");
                echo json_encode($output);
            }
        }
        else{
            $output = array("status" => "Error", "error_description" => "Connection Error");
            echo json_encode($output);
        }
    }
    else{
        $output = array("status" => "Error", "error_description" => "Empty Parameters", "solution" => "Please pass the 3 GET Non-Empty parameters required for this API!");
        echo json_encode($output);
    }
}
else{
    $output = array("status" => "Error", "error_description" => "Missing Parameters", "solution" => "Please pass the 3 GET parameters required for this API!");
    echo json_encode($output);
}
mysqli_close($connect); //Closing the MySQL connection