 <?php 

 $mandag =  htmlspecialchars($_GET["date"]) ;

 $tisdag = date('d-m-Y', strtotime($mandag .' +1 day'));
 $onsdag = date('d-m-Y', strtotime($mandag .' +2 day'));
 $torsdag = date('d-m-Y', strtotime($mandag .' +3 day'));
 $fredag = date('d-m-Y', strtotime($mandag .' +4 day'));
 $lordag = date('d-m-Y', strtotime($mandag .' +5 day'));
 $sondag = date('d-m-Y', strtotime($mandag .' +6 day'));





 ?>

