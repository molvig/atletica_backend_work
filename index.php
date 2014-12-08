<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getveckansfokus.php"); ?>
<?php include("inc/klipp_kort.php"); ?>
<?php include("inc/get_veckans_pass.php"); ?>
<?php include("inc/aktuellt_pass.php"); ?>
<?php include("inc/get_bokade.php"); ?>
<?php include("inc/boka_medlem.php"); ?>
<?php include("inc/nytt_gastID.php"); ?> 
<?php include("inc/boka_gast.php"); ?>
<?php include("inc/checka_in.php"); ?>
<?php include("inc/get_bokade.php"); ?>



<div class="grid_12">
<div class="grid_3">

<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  <?php echo $veckodag;?> <?php echo $today;?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">

				<?php echo $dagspass; ?>
		</div>
	</div>
</div>
<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  <?php echo $veckodag1;?> <?php echo $oneday;?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">

				<?php echo $dagspass1; ?>
		</div>
	</div>
</div>
<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  <?php echo $veckodag2;?> <?php echo $twoday;?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">

				<?php echo $dagspass2; ?>
		</div>
	</div>
</div>
<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  <?php echo $veckodag3;?> <?php echo $threeday;?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">

				<?php echo $dagspass3; ?>
		</div>
	</div>
</div>
<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  <?php echo $veckodag4;?> <?php echo $fourday;?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">

				<?php echo $dagspass4; ?>
		</div>
	</div>
</div>
<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  <?php echo $veckodag5;?> <?php echo $fiveday;?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">

				<?php echo $dagspass5; ?>
		</div>
	</div>
</div>
<div class="panel panel-default">
 	<div class="panel-heading">
   		<h3 class="panel-title">  <?php echo $veckodag6;?> <?php echo $sixday;?></h3>
  	</div>
	<div class="panel-body">
		<div class="list-group">

				<?php echo $dagspass6; ?>
		</div>
	</div>
</div>


</div>

<?php if(isset($_GET["passid"])){ ?>
	<div class="grid_6">
		<div class="grid_12">
			<div class="grid_4">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#bokamedlem" aria-expanded="true" aria-controls="collapseOne">
				          Boka medlem
				        </a>
				      </h4>
				    </div>
				    <div id="bokamedlem" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
						 <form class="form-inline" role="form" method="post" action="index.php?passid=<?php echo $passid; ?>">
						    <div class="form-group">
						    <input type="text" class="form-control" name="bokamedlem" id="medlemsnummer" placeholder="Medlemsnummer" onkeypress="return isNumberKey(event)" required>
						  </div>
						  <button type="submit" name ="submit-medlem" class="btn btn-default">Boka medlem</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
				</div>


	 <?php   if ($antalplatserna > $antalbokade){ 

	 			?>

				<div class="grid_4">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#bokagast" aria-expanded="true" aria-controls="collapseOne">
				          Boka gäst
				        </a>
				      </h4>
				    </div>
				    <div id="bokagast" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
						 <form class="form-inline" role="form" method="post" name="gastlista">
						 <div class="form-group">
						    <input type="text" class="form-control" name="gastID" placeholder="GästID" value="<?php echo 'GästID: ' . $biggestgastid; ?>" readonly>
						  </div>	
						  <div class="form-group">
						    <input type="text" class="form-control" name="fnamn_gast" placeholder="Förnamn" required>
						  </div>
						  <div class="form-group">
						    <input type="text" class="form-control" name="enamn_gast" placeholder="Efternamn" required>
						  </div>
						  <div class="form-group">
						    <input type="email" class="form-control" name="email_gast" placeholder="Email" required>
						  </div>
						    <div class="form-group">
						    <input type="text" class="form-control" name="tel_gast" placeholder="Telefon" onkeypress="return isNumberKey(event)" required>
						  </div>
						  <input type="submit" name="gastlista-submit" class="btn btn-default" value="Boka gäst"/>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
				</div>

				<?php 
		
		}

		else { 
			?>

				<div class="grid_4">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#bokagast" aria-expanded="true" aria-controls="collapseOne">
				          Boka gäst
				        </a>
				      </h4>
				    </div>
				    <div id="bokagast" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
						<p>Det är fullt på passet så inga gästbokningar kan göras!</p>
				      </div>
				    </div>
				  </div>
				</div>
				</div>

				<?php

		}   ?>





				<div class="grid_4">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a href="stall_in_pass.php?passid=<?php echo $passid; ?>">
				          Ställ in/Ändra pass
				        </a>
				      </h4>
				    </div>
				  </div>
				</div>
				</div>
		</div>

	

		<div class="panel panel-default">
			<?php echo $installt; ?> 
			<div class="panel-heading">
				

					<tr><h4> <strong><?php echo $passnamn; ?></strong> </h4></tr>
					<tr> Instruktör: <strong><?php echo $inst; ?></strong>  </tr><br>
					<tr> Tid: <?php echo "<strong>". $starttid. "</strong>". " - ".$sluttid ; ?> </tr> <br>
					<tr> Datum: <?php echo $passdatum; ?> </tr> <br>
					<tr> Antal platser: <?php echo $antalplatserna; ?> </tr><br>
					<tr> <?php echo $info; ?> </tr>

					
			</div>

		  <div class="panel-heading">
		      <th><?php echo "Bokade på passet: ". $antalbokade;  ?></th>
		  </div>

		  <div class="panel panel-default">
		  	
		      <table class="table">
		      <tr>

		        <td><h5>Kundnummer</h5></td>
		        <td><h5>Förnamn</h5></td>
		        <td><h5>Efternamn</h5></td>
		        <td><h5>Kortstatus</h5></td>
		        <td><h5>Avboka</h5></td>
		        <td><h5>Checka in</h5></td>
		      </tr>   
			
		    <?php echo $found; ?>

		      </table> 
		
		  </div>

		</div>

		<div class="panel-heading">
			 <th>Reservlista</th>
		</div>
		<div class="panel panel-default">
		 <?php include("inc/reservplats.php"); ?>
		  <table class="table">
		      <tr>
		      	<td><h5>Reservplats</h5></td>
		        <td><h5>Kundnummer</h5></td>
		        <td><h5>Förnamn</h5></td>
		        <td><h5>Efternamn</h5></td>
		        <td><h5>Avboka</h5></td>
		      </tr>   
			
		    <?php echo $reserv ; ?>

		  </table> 
		
		</div>	
	</div>

<?php } 
else { ?>

	<div class="grid_6">
		<div class="grid_12">
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">					
			</div>
		  <div class="panel-heading">
		  </div>
		  <div class="panel panel-default">
		  	
<h4>  <-- Välj pass från sidmenyn :)</h4>
		  </div>
		</div>	
	</div>

<?php }
?>

<div class="grid_1">
</div>

	<div class="grid_3">
		<div class="sticky taped">
		<p >
			<strong>VECKANS FOKUS</strong><br />
			<?php echo $veckansfokus_text; ?>
			<br />
			<br />
			<i>Uppdaterad: <strong><?php echo date('H:i ', strtotime($uppdaterad));?></strong> (<?php echo date('Y-m-d', strtotime($uppdaterad)); ?>)</i>
		</p>
		</div>


						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#klippkort" aria-expanded="true" aria-controls="collapseOne">
				          Klipp kort
				        </a>
				      </h4>
				    </div>
				    <div id="klippkort" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
						 <form class="form-inline" role="form" action="#" method="post">
						    <div class="form-group">
						    <input type="text" class="form-control" name="medlemsnummer_klippkort" id="medlemsnummer_klippkort" placeholder="Medlemsnummer" onkeypress="return isNumberKey(event)" required>
						  </div>
						  <button type="submit" name="klipp-kort" class="btn btn-default">Klipp!</button>


						</form>
				      </div>
				    </div>
				  </div>
				</div>
	</div>	
<!--
  <?php
  if(!empty($_POST))
{
	if(isset($_POST["klipp-kort"]))
	$id_medlem = $_POST["medlemsnummer_klippkort"];
	$kundnr ="";
	$fnamn ="";
	$enamn ="";

	{
		
			try {
					$query = ("SELECT kundnr, personnr, fnamn, enamn, telefon, mail, anteckning, meddelande, medlemsstart, passantal, nyckelkort FROM medlemmar WHERE kundnr ={$id_medlem}");
					$stmt = $db ->prepare($query);
					$stmt->execute();
					}
					catch (Exception $e) {
					echo "Data could not be retrieved from the database";
					exit;
					}
					$member = $stmt->fetchAll(PDO::FETCH_ASSOC);

					foreach($member as $m){
						$kundnr .= $m['kundnr'];
						$fnamn .= $m['fnamn'];
						$enamn .= $m['enamn'];
					}
					
					$stmt->closeCursor(); 



		//för att ta bort ett pass ska vi vara säkra på att passet verkligen ska tas bort.
		$klipp = '<script>if(confirm("' .$fnamn. ' ' .$enamn. ' med medlemsnummer '. $kundnr .' har 4 klipp kvar. Vill du göra ett klipp?"))
		{alert("' .$fnamn. ' ' .$enamn. ' och hon har nu 3 klipp kvar som måste förbrukas innan 2014-12-24.");}else{alert("Klippet är avbrutet");}</script>';

		echo $klipp;
	}
	}
	?>
-->
</div>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>

<?php include("inc/footer.php"); ?>







