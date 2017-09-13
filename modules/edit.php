<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE assets SET assetnumber='$assetnumber',type='$type',location='$location',rentaldate='$rentaldate',returnedon='$returnedon',cvip='$cvip',inspectiondate='$inspectiondate' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM assets WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$assetnumber = $res['assetnumber'];
	$type = $res['type'];
	$location = $res['location'];
	$rentaldate = $res['rentaldate'];
	$returnedon = $res['returnedon'];
	$cvip = $res['cvip'];
	$inspectiondate = $res['inspectiondate'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<div class="add-container">
	<div class="add-header">Edit Asset</div>
	
	<form name="form1" method="post" action="edit">
		<table border="0">
			<tr>
				<td>Unit Number</td>
				<td><input type="text" name="assetnumber" value="<?php echo $assetnumber;?>"></td>
			</tr>
			<tr>
				<td>Type</td>
				<td><select name="type">
				      <option value="<?php echo $type;?>"><?php echo $type;?></option>
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
				<td><select name="location"><option value="<?php echo $location;?>">Current: <?php echo $location;?></option>
            <?php $sql= mysqli_query($mysqli, "SELECT name FROM locations ORDER BY name DESC");
                while($result = mysqli_fetch_array($sql)){
                echo "<OPTION VALUE='".$result[0]."'>".$result[0]."</OPTION>";
                }
            ?>
          </select>
</td>
			</tr>
			<tr>
			  <td>Rental Date</td>
			  <td><input type="date" name="rentaldate" value="<?php echo $rentaldate;?>"></td>
			</tr>
			<tr>
			  <td>Returned On</td>
			  <td><input type="date" name="returnedon" value="<?php echo $returnedon;?>"></td>
			</tr>
			<tr>
			  <td>Inspection Date</td>
			  <td><input type="date" name="inspectiondate" value="<?php echo $inspectiondate;?>"></td>
			</tr>
			<tr>
			  <td>Inspected?</td>
			  <td>
				<select name="cvip">
					<option value="<?php echo $cvip;?>">Current: <?php echo $cvip;?></option>
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</select>

			  </td>
			</tr>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
