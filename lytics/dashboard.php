<?php 
	session_start();
	if (!isset($_SESSION['first_name'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['first_name'] ?>'s dashboard</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign_up_confirm.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">

    <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
	<?php include("header.html") ?>

	<section class="dashboard">
		<div class="wrapper">

		<h2>Hello, <?php echo $_SESSION['first_name']?></h2>

		<br/>

		<table>
			<tr>
				<td id="services">
					<h3>Services</h3>
						<ul id="links">
							<li><a href="">Heat Map</a></li>
							<li><a href="">Conversion Rate</a></li>
							<li><a href="">Click Count</a></li>
						</ul>
					</div>
				</td>
				<td id="content">
				there
				</td>
			</tr>
		</table>

<!-- 		<div id="user_info">
			<span class="left">Hello, <?php echo $_SESSION['first_name']?></span>
			<span class="space"></span>
			<span class="right">Plan: <?php echo $_SESSION['plan_type']?></span>
		</div> -->

		</div>
	</section>

	<?php include("footer.html") ?>
</body>
</html>