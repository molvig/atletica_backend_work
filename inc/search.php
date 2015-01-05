<?php
if(isset($_POST['submit-search']))
{
	$personnummer= $_POST['medlemsnummer'];
	try {
			$query = ("SELECT * FROM medlemmar WHERE personnr ={$personnummer}");
			$stmt = $db ->prepare($query);
			$stmt->execute();
			$medlemsantal = $stmt->rowCount();
			$kunden="";
		}
		catch (Exception $e) {
		echo "Data could not be retrieved from the database";
		exit;
		}
					$member = $stmt->fetchAll(PDO::FETCH_ASSOC);

					

						if($medlemsantal > 0){
							foreach($member as $m){
						$kunden .= $m['kundnr']. ' ' . $m['fnamn']. ' ' . $m['enamn']. ' ' .$m['personnr'].  '\\n';
						}
						}
						else if ($medlemsantal == 0) {$kunden = "Ingen medlem har detta personnummer..."; }
					


					
					$stmt->closeCursor(); 



					$medlem = '<script> alert("' .$kunden. '");</script>';
					echo $medlem;			
}
?>