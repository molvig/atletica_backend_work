<?php

if(isset($_GET["passid"])){
$passnamn ="";
 $passid = htmlspecialchars($_GET["passid"]);

try {
	$sql ="SELECT * FROM bokningsbara WHERE bokningsbarID = {$passid}";
	$results = $db -> prepare ($sql);
	$results->execute();
	} 

catch (Exception $e) {
	echo $e;
}


$sc = ($results -> fetch(PDO::FETCH_ASSOC));
$results->closeCursor();

$passnamn = $sc['passnamn'];
$install = $sc['installt'];
$orsaken = $sc['installt_orsak'];
$installt="";
if ($install==1){$installt = "<div class='installt'>" . "<h1>". "INSTÄLLT" . "</h1>"."<p> Orsak: " . $orsaken. "</p>". "</div>" ;}
$starttid = date('H:i', strtotime($sc['starttid']));
$sluttid = date('H:i', strtotime($sc['sluttid']));
$inst = $sc['instnamn'];
$antalplatserna = $sc['antalplatser'];
$infot = $sc['information'];
if ($infot!=null){ $info= "Information: " . $sc['information'];}
else {$info="";}
$passdatum = date('Y-m-d', strtotime($sc['datum']));
}

?>