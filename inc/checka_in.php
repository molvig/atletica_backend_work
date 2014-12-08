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
         echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
	
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
          echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }

//AVBOKA
  else if(isset($_POST['avboka-submit'])){

    $kundnr = $_POST['getkundnrin'];

    
    try {
          $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

                try {
                $query=("SELECT * FROM bokningar WHERE bokningsbarID= {$passid} AND reservplats=1 ORDER BY datum ASC LIMIT 1");
                $stmt = $db ->prepare($query);
                $stmt->execute();
                $reserver = $stmt->rowCount(); 
                $result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 
                $stmt->closeCursor(); 
                $nyastkund="";
                  foreach ($result as $row) {
                    $nyastkund = $row['kundnr'];
                  }
                }

                catch (Exception $e) {

                echo '<center>' . '<h4>' . 'Det gick inte hämta från reservlistan' . '</h4>' . '</center>';
                echo $e;
                }

                if ($reserver>0 ){
              try {
               $query = ("UPDATE bokningar SET reservplats=:reservplats WHERE kundnr = {$nyastkund} AND bokningsbarID= {$passid}");
               $q = $db -> prepare($query);
               $q-> execute(array(':reservplats'=>0)); 
              $stmt->closeCursor();  



                
                } 

               
              catch (Exception $e) {

                echo '<center>' . '<h4>' . 'Det gick inte att boka in från reservlistan' . '</h4>' . '</center>';
                echo $e;
              }
          }

          echo '<center>' . '<h4>' . 'Du har avbokat kunden!' . '</h4>' . '</center>';
         //echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
        


    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
       echo $e;
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
           echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
  
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


          echo '<center>' . '<h4>' . 'Du har checkat ut gästen!' . '</h4>' . '</center>';
                   echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
  
        }
     
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }

//AVBOKA
  else if(isset($_POST['avboka-gast-submit'])){

    $gast = $_POST['getgastin'];

    
    try {
       $query = ("DELETE from bokningar WHERE gastID = {$gast} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

          if($query){



                try {
                $query=("SELECT * FROM bokningar WHERE bokningsbarID= {$passid} AND reservplats=1 ORDER BY datum ASC LIMIT 1");
                $stmt = $db ->prepare($query);
                $stmt->execute();
                $reserver = $stmt->rowCount(); 
                $result = ($stmt->fetchAll(PDO::FETCH_ASSOC)); 
                $stmt->closeCursor(); 
                $nyastkund="";
                  foreach ($result as $row) {
                    $nyastkund = $row['kundnr'];
                  }
                }

                catch (Exception $e) {

                echo '<center>' . '<h4>' . 'Det gick inte hämta från reservlistan' . '</h4>' . '</center>';
                echo $e;
                }

                if ($reserver>0 ){
              try {
               $query = ("UPDATE bokningar SET reservplats=:reservplats WHERE kundnr = {$nyastkund} AND bokningsbarID= {$passid}");
               $q = $db -> prepare($query);
               $q-> execute(array(':reservplats'=>0)); 
              $stmt->closeCursor();  



                
                } 

               
              catch (Exception $e) {

                echo '<center>' . '<h4>' . 'Det gick inte att boka in från reservlistan' . '</h4>' . '</center>';
                echo $e;
              }
          }


          echo '<center>' . '<h4>' . 'Du har avbokat gästen!' . '</h4>' . '</center>';
                   echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }



}



?>
