var RED_BORDER = "6px solid red";
var GREEN_BORDER = "6px solid #40A46F";

function check_email() {
	var email = document.getElementsByName("email")[0];
	var error = document.getElementById("email_error");
	var e_val = email.value.trim();

	if (e_val != "") {
		var re = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
		var check = re.test(e_val);

		if (check) {
			error.innerHTML = "";
			email.style.borderLeft = GREEN_BORDER;
			return true;
		} else {
			error.innerHTML = "invalid email";
			email.style.borderLeft = RED_BORDER;
			return false;
		}

	} else {
		error.innerHTML = "please enter email";
		email.style.borderLeft = RED_BORDER;
	}
	return false;
}

function check_pass() {
	var pass = document.getElementsByName("password")[0];
	var error = document.getElementById("pwd_error");
	var p_val = pass.value.trim();

	if (p_val == "") {
		error.innerHTML = "please enter password";
		pass.style.borderLeft = RED_BORDER;
		return false;
	}

	error.innerHTML = "";
	pass.style.borderLeft = GREEN_BORDER;
	return true;
}

function check_login() {
	var success = true;

	if (!check_email())
		success = false;

	if (!check_pass())
		success = false;

	return success;
}

function login() {

	var post_data = {};
	post_data.email = $("input[name=email]").val();
	post_data.password = $("input[name=password]").val();

	document.getElementsByName("email")[0].style.borderLeft = GREEN_BORDER;
	document.getElementsByName("password")[0].style.borderLeft = GREEN_BORDER;

	$.post("script_login.php", post_data, function(data) {
		console.log(data);
		var data = JSON.parse(data);
		if (data.status === "success") {
			window.location = 'dashboard.php';
		} else if (data.status === "error") {
			if (data.error_type === "email") {
				$("#email_error").text(data.message);
				document.getElementsByName("email")[0].style.borderLeft = RED_BORDER;
			}
			else if(data.error_type === "password"){
				$("#pwd_error").text(data.message);
				document.getElementsByName("password")[0].style.borderLeft = RED_BORDER;
			}
			// Re-enable Login button
			$('#login_form').find('button').prop('disabled', false);
		}
	});
}