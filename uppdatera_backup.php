<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/update_pass_bokningsbar.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>



<script type="text/javascript">
  //document.getElementById("starttid").value = document.getElementById("datetimepicker1").value;
  //$( "#datetimepicker1" ).click(function() {  
  function changeHiddenStart(text)
  {  
    //alert(text);
  document.getElementById("starttid").value = text; //document.getElementById("datetimepicker1").value;  
}

 function changeHiddenSlut(text)
  {  
  document.getElementById("sluttid").value = text; //document.getElementById("datetimepicker2").value;  
}
</script>

<div class="grid_2">
   <?php include("inc/menyschema.php"); ?>
</div>

<div class="grid_7">
<h3>Uppdatera pass i schema 2014</h3>

<?php $scid = $passObj['schematyp']; ?>

<form role="form" action="#" method="post" name="updateForm" >
<script>
  function test(){
    alert("något");
  }
</script>

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
                        <input id="datetimepicker1" type="text" class="form-control" onChange="changeHiddenStart(this.value)" value="<?php echo $passObj['sttid']; ?>">
                  <input type="hidden" id="starttid" name="starttid" value=""/> 

                <script>
                  jQuery('#datetimepicker1').datetimepicker({
                    datepicker:false,
                    format:'H:i'                    
                  });
                </script> 
          </div>
          <div class="grid_1"></div>
          <div class="grid_5">

 
            <label>Sluttid</label>
                <input id="datetimepicker2" type="text" class="form-control" onchange="changeHiddenSlut(this.value)" value="<?php echo $passObj['sltid']; ?>" >
          <input type="hidden" id="sluttid" name="sluttid" value=""/> 
        <script>
          jQuery('#datetimepicker2').datetimepicker({
            datepicker:false,
            format:'H:i'
          });
        </script> 
</div>

          </div>
  </div>

  <div class="grid_12">      
          <div class="grid_5">
              <label>Antal platser</label>
                <input type="number" class="form-control" name="platser" min="0" max="100"  id="platser" value="<?php echo $passObj['antalplatser']; ?>" onkeypress="return isNumberKey(event)" required >
              
          </div>
           <div class="grid_1"></div>
          <div class="grid_5">
              <label>Kommentar</label>
                <input type="text" name="information" class="form-control" id="information" value="<?php echo $info; ?>">
              
          </div>
  </div>





  
  <div class="grid_12">
          <div class="grid_5">
              <label>Veckodag </label>
                <select name="days" class="form-control">
                  <?php if ($passObj['veckodag'] == '1'){echo "<option value='1'>Måndag</option>";}?>
                  <?php if ($passObj['veckodag'] == '2'){echo "<option value='2'>Tisdag</option>";}?>
                  <?php if ($passObj['veckodag'] == '3'){echo "<option value='3'>Onsdag</option>";}?>
                  <?php if ($passObj['veckodag'] == '4'){echo "<option value='4'>Torsdag</option>";}?>
                  <?php if ($passObj['veckodag'] == '5'){echo "<option value='5'>Fredag</option>";}?>
                  <?php if ($passObj['veckodag'] == '6'){echo "<option value='6'>Lördag</option>";}?>
                  <?php if ($passObj['veckodag'] == '7'){echo "<option value='7'>Söndag</option>";}?>        
                </select>
          </div>
          <div class="grid_1"></div>
          <div class="grid_5">
              <label>Schema</label>
                <select name="schema" class="form-control">
                  <?php if ($passObj['schematyp'] == '1'){echo "<option value='1'>Vår</option>";}?>
                  <?php if ($passObj['schematyp'] == '2'){echo "<option value='2'>Sommar</option>";}?>
                  <?php if ($passObj['schematyp'] == '3'){echo "<option value='3'>Höst</option>";}?>
                  <?php if ($passObj['schematyp'] == '4'){echo "<option value='4'>Vinter</option>";}?>
                </select>
          </div>
  </div>

  

  <div class="grid_12">
    
      <button type="submit" name="update" class="btn btn-default">Uppdatera</button>
      <button type="submit" name="cancel" class="btn btn-default">Avbryt</button>
      <button type="submit" formaction="stall_in_schema.php?passid=<?php echo $passid;?>" name="stall_in" class="btn btn-default" >Ställ in</button>
  </div>
  

</form>
</div>






<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<?php include("inc/footer.php"); ?>

