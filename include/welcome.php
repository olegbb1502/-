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
   <nav>
					<ul>
						<li><a href="../main.html">Main Page</a></li>
						<li><a href="../service/index.html">Serrvice</a></li>
					</ul>
				</nav>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <p>Your car is: <?php echo $cars; ?></p>
      <p>
		<?php
			if($result)
			{
    			
    			$rows = mysqli_num_rows($result); // количество полученных строк
     if($rows){
    			echo "<i>service </i>";
    			for ($i = 0 ; $i < $rows ; ++$i)
    			{
    				echo "<ul>";
        			$row = mysqli_fetch_row($result);
        			echo "<li>";
            			for ($j = 0 ; $j < 1 ; ++$j) echo "$row[$j]   ";
        			echo "</ul>";
    			}

    			
     
    // очищаем результат
    			mysqli_free_result($result);
    		}
    			else{ echo "Your list is empty";}
			}
			
		?>
      </p>
      <a href="#" id="goadd"><i class="fa fa-plus fa-3x" aria-hidden="true">Add service</i></a>
      <div id="modal_add_form" style="display: none; top: 45%; opacity: 0;">
					<span id="modal_add_close">X</span>
						<form method="POST" action="add.php">
							Service <input name="service" type="text" id="service"><br>
							<input type="submit" value="Add">
						</form>
				</div>
				<div id="add_overlay" style="display: none;"></div>
		<br><a href="#" id="godell"><i class="fa fa-trash fa-3x" aria-hidden="true">Delete service</i></a>
      <div id="modal_dell_form" style="display: none; top: 45%; opacity: 0;">
					<span id="modal_dell_close">X</span>
						<form method="POST" action="dell.php">
							Service <input name="del_service" type="text" id="del_service"><br>
							<input type="submit" value="dell">
						</form>
				</div>
				<div id="dell_overlay" style="display: none;"></div>
		<p>Your bonus: <?php echo $record[0]; ?></p>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>