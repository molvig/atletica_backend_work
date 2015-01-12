<?php
 
if(isset($_GET["passid"])){
$today= date('Y-m-d');
$nowtime = date('H:i:s');
$avbokad = date('H:i:s', strtotime($starttid . ' - 120 minute'));

$stTime = explode(":", $starttid);
$stDate = new DateTime('0000-01-01');
$stDate->setTime($stTime[0],$stTime[1]);
    
/*
echo "tid nu: ". $nowtime ."<br>";
echo "starttid: ". $starttid."<br>";
echo "senaste tid att avboka sig på: ". $avbokad."<br>" ;
echo "passdatum: " . $passdatum. "<br>";
echo "dagens datum: " . $today;

*/




$passid = htmlspecialchars($_GET["passid"]);


// HANTERA MEDLEMMAR

  if(isset($_POST['checkain-submit'])){

    $kundnr = $_POST['getkundnrin'];

    
    try {
       $query = ("UPDATE bokningar SET incheckad=:incheckad WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute(array(':incheckad'=>1));

          if($query){

         // echo '<center>' . '<h4>' . 'Du har checkat in!' . '</h4>' . '</center>';
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
        //  echo '<center>' . '<h4>' . 'Du har checkat ut!' . '</h4>' . '</center>';
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

  if($passdatum > $today){ 
    try {
          $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

                 $query = "SELECT * FROM bokningsbara WHERE bokningsbarID= {$passid}";  
                  $stmt = $db ->prepare($query);
                  $stmt->execute();
                  $plats= $stmt->fetch(PDO::FETCH_ASSOC); 
                  $stmt->closeCursor(); 
                  $antalplatserna  = $plats['antalplatser'];
                  $passdatum  = $plats['datum'];
                  $stmt->closeCursor(); 

                   $query = "SELECT * FROM bokningar WHERE bokningsbarID= {$passid} AND reservplats=0";  
                    $stmt = $db ->prepare($query);
                    $stmt->execute();
                    $antalbokade = $stmt->rowCount(); 
                    $stmt->closeCursor(); 


                  if ($antalplatserna > $antalbokade){
                      try {
                      $query=("SELECT * FROM bokningar WHERE bokningsbarID = {$passid} AND reservplats=1 ORDER BY datum ASC LIMIT 1");
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
                     $query = ("UPDATE bokningar SET reservplats=:reservplats WHERE kundnr = {$nyastkund} AND bokningsbarID = {$passid}");
                     $q = $db -> prepare($query);
                     $q-> execute(array(':reservplats'=>0)); 
                    $stmt->closeCursor();  

                      if($query){
                      $query=("SELECT * FROM medlemmar WHERE kundnr= {$nyastkund}");
                      $stmt = $db ->prepare($query);
                      $stmt->execute();
                      $reserver = $stmt->rowCount(); 
                      $mem = ($stmt->fetch(PDO::FETCH_ASSOC)); 
                      $stmt->closeCursor(); 

                      $fnamn=$mem['fnamn'];
              $mail=$mem['mail'];

              $query=("SELECT * FROM bokningsbara WHERE bokningsbarID= {$passid}");
                      $stmt = $db ->prepare($query);
                      $stmt->execute();
                      $reserver = $stmt->rowCount(); 
                      $pass = ($stmt->fetch(PDO::FETCH_ASSOC)); 
                      $stmt->closeCursor(); 

                      $passnamn=$pass['passnamn'];
              $starttid=date('H:i',strtotime($pass['starttid']));
              $passdatum = $pass['datum'];


                $to = $mail;
              $subject = $passnamn.  "på Atletica";
              $txt = "
              <html>
              <head>
              <title>Gruppträning Atletica</title>
              </head>
              <body>
              <h4>Hej, ".$fnamn."!</h4>
              <p>Du har fått en plats på  ".$passnamn. " ". $passdatum. " som börjar kl ".$starttid." </p>
              <p>Var snäll och kom senast 10 minuter innan passet startar för att inte riskera att förlora din plats.</p>

              <h4>Avbokning</h4>
              <p>Om du skulle få förhinder och vill avboka din plats måste detta göras senast TVÅ timmar
              innan passet startar. Annars får du en skuld som kan lösas för 40kr.</p>
              <p>Kontakta oss på telefon: 0340-14703</p>

              <h4>Välommen!<br>
              Hälsningar, Atletica <br>

              www.atletica.se
              </h4>
              </body>
              </html>
              " ;

              // Always set content-type when sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

              // More headers
              $headers .= 'From: Atletica <info@atletica.se>' . "\r\n";


              mail($to,$subject,$txt,$headers); 


                      }

                      
                      } 

                     
                    catch (Exception $e) {

                      echo '<center>' . '<h4>' . 'Det gick inte att boka in från reservlistan' . '</h4>' . '</center>';
                      echo $e;

                    }
                }
          }


        //  echo '<center>' . '<h4>' . 'Du har avbokat kunden!' . '</h4>' . '</center>';
         echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
        


      } 
      catch (Exception $e) {

        echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
         echo $e;
      }
  }  


  else if($passdatum == $today && $nowtime < $avbokad){ 
    try {
          $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();

              $query = "SELECT * FROM bokningsbara WHERE bokningsbarID= {$passid}";  
              $stmt = $db ->prepare($query);
              $stmt->execute();
              $plats= $stmt->fetch(PDO::FETCH_ASSOC); 
              $stmt->closeCursor(); 
              $antalplatserna  = $plats['antalplatser'];
              $passdatum  = $plats['datum'];
              $stmt->closeCursor(); 

              $query = "SELECT * FROM bokningar WHERE bokningsbarID= {$passid} AND reservplats=0";  
              $stmt = $db ->prepare($query);
              $stmt->execute();
              $antalbokade = $stmt->rowCount(); 
              $stmt->closeCursor(); 


              if ($antalplatserna > $antalbokade){

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

        //  echo '<center>' . '<h4>' . 'Du har avbokat kunden!' . '</h4>' . '</center>';
         echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
        
      }

      } 
      catch (Exception $e) {

        echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
         echo $e;
      }
  } 



  else if ($passdatum == $today && $nowtime > $avbokad){
          $kund = $_POST['getkundnrin'];

              if ($install==0 && $kundnr!=1){
              $query = ("INSERT INTO skulder (bokningsbarID, kundnr, sen_avbokning, datum, passnamn, starttid) VALUES (:bokningsbarID, :kundnr, :sen_avbokning, :datum, :passnamn, :starttid)");
              $q = $db -> prepare($query);
              $q-> execute(array(':bokningsbarID'=>$passid,
                                ':kundnr'=>$kund,
                                ':sen_avbokning'=>1,
                                ':datum'=>$passdatum,
                                ':passnamn'=>$passnamn,
                                ':starttid'=>$stDate->format('Y-m-d H:i:s')

               ));

                  $sen = '<script>
              alert("Kunden är sen avbokad och hamnar nu på skuldlistan!");</script>';

            echo $sen;
             }

    try {
          $query = ("DELETE from bokningar WHERE kundnr = {$kundnr} AND bokningsbarID= {$passid}");
          $q = $db -> prepare($query);
          $q-> execute();


              $query = "SELECT * FROM bokningsbara WHERE bokningsbarID= {$passid}";  
              $stmt = $db ->prepare($query);
              $stmt->execute();
              $plats= $stmt->fetch(PDO::FETCH_ASSOC); 
              $stmt->closeCursor(); 
              $antalplatserna  = $plats['antalplatser'];
              $passdatum  = $plats['datum'];
              $stmt->closeCursor(); 

              $query = "SELECT * FROM bokningar WHERE bokningsbarID= {$passid} AND reservplats=0";  
              $stmt = $db ->prepare($query);
              $stmt->execute();
              $antalbokade = $stmt->rowCount(); 
              $stmt->closeCursor(); 


              if ($antalplatserna > $antalbokade){

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

              if($query){
                      $query=("SELECT * FROM medlemmar WHERE kundnr= {$nyastkund}");
                      $stmt = $db ->prepare($query);
                      $stmt->execute();
                      $reserver = $stmt->rowCount(); 
                      $mem = ($stmt->fetch(PDO::FETCH_ASSOC)); 
                      $stmt->closeCursor(); 

                      $fnamn=$mem['fnamn'];
              $mail=$mem['mail'];

              $query=("SELECT * FROM bokningsbara WHERE bokningsbarID= {$passid}");
                      $stmt = $db ->prepare($query);
                      $stmt->execute();
                      $reserver = $stmt->rowCount(); 
                      $pass = ($stmt->fetch(PDO::FETCH_ASSOC)); 
                      $stmt->closeCursor(); 

                      $passnamn=$pass['passnamn'];
              $starttid=date('H:i',strtotime($pass['starttid']));
              $passdatum = $pass['datum'];


                $to = $mail;
              $subject = $passnamn. " på Atletica";
              $txt = "
              <html>
              <head>
              <title>Gruppträning Atletica</title>
              </head>
              <body>
              <h4>Hej, ".$fnamn."!</h4>
              <p>Du har fått en plats på  ".$passnamn. " ". $passdatum. " som börjar kl ".$starttid." </p>
              <p>Var snäll och kom senast 10 minuter innan passet startar för att inte riskera att förlora din plats.</p>

              <h4>Avbokning</h4>
              <p>Om du skulle få förhinder och vill avboka din plats måste detta göras senast TVÅ timmar
              innan passet startar. Annars får du en skuld som kan lösas för 40kr.</p>
              <p>Kontakta oss på telefon: 0340-14703</p>

              <h4>Välommen!<br>
              Hälsningar, Atletica <br>

              www.atletica.se
              </h4>
              </body>
              </html>
              " ;

              // Always set content-type when sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

              // More headers
              $headers .= 'From: Atletica <info@atletica.se>' . "\r\n";


              mail($to,$subject,$txt,$headers); 

                      }

                
                } 
      
               
              catch (Exception $e) {

                echo '<center>' . '<h4>' . 'Det gick inte att boka in från reservlistan' . '</h4>' . '</center>';
                echo $e;
              }
          }

          //echo '<center>' . '<h4>' . 'Du har avbokat kunden!' . '</h4>' . '</center>';
         echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
        


      } 
} 
      catch (Exception $e) {

        echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
         echo $e;
      }







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
         // echo '<center>' . '<h4>' . 'Du har checkat in gästen!' . '</h4>' . '</center>';
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


       //   echo '<center>' . '<h4>' . 'Du har checkat ut gästen!' . '</h4>' . '</center>';
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


              $query = "SELECT * FROM bokningsbara WHERE bokningsbarID= {$passid}";  
              $stmt = $db ->prepare($query);
              $stmt->execute();
              $plats= $stmt->fetch(PDO::FETCH_ASSOC); 
              $stmt->closeCursor(); 
              $antalplatserna  = $plats['antalplatser'];
              $passdatum  = $plats['datum'];
              $stmt->closeCursor(); 

              $query = "SELECT * FROM bokningar WHERE bokningsbarID= {$passid} AND reservplats=0";  
              $stmt = $db ->prepare($query);
              $stmt->execute();
              $antalbokade = $stmt->rowCount(); 
              $stmt->closeCursor(); 


              if ($antalplatserna > $antalbokade){

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

              if($query){
                      $query=("SELECT * FROM medlemmar WHERE kundnr= {$nyastkund}");
                      $stmt = $db ->prepare($query);
                      $stmt->execute();
                      $reserver = $stmt->rowCount(); 
                      $mem = ($stmt->fetch(PDO::FETCH_ASSOC)); 
                      $stmt->closeCursor(); 

                      $fnamn=$mem['fnamn'];
              $mail=$mem['mail'];

              $query=("SELECT * FROM bokningsbara WHERE bokningsbarID= {$passid}");
                      $stmt = $db ->prepare($query);
                      $stmt->execute();
                      $reserver = $stmt->rowCount(); 
                      $pass = ($stmt->fetch(PDO::FETCH_ASSOC)); 
                      $stmt->closeCursor(); 

                      $passnamn=$pass['passnamn'];
              $starttid=date('H:i',strtotime($pass['starttid']));
              $passdatum = $pass['datum'];


                $to = $mail;
              $subject = $passnamn. " på Atletica";
              $txt = "
              <html>
              <head>
              <title>Gruppträning Atletica</title>
              </head>
              <body>
              <h4>Hej, ".$fnamn."!</h4>
              <p>Du har fått en plats på  ".$passnamn. " ". $passdatum. " som börjar kl ".$starttid." </p>
              <p>Var snäll och kom senast 10 minuter innan passet startar för att inte riskera att förlora din plats.</p>

              <h4>Avbokning</h4>
              <p>Om du skulle få förhinder och vill avboka din plats måste detta göras senast TVÅ timmar
              innan passet startar. Annars får du en skuld som kan lösas för 40kr.</p>
              <p>Kontakta oss på telefon: 0340-14703</p>

              <h4>Välommen!<br>
              Hälsningar, Atletica <br>

              www.atletica.se
              </h4>
              </body>
              </html>
              " ;

              // Always set content-type when sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

              // More headers
              $headers .= 'From: Atletica <info@atletica.se>' . "\r\n";


              mail($to,$subject,$txt,$headers); 

                      }

                
                } 
      

               
              catch (Exception $e) {

                echo '<center>' . '<h4>' . 'Det gick inte att boka in från reservlistan' . '</h4>' . '</center>';
                echo $e;
              }
          }

                   echo "<meta http-equiv=\"refresh\" content=\"0.5;URL='index.php?passid=".$passid."'\" />"; 
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }



}



?>
