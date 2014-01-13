<?php

	require('db.php');

	$query = "SELECT name, message FROM messages ORDER BY time DESC";
	$res = mysql_query($query) or die(mysql_error());

	$messages = array();
	while($row = mysql_fetch_assoc($res)) {
		$msg = array('name' => $row['name'], 'message' => $row['message']);
		$messages[] = $msg;
	}
?>

<html>
<head>
	<style>
		.name {
			font-style: italic;
		}
		textarea {
			width: 400px;
			height: 150px;
		}
	</style>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="handlebars-v1.3.0.js" type="text/javascript"></script>

	<!-- The Handlebars template -->
	<script id="msg-template" type="text/x-handlebars-template">
		<li><span class="name">{{name}}</span>: {{message}}</li>
	</script>

	<script id="msg-block-template" type="text/x-handlebars-template">
		{{#each messages}}
			{{> message}}
		{{/each}}
	</script>

	<script src="index.js" type="text/javascript"></script>

	<title>6470 Message Board</title>
</head>
<body>
	<h1>Messages</h1>
	Add a new message: <br />
	Name: <input type="text" id="name"><br />
	<textarea id="new-msg"></textarea><br />
	<button id="submit">Submit</button>
	<ul id="messages"></ul><br />
</body>
</html>