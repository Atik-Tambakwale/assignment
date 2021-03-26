
//TODO::user login

$("#login-form").submit('click', function (e) {
	var path = $("#host").val();
	e.preventDefault();
	if ($(this).parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var email = $.trim($("#email").val());
		var password = $.trim($("#password").val());
		$.ajax({
			url: path + 'auth',
			type: 'POST',
			dataType: 'JSON',
			data: { csrf_test_name, email, password },
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
		})
	}
});