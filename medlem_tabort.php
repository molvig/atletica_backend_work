<?php include("inc/db_con.php"); ?>
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
            <p><?php  ?></p></label>
        </div>

       <div class="grid_6">
          <label>Personnummer
            <p><?php ?></p></label>
        </div>

    </div>


       <div class="grid_12">

          <div class="grid_6">
            <label>Förnamn
            	<p><?php ?></p></label>
          </div>

          <div class="grid_6">
            <label>Efternamn
              <p><?php ?></p></label>
          </div>

       </div>

       <div class="grid_12">

          <div class="grid_6">
            <label>Telefonnummer
              <p><?php ?></p></label>
          </div>

          <div class="grid_6">
            <label>Email
              <p><?php ?></p></label>
           </div>

       </div>



           <div class="grid_12">

        <div class="grid_6">
          <label>Kortet är giltligt till
            <p><?php ?></p></label>
        </div>

    </div>
<br>
</form>
        
            <!-- Button trigger modal -->
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
              <span class="glyphicon glyphicon-trash"></span> Radera medlem
            </button>

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="myModalLabel">Radera</h4>
                </div>
                <div class="modal-body">
                 Vill du verkligen radera denna medlem? Om du väljer att radera kommer medlemmen att raderas. Det går inte att ångra eller återskapa. 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger">Radera</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Avbryt</button>
                </div>
              </div>
            </div>
          </div>

</div>


    


</div>
<?php include("inc/footer.php"); ?>



