<?php
	session_start();
	if (!isset($_SESSION['first_name'])) {
		header("Location: index.php");
	}

	$str = file_get_contents("raw_data/robinhood_heatmap_data.json");
	$json = json_decode($str, true);
	echo json_encode($json);
?>