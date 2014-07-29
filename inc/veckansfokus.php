
    <?php
	 $veckansfokus_text ="";
	 $uppdaterad ="";
	

	 try {
			$results = $db -> query ("SELECT veckansfokus, uppdaterad FROM veckansfokus WHERE veckansfokusID =1 ");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$veckansfokus = ($results -> fetchAll(PDO::FETCH_ASSOC));

str_replace('<br />', ' ',$veckansfokus); 

          foreach($veckansfokus as $v){

				 $veckansfokus_text .= $v['veckansfokus'];
				 $uppdaterad .= $v['uppdaterad'];

             }



?>




 <?php if(!empty($_POST)){
      $fokus =($_POST['fokus']);
    try {
       $query = ("UPDATE veckansfokus SET veckansfokus=:fokus WHERE veckansfokusID=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':fokus'=>$fokus));

          if($query){
          echo '<center>' . '<h4>' . 'Du har uppdaterat veckans fokus!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
    }
         

  }


?>
    <?php
   $veckansfokus_text ="";
   $uppdaterad ="";
  

   try {
      $results = $db -> query ("SELECT veckansfokus, uppdaterad FROM veckansfokus WHERE veckansfokusID =1 ");
  } 
  catch (Exception $e) {
      echo "Data could not be retrieved from the database";
      exit;
  }

  $veckansfokus = ($results -> fetchAll(PDO::FETCH_ASSOC));

str_replace('<br />', ' ',$veckansfokus); 

          foreach($veckansfokus as $v){

         $veckansfokus_text .= $v['veckansfokus'];
         $uppdaterad .= $v['uppdaterad'];

             }



?>
