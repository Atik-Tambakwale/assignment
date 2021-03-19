$("#forget-form").submit("click", function (e) {
	var path = $("#host").val();
	e.preventDefault();
	if ($("#forget-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var email = $("#user_email").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'emailData',
			data: {
				csrf_test_name, email
			},
			success: function (json) {
				if (json.status == 200) {
					document.getElementById("forget-form").reset();
					$.toast({
						text: 'data is fetched successfully',
						icon: 'success',
						position: "top-right",
					});

					location.href = path + 'setpassword?email=' + email;
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO:Update change password 
$("#update-password").submit("click", function (e) {
	var path = $("#host").val();
	e.preventDefault();
	if ($("#update-password").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var email = $("#user").val();
		var password = $("#password").val();
		var rep_password = $("#rep_password").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'changePass',
			data: {
				csrf_test_name, email, password, rep_password
			},
			success: function (json) {
				if (json.status == 200) {
					document.getElementById("update-password").reset();
					location.href = path;
					$.toast({
						text: 'Changed password completed successfully',
						icon: 'success',
						position: "top-right",
					});

				}
				else {
					alert(json.msg);
				}
			}
		});
	}
});