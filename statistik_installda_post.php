<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
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
                    <input type="text" name="instfran" id="instfran" class="tcal" value="<?php echo $instfran;?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="insttill" id="insttill" class="tcal" value="<?php echo $insttill ;?>" >
                  </label>
      </div>
</div>
      <div class="grid_12">
      <button type="submit" name="installda_datum" class="btn btn-default">Hämta inställda pass

       </div> 
   </form>
</div>   

<div class="grid_12">
 <div class="panel panel-info">
  
  <div class="panel-heading">
      <th><h4><?php echo "Antal inställda pass: ", $antal;  ?></h4></th>
  </div>

  <div class="panel panel-default">
      <table class="table">
      <tr>
        <td><h5>Datum</h5></td>
        <td><h5>Pass</h5></td>
        <td><h5>Instruktör</h5></td>
        <td><h5>Orsak</h5></td>
      </tr>   
    <?php echo $found; ?>
      </table> 

  </div>
  
</div>
        </div> 
  


<?php include("inc/footer.php"); ?>