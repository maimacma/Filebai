<?php
$con = require_once 'connection.php';
$dotim = "select * from HANGSUA";
$dotim2 = $con->query($dotim);
$dl = $dotim2->FETCHALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>THÔNG TIN HÃNG SỮA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">THÔNG TIN HÃNG SỮA</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Mã HS</th>
                <th>Tên hãng sữa</th>
                <th>Địa chỉ</th>
                <th>Điện Thoại</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?PHP
            Foreach($dl as $row){
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['MAHS']) . "</td>";
                echo "<td>" . htmlspecialchars($row['TENHANGSUA']) . "</td>";
                echo "<td>" . htmlspecialchars($row['DIACHI']) . "</td>";
                echo "<td>" . htmlspecialchars($row['DIENTHOAI']) . "</td>";
                echo "<td>" . htmlspecialchars($row['EMAIL']) . "</td>";
                echo "</tr>";
              }
            ?>
        </tbody>
    </table>
    <div class="mt-4">
        <a href="tths.php" class="btn btn-primary me-2">Trang Thông Tin HS</a>
        <a href="ttcacsp.php" class="btn btn-secondary me-2">Thông tin các sản phẩm</a>
        <a href="ttkh.php" class="btn btn-success me-2">Thông tin khách hàng</a>
        <a href="ttsua.php" class="btn btn-warning">Thông tin sữa</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>