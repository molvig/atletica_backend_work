<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/stall_in_andra.php"); ?>	


  			<form class="form-inline" role="form" method="post">
			<div class="form-group">
			<input type="text" class="form-control" name="orsak" placeholder="Varför ställs passet in?" required>
			</div>
			<button type="submit" name="stall-in" class="btn btn-default">Ställ in passet</button>
			</form>

<?php include("inc/footer.php"); ?>