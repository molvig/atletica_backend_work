
<?php

  if(!empty($_POST)){
      $kundnummer = $_POST['kundnr'];
      $enamn = $_POST['enamn'];
      $telefonnr = $_POST['phone'];
      $email = $_POST['mail'];
      $anteckning = $_POST['note'];
      $passantal = $_POST['passantal'];
      $nyttkort = $_POST['nyttkort'];

      if (isset($_POST['nyckelkort'])) {$nyckelkort = 1;}
        else {$nyckelkort = 0;}


    try {
       $query = ("UPDATE medlemmar SET enamn=:enamn, telefon=:phone, mail=:mail, anteckning=:note, passantal=:passantal, nyckelkort=:nyckelkort WHERE kundnr={$kundnummer}");
          $q = $db -> prepare($query);
          $q-> execute(array(':enamn'=>$enamn,
                            ':phone'=>$telefonnr,
                            ':mail'=>$email,
                            ':note'=>$anteckning,
                            ':passantal'=>$passantal,
                            ':nyckelkort'=>$nyckelkort

            ));

          if($query){
          echo '<center>' . '<h4>' . 'Du har uppdaterat följande medlem!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }
         

  }


?>




