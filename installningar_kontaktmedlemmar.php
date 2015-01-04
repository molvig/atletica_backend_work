<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/get_meddelande.php"); ?>



<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>
<div class="grid_6">

 	<form role="form" action="" method="post">

    

    

          <div class="grid_12">

              <label><h3>Meddela alla medlemmar</h3>
              <textarea class="form-control" rows="20" style="width:400px;" name="meddelande_text" id="meddelande_text"> 
                <?php echo $meddelande;  ?>
              </textarea></label><br>


               

		</div>

        
        <div class="grid_12">
          <button type="submit" name="submit"  class="btn btn-default">Uppdatera</button>
        </div>



<?php include("inc/update_meddelande.php"); ?>
  </form>


 </div>  

<?php include("inc/footer.php"); ?>


