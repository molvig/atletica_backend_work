

 <?php 

 if(!empty($_POST)){
$medlemfran =$_POST['medlemfran'];
$medlemtill =$_POST['medlemtill'];

$medlemfran = date('Y-m-d', strtotime($medlemfran));
$medlemtill = date('Y-m-d', strtotime($medlemtill));

/*  */

try {
  $query = "SELECT * FROM medlemmar WHERE medlemsstart >= {$medlemfran} ORDER BY medlemsstart DESC";  
  $stmt = $db ->prepare($query);
  $stmt->execute();

  $antal = $stmt->rowCount(); 
  
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

$found="";


foreach( $result as $row ) {


$found .= "<tr>" . "<td>" . "<a href='medlem_uppdatera.php?pid=". $row['kundnr'] ."'>" . $row["kundnr"] . "</a>" . "</td>" . "<td>" . $row["fnamn"] .  "</td>" . "<td>" . $row["enamn"] . "</td>" . "<td>"  . date('Y-m-d', strtotime($row["medlemsstart"])). "</td>" . "</tr>" ;

} 


$stmt->closeCursor(); 

}

  catch (Exception $e) {
      echo "Data could not be retrieved from the database";
      echo $e;
      exit;
  }

 }

?>