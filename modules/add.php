<html>
<?php
include_once("../config.php");
?>
<head>
	<title>Add Data</title>
</head>

<body>
	<div class="add-container modal-body">
	<div class="add-header text-center">Add Asset</div>

	<form action="add-function" method="post" name="form1">
		<table width="25%" border="0">
		
			<tr>
				<td>Unit Number</td>
				<td><input type="text" name="assetnumber"></td>
			</tr>
			<tr>
				<td>Type</td>
				<td><select name="type">
				      <option value=""> --Select Type-- </option>
				      <option value="53 Ft Flat Deck">53 Ft Flat Deck</option>
              <option value="48 Ft Flat Deck">48 Ft Flat Deck</option>
              <option value="53 Ft Dry Van">53 Ft Dry Van</option>
              <option value="48 Ft Dry Van">48 Ft Dry Van</option>
              <option value="Heater">Heater Dry Van</option>
              <option value="Reefer">Reefer Dry Van</option>
            </select></td>
			</tr>
			<tr>
				<td>Location</td>
				<td>
				  <select name="location"><option value=""> --Select Location-- </option>
            <?php $sql= mysqli_query($mysqli, "SELECT name FROM locations ORDER BY name DESC");
                while($result = mysqli_fetch_array($sql)){
                echo "<OPTION VALUE='".$result[0]."'>".$result[0]."</OPTION>";
                }
            ?>
          </select>
        </td>
			</tr>
			<tr>
			<tr>
				<td>Rental Date</td>
				<td><input type="date" name="rentaldate"></td>
			</tr>
			<tr>
			<tr>
				<td>Returned On</td>
				<td><input type="date" name="returnedon"></td>
			</tr>
			<tr>
				<td>Inspection Date</td>
				<td><input type="date" name="inspectiondate"></td>
			</tr>
			<tr>
				<td>Inspected?</td>
				<td>
					<select name="cvip">
						<option value="NO">NO</option>
						<option value="YES">YES</option>
					</select>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	</div>

</body>
</html>