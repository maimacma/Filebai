<!DOCTYPE html>
<?PHP
$con = require_once("connectoin.php");
$dulieuss = "select * from NHANVIEN"
$dulieu = $con -> query($dulieuss);
$dacoduieu = $dulieu->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sách nhân viên</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Danh sách nhân viên</h2>
      <button class="btn btn-success no-print" onclick="window.print()">🖨 In bảng</button>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Mã nv</th>
          <th>Họ tên</th>
          <th>Giới tính</th>
          <th>Ngày sinh</th>
          <th>Lương</th>
          <th>Mã Phòng</th>
          <th>Hình</th>
          <th>Ngày BC</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dacoduieu as $hang):?>
        <tr>
          <td><?php echo $hang['MANV']?></td>
          <td><?php echo $hang['HOTEN']?></td>
          <td><?php echo $hang['GIOITINH']?></td>
          <td><?php echo $hang['NGAYSINH']?></td>
          <td><?php echo $hang['LUONG']?></td>
          <td><?php echo $hang[' MAPHONG']?></td>
          <td><?php echo $hang[' HINH ']?></td>
          <td><?php echo $hang[' NGAYBC ']?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
conect
<?php 
$con = new pdo("mysql:host=localhost;dbname=QLNV;charset=utf8", "root","");
?>
