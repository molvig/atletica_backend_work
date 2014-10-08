<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getmedlem.php"); ?>
<?php include("inc/getkorttyp.php"); ?>
<?php include ('inc/update_medlem.php'); ?>


  <div class="grid_2">
  <?php include("inc/menymedlem.php"); ?>
  
</div>

<div class="grid_5">
  <div class="grid_12">
  <h3>Uppdatera medlem </h3>
  </div>
	 <form role="form" action="medlem_uppdatera_post.php" method="post">
  
    <legend>Personlig information</legend>
    <fieldset>
    <div class="grid_12">
        <?php if ($fryst==1)
        { ?>
        <div class="alert alert-info"><span class="glyphicon glyphicon-lock"></span> Denna medlem har fryst sitt kort!</div>
       <?php } ?>
   </div>

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
<fieldset>
            <div class="grid_12">

           <?php if ($daysleft=="Ej börjat gälla")
              { ?>
              <div class="alert alert-warning"><span class="glyphicon glyphicon-flag"></span> <?php echo "Kortet har inte börjat gälla än";?></div>
             <?php }
              else if ($daysleft=="Autogiro" || $daysleft>=0)
              { ?>
              <div class="alert alert-success"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $daysleft;?></div>
             <?php }
              else if ($daysleft<0)
             {?>
              <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> <?php echo $daysleft;?></div> 
           <?php }?>
         
           </div>

        <div class="grid_12"> 
          <div class="grid_6">
            <label>Har varit medlem sedan
             <input type="date" class="form-control" name="startdatum" id="startdatum" value="<?php echo date('Y-m-d', strtotime($medlemsstart)); ?>" readonly></label>
           </div>
          <div class="grid_6">
            <label>Passantal
              <input type="text" class="form-control" name="passantal" id="passantal" value="<?php echo $passantal; ?>"></label>
           </div>
        </div>

        <div class="grid_12">
          <div class="grid_6">
            <label>KortID
             <input type="text" class="form-control" name="kortID" id="kortID" value="<?php echo $aktivtkortID; ?>" readonly></label>
           </div>

          <div class="grid_6">
            <?php if($nyckelkort==1)
           { ?>
           
            <div class="grid_6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="nyckelkort" id="nyckelkort" value='1' checked> Nyckelkort
                </label>
              </div>
            </div>
           <?php }
          else
          { ?>
        
            <div class="grid_6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="nyckelkort" id="nyckelkort" value='1'> Nyckelkort
                </label>
              </div>
            </div>
         <?php } ?>

        </div>




          </div> 

          <div class="grid_12">
            <div class="grid_6">
              <label>Aktuellt kort
                <input type="text" class="form-control" name="kort" id="kort" value="<?php echo $korttypen; ?>" readonly></label>
            </div>
          <div class="grid_6">
            <label>Gäller till <br>
              <input type="text" name="oldgiltigttill" id="oldgiltigttill" class="form-control" value="<?php echo date('Y-m-d', strtotime($giltigttill)); ?>" readonly>
            </label>
           </div>
        </div>

<?php if($antalklipp!= null) { ?>
          <div class="grid_12">
            <div class="grid_6">
              <label>Antal klipp kvar
                <input type="text" class="form-control" name="kort" id="kort" value="<?php echo $antalklipp; ?>" readonly></label>
            </div>
          <div class="grid_6">
            <label>Gäller till <br>
              <input type="text" name="date" class="form-control" value="" readonly>
            </label>
           </div>
        </div>
<?php } ?>
</fieldset>
<br>
<legend>Nytt medlemskort</legend>
<fieldset>
            <div class="grid_12">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="checknyttkort" id="checknyttkort"> <h4>Lägg till nytt kort</h4> <i>(Måste vara ikryssad för att lägga till ett nytt kort)</i>
                </label>
              </div>
            </div>
      <div class="grid_12"> 
          <div class="grid_6">
             <div class="form-group">
            <label>Lägg till ett nytt kort 
                 <select class="form-control" id="nyttkort" name="nyttkort" onchange="specialkort()">
                  <?php echo $kort; ?>
                  </select></label>
              </div>
            </div>
            <div class="grid_6" id="nyttgallerfran" name="nyttgallerfran">
              <label>Gäller från <br>
               <input type="text" name="nyttkortgiltigt" id="nyttkortgiltigt" class="tcal" value="<?php echo $nyttdatum; ?>" >
              </label>
            </div>
        </div>

<!--
        <div class="grid_12">
          <div class="alert alert-danger" role="alert">Det finns redan ett kort som gäller för detta datum</div>
        </div>
-->

        <div class="grid_12"  id="specialkort" name="specialkort" style="visibility:hidden"> 

            <div class="grid_6" id="10kort" name="10kort" style="visibility:hidden">
              <label>Antal 10-kort<br>
               <select class="form-control" name="antal10kort" id="antal10kort">
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
            <div class="grid_12">
              <h4>Befintliga medlemskort</h4>

               <div class="panel panel-default">
                  <table class="table">
                  <tr>
                    <td><h5>KortID</h5></td>
                    <td><h5>Korttyp</h5></td>
                    <td><h5>Gäller från</h5></td>
                    <td><h5>Gäller till</h5></td>
                    <td><h5>Status</h5></td>
                  </tr>
                   <?php echo $allakort; ?>
                </table>
              </div>
           </div>   
           </div>



</fieldset>  



        <div class="grid_6">
          <button type="submit" name="submit"  class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Uppdatera</button>
        </div>



</form>
</div>






<script>
function specialkort()
{
  var x=document.getElementById("nyttkort");

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



<?php include("inc/footer.php"); ?>