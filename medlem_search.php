<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>

  <div class="grid_2">
  <?php include("inc/menymedlem.php"); ?>
  
</div>


<div class="grid_5">
  
  <div class="grid_12">
  
    <h3>Sök efter medlemmar </h3>
    <p>Du kan söka på förnamn, efternamm, personnummer (ååmmdd) eller kundnummer. <br> 
    Tänk på att sökordet måste vara minst 3 tecken långt. </p>

    <form role="form" method="GET" action="medlem_search_result.php">

      <label>Sök efter en medlem
      <input type="search" class="form-control" name="medlem" id="medlem" placeholder="">
      </label>

      <div class="grid_12">
        <button type="submit" name="submit"  class="btn btn-default">Sök</button>
      </div>  

    </form>
  </div>
</div>

<?php include("inc/footer.php"); ?>







