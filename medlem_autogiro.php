<?php include("inc/db_con.php"); ?>
<?php include("inc/login_session.php"); ?>

<?php if ($admin_check=="admin"){ ?>
<?php include("inc/headeradmin.php"); ?>
<?php }else if ($admin_check=="repan"){ ?>
<?php include("inc/header.php");?>
<?php } ?>
<?php include("inc/autogiro.php"); ?>



  <div class="grid_2"> <?php include("inc/menymedlem.php"); ?></div>


<div class="grid_5">
<fieldset>
  <legend>Säg upp autogiro</legend>
          <?php if ($fryst==1)
        { ?>
        <div class="alert alert-info"><span class="glyphicon glyphicon-lock"></span> Denna medlem har fryst sitt kort!</div>
       <?php } ?>

   <form role="form" action="medlem_autogiro_post.php<?php echo '?pid='. $kundnr . '"'; ?>"  method="post">

    <div class="grid_12">

          <div class="grid_6">
            <label>Medlemsnummer
              <input type="text" class="form-control" name="kundnr" id="kundnr" value="<?php echo $kundnr; ?>" readonly></label>
          </div>

       <div class="grid_6">
          <label>Personnummer
            <input type="text" class="form-control" name="personnr" id="personr" value="<?php echo $personnr; ?>" readonly></label>
        </div>

    </div>

    <div class="grid_12">

          <div class="grid_6">
            <label>Förnamn
              <input type="fnamn" class="form-control" name="fnamn" id="fnamn" value="<?php echo $fnamn; ?>" readonly></label>
          </div>

          <div class="grid_6">
            <label>Efternamn
              <input type="text" class="form-control" name="enamn" id="enamn" value="<?php echo $enamn; ?>" readonly></label>
           </div>

    </div>

<?php if ($ag_aktivt==0) {
   
  ?>     <div class="grid_12">
        <div class="alert alert-danger"><span class="glyphicon glyphicon-lock"></span> Denna medlem har inget aktivt autogiro </div>
    </div> 

<?php } 

else { ?>

    <div class="grid_12">
        <div class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $status; ?></div>
    </div>

    <div class="grid_12">
          <div class="grid_6">
            <label>KortID
             <input type="text" class="form-control" name="kortID" id="kortID" value="<?php echo $aktivtkortID; ?>" readonly></label>
          </div>
    </div>

    <div class="grid_12">
          <div class="grid_6">
              <label>Aktuellt kort
                <input type="text" class="form-control" name="kort" id="kort" value="<?php echo $korttypen; ?>" readonly></label>
          </div>

          <div class="grid_6">
            <label>Bindningstid till<br>
              <input type="text" name="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($bindningsdatum)); ?>" readonly>
            </label>
           </div>
    </div>
    <br>
</fieldset>
   <fieldset> 
    <legend>Om autogirot sägs upp idag</legend>
        <div class="grid_12">
          <div class="grid_6">
              <label>Sker sista dragningen
                <input type="text" class="form-control" name="kort" id="kort" value="<?php echo $sista_dragning; ?>" readonly></label>
          </div>

          <div class="grid_6">
            <label>Kortet slutar gälla<br>
              <input type="text" name="date" class="form-control" value="<?php echo $giltigttill; ?>" readonly>
            </label>
           </div>
    </div>

    <?php if ($bindningsdatum > $today) { ?>
        <div class="grid_12">
          <div class="grid_6">
                <div class="checkbox">
                <label>
                  <input type="checkbox" name="undantag"> Undantag för bindningstiden
                </label>
              </div>
          </div>
      </div>

   <?php } ?>
  <div class="grid_12">
    <input type="submit" name="autogiro" id="autogiro" class="btn btn-default" value="Säg upp autogiro">
  </div> 

</fieldset>

  


</form>



    </div>
</div>
      


 <?php } ?>


     <?php include("inc/footer.php"); ?>