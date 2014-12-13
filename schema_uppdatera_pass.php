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

<h3>Uppdatera pass i schema 2014</h3>
<?php $scid = $passObj['schematyp']; ?>
<form class="form-horizontal" role="form" action="#" name="updateForm" method="post">
<script>
  function test(){
    alert("något");
  }
</script>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pass</label>
    <div class="col-sm-4">
     <select name="pass" class="form-control">
          <?php echo $pass ?> 
        </select><span class="help-block"><a href="installningar_nyttpass.php">Saknas passet? Klicka här</a></span>
    </div>
  </div>
    <div class="form-group">
    <label for="platser" class="col-sm-2 control-label">Antal platser</label>
    <div class="col-sm-4">
      <input type="number" name="platser" min="0" max="100" class="form-control" id="platser" onkeypress="return isNumberKey(event)" value="<?php echo $passObj['antalplatser']; ?>" >
    </div>
  </div>
    <div class="form-group">
                    <label for="datetimepicker" class="col-sm-2 control-label">Starttid</label>
                    <div class="col-sm-4">
                        <input id="datetimepicker1" type="text" class="form-control" onChange="changeHiddenStart(this.value)" value="<?php echo $passObj['sttid']; ?>">
                    </div>
                  <input type="hidden" id="starttid" name="starttid" value=""/> 

                <script>
                  jQuery('#datetimepicker1').datetimepicker({
                    datepicker:false,
                    format:'H:i'                    
                  });
                </script> 
  </div>
  
  <div class="form-group">
            <label for="datetimepicker" class="col-sm-2 control-label">Sluttid</label>
            <div class="col-sm-4">
                <input id="datetimepicker2" type="text" class="form-control" onchange="changeHiddenSlut(this.value)" value="<?php echo $passObj['sltid']; ?>" >
            </div>
          <input type="hidden" id="sluttid" name="sluttid" value=""/> 
        <script>
          jQuery('#datetimepicker2').datetimepicker({
            datepicker:false,
            format:'H:i'
          });
        </script> 
</div>
  </div>

 <!--<div class="form-group">
  <div class="col-sm-10">
    <label for="tiden" class="col-sm-2 control-label">Tid</label>
    <input type="time">
    <input type="date" class="form-control" id="tiden">
</div> 
   </div> -->
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Veckodag</label>
    <div class="col-sm-4">
        <select name="days" class="form-control">

        <?php if ($passObj['veckodag'] == '1'){ 

         echo "<option value='1'>Måndag</option>";

        }?>
        <?php if ($passObj['veckodag'] == '2'){ 

         echo "<option value='2'>Tisdag</option>";

        }?>
        <?php if ($passObj['veckodag'] == '3'){ 

         echo "<option value='3'>Onsdag</option>";

        }?>
        <?php if ($passObj['veckodag'] == '4'){ 

         echo "<option value='4'>Torsdag</option>";

        }?>
        <?php if ($passObj['veckodag'] == '5'){ 

         echo "<option value='5'>Fredag</option>";

        }?>
        
        <?php if ($passObj['veckodag'] == '6'){ 

         echo "<option value='6'>Lördag</option>";

        }?>

        <?php if ($passObj == '7'){ 

         echo "<option value='7'>Söndag</option>";

        }?>        

        </select>
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Instruktör</label>
    <div class="col-sm-4">     
     <select name="instruktor" class="form-control">
          <?php echo $instnamnet ?>
        </select><span class="help-block"><a href="installningar_nyinstruktor.php">Saknas instruktören? Klicka här</a></span>
    </div>
    </div>
  </div>
  </div>
    <div class="form-group">
    <label for="schema" class="col-sm-2 control-label">Vilket schema?</label>
    <div class="col-sm-4">
        <select name="schema" class="form-control">
            <?php if ($passObj['schematyp'] == '1'){ 

            echo "<option value='1'>Vår</option>";

            }?>

            <?php if ($passObj['schematyp'] == '2'){ 

            echo "<option value='2'>Sommar</option>";

            }?>

            <?php if ($passObj['schematyp'] == '3'){ 

            echo "<option value='3'>Höst</option>";

            }?>

            <?php if ($passObj['schematyp'] == '4'){ 

            echo "<option value='4'>Vinter</option>";

            }?>

        </select>
    </div>
  </div>
  </div>
    <div class="form-group">
    <label for="information" class="col-sm-2 control-label">Kommentar</label>
    <div class="col-sm-4">     
    <input type="text" name="information" class="form-control" id="information" value="<?php echo $info; ?>" >
    </div>
    </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    
      <button type="submit" name="update" class="btn btn-default">Uppdatera</button>
      <button type="submit" name="cancel" class="btn btn-default">Avbryt</button>
      <button type="submit" name="stall_in" class="btn btn-default">Ställ in</button>
    </div>
  
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

