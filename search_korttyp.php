
<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>



<div class="grid_12">
  <div class="grid_12">
        <div class="grid_2"></div>
        <div class="grid_7">
        	<center>
            <h3>Sök efter typ av medlemskort </h3>
          	<p>Välj vilket typ av medlemsskap. 
             </p>
          </center>
        </div>
        <div class="grid_3"></div>
  </div>


  <div class="grid_12">
      <form role="form" method="GET" action="search_korttyp.php">
        <div class="grid_2"></div>
        <div class="grid_7">
          <center>
            <label>Välj korttyp
            	<select type="search" class="form-control" name="korttyp" id="korttyp" >
            	<?php echo $kort ?>	
            	</select>
             
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
	$medlem = $_GET['korttyp'];
	$sok = $_GET['submit'];

 if(strlen($medlem)<=3) { ?>


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
	            
	$query = "SELECT * FROM medlemmar WHERE korttyp LIKE :search";
	$stmt = $db ->prepare($query);
	$stmt->bindValue(':search', '%' . $medlem . '%', PDO::PARAM_INT);
	$stmt->execute();


	
if ($stmt->rowCount() > 0) { 
$result = $stmt->fetchAll(); 
$found=""?>



<?php foreach( $result as $row ) {
$found .= "<tr>" . "<td>" . "<a href='medlemedit.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>"  . $row["enamn"] . "</td>" . "<td>"  . $row["personnr"] .  "</td>" .  "<td>"  . $row["korttyp"] .  "</td>" . "</tr>" ;

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
      <td><h5>Korttyp</h5></td>
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