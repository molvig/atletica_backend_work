<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>



<div class="grid_12">
  <div class="grid_12">
        <div class="grid_2"></div>
        <div class="grid_7">
        	<center>
            <h3>Sök efter medlemmar </h3>
          	<p>Du kan söka på förnamn, efternamm, personnummer (ex 861128) eller kundnummer. <br> 
            Tänk på att sökordet måste vara minst 4 tecken långt. </p>
          </center>
        </div>
        <div class="grid_3"></div>
  </div>


  <div class="grid_12">
      <form role="form" method="GET" action="search.php">
        <div class="grid_2"></div>
        <div class="grid_7">
          <center>
            <label>Sök efter en medlem
              <input type="search" class="form-control" name="medlem" id="medlem" placeholder="">
            </label>
          </center>
        </div>
        <div class="grid_3"></div>   
  </div>


  <div class="grid_12">
        <div class="grid_2"></div> 
        <div class="grid_7">
          <center>
            <button type="submit" name="submit"  class="btn btn-default">Sök</button>
          </center>
        </div>
        <div class="grid_3"></div>    
  </div>
   
      </form>
</div>
<?php
	$medlem ="";
	$medlem = $_GET['medlem'];
	$sok = $_GET['submit'];

 if(strlen($medlem)<=2) { ?>


  <div class="grid_12">
        <div class="grid_2"></div> 
        <div class="grid_7">
			<?php echo "<center>" . "<h5>" . "Ditt sökord är för kort! <br>" . "</h5>" . "<p>Tänk på att sökordet måste bestå av minst fyra tecken.</p>" . "</center>"; ?>
 		</div>
        <div class="grid_3"></div>    
  </div>



   	<?php 
     } 
else{
	            
	$query = "SELECT * FROM medlemmar WHERE personnr LIKE :search OR enamn LIKE :search OR fnamn LIKE :search OR kundnr LIKE :search";
	$stmt = $db ->prepare($query);
	$stmt->bindValue(':search', '%' . $medlem . '%', PDO::PARAM_INT);
	$stmt->execute();


	
if ($stmt->rowCount() > 0) { 
$result = $stmt->fetchAll(); 
$found=""?>



<?php foreach( $result as $row ) {
$found .= "<tr>" . "<td>" . "<a href='medlemedit.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>"  . $row["enamn"] . "</td>" . "<td>"  . $row["personnr"] .  "</td>" . "</tr>" ;

} ?>


  <div class="grid_12">
        <div class="grid_2"></div> 
        <div class="grid_7">

<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading">

 <th><h4><?php echo "Antal träffar: ", $stmt->rowCount();  ?></h4></th>

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
		
</div>
	</table> 
</div>
        </div>
        <div class="grid_3"></div>    
  </div>










<?php

} else { ?>




  <div class="grid_12">
        <div class="grid_2"></div> 
        <div class="grid_7">
<div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading">

<h5><?php echo 'Det fanns ingen medlem som matchar: ' . "<strong>" . $medlem . "</strong>"; ?></h5>

  </div>
</div>
        </div>
        <div class="grid_3"></div>    
  </div>





<?php }


	}
?>




<?php include("inc/footer.php"); ?>