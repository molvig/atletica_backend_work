<?php

try{
		$db = new PDO("mysql:host=localhost;dbname=atleticadb","root","");
		//$db = new PDO("mysql:host=atleticas-195665.mysql.binero.se;dbname=195665-atleticas","195665_hs74404","atletica2015"); //online
		$db -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db -> exec("SET NAMES 'utf8'");
	
} 
catch (Exception $e) { 
		echo "Could not connect to the database";
		exit;
}

//Connects to the database


session_start();
ob_start();



?>

