<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>




  <div class="grid_2">
  <?php include("inc/menymedlem.php"); ?>
</div>

<div class="grid_6">
<?php include ('inc/update_medlem.php'); ?>

<?php
$query = "SELECT * FROM medlemmar WHERE kundnr={$kundnummer}";
  $stmt = $db ->prepare($query);
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

  $found="";

  $stmt->closeCursor(); 


foreach( $result as $row ) {

$found .= "<tr>" . "<td>" . "<a href='medlem_uppdatera.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>"  . $row["enamn"] . "</td>" . "<td>"  . $row["personnr"] .  "</td>". "</tr>" ;

$stmt->closeCursor(); 
} ?>


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


<?php include("inc/footer.php"); ?>