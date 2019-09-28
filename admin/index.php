<?php
    require_once("../lib/loai.php");//Thêm thư viện
    $action = isset($_GET['action']) ? $_GET['action'] : "home";
    $view = isset($_GET['view']) ? $_GET['view'] : false ;
    //Xây dựng đường dẫn cho file
    $path = $action . "/" . $view . ".php";

    
    require_once "header.php";    
    //Kiểm tra xem đường dẫn tồn tại hay không
    if (file_exists($path)) {
        require_once $path;
    } else {
        require_once "home.php";
    }
    require_once "footer.php";
?>