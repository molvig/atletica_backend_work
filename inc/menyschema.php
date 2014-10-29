<div class="list-group">
	  <a class="list-group-item active">
	    Schema
	<?php
	 $start ="";


	 try {
			$results = $db -> query ("SELECT schematyp, startdatum, schemanamn FROM schematyp");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$schema = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$sch ="";
          foreach($schema as $s){

          		$startdate = $s['startdatum'];
          		$starten = date('d-m-Y', strtotime($startdate));

				 $sch .= '<a class="list-group-item"'. ' '. 'href="schema.php?schemaid='.$s['schematyp'] . '&date='. $starten .'">'. $s['schemanamn'] .'</a>';

				}
				echo $sch;
?>
	</div>


