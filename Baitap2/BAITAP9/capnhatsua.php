<?php
$conn = require_once 'connection.php';
$masua = isset($_GET['masua']) ? intval($_GET['masua']) : 0;
$hangSuaOptions = [];
$stmt = $conn->query("SELECT DISTINCT HANGSUA FROM SUA ORDER BY HANGSUA ASC");
$hangSuaOptions = $stmt->fetchAll(PDO::FETCH_COLUMN);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tensua = $_POST["tensua"];
    $hangsua = $_POST["hangsua"];
    $loaisua = $_POST["loaisua"];
    $trongluong = $_POST["trongluong"];
    $dongia = $_POST["dongia"];

    $sql = "UPDATE SUA SET 
                TENSUA = :tensua, 
                HANGSUA = :hangsua, 
                LOAISUA = :loaisua, 
                TRONGLUONG = :trongluong, 
                DONGIA = :dongia 
            WHERE MASUA = :masua";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':tensua' => $tensua,
        ':hangsua' => $hangsua,
        ':loaisua' => $loaisua,
        ':trongluong' => $trongluong,
        ':dongia' => $dongia,
        ':masua' => $masua
    ]);

    echo "<p class='success'>Cập nhật thành công!</p>";
}
$stmt = $conn->prepare("SELECT * FROM SUA WHERE MASUA = :masua");
$stmt->execute([':masua' => $masua]);
$sua = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhật thông tin sữa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        h2 {
            color: #2c3e50;
        }
        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 500px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 4px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #219150;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2980b9;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Cập nhật thông tin sữa</h2>

<?php if ($sua): ?>
<form method="post">
    <label>Tên sữa:</label>
    <input type="text" name="tensua" value="<?= htmlspecialchars($sua['TENSUA']) ?>" required>

    <label>Hãng sữa:</label>
    <select name="hangsua" required>
        <option value="">-- Chọn hãng sữa --</option>
        <?php foreach ($hangSuaOptions as $hang): ?>
            <option value="<?= htmlspecialchars($hang) ?>" <?= ($hang == $sua['HANGSUA']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($hang) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Loại sữa:</label>
    <input type="text" name="loaisua" value="<?= htmlspecialchars($sua['LOAISUA']) ?>" required>

    <label>Trọng lượng:</label>
    <input type="text" name="trongluong" value="<?= htmlspecialchars($sua['TRONGLUONG']) ?>" required>

    <label>Đơn giá:</label>
    <input type="text" name="dongia" value="<?= htmlspecialchars($sua['DONGIA']) ?>" required>

    <input type="submit" value="Cập nhật">
</form>
<?php else: ?>
    <p style="color:red;">Không tìm thấy sữa với mã số <?= $masua ?>.</p>
<?php endif; ?>

<a href="ttsua.php">← Quay lại danh sách sữa</a>

</body>
</html>
