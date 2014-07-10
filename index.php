<?php include("inc/db_con.php"); ?>
<?php include("inc/medlemmar.php"); ?>
<?php include("inc/header.php"); ?>

<div class="grid_4">
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Måndag 21 Juli</h3>
  </div>
  <div class="panel-body">
	<div class="list-group">
		 <a href="#" class="list-group-item">  <span class="badge pull-right">10/24</span>Bodypump</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">12/24</span>Outdoor Intervall</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">20/24</span>BodyBalance</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">5/24</span>TRX</a>
	</div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tisdag 22 Juli</h3>
  </div>
  <div class="panel-body">
	<div class="list-group">
		 <a href="#" class="list-group-item">  <span class="badge pull-right">1/24</span>Bodypump</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">15/24</span>Outdoor Intervall</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">8/24</span>BodyBalance</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">23/24</span>TRX</a>
	</div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Onsdag 23 Juli</h3>
  </div>
  <div class="panel-body">
	<div class="list-group">
		 <a href="#" class="list-group-item">  <span class="badge pull-right">1/24</span>Bodypump</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">15/24</span>Outdoor Intervall</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">8/24</span>BodyBalance</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">23/24</span>TRX</a>
	</div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Torsdag 24 Juli</h3>
  </div>
  <div class="panel-body">
	<div class="list-group">
		 <a href="#" class="list-group-item">  <span class="badge pull-right">1/24</span>Bodypump</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">15/24</span>Outdoor Intervall</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">8/24</span>BodyBalance</a>
		 <a href="#" class="list-group-item">  <span class="badge pull-right">23/24</span>TRX</a>
	</div>
  </div>
</div>
 </div>

<div class="grid_2">

</div>	


<div class="grid_6">

	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Bodypump Måndag 21 Juli</h3>
  </div>
<div class="table-responsive">
  <table class="table">
    <?php echo $kund; ?>
<tr class='alert alert-danger'>
	<td>Jennie</td>
	<td>Molvig</td>
	<td>9609</td>
	<td><button type='submit' class='btn btn-default btn-sm' ><span class='glyphicon glyphicon-ok'></span></button></td>
	<td><button type='submit' class='btn btn-default btn-sm' data-toggle="tooltip" data-placement="right" title="Ta bort kund från passet"><span class='glyphicon glyphicon-trash'></span></button></td>
</tr>
<tr class='alert alert-danger'>
	<td>Sandra</td>
	<td>Ekström</td>
	<td>7855</td>
	<td><button type='submit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-ok'></span></button></td>
	<td><button type='submit' class='btn btn-default btn-sm' data-toggle="tooltip" data-placement="right" title="Ta bort kund från passet"><span class='glyphicon glyphicon-trash'></span></button></td>
</tr>
  </table>
</div>
</div>
</div>








<?php include("inc/footer.php"); ?>
