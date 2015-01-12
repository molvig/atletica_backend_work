<?php

try{
		//$db = new PDO("mysql:host=localhost;dbname=atletica_nya","root","");
		$db = new PDO("mysql:host=atletica2015-167083.mysql.binero.se;dbname=167083-atletica2015","167083_bg88004","EAqEGP4Ygu"); //online
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

