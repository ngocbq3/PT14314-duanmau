<?php
//Hiển thị danh sách hàng hóa

if ( isset($_GET['page']) ) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

//Số bản ghi trong 1 trang
$record_per_page = 10;
//Bản ghi bắt đầu
$start_record = ($page-1) * $record_per_page;
//Lấy ra số bản ghi theo trang
$rows = hang_hoa_per_page($start_record, $record_per_page);

?>
<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Danh sách hàng hóa</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Hàng hóa</li>
    <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Mã hàng</th>
            <th scope="col">Tên hàng</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Đơn giá</th>
            
            <th scope="col">Tác vụ</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($rows as $row) {
            ?>
            <tr>
              <th scope="row"><?=$row['ma_hh'] ?></th>
              <td><?=$row['ten_hh'] ?></td>
              
              <td><img width="110" src="../content/images/products/<?=$row['hinh'] ?>" alt=""></td>
              <td><?=$row['don_gia'] ?></td>
              <td>
                <a class="btn" href="?action=hang_hoa&view=edit&ma_hh=<?=$row['ma_hh']?>">Sửa</a>
                <a onclick="return confirm('Bạn có chắc xóa không')" class="btn" href="?action=hang_hoa&view=list&ma_hh=<?=$row['ma_hh']?>">Xóa</a>
              </td>

            </tr>

          <?php
          }
          ?>

        </tbody>
      </table>
    </div>

    <?php
        //Tổng số bản ghi
        $total_record = hang_hoa_total_record();
        //Tính tổng số trang 
        $total_page = ceil($total_record / $record_per_page);
        //Hiển thị thanh điều hướng phân trang
        for ($i = 1; $i<$total_page+1; $i++) {
        ?>
            <a class="btn" href="?action=hang_hoa&view=list&page=<?=$i?>"> <?=$i?> </a>
        <?php
        }
    ?>
  </div>
</div>
