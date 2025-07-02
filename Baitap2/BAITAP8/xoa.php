<?php
$con = require_once 'connection.php';
if(isset($_GET['manv']))
{
$manv = $_GET['manv'];
$xoaso = 'deleted * form NHANVIEN where MANV = ?';
$lenh = $con->prepare($xoaso);
$chaylenh -> execute($lenh);
return header ("loacation:index.php");
} else {
    
    return header ("location:index.php?xoa=khongthanhcong");
}
?>