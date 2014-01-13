<?php
	require('db.php');

	$query = "SELECT name, message FROM messages";
	$result = mysql_query($query) or die(mysql_error());
	$response = array();
	while($row = mysql_fetch_assoc($result)) {
		$response[] = $row;
	}
	echo json_encode($response);
?>