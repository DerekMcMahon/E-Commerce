<?php

	session_start();

	if (isset($_SESSION['first_name'])) {
		session_destroy();
	}

	header("Location: index.php");

?>