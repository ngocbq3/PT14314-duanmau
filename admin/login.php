<?php
    session_start();
    
    require_once "../lib/database.php";
    $message = "";
    if (isset($_SESSION['tai_khoan'])) {
        header('location:index.php');
    }
    $user = "";
    $pass = "";
    //Trong trường hợp mật khẩu được lưu lại trong cookie thì lấy tài khoản và mật khẩu
    if (isset($_COOKIE['user'])) {
      $user = $_COOKIE['user'];
      $pass = $_COOKIE['password'];
    }
    if ( isset($_POST['btn_dangnhap']) ) {
        if ($_POST['ma_kh'] == "" || $_POST['mat_khau'] == "") {
            $message = "Cần nhập vào tài khoản và mật khẩu";
        }
        else {
            extract($_REQUEST);
            $sql = "SELECT * FROM khach_hang WHERE ma_kh=:ma_kh AND mat_khau=:mat_khau";
            //echo $sql;

            $conn = connect();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ma_kh', $ma_kh);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result == false) {
                $message = "Bạn nhập sai mật khẩu hoặc tài khoản";
            } else {
                $_SESSION['tai_khoan'] = $result['ma_kh'];
                $_SESSION['hinh'] = $result['hinh'];
                //Trường hợp người dùng nhấn vào nhớ mật khẩu thì lưu lại mật khẩu vào cookie
                if (isset($remember) ) {                  
                  setcookie('user', $ma_kh, time() + 60*60*24*30 );
                  setcookie('password', $mat_khau, time() + 60*60*24*30 );
                } else { //Ngược lại thì xóa cookie đi
                  setcookie('user', $ma_kh, time() - 60*60*24*30 );
                  setcookie('password', $mat_khau, time() - 60*60*24*30 );
                }
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
    <link href="../content/css/main.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Đăng nhập</h5>
            <?php
              if (!empty($message)) {
                echo "<h5>$message</h5>";
              }
            ?>
            <form class="form-signin" action="" method="post">
              <div class="form-label-group">
                <input type="text" name="ma_kh" id="ma_kh" value="<?=$user?>" class="form-control" placeholder="Tài khoản" required autofocus>
                <label for="ma_kh">Tài khoản</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" class="form-control" placeholder="Mật khẩu" name="mat_khau" value="<?=$pass?>" required>
                <label for="password">Mật khẩu</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="remember" id="remember" checked>
                <label class="custom-control-label" for="remember">Nhớ mật khẩu</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="btn_dangnhap">Đăng nhập</button>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>