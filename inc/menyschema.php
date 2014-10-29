<div class="list-group">
	  <a class="list-group-item active">
	    Schema
	  </a>
	  <a href="schema.php?schemaid=1&date=<?=$start;?>" class="list-group-item" id="1">Vår</a>
	  <a href="schema.php?schemaid=2&date=<?=$start;?>" class="list-group-item" id="2">Sommar</a>
	  <a href="schema.php?schemaid=3&date=<?=$start;?>" class="list-group-item" id="3">Höst</a>
	  <a href="schema.php?schemaid=4&date=<?=$start;?>" class="list-group-item" id="4">Vinter</a>
	</div>


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

				 $sch .= '<a class="list-group-item"'. ' '. 'href="schema.php?schemaid='.$s['schematyp'] . '&date='. $s['startdatum'] .'">'. $s['schemanamn'] .'</a>';

				}
				echo $sch;
				//$start = $_GET["date"];

?>