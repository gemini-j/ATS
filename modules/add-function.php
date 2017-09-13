
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
