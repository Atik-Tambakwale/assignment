// function showCustomer(str) {
// 	var xhttp;
// 	if (str == "") {
// 		document.getElementById("txtHint").innerHTML = "";
// 		return;
// 	}
// 	xhttp = new XMLHttpRequest();
// 	xhttp.onreadystatechange = function () {
// 		if (this.readyState == 4 && this.status == 200) {
// 			var json = JSON.parse(this.responseText);
// 			var data = json.data;
// 			document.getElementById("efname").value = data.fname
// 			document.getElementById("elname").value = data.lname
// 		}
// 	};
// 	xhttp.open("GET", "api/getUser.php?q=" + str, true);
// 	xhttp.send();
// }
// function showDeleteUser(str) {
// 	var xhttp;
// 	if (str == "") {
// 		document.getElementById("txtHint").innerHTML = "";
// 		return;
// 	}
// 	xhttp = new XMLHttpRequest();
// 	xhttp.onreadystatechange = function () {
// 		if (this.readyState == 4 && this.status == 200) {
// 			document.getElementById("txtHint").innerHTML = this.responseText;
// 		}
// 	};
// 	xhttp.open("GET", "api/deleteUser.php?q=" + str, true);
// 	xhttp.send();
// }
function update_user(){
	var id = document.getElementById('user_id').value.trim();
	var fname = document.getElementById("efname").value.trim();
	var lname = document.getElementById("elname").value.trim();
	var email = document.getElementById("eemail").value.trim();
	var mobile = document.getElementById("emobile").value.trim();
	var address = document.getElementById("eaddress").value.trim();

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var json = JSON.parse(this.responseText);//we are store json format response in response_data variable using JSON.parse()
			alert(json.msg);//after that it will display alert pop
			$("#form").modal("hide"); 
			fetch_users();// it load fetch_users() which has list of users
		}
	};
	xhttp.open("POST", "api/updateUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+id+"&fname=" + fname + "&lname=" + lname + "&email=" + email + "&mobile=" + mobile + "&address=" + address);
 	return false;
};
function delete_user(data) {
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var response_data = JSON.parse(this.responseText);//we are store json format response in response_data variable using JSON.parse()
			alert(response_data.msg);//after that it will display alert pop
			fetch_users();// it load fetch_users() which has list of users
		}
	};
	xhttp.open("GET", "api/deleteUser.php?id=" + data, true);
	xhttp.send();
}
function editUserdetail(getid) {
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					var json = JSON.parse(this.responseText);
					var data = json.data;
					document.getElementById("user_id").value = data.id;
					document.getElementById("efname").value = data.fname;
					document.getElementById("elname").value = data.lname;
					document.getElementById("eemail").value = data.email;
					document.getElementById("emobile").value = data.mobile;
					document.getElementById("eaddress").value = data.address;
				}
			}
	xhttp.open("GET", "api/getUser.php?id=" + getid, true);
	xhttp.send();
};

	function add_user() {
		var fname = document.getElementById("fname").value.trim();
		var lname = document.getElementById("lname").value.trim();
		var email = document.getElementById("email").value.trim();
		var mobile = document.getElementById("mobile").value.trim();
		var address = document.getElementById("address").value.trim();

		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var response = JSON.parse(this.responseText);
				alert(response.msg);
				document.getElementById("add-user-frm").reset();
				fetch_users();
			}
		};
		xhttp.open("POST", "api/add-user.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("fname=" + fname + "&lname=" + lname + "&email=" + email + "&mobile=" + mobile + "&address=" + address);

		return false;
	}
function fetch_users() {
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(this.responseText);
				var str = "<table class='table table-striped table-hover'>" +
					"<thead>" +
					"<tr><th>#</th><th>NAME</th><th>MOBILE</th><th>EMAIL</th><th>ADDRESS</th><th>CREATED</th><th>MODIFIED</th><th>ACTIONS</th></tr>" +
					"</thead><tbody>";
				for (i = 0; i < data.length; i++) {
					str += "<tr>" +
						"<td>" + (i + 1) + "</td>" +
						"<td>" + data[i].fname.toUpperCase() + " " + data[i].lname.toUpperCase() + "</td>" +
						"<td>" + data[i].mobile + "</td>" +
						"<td>" + (data[i].email == null ? "----" : data[i].email) + "</td>" +
						"<td>" + data[i].address.toUpperCase() + "</td>" +
						"<td>" + data[i].created_at + "</td>" +
						"<td>" + data[i].updated_at + "</td>" +
						"<td>" +
						"<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#form' onclick='editUserdetail(" + data[i].id + ")'>EDIT</button>" +
						"<a type='button' class='btn btn-danger' href='#' onclick='delete_user(" + data[i].id + ")'>DELETE</a>" +
						"</td>" +
						"</tr>";
				}
				str += "</tbody>" +
					"</table>";
				document.getElementById("users-list").innerHTML = str;
			}
		}
		xhttp.open("GET", "api/getUsersList.php", true);
		xhttp.send();
	}
