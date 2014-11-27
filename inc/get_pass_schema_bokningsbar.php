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

$monuppdate ="";
$tisuppdate ="";
$onsuppdate ="";
$torsuppdate ="";
$freuppdate ="";
$loruppdate ="";
$sonuppdate ="";




$sql = 'SELECT distinct b.bokningsbarID, datum, TIME_FORMAT(starttid, "%H:%i") as tid, passnamn, extrapass, uppdaterad FROM bokningsbara as b , schemat as s 
	WHERE b.bokningsbarID = s.bokningsbarID 
	AND s.schematyp = :scID
	order by starttid asc';

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
		$monextrapass = $row['extrapass'];
		$monuppdate = $row['uppdaterad'];
		
		if ($monextrapass == 1){
		$mon .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else if ($monuppdate == 1){
		$mon .=  '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:red; font-size:18px;" class="glyphicon glyphicon-flag"></span>' .' '. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else{
		$mon .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $tisdag) {
		$tisextrapass = $row['extrapass'];
		$tisuppdate = $row['uppdaterad'];
		
		if ($tisextrapass == 1){
		$tue .= '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else if ($tisuppdate == 1){
		$tue .=  '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:red; font-size:18px;" class="glyphicon glyphicon-flag"></span>' .' '. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else{
		$tue .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}

	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $onsdag) {
		$onsextrapass = $row['extrapass'];
		$onsuppdate = $row['uppdaterad'];
		
		if ($onsextrapass == 1){
		$wed .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else if ($onsuppdate == 1){
		$wed .=  '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:red; font-size:18px;" class="glyphicon glyphicon-flag"></span>' .' '. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else{
		$wed .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $torsdag) {
		$torsextrapass = $row['extrapass'];
		$torsuppdate = $row['uppdaterad'];
		
		if ($torsextrapass == 1){
		$thu .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else if ($torsuppdate == 1){
		$thu .=  '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:red; font-size:18px;" class="glyphicon glyphicon-flag"></span>' .' '. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else{
		$thu .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $fredag) {
		$freextrapass = $row['extrapass'];
		$freuppdate = $row['uppdaterad'];
		
		if ($freextrapass == 1){
		$fri .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else if ($freuppdate == 1){
		$fri .=  '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:red; font-size:18px;" class="glyphicon glyphicon-flag"></span>' .' '. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else{
		$fri .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $lordag) {
		$lorextrapass = $row['extrapass'];
		$loruppdate = $row['uppdaterad'];
		
		if ($lorextrapass == 1){
		$sat .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else if ($loruppdate == 1){
		$sat .=  '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:red; font-size:18px;" class="glyphicon glyphicon-flag"></span>' .' '. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else{
		$sat .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}
	else if (date('d-m-Y', strtotime($row['datum'])) == $sondag) {
		$sonextrapass = $row['extrapass'];
		$sonuppdate = $row['uppdaterad'];
		
		if ($sonextrapass == 1){
		$sun .=  '<a style="background-color:#DF007B; color:white" class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:#FFF; font-size:18px;" class="glyphicon glyphicon-star-empty"></span>'.' '. $row['tid'].' '.$row['passnamn'] . '</a>';
		}
		else if ($sonuppdate == 1){
		$sun .=  '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. '<span style="color:red; font-size:18px;" class="glyphicon glyphicon-flag"></span>' .' '. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
		else{
		$sun .= '<a class="list-group-item"'. ' '. 'href="schema_uppdatera_pass.php?passid='.$row['bokningsbarID'].'">'. $row['tid'].' '.$row['passnamn'] .'</a>';
		}
	}	

}

 ?>

 
 