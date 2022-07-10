<?php
$out=null;
if(isset($_GET['a']))
{
    $out = "setttt"; 
    if(empty($_GET['a']))    
    $out .= " emptyyyyy";    
}
else
    $out .= " not setttt";

echo json_encode($out);