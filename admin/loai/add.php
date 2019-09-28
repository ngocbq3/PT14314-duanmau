<?php
    if (isset($_POST['add'])) {
        extract($_REQUEST);
        loai_insert($ten_loai);
        $message = "Thêm dữ liệu thành công";
    }
?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i> Thêm loại</h1>
        <p>
            <?php
                if(isset($message)) {
                    echo $message;
                }
            ?>
        </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">loại</li>
        <li class="breadcrumb-item"><a href="#">Thêm</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Mã loại</label>
            <input type="text" readonly class="form-control" id="" name="ma_loai" placeholder="Auto">
        </div>
        <div class="form-group">
            <label for="">Tên loại</label>
            <input type="text" class="form-control" id="" name="ten_loai" placeholder="Tên loại">
        </div>
        <div class="form-group">
            <input type="submit" value="Add" class="btn btn-primary" name="add">
        </div>
    </form>
    </div>
</div>