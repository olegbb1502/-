<?php
session_start();
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('service_db');
	if($connection == false)
	{
		// echo 'error';
		// echo mysql_connect_error();
		exit();
	}

	$service = $_POST['service'];
	// echo $service."<br>";
	$car = $_POST['car'];
	// echo $car."<br>";
	$model = $_POST['model'];
	// echo $model."<br>";
$string="SELECT `service_price` FROM `price` WHERE `Car mark`='$car' AND `Car model`='$model' AND `service`='$service'";
// echo $string;
$result=mysql_query($string) or die(mysql_error());
$price = mysql_fetch_array($result);
// echo ($price[0]);
require_once('main.html');	