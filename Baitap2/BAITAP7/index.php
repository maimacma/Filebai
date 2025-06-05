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


<?php 
$diachi = ".";
$mafile = ["jpg", "png", "psd", "JPG", "PNG", "PSD"];
$tenfile = scandir($diachi);
$bofile = array_diff($tenfile , array('.', '..'));
foreach($bofile as $bofiles)
{
   $mor = pathinfo($tenfiles,PATHINFO_EXTENSION);
   if(array_search($mor,$mafile) !== false)
   {
       echo '<option value="'.$bofiles.'">Apple</option>';
   }

}
?>
</select>
    </form>
</body>
</html>