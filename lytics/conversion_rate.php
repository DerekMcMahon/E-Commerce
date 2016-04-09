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
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/conversion_rate.css">

    <script type="text/javascript" src="js/jquery.js"></script>


</head>

<body>
	<?php include("header.html") ?>

	<section class="dashboard">
		<div class="wrapper">

		<h2>Hello, <?php echo $_SESSION['first_name']?></h2>
		<br/>
		<h3 id="service_type">Conversion Rate</h3>

		<br/>

		<table>
			<tr>
				<td id="services">
					<h3 id="title">Services</h3>
						<ul id="links">
							<a href="heat_map.php"><li>Heat Map</li></a>
							<a href="conversion_rate.php"><li class="selected">Conversion Rate</li></a>
							<a href="visitors.php"><li>Visitors</li></a>
						</ul>
					</div>
				</td>
				<td id="content">
					<div id="container">
					
			            <div id="div1" class="radial_container"></div>
			            <div id="div2" class="radial_container"></div>
			            <div id="div3" class="radial_container"></div>

					</div>
				</td>
			</tr>
		</table>

		</div>
	</section>

	<?php include("footer.html") ?>
</body>
</html>