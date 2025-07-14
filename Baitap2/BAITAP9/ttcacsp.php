<?php
// ttsp.php (PHP logic)
include 'connection.php';

// Truy vấn lấy thông tin các sản phẩm sữa
$sql = "SELECT * FROM sua";
$sql1 = $conn->query($sql);
$rs = $sql1->fetchAll(PDO::FETCH_ASSOC);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Thông Tin Sản Phẩm</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Hãng Sữa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rs as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['MASP']) . "</td>";
                echo "<td>" . htmlspecialchars($row['TENSP']) . "</td>";
                echo "<td>" . htmlspecialchars($row['GIA']) . "</td>";
                echo "<td>" . htmlspecialchars($row['MAHS']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="mt-4">
        <a href="tths.php" class="btn btn-primary me-2">Trang
        <a href="ttcacsp.php" class="btn btn-secondary me-2">Thông tin các sản phẩm</a>
        <a href="ttkh.php" class="btn btn-success me-2">Thông tin khách hàng</a>
        <a href="ttsua.php" class="btn btn-warning">Thông tin sữa</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
