<!DOCTYPE html>
<?PHP
$con = require_once("connectoin.php");
$dulieuss = "select * from NHANVIEN";
$dulieu = $con -> query($dulieuss);
$dacoduieu = $dulieu->fetchAll(PDO::FETCH_ASSOC);
$xoa = $_GET['xoa'] ?? null;
if ($xoa === null) {
  echo "<script>alert('Xóa thành công');</script>";

}
else 
{echo "<script>alert('Xoá không thành công');</script>";}
?>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sách nhân viên</title>
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
  <form action="them.php" method="post" >
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
          <td><?php echo $hang['MAPHONG']?></td>
          <td><?php echo "<img src='./IMGLab04/".  $hang['HINH']. "' width='300'/>"?></td>
          <td><?php echo $hang['NGAYBC']?></td>
          <td>
          <button onclick="window.location.href='sua.php?manv=<?php echo $hang['MANV']; ?>'">Sửa</button>
    <button onclick="if(confirm('Bạn có chắc muốn xóa?')) window.location.href='xoa.php?manv=<?php echo $hang['MANV']; ?>'">Xóa</button>
        </td>
        </tr>
        <tr>
        <button type="submit" class="btn btn-success no-print">Thêm</button>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </form>
</body>
</html>

 