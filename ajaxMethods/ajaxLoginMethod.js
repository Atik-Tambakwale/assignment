$("#loginForm").submit('click', function (e) {
	e.preventDefault();
	if ($(this).parsley().isValid()) {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "api/login.php",
			data: {
				email: $("#login_email").val(),
				password: $("#login_password").val()
			},
			success: function (json) {

				if (json.status == 200) {
					window.location.replace("dashboard.php");
				}
				else {
					alert(json.msg);
				}
				;
			}
		})
	}
});