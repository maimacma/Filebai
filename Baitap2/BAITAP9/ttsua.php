<?php
// Phần PHP: Kết nối và lấy dữ liệu từ MySQL
require_once 'connection.php';

// Truy vấn lấy thông tin sữa
$sql = "SELECT * FROM sua";
$result = mysqli_query($conn, $sql);

$suaList = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $suaList[] = $row;
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sữa</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Danh Sách Thông Tin Sữa</h2>
    <table>
        <tr>
            <th>Mã Sữa</th>
            <th>Tên Sữa</th>
            <th>Hãng Sữa</th>
            <th>Loại Sữa</th>
            <th>Trọng Lượng</th>
            <th>Đơn Giá</th>
        </tr>
        <?php foreach ($suaList as $sua): ?>
        <tr>
            <td><?php echo htmlspecialchars($sua['MASUA']); ?></td>
            <td><?php echo htmlspecialchars($sua['TENSUA']); ?></td>
            <td><?php echo htmlspecialchars($sua['HANGSUA']); ?></td>
            <td><?php echo htmlspecialchars($sua['LOAISUA']); ?></td>
            <td><?php echo htmlspecialchars($sua['TRONGLUONG']); ?></td>
            <td><?php echo htmlspecialchars($sua['DONGIA']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>