<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/medlem_fryskort.php"); ?>



  <div class="grid_2"> <?php include("inc/menymedlem.php"); ?></div>

<div class="grid_5">

    <div class="grid_12">
      <h3>Frys kort </h3>
    </div>
        <div class="grid_12">
        <?php if ($fryst==1)
        { ?>
        <div class="alert alert-info"><span class="glyphicon glyphicon-lock"></span> Denna medlem har fryst sitt kort!</div>
       <?php } ?>
        <?php if ($frysdatum=="1986-11-28")
        { ?>
        <div class="alert alert-warning"><span class="glyphicon glyphicon-flag"></span> Denna medlem har fryst sitt kort tidigare</div>
       <?php } ?>
   </div>

   <form role="form" action="medlem_fryskort_post.php<?php echo '?pid='. $kundnr . '"'; ?>"  method="post">

    <div class="grid_12">

          <div class="grid_6">
            <label>Medlemsnummer
              <input type="date" class="form-control" name="kundnr" id="kundnr" value="<?php echo $kundnr; ?>" readonly></label>
          </div>

       <div class="grid_6">
          <label>Personnummer
            <input type="personnr" class="form-control" name="personnr" id="personr" value="<?php echo $personnr; ?>" readonly></label>
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


    <div class="grid_12">
        <?php if ($daysleft>=0){ ?>
                <div class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $daysleft;?> dagar kvar</div>
        <?php }
             else {?>
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> <?php echo $daysleft;?> dagar kvar</div> 
        <?php }?>
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
            <label>Gäller till <br>
              <input type="text" name="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($giltigttill)); ?>" readonly>
            </label>
           </div>
    </div>


 <div class="grid_12">
        
         <?php if($fryst==1)
           { ?>
          <div class="grid_6">
            <label>Dagar som kortet varit fryst
               <input type="text" class="form-control" name="frysdagar" id="frysdagar" value="<?php echo $aktuellafrysdagar; ?>" readonly></label>
          </div>

            <div class="grid_6">
            <label>Kortet frystes
             <input type="date" class="form-control" name="frysdatum" id="frysdatum" value="<?php echo date('Y-m-d', strtotime($frysdatum)); ?>" readonly></label>
            </div>
           
           <div class="grid_12">
            <br>
               <input type="submit" name="tinakort" id="tinakort" class="btn btn-default" value="Tina kort">
          </div>



           <?php }
          else
          { ?>
        
        <div class="grid_6">
          <br>
                <input type="submit" name="fryskort" id="fryskort" class="btn btn-default" value="Frys kort">       
        </div>


         <?php } ?>

  </div>
</form>
      
</div> 

     <?php include("inc/footer.php"); ?>