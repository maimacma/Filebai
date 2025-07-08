<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xem file</title>
</head>

<body>
    <form action="#" method="post">
  <label for="fruit">Chọn ảnh:</label>
<select id="anh" name="dsanh">
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
       echo '<option value="'.$bofiles.'">'.$bofiles.'</option>';
   }

}
?>
</select>
    <input type="submit" value="Xem ảnh">
<?php
if(isset($_POST['dsanh']))
{
    $anh = $_POST['dsanh'];
    echo '<img src="/BAITAP7/'.$anh.'" alt="Ảnh" style="width: 300px; height: 300px;">';
}
?>  
    </form>
</body>
</html>