<?php
if(!empty($_POST)){

$schemaId = htmlspecialchars($_GET["schemaid"]);
$antalPlatser = $_POST['platser'];
$information = $_POST['information'];
$passNamn = $_POST['pass'];
$instruktor = $_POST['instruktor'];
$startTid = $_POST['starttid']; 
$slutTid = $_POST['sluttid'];
$veckoDag = htmlspecialchars($_GET["dagid"]);
$dat =  $_POST['datum'];
$datum = date('Y-m-d', strtotime($dat));
$installt = 0;
$reserv = 20;
$extraPass = 1;

/*$day = "";
if ($veckoDag == 1) {
    $day = "Monday";
}
if ($veckoDag == 2) {
    $day = "Tuesday";
}
if ($veckoDag == 3) {
    $day = "Wednesday";
}
if ($veckoDag == 4) {
    $day = "Thursday";
}
if ($veckoDag == 5) {
    $day = "Friday";
}
if ($veckoDag == 6) {
    $day = "Saturday";
}
if ($veckoDag == 7) {
    $day = "Sunday";
}
*/

    $stTime = explode(":", $startTid);
    $stDate = new DateTime('0000-01-01');
    $stDate->setTime($stTime[0],$stTime[1]);

    $slTime = explode(":", $slutTid);
    $slDate = new DateTime('0000-01-01');
    $slDate->setTime($slTime[0],$stTime[1]);


    $sc = ($results -> fetch(PDO::FETCH_ASSOC));
            

    $results->closeCursor();  

        
        $sql = "INSERT INTO bokningsbara(installt, antalplatser, reservplatser, datum, information, passnamn, instnamn,
        starttid, sluttid, veckodag, extrapass) 
        VALUES(:inst, :antP, :antR, :d, :info, :pNamn, :iNamn, :stTid, :slTid, :vDag, :ePass)";
        
        $stmt = $db->prepare($sql);

        try
        {
        $stmt-> execute(array(':inst' => $installt,                            
                                ':antP' => $antalPlatser,
                                ':antR' => $reserv,                            
                                ':d' => $datum,
                                ':info' => $information,
                                ':pNamn' => $passNamn,
                                ':iNamn' => $instruktor,
                                ':stTid' => $stDate->format('Y-m-d H:i:s'),
                                ':slTid' => $slDate->format('Y-m-d H:i:s'),
                                ':vDag' => $veckoDag,
                                ':ePass' => $extraPass

                            )
        );
        $insertId = $db->lastInsertId();

        $results->closeCursor();

        $sql = 'INSERT INTO schemat (bokningsbarID, schematyp)
        values(:bId, :scId);';
        $stmt = $db->prepare($sql);

        $stmt->execute(array(':bId' => $insertId, ':scId'=> $schemaId));
       $results->closeCursor();
        
        echo '<div class="grid_12"> <h4>Du har nu lagt till ett extrapass! Du kommer snart skickas tillbaka till schemat</h4></div>';
        echo "<meta http-equiv=\"refresh\" content=\"1;URL='schema.php?schemaid=".$schemaId."'\" />";   
        }
        catch(Exception $e)
        {
            echo $e;
            }        
        
    }

?>