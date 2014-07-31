	<?php try {
			$results = $db -> query ("SELECT kundnr, fnamn, enamn FROM medlemmar WHERE kundnr < 10 AND kundnr > 0");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}


	$member = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$kund = "";

	foreach ($member as $m) {
		$kund .= "<tr class='alert alert-success'>" . "<td>" . $m['fnamn'] . "</td>" ;
		$kund .= "<td>" . $m['enamn'] . "</td>" ;
		$kund .= "<td>" . $m['kundnr'] . "</td>";
		$kund .= "<td>" . "<button type='submit' class='btn btn-default btn-sm'>" . "<span class='glyphicon glyphicon-remove'></span>" . "</button>" . "</td>";
		$kund .= "<td>" . "<button type='submit' class='btn btn-default btn-sm'>" . "<span class='glyphicon glyphicon-trash'></span>" . "</button>" . "</td>" . "</tr>" ;
	}    





	
