<?php
if($_GET["dateVarStart"])
{
	$varstart = new DateTime($_GET["dateVarStart"]);
	$varend = new DateTime($_GET["dateVarEnd"]);

	if(var_dump($varend > $varstart))
	{
		$sql = "update schematyp 
		set startdatum = :varStart, 
		slutdatum = :varEnd 
		where schemanamn = 'Vår'";
	}
	else
	{
		//varna slutdatum inte ordentligt satt
	}
}

		//lägg tiil 1 dag för starten på sommar sätt slutdatum till det valda osv, 
		//kontrollera även att slutdatumen är större än resp startdatum om inte varna.
?>