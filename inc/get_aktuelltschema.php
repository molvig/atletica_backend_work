<?php

try {
     $results = $db -> query ("SELECT schematyp, startdatum, slutdatum FROM schematyp WHERE schematyp=1");
    } 
    catch (Exception $e) {
            echo "Data could not be retrieved from the database";
            exit;
    }


    $schemat = ($results -> fetchAll(PDO::FETCH_ASSOC));
    $schematyp="";
    $start="";
    $slut="";


    foreach ($schemat as $s) {
        $schematyp .= $s['schematyp'];
        $start .= $s['startdatum'];
        $slut .= $s['slutdatum'];
    }


    ?>

