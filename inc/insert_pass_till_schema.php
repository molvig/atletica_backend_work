<?php
if(!empty($_POST)){

$schemaId = $_POST['schema'];
$antalPlatser = $_POST['platser'];
$information = ""; //$_POST['information'];
$passNamn = $_POST['pass'];
$instruktor = $_POST['instruktor'];
$startTid = $_POST['starttid']; 
$slutTid = $_POST['sluttid'];
$veckoDag = $_POST['days'];
$installt = 0;
$reserv = 20;
$extraPass = 0;

$day = "";
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


$date1 = ""; //startdatum för schemat
$date2 = ""; //slutdatum för schemat
try {
            $results = $db -> prepare ("SELECT startdatum, slutdatum FROM schematyp
                where schemaTyp = :schemaId");

            $results->execute(array(':schemaId' => $schemaId));

    } 
    catch (Exception $e) 
    {
            echo $e; //"Data could not be retrieved from the database";
            exit;
    }

    $sc = ($results -> fetch(PDO::FETCH_ASSOC));
            
    $date1 = $sc['startdatum'];
    $date2 = $sc['slutdatum'];
    //echo $date1." ".$date2;
    $results->closeCursor();  

    $stTime = explode(":", $startTid);
    $stDate = new DateTime('0000-01-01');
    $stDate->setTime($stTime[0],$stTime[1]);

    $slTime = explode(":", $slutTid);
    $slDate = new DateTime('0000-01-01');
    $slDate->setTime($slTime[0],$slTime[1]);


$date2 = strtotime($date2);
$cnt = 0;
    for($o = strtotime($day, strtotime($date1)); $o <= $date2; $o = strtotime('+1 week', $o))
    {
        //echo " ". date('Y-m-d', $o)."\n";
        
        $sql = 'insert into bokningsbara(installt, antalplatser, reservplatser, datum, information, passnamn, instnamn,
        starttid, sluttid, veckodag, extrapass) 
        values(:inst, :antP, :antR, :d, :info, :pNamn, :iNamn, :stTid, :slTid, :vDag, :ePass);';
        
        $stmt = $db->prepare($sql);

        try
        {
        $stmt-> execute(array(':inst' => $installt,                            
                                ':antP' => $antalPlatser,
                                ':antR' => $reserv,                            
                                ':d' => date('Y-m-d', $o),
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

        $sql = 'insert into schemat (bokningsbarID, schematyp)
        values(:bId, :scId);';
        $stmt = $db->prepare($sql);

        $stmt->execute(array(':bId' => $insertId, ':scId'=> $schemaId));
       $results->closeCursor();
                  
             $cnt = $cnt + 1;
        }        
        catch(Exception $e)
        {
            echo $e;
                    
        }
         
        
    }
    if($cnt > 0){ ?>
                <div class="grid_12"> <?php echo  '<h4>' . 'Du har lagt till '. '<strong>' . $_POST['pass']  .'</strong>' .' som ett nytt pass!' . '</h4>'; ?> </div>
             
             <?php  }
}

?>