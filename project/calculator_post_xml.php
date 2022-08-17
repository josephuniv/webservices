<?php
//localhost/webservices/project/
//http://webservicesvanierjoseph-env.eba-4bqnfdnx.ca-central-1.elasticbeanstalk.com
$dom = new DOMDocument('1.0','UTF-8');
$dom->formatOutput = true;
$output = $dom->createElement('output');
$dom->appendChild($output);

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
                $status = $dom->createElement('status', 'error');
                $error_code = $dom->createElement('error_code', '4');
                $error_description = $dom->createElement('error_description', 'Division by 0');
                $error_solution = $dom->createElement('error_solution', 'Please provide the non 0 value for the second parameter');
                $output->appendChild($status);
                $output->appendChild($error_code);
                $output->appendChild($error_description);
                $output->appendChild($error_solution);                 
            }
            else
            {
                $result = $num1 / $num2;
            }
        }
        else
        {
            $status = $dom->createElement('status', 'error');
            $error_code = $dom->createElement('error_code', '3');
            $error_description = $dom->createElement('error_description', 'Operation incorrect');
            $error_solution = $dom->createElement('error_solution', 'Please provide factorial, power, modulus, add, subtract, multiply or divide');
            $output->appendChild($status);
            $output->appendChild($error_code);
            $output->appendChild($error_description);
            $output->appendChild($error_solution);
        }

        if(isset($result))
        {  
            $status = $dom->createElement('status', 'success');
            $num1 = $dom->createElement('num1', $num1);
            $num2 = $dom->createElement('num2', $num2);
            $operation = $dom->createElement('operation', $operation);
            $result = $dom->createElement('result', $result);
            $output->appendChild($status);
            $output->appendChild($num1);
            $output->appendChild($num2);
            $output->appendChild($operation);
            $output->appendChild($result);
        }  
    }
    else
    {
        $status = $dom->createElement('status', 'error');
        $error_code = $dom->createElement('error_code', '2');
        $error_description = $dom->createElement('error_description', 'Parameters are empty');
        $error_solution = $dom->createElement('error_solution', 'Please provide the non empty required parameters for this API');
        $output->appendChild($status);
        $output->appendChild($error_code);
        $output->appendChild($error_description);
        $output->appendChild($error_solution);       
    }
}
else
{    
    $status = $dom->createElement('status', 'error');
    $error_code = $dom->createElement('error_code', '1');
    $error_description = $dom->createElement('error_description', 'Parameter missing');
    $error_solution = $dom->createElement('error_solution', 'Please provide the required parameters for this API');
    $output->appendChild($status);
    $output->appendChild($error_code);
    $output->appendChild($error_description);
    $output->appendChild($error_solution);
}


echo $dom->saveXML();
