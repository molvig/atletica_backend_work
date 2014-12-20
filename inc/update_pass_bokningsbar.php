<?php
//Fyll fälten som ska uppdateras
	$slut = "";
	$start = "";

$dis = "disabled";

if(isset($_GET['passid']))
{
	try {
			$results = $db -> query ("SELECT * FROM pass");
	} 
	catch (Exception $e) {
			echo "Data could not be retrieved from the database";
			exit;
	}

	$passnamn = ($results -> fetchAll(PDO::FETCH_ASSOC));
	$results->closeCursor();

	$pass = "";
          

	try {
		$sql = "SELECT b.bokningsbarID, s.schematyp, b.information, b.instnamn, b.passnamn, datum, TIME_FORMAT(b.starttid, '%H:%i') as sttid, TIME_FORMAT(b.sluttid, '%H:%i') as sltid, b.veckodag, b.antalplatser 
					from bokningsbara as b, schemat as s 
					where b.bokningsbarID = :passId";

		$results = $db -> prepare ($sql);
		$results->execute(array(':passId' => $_GET["passid"]));	
		
		}
	 catch (Exception $e) {
		echo "Det blev något fel när databasen skulle kontaktas";
	}

	$passObj = ($results -> fetch(PDO::FETCH_ASSOC));
	$results->closeCursor();
	$passObj['schematyp'];
	$info = $passObj['information'];
	$slut = $passObj['sltid'];
	$start = $passObj['sttid'];

	$today = date("Y-m-d");
	$ts1 = date_create($today);
	$passDatum = date("Y-m-d",strtotime($passObj["datum"]));
	$ts2 = date_create($passDatum);
	$datediff = $ts1->diff($ts2);
	
	if ($datediff->format('%R%a days') > 6) {		
	 	$dis = "";
	}
	foreach($passnamn as $p)
	{
		if ($p['passnamn'] == $passObj['passnamn']) 
		{
			$pass .= "<option value='".$p['passnamn']."' selected='selected'>".$p['passnamn']."</option>";
		}
		else
		{
			$pass .= "<option value='".$p['passnamn']."'>".$p['passnamn']."</option>";
		}
		
		 $instnamn ="";


		 try {
				$results = $db -> query ("SELECT instnamn FROM instruktorer");
		} 
		catch (Exception $e) {
				echo "Data could not be retrieved from the database";
				exit;
		}

		$instnamn = ($results -> fetchAll(PDO::FETCH_ASSOC));
		$results->closeCursor();

		$instnamnet ="";
            foreach($instnamn as $i)
            {
		          if($passObj['instnamn'] == $i['instnamn'])
		          {
		          	$instnamnet .= "<option value='".$i['instnamn']."' selected = 'selected'>".$i['instnamn']."</option>";
		          }
		          else
		          {
		          	$instnamnet .= "<option value='".$i['instnamn']."'>".$i['instnamn']."</option>";
		          }
			}

	}
	
}
if(!empty($_POST))
{
	if($_POST["delete"])
	{
		$st = $passObj['schematyp'];
		$pi = $_GET["passid"];
		$endUrl = "bokningsbar_pass_delete.php?schemaid=".$st."&passid=".$pi. "&datum=". $passObj["datum"];
		//för att ta bort ett pass ska vi vara säkra på att passet verkligen ska tas bort.
		$someJs = '<script>if(confirm("Vill du verkligen ta bort detta passet?"))
		{
			window.location.href = "'.$endUrl.'";					
		}
		else
			{
				alert("Borttagning avbrutet");
			}
			</script>';

		echo $someJs;
	}
	/*if ($_POST["cancel"]) 
	{
		//echo "<meta http-equiv=\"Location\" content=\"2;URL='schema_uppdatera_original.php?schemaid=".$passObj["schematyp"]."'\" />";
	}*/
	if(isset($_POST["update"]))
	{

		$slutTid = "";
		$startTid = "";
		if($_POST["starttid"] != "")
		{
			$startTid = $_POST["starttid"];
			
		}
		
		if($_POST["sluttid"] != "")
		{
			$slutTid = $_POST["sluttid"];
			
		}
		
		

	/*if($slut == "0000-00-00 00:00:00")
	{
		//använd slut
		$slut = $_POST["sluttid"];
	}
	elseif ($slut == $_POST["sluttid"]) {
		$slut = $_POST["sluttid"];
	}*/

	//Då var det dags att uppdatera passen på orginalschemat
	/*uppdatera ett pass på schemat plocka bara det befintliga passid*/
	//select * from bokningsbara where bokningsbarID = :passId
	//select * from schemat where bokningsbarID = :passId


	if($_POST["starttid"])
	{	
		$stTime = explode(":", $startTid);
	    $stDate = new DateTime('0000-01-01');
	    $stDate->setTime($stTime[0],$stTime[1]);
	}
	else
	{	
		$stTime = explode(":", $start);
	    $stDate = new DateTime('0000-01-01');
	    $stDate->setTime($stTime[0],$stTime[1]);
	}

	if($_POST["sluttid"])
	{	
		$slTime = explode(":", $slutTid);
	    $slDate = new DateTime('0000-01-01');
	    $slDate->setTime($slTime[0],$slTime[1]);
	}
	else
	{	
		$slTime = explode(":", $slut);
	    $slDate = new DateTime('0000-01-01');
	    $slDate->setTime($slTime[0],$slTime[1]);
	}

	    $starttimeforselect = '0000-01-01 '.$passObj['sttid']; 
	try 
			{ 
			$sql = 'UPDATE bokningsbara SET
			antalplatser = :antP,
			instnamn = :iNamn,
			starttid = :stTid,
			sluttid = :slTid,
			uppdaterad = :uppdaterad,
			information = :information
			WHERE
			bokningsbarID = :passid';

			
				$results = $db -> prepare ($sql);
				$results->execute(array(':antP' => $_POST["platser"],
						':iNamn' => $_POST["instruktor"],
						':stTid' => $stDate->format('Y-m-d H:i:s'),
						':slTid' => $slDate->format('Y-m-d H:i:s'),
						':passid' => $_GET['passid'],
						':information' => $_POST["information"],
						':uppdaterad' => 1
						));

			
			$results->closeCursor();
		
		if($sql){
	                echo '<div class="grid_12"> <h4>Du har nu uppdaterat passet du kommer snart skickas tillbaka till schemat</h4></div>';
	                
	            } 
		echo "<meta http-equiv=\"refresh\" content=\"2;URL='schema.php?schemaid=".$passObj["schematyp"]."'\" />";	
	}
			catch (Exception $e) 
			{
				echo $e;
			}

		
	}
}
?>