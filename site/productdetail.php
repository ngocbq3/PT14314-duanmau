<h1>Product Detail</h1>
<?php
    if (isset($_GET['ma_hh'])) {
        $ma_hh = $_GET['ma_hh'];
        $row = hang_hoa_list_one($ma_hh);
?>
    <div class="row">
        <h3><?=$row['ten_hh']?></h3>
        <img src="content/images/products/<?=$row['hinh']?>" alt="">
        <h3>Đơn giá: <?=$row['don_gia']?></h3>
        <h3>Giảm giá: <?=$row['giam_gia']?></h3>
        <p>
            <?=$row['mo_ta']?>
        </p>
    </div>
<?php
    }
?>