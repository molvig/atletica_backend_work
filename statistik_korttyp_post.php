<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>
<?php include('inc/login_session_admin.php');?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/getkorttyp.php"); ?>


<div class="grid_12">
  <div class="grid_12">
        <div class="grid_2"><?php include("inc/menystatistik.php"); ?></div>
        <div class="grid_7">


<div class="grid_12">
   <form method="get" action="statistik_korttyp_post.php">
      <h4> Sök på korttyp </h4>
    <div class="grid_12">
      <div class="grid_6">
        <select name="korttyp" class="form-control">
            <?php echo $kort; ?>
        </select>
      </div>
    </div>
    <div class="grid_12">
      <button type="submit" class="btn btn-default">Sök
    </div> 
  </form>
</div> 
  

 <?php 

try {
$korttyp ="";
$kortet = $_GET['korttyp'];


  $query = "SELECT medlemmar.kundnr, medlemmar.fnamn, medlemmar.enamn, medlemskort.kort, medlemskort.giltigttill FROM medlemskort, medlemmar WHERE medlemskort.kort = '$kortet' AND medlemmar.kundnr = medlemskort.kundnr AND medlemskort.aktivtkort = 1 ORDER BY medlemmar.kundnr DESC";  
  $stmt = $db ->prepare($query);
  $stmt->execute();

  $antal = $stmt->rowCount(); 
  
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

$found="";


foreach( $result as $row ) {
  $korts ="";
     try {
          $results = $db -> query ("SELECT korttyp FROM korttyp WHERE kort = '$kortet' ORDER BY korttyp DESC");
      } 
      catch (Exception $e) {
          echo "Data could not be retrieved from the database";
          exit;
      }


      $korttyp = ($results -> fetchAll(PDO::FETCH_ASSOC));
      $kort = "";


      foreach ($korttyp as $k) {
        $korts .= $k['korttyp'];
        

      }    


$found .= "<tr>" . "<td>" . $korts . "</td>" . "<td>" . $row["giltigttill"] . "</td>" .   "<td>" . "<a href='medlem_uppdatera.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] . "</td>" . "<td>"  . $row["enamn"]. "</td>" . "</tr>" ;

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
 <div class="panel panel-info">
  
  <div class="panel-heading">
      <th><h4><?php echo "Antal medlemmar: ". $antal;  ?></h4></th>
  </div>

  <div class="panel panel-default">
      <table class="table">
      <tr>
        <td><h5>Korttyp</h5></td>
        <td><h5>Giltigt till</h5></td>
        <td><h5>Kundnummer</h5></td>
        <td><h5>Förnamn</h5></td>
        <td><h5>Efternamn</h5></td>

      </tr>   
    <?php echo $found; ?>
      </table> 

  </div>
  
</div>
        </div> 




<?php include("inc/footer.php"); ?>