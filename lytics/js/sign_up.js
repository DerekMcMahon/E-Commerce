var f_name_valid = false;
var l_name_valid = false;
var email_valid = false;
var password_valid = false;
var address_valid = false;
var city_valid = false;
var state_valid = false;
var zip_valid = false;

function check_input(element) {
	
	if (element.value != "") {
		element.style.borderLeft = "6px solid #40A46F";

		if (element.name == "first_name") {
			f_name_valid = true;

		} else if (element.name == "last_name") {
			l_name_valid = true;
 
		}  else if (element.name == "email") {
			var email_error = document.getElementById("email_error");
			var re = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
			var check = re.test(element.value);

			if (!check) {
				element.style.borderLeft = "6px solid red";
				email_error.innerHTML = "invalid email address";
				email_valid = false;
			} else {
				element.style.borderLeft = "6px solid #40A46F";
				email_error.innerHTML = "";
				email_valid = true;
			}

		} else if (element.name == "password") {
			var pwd_check = document.getElementsByName("password_check")[0];
			var pwd_error = document.getElementById("pwd_error");

			pwd_check.value = "";
			pwd_check.style.borderLeft = "";
			pwd_error.innerHTML = "";

		} else if (element.name == "password_check") {
			var pwd = document.getElementsByName("password")[0];
			var pwd_error = document.getElementById("pwd_error");

			if (pwd.value != element.value) {
				element.style.borderLeft = "6px solid red";
				pwd_error.innerHTML = "retyped address does not match";
			} else {
				password_valid = true;
			}
		
		} else if (element.name == "address") {
			address_valid = true;

		} else if (element.name == "city") {
			city_valid = true;
 
		} else if (element.name == "state") {
			var re = /[A-Z]{2}/;
			var check = re.test(element.value);
			var error = document.getElementById("state_zip_error");

			if (!check) {
				element.style.borderLeft = "6px solid red";
				error.innerHTML = "invalid state";
			} else {
				element.style.borderLeft = "6px solid #40A46F";
				error.innerHTML = "";
				state_valid = true;
			}

		} else if (element.name == "zip_code") {

 			zip_valid = true;

		}

	} else {
		element.style.borderLeft = "";
	}
}

function check_validate_submit() {
	var success = true;

	if (!f_name_valid || !l_name_valid) {
		success = false;
		error = document.getElementById("name_error");
		error.innerHTML = "please enter name";
		if (!f_name_valid) {
			document.getElementsByName("first_name")[0].style.borderLeft = "6px solid red";
		}
		if (!l_name_valid) {
			document.getElementsByName("last_name")[0].style.borderLeft = "6px solid red";
		}
	}

	if (!email_valid) {
		success = false;
		error = document.getElementById("email_error");
		error.innerHTML = "please enter email";
		document.getElementsByName("email")[0].style.borderLeft = "6px solid red";
	}

	if (!password_valid) {
		success = false;
		error = document.getElementById("pwd_error");
		error.innerHTML = "please enter valid password";
		document.getElementsByName("password")[0].style.borderLeft = "6px solid red";
		document.getElementsByName("password_check")[0].style.borderLeft = "6px solid red";
	}

	if (!address_valid || !city_valid) {
		success = false;
		error = document.getElementById("adr_city_error");
		error.innerHTML = "please enter valid address or city";
		if (!address_valid) {
			document.getElementsByName("address")[0].style.borderLeft = "6px solid red";
		}
		if (!city_valid) {
			document.getElementsByName("city")[0].style.borderLeft = "6px solid red";
		}
	}

	if (!state_valid || !zip_valid) {
		success = false;
		error = document.getElementById("state_zip_error");
		error.innerHTML = "please enter state or zip code";
		if (!state_valid) {
			document.getElementsByName("state")[0].style.borderLeft = "6px solid red";
		}
		if (!zip_valid) {
			document.getElementsByName("zip_code")[0].style.borderLeft = "6px solid red";
		}
	}

	return success;
}

function submit_form() {
	var is_valid = check_validate_submit();

	// If not valid, return false before creating POST
	if (!is_valid) {
		return false;
	}

	var post_data = {}
	post_data.first_name = $("input[name=first_name]").val();
	post_data.last_name = $("input[name=last_name]").val();
	post_data.email = $("input[name=email]").val();
	post_data.password = $("input[name=password]").val();
	// password and password check must be the same, so only send one
	post_data.address = $("input[name=address]").val();
	post_data.city = $("input[name=city]").val();
	post_data.state = $("input[name=state]").val();
	post_data.zip_code = $("input[name=zip_code]").val();

	$.post("script_sign_up.php", post_data, function(data) {
		var data = JSON.parse(data);
		if (data.status === "success") {
			window.location = 'sign_up_confirm.php';

		} else if (data.status === "error") {
			alert(data.message);
			$("#email_error").text(data.message);
		}

	});

	return false;
}








