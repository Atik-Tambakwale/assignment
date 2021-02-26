function isFormValidation() {
	var fname = document.forms["RegForm"]["fname"];
	var lname = document.forms["RegForm"]["lname"];
	var email = document.forms["RegForm"]["email"];
	var mobile = document.forms["RegForm"]["mobile"];
	var address = document.forms["RegForm"]["address"];

	if (fname.value == "") {
		window.alert("Please enter your name.");
		fname.focus();
		return false;
	}

	if (lname.value == "") {
		window.alert("Please enter your address.");
		address.focus();
		return false;
	}
	if (email.value == "") {
		window.alert("Please enter your address.");
		email.focus();
		return false;
	}
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if (email.value.match(mailformat)) {
		alert("Valid email address!");
		email.focus();
		return true;
	}
	else {
		alert("You have entered an invalid email address!");
		email.focus();
		return false;
	}
	if (mobile.value == "") {
		window.alert(
			"Please enter your telephone number.");
		mobile.focus();
		return false;
	}
	if (address.value == "") {
		window.alert("Please enter your password");
		address.focus();
		return false;
	}

	if (what.selectedIndex < 1) {
		alert("Please enter your course.");
		what.focus();
		return false;
	}

	return true;
}
	
