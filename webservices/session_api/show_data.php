<?php
session_start();
if(isset($_SESSION['uid']) && isset($_SESSION['user_name'])){
    $output = array(
        "status" => "Success",
        "user_id" => $_SESSION['uid'],
        "user_name" => $_SESSION['user_name'],
        "data" => array(
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
            "YUQIANG",
            "Artemy"
        )
    );
    echo json_encode($output);
}
else{
    $output = array(
        "status" => "error",
        "error_message" => "Not Authenticated",
        "error_description" => "Please log in using the login API to view content on this page"
    );
    echo json_encode($output);
}