<?php 

	if(isset($_GET["passid"])){
	$passid = htmlspecialchars($_GET["passid"]);
		try {
				$query = "SELECT * FROM bokningar WHERE bokningsbarID = {$passid} AND reservplats=1 order by datum asc";  
				$stmt = $db ->prepare($query);
				$stmt->execute();

				$result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 
				$res = ($stmt->fetch(PDO::FETCH_ASSOC)); 
				$found="";
				$reserv="";
				$reservpl=0;

				$stmt->closeCursor(); 

				$antalplatser = $res['antalplatser'];

				foreach ($result as $row) { 

						$incheckad = $row["incheckad"];
						$reservplats = $row["reservplats"];

				        $query = "SELECT * FROM medlemmar WHERE medlemmar.kundnr = {$row['kundnr']}";
						$stmt = $db ->prepare($query);
						$stmt->execute();
						$hitta = ($stmt->fetch(PDO::FETCH_ASSOC)); 

						$fnamn = $hitta['fnamn'];
						$enamn = $hitta['enamn'];
						$reservpl=$reservpl+1;
				

					$reserv .= "<tr>" . '<form method="post">'.
							"<td>"  . $reservpl . "</td>" . 
							"<td>" . "<a href='medlem_uppdatera.php?pid=". $hitta['kundnr'] ."'>" .$hitta['kundnr']. "</a>" . 
							'<input type="hidden"'. 'name="getkundnrin"'. 'value="' .$hitta['kundnr']. '">'."</td>" . 
							"<td>" . $fnamn .  "</td>" . 
							"<td>" . $enamn . "</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka"' .'>'.
							"</td>" . '</form>'.
							"</tr>" ;


				}

		}catch (Exception $e) {
			      echo "Data could not be retrieved from the database";
			      echo $e;
			      exit;
		}
	}


	?>	