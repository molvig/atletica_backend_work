<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<!--<?php include("inc/getpass.php"); ?>-->
<?php include("inc/getinstruktorer.php"); ?>
<?php include("inc/update_pass_orginalschema.php"); 
$_SESSION["backurl"] = $_SERVER["REQUEST_URI"]; ?>

<div class="grid_1">
</div>
<div class="grid_7">
<h3>Uppdatera pass i schema 2014</h3>
<?php $scid = $passObj['schematyp']; //schema_uppdatera_original.php?schemaid=<?php echo $scid; ?>
<form role="form" action="#" method="post">

   <div class="grid_12">
           <div class="grid_6">
              <label>Pass </label>
                   <select class="form-control" id="pass" name="pass">
                    <?php echo $pass; ?>
                    </select>
              
              <span class="help-block"><a href="installningar_nyttpass.php">Saknas passet? Klicka här</a></span>
          </div>
          <div class="grid_6">
              <label>Instruktör</label>
                   <select class="form-control" id="instruktor" name="instruktor">
                    <?php echo $instnamnet; ?>
                    </select>
              
              </select><span class="help-block"><a href="installningar_nyinstruktor.php">Saknas instruktören? Klicka här</a></span>
          </div>

   </div>       

  <div class="grid_12">

          <div class="grid_6">
              <label>Starttid</label>
                  <input id="datetimepicker1" type="text" class="form-control" onChange="changeHiddenStart(this.value)" value="<?php echo $passObj['sttid']; ?>">
              
            <input type="hidden" id="starttid" name="starttid" value=""/>  
          </div>

          <div class="grid_6">
              <label>Sluttid</label>
               <input id="datetimepicker2" type="text" class="form-control" onchange="changeHiddenSlut(this.value)" value="<?php echo $passObj['sltid']; ?>" >
              
            <input type="hidden" id="sluttid" name="sluttid" value=""/>   
          </div>
  </div>

  <div class="grid_12">

          <div class="grid_6">
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

          <div class="grid_6">
              <label>Schema </label>
                <select name="schema" class="form-control">
            <?php if ($passObj['schematyp'] == '1'){echo "<option value='1'>Vår</option>";}?>
            <?php if ($passObj['schematyp'] == '2'){echo "<option value='2'>Sommar</option>";}?>
            <?php if ($passObj['schematyp'] == '3'){echo "<option value='3'>Höst</option>";}?>
            <?php if ($passObj['schematyp'] == '4'){echo "<option value='4'>Vinter</option>";}?>
                </select>
              
          </div>


  </div>
  <div class="grid_12">      
          <div class="grid_6">
              <label>Antal platser </label>
                <input type="number" name="platser" min="0" max="100" class="form-control" id="platser" value="<?php echo $passObj["antalplatser"];?>"required>
              
          </div>
  </div>
  


   <div class="grid_12">
    
      <button type="submit" name="update" class="btn btn-default">Uppdatera</button>
      <button type="submit" name="cancel" class="btn btn-default">Avbryt</button>
      <button type="submit" name="delete" class="btn btn-default">Ta Bort</button>
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
<?php include("inc/footer.php"); ?>


