<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>

<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


<div class="grid_3">
<form class="form-group" role="form" method="post" action="#">
  <div class="form-group">
    <label for="nyinst">Lägg till en ny instruktör</label>
    <input type="text" class="form-control" id="nyinst" name="nyinst" placeholder="Namn på instruktören">
  </div>
  <button type="submit" class="btn btn-default">Spara</button>
</form>

<?php include("inc/insert_nyinstruktor.php"); ?>
</div>

<div class="grid_2">

	
</div>
<div class="grid_4">
<h4>Instruktörer som finns sparade:</h4>	
<?php echo $instnamnet ?>
</div>




<?php include("inc/footer.php"); ?>