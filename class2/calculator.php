<?php
// http://localhost/webservices/class2/calculator.php?num1=5&num2=4&operation=add
if(isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operation']))
{
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operation = $_GET['operation'];
    $result = 0;

    if($operation == "add")
    {
        $result = $num1 + $num2;
        echo json_encode("$num1 + $num2 = $result");
    }
    else if($operation == "subtract")
    {
        $result = $num1 - $num2;
        echo json_encode("$num1 - $num2 = $result");
    }
    else if($operation == "multiply")
    {
        $result = $num1 * $num2;
        echo json_encode("$num1 * $num2 = $result");
    }
    else if($operation == "divide")
    {
        $result = $num1 / $num2;
        echo json_encode("$num1 / $num2 = $result");
    }
    else{
        echo json_encode("Please select a valid operation!");
    }
}
else
{
    echo json_encode("Please input 3 required GET parameters (num1, num2 and operation)");
}