 <?php 
 $schemaID = $_SERVER['QUERY_STRING'] ;
 $url=strtok($_SERVER["REQUEST_URI"],'?');

if($url =='/atletica_backend_work/schema_uppdatera_original.php')
{
 $mon = "";
 $tue = "";
 $wed = "";
 $thu = "";
 $fri = "";
 $sat = "";
 $sun = "";
 

$sql = "SELECT distinct b.bokningsbarID, veckodag, TIME_FORMAT(starttid, '%H:%i') as tid, passnamn FROM bokningsbara as b , schemat as s 
	WHERE b.bokningsbarID = s.bokningsbarID 
	AND s.schematyp = :scID
	AND b.extrapass = 0
	and b.datum > (CURDATE() + INTERVAL 6 DAY)
	group by passnamn, veckodag
	order by b.veckodag, tid asc;";

try {
	$results = $db -> prepare ($sql);
	$results->execute(array(':scID' => $_GET["schemaid"]));

} catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetchAll(PDO::FETCH_ASSOC));
$results->closeCursor();
$tid = "";
foreach ($sc as $row) 
{	

	if ($row['veckodag'] == 1)
	{
		$mon .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	else if ($row['veckodag'] == 2) {
		$tue .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';	
	}
	elseif ($row['veckodag'] == 3) {
		$wed .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif ($row['veckodag'] == 4) {
		$thu .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif ($row['veckodag'] == 5) {
		$fri .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif ($row['veckodag'] == 6) {
		$sat .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}
	elseif ($row['veckodag'] == 7) {
		$sun .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_original_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
	}	
	
}
}
 ?>

 
 