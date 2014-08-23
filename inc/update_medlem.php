
<?php

  if(!empty($_POST)){

      $enamn = $_POST['enamn'];
      $telefonnr = $_POST['phone'];
      $email = $_POST['mail'];
      $kortgiltigtfran = $_POST['kortgiltigtfran'];
      $giltigttillspecial = $_POST['kortgiltigttill'];
      $anteckning = $_POST['note'];
      $korttyp = $_POST['korttyp'];
      $passantal = $_POST['passantal'];
      $nyttkort = $_POST['nyttkort'];

      if (isset($_POST['nyckelkort'])) {$nyckelkort = 1;}
        else {$nyckelkort = 0;}


    try {
       $query = ("UPDATE veckansfokus SET veckansfokus=:veckansfokus_uppdatera WHERE veckansfokusID=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':veckansfokus_uppdatera'=>$veckansfokus_text));

          if($query){
          echo '<center>' . '<h4>' . 'Du har uppdaterat veckans fokus!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }


?>




