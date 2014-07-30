<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
	<div class="grid_2">
  <?php include("inc/menymedlem.php"); ?> 
  </div>







  
<div class="grid_5">
  <div class="grid_12">
  <h3>Lägg till ny medlem </h3>
  </div>
	 <form role="form" action="#" method="post">

    <div class="grid_12">

        <div class="grid_6">
          <label>Medlemsnummer
            <p>12354</p></label>
        </div>

       <div class="grid_6">
          <label>Personnummer (8 siffror)
            <input type="text" class="form-control" name="pnummer" id="pnummer" placeholder="ex 861128"></label>
        </div>

    </div>


       <div class="grid_12">

          <div class="grid_6">
            <label>Förnamn
            	<input type="text" class="form-control" name="fnamn" id="fnamn" placeholder=""></label>
          </div>

          <div class="grid_6">
            <label>Efternamn
            	<input type="text" class="form-control" name="enamn" id="enamn" placeholder=""></label>
           </div>

       </div>

       <div class="grid_12">

          <div class="grid_6">
            <label>Telefonnummer
              <input type="tel" class="form-control" name="phone" id="phone" placeholder=""></label>
          </div>

          <div class="grid_6">
            <label>Email
              <input type="email" class="form-control" name="mail" id="mail" placeholder=""></label>
           </div>

       </div>
<br>
    

        <div class="grid_12"> 
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
            <label>Gäller från <br>
        <input type="text" name="date" class="tcal" value="<?php echo date('Y-m-d');?>" >
      </label>
           </div>

        		 </div>
         <div class="grid_12">

            <div class="grid_6">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Nyckelkort
                </label>
              </div>
            </div>

            <div class="grid_6">

             </div>

         </div>
         <div class="grid_12">

              <label>Anteckning
              <textarea class="form-control" name="note" id="note" placeholder="Något som kan vara värt att veta..."></textarea></label>

         </div>

        
        <div class="grid_6">
          <button type="submit" name="submit"  class="btn btn-default">Lägg till medlem</button>
        </div>

</div>


    </form>


</div>



<?php include("inc/footer.php"); ?>