<?php
   include('session.php');
   include("config.php");
?>
<?
session_start();
$addService=$_POST['service'];
   $query = "INSERT INTO `orders`(`username`,`service`) VALUES('$login_session','$addService')"; 

  $result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
mysqli_close($db);
header("location: welcome.php");
?>