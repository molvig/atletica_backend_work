<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/nyamedlemmar.php"); ?>


<div class="grid_2"><?php include("inc/menystatistik.php"); ?></div> 
<div class="grid_5">



  <form method="post" action="statistik_nyamedlemmar_post.php">
     Nya medlemmar 
  <div class="grid_12">
      <div class="grid_6">
                  <label>Från
                    <input type="text" name="medlemfran" id="medlemfran" class="tcal" value="<?php echo $medlemfran; ?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="medlemtill" id="medlemtill" class="tcal" value="<?php echo $medlemtill; ?>" >
                  </label>
      </div>
</div>
      <div class="grid_12">
      <button type="submit" class="btn btn-default">Sök

       </div> 


   </form>
 



<div class="grid_12">
 <div class="panel panel-info">
  
  <div class="panel-heading">
      <th><h4><?php echo "Nya medlemmar: ", $antal;  ?></h4></th>
  </div>

  <div class="panel panel-default">
      <table class="table">
      <tr>
        <td><h5>Kundnummer</h5></td>
        <td><h5>Förnamn</h5></td>
        <td><h5>Efternamn</h5></td>
        <td><h5>Medlem sedan</h5></td>
      </tr>   
    <?php echo $found; ?>
      </table> 

  </div>
  
</div>
        </div> 
 </div> 
</div> 
<?php include("inc/footer.php"); ?>

