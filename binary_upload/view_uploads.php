<?php
$directory = "uploads/";
$file = scandir($directory);
$files = array_values(array_diff($file, array(".","..")));
echo json_encode($files);