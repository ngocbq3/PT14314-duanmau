<?php
//Thêm thư viện database
require_once "database.php";

//Lấy ra toàn bộ bản ghi trong bảng hang_hoa
function hang_hoa_list_all() {
    $sql = "SELECT * FROM hang_hoa";
    return query($sql);
}

//Lấy ra 1 bản ghi theo ma_hh
function hang_hoa_list_one($ma_hh) {
    return select_by_id('hang_hoa', 'ma_hh', $ma_hh);
}

//Hàm phân trang hàng hóa
//Lấy ra $record_per_page trên một trang
//Bắt đầu từ $start_record
function hang_hoa_per_page($start_record, $record_per_page) {
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT $start_record, $record_per_page";
    return query($sql);
}

//Hàm tính tổng số bản ghi trong bảng hang_hoa
function hang_hoa_total_record() {
    $records = hang_hoa_list_all();
    $total = count($records);
    return $total;
}

//function thêm hàng hóa
function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta) {
    $array = [
        "ten_hh" => $ten_hh,
        "don_gia" => $don_gia,
        "giam_gia" => $giam_gia,
        "hinh" => $hinh,
        "ma_loai" => $ma_loai,
        "dac_biet" => $dac_biet,
        "so_luot_xem" => $so_luot_xem,
        "ngay_nhap" => $ngay_nhap,
        "mo_ta" => $mo_ta
    ];
    insert("hang_hoa", $array);
}

//function sửa dữ liệu hàng hóa
function hang_hoa_edit($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh) {
    $array = [
        "ten_hh" => $ten_hh,
        "don_gia" => $don_gia,
        "giam_gia" => $giam_gia,
        "hinh" => $hinh,
        "ma_loai" => $ma_loai,
        "dac_biet" => $dac_biet,
        "so_luot_xem" => $so_luot_xem,
        "ngay_nhap" => $ngay_nhap,
        "mo_ta" => $mo_ta
    ];
    update("hang_hoa", $array, "ma_hh", $ma_hh);
}

//function xóa dữ liệu hàng hóa theo mã hh
function hang_hoa_delete($ma_hh) {
    delete("hang_hoa", "ma_hh", $ma_hh);
}