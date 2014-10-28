<?php include("inc/db_con.php"); ?>
<?php include("inc/get_pass_schema_bokningsbar.php"); ?>



<?php $_SESSION['schemaID'] = $schemaID ; ?>



<?php include("inc/header.php"); ?>

  <div class="grid_2">
  <?php include("inc/menyschema.php"); ?>
  
</div>

<div class="grid_10">


<center><h3><?php if ($schemaID == 'schemaid=1'){ 

            echo "Vårschema";

            }?>

            <?php if ($schemaID == 'schemaid=2'){ 

            echo "Sommarschema";

            }?>

            <?php if ($schemaID == 'schemaid=3'){ 

            echo "Höstschema";

            }?>

            <?php if ($schemaID == 'schemaid=4'){ 

            echo "Vinterschema";

            }?></h3></center>

<form >

<!-- Växlar mellan veckorna-->
<div class="pager">

   <input style="float:left;" type="button" class="btn btn-default" onclick="lastweek()" value="&larr; Föregående vecka" />

  <input style="float:right;"type="button" class="btn btn-default" onclick="nextweek()" value="Nästa vecka &rarr;" />
            
</div>



<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Måndag <input style="background-color:transparent; border:none" id="mon" type="text" name="monday" readonly />
		     </p> 

		    <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Tisdag <input style="background-color:transparent; border:none" id="tue" type="text" readonly />
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Onsdag <input style="background-color:transparent; border:none" id="wed" type="text" readonly />
		    </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Torsdag <input style="background-color:transparent; border:none" id="thu" type="text" readonly />
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Fredag <input style="background-color:transparent; border:none" id="fri" type="text" readonly />
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Lördag <input style="background-color:transparent; border:none" id="sat" type="text" readonly />
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>

<div class="grid_1a">
	<div class="list-group">
		  <p class="list-group-item active">
		    Söndag <input style="background-color:transparent; border:none" id="sun" type="text" readonly />
		  </p>
		  <a href="schema_extra_pass.php" class="list-group-item">Lägg till extra pass</a>

	</div>
</div>



</form>





<?php include("inc/footer.php"); ?>