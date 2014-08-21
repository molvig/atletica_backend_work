<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getmedlem.php"); ?>

  <div class="grid_2">
  <?php include("inc/menymedlem.php"); ?>
  
</div>
<div class="grid_5">
  <div class="grid_12">
  <h3>Uppdatera medlem </h3>
  </div>
	 <form role="form" action="#" method="post">
  
    <legend>Personlig information</legend>
    <fieldset>
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
            	<input type="text" class="form-control" name="enamn" id="enamn" value="<?php echo $enamn; ?>" ></label>
           </div>

       </div>

       <div class="grid_12">

          <div class="grid_6">
            <label>Telefonnummer
              <input type="tel" class="form-control" name="phone" id="phone" value="<?php echo $telefon; ?>" ></label>
          </div>

          <div class="grid_6">
            <label>Email
              <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $mail; ?>" ></label>
           </div>

       </div>
                 <div class="grid_12">

              <label>Anteckning
              <textarea  rows="6" cols="80" class="form-control" name="note" id="note" row="6"><?php echo $anteckning; ?></textarea></label>

         </div>


</fieldset>
<br>
<legend>Medlemsskap</legend>
        <div class="grid_12"> 
          <div class="grid_6">
            <label>Har varit medlem sedan
             <input type="date" class="form-control" name="startdatum" id="startdatum" value="<?php echo date('Y-m-d', strtotime($medlemsstart)); ?>" readonly></label>
           </div>
          <div class="grid_6">
            <label>Passantal
              <input type="text" class="form-control" name="passantal" id="passantal" value="<?php echo $passantal; ?>"></label>
           </div>
          <div class="grid_12">
            <label>KortID
             <input type="text" class="form-control" name="kortID" id="kortID" value="<?php echo $kortID; ?>" readonly></label>
           </div>
          <div class="grid_6">
          <div class="form-group">
            <label>Korttyp
              <input type="text" class="form-control" name="kort" id="kort" value="<?php echo  $korttypen; ?>" ></label>
              </div>
         </div>
          <div class="grid_6">
            <label>Gäller till <br>
              <input type="text" name="date" class="tcal" value="<?php echo date('Y-m-d', strtotime($giltigt)); ?>" >
            </label>
           </div>

             </div>


 <div class="grid_12">
 <?php $fryst=0; ?>
        <div class="grid_6">
         <?php if($fryst==1)
           { ?>
           <br>
               <button type="submit" name="submit"  class="btn btn-default">Tina kort</button>
           <?php }
          else
          { ?>
        <br>
                <button type="submit" name="submit"  class="btn btn-default">Frys kort</button>
         <?php } ?>
        </div>
        
          <div class="grid_6">
            <label>Kortet frystes
             <input type="date" class="form-control" name="frysdate" id="frysdate" value="" readonly></label>
           </div>

     </div>

          <div class="grid_12">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Nyckelkort
            </label>
          </div>
        </div>


     
        <div class="grid_6">
          <button type="submit" name="submit"  class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Uppdatera</button>
        </div>

</div>


    </form>


</div>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include("inc/footer.php"); ?>