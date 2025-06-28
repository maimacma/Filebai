<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xem file</title>
</head>

<body>
    <form action="#" method="post">
  <label for="fruit">Chọn ảnh:</label>
<select id="anh" name="anh">
<?php 
$diachi = ".";
$mafile = ["jpg", "png", "psd", "JPG", "PNG", "PSD"];
$tenfile = scandir($diachi);
$bofile = array_diff($tenfile , array('.', '..'));
foreach($bofile as $bofiles)
{
   $mor = pathinfo($bofiles,PATHINFO_EXTENSION);
   if(array_search($mor,$mafile) !== false)
   {
       echo '<option name="">'.$bofiles.'</option>';
   }

}
?>
</select>
    </form>
</body>
</html>