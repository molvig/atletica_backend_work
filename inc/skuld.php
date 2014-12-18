   <?php

	try {
		$query = "SELECT * FROM skulder order by datum, kundnr desc";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 

		$found="";


		foreach ($result as $row) {
		$kundnr = $row['kundnr'];
		$passID = $row['bokningsbarID'];


		$query = "SELECT * FROM medlemmar WHERE kundnr={$kundnr}";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$hitta = ($stmt->fetch(PDO::FETCH_ASSOC)); 

	if ($row['sen_avbokning']==1)
	 	{$orsak="Sen avbokning";}
	else if ($row['ej_incheckad']==1)
	 	{$orsak="Ej incheckad";}
	 	$starten = date("H:i", strtotime($row['starttid']));

			$found .= "<tr>" . '<form method="post">'.
			"<td>"  . $row['datum']. "</td>" .
			"<td>"  . $starten. "</td>" . 
			"<td>"  . $row['passnamn'].'<input type="hidden"'. 'name="passid"'. 'value="' .$passID. '">' ."</td>" . 

			"<td>"  . $orsak. "</td>" . 
			"<td>" . "<a href='medlem_uppdatera.php?pid=". $hitta['kundnr'] ."'>" .$hitta['kundnr']. "</a>" . 
			'<input type="hidden"'. 'name="kundnr-skuld"'. 'value="' .$hitta['kundnr']. '">'."</td>" . 
			"<td>" . $hitta['fnamn'] .  "</td>" . 
			"<td>" . $hitta['enamn'] . "</td>" . 

			"<td>"  . '<input type="submit"'.' name="skuld-submit"'. ' class="btn btn-default btn-sm"'.'value="Ta bort skuld"' .'>'.
			"</td>" . '</form>'.
			"</tr>" ;

				} 	
		

	}  

    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }



 if(isset($_POST['skuld-submit'])){
	$kund = $_POST['kundnr-skuld'];
	$passID = $_POST['passid'];
 	try{
 		
          $query = ("DELETE FROM skulder WHERE kundnr = {$kund} AND bokningsbarID= {$passID}");
          $q = $db -> prepare($query);
          $q-> execute();
        
          if ($query){
          	echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='medlem_skuldlista.php'\" />"; 

          }


        }

     catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Det gick inte att ta bort skulden' . '</h4>' . '</center>';
      echo $e;
    }


 }




