<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Cơ Bản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        section {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .content-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .content-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.5rem;
        }

        .content-container p {
            font-size: 1.2rem;
            color: #555;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 0.9rem;
            position: relative;
            width: 100%;
        }
    </style>
</head>
<body onload="abc()">
    <section>
        <div class="content-container">
            <?php 
                function abc() {
                    if (isset($_GET['ten']) || isset($_GET['tuoi'])) {
                        $ten = $_GET['ten'];
                        $tuoi = $_GET['tuoi'];
                        echo "<h2>Chào mừng bạn, $ten!</h2>";
                        echo "<p>Tuổi của bạn là $tuoi tuổi.</p>";
                    } else {
                        echo "<h2>Vui lòng nhập thông tin của bạn.</h2>";
                    }
                }
                abc();
            ?>
        </div>
    </section>
</body>
</html>
