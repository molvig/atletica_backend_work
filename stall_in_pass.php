<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>

<?php include("inc/stall_in_andra.php"); ?>


<div class="grid_12">

<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  Ställ in <?php echo $passnamn; ?></h3>
  	</div>
  				<form class="form-inline" role="form" method="post">

  	<?php if($install==1){echo "<h3 style='color:red'>PASSET ÄR INSTÄLLT</h3>";}
  			else { ?>

			<div class="form-group">
			<input type="text" class="form-control" name="orsak" placeholder="Varför ställs passet in?" required>
			</div>
			<button type="submit" name="stall-in" class="btn btn-default">Ställ in passet</button>

	<?php	}?>


			</form>
	<div class="panel-body">
		<div class="list-group">

			<table class="table">
		      <tr>

		        <td><h5>Kundnummer</h5></td>
		        <td><h5>Förnamn</h5></td>
		        <td><h5>Efternamn</h5></td>
		        <td><h5>Telefonnummer</h5></td>
		        <td><h5>Mail</h5></td>
		      </tr>   
			
		    <?php echo $found; ?>

		    </table> 
		</div>
	</div>
</div>


<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">   Ändra <?php echo $passnamn; ?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">
<form role="form" action="#" method="post">
				    <div class="grid_12">

				          <div class="grid_12">
				              <label>Datum
				                   <input type="text" name="datum" class="form-control" id="datum" value="<?php echo $passdatum;?>" readonly >
				              </label>

				          </div>
				  </div>

				  <div class="grid_12">

				          <div class="grid_6">
				              <label>Pass
				                   <input type="text" name="pass" class="form-control" id="pass" value="<?php echo $passnamn;?>" readonly>
				              </label>
				          </div>
				          <div class="grid_6">
							    <label>Instruktör 
							     <select name="instruktor" class="form-control"> 
							          <?php echo $inamnet ?>
							        </select>
							        </label>  
							    </div>

				  </div>


				  <div class="grid_12">

				          <div class="grid_6">
				              <label>Starttid
				                  <input id="start" type="text" class="form-control" value="<?php echo $starttid;?>" readonly >
				              </label>
				          </div>

				          <div class="grid_6">
				              <label>Sluttid
				                  <input id="slut" type="text" class="form-control" value="<?php echo $sluttid;?>" readonly >
				              </label>
				 
				          </div>
				  </div>


				  <div class="grid_12">      
				          <div class="grid_6">
				              <label>Antal platser
				                <input type="text" class="form-control" name="platser" id="platser" value="<?php echo $antalplatserna;?>" readonly>
				              </label>
				          </div>
				    
				          <div class="grid_6">
				              <label>Kommentar
				                <input type="text" name="information" class="form-control" id="information" value="<?php echo $info; ?>" >
				              </label>
				          </div>
				  </div>

				  <div class="grid_12">
				    <input type="submit" class="btn btn-default" name="andra_pass" value="Ändra passinformation"/>
				  </div>


				</form>
		</div>
	</div>
</div>






<?php include("inc/footer.php"); ?>




