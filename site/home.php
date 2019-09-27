<h1>Trang chủ</h1>
<?php
    $array = [
        "ten_hh"=>"Iphone X",
        'don_gia'=>'1000',
        'giam_gia'=>'10%',
        'hinh'=>'iphone8.jpg',
        'ma_loai'=>'1001',
        'dac_biet'=>0,
        'so_luot_xem'=>0,
        'ngay_nhap'=>date("Y-m-d", time()),
        'mo_ta'=>'Iphone là điện thoại đắt nhất thế giới'
    ];
    //update('hang_hoa', $array, "ma_hh", 1087);

    //$result = select_by_id('loai', 'ma_loai', 1007);
    
    //delete('hang_hoa', 'ma_hh', 1087);
    $row = loai_select_all();
    echo "<pre>";
    var_dump($row);
    echo "</pre>";
?>
