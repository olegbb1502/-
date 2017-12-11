<?php
	$connection = mysql_connect('127.0.0.1', 'root', '');
	mysql_select_db('service_db');
	if($connection == false)
	{
		// echo 'error';
		// echo mysql_connect_error();
		exit();
	}

	$nameI = $_GET['login'];
	$passI = $_GET['password'];

	$nameI = stripslashes($nameI);
	$nameI = htmlspecialchars($nameI);
	$passI = stripslashes($passI);
	$passI = htmlspecialchars($passI);

	$nameI = trim($nameI);
	$passI = trim($passI);

	$nameDB = "SELECT `Name` FROM `client` WHERE `Name`='".$nameI."' AND `Telephone`='".$passI."'";
	$passDB = "SELECT `Telephone` FROM `client` WHERE `Name`='".$nameI."' AND `Telephone`='".$passI."'";

	$resultName=mysql_query($nameDB) or die(mysql_error());
	// $NameDB = mysql_fetch_array($resultName);
	$resultPass=mysql_query($passDB) or die(mysql_error());
	// $PassDB = mysql_fetch_array($resultPass);

	echo $NameDB;
		
	$colsName = mysql_num_rows($resultName);
	$colsPass = mysql_num_rows($resultPass);
	if($colsPass==$nameI && $colsName==$passI){
		header("Location: client/client.html");exit;
	}
	else{
		header("Location: main.html");}
?>