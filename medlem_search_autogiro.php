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
  
    <h3>Säg upp autogiro</h3>
    <p>Skriv in kundnummret för den kund som avsluta autogirot för.
    </p>

    <form role="form" method="GET" action="medlem_search_autogiro_result.php">

      <label>Skriv in kundnummer
      <input type="search" class="form-control" name="medlem_auto" id="medlem_auto" placeholder="endast siffror" onkeypress="return isNumberKey(event)">
      </label>

      <div class="grid_12">
        <button type="submit" name="submit"  class="btn btn-default">Sök</button>
      </div>  

    </form>
  </div>
</div>



<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>




<?php include("inc/footer.php"); ?>







