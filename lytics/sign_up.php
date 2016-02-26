<!DOCTYPE html>
<html>
<head>
	<title>Signup for Lytics</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign_up.css">

    <script type="text/javascript" src="js/jquery.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>

	<script type="text/javascript">

		function email_check(elem) {
			console.log("here");

			var re = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
			check = re.test(elem.value);
			var email_error = document.getElementById("email_error");

			if (!check && elem.value != '') {
				elem.style.borderLeft = "6px solid red";
				email_error.innerHTML = "invalid email address";
			} else if (check) {
				elem.style.borderLeft = "6px solid #40A46F";
				email_error.innerHTML = "";
			} else {
				elem.style.borderLeft = "";
				email_error.innerHTML = "";
			}
		}

	</script>


</head>


<body>

	<?php include("header.html") ?>

	<section class="sign_up">
		<div class="wrapper">

			<h2>Signup</h2>
			<form>
				<table>
					<tr>
						<td><input type="text" class="label" name="first_name"  placeholder="first name"></td>
						<td><input type="text" class="label" name="last_name" placeholder="last name"></td>
					</tr>

					<tr></tr>

					<tr>
						<td colspan="2"><input type="text" class="label_2" name="email" onblur="email_check(this)" placeholder="email@email.com"></td>
						<td><div id="email_error" class="error"></div></td>
					</tr>

					<tr>
						<td colspan="2"><input type="password" class="label_2" name="password" placeholder="password"></td>
					</tr>	

					<tr></tr>

					<tr>
						<td><input type="text" class="label" placeholder="address"></td>
						<td><input type="text" class="label" placeholder="city"></td>
					</tr>

					<tr>
						<td><input type="text" class="label" placeholder="state"></td>
						<td><input type="text" class="label" placeholder="zip code"></td>
					</tr>

					<tr></tr>

					<tr>
						<td colspan="2"><input class="submit" type="submit" value="Create account" ></td>
					</tr>
					
				</table>
			</form>

		</div>
	</section>

	


	<?php include("footer.html") ?>

</body>

</html>