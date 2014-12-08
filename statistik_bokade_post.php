<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>
<?php include("inc/getpass.php"); ?>
<?php include("inc/get_bokade_stat.php"); ?>


<div class="grid_2"><?php include("inc/menystatistik.php"); ?></div> 
<div class="grid_5">


<div class="grid_12">
  <form method="post" action="statistik_bokade_post.php">
     <h4>Sök på datumintervall</h4>
  <div class="grid_12">
      <div class="grid_6">
                  <label>Från
                    <input type="text" name="bokadefran" id="bokadefran" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));?>" >
                  </label>
      </div>
            <div class="grid_6">
                  <label>Till
                    <input type="text" name="bokadetill" id="bokadetill" class="tcal" value="<?php echo date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y"))) ;?>" >
                  </label>
      </div>
</div>
      <div class="grid_12">
      <button type="submit" class="btn btn-default">Sök på datumintervall

       </div> 
   </form>
</div>   


<div class="grid_12">
   <form method="post" action="statistik_bokade_post.php">
      <h4> Sök på instruktör </h4>
      <div class="grid_6">
        <select name="instruktor" class="form-control">
            <?php echo $instnamnet ?>
        </select>
      </div>
    <div class="grid_6">
      <button type="submit" name="inst-submit" class="btn btn-default">Sök på instruktör
    </div> 
  </form>
</div> 

<div class="grid_12">
   <form method="post" action="statistik_bokade_post.php">
      <h4> Sök på pass </h4>
    <div class="grid_6">
        <select name="pass" class="form-control">
            <?php echo $pass ?>
        </select>
      </div>
    <div class="grid_6">
      <button type="submit" class="btn btn-default">Sök på pass
    </div> 
  </form>
</div> 





<div class="grid_12">
 <div class="panel panel-info">
  
  <div class="panel-heading">
      <th><h4><?php echo "Antal pass: ";  ?></h4></th>
  </div>

  <div class="panel panel-default">
      <table class="table">
      <tr>
        <td><h5>Datum</h5></td>
        <td><h5>Pass</h5></td>
        <td><h5>Instruktör</h5></td>
        <td><h5>Antal platser</h5></td>
      </tr>   
    <?php echo $found;  ?>
      </table> 

  </div>
  
</div>
        </div> 
 </div> 
</div> 
<?php include("inc/footer.php"); ?>