<?php
// 1-D array
// $students = array("Morteza","Mahsa","Joseph");
// 2-D arrays
$students = array("studentID" => 2195423, "studentName" => "Albrecht, Artemy Jan", "studentPhone" => "9090909090");

// echo json_encode("Hello World!");
echo json_encode($students); //In an API, we only have one echo that uses json_encode to output JSON
//echo json_encode($students["studentName"]);