<?php
//Khi người dùng nhấn vào nút sửa
if ( isset($_POST['loai_edit']) ) {
    extract($_REQUEST);
    loai_edit($ma_loai, $ten_loai);
    $message = "Cập nhật dữ liệu thành công";
}
if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $row = loai_select_one($ma_loai);
}
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i> Cập nhật loại hàng</h1> 
        <?php
            if (isset($message)) {
                echo "<p>$message</p>";
            }
        ?>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">loại</li>
        <li class="breadcrumb-item"><a href="#">Sửa</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Mã loại</label>
                    <input type="text" readonly class="form-control" id="" name="ma_loai" value="<?=$row['ma_loai']?>" placeholder="Auto">
                </div>
                <div class="form-group">
                    <label for="">Tên loại</label>
                    <input type="text" class="form-control" id="" name="ten_loai" placeholder="Tên loại" value="<?=$row['ten_loai']?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Sửa" class="btn btn-primary" name="loai_edit">
                </div>
            </form>
        </div>
    </div>
</div>