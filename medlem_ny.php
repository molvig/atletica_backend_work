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
          <label>Personnummer</label> <br>
               <div class="grid_4"><select class="form-control"  id ="date" name = "dd"></select></div>
               <div class="grid_4"><select class="form-control"  id ="month" name = "mm"></select></div>
               <div class="grid_4"><select class="form-control" id ="year" name = "yyyy"></select></div>

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
              <textarea rows="6" cols="80" class="form-control" name="note" id="note" row="6" placeholder="Något som kan vara värt att veta..."></textarea></label>

         </div>



    </form>
        
            <!-- Button trigger modal -->
            <button class="btn btn-default" data-toggle="modal" data-target="#myModal">
              Lägg till medlem
            </button>

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">Ny medlem</h4>
                </div>
                <div class="modal-body">
                  Du har nu skapat en ny medlem
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
                </div>
              </div>
            </div>
          </div>


</div>
     
    </div>
  </div>
</div>

</div>





<?php include("inc/footer.php"); ?>