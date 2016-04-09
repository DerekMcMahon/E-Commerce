<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up for Lytics</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign_up_confirm.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
    		// Send AJAX request to send registration email
    		// Note: Do this here to reduce page load
    		$.get("script_send_reg_email.php", function() {
    			// Optionally update UI after sending email
            	console.log("Succeeded!");
    		});
    	});
    </script>
</head>

<body>

	<?php include("header.html") ?>

	<section class="sign_up_confirm">
		<div class="wrapper">

			<div class="welcome_content">
				<h1>Welcome aboard,</h1>
				<h2><?php echo $_SESSION['first_name'] ?></h2>
				<br/>
				<br/>
				<!-- NOTE: For the time being, this link intentionally does nothing-->
				<p>Head to the <a href="heat_map.php">dashboard</a> to start making your content amazing.</p>
			</div>

		</div>
	</section>

	<?php include("footer.html") ?>

</body>
</html>