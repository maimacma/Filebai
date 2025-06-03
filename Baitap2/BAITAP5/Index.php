<?php
    // Initialize variables for Circle and Rectangle calculations
    $radius = $area_circle = $circumference = '';
    $length = $width = $area_rect = $perimeter_rect = '';
    $error_circle = $error_rect = '';

    // Handle Circle Calculations
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate_circle'])) {
        $radius = $_POST['radius'];
        if (is_numeric($radius) && $radius > 0) {
            $area_circle = round(pi() * pow($radius, 2), 2);
            $circumference = round(2 * pi() * $radius, 2);
        } else {
            $error_circle = "Vui lòng nhập bán kính hợp lệ!";
        }
    }

    // Handle Rectangle Calculations
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calculate_rectangle'])) {
        $length = $_POST['length'];
        $width = $_POST['width'];
        if (is_numeric($length) && is_numeric($width) && $length > 0 && $width > 0) {
            $area_rect = round($length * $width, 2);
            $perimeter_rect = round(2 * ($length + $width), 2);
        } else {
            $error_rect = "Vui lòng nhập chiều dài và chiều rộng hợp lệ!";
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện Tích và Chu Vi Hình Học</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            color: #007bff;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            font-weight: bold;
        }
        input[type="text"] {
            padding: 10px;
            width: 70%;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input[type="reset"] {
            background-color: #ccc;
            color: black;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="reset"]:hover {
            background-color: #888;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }
            .input-group {
                flex-direction: column;
                align-items: stretch;
            }
            input[type="text"] {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="container">
            <!-- Circle Section -->
            <div>
                <h2 class="section-title">Diện Tích và Chu Vi Hình Tròn</h2>
                <div class="input-group">
                    <label for="radius">Bán kính:</label>
                    <input type="text" id="radius" name="radius" value="<?php echo htmlspecialchars($radius); ?>" placeholder="Nhập bán kính"/>
                </div>
                <div class="input-group">
                    <label for="area">Diện tích:</label>
                    <input type="text" id="area" name="dientich" value="<?php echo htmlspecialchars($area_circle); ?>" readonly placeholder="Kết quả diện tích"/>
                </div>
                <div class="input-group">
                    <label for="circumference">Chu vi:</label>
                    <input type="text" id="circumference" name="chuvi" value="<?php echo htmlspecialchars($circumference); ?>" readonly placeholder="Kết quả chu vi"/>
                </div>
                <input type="submit" name="calculate_circle" value="Tính Toán"/>
                <input type="reset" value="Làm Mới"/>
                <?php if ($error_circle) { echo "<p style='color: red;'>$error_circle</p>"; } ?>
            </div>

            <!-- Rectangle Section -->
            <div>
                <h2 class="section-title">Diện Tích Hình Chữ Nhật</h2>
                <div class="input-group">
                    <label for="length">Chiều dài:</label>
                    <input type="text" id="length" name="length" value="<?php echo htmlspecialchars($length); ?>" placeholder="Nhập chiều dài"/>
                </div>
                <div class="input-group">
                    <label for="width">Chiều rộng:</label>
                    <input type="text" id="width" name="width" value="<?php echo htmlspecialchars($width); ?>" placeholder="Nhập chiều rộng"/>
                </div>
                <div class="input-group">
                    <label for="rectPerimeter">Chu vi:</label>
                    <input type="text" id="rectPerimeter" name="chuvi" value="<?php echo htmlspecialchars($perimeter_rect); ?>" readonly placeholder="Kết quả chu vi"/>
                </div>
                <div class="input-group">
                    <label for="rectArea">Diện tích:</label>
                    <input type="text" id="rectArea" name="dientich" value="<?php echo htmlspecialchars($area_rect); ?>" readonly placeholder="Kết quả diện tích"/>
                </div>
                <input type="submit" name="calculate_rectangle" value="Tính Toán"/>
                <input type="reset" value="Làm Mới"/>
                <?php if ($error_rect) { echo "<p style='color: red;'>$error_rect</p>"; } ?>
            </div>
        </div>
    </form>
</body>
</html>
