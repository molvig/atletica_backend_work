<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getpass.php"); ?>


<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


	<div class="grid_3">
<form class="form-group" role="form" method="post" action="#">
  <div class="form-group">
    <label for="nyttpass">Passnamn</label>
    <input type="text" class="form-control" id="nyttpass" name="nyttpass" placeholder="Namn på nya passet">
    </div>
    <div class="form-group">
    <label for="passbeskrivning">Passbeskrivning</label>
    <textarea type="text" class="form-control" id="passbeskrivning" name="passbeskrivning"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Spara</button>
</form>
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




</div>
<div class="grid_2">

	
</div>
<div class="grid_2">
<h4>Pass som finns sparade:</h4>	
<?php echo $passnamnet ?>
</div>



