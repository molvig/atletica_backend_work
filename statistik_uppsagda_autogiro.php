<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>


 <?php 

try {
  $query = "SELECT medlemmar.kundnr, medlemmar.fnamn, medlemmar.enamn, medlemskort.sista_dragning, medlemskort.uppsagnings_datum FROM medlemskort INNER JOIN medlemmar ON medlemmar.kundnr = medlemskort.kundnr AND medlemskort.uppsagnings_datum IS NOT NULL ORDER BY medlemskort.sista_dragning DESC";  
  $stmt = $db ->prepare($query);
  $stmt->execute();

  $antal = $stmt->rowCount(); 
  
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

$found="";


foreach( $result as $row ) {

$found .= "<tr>" . "<td>" . "<a href='medlem_uppdatera.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>" . $row["enamn"] . "</td>" . "<td>"  . $row["uppsagnings_datum"] . "</td>" . "<td>"  . $row["sista_dragning"] . "</td>" . "</tr>" ;

} 


$stmt->closeCursor(); 

}

  catch (Exception $e) {
      echo "Data could not be retrieved from the database";
      echo $e;
      exit;
  }



?>


  <div class="grid_12">
        <div class="grid_2"><?php include("inc/menystatistik.php"); ?></div> 
        <div class="grid_5">

<div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading">

 <th><h4><?php echo "Uppsagda autogiro: ", $antal;  ?></h4></th>

  </div>
<div class="panel panel-default">
    <table class="table">
    <tr>
      <td><h5>Kundnummer</h5></td>
      <td><h5>Förnamn</h5></td>
      <td><h5>Efternamn</h5></td>
      <td><h5>Uppsägningsdatum</h5></td>
      <td><h5>Sista dragning</h5></td>
    </tr>
      

  <?php echo $found; ?>

</div>
  </table> 
</div>
        </div>

  </div>



  


<?php include("inc/footer.php"); ?>

