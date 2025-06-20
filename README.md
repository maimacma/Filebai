<?php
$con = require_once("connecton.php");
if(isset($_REQUEST($_POST['submit'])))
{
    $manv = $_POST['manv'];
    $hoten = $_POST['hoten'];
    $gioitinh = $_POST['gioitinh'];
    $date = $_POST['ngaysinh'];
    $luong = $_POST['luong'];
    $maph = $_POST['maphong'];
    if(isset($_FILES['hinh']))
    {
      $tenhinh = $_FILES['hinh']['name'];
      $diachiam = $_FILES['hinh']["tmp_name"] ;
      $luu = $
    }
    $luong = $_POST['luong'];
    $luong = $_POST['luong'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Thêm Nhân Viên</title>
</head>
<body>
  <h2>Thêm Nhân Viên Mới</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="manv">Mã nhân viên:</label><br />
    <input type="text" id="manv" name="manv" required /><br /><br />

    <label for="hoten">Họ và tên:</label><br />
    <input type="text" id="hoten" name="hoten" required /><br /><br />

    <label>Giới tính:</label><br />
    <input type="radio" id="nam" name="gioitinh" value="Nam" checked />
    <label for="nam">Nam</label>
    <input type="radio" id="nu" name="gioitinh" value="Nữ" />
    <label for="nu">Nữ</label><br /><br />

    <label for="ngaysinh">Ngày sinh:</label><br />
    <input type="date" id="ngaysinh" name="ngaysinh" required /><br /><br />

    <label for="luong">Lương:</label><br />
    <input type="number" id="luong" name="luong" required /><br /><br />

    <label for="maphong">Mã phòng:</label><br />
    <input type="text" id="maphong" name="maphong" required /><br /><br />

    <label for="hinh">Tên file hình:</label><br />
    <input type="file" id="hinh" name="hinh" placeholder="vd: 1.jpg" /><br /><br />

    <label for="ngaybc">Ngày báo cáo:</label><br />
    <input type="date" id="ngaybc" name="ngaybc" required /><br /><br />

    <button type="submit" >Thêm nhân viên</button>
  </form>
</body>
</html>
 /
 <?php 
$con = new pdo("mysql:host=localhost;dbname=qlnv;charset=utf8", "root","");
return $con;
?>
\
<!DOCTYPE html>
<?PHP
$con = require_once("connectoin.php");
$dulieuss = "select * from NHANVIEN";
$dulieu = $con -> query($dulieuss);
$dacoduieu = $dulieu->fetchAll(PDO::FETCH_ASSOC);

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

 
