<?php 
try {
		$today= date('Y-m-d');

		$query = "SELECT * FROM bokningar WHERE incheckad=0 and passdatum < '{$today}' AND gastID IS NULL";  
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 
		$found="";

		$stmt->closeCursor(); 


		foreach ($result as $row) {
			$bokningsbarID = $row['bokningsbarID'];
			$kundnr = $row['kundnr'];

			$query = "SELECT * FROM bokningsbara WHERE bokningsbarID={$bokningsbarID}";  
			$stmt = $db ->prepare($query);
			$stmt->execute();
			$result = ($stmt->fetch(PDO::FETCH_ASSOC)); 
			$found="";
			$stmt->closeCursor(); 


			$passnamn=$result['passnamn'];
			$starttid=$result['starttid'];
			$passdatum=date('Y-m-d', strtotime($result['datum']));

			$query = ("INSERT INTO skulder (bokningsbarID, kundnr, ej_incheckad, datum, passnamn, starttid) VALUES (:bokningsbarID, :kundnr, :ej_incheckad, :datum, :passnamn, :starttid)");
		    $q = $db -> prepare($query);
		    $q-> execute(array(':bokningsbarID'=>$bokningsbarID,
		    					':kundnr'=>$kundnr,
		    					':ej_incheckad'=>1,
		    					':datum'=>$passdatum,
		    					':passnamn'=>$passnamn,
		    					':starttid'=>$starttid));



		  $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$bokningsbarID}");
          $q = $db -> prepare($query);
          $q-> execute();

		
		}
	}




catch (Exception $e) { 
			 echo $e;
			 exit;
			 }



?>