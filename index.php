<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getveckansfokus.php"); ?>

<div class="grid_12">
<div class="grid_3">
	<div class="panel panel-default">
 		<div class="panel-heading">
   			<h3 class="panel-title">Måndag 21 Juli</h3>
  		</div>
	  	<div class="panel-body">
			<div class="list-group">
				 <a href="#" class="list-group-item">  <span class="badge pull-right">10/24</span>Bodypump</a>
			</div>
		</div>
	</div>
</div>

	<div class="grid_5">
		<div class="panel panel-default">
			<div class="panel-heading">
			    <h3 class="panel-title">Bodypump Måndag 21 Juli</h3>
			</div>
			<div class="table-responsive">
			  <table class="table">
				<?php  ?>
				<tr class='alert alert-danger'>
					<td>Jennie</td>
					<td>Molvig</td>
					<td>9609</td>
					<td><button type='submit' class='btn btn-default btn-sm' ><span class='glyphicon glyphicon-ok'></span></button></td>
					<td><button type='submit' class='btn btn-default btn-sm' data-toggle="tooltip" data-placement="right" title="Ta bort kund från passet"><span class='glyphicon glyphicon-trash'></span></button></td>
				</tr>
			  </table>
			</div>
		</div>
	</div>

<div class="grid_2">
</div>

	<div class="grid_2">
		<div class="sticky taped">
		<p >
			<strong>VECKANS FOKUS</strong><br />
			<?php echo $veckansfokus_text; ?>
			<br />
			<br />
			<i>Uppdaterad: <?php echo $uppdaterad; ?></i>
		</p>
		</div>
	</div>	



</div>


<?php include("inc/footer.php"); ?>







