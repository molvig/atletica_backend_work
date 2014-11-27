<?php
//för att uppdatera vårschemats intervall
if(isset($_GET["dateVarStart"]))
{	
	$varstart = new DateTime($_GET["dateVarStart"]);
	$varend = new DateTime($_GET["dateVarEnd"]);
	$date_now = new DateTime(date('Y-m-d'));
	if($varend > $varstart && ($varend < $date_now || $varstart > $date_now))
	{		
		$sql = "update schematyp 
		set startdatum = :varStart, 
		slutdatum = :varEnd 
		where schematyp = 1";
	}
	else
	{
		//varna vårens slutdatum inte ordentligt satt
	}

	$sommarstart = new DateTime($varend->modify('+1 day')->format('Y-m-d'));
	$sommarend = new DateTime($_GET["dateSommarEnd"]);
	
	if($sommarend > $sommarstart && ($sommarend < $date_now || $sommarstart > $date_now))
	{
		$sql = "update schematyp 
		set startdatum = :sommarStart, 
		slutdatum = :sommarEnd 
		where schematyp = 2";
	}
	else
	{
		//varna sommarens slutdatum inte ordentligt satt
	}
}
		//kontrollera även så att schemat inte är aktivt och eller att slutdaumet passerats
		//lägg tiil 1 dag för starten på sommar sätt slutdatum till det valda osv, 
		//kontrollera även att slutdatumen är större än resp startdatum om inte varna.
?>