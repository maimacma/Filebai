<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xem file</title>
</head>

<body>
    <form action="#" method="post">
  <label for="fruit">Chọn ảnh:</label>
<select id="fruit" name="fruit">
<option value="apple">Apple</option>
</select>
<?php 
$diachi = ".";
$mafile = ["jpg", "png", "psd", "JPG", "PNG", "PSD"];
$tenfile = scandir($diachi);
$bofile = array_diff($tenfile , array('.', '..'));
$mor= strtolower(pathinfo($tenfile,PATHINFO_EXTENSION));
$fileanhhienco = array_fill(0, count($bofile), false);
foreach($fileanhhienco as $fileanhhiencos)
{
echo $fileanhhiencos."<br>";
}
?>
    </form>
</body>
</html>