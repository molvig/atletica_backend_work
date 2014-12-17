
 <?php
$schemaID =  htmlspecialchars($_GET["schemaid"]) ;

try {
     $results = $db -> query ("SELECT schematyp, startdatum, slutdatum FROM schematyp WHERE schematyp={$schemaID}");
    } 
    catch (Exception $e) {
            echo "Data could not be retrieved from the database";
            exit;
    }


    $schemat = ($results -> fetchAll(PDO::FETCH_ASSOC));
    $schema = "";
    $schematyp="";
    $startdatum="";
    $slutdatum="";


    foreach ($schemat as $s) {
        $schematyp .= $s['schematyp'];
        $startdatum .= date("d-m-Y", strtotime($s['startdatum']));
        $slutdatum .= date("d-m-Y", strtotime($s['slutdatum']));
        

    }    
 
$start = date("d-m-Y", strtotime($startdatum));



$date = isset($_GET['date']) ? $_GET['date'] : $start;



$mandag =  $date;
$tisdag = date('d-m-Y', strtotime($mandag .' +1 day'));
$onsdag = date('d-m-Y', strtotime($mandag .' +2 day'));
$torsdag = date('d-m-Y', strtotime($mandag .' +3 day'));
$fredag = date('d-m-Y', strtotime($mandag .' +4 day'));
$lordag = date('d-m-Y', strtotime($mandag .' +5 day'));
$sondag = date('d-m-Y', strtotime($mandag .' +6 day'));



$prev_date = date('d-m-Y', strtotime($date .' -7 day'));
$next_date = date('d-m-Y', strtotime($date .' +7 day'));



/*
echo "Schematyp: ". $schematyp. "<br>";
echo "Startdatum: ".$startdatum. "<br>";
echo "Slutdatum: ".$slutdatum;
*/

if ($mandag == $startdatum)
{
$prev_able = "disabled";
$next_able = "";
}

else if ($sondag == $slutdatum )
{
$prev_able = "";
$next_able = "disabled";
}

else{
$prev_able ="";
$next_able ="";
}





  ?>