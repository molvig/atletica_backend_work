<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/get_installda_pass.php"); ?>


<div class="grid_2"><?php include("inc/menystatistik.php"); ?></div> 
<div class="grid_5">

<div class="grid_12">
  <form method="post" action="statistik_installda_post.php">
     <h4>Inställda pass</h4>
        <div class="grid_12">
          <button type="submit" name="installda_alla" class="btn btn-default">Hämta alla inställda pass
       </div> 
  <div class="grid_12">
      <div class="grid_6">
                  <label>Från
                    <input type="text" name="instfran" id="instfran" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="insttill" id="insttill" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y"))) ;?>" >
                  </label>
      </div>
</div>
      <div class="grid_12">
      <button type="submit" name="installda_datum" class="btn btn-default">Hämta inställda pass

       </div> 
   </form>
</div>   







 </div> 
  
  


<?php include("inc/footer.php"); ?>