<html>
<head>
	<title>Add Location</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");


if(isset($_POST['Submit'])) {
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
		
	// checking empty fields
	if(empty($name) || empty($address)) {
				
		if(empty($name)) {
			echo "<font color='red'>Unit Number field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Type of Asset field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// if all the fields are filled (not empty)
			
		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO locations(name,address) VALUES('$name','$address')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
	<div class="add-container">
	<div class="add-header text-center">Add Location</div>

	<form method="post" name="form1">
		<table width="80%" border="0">
			<tr>
				<td>Name of Location</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="address"></td>
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
