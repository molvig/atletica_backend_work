<?php
 


$passid = htmlspecialchars($_GET["passid"]);




  if(isset($_POST['checkain-submit'])){

    $kundnr = $_POST['getkundnrin'];

    
    try {
       $query = ("UPDATE bokningar SET incheckad=:incheckad WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute(array(':incheckad'=>1));

          if($query){
          echo '<center>' . '<h4>' . 'Du har checkat in!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
    


  }

  else if(isset($_POST['angra-submit'])){

    $kundnr = $_POST['getkundnrut'];

    
    try {
       $query = ("UPDATE bokningar SET incheckad=:incheckad WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute(array(':incheckad'=>0));

          if($query){
          echo '<center>' . '<h4>' . 'Du har checkat ut!' . '</h4>' . '</center>';
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }

  else if(isset($_POST['avboka-submit'])){

    $kundnr = $_POST['getkundnrin'];

    
    try {
       $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

          if($query){
          echo '<center>' . '<h4>' . 'Du har avbokat kunden!' . '</h4>' . '</center>';
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }



include('inc/get_bokade.php');
include('inc/get_veckans_pass.php');






?>
