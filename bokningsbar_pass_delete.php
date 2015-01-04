<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php	}else if ($admin_check=="repan"){ ?>
<?php	include("inc/header.php");?>
<?php	} ?>
<?php include("inc/delete_bokningsbar_pass.php"); ?>
<div>
Du har nu tagit bort följande pass<br />
Pass: <?php echo $namn;?> med <?php echo $inst; ?> <br />
Datum: <?php echo $veckoDag; ?>
<br />
<?php echo $back;?>
</div>