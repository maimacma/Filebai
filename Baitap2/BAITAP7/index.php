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
foreach($bofile as $bofiles)
{
   $mor = pathinfo($tenfiles,PATHINFO_EXTENSION); 
echo $bofiles."<br>";
}
?>
    </form>
</body>
</html>