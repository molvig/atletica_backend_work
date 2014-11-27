<?php
	if(isset($_GET["passid"])){
$passid = htmlspecialchars($_GET["passid"]);
	 
	if(!empty($_POST['gastlista-submit'])){
		
	    $fnamn = $_POST['fnamn_gast'];
	    $enamn = $_POST['enamn_gast'];
	    $mail = $_POST['email_gast'];
	    $tel = $_POST['tel_gast'];
	    $bokningID = $passid;


		try {
			 $query = ("INSERT INTO gastlista (fnamn, enamn, telefon, mail, bokningID) VALUES (:fnamn, :enamn,  :tel, :email, :bokningID)");
			    $q = $db -> prepare($query);
			    $q-> execute(array(':fnamn'=>$fnamn,
			    					':enamn'=>$enamn,
			    					':tel'=>$tel,
			    					':email'=>$mail,
			    					':bokningID'=>$bokningID
			    ));

		  		if($query){?>
		    	<div class="grid_12"> <?php echo '<h4>' . 'Du har bokat '. '<strong>' . $fnamn  .'</strong>' .' som gäst!' . '</h4>'; ?></div>
			 <?php	}
		} 
		catch (Exception $e) { ?>

			<div class="grid_12"> <?php echo '<h4>' . 'Hoppsan! <br> Det gick inte att boka in gästen... Försök igen!' . '</h4>'; echo $e;?> </div>
		<?php }
			   

	}
	}
?>