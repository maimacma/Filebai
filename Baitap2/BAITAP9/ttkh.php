<?php
$con = require_once 'connection.php';
$dotim = "SELECT * FROM KHACHHANG";
$dotim2 = $con->query($dotim);
$dl = $dotim2->fetch_all(PDO::FETCH_ASSOC);
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
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 40px;
            color: #2d3e50;
            letter-spacing: 2px;
            font-weight: 700;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 40px auto;
            box-shadow: 0 8px 24px rgba(44, 62, 80, 0.12);
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            padding: 14px 18px;
            text-align: left;
        }
        th {
            background: linear-gradient(90deg, #6dd5ed 0%, #2193b0 100%);
            color: #fff;
            font-size: 1.08em;
            font-weight: 700;
            border: none;
        }
        tr {
            transition: background 0.2s;
        }
        tr:nth-child(even) td {
            background: #f7fbfc;
        }
        tr:hover td {
            background: #eaf6fb;
        }
        td {
            border-bottom: 1px solid #e0eafc;
            font-size: 1em;
            color: #34495e;
        }
        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <h2>Bảng Thông Tin Khách Hàng</h2>
    <table>
        <tr>
            <th>STT</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
        </tr>
        <?php
        foreach ($dl as $index => $row) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . htmlspecialchars($row['HOTEN']) . "</td>";
            echo "<td>" . htmlspecialchars($row['EMAIL']) . "</td>";   
            echo "<td>" . htmlspecialchars($row['SODIENTHOAI']) . "</td>";
            echo "<td>" . htmlspecialchars($row['DIACHI']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
        </table>
    <div class="mt-4">
        <a href="tths.php" class="btn btn-primary me-2">Trang Thông Tin HS</a>
        <a href="ttcacsp.php" class="btn btn-secondary me-2">Thông tin các sản phẩm</a>
        <a href="ttkh.php" class="btn btn-success me-2">Thông tin khách hàng</a>
        <a href="ttsua.php" class="btn btn-warning">Thông tin sữa</a>
    </div>
</body>
</html>