<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php	}else if ($admin_check=="repan"){ ?>
<?php	include("inc/header.php");?>
<?php	} ?>
<?php include("inc/getveckansfokus.php"); ?>



<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>
<div class="grid_6">

<?php
include ("inc/update_veckansfokus.php");
?>


 </div>  

<?php include("inc/footer.php"); ?>


