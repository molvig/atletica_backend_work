
<?php
if(isset($_GET["passid"])){
$passid = htmlspecialchars($_GET["passid"]);

try {
	$sql ="SELECT * FROM bokningsbara WHERE bokningsbarID = {$passid}";
	$results = $db -> prepare ($sql);
	$results->execute();
	} 

catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetch(PDO::FETCH_ASSOC));
$results->closeCursor();

$passnamn = $sc['passnamn'];
$install = $sc['installt'];
$orsaken = $sc['installt_orsak'];
$installt="";
if ($install==1){$installt = "<div class='installt'>" . "<h1>". "INSTÄLLT" . "</h1>"."<p> Orsak: " . $orsaken. "</p>". "</div>" ;}
$starttid = date('H:i', strtotime($sc['starttid']));
$sluttid = date('H:i', strtotime($sc['sluttid']));
$inst = $sc['instnamn'];
$antalplatserna = $sc['antalplatser'];
$info = $sc['information'];
$passdatum = date('Y-m-d', strtotime($sc['datum']));
}














	

	try {
		$query = "SELECT * FROM bokningar WHERE bokningsbarID = {$passid} order by datum asc";  
		$stmt = $db ->prepare($query);
		$stmt->execute();

		$antalbokade = $stmt->rowCount(); 
		$result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 
		$res = ($stmt->fetch(PDO::FETCH_ASSOC)); 
		$found="";

		$stmt->closeCursor(); 

		$antalplatser = $res['antalplatser'];

		foreach ($result as $row) { 


			if ($row['gastID'] == null)	{

		        $query = "SELECT * FROM medlemmar WHERE medlemmar.kundnr = {$row['kundnr']}";
				$stmt = $db ->prepare($query);
				$stmt->execute();
				$hitta = ($stmt->fetch(PDO::FETCH_ASSOC)); 

				$fnamn = $hitta['fnamn'];
				$enamn = $hitta['enamn'];
				$telefon = $hitta['telefon'];

					
						$found .= "<tr" . '<form method="post">'.
							"<td>" . "<a href='medlem_uppdatera.php?pid=". $hitta['kundnr'] ."'>" .$hitta['kundnr']. "</a>" . 
							'<input type="hidden"'. 'name="getkundnrin"'. 'value="' .$hitta['kundnr']. '">'."</td>" . 
							"<td>" . $fnamn .  "</td>" . 
							"<td>" . $enamn . "</td>" . 
							"<td>"  . $telefon . "</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka"' .'>'.
				  			 "</td>" . 
							"</tr>" ;
				}    
		



							//glyphicon glyphicon-exclamation-sign
				
			

			else if ($row['kundnr'] == null ){

			$query = "SELECT * FROM gastlista WHERE gastID = {$row['gastID']} ";
			$stmt = $db ->prepare($query);
			$stmt->execute();
			$hitta = ($stmt->fetch(PDO::FETCH_ASSOC)); 
			$stmt->closeCursor(); 

			$nummer = $row["gastID"];


						$found .= "<tr>" . '<form method="post">'.
							"<td>" . "<a href='medlem_uppdatera.php?pid=". $row["gastID"] ."'>" . $row["gastID"]. "</a>" . 
							'<input type="hidden"'. 'name="getgastin"'. 'value="' .$row["gastID"]. '">'."</td>" . 
							"<td>" . $hitta['fnamn'] .  "</td>" . 
							"<td>" . $hitta['enamn'] . "</td>" . 
							"<td>"  . $hitta['telefon']. "</td>" . 
							"<td>"  . '<input type="submit"'.' name="avboka-gast-submit"'. ' class="btn btn-default btn-sm"'.'value="Avboka"' .'>'.
				  			 "</td>" . 
							"</tr>" ;	
		
			
				}

		}


	
	}

	catch (Exception $e) {
	      echo "Data could not be retrieved from the database";
	      echo $e;
	      exit;
	}




	 if(isset($_POST['avboka-submit'])){

    $kundnr = $_POST['getkundnrin'];

    
    try {
       $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

          if($query){
          echo '<center>' . '<h4>' . 'Du har avbokat kunden!' . '</h4>' . '</center>';

          echo "<meta http-equiv=\"refresh\" content=\"2;URL='stall_in_pass.php?passid=".$passid."'\" />";	
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }

    if(isset($_POST['avboka-gast-submit'])){

    $gast = $_POST['getgastin'];

    
    try {
       $query = ("DELETE from bokningar WHERE gastID = {$gast} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

          if($query){
          echo '<center>' . '<h4>' . 'Du har avbokat gästen!' . '</h4>' . '</center>';
          echo "<meta http-equiv=\"refresh\" content=\"2;URL='stall_in_pass.php?passid=".$passid."'\" />";	
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }




    if(isset($_POST['stall-in'])){

    $orsak = $_POST['orsak'];

    
    try {
       $query = ("UPDATE bokningsbara SET installt=:installt, installt_orsak=:orsak WHERE bokningsbarID= {$passid}");
				$results = $db -> prepare ($query);
				$results->execute(array(':installt' => 1,
										':orsak' => $orsak 
						));

			
			$results->closeCursor();


          if($query){
          echo '<center>' . '<h4>' . 'Du har ställt in passet!' . '</h4>' . '</center>';
          echo "<meta http-equiv=\"refresh\" content=\"2;URL='stall_in_pass.php?passid=".$passid."'\" />";	
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>' . $e;
    }
         

  }


    if(isset($_POST['andra_pass'])){

    $information = $_POST['information'];

    
    try {
       $query = ("UPDATE bokningsbara SET information=:info WHERE bokningsbarID= {$passid}");
				$results = $db -> prepare ($query);
				$results->execute(array(':info' => $information
						));

			
			$results->closeCursor();


          if($query){
          echo '<center>' . '<h4>' . 'Du har ändra passinformationen!' . '</h4>' . '</center>';
          echo "<meta http-equiv=\"refresh\" content=\"1;URL='stall_in_pass.php?passid=".$passid."'\" />";	
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>' . $e;
    }
         

  }






?>



