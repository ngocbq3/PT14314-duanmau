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