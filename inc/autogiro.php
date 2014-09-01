

    <?php  


     $id_medlem = $_GET['pid'];
	 $kundnr ="";
	 $personnr ="";
	 $fnamn ="";
	 $enamn ="";
	 $kortdatum="";
	 $kortID="";
	 $kortet="";
	 $korttyp="";
	 $giltigtfran="";
	 $giltigttill="";
	 $korttypen="";
	 $fryst="";
	 $ag_aktivt="";
	 $bindningsdatum="";
	 $aktivtkortID="";
	 $status="";
	 $kortstatus="";
	 $tomorrow="";
	 $sista_dragning ="";

	 


	 try {
			$query = ("SELECT kundnr, personnr, fnamn, enamn FROM medlemmar WHERE kundnr ={$id_medlem}");
			$stmt = $db ->prepare($query);
			$stmt->execute();

		} 


	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
		}

	$member = $stmt->fetchAll(PDO::FETCH_ASSOC); 

 	foreach($member as $m){

		 $kundnr .= $m['kundnr'];
		 $personnr .= $m['personnr'];
		 $fnamn .= $m['fnamn'];
		 $enamn .= $m['enamn'];
     }

	$stmt->closeCursor(); 	



	 try {
	 		$today = date("Y-m-d"); 
			$query = ("SELECT kortID, kort, giltigtfran, giltigttill, fryst, bindningsdatum, ag_aktivt FROM medlemskort WHERE kundnr ={$kundnr} AND aktivtkort=1"); 
			$stmt = $db ->prepare($query);
			$stmt->execute();


			$kort= $stmt->fetchAll(PDO::FETCH_ASSOC); 


      foreach($kort as $k){

			$aktivtkortID .= $k['kortID'];
			$kortet .= $k['kort'];
			$giltigtfran .= $k['giltigtfran'];
			$giltigttill .= $k['giltigttill'];
			$fryst .= $k['fryst'];
			$ag_aktivt .= $k['ag_aktivt'];
			$bindningsdatum .= $k['bindningsdatum'];
			
         }

         $stmt->closeCursor(); 
		} 


	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
		}


			$bindningsdag = date('d', strtotime($bindningsdatum));
			$bindningsmanad = date('m', strtotime($bindningsdatum));
			$bindningsyear = date('Y', strtotime($bindningsdatum));

			$today = date("Y-m-d");  
			$daysleft = (strtotime("$giltigttill 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400;
			$uppsagningstid = (strtotime("$bindningsdatum 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400;




   		if (isset($_POST['undantag'])) {
	   		
				if (date("d") < 28 ){
					$sista_dragning = date('Y-m-d', mktime(0, 0, 0, date("m")+1, 28, date("Y")));
					$giltigttill = date('Y-m-d', mktime(0, 0, 0, date("m")+2, 1-1, date("Y"))); 
				}
				else if (date("d") >= 28 ){
					$sista_dragning = date('Y-m-d', mktime(0, 0, 0, date("m")+2 , 28, date("Y"))); 
					$giltigttill = date('Y-m-d', mktime(0, 0, 0, date("m")+3, 1-1, date("Y"))); 
				}

   		}

	   	else {			

	   		if ($bindningsdatum < $today){
			$sista_dragning = date('Y-m-d', mktime(0, 0, 0, date("m")+2  , 28, date("Y"))); 
			$giltigttill = date('Y-m-d', mktime(0, 0, 0, date("m")+3, 1-1, date("Y")));
			$status = "Bindningstiden har gått ut";
			} 

			else if ($uppsagningstid < 30){
			$sista_dragning = date('Y-m-d', mktime(0, 0, 0, date("m")+1  , 28, date("Y"))); 
			$giltigttill = date('Y-m-d', mktime(0, 0, 0, date("m")+2, 1-1, date("Y")));
			$status = "Det är mindre än 30 dagar kvar av bindnigstiden";
			}

			else if ($uppsagningstid > 30){

				if ($bindningsdag < 28 ){
					$sista_dragning = date('Y-m-d', mktime(0, 0, 0, $bindningsmanad-1  , 28, $bindningsyear)); 
				}
				else if ($bindningsdag >= 28 ){
					$sista_dragning = date('Y-m-d', mktime(0, 0, 0, $bindningsmanad  , 28, $bindningsyear)); 
				}

			$giltigttill = $giltigttill;
			$status = "Det är mer än 30 dagar kvar av bindnigstiden";
			}
		}




	
		try {
	 		$query = ("SELECT korttyp FROM korttyp WHERE kort = '{$kortet}'");
			$stmt = $db ->prepare($query);
			$stmt->execute();

			while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$korttypen = ($rows['korttyp']);
			}
			$stmt->closeCursor(); 


	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
	}



?>
<?php

// check if the form was submitted
if (isset($_POST['autogiro'])) {
    $today = date("Y-m-d"); 
    $kundnummer = $_POST['kundnr'];
    $bindningsdatum= null;
    $uppsagnings_datum = $today;
    $ag_aktivt = 0;
    try {
       $query = ("UPDATE medlemskort SET giltigttill=:giltigttill, bindningsdatum=:bindningsdatum, sista_dragning=:sista_dragning, ag_aktivt=:ag_aktivt, uppsagnings_datum=:uppsagnings_datum WHERE kundnr={$kundnummer} AND aktivtkort=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':giltigttill'=>$giltigttill,
          					':bindningsdatum' =>$bindningsdatum,
          					':sista_dragning'=>$sista_dragning,
          					':ag_aktivt'=> $ag_aktivt,
          					':uppsagnings_datum' =>$uppsagnings_datum 

                            

            ));
         
if($query){
          echo '<center>' . '<h4>' . 'Autogirot är uppsagt' . '</h4>' . '</center>';
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }

echo ' <script> window.loaction.reload(); </script>';

}



?>
