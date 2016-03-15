<!DOCTYPE html>
<html>
<head>
	<title>Sign Up for Lytics</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign_up.css">

    <script type="text/javascript" src="js/jquery.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/sign_up.js"></script>
</head>


<body>

	<?php include("header.html") ?>

	<section class="sign_up">
		<div class="wrapper">

			<h2>Signup</h2>
			<form method="POST" onsubmit="return submit_form();" id="sign_up_form">
				<table>
					<tr>
						<td class="section-title">Name</td>
					</tr>

					<tr>
						<td><input type="text" class="label" name="first_name"  placeholder="first name"></td>
						<td><input type="text" class="label" name="last_name" placeholder="last name"></td>
						<td><div id="name_error" class="error"></div></td>
					</tr>

					<tr></tr>

					<tr>
						<td class="section-title">Account Info</td>
					</tr>

					<tr>
						<td colspan="2"><input type="text" class="label_2" name="email" placeholder="email@email.com"></td>
						<td><div id="email_error" class="error"></div></td>
					</tr>

					<tr>
						<td colspan="2"><input type="password" class="label_2" name="password" placeholder="password" onblur="clear_pcheck()"></td>
					</tr>	
					<tr>
						<td colspan="2"><input type="password" class="label_2" name="password_check" placeholder="retype password"></td>
						<td><div id="pwd_error" class="error"></div></td>
					</tr>

					<tr></tr>

					<tr>
						<td class="section-title">Address</td>
					</tr>

					<tr>
						<td><input type="text" class="label" name="address" placeholder="address"></td>
						<td><input type="text" class="label" name="city" placeholder="city"></td>
						<td><div id="adr_city_error" class="error"></div></td>
					</tr>
					<tr>
						<td>
							<select class="label select" name="state">
								<option value="" disabled select>Select State</option>
							</select>
						</td>
						<td><input type="text" class="label" name="zip_code" placeholder="zip code"></td>
						<td><div id="state_zip_error" class="error"></div></td>
					</tr>

                    <tr>
						<td class="section-title">Payment Information</td>
					</tr>
                    
                    <tr>
						<td colspan="2">
							<select class="label select" name="plan_type">
								<option value="" disabled select>Select Plan Type</option>
							</select>
						</td>
						<td><div id="plan_error" class="error"></div></td>
					</tr>
                    
                    <tr>
						<td colspan = "2"><input type="text" class="label_2" name="credit_card_number" placeholder="credit card number"></td>
						<td><div id="credit_card_number_error" class="error"></div></td>
					</tr>
  
                    <tr>
						<td colspan = "1"><input type="text" class="label" name="cvv"  placeholder="cvv number"></td>
                        <td colspan = "1">
                            <table name = "card_expiration">
                                <tr>
                                    <td>
                                        <span class = "exp">Expires:</span>
                                    </td>
                                    <td>
                                        <select class="label select" name="card_expiration_month">
                                            <option value="" disabled select>mo</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="label select" name="card_expiration_year">
                                            <option value="" disabled select>yr</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </td>
						<td colspan="1"><div id="exp_cvv_error" class="error"></div></td>
					</tr>
                    
					<tr></tr>

					<tr>
						<td colspan="2"><button class="submit">Create account</button></td>
					</tr>
					
                    
				</table>
			</form>

		</div>
	</section>


	<?php include("footer.html") ?>
</body>

</html>