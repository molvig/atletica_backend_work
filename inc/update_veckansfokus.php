
<?php
$veckansfokus_text ="";

  if(!empty($_POST)){
      $veckansfokus_text =($_POST['veckansfokus_uppdatera']);
      $today=date('Y-m-d H:i:s');
    try {
       $query = ("UPDATE veckansfokus SET veckansfokus=:veckansfokus_uppdatera, uppdaterad=:uppdaterad WHERE veckansfokusID=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':veckansfokus_uppdatera'=>$veckansfokus_text, ':uppdaterad'=>$today));

          if($query){
          echo '<center>' . '<h4>' . 'Du har uppdaterat veckans fokus!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }


?>




