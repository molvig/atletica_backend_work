<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php	}else if ($admin_check=="repan"){ ?>
<?php	include("inc/header.php");?>
<?php	} ?>
<?php include("inc/get_gast.php"); ?>


<div class="grid_8">
<form role="form" action="index.php" method="post">
				    <div class="grid_12">

				          <div class="grid_12">
				              <label>GästID
				                   <input type="text" name="gastID" class="form-control" id="gastID" value="<?php echo $gastID;?>" readonly >
				              </label>

				          </div>
				  </div>

				  <div class="grid_12">

				          <div class="grid_6">
				              <label>Förnamn
				                   <input type="text" name="fnamn" class="form-control" id="fnamn" value="<?php echo $fnamn;?>" readonly>
				              </label>
				          </div>

				          <div class="grid_6">
				              <label>Efternamn
				                   <input type="text" name="enamn" class="form-control" id="enamn" value="<?php echo $enamn;?>" readonly>
				              </label>
				              </select>
				          </div>

				  </div>


				  <div class="grid_12">

				          <div class="grid_6">
				              <label>Telefon
				                  <input id="tele" name="tele" type="text" class="form-control" value="<?php echo $tel;?>" readonly >
				              </label>
				          </div>

				          <div class="grid_6">
				              <label>Mail
				                  <input id="mail" name="mail" type="tel" class="form-control" value="<?php echo $mail;?>" readonly >
				              </label>
				 
				          </div>
				  </div>


				  <div class="grid_12">
				    <input type="submit" class="btn btn-default" name="andra_pass" value="Tillbaka"/>
				  </div>


				</form>

</div>












<?php include("inc/footer.php"); ?>