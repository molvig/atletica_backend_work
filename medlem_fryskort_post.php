<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getmedlem_fryskort.php"); ?>


  <div class="grid_2"> <?php include("inc/menymedlem.php"); ?></div>

<div class="grid_5">

<?php
    $today = date("Y-m-d"); 
    $kundnummer = $kundnr;
      $frystkort = 1;
      $frysdatum = $today;



    try {
       $query = ("UPDATE medlemskort SET fryst=:fryst, frysdatum=:frysdatum WHERE kundnr={$kundnummer} AND aktivtkort=1");
          $q = $db -> prepare($query);
          $q-> execute(array(':fryst'=>$frystkort,
                            ':frysdatum'=>$frysdatum

            ));
         
if($query){
          echo '<center>' . '<h4>' . 'Du har fryst kortet!' . '</h4>' . '</center>';
  
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }
  
?>

</div> 

     <?php include("inc/footer.php"); ?>