<?php
include 'connect.php';
include 'checkLogin.php';

$sq="delete from produto where id='$_SESSION[id]'";
mysqli_query($con,$sq);
header('location:loginv2.php');
?>