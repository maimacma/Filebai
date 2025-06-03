<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 100%;
        }

        .content-container {
            background-color: white;
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .content-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.8rem;
        }

        .content-container p {
            font-size: 1.2rem;
            color: #555;
        }

        label {
            display: block;
            margin-top: 20px;
            font-size: 1rem;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 0.9rem;
            width: 100%;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div class="content-container">
        <form action="" method="POST">
            <?php 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_REQUEST['ten']) && isset($_REQUEST['tuoi'])) {
                        echo "<h2>Chào mừng bạn, ".$_REQUEST['ten']."!</h2>";
                        echo "<p>Số tuổi của bạn là ".$_REQUEST['tuoi']." tuổi.</p>";
                    } else {
                        echo "<h2>Vui lòng nhập thông tin của bạn.</h2>";
                    }
                }
            ?>
            <label for="ten">Name:</label>
            <input type="text" id="ten" name="ten" placeholder="Nhập tên của bạn" required />

            <label for="tuoi">Age:</label>
            <input type="text" id="tuoi" name="tuoi" placeholder="Nhập tuổi của bạn" required />

            <input type="submit" value="Gửi" />
        </form>
    </div>
</body>
</html>
