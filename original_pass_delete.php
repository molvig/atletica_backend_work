<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/delete_pass_orginal.php"); ?>
<div>
<div class="grid_1">
</div>
<div class="grid_6">	
<h3>Du har nu tagit bort följande pass</h3>
<p>Pass: <?php echo $namn;?> med <?php echo $inst; ?> </p>
<p>Dag: <?php echo $day; ?></p>
<p>Tid: <?php echo $starttid;?>-<?php echo $sluttid; ?> </p>

<?php echo $back;?>
</div>