<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>

<div class="grid_2">
  <?php include("inc/menyinst.php"); ?>
  
</div>


<div class="grid_8">

    <?php
      $medlem ="";
      $medlem = $_GET['medlem'];
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
                  
      $query = "SELECT * FROM medlemmar WHERE personnr LIKE :search OR enamn LIKE :search OR fnamn LIKE :search OR kundnr LIKE :search";
      $stmt = $db ->prepare($query);
      $stmt->bindValue(':search', '%' . $medlem . '%', PDO::PARAM_INT);
      $stmt->execute();


      
    if ($stmt->rowCount() > 0) { 
    $result = $stmt->fetchAll(); 
    $found=""?>



    <?php foreach( $result as $row ) {
    $found .= "<tr>" . "<td>" . "<a href='medlemdelete.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>"  . $row["enamn"] . "</td>" . "<td>"  . $row["personnr"] .  "</td>" . "</tr>" ;

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



  </div>                                                                                                                     

