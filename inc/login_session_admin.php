

<?php

				
$admin_check = $_SESSION['admin'];
if($admin_check != "admin"){
	header('Location: index.php'); // Kollar om det finns någon medlem inloggad

}

?>