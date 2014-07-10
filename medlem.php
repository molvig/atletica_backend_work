<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>



<div class="grid_3">
	<center><h3>Sök efter medlemmar </h3>
	<p>Du kan söka på förnamn, efternamm, personnummer (ex 861128) eller kundnummer. <br> Tänk på att sökordet måste vara minst 4 tecken långt. </p>

	<form role="form" method="GET" action="search.php">
  <div class="form-group">
    <label for="medlem">Sök efter en medlem</label>
    <input type="text" class="form-control" name="medlem" id="medlem" placeholder="">
  </div>
  <button type="submit" name="submit"  class="btn btn-default">Sök</button>
</form>
</center>
</div>



	<center><h3>Lägg till ny medlem </h3>
	
	

	<form class="form-horizontal" role="form" action="#" method="post">
  <div class="form-group">
  	<label for="fnamn" class="col-sm-2 control-label" >Medlemsnummer</label>
   		<p>2369</p>
    <label for="pnummer" class="col-sm-2 control-label">Personnummer</label>
    	<input type="text" class="form-control" name="pnummer" id="pnummer" placeholder="ex 861128">
    <label for="fnamn" class="col-sm-2 control-label">Förnamn</label>
    	<input type="text" class="form-control" name="fnamn" id="fnamn" placeholder="">
    <label for="enamn" class="col-sm-2 control-label">Efternamn</label>
    	<input type="text" class="form-control" name="enamn" id="enamn" placeholder="">
   	<label for="tele" class="col-sm-2 control-label">Telefonnummer</label>
    	<input type="tel" class="form-control" name="tele" id="tele" placeholder="">
   	<label for="email" class="col-sm-2 control-label">Email</label>
    	<input type="email" class="form-control" name="email" id="mail" placeholder="">
    <label for="korttyp" class="col-sm-2 control-label">Korttyp</label>
 
		  <input type="radio" name="korttyp" value="year"> Årskort 
		  <input type="radio" name="korttyp" value="ag"> Autogiro 
		  <input type="radio" name="korttyp" value="klipp"> Klippkort 

  </div>
  <button type="submit" name="submit"  class="btn btn-default">Spara</button>
</form>
</center>
<br>


<?php include("inc/footer.php"); ?>