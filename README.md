
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
    <input type="text" id="luong" name="luong" required /><br /><br />

    <label for="maphong">Mã phòng:</label><br />
    <input type="text" id="maphong" name="maphong" required  /><br /><br />

    <label for="hinh">Tên file hình:</label><br />
    <input type="file" id="hinh" name="hinh" placeholder="vd: 1.jpg" /><br /><br />

    <label for="ngaybc">Ngày báo cáo:</label><br />
    <input type="date" id="ngaybc" name="ngaybc" required /><br /><br />

    <input type="submit" name="submit" value="Thêm nhân viên"/>
    <?php
$con = require_once("connectoin.php");
if(isset($_POST['submit']))
{
$manv = $_POST['manv'];
$hoten = $_POST['hoten'];
$gioit = $_POST['gioitinh'];
$ngays = $_POST['ngaysinh'];
$luong = $_POST['luong'];
$maphong = $_POST['maphong'];
$hinhanh = $_FILES['hinh'];
$ten_hinh = $hinhanh['name'];
$duongdan = 'IMG Lab04/' . basename($ten_hinh);

if (move_uploaded_file($hinhanh['tmp_name'], $duongdan)) {
    echo "Upload hình thành công: " . $ten_hinh;
} else {
    echo "Upload hình thất bại.";
}
echo $manv. $hoten. $gioit. $ngays. $luong. $maphong;
}
?>
  </form>
</body>
</html>
