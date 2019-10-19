<?php
/*
    Trang cập nhật hàng hóa
*/
$message = "";
extract($_REQUEST);
if (isset($btn_update)) {
    if ($_FILES['uphinh']['name'] != "") {
        $fileDel = "../content/images/products/" . $hinh_anh;
        if (file_exists($fileDel)) {
            unlink($fileDel);
        }
        $hinh = $_FILES['uphinh']['name']; //Lấy tên ảnh cần up
        $dir = "../content/images/products/"; //Thư mục lưu ảnh
        move_uploaded_file($_FILES['uphinh']['tmp_name'], $dir . $hinh);
    } else {
        $hinh = $hinh_anh;
    }

    $dac_biet = isset($dac_biet) ? true : false;

    //Cập nhật dữ liệu
    hang_hoa_edit($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
    $message = "Cập nhật dữ liệu thành công";
}

$row = hang_hoa_list_one($ma_hh);
//var_dump($row);die;
$loais = loai_select_all();
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
        <li class="breadcrumb-item"><a href="?action=hang_hoa&view=list">Hàng hóa</a></li>
        <li class="breadcrumb-item"><a href="#">Sửa</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                if ($message != "") {
                    ?>
                    <h3 class="tile-title"><?= $message ?></h3>
                <?php
                }
                ?>
                <div class="form-group">
                    <fieldset>
                        <label class="control-label" for="ma_hh">Mã hàng hóa</label>
                        <input class="form-control" id="ma_hh" name="ma_hh" type="text" value="<?= $row['ma_hh'] ?>" readonly>
                    </fieldset>
                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="ten_hh">Tên hàng hóa</label>
                    <input class="form-control is-valid" id="ten_hh" name="ten_hh" type="text" value="<?= $row['ten_hh'] ?>">

                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="don_gia">Đơn giá</label>
                    <input class="form-control is-valid" min="0" step="0.1" id="don_gia" name="don_gia" type="number" value="<?= $row['don_gia'] ?>">

                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="giam_gia">Giảm giá %</label>
                    <input class="form-control is-valid" id="giam_gia" name="giam_gia" type="number" value="<?= $row['giam_gia'] ?>">

                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="uphinh">Ảnh minh họa</label>
                    <p><img src="../content/images/products/<?= $row['hinh'] ?>" alt=""></p>
                    <input class="form-control is-valid" id="uphinh" name="uphinh" type="file">
                    <input type="hidden" name="hinh_anh" value="<?= $row['hinh'] ?>">
                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="ma_loai">Loại hàng</label>
                    <select class="form-control is-valid" name="ma_loai" id="ma_loai">
                        <?php foreach ($loais as $loai) { ?>
                            <?php if ($loai['ma_loai'] == $row['ma_loai']) { ?>
                                <option value="<?= $loai['ma_loai'] ?>" selected><?= $loai['ten_loai'] ?></option>
                            <?php } else { ?>
                                <option value="<?= $loai['ma_loai'] ?>"><?= $loai['ten_loai'] ?></option>
                            <?php } ?>
                        <?php } ?>

                    </select>

                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="luot_xem">Lượt xem</label>
                    <input class="form-control is-valid" id="luot_xem" name="so_luot_xem" type="text" value="<?= $row['so_luot_xem'] ?>">

                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="ngay_nhap">Ngày nhập</label>
                    <input class="form-control is-valid" id="ngay_nhap" name="ngay_nhap" type="date" value="<?= $row['ngay_nhap'] ?>">

                </div>
                <div class="form-group has-success form-check-inline">
                    <input class="form-check-input" id="dac_biet" name="dac_biet" type="checkbox" value="<?= $row['dac_biet'] ?>" <?php echo ($row['dac_biet'] == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="dac_biet">Hàng đặc biệt</label>
                </div>
                <div class="form-group has-success">
                    <label class="form-control-label" for="mo_ta">Ngày nhập</label>
                    <textarea class="form-control" rows="10" id="mo_ta" name="mo_ta"><?= $row['mo_ta'] ?></textarea>

                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="btn_update" type="submit">Cập nhật</button>
                </div>
            </form>
            <script>
                // function change() {
                //     if (document.getElementById('dac_biet').checked == true) {
                //         document.getElementById('dac_biet').value = 1;
                //     } else {
                //         document.getElementById('dac_biet').value = 0;
                //     }
                // }
            </script>
        </div>
    </div>
</div>