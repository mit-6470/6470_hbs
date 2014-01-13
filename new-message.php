<?php
	if (empty($_POST['name']) || empty($_POST['message'])) {
		$response = array('success' => FALSE);
		echo json_encode($response);
		exit(0);
	}

	require('db.php');

	$user = mysql_real_escape_string($_POST['name']);
	$message = mysql_real_escape_string($_POST['message']);
	$query = "INSERT INTO messages VALUES ('$user', '$message', NOW())";
	$result = mysql_query($query) or die(mysql_error());

	if ($result) {
		$response = array('success' => TRUE, 'name' => $user, 'message' => $message);
	} else {
		$response = array('success' => FALSE);
	}
	echo json_encode($response);
?>