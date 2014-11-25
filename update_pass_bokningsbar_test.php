<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/update_pass_bokningsbar.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>

<?php 
$schemaID = htmlspecialchars($_GET["schemaid"]); 
$dagID = htmlspecialchars($_GET["dagid"]);
$dat = htmlspecialchars($_GET["date"]);
$datum = date('d-m-Y', strtotime($dat));
?>

<div class="grid_2">
   <?php include("inc/menyschema.php"); ?>
</div>

<div class="grid_5">
  <div class="grid_12"> 
    <h3>Lägg till extrapass i 
      <?php if ($schemaID == '1'){echo "vårschema";}?>
      <?php if ($schemaID == '2'){echo "sommarschema";}?>
      <?php if ($schemaID == '3'){echo "höstschema";}?>
      <?php if ($schemaID == '4'){echo "vinterschema";}?>
    </h3>
  </div>

<form role="form" action="#" method="post">
    <div class="grid_12">

          <div class="grid_12">
              <label>Datum
                   <input type="text" name="datum" class="form-control" id="datum" value="<?php echo $datum; ?>" readonly >
                    
                    </select>
              </label>

          </div>
  </div>

  <div class="grid_12">

          <div class="grid_6">
              <label>Pass
                   <select class="form-control" id="pass" name="pass" required>
                    <?php echo $pass; ?>
                    </select>
              </label>
              <span class="help-block"><a href="installningar_nyttpass.php">Saknas passet? Klicka här</a></span>
          </div>

          <div class="grid_6">
              <label>Instruktör
                   <select class="form-control" id="instruktor" name="instruktor" required>
                    <?php echo $instnamnet; ?>
                    </select>
              </label>
              </select><span class="help-block"><a href="installningar_nyinstruktor.php">Saknas instruktören? Klicka här</a></span>
          </div>

  </div>


  <div class="grid_12">

          <div class="grid_6">
              <label>Starttid
                  <input id="datetimepicker1" type="text" class="form-control" onchange="changeHiddenStart()" onkeypress="return isNumberKey(event)" required>
              </label>
            <input type="hidden" id="starttid" name="starttid" value=""/>  
          </div>

          <div class="grid_6">
              <label>Sluttid
                <input id="datetimepicker2" type="text" class="form-control" onchange="changeHiddenSlut()" onkeypress="return isNumberKey(event)" required>
              </label>
            <input type="hidden" id="sluttid" name="sluttid" value=""/>   
          </div>
  </div>


  <div class="grid_12">

          <div class="grid_6">
              <label>Veckodag
                <select name="days" class="form-control">
                  <?php if ($dagID == '1'){echo "<option value='1'>Måndag</option>";}?>
                  <?php if ($dagID == '2'){echo "<option value='2'>Tisdag</option>";}?>
                  <?php if ($dagID == '3'){echo "<option value='3'>Onsdag</option>";}?>
                  <?php if ($dagID == '4'){echo "<option value='4'>Torsdag</option>";}?>
                  <?php if ($dagID == '5'){echo "<option value='5'>Fredag</option>";}?>
                  <?php if ($dagID == '6'){echo "<option value='6'>Lördag</option>";}?>
                  <?php if ($dagID == '7'){echo "<option value='7'>Söndag</option>";}?>        
                </select>
              </label>
          </div>

          <div class="grid_6">
              <label>Schema
                <select name="schema" class="form-control">
                    <?php if ($schemaID == '1'){echo "<option value='1'>Vår</option>";}?>
                    <?php if ($schemaID == '2'){echo "<option value='2'>Sommar</option>";}?>
                    <?php if ($schemaID == '3'){echo "<option value='3'>Höst</option>";}?>
                    <?php if ($schemaID == '4'){echo "<option value='4'>Vinter</option>";}?>
                </select>
              </label>
          </div>


  </div>

  <div class="grid_12">      
          <div class="grid_6">
              <label>Antal platser
                <input type="number" class="form-control" name="platser" min="0" max="100"  id="platser" onkeypress="return isNumberKey(event)" required >
              </label>
          </div>
    
          <div class="grid_6">
              <label>Kommentar
                <input type="text" name="information" class="form-control" id="information" placeholder="Ex. Ny koreografi" >
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
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<?php include("inc/footer.php"); ?>