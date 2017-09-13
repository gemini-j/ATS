<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","L33tm0th3r!")
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("trailer-board",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */
echo '<script src="scripts/jquery-3.2.1.min.js" crossorigin="anonymous"></script>';
echo '<script src="scripts/modal.js" crossorigin="anonymous"></script>';
echo '<script src="scripts/functions.js" crossorigin="anonymous"></script>';
echo '<script src="scripts/sorttable.js" crossorigin="anonymous"></script>';
echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
echo '<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">';
echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>';

$databaseHost = 'localhost';
$databaseName = 'trailer-board';
$databaseUsername = 'root';
$databasePassword = 'L33tm0th3r!';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
 
?>


