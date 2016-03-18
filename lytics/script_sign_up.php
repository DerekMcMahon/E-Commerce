<?php
	require_once('stripe-php-3.10.0/init.php');

	# Connect to database
	$db = new mysqli('localhost', 'root', '', 'ecommerce-project');
	if ($db->connect_error) {
		die ("Could not connect to database");
	}

	if (!isset($_POST["first_name"]) ||	!isset($_POST["last_name"]) || !isset($_POST["email"]) ||
		!isset($_POST["password"]) || !isset($_POST["address"]) || !isset($_POST["city"]) ||
		!isset($_POST["state"]) || !isset($_POST["zip_code"])) {
		echo "Invalid POST data<br>";
		print_r($_POST);
		exit(1);
	}

	# Get data from POST
	# Lowercase all data (except state) for consistency
	$firstName = strtolower($_POST["first_name"]);
	$lastName = strtolower($_POST["last_name"]);
	$email = strtolower($_POST["email"]);
	$rawPassword = strtolower($_POST["password"]);
	$hashedPassword = hash("sha256", $rawPassword, false);
	$address = strtolower($_POST["address"]);
	$city = strtolower($_POST["city"]);
	$state = strtoupper($_POST["state"]);
	$zipCode = strtolower($_POST["zip_code"]);
	$planType = "";

	if (isset($_POST["plan_type"])) {
		$planType = strtolower($_POST["plan_type"]);
	} else {
		$planType = "plan_basic";
	}
	$userId = -1;

    // Charge the card for a subscription
    \Stripe\Stripe::setApiKey("sk_test_ifv9e7JnvNy8uwxGAia8cOos");
    
    $token = $_POST['stripeToken'];

    try {
	    $customer = \Stripe\Customer::create(array(
	    	"source" => $token,
	    	"plan" => $planType,
	    	"email" => $email
	    	));
	} catch (\Stripe\Error\Card $e) {
		$body = $e->getJsonBody();
		$err  = $body['error'];

		print('Status is:' . $e->getHttpStatus() . "\n");
		print('Type is:' . $err['type'] . "\n");
		print('Code is:' . $err['code'] . "\n");
		// param is '' in this case
		print('Param is:' . $err['param'] . "\n");
		print('Message is:' . $err['message'] . "\n");

		// Exit early after returning json response
		exit();
	}

	// Prepares statements
	$userInsertStmt = $db->prepare("INSERT INTO Users (email, password, plan_type)
		VALUES (?, ?, ?)");
	$userDetailInsertStmt = $db->prepare("INSERT INTO User_Details (user_id, first_name, last_name, address, city, state, zip_code, stripe_cust_id)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

	// Bind parameters
	$userInsertStmt->bind_param("sss", $email, $hashedPassword, $planType);
	$userDetailInsertStmt->bind_param("isssssss", $userId, $firstName, $lastName, $address, $city, $state, $zipCode, $customer->id);

	// Execute the statements
	$userInsertStmt->execute();
	if ($db->errno == 1062) {	// 1062 = error for duplicate user
		$response["status"] = "error";
		$response["message"] = "'$email' is already registered";
		echo json_encode($response);
		exit(0);
	}
	$userId = $db->insert_id;
	$userDetailInsertStmt->execute();

	// Close the statements
	$userInsertStmt->close();
	$userDetailInsertStmt->close();

	// Start a session
	session_start();

	$_SESSION["first_name"] = ucwords($firstName, " ");
	$_SESSION["last_name"] = ucwords($lastName, " ");
	$_SESSION["email"] = $email;

	// echo json response
	$response["status"] = "success";
	echo json_encode($response);
?>