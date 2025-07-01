
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Thêm Nhân Viên</title>
  <style>
    body {
      background: #f0f2f5;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 420px;
      margin: 40px auto;
      background: #fff;
      padding: 32px 28px;
      border-radius: 12px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    }
    h2 {
      text-align: center;
      color: #2d3a4b;
      margin-bottom: 24px;
    }
    label {
      font-weight: 500;
      color: #333;
    }
    input[type="text"],
    input[type="date"],
    input[type="file"] {
      width: 100%;
      padding: 8px 10px;
      margin: 6px 0 18px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      font-size: 15px;
    }
    input[type="radio"] {
      margin-right: 6px;
    }
    .gender-group {
      margin-bottom: 18px;
    }
    input[type="submit"] {
      width: 100%;
      background: #1976d2;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.2s;
    }
    input[type="submit"]:hover {
      background: #125ea7;
    }
    .msg {
      text-align: center;
      margin-bottom: 12px;
      color: #1976d2;
      font-weight: bold;
    }
    .msg.error {
      color: #d32f2f;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Thêm Nhân Viên Mới</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <label for="manv">Mã nhân viên:</label>
      <input type="text" id="manv" name="manv" required />

      <label for="hoten">Họ và tên:</label>
      <input type="text" id="hoten" name="hoten" required />

      <label>Giới tính:</label>
      <div class="gender-group">
        <input type="radio" id="nam" name="gioitinh" value="Nam" checked />
        <label for="nam">Nam</label>
        <input type="radio" id="nu" name="gioitinh" value="Nữ" />
        <label for="nu">Nữ</label>
      </div>

      <label for="ngaysinh">Ngày sinh:</label>
      <input type="date" id="ngaysinh" name="ngaysinh" required />

      <label for="luong">Lương:</label>
      <input type="text" id="luong" name="luong" required />

      <label for="maphong">Mã phòng:</label>
  <select name="mapb" > 
    <option value="">Chọn phòng ban</option>
    <?php
if(isset($_SESSION['PHONGBAN']))
{
  foreach($_SESSION['PHONGBAN'] as $pb)
  {
echo '<option value='.$pb['mapb'].'>'.$pb['tenpb'].'</option>';
  }
}

    ?>

  </select>

      <label for="hinh">Tên file hình:</label>
      <input type="file" id="hinh" name="hinh" placeholder="vd: 1.jpg" />

      <label for="ngaybc">Ngày báo cáo:</label>
      <input type="date" id="ngaybc" name="ngaybc" required />

      <input type="submit" name="submit" value="Thêm nhân viên"/>
      <?php
      $con = require_once'connection.php';
      if(isset($_POST['submit'])) {
        $manv = $_POST['manv'];
        $hoten = $_POST['hoten'];
        $gioit = $_POST['gioitinh'];
        $ngays = $_POST['ngaysinh'];
        $luong = $_POST['luong'];
        $maphong = $_POST['maphong'];
        $hinhanh = $_FILES['hinh'];
        $ten_hinh = $hinhanh['name'];
        $duongdan = 'IMG Lab04/' . basename($ten_hinh);

        if ($ten_hinh) {
          if (move_uploaded_file($hinhanh['tmp_name'], $duongdan)) {
            $msg = '<div class="msg">Upload hình thành công: ' . htmlspecialchars($ten_hinh) . '</div>';
          } else {
            $msg = '<div class="msg error">Upload hình thất bại.</div>';
          }
        }
        // echo $manv. $hoten. $gioit. $ngays. $luong. $maphong;

      }
     
      ?>
    </form>
  </div>
</body>
</html>
