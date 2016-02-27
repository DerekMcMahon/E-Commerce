<?php
	# Connect to database
	$db = new mysqli('localhost', 'root', '', 'ecommerce-project');
	if ($db->connect_error) {
		die ("Could not connect to database");
	}

	if (!isset($_POST["first_name"]) ||	!isset($_POST["last_name"]) || !isset($_POST["email"]) ||
		!isset($_POST["password"]) || !isset($_POST["address"]) || !isset($_POST["city"]) ||
		!isset($_POST["state"]) || !isset($_POST["zip_code"]) || !isset($_POST["plan_type"])) {
		echo "Invalid POST data";
		exit(1);
	}

	# Get data from POST
	$firstName = $_POST["first_name"];
	$lastName = $_POST["last_name"];
	$email = $_POST["email"];
	$rawPassword = $_POST["password"];
	$hashedPassword = hash("sha256", $rawPassword, false);
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zipCode = $_POST["zip_code"];
	$planType = "";
	if (isset($_POST["plan_type"])) {
		$planType = $_POST["plan_type"];
	} else {
		$planType = "basic"; 
	}
	$userId = -1;

	// Prepares statements
	$userInsertStmt = $db->prepare("INSERT INTO Users (email, password, plan_type)
		VALUES (?, ?, ?)");
	$userDetailInsertStmt = $db->prepare("INSERT INTO User_Details (user_id, first_name, last_name, address, city, state, zip_code)
		VALUES (?, ?, ?, ?, ?, ?, ?)");

	// Bind parameters
	$userInsertStmt->bind_param("sss", $email, $hashedPassword, $planType);
	$userDetailInsertStmt->bind_param("issssss", $userId, $firstName, $lastName, $address, $city, $state, $zip_code);

	// Execute the statements
	$userInsertStmt->execute();
	if ($db->errno == 1062) {	// 1062 = error for duplicate user
		$response["status"] = "error";
		$response["message"] = "Email '$email' is already registered";
		echo json_encode($response);
		exit(0);
	}
	$userId = $db->insert_id;
	$userDetailInsertStmt->execute();

	// Close the statements
	$userInsertStmt->close();
	$userDetailInsertStmt->close();

	$response["status"] = "success";
	echo json_encode($response);
?>