<?php
   include('session.php');
   include("config.php");
?>
<?
session_start();
$delService=$_POST['del_service'];

   $query = "DELETE FROM `orders` WHERE `username`='$login_session' AND `service`='$delService'"; 

  $result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
mysqli_close($db);
header("location: welcome.php");
?>