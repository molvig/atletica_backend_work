<?php 
$error="";

if(isset($_POST['submit-login'])){

	if (empty($_POST['admin-namn']) || empty($_POST['password']))
	{
		$error = "Medlemsnummret eller Personnummret är fel!";
	}

	else

	{
	$admin=$_POST['admin-namn'];
	$password=$_POST['password'];
	}	


	try{
		$query = "SELECT * FROM admin WHERE namn = '{$admin}' AND password = '{$password}' ";
		$stmt = $db ->prepare($query);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC); 
		$nyadmin = $res['namn'];
		$antaladmin = $stmt->rowCount();

				}
	catch(Exeption $e) {

		echo $e;
		exit;
	}	

		$stmt->closeCursor(); 

		if ($antaladmin == 1) {
		$_SESSION['admin'] = $nyadmin; // Initializing Session
		header("location: index.php"); // Redirecting To Other Page
		} else {
		$error = "Användarnamnet eller Lösenordet är fel!";
		}


					

}

?>