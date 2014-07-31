<?php
if(!empty($_POST)){

$schemaId = $_POST['schema'];
$antalPlatser = $_POST['platser'];
$information = $_POST['information'];
$passNamn = $_POST['pass'];
$instruktor = $_POST['instruktor'];
$startTid = $_POST['start']; 
$slutTid = $_POST['slut'];
$veckoDag = $_POST['days'];

$date1 = ""; //startdatum för schemat
$date2 = ""; //slutdatum för schemat
try {
            $results = $db -> prepare ("SELECT startdatum, slutdatum FROM schematyp
                where schemaId = :schemaId");

            $results->execute(array(':schemaId' => $schemaId));
    } 
    catch (Exception $e) {
            echo "Data could not be retrieved from the database";
            exit;
    }

    $sc = ($results -> fetch(PDO::FETCH_ASSOC));
            
    $date1 = $sc['startdatum'];
    $date2 = $sc['slutdatum'];
    
    $results->closeCursor();   

$date2 = strtotime($date2);

$sql = 'CALL Admin_AddClassToSchedule(:scId, :inst, :antP, 
		:antR, :d, :info,
		:pNamn, :iNamn, :stTid, 
		:slTid, :vDag, :ePass)';
    
$stmt = $db->prepare($sql);

for($i = strtotime($day, strtotime($date1)); $i <= $date2; $i = strtotime('+1 week', $i))
{
    $stmt-> execute(array(':scId' => $schemaId,                            
                            ':antP' => $antalPlatser,                            
                            ':d' => date('Y-m-d', $i),
                            ':info' => $information,
                            ':pNamn' => $passNamn,
                            ':iNamn' => $instruktor,
                            ':stTid' => $startTid,
                            ':slTid' => $slutTid,
                            ':vDag' => $veckoDag,
                            ':ePass' => $extraPass
                        )
    );
}
}
  
?>