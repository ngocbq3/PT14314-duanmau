<?php
//Thống kê số lượng loại hàng
$sql = "SELECT count(ma_loai) as so_luong From loai";
$loai_soluong = query($sql);

//Biểu đồ về các mặt hàng hóa và số lượng của chúng có trong shop
$sql = "SELECT ten_loai, count(hang_hoa.ma_loai) as so_luong FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai GROUP BY ten_loai";
$items = query($sql);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Loại hàng', 'Số lượng'],
      <?php
        $str = "";
        foreach ( $items as $item ) {
          $str .= "[ '$item[ten_loai]', $item[so_luong] ], ";
        }
        echo rtrim($str, ", ");
      ?>
    ]);

    var options = {
      title: 'Danh mục háng hóa'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Bảng điều khiển</h1>
    <p>Quản trị</p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
      <div class="info">
        <h4>Users</h4>
        <p><b>5</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
      <div class="info">
        <h4><a href="?action=loai&view=list">Loại hàng</a> </h4>
        <p><b><?= $loai_soluong[0]['so_luong'] ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
      <div class="info">
        <h4>Uploades</h4>
        <p><b>10</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
      <div class="info">
        <h4>Stars</h4>
        <p><b>500</b></p>
      </div>
    </div>
  </div>
</div>
<!--Hiển thị biểu đồ-->
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
  </div>
</div><!--Kết thúc biểu đồ-->

