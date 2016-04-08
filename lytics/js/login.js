var RED_BORDER = "6px solid red";
var GREEN_BORDER = "6px solid #40A46F";

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