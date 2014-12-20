<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/delete_pass_orginal.php"); ?>
<div>
Du har nu tagit bort följande pass<br />
Pass: <?php echo $namn;?> med <?php echo $inst; ?> <br />
Dag: <?php echo $day; ?><br />
Tid: <?php echo $starttid;?>-<?php echo $sluttid; ?> <br />

<?php echo $back;?>
</div>