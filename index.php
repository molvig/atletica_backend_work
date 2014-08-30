<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getveckansfokus.php"); ?>

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
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="panel-title">Passnamn Datum <button class="btn btn-sm btn-default_1">Ställ in passet</button></h3>
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
	</div>	



</div>


<?php include("inc/footer.php"); ?>







