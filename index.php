<?php
//including the database connection file
include_once("config/config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id ASC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM assets ORDER BY assetnumber ASC"); // using mysqli_query instead
?>
<html>
<head>
	<meta http-equiv="refresh" content="120" >
	<title>ATS</title>
</head>

<body>

<div class="col-sm-2 hidden-md-down navigation no-gutters">
	<div class="header"></div>
	<input type="text" id="search-input" onkeyup="search()" placeholder="Locations">
    <button type="button" class="btn btn-primary btn-sm nav text-center"><a href="modules/add" onclick="return popitup('modules/add')">Add Asset</a></button>
	<button type="button" class="btn btn-primary btn-sm nav text-center"><a href="modules/add-location" onclick="return popitup('modules/add-location')">Add Location</a></button>
	<button type="button" class="btn btn-primary btn-sm nav text-center"><a href="modules/list-locations" onclick="return popitup('modules/list-locations')">List of Locations</a></button>
	<button type="button" class="btn btn-primary btn-sm nav text-center"><a href="modules/list-inspected-trailers" onclick="return popitup('modules/list-inspected-trailers')">Inspected Trailers</a></button>
	<hr />
	<button class="btn btn-success" onclick="versionButton()">Created by 100SENSE</button>
</div>


<div class="col-md-10 table-trailer w-100 float-right no-gutters" id="refresher">
	<table class="table table-striped sortable" border=0 id="search-table">
    <thead>
	<tr bgcolor='#CCCCCC' id="frontpage">
		<th>Unit Number</a></th>
		<th>Type</th>
		<th>Location</a></th>
		<th>Rental Date</th>
		<!--<th>Billing Date</th> -->
		<th>Returned On</th>
		<th>CVIP</th>
		<th>Inspection Date</th>
		<th class="sorttable_nosort">Update</th>
	</tr>
	</thead>
	<?php
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
	while($res = mysqli_fetch_array($result)) {
		echo "<tr id=\"fronttable\">";
		echo "<td id=\"assetnumber\"><b>".$res['assetnumber']."</b></td>";
		echo "<td>".$res['type']."</td>";
		echo "<td class=\"location\">".$res['location']."</td>";
		echo "<td>".$res['rentaldate']."</td>";
		echo "<td>".$res['returnedon']."</td>";
		echo "<td>".$res['cvip']."</td>";
		echo "<td>".$res['inspectiondate']."</td>";
		echo "<td><a href=\"modules/edit?id=$res[id]\" onClick=\"return popitup('modules/edit?id=$res[id]')\">Edit</a> | <a href=\"modules/delete?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	}
	?>
	</table>
	<div id="snackbar">This is version <?php echo $versionNumber ?> of ATS!</div>
	<div id="theModal" class="modal fade text-center">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
    </div>
  </div>
</div>
<div class="footer">
  <?php include 'footer.php';?>
</div>
</body>
