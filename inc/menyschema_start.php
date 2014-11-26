	<?php
	 $start ="";


	 try {
			$results = $db -> query ("SELECT schematyp, startdatum, schemanamn, schemabild FROM schematyp");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$schema = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$sch ="";
          foreach($schema as $s){

          		$startdate = $s['startdatum'];
          		$schemabild = $s['schemabild'];
          		$starten = date('d-m-Y', strtotime($startdate));

				 $sch .= '<div class="grid_3">'. '<div class="thumbnail">' . "<img src='". $schemabild  . "'". 'height="80" width="80">'. '<div class="caption">' ."<center>". '<h3>' . $s['schemanamn']."schema". '</h3>' . '<p><a href="schema.php?schemaid='.$s['schematyp'] . '&date='. $starten .'"'. 'class="btn btn-default"'. 'role="button">Ändra i schema</a></p>'."</center>".'</div>'.'</div>'.'</div>';

				}
				echo '<div class="grid_12">'. $sch . "</div>";
?>






        
          
          
           
      