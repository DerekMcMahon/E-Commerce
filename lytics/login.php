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
	<script type="text/javascript" src="js/login.js"></script>
    
    <script type = "text/javascript"   src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        
        jQuery(function($){
            $('#login_form').submit(function(event){
				var is_valid = login();

				// If not valid, return false before creating POST or Stripe token
				if (!is_valid) {
					return false;
				}

                var $form = $(this);

                $form.find('button').prop('disabled', true);
    
                return false;
            });
        });
    </script>

</head>


<body>

	<?php include("header.html") ?>

	<section class="sign_up">
		<div class="wrapper" id="form_wrapper">

			<h2>Login</h2>
			<form method="POST" id="login_form">
			<!-- <form method="POST" action="stripe_test.php" id="sign_up_form"> -->
				<table>
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
						<td colspan="4"><button class="submit">Sign In</button></td>
					</tr>
                    
				</table>
			</form>

		</div>
	</section>


	<?php include("footer.html") ?>
</body>

</html>