<?php
// This API expects the user to send the amount and the investment period (time)
// The response of the API contains the rate of interest on the amount
// localhost/webservices/class5/interest_api.php?amount=500&time=2
if(isset($_GET['amount']) && isset($_GET['time']))
{
    $amount = $_GET['amount'];
    $time = $_GET['time'];
    if(!empty($amount) && !empty($time))
    {
        // If the amount and time parameter are not empty and are sent in the GET request
        // We would calculate the interest and send it as a response of the API
        if($time>0 && $time<1){
            $rate_of_interest = 1;
        }
        else if($time >= 1 && $time < 2){
            $rate_of_interest = 2;
        }
        else if($time >= 2 && $time < 3){
            $rate_of_interest = 3;
        }
        else if($time >= 3 && $time < 4){
            $rate_of_interest = 4;
        }
        else if($time >= 4 && $time < 5){
            $rate_of_interest = 5;
        }
        else if($time >= 5){
            $rate_of_interest = 10;
        }
        else{
            $rate_of_interest = 0;
        }

        //After rate of interest has been calculated, we would give the output
        if($rate_of_interest==0)
        {
            $output = array(
                "status" => "error",
                "error_code" => "3",
                "error_description" => "The time parameter is negative",
                "error_solution" => "Please check the value of the time parameter"
            );
            echo json_encode($output);
        }
        else{
            $output = array(
                "status" => "success",
                "amount" => $amount,
                "time" => $time,
                "rate_of_interest" => $rate_of_interest,
                "interest_amount" => $amount * $time * $rate_of_interest / 100,
                "simple_interest_return" => $amount + $amount * $time * $rate_of_interest / 100
            );
            echo json_encode($output);
        }
    }
    else{
        $output = array(
            "status" => "error",
            "error_code" => "2",
            "error_description" => "Parameters are empty",
            "error_solution" => "Please provide the non empty required GET parameters for this API"
        );
        echo json_encode($output);
    }
}
else{
    $output = array(
        "status" => "error",
        "error_code" => "1",
        "error_description" => "Parameter missing",
        "error_solution" => "Please provide the required GET parameters for this API"
    );
    echo json_encode($output);
}