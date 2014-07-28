<?php include("inc/db_con.php"); ?>

<?php include("inc/header.php"); ?>

<div class="grid_2">
  <?php include("inc/menyinst.php"); ?>
  
</div>
<div class="grid_8">
    <div class="grid_12">
      <div class="grid_12">
            <div class="grid_3"></div>
            <div class="grid_6">
            	<center>
                <h3>Ta bort en medlem</h3>
                 <h4 style="color:red">OBS! Detta går inte ångra. </h4>
                <p>Du kan söka på förnamn, efternamm, personnummer (ex 861128) eller kundnummer. <br> 
                Tänk på att sökordet måste vara minst 4 tecken långt. </p>
              </center>
            </div>
            <div class="grid_3"></div>
      </div>


      <div class="grid_12">
          <form role="form" method="GET" action="delete_medlem.php">
            <div class="grid_3"></div>
            <div class="grid_6">
              <center>
                <label>Sök efter en medlem
                  <input type="search" class="form-control" name="medlem" id="medlem" placeholder="">
                </label>
              </center>
            </div>
            <div class="grid_3"></div>   
      </div>


      <div class="grid_12">
            <div class="grid_3"></div> 
            <div class="grid_6">
              <center>
                <button type="submit" name="submit"  class="btn btn-default">Sök</button>
              </center>
            </div>
            <div class="grid_3"></div>    
      </div>
       
          </form>
    </div>


</div>



<?php include("inc/footer.php"); ?>