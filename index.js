$(document).ready(function() {
	$('#submit').click(function() {
		var name = $('#name').val();
		var message = $('#new-msg').val();

		$.post('new-message.php', { // make the AJAX request to new-message.php
			'name': name,
			'message': message
		}, function(data) { // this function will be executed when the server's response arrives

			// Note that because we specify 'json', jQuery will automatically parse the response
			// and the argument 'data' becomes a Javascript object instead of a simple string
			if (data.success) {
				var item = $('<li />').html('<span class="name">' + data.name + '</span>: ' + data.message + '</li>');
				$('#messages').prepend(item);
			}
		}, 'json');
	});
});