<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>

	<div class="grid_2">
  <?php include("inc/menymedlem.php"); ?> 
  </div>







  
<div class="grid_5">
  <div class="grid_12">
  <h3>Lägg till ny medlem </h3>
  </div>
	 <form role="form" action="medlem_ny_post.php" method="post">

    <div class="grid_12">


          <div class="grid_6">
            <?php include("inc/nytt_medlemsnummer.php"); ?>
            <label>Medlemsnummer
              <input type="date" class="form-control" name="kundnr" id="kundnr" value="<?php echo $biggestkundnr; ?>" readonly></label>
          </div>

       <div class="grid_6">
            <label>Personnummer
              <input type="text" class="form-control" name="personnr" id="personnr" placeholder="ex. 861128" onkeypress='validate(event)'></label>
          </div>

    </div>


       <div class="grid_12">

          <div class="grid_6">
            <label>Förnamn
            	<input type="text" class="form-control" name="fnamn" id="fnamn" placeholder="" required></label>
          </div>

          <div class="grid_6">
            <label>Efternamn
            	<input type="text" class="form-control" name="enamn" id="enamn" placeholder="" required></label>
           </div>

       </div>

       <div class="grid_12">

          <div class="grid_6">
            <label>Telefonnummer
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="" required></label>
          </div>

          <div class="grid_6">
            <label>Email
              <input type="email" class="form-control" name="mail" id="mail" placeholder="" required></label>
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
        <input type="text" name="medlemsstart" id="medlemsstart" class="tcal" value="<?php echo date('Y-m-d');?>" >
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
              <textarea rows="6" cols="80" class="form-control" name="note" id="note" row="6" placeholder="Något som kan vara värt att veta..."></textarea></label>

         </div>
            <button type="submit" class="btn btn-default">
             <span class="glyphicon glyphicon-floppy-disk"></span> Lägg till medlem
            </button>


    </form>
    <?php include("inc/insert_nymedlem.php");?>
        




</div>
     
    </div>
  </div>
</div>

</div>





<?php include("inc/footer.php"); ?>