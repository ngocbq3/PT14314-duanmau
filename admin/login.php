<?php
    session_start();
    require_once "../lib/database.php";
    $message = "";
    if ( isset($_POST['btn_dangnhap']) ) {
        if ($_POST['ma_kh'] == "" || $_POST['mat_khau'] == "") {
            $message = "Cần nhập vào tài khoản và mật khẩu";
        }
        else {
            extract($_REQUEST);
            $sql = "SELECT * FROM khach_hang WHERE ma_kh='$ma_kh' AND mat_khau='$mat_khau'";
            echo $sql;
            $conn = connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result == false) {
                $message = "Bạn nhập sai mật khẩu hoặc tài khoản";
            } else {
                $_SESSION['tai_khoan'] = $result['ma_kh'];
                header("location:index.php");
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
    ?>
    <form action="" method="post">
        Tên người dùng: 
        <input type="text" name="ma_kh" id="">
        <br>
        Mật khẩu:
        <input type="password" name="mat_khau">
        <br>
        <input type="submit" value="Đăng nhập" name="btn_dangnhap">
    </form>
</body>
</html>