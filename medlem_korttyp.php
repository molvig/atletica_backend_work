<?php include("inc/db_con.php"); ?>
<?php include("inc/korttyp.php"); ?>
<?php include("inc/header.php"); ?>


<div class="grid_12">
  <div class="grid_12">
        <div class="grid_2"></div>
        <div class="grid_7">
          <center>
            <h3>Sök efter typ av medlemskort </h3>
            <p>Välj vilket typ av medlemsskap. 
             </p>
          </center>
        </div>
        <div class="grid_3"></div>
  </div>


  <div class="grid_12">
      <form role="form" method="GET" action="search_korttyp.php">
        <div class="grid_2"></div>
        <div class="grid_7">
          <center>
            <label>Välj korttyp
              <select type="search" class="form-control" name="korttyp" id="korttyp" >
              <?php echo $kort ?> 
              </select>
             
            </label>
          </center>
        </div>
        <div class="grid_3"></div>   
  </div>


  <div class="grid_12">
        <div class="grid_2"></div> 
        <div class="grid_7">
          <center>
            <button type="submit" name="submit"  class="btn btn-default">Sök</button>
          </center>
        </div>
        <div class="grid_3"></div>    
  </div>
   
      </form>
</div>

	<br>
  <br>
  <br>
  <br>
  <br>
  <br>
  


<?php include("inc/footer.php"); ?>

