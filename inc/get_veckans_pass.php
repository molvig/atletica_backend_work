<?php

$pass="";
$veckodag="";
$veckdag="";
$datum="";
$dagspass="";
$dagspass1="";
$dagspass2="";
$dagspass3="";
$dagspass4="";
$dagspass5="";
$dagspass6="";




$today = date('Y-m-d');
if (date('N', strtotime($today))==1) {$veckodag="Måndag";}
else if (date('N', strtotime($today))==2) {$veckodag="Tisdag";}
else if (date('N', strtotime($today))==3) {$veckodag="Onsdag";}
else if (date('N', strtotime($today))==4) {$veckodag="Torsdag";}
else if (date('N', strtotime($today))==5) {$veckodag="Fredag";}
else if (date('N', strtotime($today))==6) {$veckodag="Lördag";}
else if (date('N', strtotime($today))==7) {$veckodag="Söndag";}

$oneday = date('Y-m-d', strtotime($today . ' + 1 day'));
if (date('N', strtotime($oneday))==1) {$veckodag1="Måndag";}
else if (date('N', strtotime($oneday))==2) {$veckodag1="Tisdag";}
else if (date('N', strtotime($oneday))==3) {$veckodag1="Onsdag";}
else if (date('N', strtotime($oneday))==4) {$veckodag1="Torsdag";}
else if (date('N', strtotime($oneday))==5) {$veckodag1="Fredag";}
else if (date('N', strtotime($oneday))==6) {$veckodag1="Lördag";}
else if (date('N', strtotime($oneday))==7) {$veckodag1="Söndag";}

$twoday = date('Y-m-d', strtotime($today . ' + 2 day'));
if (date('N', strtotime($twoday))==1) {$veckodag2="Måndag";}
else if (date('N', strtotime($twoday))==2) {$veckodag2="Tisdag";}
else if (date('N', strtotime($twoday))==3) {$veckodag2="Onsdag";}
else if (date('N', strtotime($twoday))==4) {$veckodag2="Torsdag";}
else if (date('N', strtotime($twoday))==5) {$veckodag2="Fredag";}
else if (date('N', strtotime($twoday))==6) {$veckodag2="Lördag";}
else if (date('N', strtotime($twoday))==7) {$veckodag2="Söndag";}

$threeday = date('Y-m-d', strtotime($today . ' + 3 day'));
if (date('N', strtotime($threeday))==1) {$veckodag3="Måndag";}
else if (date('N', strtotime($threeday))==2) {$veckodag3="Tisdag";}
else if (date('N', strtotime($threeday))==3) {$veckodag3="Onsdag";}
else if (date('N', strtotime($threeday))==4) {$veckodag3="Torsdag";}
else if (date('N', strtotime($threeday))==5) {$veckodag3="Fredag";}
else if (date('N', strtotime($threeday))==6) {$veckodag3="Lördag";}
else if (date('N', strtotime($threeday))==7) {$veckodag3="Söndag";}

$fourday = date('Y-m-d', strtotime($today . ' + 4 day'));
if (date('N', strtotime($fourday))==1) {$veckodag4="Måndag";}
else if (date('N', strtotime($fourday))==2) {$veckodag4="Tisdag";}
else if (date('N', strtotime($fourday))==3) {$veckodag4="Onsdag";}
else if (date('N', strtotime($fourday))==4) {$veckodag4="Torsdag";}
else if (date('N', strtotime($fourday))==5) {$veckodag4="Fredag";}
else if (date('N', strtotime($fourday))==6) {$veckodag4="Lördag";}
else if (date('N', strtotime($fourday))==7) {$veckodag4="Söndag";}

$fiveday = date('Y-m-d', strtotime($today . ' + 5 day'));
if (date('N', strtotime($fiveday))==1) {$veckodag5="Måndag";}
else if (date('N', strtotime($fiveday))==2) {$veckodag5="Tisdag";}
else if (date('N', strtotime($fiveday))==3) {$veckodag5="Onsdag";}
else if (date('N', strtotime($fiveday))==4) {$veckodag5="Torsdag";}
else if (date('N', strtotime($fiveday))==5) {$veckodag5="Fredag";}
else if (date('N', strtotime($fiveday))==6) {$veckodag5="Lördag";}
else if (date('N', strtotime($fiveday))==7) {$veckodag5="Söndag";}

$sixday = date('Y-m-d', strtotime($today . ' + 6 day'));
if (date('N', strtotime($sixday))==1) {$veckodag6="Måndag";}
else if (date('N', strtotime($sixday))==2) {$veckodag6="Tisdag";}
else if (date('N', strtotime($sixday))==3) {$veckodag6="Onsdag";}
else if (date('N', strtotime($sixday))==4) {$veckodag6="Torsdag";}
else if (date('N', strtotime($sixday))==5) {$veckodag6="Fredag";}
else if (date('N', strtotime($sixday))==6) {$veckodag6="Lördag";}
else if (date('N', strtotime($sixday))==7) {$veckodag6="Söndag";}





try {
	$sql ="SELECT * FROM bokningsbara WHERE datum >= '{$today}' AND datum <= '{$sixday}' ORDER BY datum ASC, TIME_FORMAT(starttid, '%H:%i')";
	//$sql ="SELECT * FROM bokningsbara WHERE datum >= '2014-09-01' AND datum <= '2014-09-07' ORDER BY datum ASC, TIME_FORMAT(starttid, '%H:%i')";
	$results = $db -> prepare ($sql);
	$results->execute();
	} 

catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetchAll(PDO::FETCH_ASSOC));
$results->closeCursor();


//$datum = date('d/m', strtotime($row['datum']));

	foreach ($sc as $row) 
{	




try {
	$sql ="SELECT * FROM bokningar, bokningsbara WHERE bokningar.bokningsbarID =  bokningsbara.bokningsbarID AND bokningar.bokningsbarID = {$row['bokningsbarID']} AND reservplats=0";
  $stmt = $db ->prepare($sql);
  $stmt->execute();

  $antal = $stmt->rowCount(); 
	} 

catch (Exception $e) {
	echo $e;
}






$antalplatser = $row['antalplatser'];
if($row['installt']==1){$install="<strong style='color:red;'>". " INSTÄLLT!". "</strong>";}
else {$install="";}

	if (date('Y-m-d', strtotime($row['datum'])) == $today)
	{	

		if 	($antal<$antalplatser){
			$dagspass .= '<a href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install. '</a>';
			}

		else if ($antal>=$antalplatser){
			$dagspass .= '<a style="background-color:#FFCCCC;"' . 'href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install.'</a>';
			}
		}


	if (date('Y-m-d', strtotime($row['datum'])) == $oneday)
	{		
		
		if 	($antal<$antalplatser){
			$dagspass1 .= '<a href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install.'</a>';
			}

		else if ($antal>=$antalplatser){
			$dagspass1 .= '<a style="background-color:#FFCCCC;"' . 'href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install.'</a>';
			}
	}

	if (date('Y-m-d', strtotime($row['datum'])) == $twoday)
	{		

			
		if 	($antal<$antalplatser){
			$dagspass2 .= '<a href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn'].$install. '</a>';
			}

		else if ($antal>=$antalplatser){
			$dagspass2 .= '<a style="background-color:#FFCCCC;"' . 'href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn'].$install. '</a>';
			}
	
	}
	if (date('Y-m-d', strtotime($row['datum'])) == $threeday)
	{		
		if 	($antal<$antalplatser){
		$dagspass3 .= '<a href="index.php?passid='. $row['bokningsbarID'].'"'. 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn'].$install. '</a>';
		}

		else if ($antal>=$antalplatser){
		$dagspass3 .= '<a style="background-color:#FFCCCC;"' . 'href="index.php?passid='. $row['bokningsbarID'].'"'. 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn'].$install. '</a>';
		}	

	}
	if (date('Y-m-d', strtotime($row['datum'])) == $fourday)
	{		
		if 	($antal<$antalplatser){
		$dagspass4 .= '<a href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install.'</a>';
		}

		else if ($antal>=$antalplatser){
		$dagspass4 .= '<a style="background-color:#FFCCCC;"' . 'href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn'].$install. '</a>';
		}	
	}
	if (date('Y-m-d', strtotime($row['datum'])) == $fiveday)
	{		
		if 	($antal<$antalplatser){
		$dagspass5 .= '<a href="index.php?passid='. $row['bokningsbarID'].'"'. 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn'].$install. '</a>';
		}

		else if ($antal>=$antalplatser){
		$dagspass5 .= '<a style="background-color:#FFCCCC;"' . 'href="index.php?passid='. $row['bokningsbarID'].'"'. 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install.'</a>';	
		}
	}
	if (date('Y-m-d', strtotime($row['datum'])) == $sixday)
	{		
		if 	($antal<$antalplatser){
		$dagspass6 .= '<a href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install.'</a>';
		}

		else if ($antal>=$antalplatser){
		$dagspass6 .= '<a style="background-color:#FFCCCC;"' . 'href="index.php?passid='. $row['bokningsbarID'].'"' . 'class="list-group-item">' . '<span class="badge pull-right">'. $antal. '/'. $antalplatser .'</span>'. date('H:i', strtotime($row['starttid'])) ." ". $row['passnamn']. $install.'</a>';
		}

	}


}



?>