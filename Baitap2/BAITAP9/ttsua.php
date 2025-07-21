<?php
$conn = require_once 'connection.php';
$sql = "SELECT * FROM sua";
$result = $conn->query($sql);
$kq =  $result->fetchAll(PDO::FETCH_ASSOC);
$suaList = [];
foreach ($kq as $row) {
        $suaList[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sữa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #0d6efd;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e3f2fd;
        }

        .btn-container {
            text-align: center;
            margin: 40px 0;
        }

        .btn {
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            transition: background 0.3s;
        }

        .btn-primary { background-color: #0d6efd; }
        .btn-secondary { background-color: #6c757d; }
        .btn-success { background-color: #198754; }
        .btn-warning { background-color: #ffc107; color: #212529; }

        .btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }

            .btn {
                padding: 8px 12px;
                font-size: 14px;
            }
        }
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
        <th>Thao tác</th>
    </tr>
    <?php foreach ($suaList as $sua): ?>
    <tr>
        <td><?= htmlspecialchars($sua['MASUA']); ?></td>
        <td><?= htmlspecialchars($sua['TENSUA']); ?></td>
        <td><?= htmlspecialchars($sua['HANGSUA']); ?></td>
        <td><?= htmlspecialchars($sua['LOAISUA']); ?></td>
        <td><?= htmlspecialchars($sua['TRONGLUONG']); ?></td>
        <td><?= htmlspecialchars($sua['DONGIA']); ?></td>
        <td>
            <a class="btn btn-warning" href="suasua.php?id=<?= urlencode($sua['MASUA']); ?>">✏️ Sửa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    <div class="btn-container">
        <a href="tths.php" class="btn btn-primary">Trang Thông Tin HS</a>
        <a href="ttcacsp.php" class="btn btn-secondary">Thông tin các sản phẩm</a>
        <a href="ttkh.php" class="btn btn-success">Thông tin khách hàng</a>
        <a href="ttsua.php" class="btn btn-warning">Thông tin sữa</a>
    </div>
</body>
</html>
