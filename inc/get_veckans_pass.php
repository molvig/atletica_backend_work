<?php
$pass="";
$today = date('Y-m-d');
$sixdays = date('Y-m-d', strtotime($today . ' + 6 day'));




try {
	$sql ="SELECT * FROM bokningsbara WHERE datum >= '{$today}' AND datum <= '{$sixdays}' ORDER BY datum ASC ";
	$results = $db -> prepare ($sql);
	$results->execute();
	} 

catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetchAll(PDO::FETCH_ASSOC));
$results->closeCursor();

foreach ($sc as $row) {

	$pass .= '<a href="#"' . 'class="list-group-item">' . '<span class="badge pull-right">bokade/antal platser</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. '</a>';
}



?>
