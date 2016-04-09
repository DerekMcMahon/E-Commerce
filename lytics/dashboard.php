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

		</div>
	</section>

	<?php include("footer.html") ?>
</body>
</html>