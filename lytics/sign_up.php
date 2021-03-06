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
    
    <script type = "text/javascript"   src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_beuU6yPV0bCPJyeGzgKLiJfl');
        
        var stripeResponseHandler = function(status, response) {
			var $form = $('#sign_up_form');

			if (response.error) {
				// Show the errors on the form
				$form.find('button').prop('disabled', false);
			} else {
				// token contains id, last4, and card type
				var token = response.id;
				// Insert the token into the form so it gets submitted to the server
				// $form.append($('<input type="hidden" name="stripeToken" />').val(token));
				// and re-submit
				// $form.get(0).submit();

				// Call the submit form function with the new Stripe token
				submit_form(token);
			}
        };
        
        jQuery(function($){
            $('#sign_up_form').submit(function(event){
				var is_valid = check_validate_submit();

				// If not valid, return false before creating POST or Stripe token
				if (!is_valid) {
					return false;
				}

                var $form = $(this);

                $form.find('button').prop('disabled', true);

                Stripe.card.createToken($form, stripeResponseHandler);
    
                return false;
            });
        });
    </script>

</head>


<body>

	<?php include("header.html") ?>

	<section class="sign_up">
		<div class="wrapper" id="form_wrapper">

			<h2>Signup</h2>
			<form method="POST" id="sign_up_form">
			<!-- <form method="POST" action="stripe_test.php" id="sign_up_form"> -->
				<table>
					<tr>
						<td colspan="4" class="section-title">Name</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="text" class="label" name="first_name"  placeholder="first name">
						</td>
						<td colspan="2">
							<input type="text" class="label" name="last_name" placeholder="last name">
						</td>
						<td>
							<div id="name_error" class="error"></div>
						</td>
					</tr>

					<tr></tr>

					<tr>
						<td colspan="4" class="section-title">Account Info</td>
					</tr>

					<tr>
						<td colspan="4">
							<input type="text" class="label_2" name="email" placeholder="email@email.com">
						</td>
						<td>
							<div id="email_error" class="error"></div>
						</td>
					</tr>

					<tr>
						<td colspan="4">
							<input type="password" class="label_2" name="password" placeholder="password">
						</td>
						<td>
							<div id="pwd_error" class="error"></div>
						</td>
					</tr>	
					<tr>
						<td colspan="4">
							<input type="password" class="label_2" name="password_check" placeholder="retype password">
						</td>
					</tr>

					<tr></tr>

					<tr>
						<td colspan="4" class="section-title">Address</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="text" class="label" name="address" placeholder="address">
						</td>
						<td colspan="2">
							<input type="text" class="label" name="city" placeholder="city">
						</td>
						<td>
							<div id="adr_city_error" class="error"></div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<select class="label select" name="state">
								<option value="" disabled select>Select State</option>
							</select>
						</td>
						<td colspan="2">
							<input type="text" class="label" name="zip_code" placeholder="zip code">
						</td>
						<td>
							<div id="state_zip_error" class="error"></div>
						</td>
					</tr>

					<tr></tr>

                    <tr>
						<td colspan="4" class="section-title">Payment Information</td>
					</tr>
                    
                    <tr>
						<td colspan="4">
							<select class="label select" name="plan_type">
								<option value="" disabled select>Select Plan Type</option>
							</select>
						</td>
						<td>
							<div id="plan_error" class="error"></div>
						</td>
					</tr>
                    
                    <tr>
						<td colspan="4">
							<input id="credit_card_number" type="text" class="label_2" placeholder="credit card number" data-stripe="number" maxlength="16">
						</td>
						<td>
							<div id="credit_card_number_error" class="error"></div>
						</td>
					</tr>
  
                    <tr>
						<td colspan="2">
							<input id="cvv_number" type="text" class="label" placeholder="cvv number" data-stripe="cvc" maxlength="4">
						</td>
                        <td colspan="1">
                            <select id="expiration_month" class="label select" data-stripe="exp-month" placeholder="MM">
                            	<option value="" disabled select>MM</option>
                            </select>
                        </td>
                        <td colspan="1">
                            <select id="expiration_year" class="label select" data-stripe="exp-year" placeholder="YY">
                            	<option value="" disabled select>YY</option>
                            </select>
                        </td>
						<td colspan="1"><div id="exp_cvv_error" class="error"></div></td>
					</tr>
                    
					<tr></tr>

					<tr>
						<td colspan="4"><button class="submit">Create account</button></td>
					</tr>
					
                    
				</table>
			</form>

		</div>
	</section>


	<?php include("footer.html") ?>
</body>

</html>