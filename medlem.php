<?php include("inc/db_con.php"); ?>

<?php include("inc/header.php"); ?>



<div class="grid_12">
  <div class="grid_12">
        <div class="grid_3"></div>
        <div class="grid_6">
        	<center>
            <h3>Sök efter medlemmar </h3>
          	<p>Du kan söka på förnamn, efternamm, personnummer (ex 861128) eller kundnummer. <br> 
            Tänk på att sökordet måste vara minst 4 tecken långt. </p>
          </center>
        </div>
        <div class="grid_3"></div>
  </div>


  <div class="grid_12">
      <form role="form" method="GET" action="search.php">
        <div class="grid_3"></div>
        <div class="grid_6">
          <center>
            <label>Sök efter en medlem
              <input type="search" class="form-control" name="medlem" id="medlem" placeholder="">
            </label>
          </center>
        </div>
        <div class="grid_3"></div>   
  </div>


  <div class="grid_12">
        <div class="grid_3"></div> 
        <div class="grid_6">
          <center>
            <button type="submit" name="submit"  class="btn btn-default">Sök</button>
          </center>
        </div>
        <div class="grid_3"></div>    
  </div>
   
      </form>
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
          <label>Personnummer
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
          <label>Korttyp:</label><br>

          <div class="radio">
            <label>
              <input type="radio" name="korttyp" id="year" value="year" >
              Årskort
            </label>
            <fieldset id="myfields1"  disabled>
                <div class="radio">
                  <label>
                    <input type="radio" name="artyp" id="arkombi" value="arkombi" >
                    Kombi (gym & gruppträning)
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="artyp" id="arstyrka" value="arstyrka" >
                      Styrketräning (endast gym)
                  </label>
                </div>
                </fieldset>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="korttyp" id="month" value="month">
              Månadskort
            </label>
              <fieldset id="myfields" disabled>
                   <div class="radio ">
                  <label>
                    <input type="radio" name="montyp" id="kombi" value="kombi" >
                    Kombi (gym & gruppträning)
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="montyp" id="styrka" value="styrka" >
                      Styrketräning (endast gym)
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="montyp" id="dagtid" value="dagtid" >
                    Dagtid (fram till kl 16:00)
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="montyp" id="ungdom" value="ungdom" >
                    Ungdom (gymnasiet)
                  </label>
                </div>
                </fieldset>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="korttyp" id="autogiro" value="autogiro">
              Autogiro
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="korttyp" id="klipp" value="klipp">
              Klippkort
            </label>
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

    <br>
</div>

<script>

$("#year").click(function() {$("#myfields").prop("disabled", true);});
$("#month").click(function() {$("#myfields").prop("disabled", false);});
$("#autogiro").click(function() {$("#myfields").prop("disabled", true);});
$("#klipp").click(function() {$("#myfields").prop("disabled", true);});

</script>


<?php include("inc/footer.php"); ?>







