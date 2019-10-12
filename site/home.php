<?php
$products = hang_hoa_per_page(0, 8);
?>


<div class="product">
    <?php foreach ($products as $p) { ?>
        <div class="items">
            <a href="?action=productdetail&ma_hh=<?=$p['ma_hh']?>">
                <h3><?=$p["ten_hh"]?></h3>
                <img src="content/images/products/<?=$p['hinh']?>" alt="">
                <p>
                    Đơn giá: <?=$p['don_gia']?>
                </p>
            </a>
        </div>
    <?php } ?>
    
    <div class="clear"></div>
</div>