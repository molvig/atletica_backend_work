<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>

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
              <input type="date" class="form-control" name="kundnr" id="kundnr" value="" readonly></label>
          </div>

       <div class="grid_6">
          <label>Personnummer
            <input type="personnr" class="form-control" name="personnr" id="personr" value="" readonly></label>
        </div>

    </div>


       <div class="grid_12">

          <div class="grid_6">
            <label>Förnamn
            	<input type="fnamn" class="form-control" name="fnamn" id="fnamn" value="" readonly></label>
          </div>

          <div class="grid_6">
            <label>Efternamn
            	<input type="text" class="form-control" name="enamn" id="enamn" value='<?php  ?>'></label>
           </div>

       </div>

       <div class="grid_12">

          <div class="grid_6">
            <label>Telefonnummer
              <input type="tel" class="form-control" name="phone" id="phone" value='<?php   ?>'></label>
          </div>

          <div class="grid_6">
            <label>Email
              <input type="email" class="form-control" name="mail" id="mail" value='<?php  ?>'></label>
           </div>

       </div>
                 <div class="grid_12">

              <label>Anteckning
              <textarea  rows="6" cols="80" class="form-control" name="note" id="note" row="6" placeholder="Något som kan vara värt att veta..."></textarea></label>

         </div>


</fieldset>
<br>
<legend>Medlemsskap</legend>
        <div class="grid_12"> 
          <div class="grid_6">
            <label>Har varit medlem sedan
             <input type="date" class="form-control" name="startdatum" id="startdatum" value="<?php  ?>" readonly></label>
           </div>
          <div class="grid_6">
            <label>Passantal
              <input type="text" class="form-control" name="passantal" id="passantal" value='4'></label>
           </div>
          <div class="grid_12">
            <label>KortID
             <input type="date" class="form-control" name="kortID" id="kortID" value="<?php  ?>" readonly></label>
           </div>
          <div class="grid_6">
          <div class="form-group">
            <label>Korttyp
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
          <div class="grid_6">
            <label>Gäller till <br>
              <input type="text" name="date" class="tcal" value="<?php ?>" >
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