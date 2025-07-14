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
        <tr>
            <td>1</td>
            <td>Nguyễn Văn A</td>
            <td>vana@gmail.com</td>
            <td>0901234567</td>
            <td>Hà Nội</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Trần Thị B</td>
            <td>thib@gmail.com</td>
            <td>0912345678</td>
            <td>TP. Hồ Chí Minh</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Lê Văn C</td>
            <td>vanc@gmail.com</td>
            <td>0923456789</td>
            <td>Đà Nẵng</td>
        </tr>
    </table>
</body>
</html>