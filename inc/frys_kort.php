<?php
 		$today = date("Y-m-d"); 
 		$kundnummer = $_GET['pid'];
	    $frystkort = 1;
	    $frysdatum = $today;



    try {
       $query = ("UPDATE medlemskort SET fryst=:fryst, frysdatum=:frysdatum WHERE kundnr={$kundnummer} AND aktivtkort=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':fryst'=>$frystkort,
                            ':frysdatum'=>$frysdatum

            ));
			   
if($query){
          echo '<center>' . '<h4>' . 'Du har fryst kortet!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }
	
?>