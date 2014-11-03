<?php include("inc/db_con.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/getinstruktorer.php"); ?>



<div class="grid_12">
		<div class="grid_6">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#orsaken" aria-expanded="true" aria-controls="collapseOne">
				          Ställ in passet
				        </a>
				      </h4>
				    </div>
				    <div id="orsaken" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
						 <form class="form-inline" role="form" method="post">
						    <div class="form-group">
						    <input type="text" class="form-control" id="orsak" placeholder="Varför ställs passet in?" required>
						  </div>
						  <button type="submit" class="btn btn-default">Ställ in passet</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
				</div>
				</div>


		<div class="grid_6">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#bokagast" aria-expanded="true" aria-controls="collapseOne">
				          Ändra passet
				        </a>
				      </h4>
				    </div>
				    <div id="bokagast" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
						 <form role="form" action="#" method="post">
				    <div class="grid_12">

				          <div class="grid_12">
				              <label>Datum
				                   <input type="text" name="datum" class="form-control" id="datum" value="2014-12-24" readonly >
				              </label>

				          </div>
				  </div>

				  <div class="grid_12">

				          <div class="grid_6">
				              <label>Pass
				                   <input type="text" name="pass" class="form-control" id="pass" value="Bodypump" readonly>
				              </label>
				          </div>

				          <div class="grid_6">
				              <label>Instruktör
				                   <input type="text" name="instruktor" class="form-control" id="instruktor" value="Martin" readonly>
				              </label>
				              </select>
				          </div>

				  </div>


				  <div class="grid_12">

				          <div class="grid_6">
				              <label>Starttid
				                  <input id="start" type="text" class="form-control" value="18:00" readonly >
				              </label>
				          </div>

				          <div class="grid_6">
				              <label>Sluttid
				                  <input id="slut" type="text" class="form-control" value="18:55" readonly >
				              </label>
				 
				          </div>
				  </div>


				  <div class="grid_12">      
				          <div class="grid_6">
				              <label>Antal platser
				                <input type="number" class="form-control" name="platser" min="0" max="100"  id="platser" onkeypress="return isNumberKey(event)" required value="20">
				              </label>
				          </div>
				    
				          <div class="grid_6">
				              <label>Kommentar
				                <input type="text" name="information" class="form-control" id="information" placeholder="Ex. annan instruktör" >
				              </label>
				          </div>
				  </div>

				  <div class="grid_12">
				    <input type="submit" class="btn btn-default" name="andra_pass" value="Ändra passinformation"/>
				  </div>


				</form>
				      </div>
				    </div>
				  </div>
				</div>
				</div>
				</div>

</div>





<?php include("inc/footer.php"); ?>