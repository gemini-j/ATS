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