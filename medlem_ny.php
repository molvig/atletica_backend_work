<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getkorttyp.php"); ?>

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
              <input type="text" class="form-control" name="kundnr" id="kundnr" value="<?php echo $biggestkundnr; ?>" readonly></label>
          </div>

       <div class="grid_6">
            <label>Personnummer
              <input type="text" class="form-control" name="personnr" id="personnr" placeholder="ååmmdd" onkeypress="return isNumberKey(event)" required></label>
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
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="" onkeypress="return isNumberKey(event)" required></label>
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
                 <select class="form-control" id="korttyp" name="korttyp" onchange="specialkort()">
                  <?php echo $kort; ?>
                  </select></label>
              </div>
            </div>
            <div class="grid_6" id="gallerfran" name="gallerfran">
              <label>Gäller från <br>
               <input type="text" name="kortgiltigtfran" id="kortgiltigtfran" class="tcal" value="<?php echo date('Y-m-d');?>" >
              </label>
            </div>
        </div>


        <div class="grid_12"  id="specialkort" name="specialkort" style="visibility:hidden"> 

            <div class="grid_6" id="10kort" name="10kort" style="visibility:hidden">
              <label>Antal 10-kort<br>
               <select class="form-control" name="kortantal" id="kortantal">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
               </select>
              </label>
            
            </div>

            <div class="grid_6">
            <label>Gäller till <br>
              <input type="text" name="kortgiltigttill" id="kortgiltigttill" class="tcal" value="<?php echo date('Y-m-d');?>" >
            </label>
             </div>
        </div>
        		 

         <div class="grid_12">

            <div class="grid_6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="nyckelkort" id="nyckelkort" value='1'> Nyckelkort
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




<script>
function specialkort()
{
  var x=document.getElementById("korttyp");

    if (x.value=='SPECIAL')
    {
        document.getElementById("specialkort").style.visibility='visible';
    }
    else {
        document.getElementById("specialkort").style.visibility='hidden';
    }

    if (x.value=='10')
    {
      document.getElementById("gallerfran").style.visibility='hidden';
      document.getElementById("specialkort").style.visibility='hidden';
      document.getElementById("10kort").style.visibility='visible';
    }
    else {
       document.getElementById("gallerfran").style.visibility='visible';
       document.getElementById("10kort").style.visibility='hidden';
    }

}
</script>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<?php include("inc/footer.php"); ?>