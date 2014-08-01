<?php
if(!empty($_POST)){

$schemaId = $_POST['schema'];
$antalPlatser = $_POST['platser'];
$information = $_POST['information'];
$passNamn = $_POST['pass'];
$instruktor = $_POST['instruktor'];
$startTid = $_POST['starttid']; 
$slutTid = $_POST['sluttid'];
$veckoDag = $_POST['days'];
$installt = 0;
$reserv = 20;
$extraPass = 0;


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

$testOut = "";
for($i = strtotime($day, strtotime($date1)); $i <= $date2; $i = strtotime('+1 week', $i))
{
    try
    {
    $stmt-> execute(array(':scId' => $schemaId,
                            ':inst' => $installt,                            
                            ':antP' => $antalPlatser,
                            ':antR' => $reserv,                            
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
catch(Exception e)
{
    echo e;
}
    //$testOut .= "datum " .date('Y-m-d', $i). " scid ".$schemaId." inst ".$installt." platser ".$antalPlatser." reserv ".$reserv." info "
    //.$information." namn ".$passNamn." intr ".$instruktor." start ".$startTid." slut ".$slutTid." dag ".$veckoDag.
    //" extra ".$extraPass. "<br />";
}
}
  
?>