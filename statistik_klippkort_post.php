<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/get_klippkort.php"); ?>


<div class="grid_2"><?php include("inc/menystatistik.php"); ?></div> 
<div class="grid_5">

<div class="grid_12">
  <form method="post" action="statistik_klippkort_post.php">
     <h4>Klippkort</h4>
    <div class="grid_12">
      <button type="submit" name="gym-klipp" class="btn btn-default">Hämta endast gymklipp
       </div> 
        <div class="grid_12">
      <button type="submit" name="pass-klipp" class="btn btn-default">Hämta endast passklipp
       </div> 

  <div class="grid_12">
      <div class="grid_6">
                  <label>Från
                    <input type="text" name="klippfran" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="klipptill" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y"))) ;?>" >
                  </label>
      </div>
</div>
        <div class="grid_12">
          <button type="submit" name="klipp-alla" class="btn btn-default">Hämta alla klipp datum
       </div> 
   </form>
</div>   






<div class="grid_12">
 <div class="panel panel-info">
  
  <div class="panel-heading">
      <th><h4><?php echo "Antal klipp: ", $antal;  ?></h4></th>
  </div>

  <div class="panel panel-default">
      <table class="table">
      <tr>
        <td><h5>Datum</h5></td>
        <td><h5>Tid</h5></td>
        <td><h5>Pass</h5></td>
        <td><h5>Gym</h5></td>
      </tr>   
    <?php echo $found; ?>
      </table> 

  </div>
  
</div>
        </div> 
  
 </div> 

<?php include("inc/footer.php"); ?>