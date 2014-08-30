<?php
 		$today = date("Y-m-d"); 
 		$kundnummer = $_GET['pid'];
    $frysdatum = $_POST['frysdatum'];
	  $frystkort = 0;
	  $giltigtill = $today - $frysdatum


if(!empty($_POST)){
    try {
       $query = ("UPDATE medlemskort SET fryst=:fryst, frysdatum=:frysdatum, giltigtill=:giltigtill WHERE kundnr={$kundnummer} AND aktivtkort=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':fryst'=>$frystkort,
                            ':giltigtill'=>$giltigtill,



            ));
			   
if($query){
          echo '<center>' . '<h4>' . 'Du har fryst kortet!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }
	}
?>