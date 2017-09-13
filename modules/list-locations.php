<?php
//including the database connection file
include_once("../config/config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id ASC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM locations ORDER BY name ASC"); // using mysqli_query instead
?>
<html>
<head>
  <title>List of Locations</title>
</head>
<body>
  <div class="container">
	<table id="myTable" width='320px' border=0>

	<tr bgcolor='#CCCCCC' id="frontpage">
		<td>Name</td>
		<td>Address</td>
	</tr>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td class=\"text-center\"><b>".$res['name']."</b></td>";
		echo "<td class=\"text-center\">".$res['address']."</center></td>";
		//echo "<td>".$res['location']."</td>";
		//echo "<td>".$res['rentaldate']."</td>";
		//echo "<td>".$res['returnedon']."</td>";
		//echo "<td>".$res['cvip']."</td>";
		//echo "<td><a href=\"edit.php?id=$res[id]\" onClick=\"return popitup('edit.php?id=$res[id]')\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
  </div>
</body>
