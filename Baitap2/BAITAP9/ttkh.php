<?php
$con = require_once 'connection.php';
$dotim = "SELECT * FROM KHACHHANG";
$dotim2 = $con->query($dotim);
$dl = $dotim2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Khách Hàng</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 40px;
            color: #2d3e50;
            letter-spacing: 1px;
            font-weight: 700;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(44, 62, 80, 0.12);
        }

        th, td {
            padding: 14px 18px;
            text-align: left;
        }

        th {
            background: linear-gradient(90deg, #6dd5ed, #2193b0);
            color: #fff;
            font-size: 1.05em;
            font-weight: bold;
            border: none;
        }

        td {
            border-bottom: 1px solid #eee;
            color: #34495e;
            font-size: 0.95em;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #eaf6fb;
        }

        .btn-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            margin: 6px;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary { background-color: #0d6efd; }
        .btn-secondary { background-color: #6c757d; }
        .btn-success { background-color: #198754; }
        .btn-warning { background-color: #ffc107; color: #212529; }

        .btn:hover {
            opacity: 0.9;
            transform: scale(1.04);
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }

            .btn {
                padding: 8px 14px;
                font-size: 14px;
            }
        }
        .btn-edit {
    background-color: #17a2b8;
    color: white;
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
    transition: 0.3s ease;
}

.btn-edit:hover {
    background-color: #138496;
    transform: scale(1.05);
}

    </style>
</head>
<body>
    <h2>Bảng Thông Tin Khách Hàng</h2>
  <table>
    <tr>
        <th>STT</th>
        <th>Họ Tên</th>
        <th>Giới Tính</th>
        <th>Địa Chỉ</th>
        <th>Số Điện Thoại</th>
        <th>Thao Tác</th> 
    </tr>
    <?php foreach ($dl as $index => $row): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($row['TENKHACHHANG']) ?></td>
            <td><?= htmlspecialchars($row['GIOITINH']) ?></td>
            <td><?= htmlspecialchars($row['DIACHI']) ?></td>
            <td><?= htmlspecialchars($row['SODIENTHOAI']) ?></td>
            <td>
                <a 
                    href="capnhatkh.php?id=<?= urlencode($row['MAKH']) ?>" 
                    class="btn btn-edit"
                >Sửa</a>
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
