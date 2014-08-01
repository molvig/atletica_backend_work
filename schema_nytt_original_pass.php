<?php include("inc/db_con.php"); ?>

<?php $schemasID = $_SESSION['schemaID']; ?>


<?php include("inc/header.php"); ?>
<?php include("inc/get_dag_schema.php"); ?>
<?php include("inc/get_pass_schema.php"); ?>
<?php include("inc/getpass.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>



<!-- <?php echo $schemasID ?>

<?php echo $dagID; ?> -->



<center><h3>Lägg till pass i <?php if ($schemasID == 'schemaid=1'){ 

            echo "vårschema";

            }?>

            <?php if ($schemasID == 'schemaid=2'){ 

            echo "sommarschema";

            }?>

            <?php if ($schemasID == 'schemaid=3'){ 

            echo "höstschema";

            }?>

            <?php if ($schemasID == 'schemaid=4'){ 

            echo "vinterschema";

            }?></h3></center><br><br>

<form class="form-horizontal" role="form" action="#" method="post">
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
      <input type="number" name="platser" min="0" max="100" class="form-control" id="platser" >
    </div>
  </div>
    <div class="form-group">
                    <label for="datetimepicker" class="col-sm-2 control-label">Starttid</label>
                    <div class="col-sm-4">
                        <input id="datetimepicker1" type="text" class="form-control"  >
                    </div>
                  
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
                <input id="datetimepicker2" type="text" class="form-control"  >
            </div>
          
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

        <?php if ($dagID == 'dagid=1'){ 

         echo "<option value='1'>Måndag</option>";

        }?>
        <?php if ($dagID == 'dagid=2'){ 

         echo "<option value='2'>Tisdag</option>";

        }?>
        <?php if ($dagID == 'dagid=3'){ 

         echo "<option value='3'>Onsdag</option>";

        }?>
        <?php if ($dagID == 'dagid=4'){ 

         echo "<option value='4'>Torsdag</option>";

        }?>
        <?php if ($dagID == 'dagid=5'){ 

         echo "<option value='5'>Fredag</option>";

        }?>
				
        <?php if ($dagID == 'dagid=6'){ 

         echo "<option value='6'>Lördag</option>";

        }?>

        <?php if ($dagID == 'dagid=7'){ 

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
            <?php if ($schemasID == 'schemaid=1'){ 

            echo "<option value='1'>Vår</option>";

            }?>

            <?php if ($schemasID == 'schemaid=2'){ 

            echo "<option value='2'>Sommar</option>";

            }?>

            <?php if ($schemasID == 'schemaid=3'){ 

            echo "<option value='3'>Höst</option>";

            }?>

            <?php if ($schemasID == 'schemaid=4'){ 

            echo "<option value='4'>Vinter</option>";

            }?>

				</select>
    </div>
  </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Lägg till nytt pass</button>
    </div>
  </div>
</form>
</div>

<?php include("inc/footer.php"); ?>

