<?php
//Thư viện các hàm làm việc với bảng loại
require_once "database.php";

//Hàm lấy ra tất cả các bản ghi của bảng loai
function loai_select_all() {
    $sql = "SELECT * FROM loai";
    $result = query($sql);
    return $result;
}

//Hàm lấy ra 1 loại hàng
function loai_select_one($ma_loai) {
    $result = select_by_id('loai', 'ma_loai', $ma_loai);
    return $result;
}

//Hàm thêm vào 1 loại hàng
function loai_insert($ten_loai) {
    $array = ['ten_loai' => $ten_loai];
    insert('loai', $array);
}

//hàm sửa loại hàng
function loai_edit($ma_loai, $ten_loai) {
    $array = [
        'ten_loai' => $ten_loai
    ];
    update('loai', $array, 'ma_loai', $ma_loai);
}

//Hàm xóa loại hàng
function loai_delete($ma_loai) {
    delete('loai', 'ma_loai', $ma_loai);
}
?>