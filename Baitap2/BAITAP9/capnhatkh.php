<?php
$conn = require_once 'connection.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$khachhang = null;
if ($id > 0) {
    $result = $conn->query("SELECT * FROM khachhang WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        $khachhang = $result->fetch_assoc();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $conn->real_escape_string($_POST['ten']);
    $diachi = $conn->real_escape_string($_POST['diachi']);
    $email = $conn->real_escape_string($_POST['email']);
    $sdt = $conn->real_escape_string($_POST['sdt']);

    $sql = "UPDATE khachhang SET ten='$ten', diachi='$diachi', email='$email', sdt='$sdt' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thành công!";
        echo "<a href='danhsachkh.php'>Quay lại danh sách</a>";
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật khách hàng</title>
</head>
<body>
    <h2>Cập nhật khách hàng</h2>
    <?php if ($khachhang): ?>
    <form method="post">
        <label>Tên khách hàng:</label><br>
        <input type="text" name="ten" value="<?php echo htmlspecialchars($khachhang['ten']); ?>" required><br>
        <label>Địa chỉ:</label><br>
        <input type="text" name="diachi" value="<?php echo htmlspecialchars($khachhang['diachi']); ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($khachhang['email']); ?>" required><br>
        <label>Số điện thoại:</label><br>
        <input type="text" name="sdt" value="<?php echo htmlspecialchars($khachhang['sdt']); ?>" required><br><br>
        <input type="submit" value="Cập nhật">
    </form>
    <?php else: ?>
        <p>Không tìm thấy khách hàng!</p>
    <?php endif; ?>
</body>
</html>