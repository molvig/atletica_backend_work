<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/skuld.php"); ?>




  <div class="grid_2"> <?php include("inc/menymedlem.php"); ?></div>

<div class="grid_8">

  <h3>Skuldlista </h3>


		      <table class="table">
		      <tr>

		        <td><h5>Passdatum</h5></td>
		        <td><h5>Starttid</h5></td>
		        <td><h5>Pass</h5></td>
		       	<td><h5>Orsak</h5></td>
		        <td><h5>Kundnummer</h5></td>
		        <td><h5>Förnamn</h5></td>
		        <td><h5>Efternamn</h5></td>
		       	<td><h5>Ta bort</h5></td>
		      </tr>   
			
		    <?php echo $found; ?>

		      </table> 





  </div>





  <?php include("inc/footer.php"); ?>