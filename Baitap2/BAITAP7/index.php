<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xem file</title>
</head>
<?php 
$diachi = "./BAITAP7/";
$mafile = ["jpg", "png", "psd", "JPG", "PNG", "PSD"];
$tenfile = scandir($diachi);
foreach($tenfile as $tenfiles)
{
echo $tenfiles."<br>";
}
?>
<body>
    <form action="#" method="post">
  <label for="fruit">Chọn ảnh:</label>
<select id="fruit" name="fruit">
<option value="apple">Apple</option>
</select>
    </form>
</body>
</html>