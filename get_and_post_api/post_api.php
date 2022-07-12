<?php
// We will display the list of the class students if the API user knows the secret API Key
if(isset($_POST['apiKey'])){
    if($_POST['apiKey'] == "secretKey"){
        $output = array(
            "Course Name" => "Web Services",
            "Course Code" => "420-941-VA",
            "Group Number" => "LEA.8F EQ 2 (CODE 30)",
            "Section Number" => 5899,
            "Students" => array(
                "Bai Lihua",
                "JUAN CARLOS MORAN MONCADA",
                "Joseph Jananji",
                "Yelena Dudchenko",
                "LI FANG SHE",
                "Morteza Khanjanzadeh",
                "Zhenxia Diao",
                "Jaswinder Singh",
                "Jianquan Liang",
                "Abram Girgis",
                "Hazar SNOUSSI",
                "fang chen",
                "Basil Kamhiyah",
                "Carolina Torres Restrepo",
                "Xiao Feng Huang",
                "Mahsa Roostaei",
                "seky perez moya",
                "Randolph Solomon Mcpherson ",
                "Tyler Nelson",
                "YUQIANG"
            )
        );
        echo json_encode($output);
    }
    else{
        $output = array("status" => "Error", "description" => "apiKey incorrect", "solution" => "Please enter the correct apiKey as a POST parameter to look at the list of students");
        echo json_encode($output);
    }
}
else{
    $output = array("status" => "Error", "description" => "apiKey Not set", "solution" => "Please enter the apiKey as a POST parameterto look at the list of students");
    echo json_encode($output);
}