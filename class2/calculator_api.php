<?php
// http://localhost/webservices/class2/calculator_api.php?num1=5&num2=4&operation=add
// https://jsonformatter.curiousconcept.com/#
if(isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operation']))
{
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operation = $_GET['operation'];
    $result = NULL;

    if($operation == "add")
    {
        $result = $num1 + $num2;
    }
    else if($operation == "subtract")
    {
        $result = $num1 - $num2;
    }
    else if($operation == "multiply")
    {
        $result = $num1 * $num2;
    }
    else if($operation == "divide")
    {
        if($num2 == 0)
        {
            $output = array(
                "ErrorCode" => "3",
                "Error Description" => "Division by 0"
            );
            echo json_encode($output);
        }
        else{
            $result = $num1 / $num2;
        }
    }
    else{
        $output = array(
            "ErrorCode" => "1",
            "Error Description" => "Operation incorrect",
            "Value Expected" => "add, subtract, multiply or divide",
            "Value Recieved" => "$operation"
        );
        echo json_encode($output);
    }
    if(isset($result))  // if we put    if($result)    it will not execute if result is 0 (Consider it false)
    {
        $output = array(
            "FirstNumber" => $num1,
            "SecondNumber" => $num2,
            "Operation" => $operation,
            "Result" => $result
        );
        echo json_encode($output);
    }
}
else
{
    $output = array(
        "ErrorCode" => "2",
        "Error Description" => "Missing parameters",
        "Parameters Required" => "num1, num2 and operation",
    );
    echo json_encode($output);
}