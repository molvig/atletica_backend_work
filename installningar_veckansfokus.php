<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/getveckansfokus.php"); ?>



<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>
<div class="grid_6">

 	<form role="form" action="installningar_veckansfokus_post.php" method="post">

    

    

          <div class="grid_12">

              <label><h3>Veckans fokus</h3>
              <textarea class="form-control" rows="20" style="width:400px;" name="veckansfokus_uppdatera" id="veckansfokus_uppdatera"> 
                <?php echo $veckansfokus_text ;  ?>
              </textarea></label><br>
              <i>Senast ändrad: <?php echo $uppdaterad; ?></i>

               

		</div>

        
        <div class="grid_12">
          <button type="submit" name="submit"  class="btn btn-default">Uppdatera</button>
        </div>



<?php include("inc/update_veckansfokus.php"); ?>
  </form>


 </div>  

<?php include("inc/footer.php"); ?>


