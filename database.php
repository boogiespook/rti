<?php
function connectDB() {
## Database stuff
global $db;
	$db = mysqli_connect('localhost','XXXXX','XXXXXX');
	
if (!$db) {
	die("Unable to connect to database");
	}
if (!mysqli_select_db($db, 'spider')) {
		die("Unable to access innovate database");
	}
}
?>
