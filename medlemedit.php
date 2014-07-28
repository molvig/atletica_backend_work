<?php include("inc/db_con.php"); ?>
<?php include("inc/getmedlem.php"); ?>
<?php include("inc/header.php"); ?>

  <div class="grid_2">
  <?php include("inc/menymedlem.php"); ?>
  
</div>
<div class="grid_5">
  <div class="grid_12">
  <h3>Uppdatera medlem </h3>
  </div>
	 <form role="form" action="#" method="post">

    <div class="grid_12">

        <div class="grid_6">
          <label>Medlemsnummer
            <p><?php echo $kundnr; ?></p></label>
        </div>

       <div class="grid_6">
          <label>Personnummer
            <p><?php echo $personnr; ?></p></label>
        </div>

    </div>


       <div class="grid_12">

          <div class="grid_6">
            <label>Förnamn
            	<p><?php echo $fnamn; ?></p></label>
          </div>

          <div class="grid_6">
            <label>Efternamn
            	<input type="text" class="form-control" name="enamn" id="enamn" value='<?php echo $enamn; ?>'></label>
           </div>

       </div>

       <div class="grid_12">

          <div class="grid_6">
            <label>Telefonnummer
              <input type="tel" class="form-control" name="phone" id="phone" value='<?php echo $telefon; ?>'></label>
          </div>

          <div class="grid_6">
            <label>Email
              <input type="email" class="form-control" name="mail" id="mail" value='<?php echo $mail; ?>'></label>
           </div>

       </div>



           <div class="grid_12">

        <div class="grid_6">
          <label>Kortet är giltligt till
            <p><?php echo $kortdatum; ?></p></label>
        </div>

    </div>
<br>
        <div class="grid_12"> 
          <div class="grid_6">
          <div class="form-group">
            <label>Ändra korttyp
                 <select class="form-control">
                    <optgroup label="Årskort">
                      <option value="arkombi">Kombi (gym & gruppträning)</option>
                      <option value="arstyrka">Styrketräning (endast gym)</option>
                    </optgroup>
                    <optgroup label="Månadskort">
                      <option value="kombi">Kombi (gym & gruppträning)</option>
                      <option value="styrka">Styrketräning (endast gym)</option>
                      <option value="dagtid">Dagtid (fram till kl 16:00)</option>
                      <option value="ungdom">Ungdom (gymnasiet)</option>
                    </optgroup>
                      <option value="autogiro">Autogiro</option>
                      <option value="klipp">Klippkort</option>
                  </select></label>
              </div>
         </div>
          

             </div>
    

          <div class="grid_12">

              <label>Anteckning
              <textarea class="form-control" name="note" id="note" placeholder="Något som kan vara värt att veta..."></textarea></label>

         </div>

        
        <div class="grid_6">
          <button type="submit" name="submit"  class="btn btn-default">Uppdatera</button>
        </div>

</div>


    </form>


</div>
<?php include("inc/footer.php"); ?>