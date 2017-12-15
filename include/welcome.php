<?php
   include('session.php');
   include("config.php");
?>
<?
session_start();
	$string="SELECT `Car mark`, `Car model` FROM `client` WHERE `username`='$login_session' ";
// echo $string;
$result = mysqli_query($db, $string) or die("Ошибка " . mysqli_error($db));
while ($row = $result->fetch_assoc()) {
    $cars= $row['Car mark']." ".$row['Car model'];
}
?>

<?php
	$query ="SELECT `service`,`ready` FROM `orders` WHERE `username`='$login_session'";
 
$result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 

$sql = "SELECT `bonus` FROM `client` WHERE `username`='$login_session'";
// echo "$sql";
$res = mysqli_query($db, $sql) or die("Ошибка " . mysqli_error($db)); ;

// идем по результату запроса
for($i = 0; $i < 1; $i++)
{
     $record = mysqli_fetch_array($res);
     $str = "";
     for($j = 0; $j < $field_cnt; $j++)
     {
         $str .= "\t".$record[$j];
     }
     $str .= "";
}

// mysqli_close($db);
?>


<html>
   
   <head>
      <title><?$login_session?> personal page </title>
		<link rel = "stylesheet" href="../css/main.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type = "text/javascript" src="../js/js.js"></script>
   </head>
   
   <body>
   <div class="welcome">
   <nav class="registrat">
					<ul>
						<li><a href="../main.html">Main Page</a></li>
						<li><a href="../service/index.html">Serrvice</a></li>
						<li><a href = "logout.php" id="SO">Sign Out</a></li>
					</ul>
				</nav>
      <h1>Добро пожаловать, <?php echo $login_session; ?></h1> 
      <p id="car">Ваша машина: <?php echo $cars; ?></p>
      <div id="list">
		<?php
			if($result)
			{
    			
    			$rows = mysqli_num_rows($result); // количество полученных строк
     if($rows){
    			echo "<h3>Услуга </h3>";
    			for ($i = 0 ; $i < $rows ; ++$i)
    			{
    				echo "<ol>";
        			$row = mysqli_fetch_row($result);
        			echo "<li>";
            			for ($j = 0 ; $j < 1 ; ++$j) echo "$row[$j]   ";
        			echo "</ol>";
    			}

    			
     
    // очищаем результат
    			mysqli_free_result($result);
    		}
    			else{ echo "У вас нету заказов!";}
			}
			
		?>
      </div>
      <div class="func">
      <div id="func1">
      <a href="#" id="goadd"><i class="fa fa-plus" aria-hidden="true"> Добавить услугу</i></a>
      <div id="modal_add_form" style="display: none; top: 45%; opacity: 0;">
						<form method="POST" action="add.php">
							Услуга<input name="service" type="text" id="service"><br>
							<input type="submit" value="Добавить">
						</form>
						<span id="modal_add_close"><i class="fa fa-times" aria-hidden="true"></i></span>
				</div>
				<div id="add_overlay" style="display: none;"></div>
		</div>
		<div id="func2">
		<a href="#" id="godell"><i class="fa fa-trash" aria-hidden="true"> Удалить из списка</i></a>
      <div id="modal_dell_form" style="display: none; top: 45%; opacity: 0;">
						<form method="POST" action="dell.php">
							Услуга<input name="del_service" type="text" id="del_service"><br>
							<input type="submit" value="Удалить">
						</form>
						<span id="modal_dell"><i class="fa fa-times" aria-hidden="true"></i></span>
				</div>
				<div id="dell_overlay" style="display: none;"></div>
		</div>
		</div>
		<p id="bonus">Ваши бонусы: <?php echo $record[0]; ?></p>
		</div>
   </body>
   
</html>