<?php

	if(isset($_GET["passid"])){


$passid = htmlspecialchars($_GET["passid"]);
	 if(!empty($_POST['bokamedlem'])){

	if(isset($_POST['submit-medlem'])){
		
	    $kundnr = $_POST['bokamedlem'];

	    $bokningID = $passid;


		try {
			 $query = ("INSERT INTO bokningar (kundnr, bokningsbarID) VALUES (:kundnr, :bokningsbarID)");
			    $q = $db -> prepare($query);
			    $q-> execute(array(':kundnr'=>$kundnr,
			    					':bokningsbarID'=>$passid
			    ));

		  		if($query){?>
		    	<div class="grid_12"> <?php echo '<h4>' . 'Du har bokat '. '<strong>' . $kundnr  .'</strong>' .' som gäst!' . '</h4>'; ?></div>
			 <?php	}
		} 
		catch (Exception $e) { ?>

			<div class="grid_12"> <?php echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in gästen... Försök igen!' . '</h4>'; echo $e;?> </div>
		<?php }
			   

	}
}

}
?>