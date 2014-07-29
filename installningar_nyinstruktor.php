<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<center>
<form class="form-group" role="form" method="post" action="#">
  <div class="form-group">
    <label for="nyinst">Lägg till en ny instruktör</label>
    <input type="text" class="form-control" id="nyinst" name="nyinst" placeholder="Namn på instruktören">
  </div>
  <button type="submit" class="btn btn-default">Spara</button>
</form>
</center>



<?php
	 
	if(!empty($_POST)){
	    $nyinst = $_POST['nyinst'];
		try {
			 $query = ("INSERT INTO instruktorer (instname) VALUES (:nyinst)");
			    $q = $db -> prepare($query);
			    $q-> execute(array(':nyinst'=>$nyinst));

		  		if($query){
		    	echo '<center>' . '<h4>' . 'Du har lagt till '. '<strong>' . $nyinst  .'</strong>' .' som en ny instruktör!' . '</h4>' . '</center>';
			 	}
		} 
		catch (Exception $e) {

			echo '<center>' . '<h4>' . 'Hoppsan! <br> Instruktören du försöker lägga till finns redan...' . '</h4>' . '</center>';
		}
			   

	}
?>


<?php include("inc/footer.php"); ?>