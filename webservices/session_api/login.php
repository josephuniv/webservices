<?php
//This API would be used for authentication
if(isset($_GET['username']) && isset($_GET['password'])){
    $db_host = "josephdatabase.cguvtsjez4ks.ca-central-1.rds.amazonaws.com";
    $db_ub = "vanier_database";
    $db_pw = "master_paasword_vanier_db";
    $db_name = "Vanier_Web_Service";
    $connection = mysqli_connect($db_host, $db_ub, $db_pw, $db_name);

    if($connection){
        $username = $_GET['username'];
        $password = $_GET['password'];
        $sql = "SELECT uid, user_name FROM users WHERE user_name='$username' AND user_password='$password'";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($query);
        if($row['uid'] && $row['user_name']){            
            $uid = $row['uid'];
            $user_name = $row['user_name'];
            
            session_start();
            $_SESSION['uid'] = $uid;
            $_SESSION['user_name'] = $user_name;

            $output = array(
                "status" => "success",
                "description" => "User authenticated",
                "message" => "User authentication successful. The session has been set. You can now access any API on this website using the session ID."
            );
            echo json_encode($output);
        }
        else{
            $output = array(
                "status" => "error",
                "description" => "Incorrect credentials",
                "error_fix" => "Please check the username and password entered"
            );
            echo json_encode($output);
        }
    }
    else{
        $output = array(
            "status" => "error",
            "description" => "Connection to DB not successful",
            "error_fix" => "Please look at the db credentials in the code"
        );
        echo json_encode($output);
    }
}
else{
    $output = array(
        "status" => "error",
        "description" => "Username and Password parameter missing",
        "error_fix" => "Pass the required GET parameters"
    );
    echo json_encode($output);
}