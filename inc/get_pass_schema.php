 <?php 
 $schemaID = $_SERVER['QUERY_STRING'] ;
 $url=strtok($_SERVER["REQUEST_URI"],'?');

if($url =='/atletica_backend_work/schema_uppdatera_original.php')
{
 $prevDayName = "";
 $slutDag = "";
 $schema = "";
 $dayNo = 0;
 $tommtSchema = 1;

 function SetDayName($veckoDag){
	$day = "";
	if ($veckoDag == 1) {
    $day = "Måndag";
	}
	if ($veckoDag == 2) {
	    $day = "Tisdag";
	}
	if ($veckoDag == 3) {
	    $day = "Onsdag";
	}
	if ($veckoDag == 4) {
	    $day = "Torsdag";
	}
	if ($veckoDag == 5) {
	    $day = "Fredag";
	}
	if ($veckoDag == 6) {
	    $day = "Lördag";
	}
	if ($veckoDag == 7) {
	    $day = "Söndag";
	}
	return $day;
}

$sql = 'SELECT distinct b.bokningsbarID, veckodag, Time(starttid) as tid, passnamn FROM bokningsbara as b , schemat as s 
	WHERE b.bokningsbarID = s.bokningsbarID 
	AND s.schematyp = :scID
	group by passnamn, veckodag
	order by b.veckodag asc;';

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
	if ($prevDayName == "") 
	{
		$tommtSchema = 0;
		$prevDayName = SetDayName($row['veckodag']);

		$schema = "<div class=\"grid_1a\"> \n
			<div class=\"list-group\"> \n
				<a href=\"#\" class=\"list-group-item active\">".SetDayName($row['veckodag'])."</a> \n";
	}
	if (SetDayName($row['veckodag']) == $prevDayName) 
	{
		$schema .= "<a href=\"schema_uppdatera_original_pass.php?passId=\"".$row['bokningsbarID']."\" class=\"list-group-item\"/>".$row['tid']." ".$row['passnamn']."</a>\n";		
	}
	else
	{
		#avluta förra dagen påbörja ny lista/dag och lägg till första passet
		$prevDayName = SetDayName($row['veckodag']);
		$slutDag = "<a href=\"schema_nytt_original_pass.php?dagid=\"".$row['veckodag']."\" class=\"list-group-item\">Lägg till nytt pass</a>
		</div>
			</div>";
		$schema .= $slutDag;
		$schema .= "<div class=\"grid_1a\"> \n
			<div class=\"list-group\"> \n
				<a href=\"#\" class=\"list-group-item active\">".SetDayName($row['veckodag'])."</a> \n";
		$schema .= "<a href=\"schema_uppdatera_original_pass.php?passId=\"".$row['bokningsbarID']."\" class=\"list-group-item\"/>".$row['tid']." ".$row['passnamn']."</a>\n";		
	}
	
}
if ($prevDayName == "Måndag") {
    $dayNo = 1;
	}
	if ($prevDayName == "Tisdag") {
	    $dayNo = 2;
	}
	if ($prevDayName == "Onsdag") {
	    $dayNo = 3;
	}
	if ($prevDayName == "Torsdag") {
	    $dayNo = 4;
	}
	if ($prevDayName == "Fredag") {
	    $dayNo = 5;
	}
	if ($prevDayName == "Lördag") {
	    $dayNo = 6;
	}
	if ($prevDayName == "Söndag") {
	    $dayNo = 7;
	}

	if ($tommtSchema == 1) {
		$prevDayName = "Måndag";
		$dayNo = 1;
	}

if($dayNo == 0 || $dayNo < 7)
{
do {
		$schema = $schema."<div class=\"grid_1a\">
			<div class=\"list-group\"> \n
				<a href=\"#\" class=\"list-group-item active\">".$prevDayName."</a>";
				
		$slutDag = '<a class="list-group-item"'. " ". 'href="schema_nytt_original_pass.php?dagid='.$dayNo.'">Lägg till nytt pass</a>
		</div>
	</div>';
				$schema = $schema.$slutDag;
				$dayNo = $dayNo + 1;
				$prevDayName = SetDayName($dayNo);

	} while ($dayNo <= 7);
}
if($dayNo == 7 && $tommtSchema == 0)
{
$schema .= $slutDag;
}
}
 ?>

 
 