<?php
    require_once("../lib/loai.php");//Thêm thư viện
    $action = isset($_GET['action']) ? $_GET['action'] : "home";
    
    require_once "header.php";    
    switch ($action) {
        case "home" : 
            require_once "home.php";
            break;
        case "loai" :
            //Hiển thị loại hàng
            require_once "loai/loai.php";
            break;
        default:
            require_once "home.php";
            break;
    }
    require_once "footer.php";
?>