<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>





<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


<div class="grid_8">
<form action="#">
	<div class="grid_12">

    	<div class="grid_3">
          
          <label>Vårschemat gäller från
          	<p>2014-08-05</p>
          </label>
        </div>


		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="date" class="tcal" value=""></label>
        </div>
	    	

	</div>
	<div class="grid_12">
	    	
    	<div class="grid_3">
          
          <label>Sommarschemat gäller från
          	<p>2014-08-05</p>
          </label>
        </div>

		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="date" class="tcal" value=""></label>
        </div>
	</div>

	<div class="grid_12">
	    	
    	<div class="grid_3">
          
          <label>Höstschemat gäller från
          	<p>2014-08-05</p>
          </label>
        </div>

		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="date" class="tcal" value=""></label>
        </div>
	</div>

	<div class="grid_12">
	    	
    	<div class="grid_3">
          
          <label>Vinterschemat gäller från
          	<p>2014-08-05</p>
          </label>
        </div>
		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="date" class="tcal" value=""></label>
        </div>
	</div>

        <div class="grid_6">
          <button type="submit" name="submit"  class="btn btn-default">Spara</button>
        </div>
</form>
</div> 




<?php include("inc/footer.php"); ?>