<?php

try {

$today = date('Y-m-d');
$timenow = date('H:i:s');
$twohours = date('Y-m-d H:i:s',strtotime($timenow. '2 hours'));
			
$query = "SELECT * FROM bokningar, bokningsbara WHERE bokningsbara.datum='{$today}' AND bokningar.reservplats=1 ";  
$stmt = $db ->prepare($query);
$stmt->execute();
$res = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 


	foreach ($res as $r) {
		$kundnr = $r['kundnr'];
		$passid = $r['bokningsbarID'];
		$starttid = date('H:i:s', strtotime($r['starttid']));
		$reservtid = date('H:i:s',strtotime($starttid. '-105 minutes'));
		
		if ($reservtid < $timenow){

	          $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid} AND reservplats=1");
	          $q = $db -> prepare($query);
	          $q-> execute();

		}
	

	}



}
catch(Exception $e)
{

	echo $e;
	exit;
}

?>