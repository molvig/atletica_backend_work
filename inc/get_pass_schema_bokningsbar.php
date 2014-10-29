 <?php 
 $schemaID = $_SERVER['QUERY_STRING'] ;
 $url=strtok($_SERVER["REQUEST_URI"],'?');


 $mon = "";
 $tue = "";
 $wed = "";
 $thu = "";
 $fri = "";
 $sat = "";
 $sun = "";
 

$sql = 'SELECT distinct b.bokningsbarID, datum, Time(starttid) as tid, passnamn FROM bokningsbara as b , schemat as s 
	WHERE b.bokningsbarID = s.bokningsbarID 
	AND s.schematyp = :scID
	order by starttid asc;';

try {
	$results = $db -> prepare ($sql);
	$results->execute(array(':scID' => $_GET["schemaid"]));

} catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetchAll(PDO::FETCH_ASSOC));
$results->closeCursor();


foreach ($sc as $row) 
{	
	if (date('d-m-Y', strtotime($row['datum'])) == $mandag)
	{
		$mon .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $tisdag) {
		$tue .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';	
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $onsdag) {
		$wed .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $torsdag) {
		$thu .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $fredag) {
		$fri .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $lordag) {
		$sat .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $sondag) {
		$sun .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}	
	
}

 ?>

 
 