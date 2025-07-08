<?php 
if(isset($_FILES["upfile"])&& $_POST["upload"])
{
$tenfile = $_FILES["upfile"]["name"];
$mang = ["jpg", "png", "psd", "JPG", "PNG", "PSD"];
$mafile = pathinfo($tenfile, PATHINFO_EXTENSION);
$choluutam = $_FILES["upfile"]["tmp_name"];
$choluu = "./BAITAP7/";
if($_FILES["upfile"]["error"] === 0 && in_array($mafile, $mang))
{
move_uploaded_file($choluutam, $choluu.$tenfile);
echo "Lưu thành công file". $tenfile;
echo "<img src='".$choluu.$tenfile."'/>";
}
else
{
    echo "Lưu không thành công file". $tenfile."vì không đúng file hoặc file rỗng hoặc không đúng định dạng";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        input[type="file"] {
            margin: 20px 0;
        }
        #file-info {
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action=""> 
    <h2>Upload a File</h2>
    <input type="file" id="file-input" name="upfile">
    <input type="submit" name="upload"  />
    <div id="file-info"></div>
    </form>
</body>
</html>
