<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");


if(isset($_POST['Submit'])) {
	$assetnumber = mysqli_real_escape_string($mysqli, $_POST['assetnumber']);
	$type = mysqli_real_escape_string($mysqli, $_POST['type']);
	$location = mysqli_real_escape_string($mysqli, $_POST['location']);
	$rentaldate = mysqli_real_escape_string($mysqli, $_POST['rentaldate']);
	$returnedon = mysqli_real_escape_string($mysqli, $_POST['returnedon']);
	$cvip = mysqli_real_escape_string($mysqli, $_POST['cvip']);
	$inspectiondate = mysqli_real_escape_string($mysqli, $_POST['inspectiondate']);
		
	// checking empty fields
	if(empty($assetnumber) || empty($type) || empty($location)) {
				
		if(empty($assetnumber)) {
			echo "<font color='red'>Unit Number field is empty.</font><br/>";
		}
		
		if(empty($type)) {
			echo "<font color='red'>Type of Asset field is empty.</font><br/>";
		}
		
		if(empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)
			
		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO assets(assetnumber,type,location,rentaldate,returnedon,cvip,inspectiondate) VALUES('$assetnumber','$type','$location','$rentaldate','$returnedon','$cvip','$inspectiondate')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
	<div class="add-container">
	<div class="add-header">Add Asset</div>

	<form method="post" name="form1">
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
