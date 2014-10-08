
<?php
$today = date('Y-m-d');

  if(!empty($_POST)){
      $kundnummer = $_POST['kundnr'];
      $enamn = $_POST['enamn'];
      $telefonnr = $_POST['phone'];
      $email = $_POST['mail'];
      $anteckning = $_POST['note'];
      $passantal = $_POST['passantal'];
      $nyttkort = $_POST['nyttkort'];

      $giltigttill = $_POST['oldgiltigttill'];



      if (isset($_POST['nyckelkort'])) {$nyckelkort = 1;}
        else {$nyckelkort = 0;}

  



    if(isset($_POST['checknyttkort'])){

      if(($_POST['nyttkortgiltigt'] >= $today) && ($giltigttill <! $_POST['nyttkortgiltigt']) && ($giltigttill > $kortgiltigtfran))
        {

      $nyttkortgiltigtfran = $_POST['nyttkortgiltigt'];
      $nyttgiltigttillspecial = $_POST['kortgiltigttill'];
      $anteckning = $_POST['note'];
      $korttyp = $_POST['nyttkort'];
      $today = date("Y-m-d"); 
      $kortantal = $_POST['antal10kort']; 






     if ($korttyp == "AG12"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days'));
                  $bindningsdatum = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days'));
                  $ag_aktivt=1;  }
     if ($korttyp == "AG12+2"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 425 days'));
                  $bindningsdatum = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days'));
                  $ag_aktivt=1;  }

     if ($korttyp == "AG12DAG"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days'));
                  $bindningsdatum = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days')); 
                $ag_aktivt=1; }

     if ($korttyp == "AG24"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 730 days'));
                  $bindningsdatum = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 730 days')); 
                $ag_aktivt=1; }

    if ($korttyp == "AG24+2"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 790 days'));
                  $bindningsdatum = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 730 days')); 
                $ag_aktivt=1; }


     if ($korttyp == "H"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 183 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;}
                  $antalklipp = null;
     if ($korttyp == "HS"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 183 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}
     if ($korttyp == "MD"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 30 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}
     if ($korttyp == "MK"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 30 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}
     if ($korttyp == "MS"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 30 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}
     if ($korttyp == "MU"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 30 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}
     if ($korttyp == "YK"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}
     if ($korttyp == "YS"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days'));
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}
     if ($korttyp == "YSTUDENT"){$nyttgiltigttill = date('Y-m-d', strtotime($nyttkortgiltigtfran. ' + 365 days')); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}

    if ($korttyp == "SPECIAL"){$nyttgiltigttill = date('Y-m-d', strtotime($giltigttillspecial)); 
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $antalklipp = null;}


    if(($nyttkortgiltigtfran >= $today) && ($nyttkortgiltigtfran > $giltigttill)) {$aktivtkort=1;}
    else {$aktivtkort=0;}



    if ($korttyp == "10"){ $antalklipp = 10 * $kortantal;
                $giltigttill = null; 
                $nyttkortgiltigtfran = null;
                  $bindningsdatum = null ;
                  $ag_aktivt=0;
                  $aktivtkort=1;}


          $query = ("UPDATE medlemskort SET aktivtkort=:aktivtkort WHERE kundnr={$kundnummer}");
          $q = $db -> prepare($query);
          $q-> execute(array(':aktivtkort'=>0

            ));



          $query = ("INSERT INTO medlemskort (kundnr, giltigtfran, giltigttill, kort, aktivtkort, bindningsdatum, ag_aktivt, antalklipp) VALUES (:kundnr, :nyttkortgiltigt, :kortgiltigttill, :korttyp, :aktivtkort, :bindningsdatum, :ag_aktivt, :antalklipp)");
          $q = $db -> prepare($query);
          $q -> execute(array(':kundnr'=>$kundnummer,
                    ':nyttkortgiltigt'=>$nyttkortgiltigtfran,
                    ':kortgiltigttill'=>$nyttgiltigttill,
                    ':korttyp'=>$korttyp,
                    ':aktivtkort'=>$aktivtkort,
                    ':bindningsdatum'=>$bindningsdatum,
                    ':ag_aktivt'=>$ag_aktivt,
                    ':antalklipp'=>$antalklipp
                    
                    ));
  

       }

       else { ?>
        <div class="alert alert-danger" role="alert"><span><p>Det gick <u>INTE</u> att lägga till ett nytt medlemskort eftersom startdatumet för det nya kortet ligger tidigare än dagens datum eller så finns det redan ett giltigt kort i samma datumintervall.</p></span></div>
        
      <?php }
}

    try {
       $query = ("UPDATE medlemmar SET enamn=:enamn, telefon=:phone, mail=:mail, anteckning=:note, passantal=:passantal, nyckelkort=:nyckelkort WHERE kundnr={$kundnummer}");
          $q = $db -> prepare($query);
          $q-> execute(array(':enamn'=>$enamn,
                            ':phone'=>$telefonnr,
                            ':mail'=>$email,
                            ':note'=>$anteckning,
                            ':passantal'=>$passantal,
                            ':nyckelkort'=>$nyckelkort

            ));


          if($query){
          echo '<center>' . '<h4>' . 'Du har uppdaterat följande medlem!' . '</h4>' . '</center>';
	
        }
    } 
    catch (Exception $e) {

      echo '<center>' . '<h4>' . 'Hoppsan! Något är fel...' . '</h4>' . '</center>';
      echo $e;
    }
         

  }









?>




