<?php
	ini_set('display_errors', 'On');
	# Connect to database
	$db = new mysqli('localhost', 'root', '', 'ecommerce-project');
	if ($db->connect_error) {
		die ("Could not connect to database");
	}

	if (!isset($_POST["email"]) ||
		!isset($_POST["password"])) {
		echo "Invalid POST data<br>";
		print_r($_POST);
		exit(1);
	}

	# Get data from POST
	# Lowercase all data for consistency
	$email = strtolower($_POST["email"]);
	# $email = 'root@gmail.com';
	$rawPassword = strtolower($_POST["password"]);
	# $rawPassword = 'password';
	$hashedPassword = hash("sha256", $rawPassword, false);

	$first_name;
	$last_name;
	$plan_type;

	// verify the login and get the appropriate information if valid
	$emailQueryStmt = $db->prepare("SELECT * FROM Users WHERE email=?");
	$emailQueryStmt->bind_param("s", $email);
	$emailQueryStmt->execute();
	$result = $emailQueryStmt->get_result();

	if ($result->num_rows == 0) {
		$response["status"] = "error";
		$response["error_type"] = "email";
		$response["message"] = "email has not been registered";
		echo json_encode($response);
		exit(0);
	} else {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if ($row['password'] == $hashedPassword) {

			$id = $row['id'];
			$plan_type = $row['plan_type'];

			$result = $db->query("SELECT * FROM User_Details WHERE id=$id")
				or die ($db->error . ' invalid query');
			$info = $result->fetch_array(MYSQLI_ASSOC);
			$first_name = $info['first_name'];
			$last_name = $info['last_name'];

		} else {

			$response["status"] = "error";
			$response["error_type"] = "password";
			$response["message"] = "Incorrect password.";
			echo json_encode($response);
			exit(0);
		}
	}

	// if ($result->num_rows > 0) {
	// 	$valid = false;
	// 	$usernumber;
	// 	while ($row = $result->fetch_assoc()){
	// 		if($row["password"] == $hashedPassword){
	// 			$valid = true;
	// 			$usernumber = $row["id"];
	// 			$plan_type = $row["plan_type"];
	// 		}

	// 		if($valid){
	// 			$userInfoQuery = $db->prepare("SELECT * FROM User_Details WHERE id=?");
	// 			$userInfoQuery->bind_param("i", $usernumber);
	// 			$userInfoQuery->execute();
	// 			$userInfo = $userInfoQuery->get_result();
	// 			while($r = $userInfo->fetch_assoc()){
	// 				$first_name = $r["first_name"];
	// 				$last_name = $r["last_name"];
	// 			}
	// 		}
	// 		else{
	// 			$response["status"] = "error";
	// 			$response["error_type"] = "password";
	// 			$response["message"] = "Incorrect password.";
	// 			echo json_encode($response);
	// 			exit(0);
	// 		}
	// 	}
	// }
	// else{
	// 	$response["status"] = "error";
	// 	$response["error_type"] = "email";
	// 	$response["message"] = "email has not been registered";
	// 	echo json_encode($response);
	// 	exit(0);
	// }

	// Start a session
	session_start();

	$_SESSION["first_name"] = ucwords($first_name, " ");
	$_SESSION["last_name"] = ucwords($last_name, " ");
	$_SESSION["email"] = $email;
	$_SESSION["plan_type"] = $plan_type;

	$response["status"] = "success";
	echo json_encode($response);
?>