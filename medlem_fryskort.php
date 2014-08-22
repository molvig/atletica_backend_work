
 <div class="grid_12">
        
         <?php if($fryst==1)
           { ?>
           
           <div class="grid_6">
            <br>
               <button type="submit" name="submit"  class="btn btn-default">Tina kort</button>
          </div>

            <div class="grid_6">
            <label>Kortet frystes
             <input type="date" class="form-control" name="frysdate" id="frysdate" value="<?php echo date('Y-m-d', strtotime($frysdatum)); ?>" readonly></label>
           </div>
           <?php }
          else
          { ?>
        
        <div class="grid_6">
          <br>
                <button type="submit" name="submit"  class="btn btn-default">Frys kort</button>
        </div>
         <?php } ?>
        

     </div>