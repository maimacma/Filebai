<?php
$conn = require_once 'connection.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$khachhang = null;

if (!empty($id)) {
    $stmt = $conn->prepare("SELECT * FROM khachhang WHERE MAKH = ?");
    $stmt->execute([$id]);
    $khachhang = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $_POST['ten'] ?? '';
    $gioitinh = $_POST['gioitinh'] ?? '';
    $diachi = $_POST['diachi'] ?? '';
    $sdt = $_POST['sdt'] ?? '';

    $update = $conn->prepare("UPDATE khachhang SET TENKHACHHANG = ?, GIOITINH = ?, DIACHI = ?, SODIENTHOAI = ? WHERE MAKH = ?");
    if ($update->execute([$ten, $gioitinh, $diachi, $sdt, $id])) {
        echo "<p style='color:green; text-align:center'>Cập nhật thành công!</p>";
        echo "<div style='text-align:center'><a href='danhsachkh.php'>Quay lại danh sách</a></div>";
        exit;
    } else {
        echo "<p style='color:red'>Cập nhật thất bại.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật khách hàng</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #dfe9f3, #ffffff);
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #0d6efd;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0b5ed7;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: #0d6efd;
        }
    </style>
</head>
<body>
 <div class="form-container">
    <h2>Cập nhật khách hàng</h2>
    <?php if ($khachhang): ?>
    <form method="post">
        <label>Tên khách hàng:</label>
        <input type="text" name="ten" value="<?= htmlspecialchars($khachhang['TENKHACHHANG']) ?>" required>

        <label>Giới tính:</label><br>
        <input type="radio" name="gioitinh" value="NAM" <?= ($khachhang['GIOITINH'] === 'NAM') ? 'checked' : '' ?>> Nam
        <input type="radio" name="gioitinh" value="NỮ" <?= ($khachhang['GIOITINH'] === 'NỮ') ? 'checked' : '' ?>> Nữ
        <br><br>

        <label>Địa chỉ:</label>
        <input type="text" name="diachi" value="<?= htmlspecialchars($khachhang['DIACHI']) ?>" required>

        <label>Số điện thoại:</label>
        <input type="text" name="sdt" value="<?= htmlspecialchars($khachhang['SODIENTHOAI']) ?>" required>

        <input type="submit" value="Cập nhật">
    </form>
    <?php else: ?>
        <p style="text-align:center; color: red;">Không tìm thấy khách hàng!</p>
    <?php endif; ?>
</div>

</body>
</html>
