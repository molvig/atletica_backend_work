
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
                    <input type="text" name="gastfran" id="gastfran" class="tcal" value="<?php echo $gastfran;?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="gasttill" id="gasttill" class="tcal" value="<?php echo $gasttill;?>" >
                  </label>
      </div>
</div>
      <div class="grid_12">
      <button type="submit" name="gastlista_datum" class="btn btn-default">Hämta gästlista

       </div> 
   </form>
</div>   


<div class="grid_12">
 <div class="panel panel-info">
  
  <div class="panel-heading">
      <th><h4><?php echo "Antal gäster: ", $antal;  ?></h4></th>
  </div>

  <div class="panel panel-default">
      <table class="table">
      <tr>
        <td><h5>Förnamn</h5></td>
        <td><h5>Efternamn</h5></td>
        <td><h5>Telefon</h5></td>
        <td><h5>Mail</h5></td>
        <td><h5>Gästtränade</h5></td>
      </tr>   
    <?php echo $found; ?>
      </table> 

  </div>
  
</div>
        </div> 




 </div> 
  


<?php include("inc/footer.php"); ?>

