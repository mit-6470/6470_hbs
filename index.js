$(document).ready(function() {

	var messagesTemplate = Handlebars.compile($('#msg-block-template').html());
	var singleMessageTemplate = Handlebars.compile($('#msg-template').html());
	Handlebars.registerPartial('message', $('#msg-template').html());

	// Populate the list of messages after page load, with AJAX and Handlebars :)
	$.get('get-messages.php', function(data) {
		$('#messages').html(messagesTemplate({'messages': data}));
	}, 'json');

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
				$('#name').val('');
				$('#new-msg').val('');

				// It's so easy now!
				$('#messages').prepend(singleMessageTemplate(data));
			}
		}, 'json');
	});
});