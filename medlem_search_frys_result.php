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

<?php
	$medlem ="";
	$medlem = $_GET['medlem_frys'];
	$sok = $_GET['submit'];
	            
	$query = "SELECT * FROM medlemmar WHERE kundnr LIKE :search";
	$stmt = $db ->prepare($query);
	$stmt->bindValue(':search', '%' . $medlem . '%', PDO::PARAM_INT);
	$stmt->execute();

   $antal = $stmt->rowCount(); 
  	
  if ($stmt->rowCount() > 0) { 
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

  $found="";

  $stmt->closeCursor(); 


  foreach( $result as $row ) {

  $found .= "<tr>" . "<td>" . "<a href='medlem_fryskort.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>"  . $row["enamn"] . "</td>" . "<td>"  . $row["personnr"] .  "</td>" . "</tr>" ;

  $stmt->closeCursor(); 

  } 

?>


  <div class="grid_12">
        <div class="grid_2"></div> 
        <div class="grid_5">

<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading">

 <th><h4><?php echo "Antal träffar: ", $antal;  ?></h4></th>

  </div>
<div class="panel panel-default">
    	<table class="table">
  		<tr>
  		  <td><h5>Kundnummer</h5></td>
  		  <td><h5>Förnamn</h5></td>
  		  <td><h5>Efternamn</h5></td>
  		  <td><h5>Personnummer</h5></td>

  		</tr>
  		  

    <?php echo $found; ?>
  
  	</table> 
</div>    
</div>
        </div>

  </div>


<?php

} else { ?>




  <div class="grid_12">
        <div class="grid_2"></div> 
        <div class="grid_5">
<div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading">

<h5><?php echo 'Det fanns ingen medlem som matchar: ' . "<strong>" . $medlem . "</strong>"; ?></h5>

  </div>
</div>
        </div>
  
  </div>





<?php }



?>


<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>

<?php include("inc/footer.php"); ?>