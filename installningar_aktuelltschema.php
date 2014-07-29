<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>





<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


<div class="grid_8">

<p>Just nu visas schemat</p><h4>Vår</h4>
	<form role="form" action="#" method="post">

	  <div class="form-group">
	    <label for="aktuelltschema" class="col-sm-2 control-label">Välj aktuellt schema som ska visas på hemsidan:</label>
		    <div class="col-sm-4">
						<select name="schema" class="form-control">
							<option value="var">Vår</option>
							<option value="pask">Påsk</option>
							<option value="sommar">Sommar</option>
							<option value="host">Höst</option>
							<option value="vinter">Vinter</option>
							<option value="jul">Jul</option>
						</select>
		    </div>
	  </div>
	        <div class="grid_12">
	          <button type="submit" name="submit"  class="btn btn-default">Spara</button>
	        </div>
	</form>

</div>

<?php include("inc/footer.php"); ?>