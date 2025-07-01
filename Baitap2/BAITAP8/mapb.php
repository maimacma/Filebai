<?php
session_start();
$con = require_once 'connect.php';
$mapb = 'select * from PHONGBAN';
$result = mysqli_query($con, $mapb);
$mang=[];
while ($mang = $result->fetch_assoc())
{
    $mang[] = $mang;
}
$_SESSION = $mang;
$_SESSION['mapb'] = $mang;
?>