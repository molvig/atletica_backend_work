<?php

try {
     $results = $db -> query ("SELECT schematyp, startdatum, slutdatum FROM schematyp");
    } 
    catch (Exception $e) {
            echo "Data could not be retrieved from the database";
            exit;
    }


    $schemat = ($results -> fetchAll(PDO::FETCH_ASSOC));
    $schematyp="";
    $startVar="";
    $slutVar="";
    $startSommar="";
    $slutSommar="";
    $startHost="";
    $slutHost="";
    $startVinter="";
    $slutVinter="";


//gör om gör rätt
    foreach ($schemat as $s) {
        $schematyp = $s['schematyp'];
        if($schematyp == 1)
        {
            $startVar=$s['startdatum'];
            $slutVar=$s['slutdatum'];
        }
        elseif($schematyp == 2)
        {
            $startSommar=$s['startdatum'];
            $slutSommar=$s['slutdatum'];
        }
        elseif($schematyp == 3)
        {
            $startHost=$s['startdatum'];
            $slutHost=$s['slutdatum'];
        }
        elseif($schematyp == 4)
        {
            $startVinter=$s['startdatum'];
            $slutVinter=$s['slutdatum'];
        }
        //$start .= $s['startdatum'];
        //$slut .= $s['slutdatum'];
    }


    ?>

