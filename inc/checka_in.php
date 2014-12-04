<?php
 
if(isset($_GET["passid"])){

$passid = htmlspecialchars($_GET["passid"]);


// HANTERA MEDLEMMAR

  if(isset($_POST['checkain-submit'])){

    $kundnr = $_POST['getkundnrin'];

    
    try {
       $query = ("UPDATE bokningar SET incheckad=:incheckad WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute(array(':incheckad'=>1));

          if($query){
          echo '<center>' . '<h4>' . 'Du har checkat in!' . '</h4>' . '</center>';
         echo "<meta http-equiv=\"refresh\" content=\"1;URL='index.php?passid=".$passid."'\" />"; 
	
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
          echo "<meta http-equiv=\"refresh\" content=\"1;URL='index.php?passid=".$passid."'\" />"; 
  
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
        echo "<meta http-equiv=\"refresh\" content=\"1;URL='index.php?passid=".$passid."'\" />"; 
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }



  // HANTERA GÄSTER

    if(isset($_POST['checkain-gast-submit'])){

    $gast = $_POST['getgastin'];

    
    try {
       $query = ("UPDATE bokningar SET incheckad=:incheckad WHERE gastID = {$gast} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute(array(':incheckad'=>1));

          if($query){
          echo '<center>' . '<h4>' . 'Du har checkat in gästen!' . '</h4>' . '</center>';
           echo "<meta http-equiv=\"refresh\" content=\"1;URL='index.php?passid=".$passid."'\" />"; 
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
    


  }

    else if(isset($_POST['angra-gast-submit'])){

    $gast = $_POST['getgastut'];

    
    try {
       $query = ("UPDATE bokningar SET incheckad=:incheckad WHERE gastID = {$gast} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute(array(':incheckad'=>0));

          if($query){
          echo '<center>' . '<h4>' . 'Du har checkat ut gästen!' . '</h4>' . '</center>';
                   echo "<meta http-equiv=\"refresh\" content=\"1;URL='index.php?passid=".$passid."'\" />"; 
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }

  else if(isset($_POST['avboka-gast-submit'])){

    $gast = $_POST['getgastin'];

    
    try {
       $query = ("DELETE from bokningar WHERE gastID = {$gast} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

          if($query){
          echo '<center>' . '<h4>' . 'Du har avbokat gästen!' . '</h4>' . '</center>';
                   echo "<meta http-equiv=\"refresh\" content=\"1;URL='index.php?passid=".$passid."'\" />"; 
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }



}



?>
