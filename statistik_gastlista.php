<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/get_gastlista.php"); ?>



<div class="grid_2"><?php include("inc/menystatistik.php"); ?></div> 
<div class="grid_5">

<div class="grid_12">
  <form method="post" action="statistik_gastlista_post.php">
     <h4>Gästlista</h4>
        <div class="grid_12">
          <button type="submit" name="gastlista_alla" class="btn btn-default">Hämta hela gästlistan
       </div> 
  <div class="grid_12">
      <div class="grid_6">
                  <label>Från
                    <input type="text" name="gastfran" id="gastfran" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="gasttill" id="gasttill" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y"))) ;?>" >
                  </label>
      </div>
</div>
      <div class="grid_12">
      <button type="submit" class="btn btn-default">Hämta gästlista

       </div> 
   </form>
</div>   







 </div> 
  


<?php include("inc/footer.php"); ?>