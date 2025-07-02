<?php
if(isset($_GET['manv']))
{
    $manv = $_GET['manv'];
    $con = require_once 'connection.php';
    $hnv = 'select * from NHAVIEN where MANV =?';
    $lenh = $con ->prepare($hnv);
    $lenh->execute([$manv]);
    $laydsnv= $lenh->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!-- filepath: /workspaces/Filebai/Baitap2/BAITAP8/them.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm Nhân Viên</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }
    .form-container {
      max-width: 500px;
      margin: 40px auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 30px;
    }
    .form-title {
      text-align: center;
      margin-bottom: 25px;
      color: #007bff;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2 class="form-title">Sửa Nhân Viên</h2>
    <form action="them.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="manv" class="form-label">Mã nhân viên</label><?php
        
        ?>
        <input type="text" class="form-control" id="manv" name="manv" required>
      </div>
      <div class="mb-3">
        <label for="hoten" class="form-label">Họ và tên</label>
        <input type="text" class="form-control" id="hoten" name="hoten" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Giới tính</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="nam" name="gioitinh" value="Nam" checked>
            <label class="form-check-label" for="nam">Nam</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="nu" name="gioitinh" value="Nữ">
            <label class="form-check-label" for="nu">Nữ</label>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="ngaysinh" class="form-label">Ngày sinh</label>
        <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
      </div>
      <div class="mb-3">
        <label for="luong" class="form-label">Lương</label>
        <input type="number" class="form-control" id="luong" name="luong" required>
      </div>
      <div class="mb-3">
        <label for="mapb" class="form-label">Phòng ban</label>
        <select class="form-select" id="mapb" name="mapb" required>
          <option value="">Chọn phòng ban</option>
          <?php
          if (session_status() === PHP_SESSION_NONE) session_start();
          if (isset($_SESSION['PHONGBAN'])) {
            foreach ($_SESSION['PHONGBAN'] as $pb) {
              echo '<option value="' . htmlspecialchars($pb['mapb']) . '">' . htmlspecialchars($pb['tenpb']) . '</option>';
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="hinh" class="form-label">Ảnh đại diện</label>
        <input class="form-control" type="file" id="hinh" name="hinh">
      </div>
      <div class="mb-3">
        <label for="ngaybc" class="form-label">Ngày báo cáo</label>
        <input type="date" class="form-control" id="ngaybc" name="ngaybc" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary w-100">Thêm nhân viên</button>
    </form>
  </div>
</body>
</html>