<html>
<?php
include_once("../config/config.php");
?>
<head>
	<title>Add Location</title>
</head>

<body>
	<div class="add-container">
	<div class="add-header text-center">Add Location</div>

	<form action="add-location-function" method="post" name="form1">
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
