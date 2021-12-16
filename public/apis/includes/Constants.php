<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "laraveldesadigital";

	$con = mysqli_connect($host,$user,$pass, $db);
	
	define('DB_NAME',$db);
	define('DB_USER',$user);
	define('DB_PASSWORD',$pass);
	define('DB_HOST',$host);
?>



