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
  $query = "SELECT medlemmar.kundnr, medlemmar.fnamn, medlemmar.enamn, medlemskort.fryst, medlemskort.frysdatum FROM medlemskort INNER JOIN medlemmar ON medlemmar.kundnr = medlemskort.kundnr AND medlemskort.fryst = 1 ORDER BY medlemskort.frysdatum DESC";  
  $stmt = $db ->prepare($query);
  $stmt->execute();

  $antal = $stmt->rowCount(); 
  
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

$found="";


foreach( $result as $row ) {
$frysdate = date('Y-m-d', strtotime($row["frysdatum"]));

$found .= "<tr>" . "<td>" . "<a href='medlem_fryskort.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>" . $row["enamn"] . "</td>" . "<td>"  . $frysdate . "</td>" . "</tr>" ;

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

 <th><h4><?php echo "Antal frysta kort: ", $antal;  ?></h4></th>

  </div>
<div class="panel panel-default">
    <table class="table">
    <tr>
      <td><h5>Kundnummer</h5></td>
      <td><h5>Förnamn</h5></td>
      <td><h5>Efternamn</h5></td>
      <td><h5>Frysdatum</h5></td>
    </tr>
      

  <?php echo $found; ?>

</div>
  </table> 
</div>
        </div>

  </div>



  


<?php include("inc/footer.php"); ?>

