<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/get_aktuelltschema.php"); ?>





<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


<div class="grid_9">
<form action="#">
	<div class="grid_12">

    	<div class="grid_4">
          
          <label>Vårschemat gäller från
          	<input type="text" class="form-control" name="date" value="<?php echo $start; ?>" readonly>
          </label>
        </div>


		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="date" class="tcal" value="<?php echo $slut; ?>"></label>
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
          <input type="text" name="date" class="tcal" value="<?php echo $slut; ?>"></label>
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
          <input type="text" name="date" class="tcal" value="<?php echo $slut; ?>"></label>
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
          <input type="text" name="date" class="tcal" value="<?php echo $slut; ?>"></label>
        </div>
	</div>

        <div class="grid_6">
          <button type="submit" name="submit"  class="btn btn-default">Spara</button>
        </div>
</form>
</div> 




<?php include("inc/footer.php"); ?>