<?php include("inc/db_con.php"); ?>
<?php include("inc/getmedlem.php"); ?>
<?php include("inc/header.php"); ?>
<div class="grid_2">
  <?php include("inc/menyinst.php"); ?>
  
</div>

<div class="grid_5">
  <div class="grid_12">
  <h3>Radera medlem</h3>

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

              <label>Anteckning
              <textarea class="form-control" name="note" id="note" placeholder="Något som kan vara värt att veta..."></textarea></label>

         </div>

        
        <div class="grid_6">
          <button type="submit" name="submit"  class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Radera medlem</button>
            <h5 style="color:red">Om du raderar denna medlemmen är det permanent och det går inte att återskapa eller ångra.</h5>
        </div>

</div>


    </form>


</div>
<?php include("inc/footer.php"); ?>



