	<?php
	if(isset($_GET["passid"])){

	$passid = htmlspecialchars($_GET["passid"]);
 $today = date('Y-m-d');
$dis="";
 if ($passdatum != $today){$dis="disabled";}
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
						$query = "SELECT * FROM medlemskort WHERE kundnr = {$hitta['kundnr']} AND aktivtkort=1";
						$stmt = $db ->prepare($query);
						$stmt->execute();
						$giltigt = $stmt->fetch(PDO::FETCH_ASSOC); 
						$stmt->closeCursor(); 	

						$kortID = $giltigt['kortID'];
						$dagarkvar = $giltigt['giltigttill'];
						$fryst = $giltigt['fryst'];
						$giltigtfran = $giltigt['giltigtfran'];
						$korttyp = $giltigt['kort'];
						$antalklipp = $giltigt['antalklipp'];
						$ag_aktivt = $giltigt['ag_aktivt'];

						$today = date("Y-m-d");  
						if ($dagarkvar != null)
						{$dagarkvar = date ('Y-m-d', strtotime($dagarkvar));}
						

						if ($korttyp == "10" ) {
						 	$today = date('Y-m-d');

						 	if ($dagarkvar == null || $dagarkvar >= $today){
						 		$klippantal = $antalklipp;
						 		$query = "SELECT * FROM klipplogg WHERE kortID = {$kortID} AND bokningsbarID = {$passid}";
								$stmt = $db ->prepare($query);
								$stmt->execute();
								$klippt = $stmt->fetch(PDO::FETCH_ASSOC); 
								$stmt->closeCursor(); 

								$klippbokningsbarID = $klippt['bokningsbarID'];

							}else if ($dagarkvar < $today){
								if ($antalklipp>10){
									$firstklipp = date('Y-m-d', strtotime($dagarkvar. "-6 months")); 
									$query = "SELECT * FROM klipplogg WHERE kortID ={$kortID} AND klipptid <= '{$dagarkvar}' AND klipptid >= '{$firstklipp}' ";
									$stmt = $db ->prepare($query);
									$stmt->execute();	
									$totalklipp = $stmt->rowCount();
									$raderaklipp = 10 - $totalklipp;
									$nyttklippantal = $antalklipp - $raderaklipp;
									$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$hitta['kundnr']} AND aktivtkort=1");
									$q = $db -> prepare($query);
									$q-> execute(array(':antalklipp'=>$nyttklippantal, ':giltigttill'=>null));
								} else {
									$klippantal = 0;
									$query = ("UPDATE medlemskort SET antalklipp=:antalklipp, giltigttill=:giltigttill WHERE kundnr={$hitta['kundnr']} AND aktivtkort=1");
									$q = $db -> prepare($query);
									$q-> execute(array(':antalklipp'=>0, ':giltigttill'=>null));
									$klippbokningsbarID = "";
								}
							}	


						}
						
						$query = "SELECT * FROM skulder WHERE kundnr = {$hitta['kundnr']}";
						$stmt = $db ->prepare($query);
						$stmt->execute();
						$skuld=$stmt->rowCount(); 
						$stmt->closeCursor(); 	
						$skulden="";
						if($skuld>0){
							$skulden = '<a title="Kunden har skulder. Klicka för att visa."'. 'style="color:red;font-size:20px;"'.'href="medlem_skuldlista.php?member='.$hitta['kundnr']."&submit-skuld=".'">'.'<span class=" glyphicon glyphicon-exclamation-sign"></span>'.'</a>';
						}



						if($fryst==1){$daysleft="Fryst";}
						else if ($giltigtfran > $today){$daysleft="Ej börjat gälla";}
						else if ($korttyp=="INST"){$daysleft="INSTRUKTÖR";}
						else if (($korttyp=="AG12" ||$korttyp=="AG12+2" || $korttyp=="AG24" ||$korttyp=="AG24+2" || $korttyp=="AG12DAG") && $ag_aktivt ==1){ $daysleft="Autogiro";} 
						else if ($korttyp=="10" && $klippbokningsbarID != $passid && $incheckad==0){ $daysleft = '<input type="submit"'.' name="klipp-submit"'. ' class="btn btn-default btn-sm"'.'value="Klipp:  ' . $antalklipp. '" disabled>'  ;} 
						else if ($korttyp=="10" && $klippbokningsbarID != $passid){ $daysleft = '<input type="submit"'.' name="klipp-submit"'. ' class="btn btn-default btn-sm"'.'value="Klipp:  ' . $antalklipp. '">'  ;} 
						else if ($korttyp=="10" && $klippbokningsbarID == $passid){ $daysleft = "Klipp:  " . $antalklipp ;} 
						else if ($dagarkvar == null){$daysleft="Inget kort";}
						else {$daysleft = (strtotime("$dagarkvar 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400; }
				}	

					if ($incheckad==0){
						$found .= "<tr>" . '<form method="post">'.
							"<td>" . "<a href='medlem_uppdatera.php?pid=". $hitta['kundnr'] ."'>" .$hitta['kundnr']. "</a>" . 
							'<input type="hidden"'. 'name="getkundnrin"'. 'value="' .$hitta['kundnr']. '">'."</td>" . 
							"<td>" . $fnamn .  "</td>" . 
							"<td>" . $enamn . "</td>" . 
							"<td>"  . $daysleft ." ". $skulden ."</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka"' .'>'.
				  			 "</td>" . 
							"<td>"  . '<input type="submit"'.' name="checkain-submit"'. ' class="btn btn-default btn-sm"'.'value="Checka in"' . $dis. '>'.
				  			 "</td>" . '</form>'.
							"</tr>" ;
				}    
		
				else if ($incheckad==1){
						$found .= "<tr style='background-color:#99CC99;'>" . '<form method="post">'.
							"<td>" . "<a href='medlem_uppdatera.php?pid=". $hitta['kundnr']."'>" . $hitta['kundnr'] . "</a>" .
							'<input type="hidden"'. 'name="getkundnrut"'. 'value="' .$hitta['kundnr']. '">'."</td>" .  "</td>" . 
							"<td>" . $hitta['fnamn'] .  "</td>" . 
							"<td>" . $hitta['enamn'] . "</td>" . 
							"<td>"  . $daysleft ." ". $skulden . "</td>" . 
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
							"<td>"  . '<input type="submit"'.' name="checkain-gast-submit"'. ' class="btn btn-default btn-sm"'.'value="Checka in"' .$dis.'>'.
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


