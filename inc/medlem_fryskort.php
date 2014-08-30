

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
	 $frysdatum="";
	 $aktivtkortID="";
	 $status="";
	 $kortstatus="";

	 


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
			$query = ("SELECT kortID, kort, giltigtfran, giltigttill, fryst, frysdatum FROM medlemskort WHERE kundnr ={$kundnr} AND aktivtkort=1"); 
			$stmt = $db ->prepare($query);
			$stmt->execute();


			$kort= $stmt->fetchAll(PDO::FETCH_ASSOC); 


      foreach($kort as $k){

			$aktivtkortID .= $k['kortID'];
			$kortet .= $k['kort'];
			$giltigtfran .= $k['giltigtfran'];
			$giltigttill .= $k['giltigttill'];
			$fryst .= $k['fryst'];
			$frysdatum .= date('Y-m-d', strtotime($k['frysdatum']));
			
         }

         $stmt->closeCursor(); 
		} 


	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			echo $e;
			exit;
		}

			$today = date("Y-m-d");  
			$daysleft = (strtotime("$giltigttill 00:00:00 GMT")-strtotime("$today 00:00:00 GMT")) / 86400;
			
			$aktuellafrysdagar = (strtotime("$today 00:00:00 GMT")-strtotime("$frysdatum 00:00:00 GMT")) / 86400 ;
			


	
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
if (isset($_POST['fryskort'])) {
    $today = date("Y-m-d"); 
    $kundnummer = $_POST['kundnr'];
    $frystkort = 1;
    $frysdatum = $today;
    try {
       $query = ("UPDATE medlemskort SET fryst=:fryst, frysdatum=:frysdatum WHERE kundnr={$kundnummer} AND aktivtkort=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':fryst'=>$frystkort,
                            ':frysdatum'=>$frysdatum

            ));
         
if($query){
          echo '<center>' . '<h4>' . 'Kortet är nu fryst för' . '</h4>' . '</center>';
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }

echo ' <script> window.loaction.reload(); </script>';

}

if (isset($_POST['tinakort'])) {
    $today = date("Y-m-d"); 
    $kundnummer = $_POST['kundnr'];
    $frysdatum = $_POST['frysdatum'];
    $nyttfrysdatum = null;
    $frystkort = 0;
    $frysdagar = (strtotime("$today 00:00:00 GMT")-strtotime("$frysdatum 00:00:00 GMT")) / 86400 ;
    $giltigtill_frys = date('Y-m-d', strtotime($giltigttill.' +'. $frysdagar . 'days')); 


    try {
       $query = ("UPDATE medlemskort SET fryst=:fryst, frysdatum=:nyttfrysdatum, giltigttill=:giltigttill WHERE kundnr={$kundnummer} AND aktivtkort=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':fryst'=>$frystkort,
                            ':nyttfrysdatum'=>$nyttfrysdatum,
                            ':giltigttill'=>$giltigtill_frys

            ));
         
if($query){
          echo '<center>' . '<h4>' . 'Kortet är nu tinat för' . '</h4>' . '</center>';
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }
  }

?>
