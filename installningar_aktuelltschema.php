<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/get_aktuelltschema.php"); ?>
<?php include("inc/update_schemaperioder.php"); ?>




<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


<div class="grid_9">
	<div class="grid_12">

    	<div class="grid_4">
          
          <label>Vårschemat gäller från 
          	<input type="text"  class="form-control"  name="dateVarStart" value="<?php echo $startVar; ?>"  readonly>
          </label>
        </div>


		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateVarEnd"  class="form-control"  value="<?php echo $slutVar; ?>" readonly></label>
        </div>
	    	

	</div>
	<div class="grid_12">
	    	
    	<div class="grid_4">
          
          <label>Sommarschemat gäller från
          	<input type="text" class="form-control" name="date" value="<?php echo $startSommar; ?>" readonly>
          </label>
        </div>

		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateSommarEnd" class="form-control" value="<?php echo $slutSommar; ?>" readonly></label>
        </div>
	</div>

	<div class="grid_12">
	    	
    	<div class="grid_4">
          
          <label>Höstschemat gäller från
          	<input type="text" class="form-control" name="date" value="<?php echo $startHost; ?>" readonly>
          </label>
        </div>

		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateHostEnd" class="form-control" value="<?php echo $slutHost; ?>" readonly></label>
        </div>
	</div>

	<div class="grid_12">
	    	
    	<div class="grid_4">
          
          <label>Vinterschemat gäller från
          	<input type="text" class="form-control" name="date" value="<?php echo $startVinter; ?>" readonly>
          </label>
        </div>
		<div class="grid_6">
          <label>Till  <br>
          <input type="text" name="dateVinterEnd"  class="form-control"  value="<?php echo $slutVinter; ?>"readonly></label>          
        </div>

	</div>
</div> 




<?php include("inc/footer.php"); ?>