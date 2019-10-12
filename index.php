<?php
    //require_once("lib/database.php");
    include_once("lib/loai.php");
    //Kiểm tra hành động khi người dùng vào trang web
    //Nếu action có tồn tại thì lấy nó là $action còn lại nó bằng home
    $action = isset($_GET['action']) ? $_GET['action'] : "home";
    
    require_once("site/header.php");
    switch ($action) {
        case "home":
            require_once("site/slider.php");
            require_once("site/home.php");
            break;
        case "product":
            require_once("site/product.php");
            break;
        case "productdetail":
            require_once("site/productdetail.php");
            break;
        default:
            require_once("site/404.php");
            break;
    }
    require_once("site/footer.php");

?>