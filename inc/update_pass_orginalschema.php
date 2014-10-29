<?php
//Fyll fälten som ska uppdateras
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
		$sql = 'SELECT b.bokningsbarID, s.schematyp, b.instnamn, b.passnamn, b.starttid, b.sluttid, b.veckodag, b.antalplatser 
					from bokningsbara as b, schemat as s 
					where b.bokningsbarID = :passId
					and b.bokningsbarID = s.bokningsbarID
					and s.bokningsbarID = :passId';

		$results = $db -> prepare ($sql);
		$results->execute(array(':passId' => $_GET["passid"]));	
		
}
	 catch (Exception $e) {
		echo "Det blev något fel när databasen skulle kontaktas";
	}

	$passObj = ($results -> fetch(PDO::FETCH_ASSOC));
	$results->closeCursor();
echo $passObj['schematyp'];
$slut = $passObj['sluttid'];
$start = $passObj['starttid'];
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
if(!empty($_POST)){
	$startTid = $_POST["starttid"];
	$slutTid = $_POST["sluttid"];

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
	
	/*uppdatera alla pass på schemat börja med att plocka ut alla passId*/
	$sql = 'SELECT distinct b.bokningsbarID FROM bokningsbara as b , schemat as s 
		WHERE b.passnamn = (select bInner.passnamn from bokningsbara as bInner where bInner.bokningsbarID = :passId)
		AND s.schematyp = :scId  
	    AND veckodag = :vDag
	    AND starttid = :sttid';


if($start != $startTid)
{
	$start = $startTid;
}

if($slut != $slutTid)
{
	$slut = $slutTid;
}

 $stTime = explode(":", $start);
    $stDate = new DateTime('0000-01-01');
    $stDate->setTime($stTime[0],$stTime[1]);

    $slTime = explode(":", $slut);
    $slDate = new DateTime('0000-01-01');
    $slDate->setTime($slTime[0],$stTime[1]);

try 
		{
			$results = $db -> prepare ($sql);
			$results->execute(array(':passId' => $_GET["passid"],
				':scId' => $passObj['schematyp'],
				':vDag' => $passObj['veckodag'],
				':sttid' => $passObj['starttid']));

			$schemalagdapass = ($results -> fetchAll(PDO::FETCH_ASSOC));
			$results->closeCursor();
if($sql){ ?>
		    	<div class="grid_12"> <?php echo  '<h4>' . 'Du har lagt till '. '<strong>' . $_POST['pass']  .'</strong>' .' som ett nytt pass!' . '</h4>'; ?> </div>
			 <?php	}	
	foreach($schemalagdapass as $row)
	{
		echo $row['bokningsbarID'];
		$sql = 'UPDATE bokningsbara set
		antalplatser = :antP,
		passnamn = :pNamn,
		instnamn = :iNamn,
		starttid = :stTid,
		sluttid = :slTid
		where
		bokningsbarID = :passId';

		
			$results = $db -> prepare ($sql);
			$results->execute(array(':antP' => $_POST["platser"],
					':pNamn' => $_POST["pass"],
					':iNamn' => $_POST["instruktor"],
					':stTid' => $stDate->format('Y-m-d H:i:s'),
					':slTid' => $slDate->format('Y-m-d H:i:s'),
					':passId' => $_GET["passid"]));

		
		$results->closeCursor();
	}
} 
		catch (Exception $e) 
		{
			echo $e;
		}
	/*uppdatera schema ett pass bara
	updatera orginal alla på samma dag tid och schema*/
}


?>