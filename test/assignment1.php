<?php
//http://webservicesvanierjoseph-env.eba-4bqnfdnx.ca-central-1.elasticbeanstalk.com/assignment1.php?principal_amount=1000&rate_of_interest=4&time_of_investment=1
if(isset($_GET['principal_amount']) && isset($_GET['rate_of_interest']) && isset($_GET['time_of_investment']))
{
    $principal_amount = $_GET['principal_amount'];
    $rate_of_interest = $_GET['rate_of_interest'];
    $time_of_investment = $_GET['time_of_investment'];
    if(!empty($principal_amount) && !empty($rate_of_interest) && !empty($time_of_investment))
    {
        if($principal_amount > 0 && $rate_of_interest > 0 && $time_of_investment > 0) 
        {                  
            $total_return = $principal_amount * pow((1+$rate_of_interest / (100*2)) , 2*$time_of_investment);             
            $interest_amount= $total_return - $principal_amount;
        
            $output = array(
                "status" => "success",
                "principal_amount" => $principal_amount,
                "rate_of_interest" => $rate_of_interest,
                "time_of_investment" => $time_of_investment,                
                "interest_amount" => $interest_amount, 
                "total_return" => $total_return       
            );                   
        }
        else
        {
            $output = array(
                "status" => "error",
                "error_code" => "3",
                "error_description" => "Parameters are negative",
                "error_solution" => "Please provide positive parameters for this API"
            );           
        }      
    }
    else
    {
        $output = array(
            "status" => "error",
            "error_code" => "2",
            "error_description" => "Parameters are empty",
            "error_solution" => "Please provide the non empty required GET parameters for this API"
        );       
    }
}
else
{
    $output = array(
        "status" => "error",
        "error_code" => "1",
        "error_description" => "Parameter missing",
        "error_solution" => "Please provide the required GET parameters for this API"
    );    
}
echo json_encode($output);