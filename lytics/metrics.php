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
	<link rel="stylesheet" type="text/css" href="css/metrics.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/progressbar.min.js"></script>
    <script type="text/javascript" src="js/metrics.js"></script>


</head>

<body>
	<?php include("header.html") ?>

	<section class="dashboard">
		<div class="wrapper">
		<table>
			<tr class="dashboard-row">
				<td id="services">
					<div class="services-container">
						<h3 id="title">Services</h3>
						<ul id="links">
							<a href="heat_map.php"><li>Heat Map</li></a>
							<a href="metrics.php"><li class="selected">Metrics</li></a>
							<a href="visitors.php"><li>Visitors</li></a>
						</ul>
					</div>
				</td>
				<td id="content">
					<div id="container">
						<table>
							<tr></tr>
							<tr>
								<td>
									<div class="radial_wrapper">
										<span id="radial_1"></span>
									<div>
								</td>
								<td>
									<div class="radial_wrapper">
										<span id="radial_2"></span>
									<div>
								</td>
								<td>
									<div class="radial_wrapper">
										<span id="radial_3"></span>
									<div>
								</td>
							</tr>
							<tr>
								<td class="radial_label">User Conversion Rate</td>
								<td class="radial_label">Average Session</td>
								<td class="radial_label">Click Through Rate</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="progress_wrapper">
										<span id="progress"></span>
									</div>	
								</td>	
								<td class="radial_label bar">Progress to 3m customers</td>						
							</tr>
						</table>
						
					</div>
				</td>
			</tr>
		</table>

		</div>
	</section>

	<?php include("footer.html") ?>
</body>
</html>