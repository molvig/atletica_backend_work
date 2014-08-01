<?php
	 
	if(!empty($_POST)){
	    $nyttpass = $_POST['nyttpass'];
	    $passbeskrivning = $_POST['passbeskrivning'];
		try {
			 $query = ("INSERT INTO pass (passnamn,passbeskrivning) VALUES (:nyttpass, :passbeskrivning)");
			    $q = $db -> prepare($query);
			    $q-> execute(array(':nyttpass'=>$nyttpass,
			    					':passbeskrivning' =>$passbeskrivning));

		  		if($query){ ?>
		    	<div class="grid_12"> <?php echo  '<h4>' . 'Du har lagt till '. '<strong>' . $nyttpass  .'</strong>' .' som ett nytt pass!' . '</h4>'; ?> </div>
			 <?php	}
		} 
		catch (Exception $e) {?>

			<div class="grid_12"> <?php echo '<h4>' . 'Hoppsan! <br> Passet du försöker lägga till finns redan...' . '</h4>';?> </div>
		<?php }
			   

	}
	?>






SELECT kundnr FROM medlemmar ORDER BY kundnr DESC LIMIT 1;