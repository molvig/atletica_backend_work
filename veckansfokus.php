<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>


<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


 	 <form role="form" action="veckansfokus.php" method="post">

    <div class="grid_6">

    

          <div class="grid_12">

              <label>Veckans fokus
              <textarea class="form-control"  name="fokus" id="fokus" value=""></textarea></label><br>
              <i>Senast ändrad: <?php ?></i>
		</div>

        
        <div class="grid_12">
          <button type="submit" name="submit"  class="btn btn-default">Uppdatera</button>
        </div>

</div>


    </form>





<?php include("inc/footer.php"); ?>