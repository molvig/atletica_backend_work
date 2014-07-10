<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>



<div class="table-responsive">
	<center><h3>Sök efter medlemmar </h3>
	<p>Du kan söka på förnamn, efternamm, personnummer (ex 861128) eller kundnummer. <br> Tänk på att sökordet måste vara minst 4 tecken långt. </p>
	
<br>
<br>
	<form role="form" method="GET" action="search.php">
  <div class="form-group">
    <label for="medlem">Sök efter en medlem</label>
    <input type="text" class="form-control" name="medlem" id="medlem" placeholder="">
  </div>
  <button type="submit" name="submit"  class="btn btn-default">Sök</button>
</form>
</center>



<?php include("inc/footer.php"); ?>