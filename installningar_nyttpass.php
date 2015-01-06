<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/getpass.php"); ?>
<div class="grid_12">

<div class="grid_2">
	<?php include("inc/menyinst.php"); ?>
	
</div>


	<div class="grid_3">
<form class="form-group" role="form" method="post" action="#">
  <div class="form-group">
    <label for="nyttpass">Passnamn</label>
    <input type="text" class="form-control" id="nyttpass" name="nyttpass" placeholder="Namn på nya passet">
    </div>
    <div class="form-group">
    <label for="passbeskrivning">Passbeskrivning</label>
    <textarea type="text" class="form-control" id="passbeskrivning" name="passbeskrivning"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Spara</button>
   <?php if(isset($_SESSION["backurl"]))
  { $back = $_SESSION["backurl"]; ?>  
  <a href='<?php echo $back; ?>' class="btn btn-default">Tillbaka</a>  
  <?php $_SESSION['backurl']=NULL; } ?>
</form>

<?php include("inc/insert_nyttpass.php");?>


</div>
<div class="grid_2">
</div>

<div class="grid_4">
<h4>Pass som finns sparade:</h4>	
<?php echo $passnamnet ?>
</div>




</div>
<?php include("inc/footer.php"); ?>