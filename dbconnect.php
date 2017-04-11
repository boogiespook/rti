<?php
function connectDB() {
## Database stuff
global $db;
$db = ($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'XXXXX', 'XXXX'));

	if (!$db) {
	die("Unable to connect to database");
	}
##if (!mysql_select_db('spider')) {
if (!mysqli_select_db($GLOBALS["___mysqli_ston"], "spider")) 
{		
	die("Unable to access spider database");
	}
}
?>
