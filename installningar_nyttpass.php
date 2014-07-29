<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<center>
<form class="form-group" role="form" method="post" action="#">
  <div class="form-group">
    <label for="nyttpass">Passnamn</label>
    <input type="text" class="form-control" id="nyttpass" name="nyttpass" placeholder="Namn på nya passet">
  </div>
  <button type="submit" class="btn btn-default">Spara</button>
</form>
</center>



<?php
	 
	if(!empty($_POST)){
	    $nyttpass = $_POST['nyttpass'];
		try {
			 $query = ("INSERT INTO passen (passname) VALUES (:nyttpass)");
			    $q = $db -> prepare($query);
			    $q-> execute(array(':nyttpass'=>$nyttpass));

		  		if($query){
		    	echo '<center>' . '<h4>' . 'Du har lagt till '. '<strong>' . $nyttpass  .'</strong>' .' som ett nytt pass!' . '</h4>' . '</center>';
			 	}
		} 
		catch (Exception $e) {

			echo '<center>' . '<h4>' . 'Hoppsan! <br> Passet du försöker lägga till finns redan...' . '</h4>' . '</center>';
		}
			   

	}
?>


<?php include("inc/footer.php"); ?>