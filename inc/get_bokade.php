	<?php
	if(isset($_GET["passid"])){

	$passid = htmlspecialchars($_GET["passid"]);

	try {
		$query = "SELECT * FROM bokningar WHERE bokningsbarID = {$passid} AND reservplats=0 order by datum asc";  
		$stmt = $db ->prepare($query);
		$stmt->execute();

		$antalbokade = $stmt->rowCount(); 
		$result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 
		$res = ($stmt->fetch(PDO::FETCH_ASSOC)); 
		$found="";

		$stmt->closeCursor(); 

		$antalplatser = $res['antalplatser'];

		foreach ($result as $row) { 

				$incheckad = $row["incheckad"];
				$reservplats = $row["reservplats"];


			if ($row['gastID'] == null)	{

		        $query = "SELECT * FROM medlemmar WHERE medlemmar.kundnr = {$row['kundnr']}";
				$stmt = $db ->prepare($query);
				$stmt->execute();
				$hitta = ($stmt->fetch(PDO::FETCH_ASSOC)); 
				$stmt->closeCursor(); 	

				$fnamn = $hitta['fnamn'];
				$enamn = $hitta['enamn'];

				foreach ($hitta as $row) { 
						$query = "SELECT giltigtfran, giltigttill, fryst, kort, ag_aktivt FROM medlemskort WHERE kundnr = {$hitta['kundnr']} AND aktivtkort=1";
						$stmt = $db ->prepare($query);
						$stmt->execute();

						$giltigt = $stmt->fetch(PDO::FETCH_ASSOC); 
						$stmt->closeCursor(); 	


						$dagarkvar = $giltigt['giltigttill'];
						$fryst = $giltigt['fryst'];
						$giltigtfran = $giltigt['giltigtfran'];
						$korttyp = $giltigt['kort'];
						$ag_aktivt = $giltigt['ag_aktivt'];

						$today = date("Y-m-d");  


						if($fryst==1){$daysleft="Fryst";}
						else if ($giltigtfran > $today){$daysleft="Ej börjat gälla";}
						else if (($korttyp=="AG12" ||$korttyp=="AG12+2" || $korttyp=="AG24" ||$korttyp=="AG24+2" || $korttyp=="AG12DAG") && $ag_aktivt ==1){ $daysleft="Autogiro";} 
						else if ($korttyp=="10"){ $daysleft="Klippkort";} 
						else {$daysleft = (strtotime("$dagarkvar 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400; }
				}	

					if ($incheckad==0){
						$found .= "<tr>" . '<form method="post">'.
							"<td>" . "<a href='medlem_uppdatera.php?pid=". $hitta['kundnr'] ."'>" .$hitta['kundnr']. "</a>" . 
							'<input type="hidden"'. 'name="getkundnrin"'. 'value="' .$hitta['kundnr']. '">'."</td>" . 
							"<td>" . $fnamn .  "</td>" . 
							"<td>" . $enamn . "</td>" . 
							"<td>"  . $daysleft . "</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka"' .'>'.
				  			 "</td>" . 
							"<td>"  . '<input type="submit"'.' name="checkain-submit"'. ' class="btn btn-default btn-sm"'.'value="Checka in"' .'>'.
				  			 "</td>" . '</form>'.
							"</tr>" ;
				}    
		
				else if ($incheckad==1){
						$found .= "<tr style='background-color:#99CC99;'>" . '<form method="post">'.
							"<td>" . "<a href='medlem_uppdatera.php?pid=". $hitta['kundnr']."'>" . $hitta['kundnr'] . "</a>" .
							'<input type="hidden"'. 'name="getkundnrut"'. 'value="' .$hitta['kundnr']. '">'."</td>" .  "</td>" . 
							"<td>" . $hitta['fnamn'] .  "</td>" . 
							"<td>" . $hitta['enamn'] . "</td>" . 
							"<td>"  . $daysleft . "</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka" disabled' .'>'.
							"<td>"  . '<input type="submit"'.' name="angra-submit"'. ' class="btn btn-default btn-sm"'.'value="Ångra"' .'>'.
				  			 "</td>" . '</form>'.
							"</tr>" ;

				} 	


							//glyphicon glyphicon-exclamation-sign
				
			}

			else if ($row['kundnr'] == null ){

			$query = "SELECT * FROM gastlista WHERE gastID = {$row['gastID']} ";
			$stmt = $db ->prepare($query);
			$stmt->execute();
			$hitta = ($stmt->fetch(PDO::FETCH_ASSOC)); 
			$stmt->closeCursor(); 

			$nummer = $row["gastID"];

			$daysleft = "GÄST";

			//"<tr style='background-color:#FFCCCC;'>"

			if ($incheckad==0){
						$found .= "<tr>" . '<form method="post">'.
							"<td>" . "<a href='gast.php?pid=". $row["gastID"] ."'>" . $row["gastID"]. "</a>" . 
							'<input type="hidden"'. 'name="getgastin"'. 'value="' .$row["gastID"]. '">'."</td>" . 
							"<td>" . $hitta['fnamn'] .  "</td>" . 
							"<td>" . $hitta['enamn'] . "</td>" . 
							"<td>"  . $daysleft . "</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-gast-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka"' .'>'.
				  			 "</td>" . 
							"<td>"  . '<input type="submit"'.' name="checkain-gast-submit"'. ' class="btn btn-default btn-sm"'.'value="Checka in"' .'>'.
				  			 "</td>" . '</form>'.
							"</tr>" ;
				}    
		
				else if ($incheckad==1){
						$found .= "<tr style='background-color:#99CC99;'>" . '<form method="post">'.
							"<td>" . "<a href='gast.php?pid=". $nummer."'>" . $nummer . "</a>" .
							'<input type="hidden"'. 'name="getgastut"'. 'value="' .$nummer. '">'."</td>" .  "</td>" . 
							"<td>" . $hitta['fnamn'].  "</td>" . 
							"<td>" . $hitta['enamn'] . "</td>" . 
							"<td>"  . $daysleft . "</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-gast-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka" disabled' .'>'.
							"<td>"  . '<input type="submit"'.' name="angra-gast-submit"'. ' class="btn btn-default btn-sm"'.'value="Ångra"' .'>'.
				  			 "</td>" . '</form>'.
							"</tr>" ;

				} 		
		
			
				}

		}


	
	}

	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}

}



	?>






