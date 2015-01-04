

<?php

				
$admin_check = $_SESSION['admin'];
if(!isset($admin_check)){
	header('Location: admin-login.php'); // Kollar om det finns någon medlem inloggad

}


?>