<?php include("inc/header.php"); ?>

<form method="post" action="#">

	<table>
		<tr>
			<th>
				<label for="option">Pass</label><div class="nyttpass"><a href="#">Saknas passet? Klicka här</a></div>
			</th>
			<td>
				<select name="pass">
				<option value="bodypump">Bodypump</option>
				<option value="outdoor">Outdoor Intervall</option>
				<option value="bodybalace">BodyBlanace</option>
				</select> 
			</td>
		</tr>
				<tr>
					<th>
						<label for="info">Information</label>
					</th>
					<td>
						 <input type="text" name="info" id="info">
					</td>
				</tr>
		<tr>
			<th>
				<label for="option">Startar</label>
			</th>
			<td>
				<select name="start">
				<option value="Sandra">16.00</option>
				<option value="Olivia">16.15</option>
				<option value="Ellinor">16.30</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				<label for="option">Slutar</label>
			</th>
			<td>
				<select name="slut">
				<option value="Sandra">17.00</option>
				<option value="Olivia">17.15</option>
				<option value="Ellinor">17.30</option>
				</select>
			</td>
		</tr>
	<tr>
			<th>
				<label for="option">Veckodag</label>
			</th>
			<td>
				<select name="instruktorer">
				<option value="Monday">Måndag</option>
				<option value="Tuesday">Tisdag</option>
				<option value="Wednesday">Onsdag</option>
				<option value="Thursday">Torsdag</option>
				<option value="Friday">Fredag</option>
				<option value="Saturday">Lördag</option>
				<option value="Sunday">Söndag</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				<label for="option">Välj instruktör</label>
			</th>
			<td>
				<select name="instruktorer">
				<option value="Sandra">Sandra</option>
				<option value="Olivia">Olivia</option>
				<option value="Ellinor">Ellinor</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				<label for="option">Vilket schema?</label>
			</th>
			<td>
				<select name="schema">
				<option value="spring">Vår</option>
				<option value="summer">Sommar</option>
				<option value="fall">Höst</option>
				<option value="xmas">Jul</option>
				<option value="easter">Påsk</option>
				</select>
			</td>
		</tr>
	</table>
	<input type ="submit" value="Spara">

	</form>

<form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<input type="text" class="form-control" placeholder="Text input">

<select class="form-control">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>






<?php include("inc/footer.php"); ?>