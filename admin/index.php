<?php
    session_start();
    //Kiểm tra nếu chưa đăng nhập thì sẽ vào trang login.php
    if ( !isset($_SESSION['tai_khoan']) ) {
        header("location: login.php");
    }
    if (isset($_GET['btn_logout'])) {
        if ( $_GET['btn_logout'] == 'on') {
            session_destroy();
            header("location: login.php");
        }
    }
    require_once("../lib/loai.php");//Thêm thư viện
    require_once("../lib/hang_hoa.php");//Thêm thư viện
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