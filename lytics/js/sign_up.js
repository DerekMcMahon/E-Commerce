var RED_BORDER = "6px solid red";
var GREEN_BORDER = "6px solid #40A46F";

//var fields = {"first_name", "last_name", }



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

$(document).ready(function() {
	// Set state dropdown
	var states = [
		"AL", "AK", "AZ", "AR", "CA",
		"CO", "CT", "DE", "DC", "FL",
		"GA", "HI", "ID", "IL", "IN",
		"IA", "KS", "KY", "LA", "ME",
		"MD", "MA", "MI", "MN", "MS",
		"MO", "MT", "NE", "NV", "NH",
		"NJ", "NM", "NY", "NC", "ND",
		"OH", "OK", "OR", "PA", "RI",
		"SC", "SD", "TN", "TX", "UT",
		"VT", "VA", "WA", "WV", "WI",
		"WY"
	];
	var stateSelect = $("select[name=state]");
	$(states).each(function(index, val) {
		stateSelect.append($("<option>", {value: val, html: val}));
	});

	// Set plan type dropdowns
	var planTypes = ["Basic", "Popular", "Premium"];
	var planSelect = $("select[name=plan_type]");
	$(planTypes).each(function(index, val) {
		var plan_val = "plan_" + val.toLowerCase();
		planSelect.append($("<option>", {value: plan_val, html: val}));
	});
    
    //Set credit card expiration month dropdown
    var months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    var monthSelect = $("select[id=expiration_month]");
    $(months).each(function(index, val){
      monthSelect.append($("<option>", {value: val.toLowerCase(), html: val}));              
    });
    
    //Set credit card expiration year dropdown
    var years = ["16", "17", "18", "19", "20", "21", "22", "23", "24"];
    var yearSelect = $("select[id=expiration_year]");
    $(years).each(function(index, val){
      yearSelect.append($("<option>", {value: val.toLowerCase(), html: val}));              
    });

	// Set plan type from get param if present
	var urlPlanParam = get_url_plan();
	if (urlPlanParam != null) {
		planSelect.val(urlPlanParam);
	}

	// Set focus to first name text box
	$("input[name=first_name]").focus();

});

function get_url_plan() {
	var pageUrl = window.location.href;
	var plan_type = new RegExp('[\?&]plan=([^&#\/]*)').exec(pageUrl);
	if (plan_type == null) {
		return null;
	} else {
		return plan_type[1];
	}

}

function set_select_border(element) {
	element.style.borderLeft = GREEN_BORDER;
}

function check_names() {
	var f_name = document.getElementsByName("first_name")[0];
	var l_name = document.getElementsByName("last_name")[0];
	var error = document.getElementById("name_error");

	var f_val = f_name.value.trim();
	var l_val = l_name.value.trim();

	var name_re = /^[a-zA-z\- ]+$/;
	var f_check = name_re.test(f_val);
	var l_check = name_re.test(l_val);

	// Check first name
	if (f_val == "") {
		f_name.style.borderLeft = RED_BORDER;
		error.innerHTML = "please enter first name</br>";
	} else if (!f_check) {
		f_name.style.borderLeft = RED_BORDER;
		error.innerHTML = "only letters and '-'</br>";
	} else {
		f_name.style.borderLeft = GREEN_BORDER;
		error.innerHTML = "";
	}

	// Check last name
	if (l_val == "") {
		l_name.style.borderLeft = RED_BORDER;
		error.innerHTML += "please enter last name";
	} else if (!l_check) {
		l_name.style.borderLeft = RED_BORDER;
		error.innerHTML += "names must only contain letters and '-'";
	} else {
		l_name.style.borderLeft = GREEN_BORDER;
	}

	if (f_check && l_check) {
		return true;
	} else {
		return false;
	}
}

function check_password () {
	var password = document.getElementsByName("password")[0];
	var password_check = document.getElementsByName("password_check")[0];
	var error = document.getElementById("pwd_error");

	var p_val = password.value.trim();
	var c_val = password_check.value.trim();

	if (p_val == "" || c_val == ""){
		error.innerHTML = "please enter password";
		if (p_val == "")
			password.style.borderLeft = RED_BORDER;
		if (c_val == "")
			password_check.style.borderLeft = RED_BORDER;
		return false;

	} else {

		if (p_val != c_val) {
			password.style.borderLeft = RED_BORDER;
			password_check.style.borderLeft = RED_BORDER;
			error.innerHTML = "retyped password does not match";
			return false;
		} else {
			error.innerHTML = "";
			password.style.borderLeft = GREEN_BORDER;
			password_check.style.borderLeft = GREEN_BORDER;
			return true;
		}
	}
}

function check_address_city () {
	var address = document.getElementsByName("address")[0];
	var city = document.getElementsByName("city")[0];
	var error = document.getElementById("adr_city_error");	

	var a_val = address.value.trim();
	var c_val = city.value.trim();

	var a_re = /^[a-zA-z\d\.\s\-]+$/;
	var c_re = /^[a-zA-z\-\s]+$/;

	var a_check = a_re.test(a_val);
	var c_check = c_re.test(c_val);

	if (a_val == "") {
		error.innerHTML = "please enter an address <br/>";
		address.style.borderLeft = RED_BORDER;
	} else if (!a_check) {
		error.innerHTML = "invalid address <br/>";
		address.style.borderLeft = RED_BORDER;
	} else {
		error.innerHTML = "";
		address.style.borderLeft = GREEN_BORDER;
	}

	if (c_val == "") {
		error.innerHTML += "please enter a city";
		city.style.borderLeft = RED_BORDER;
	} else if (!c_check) {
		error.innerHTML += "invalid city";
		city.style.borderLeft = RED_BORDER;
	} else {
		error.innerHTML += "";
		city.style.borderLeft = GREEN_BORDER;
	}	

	if (a_check && c_check) {
		return true;
	} else {
		return false;
	}

}

function check_plan() {
	var plan = document.getElementsByName("plan_type")[0];
	var error = document.getElementById("plan_error");	
	var p_val = plan.value;

	if (p_val == "") {
		error.innerHTML = "please select plan";
		plan.style.borderLeft = RED_BORDER;
		return false;
	} else {
		error.innerHTML = "";
		plan.style.borderLeft = GREEN_BORDER;
		return true;
	}
}

function check_state_zip () {
	var zip = document.getElementsByName("zip_code")[0];
	var state = document.getElementsByName("state")[0];
	var error = document.getElementById("state_zip_error");	

	var z_val = zip.value.trim();
	var s_val = state.value;

	if (z_val == "" || s_val == "") {
		error.innerHTML = "please enter state/zip code";
		if (z_val == "")
			zip.style.borderLeft = RED_BORDER;
		else
			zip.style.borderLeft = GREEN_BORDER;
		if (s_val == "")
			state.style.borderLeft = RED_BORDER;
		else
			state.style.borderLeft = GREEN_BORDER;
		return false;
	} else {

		state.style.borderLeft = GREEN_BORDER;

		var z_re = /^[0-9]{5}$/;
		var z_check = z_re.test(z_val);	

		if (!z_check) {
			error.innerHTML = "invalid zip code";
			zip.style.borderLeft = RED_BORDER;
			return false;
		} else {
			zip.style.borderLeft = GREEN_BORDER;
		}


		error.innerHTML = "";
		return true;

	}
}

function check_payment_info () {
    var error = false;
    
    var number = document.getElementById("credit_card_number");
    var cvv = document.getElementById("cvv_number");
    var month = document.getElementById("expiration_month");
    var year = document.getElementById("expiration_year");
    
    var number_error = document.getElementById("credit_card_number_error");
    var exp_cvv_error = document.getElementById("exp_cvv_error");

    var n_re = /^[0-9]{16}$/;
    var num = number.value.trim();
    var n_check = n_re.test(num)

    if (num == "") {
    	number.style.borderLeft = RED_BORDER;
    	number_error.innerHTML = "Please enter credit card number";
    } else if (!n_check) {
    	number.style.borderLeft = RED_BORDER;
    	number_error.innerHTML = "Invalid credit card";
    } else {
    	number.style.borderLeft = GREEN_BORDER;
    	number_error.innerHTML = "";
    }

    var cvv_re = /^[0-9]{3}$/;
    var cvv_num = cvv.value.trim();
    var cvv_check = cvv_re.test(cvv_num);

    if (cvv_num == "") {
    	cvv.style.borderLeft = RED_BORDER;
    	exp_cvv_error.innerHTML = "Please enter cvv number <br/>";
    } else if (!cvv_check) {
    	cvv.style.borderLeft = RED_BORDER;
    	exp_cvv_error.innerHTML = "Invalid cvv <br/>";
    } else {
    	cvv.style.borderLeft = GREEN_BORDER;
    	exp_cvv_error.innerHTML = "";
    }

    var m_test = false;
    if (month.value != "") {
    	m_test = true;
    	month.style.borderLeft = GREEN_BORDER;
    	exp_cvv_error.innerHTML += "";
    } else {
    	month.style.borderLeft = RED_BORDER;
    	exp_cvv_error.innerHTML += "Please select month <br/>";
    }
    
    var y_test = false;
    if (year.value != "") {
    	y_test = true;
    	year.style.borderLeft = GREEN_BORDER;
    	exp_cvv_error.innerHTML += "";
    } else {
    	year.style.borderLeft = RED_BORDER;
    	exp_cvv_error.innerHTML += "Please select year";
    }

    if (n_check && cvv_check && m_test && y_test) {
    	return true;
    } else {
    	return false;
    }
    
}



function check_validate_submit() {

	var success = true;

	if (!check_names())
		sucecss = false;

	if (!check_email())
		success = false;

	if (!check_password())
		success = false;

	if (!check_address_city())
		success = false;

	if (!check_state_zip())
		success = false;

	if (!check_plan())
		success = false;
    
    if(!check_payment_info())
        success = false;

    // if (!success) {
    // 	//var wrapper = document.getElementById("form_wrapper");
    // 	//wrapper.style.marginLeft = 150px;
    // } else {
    // 	// wrapper.style.marginLeft = auto;
    // }

	return success;

}

function submit_form(stripe_token) {
	var post_data = {}
	post_data.first_name = $("input[name=first_name]").val();
	post_data.last_name = $("input[name=last_name]").val();
	post_data.email = $("input[name=email]").val();
	post_data.password = $("input[name=password]").val();
	// password and password check must be the same, so only send one
	post_data.address = $("input[name=address]").val();
	post_data.city = $("input[name=city]").val();
	post_data.state = $("select[name=state]").val();
	post_data.zip_code = $("input[name=zip_code]").val();
	post_data.plan_type = $("select[name=plan_type]").val();
    post_data.stripeToken = stripe_token;

	$.post("script_sign_up.php", post_data, function(data) {
		console.log(data);
		var data = JSON.parse(data);
		if (data.status === "success") {
			window.location = 'sign_up_confirm.php';
		} else if (data.status === "error") {
			if (data.error_type === "stripe") {
				$("#credit_card_number_error").text(data.message);
				$("#credit_card_number").css("border-left", RED_BORDER);
			} else if (data.error_type === "email") {
				$("#email_error").text(data.message);
				document.getElementsByName("email")[0].style.borderLeft = RED_BORDER;
			}

			// Re-enable submit button
			$('#sign_up_form').find('button').prop('disabled', false);
		}

	});

	return false;
}








