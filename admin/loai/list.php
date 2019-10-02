<?php
if ( isset($_GET['ma_loai']) ) {
  $ma_loai = $_GET['ma_loai'];
  loai_delete($ma_loai);
}

$rows = loai_select_all();
?>
<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Danh sách loại hàng</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">loại hàng</li>
    <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Mã loại</th>
            <th scope="col">Tên loại</th>
            <th scope="col">Tác vụ</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($rows as $row) {
            ?>
            <tr>
              <th scope="row"><?= $row['ma_loai'] ?></th>
              <td><?= $row['ten_loai'] ?></td>
              <td>
                <a class="btn" href="?action=loai&view=edit&ma_loai=<?=$row['ma_loai']?>">Sửa</a>
                <a onclick="return confirm('Bạn có chắc xóa không')" class="btn" href="?action=loai&view=list&ma_loai=<?=$row['ma_loai']?>">Xóa</a>
              </td>

            </tr>

          <?php
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>