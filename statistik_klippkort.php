<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
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

 </div> 
  
  


<?php include("inc/footer.php"); ?>