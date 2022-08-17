<?php
//localhost/webservices/project/
//http://webservicesvanierjoseph-env.eba-4bqnfdnx.ca-central-1.elasticbeanstalk.com
if(isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operation']))
{
    $num1 = strip_tags($_POST['num1']);
    $num2 = strip_tags($_POST['num2']);
    $operation = strip_tags($_POST['operation']);
    $result = NULL;

    if(!empty($num1) && !empty($num2) && !empty($operation))
    {         
        if($operation == "factorial" || $operation == "!")
        { 
            $fact = 1;
            for($i=2 ; $i <= $num1 ; $i++)
                $fact = $fact * $i;
            $result = $fact;
        }                            
        else if($operation == "power" || $operation == "^")
        { 
            $result = pow($num1 , $num2);
        }
        else if($operation == "modulus" || $operation == "%")
        {  
            $result = $num1 % $num2;
        }
        else if($operation == "add" || $operation == "+")
        {
            $result = $num1 + $num2;
        }
        else if($operation == "subtract" || $operation == "-")
        {
            $result = $num1 - $num2;
        }
        else if($operation == "multiply" || $operation == "*")
        {
            $result = $num1 * $num2;
        }
        else if($operation == "divide" || $operation == "/")
        {
            if($num2 == 0)
            {
                $output = array(
                    "status" => "error",
                    "ErrorCode" => "4",
                    "Error Description" => "Division by 0",
                    "error_solution" => "Please provide the non 0 value for the second parameter"
                );                    
            }
            else
            {
                $result = $num1 / $num2;
            }
        }
        else
        {
            $output = array(
                "status" => "error",
                "ErrorCode" => "3",
                "Error Description" => "Operation incorrect",
                "Value Expected" => "factorial, power, modulus, add, subtract, multiply or divide",
                "Value Recieved" => "$operation"
            );
        }

        if(isset($result))
        {  
            $output = array(
                "status" => "success",
                "num1" => $num1,
                "num2" => $num2,
                "operation" => $operation,                
                "result" => $result                        
            );
        }  
    }
    else
    {
        $output = array(
            "status" => "error",
            "error_code" => "2",
            "error_description" => "Parameters are empty",
            "error_solution" => "Please provide the non empty required parameters for this API"
        );       
    }
}
else
{
    $output = array(
        "status" => "error",
        "error_code" => "1",
        "error_description" => "Parameter missing",
        "error_solution" => "Please provide the required parameters for this API"
    );  
}
echo json_encode($output);  
