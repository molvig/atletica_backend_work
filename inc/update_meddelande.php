
<?php
$meddelande_text ="";

  if(!empty($_POST)){
      $meddelande_text =($_POST['meddelande_text']);
    try {
       $query = ("UPDATE medlemmar SET meddelande=:meddelande_text");
          $q = $db -> prepare($query);
          $q-> execute(array(':meddelande_text'=>$meddelande_text));

          if($query){
          echo '<h4>' . 'Du har nu meddelat alla medlemmar!' . '</h4>';
          echo "<meta http-equiv=\"refresh\" content=\"1;URL='installningar_kontaktmedlemmar.php'\" />";  
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }


?>




