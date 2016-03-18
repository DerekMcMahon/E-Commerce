<?php
	# Assumes database created with name 'ecommerce-project'
	$db = new mysqli('localhost', 'root', '', 'ecommerce-project');
	if ($db->connect_error) {
		die ("Could not connect to database");
	}

	# Drop any tables if they exist
	echo "Dropping tables...</br>";
	$db->query("DROP TABLE Users");
	$db->query("DROP TABLE User_Details");

	# Create new tables
	echo "Creating new tables...</br>";
	# User info table
	$db->query("CREATE TABLE Users (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		email VARCHAR(100) NOT NULL UNIQUE,
		password CHAR(64) NOT NULL,
		plan_type ENUM('plan_basic', 'plan_popular', 'plan_premium')
		)") or die("Failed to make 'users' table") or die("Error " . $db->error);

	# User detail table
	$db->query("CREATE TABLE User_Details (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
		user_id INT,
		first_name VARCHAR(25),
		last_name VARCHAR(25),
		address VARCHAR(100),
		city VARCHAR(25),
		state VARCHAR(25),
		zip_code CHAR(10),
		stripe_cust_id VARCHAR(50)
		)") or die("Failed to make 'user_details' table");

	# Insert sample account
	$hashedPassword = hash("sha256", "password", false);
	$db->query("INSERT INTO Users (email, password, plan_type)
		VALUES ('root@gmail.com', '$hashedPassword', 'plan_basic')")
		or die("Failed to insert into Users " . $db->error);

	$userId = $db->insert_id;
	$db->query("INSERT INTO User_Details (user_id, first_name, last_name, address, city, state, zip_code, stripe_cust_id)
		VALUES ('$userId', 'root', 'admin', 'Rice Hall', 'Charlottesville', 'VA', 22903, 'fake_stripe_id')")
		or die("Failed to insert into User_Details " . $db->error);

	echo "All done</br>";
	echo "<a href=\"index.php\">Home</a></br>";
?>