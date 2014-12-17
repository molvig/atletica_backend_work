<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getpass.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>
<?php include("inc/insert_extrapass.php"); ?>


<?php 
$schemaID = htmlspecialchars($_GET["schemaid"]); 
$dagID = htmlspecialchars($_GET["dagid"]);
$dat = htmlspecialchars($_GET["date"]);
$datum = date('d-m-Y', strtotime($dat));
?>

<div class="grid_2">
   <?php include("inc/menyschema.php"); ?>
</div>

<div class="grid_7">
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
              </label>

          </div>
  </div>

  <div class="grid_12">

          <div class="grid_5">
              <label>Pass</label>
                   <select class="form-control" id="pass" name="pass" required>
                    <?php echo $pass; ?>
                    </select>
              
              <span class="help-block"><a href="installningar_nyttpass.php">Saknas passet? Klicka här</a></span>
          </div>
<div class="grid_1"></div>
          <div class="grid_5">
              <label>Instruktör</label>
                   <select class="form-control" id="instruktor" name="instruktor" required>
                    <?php echo $instnamnet; ?>
                    </select>
              
              </select><span class="help-block"><a href="installningar_nyinstruktor.php">Saknas instruktören? Klicka här</a></span>
          </div>

  </div>


  <div class="grid_12">

          <div class="grid_5">
              <label>Starttid</label>
                  <input id="datetimepicker1" type="text" class="form-control" onchange="changeHiddenStart()" onkeypress="return isNumberKey(event)" required>
              
            <input type="hidden" id="starttid" name="starttid" value=""/>  
          </div>
          <div class="grid_1"></div>
          <div class="grid_5">
              <label>Sluttid </label>
                <input id="datetimepicker2" type="text" class="form-control" onchange="changeHiddenSlut()" onkeypress="return isNumberKey(event)" required>
             
            <input type="hidden" id="sluttid" name="sluttid" value=""/>   
          </div>
  </div>


  <div class="grid_12">

          <div class="grid_5">
              <label>Veckodag </label>
                <select name="days" class="form-control">
                  <?php if ($dagID == '1'){echo "<option value='1'>Måndag</option>";}?>
                  <?php if ($dagID == '2'){echo "<option value='2'>Tisdag</option>";}?>
                  <?php if ($dagID == '3'){echo "<option value='3'>Onsdag</option>";}?>
                  <?php if ($dagID == '4'){echo "<option value='4'>Torsdag</option>";}?>
                  <?php if ($dagID == '5'){echo "<option value='5'>Fredag</option>";}?>
                  <?php if ($dagID == '6'){echo "<option value='6'>Lördag</option>";}?>
                  <?php if ($dagID == '7'){echo "<option value='7'>Söndag</option>";}?>        
                </select>
             
          </div>
          <div class="grid_1"></div>
          <div class="grid_5">
              <label>Schema</label>
                <select name="schema" class="form-control">
                    <?php if ($schemaID == '1'){echo "<option value='1'>Vår</option>";}?>
                    <?php if ($schemaID == '2'){echo "<option value='2'>Sommar</option>";}?>
                    <?php if ($schemaID == '3'){echo "<option value='3'>Höst</option>";}?>
                    <?php if ($schemaID == '4'){echo "<option value='4'>Vinter</option>";}?>
                </select>
              
          </div>


  </div>

  <div class="grid_12">      
          <div class="grid_5">
              <label>Antal platser</label>
                <input type="number" class="form-control" name="platser" min="0" max="100"  id="platser" value="20" onkeypress="return isNumberKey(event)" required >
              
          </div>
           <div class="grid_1"></div>
          <div class="grid_5">
              <label>Kommentar</label>
                <input type="text" name="information" class="form-control" id="information" placeholder="Ex. Ny koreografi" >
              
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

