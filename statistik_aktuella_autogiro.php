<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>

 <?php 

try {
  $query = "SELECT medlemmar.kundnr, medlemmar.personnr, medlemmar.fnamn, medlemmar.enamn, medlemskort.bindningsdatum, medlemskort.ag_aktivt FROM medlemskort INNER JOIN medlemmar ON medlemmar.kundnr = medlemskort.kundnr AND medlemskort.ag_aktivt=1 ORDER BY medlemskort.bindningsdatum DESC";  
  $stmt = $db ->prepare($query);
  $stmt->execute();

  $antal = $stmt->rowCount(); 
  
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

$found="";


foreach( $result as $row ) {

$found .= "<tr>" . "<td>" . "<a href='medlem_autogiro.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" ."<td>" . $row["personnr"] .  "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>" . $row["enamn"] . "</td>" . "<td>"  . $row["bindningsdatum"] . "</td>" . "</tr>" ;

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
        <div class="grid_2">  <?php include("inc/menystatistik.php"); ?></div> 
        <div class="grid_7">
          
<div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading">

 <th><h4><?php echo "Aktiva autogiro: ", $antal;  ?></h4></th>

  </div>
<div class="panel panel-default">
    <table class="table">
    <tr>
      <td><h5>Kundnummer</h5></td>
      <td><h5>Personnummer</h5></td>
      <td><h5>Förnamn</h5></td>
      <td><h5>Efternamn</h5></td>
      <td><h5>Bindningstid till</h5></td>
    </tr>
      

  <?php echo $found; ?>

</div>
  </table> 
</div>
        </div>

  </div>



  


<?php include("inc/footer.php"); ?>

