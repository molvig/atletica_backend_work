
<?php
$fokus ="";

  if(!empty($_POST)){
      $fokus =($_POST['veckansfokus_uppdatera']);
    try {
       $query = ("UPDATE veckansfokus SET veckansfokus=:veckansfokus_uppdatera WHERE veckansfokusID=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':veckansfokus_uppdatera'=>$fokus));

          if($query){
          echo '<center>' . '<h4>' . 'Du har uppdaterat veckans fokus!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }


?>
    <?php include ("getveckansfokus.php");?>
