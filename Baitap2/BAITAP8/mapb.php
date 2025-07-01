<?php
session_start();
$con = require_once 'connect.php';
$mapb = 'select * from PHONGBAN';
$result = mysqli_query($con, $mapb);
$mang=[];
while ($row = $result->fetch_assoc())
{
    $mang[] = $row;
}
$_SESSION['PHONGBAN'] = $mang;

?>