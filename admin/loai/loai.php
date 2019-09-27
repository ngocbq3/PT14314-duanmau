<?php
    $rows = loai_select_all();
    //var_dump($rows);
?>
<table class="table">
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
                <th scope="row"><?=$row['ma_loai']?></th>
                <td><?=$row['ten_loai']?></td>
                <td>Sửa Xóa</td>
                
            </tr>
            
        <?php
        }
    ?>
    
  </tbody>
</table>