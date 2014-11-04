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
 $monextrapass ="";
 $tisextrapass ="";
 $onsextrapass ="";
 $torsextrapass ="";
$freextrapass ="";
$lorextrapass ="";
$sonextrapass ="";
 

$sql = 'SELECT distinct b.bokningsbarID, datum, Time(starttid) as tid, passnamn, extrapass FROM bokningsbara as b , schemat as s 
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


/*style="background-color:pink"
		if ($extrapass == 1)
		
		$mon .= '<a style="background-color:pink class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else {
			*/



foreach ($sc as $row) 
{	
 
	if (date('d-m-Y', strtotime($row['datum'])) == $mandag)
	{		
		$monextrapass .= $row['extrapass'];
		
		if ($monextrapass == 1){
		$mon .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else{
		$mon .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $tisdag) {
		$tisextrapass .= $row['extrapass'];
		
		if ($tisextrapass == 1){
		$tue .= '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else{
		$tue .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}

	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $onsdag) {
		$onsextrapass .= $row['extrapass'];
		
		if ($onsextrapass == 1){
		$wed .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else{
		$wed .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $torsdag) {
		$torsextrapass .= $row['extrapass'];
		
		if ($torsextrapass == 1){
		$thu .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else{
		$thu .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $fredag) {
		$freextrapass .= $row['extrapass'];
		
		if ($freextrapass == 1){
		$fri .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else{
		$fri .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $lordag) {
		$lorextrapass .= $row['extrapass'];
		
		if ($lorextrapass == 1){
		$sat .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else{
		$sat .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	elseif (date('d-m-Y', strtotime($row['datum'])) == $sondag) {
		$sonextrapass .= $row['extrapass'];
		
		if ($sonextrapass == 1){
		$sun .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else{
		$sun .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}	
	
}

 ?>

 
 