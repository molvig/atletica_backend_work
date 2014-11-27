<?php
$pass="";
$veckodag="";
$veckdag="";
$datum="";
$dagspass="";

$today = date('Y-m-d');
/*$onedays = date('Y-m-d', strtotime($today . ' + 1 day'));
$towdays = date('Y-m-d', strtotime($today . ' + 2 day'));
$threedays = date('Y-m-d', strtotime($today . ' + 3 day'));
$fourdays = date('Y-m-d', strtotime($today . ' + 4 day'));
$fivedays = date('Y-m-d', strtotime($today . ' + 5 day')); */
$sixdays = date('Y-m-d', strtotime($today . ' + 6 day'));




try {
	$sql ="SELECT * FROM bokningsbara WHERE datum >= '2014-09-01' AND datum <= '2014-09-07' ORDER BY datum ASC, TIME_FORMAT(starttid, '%H:%i')";
	$results = $db -> prepare ($sql);
	$results->execute();
	} 

catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetchAll(PDO::FETCH_ASSOC));
$results->closeCursor();

foreach ($sc as $row) {

	$datum = date('d/m', strtotime($row['datum']));
	$veckdag = $row['veckodag'];

	if($veckdag==1){$veckodag="Måndag";}
	else if($veckdag==2){$veckodag="Tisdag";}
	else if($veckdag==3){$veckodag="Onsdag";}
	else if($veckdag==4){$veckodag="Torsdag";}
	else if($veckdag==5){$veckodag="Fredag";}
	else if($veckdag==6){$veckodag="Lördag";}
	else if($veckdag==7){$veckodag="Söndag";}

	//$pass .= date('Y-m-d', strtotime($row['datum'])) ." ". date('H:i', strtotime($row['starttid'])). " ". $row['passnamn'] . "<br>";


$dagspass = '<a href="#"' . 'class="list-group-item">' . '<span class="badge pull-right">15/20</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. '</a>';

	$pass .='<div class="panel panel-default">'.
 				'<div class="panel-heading">'.
   					'<h3 class="panel-title">'. $veckodag. " ". $datum. '</h3>'.
  				'</div>
	  			<div class="panel-body">'.
					'<div class="list-group">' .

				$dagspass. 

					'</div>'.
				'</div>'.
			'</div>';
			
}








?>