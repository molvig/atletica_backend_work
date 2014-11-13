<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getveckansfokus.php"); ?>
<?php include("inc/boka_gast.php"); ?>
<?php include("inc/klipp_kort.php"); ?>

<div class="grid_12">
<div class="grid_3">
	<div class="panel panel-default">
 		<div class="panel-heading">
   			<h3 class="panel-title">Veckodag + datum</h3>
  		</div>
	  	<div class="panel-body">
			<div class="list-group">
				 <a href="#" class="list-group-item">  <span class="badge pull-right">bokade/antal platser</span>Passnamn</a>
			</div>
		</div>
	</div>
</div>

	<div class="grid_5">
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
						 <form class="form-inline" role="form" method="post">
						    <div class="form-group">
						    <input type="text" class="form-control" id="medlemsnummer" placeholder="Medlemsnummer" onkeypress="return isNumberKey(event)" required>
						  </div>
						  <button type="submit" class="btn btn-default">Boka medlem</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
				</div>

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

				<div class="grid_4">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a href="stall_in_pass.php">
				          Ställ in/Ändra pass
				        </a>
				      </h4>
				    </div>
				  </div>
				</div>
				</div>
		</div>



		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="panel-title">Passnamn + Datum </h3>
			</div>
			<div class="table-responsive">
			  <table class="table">
				<?php  ?>
				<tr class='alert alert-danger'>
					<td>Kundnr</td>
					<td>Fnamn</td>
					<td>Enamn</td>
					<td>dagar kvar medlemskort</td>
					<td><button type='submit' class='btn btn-default btn-sm' ><span class='glyphicon glyphicon-ok'></span></button></td>
					<td><button type='submit' class='btn btn-default btn-sm' data-toggle="tooltip" data-placement="right" title="Ta bort kund från passet"><span class='glyphicon glyphicon-trash'></span></button></td>
				</tr>
			  </table>
			</div>
		</div>
	</div>

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
						 <form class="form-inline" role="form">
						    <div class="form-group">
						    <input type="text" class="form-control" id="medlemsnummer_klippkort" placeholder="Medlemsnummer" onkeypress="return isNumberKey(event)" required>
						  </div>
						  <button type="submit" name="klipp-kort" class="btn btn-default">Klipp!</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
	</div>	



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







