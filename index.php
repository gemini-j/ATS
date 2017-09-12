<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id ASC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM assets ORDER BY assetnumber ASC"); // using mysqli_query instead
$inspected_result = mysqli_query($mysqli, "SELECT * FROM assets WHERE cvip = 'YES'");
?>

<html>
<head>
	<!-- <meta http-equiv="refresh" content="10" > -->
	<title>ATS Version 1.1</title>
</head>
<script>
<!--
function popitup(url) {
    newwindow=window.open(url,'name','height=250,width=350');
    if (window.focus) {newwindow.focus()}
    return false;
}

// --></script>

<body>

<div class="col-sm-2 hidden-md-down navigation">
	<div class="header"><img src="images/logo.jpg" width="30%" height="8%"></div><br />
	<button type="button" class="btn btn-primary btn-sm nav text-center nyroModal"><a href="add" onclick="return popitup('add')">Add Asset</a></button>
	<button type="button" class="btn btn-primary btn-sm nav text-center"><a href="add-location" onclick="return popitup('add-location')">Add Location</a></button>
	<button type="button" class="btn btn-primary btn-sm nav text-center"><a href="list-locations" onclick="return popitup('list-locations')">List of Locations</a></button>
	<button type="button" class="btn btn-primary btn-sm nav text-center"><a href="list-inspected-trailers" onclick="return popitup('list-inspected-trailers')">Inspected Trailers</a></button>
</div>


<div class="col-md-10 table-trailer w-100 float-right">
	<table class="table table-striped" border=0>

	<tr bgcolor='#CCCCCC' id="frontpage">
		<td>Unit Number</td>
		<td>Type</td>
		<td>Location</td>
		<td>Rental Date</td>
		<td>Returned On</td>
		<td>CVIP</td>
		<td>Update</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr id=\"fronttable\">";
		echo "<td id=\"assetnumber\"><b>".$res['assetnumber']."</b></td>";
		echo "<td>".$res['type']."</td>";
		echo "<td>".$res['location']."</td>";
		echo "<td>".$res['rentaldate']."</td>";
		echo "<td>".$res['returnedon']."</td>";
		echo "<td>".$res['cvip']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\" onClick=\"return popitup('edit.php?id=$res[id]')\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
</div>

</body>
