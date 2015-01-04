<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/nyamedlemmar.php"); ?>


<div class="grid_2"><?php include("inc/menystatistik.php"); ?></div> 
<div class="grid_5">

  <form method="post" action="statistik_nyamedlemmar_post.php">
     Nya medlemmar 
  <div class="grid_12">
      <div class="grid_6">
                  <label>Från
                    <input type="text" name="medlemfran" id="medlemfran" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="medlemtill" id="medlemtill" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y"))) ;?>" >
                  </label>
      </div>
</div>
      <div class="grid_12">
      <button type="submit" class="btn btn-default">Sök

       </div> 


   </form>
 </div> 


<?php include("inc/footer.php"); ?>

