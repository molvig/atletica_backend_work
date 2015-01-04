<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php	}else if ($admin_check=="repan"){ ?>
<?php	include("inc/header.php");?>
<?php	} ?>

<div class="grid_2">
	<?php include("inc/menyinst_original.php"); ?>
	
</div>

<div class="grid_8">
	<div class="jumbotron">
		  <div class="container">
		 
		  <h1>Viktigt!</h1>
		  <p>Tänk på att ändringar som du gör i originalschemat endast 
		  	påverkar kommande schema som kunderna inte har möjlighet att boka sig på än. <br>
		  	Vill du göra ändringar i veckans schema bör du gör det under schema och välja aktuell vecka.</p>
		     
		  </div>
	</div>
</div>





<?php include("inc/footer.php"); ?>