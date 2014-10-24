<?php

$startdate = "2014-10-05";


$mon = date('d/m', strtotime($startdate. ' + 1 days'));
$tue = date('d/m', strtotime($startdate. ' + 2 days'));
$wed = date('d/m', strtotime($startdate. ' + 3 days'));
$thu = date('d/m', strtotime($startdate. ' + 4 days'));
$fri = date('d/m', strtotime($startdate. ' + 5 days'));
$sat = date('d/m', strtotime($startdate. ' + 6 days'));
$sun = date('d/m', strtotime($startdate. ' + 7 days'));




$nextmon = date('d/m', strtotime($mon. ' + 1 weeks'));






// $monday = date('d/m', strtotime($mon. ' +1 week'));


?>