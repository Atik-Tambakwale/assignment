// Login
$("#login-form").submit(function (e) {
	e.preventDefault()
	var path = $("#host").val();

	if ($(this).parsley().isValid()) {

		var csrf_test_name = $.cookie('csrf_cookie_name');
		var username = $.trim($("#login_email").val());
		var password = $.trim($("#login_password").val());
		$.ajax({
			url: path + 'auth',
			type: 'POST',
			dataType: 'JSON',
			data: { csrf_test_name, 'username': username, 'password': password },
			success: function (json) {
				if (json.status == 200) {

					location.href = path + 'dashboard?state=login';
				} else {
					$.toast({
						heading: 'Information',
						text: json.msg,
						ShowHideTransition: 'slide',
						icon: 'warning',
						position: "top-right"
					})
					//(json.msg);
				}
			}
		});
	}
});
