<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/get_aktuelltschema.php"); ?>
<?php include("inc/update_schemaperioder.php"); ?>




<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


<div class="grid_9">
<form action="#">
	<div class="grid_12">

    	<div class="grid_4">
          
          <label>Vårschemat gäller från
          	<input type="text" class="tcal" name="dateVarStart" value="<?php echo $start; ?>">
          </label>
        </div>


		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateVarEnd" class="tcal" value="<?php echo $slut; ?>"></label>
        </div>
	    	

	</div>
	<div class="grid_12">
	    	
    	<div class="grid_4">
          
          <label>Sommarschemat gäller från
          	<input type="text" class="form-control"name="date" value="<?php echo $start; ?>" readonly>
          </label>
        </div>

		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateSommarEnd" class="tcal" value="<?php echo $slut; ?>"></label>
        </div>
	</div>

	<div class="grid_12">
	    	
    	<div class="grid_4">
          
          <label>Höstschemat gäller från
          	<input type="text" class="form-control" name="date" value="<?php echo $start; ?>" readonly>
          </label>
        </div>

		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateHostEnd" class="tcal" value="<?php echo $slut; ?>"></label>
        </div>
	</div>

	<div class="grid_12">
	    	
    	<div class="grid_4">
          
          <label>Vinterschemat gäller från
          	<input type="text" class="form-control" name="date" value="<?php echo $start; ?>" readonly>
          </label>
        </div>
		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateVinterEnd" class="tcal" value="<?php echo $slut; ?>"></label>
        </div>
	</div>

        <div class="grid_6">
          <button type="submit" name="submit" onclick="inc/update_schemaperioder.php" class="btn btn-default">Spara</button>
        </div>
</form>
</div> 




<?php include("inc/footer.php"); ?>