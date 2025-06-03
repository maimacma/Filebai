<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            font-size: 1.5rem;
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

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 30px auto;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            display: block;
            font-size: 1rem;
            margin-bottom: 8px;
            color: #555;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
            background-color: #fafafa;
        }

        .form-container input[type="text"]:focus {
            outline: none;
            border-color: #4CAF50;
            background-color: #f1fdf1;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
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
<body>
    <div class="form-container">
        <form action="xuly.php" method="get">
            <label for="ten">Name:</label>
            <input type="text" id="ten" name="ten" placeholder="Nhập tên của bạn" required />

            <label for="tuoi">Age:</label>
            <input type="text" id="tuoi" name="tuoi" placeholder="Nhập tuổi của bạn" required />

            <input type="submit" value="Gửi" />
        </form>
    </div>
</body>
</html>
