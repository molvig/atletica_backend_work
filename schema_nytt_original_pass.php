<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>

<?php $schemasID = $_SESSION['schemaID']; ?>



<?php include("inc/get_dag_schema.php"); ?>
<?php include("inc/get_pass_schema.php"); ?>
<?php include("inc/getpass.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>
<?php include("inc/insert_pass_till_schema.php"); ?>
<!-- <?php echo $schemasID ?>
<?php echo $dagID; ?> -->


<div class="grid_2">
   <?php include("inc/menyinst_original.php"); ?>
</div>

<div class="grid_5">
  <div class="grid_12"> 
    <h3>Lägg till pass i 
      <?php if ($schemasID == 'schemaid=1'){echo "vårschema";}?>
      <?php if ($schemasID == 'schemaid=2'){echo "sommarschema";}?>
      <?php if ($schemasID == 'schemaid=3'){echo "höstschema";}?>
      <?php if ($schemasID == 'schemaid=4'){echo "vinterschema";}?>
    </h3>
  </div>

<form role="form" action="#" method="post">

  <div class="grid_12">

          <div class="grid_6">
              <label>Pass
                   <select class="form-control" id="pass" name="pass">
                    <?php echo $pass; ?>
                    </select>
              </label>
              <span class="help-block"><a href="installningar_nyttpass.php">Saknas passet? Klicka här</a></span>
          </div>

          <div class="grid_6">
              <label>Instruktör
                   <select class="form-control" id="instruktor" name="instruktor">
                    <?php echo $instnamnet; ?>
                    </select>
              </label>
              </select><span class="help-block"><a href="installningar_nyinstruktor.php">Saknas instruktören? Klicka här</a></span>
          </div>

  </div>


  <div class="grid_12">

          <div class="grid_6">
              <label>Starttid
                  <input id="datetimepicker1" type="text" class="form-control" onchange="changeHiddenStart()" >
              </label>
            <input type="hidden" id="starttid" name="starttid" value=""/>  
          </div>

          <div class="grid_6">
              <label>Sluttid
                <input id="datetimepicker2" type="text" class="form-control" onchange="changeHiddenSlut()">
              </label>
            <input type="hidden" id="sluttid" name="sluttid" value=""/>   
          </div>
  </div>


  <div class="grid_12">

          <div class="grid_6">
              <label>Veckodag
                <select name="days" class="form-control">
                  <?php if ($dagID == 'dagid=1'){echo "<option value='1'>Måndag</option>";}?>
                  <?php if ($dagID == 'dagid=2'){echo "<option value='2'>Tisdag</option>";}?>
                  <?php if ($dagID == 'dagid=3'){echo "<option value='3'>Onsdag</option>";}?>
                  <?php if ($dagID == 'dagid=4'){echo "<option value='4'>Torsdag</option>";}?>
                  <?php if ($dagID == 'dagid=5'){echo "<option value='5'>Fredag</option>";}?>
                  <?php if ($dagID == 'dagid=6'){echo "<option value='6'>Lördag</option>";}?>
                  <?php if ($dagID == 'dagid=7'){echo "<option value='7'>Söndag</option>";}?>        
                </select>
              </label>
          </div>

          <div class="grid_6">
              <label>Schema
                <select name="schema" class="form-control">
                    <?php if ($schemasID == 'schemaid=1'){echo "<option value='1'>Vår</option>";}?>
                    <?php if ($schemasID == 'schemaid=2'){echo "<option value='2'>Sommar</option>";}?>
                    <?php if ($schemasID == 'schemaid=3'){echo "<option value='3'>Höst</option>";}?>
                    <?php if ($schemasID == 'schemaid=4'){echo "<option value='4'>Vinter</option>";}?>
                </select>
              </label>
          </div>


  </div>

  <div class="grid_12">      
          <div class="grid_6">
              <label>Antal platser
                <input type="number" name="platser" min="0" max="100" class="form-control" id="platser" >
              </label>
          </div>
  </div>

  <div class="grid_12">
    <button type="submit" class="btn btn-default">Lägg till nytt pass</button>
  </div>


</form>
</div>



<script>
jQuery('#datetimepicker1').datetimepicker({
                    datepicker:false,
                    format:'H:i'
                  });

jQuery('#datetimepicker2').datetimepicker({
            datepicker:false,
            format:'H:i'
          });

  function changeHiddenStart()
  {  
  document.getElementById("starttid").value = document.getElementById("datetimepicker1").value; 
}
 
 function changeHiddenSlut()
  {  
  document.getElementById("sluttid").value = document.getElementById("datetimepicker2").value;
  }

</script>
<?php include("inc/footer.php"); ?>

