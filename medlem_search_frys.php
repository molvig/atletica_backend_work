<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>

  <div class="grid_2">
  <?php include("inc/menymedlem.php"); ?>
  
</div>


<div class="grid_5">
  
  <div class="grid_12">
  
    <h3>Frysa ett kort </h3>
    <p>Skriv in kundnummret för den kund som du frysa kortet för.
    </p>

    <form role="form" method="GET" action="medlem_search_frys_result.php">

      <label>Skriv in kundnummer
      <input type="search" class="form-control" name="medlem_frys" id="medlem_frys" placeholder="endast siffror" onkeypress="return isNumberKey(event)">
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







