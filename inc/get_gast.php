<?php
	if(isset($_GET["pid"])){
$gastID = htmlspecialchars($_GET["pid"]);




			$query = "SELECT * FROM gastlista WHERE gastID = {$gastID} ";
			$stmt = $db ->prepare($query);
			$stmt->execute();
			$hitta = ($stmt->fetch(PDO::FETCH_ASSOC)); 
			$stmt->closeCursor(); 

			$gastID = $hitta["gastID"];
			$fnamn = $hitta["fnamn"];
			$enamn = $hitta["enamn"];
			$tel = $hitta["telefon"];
			$mail = $hitta["mail"];


		
			}


	?>