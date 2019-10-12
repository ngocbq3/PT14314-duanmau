<?php
$product_special = hang_hoa_dac_biet(5);
$count = count($product_special);
?>
<div class="slider">

    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <?php
                $active = "active";
                for ($i=0;$i<$count;$i++) : ?>
                   <li data-target="#demo" data-slide-to="<?=$i?>" class="<?=$active?>"></li> 
            <?php $active = "";?>
            <?php endfor; ?>
            
        </ul>
        <div class="carousel-inner">
            <?php
            $active = "active";
            foreach ($product_special as $ps) :
                ?>
                <div class="carousel-item <?=$active?>">
                    <a href="#">
                        <img src="content/images/products/<?=$ps['hinh']?>" alt="1002">
                        <div class="carousel-caption">
                            <h3><?=$ps['ten_hh']?></h3>
                            <p>Đơn giá: <?=$ps['don_gia']?></p>
                        </div>
                    </a>
                </div>
                <?php $active=""; ?>
            <?php endforeach; ?>
            
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>