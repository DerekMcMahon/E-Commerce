<?php
	# Connect to database
	$db = new mysqli('localhost', 'root', '', 'ecommerce-project');
	if ($db->connect_error) {
		die ("Could not connect to database");
	}

	if (!isset($_POST["first_name"]) ||	!isset($_POST["last_name"]) || !isset($_POST["email"]) ||
		!isset($_POST["password"]) || !isset($_POST["address"]) || !isset($_POST["city"]) ||
		!isset($_POST["state"]) || !isset($_POST["zip_code"])) {
		// echo "Invalid POST data";
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
		$planType = "basic"; 
	}
	$userId = -1;

    //Charge the card
    \Stripe\Stripe::setApiKey("sk_test_ifv9e7JnvNy8uwxGAia8cOos");
    $token = $_POST["token"];
    try{
        if($planType == "Basic"){
            $charge = \Stripe\Charge::create(array(
                "amount" => 3000,
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
            ));
        }
        else if($planType == "Popular"){
            $charge = \Stripe\Charge::create(array(
                "amount" => 6000,
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
            ));
        }
        else{
            $charge = \Stripe\Charge::create(array(
                "amount" => 9000,
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
            ));
        }
    }
    catch(\Stripe\Error\Card $e){
        echo 'Didnt go through!: ', $e->getMessage(), "\n";
    }

	// Prepares statements
	$userInsertStmt = $db->prepare("INSERT INTO Users (email, password, plan_type)
		VALUES (?, ?, ?)");
	$userDetailInsertStmt = $db->prepare("INSERT INTO User_Details (user_id, first_name, last_name, address, city, state, zip_code)
		VALUES (?, ?, ?, ?, ?, ?, ?)");

	// Bind parameters
	$userInsertStmt->bind_param("sss", $email, $hashedPassword, $planType);
	$userDetailInsertStmt->bind_param("issssss", $userId, $firstName, $lastName, $address, $city, $state, $zipCode);

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

	// 
	$response["status"] = "success";
	echo json_encode($response);
?>