<?php
	echo phpversion() . "<br>";

	require_once('stripe-php-3.10.0/init.php');

	\Stripe\Stripe::setApiKey("sk_test_ifv9e7JnvNy8uwxGAia8cOos");

	$token = $_POST['stripeToken'];

	try {
		$customer = \Stripe\Customer::create(array(
			"source" => $token,
			"plan" => "plan_basic",
			"email" => "payinguser@example.com"
			));
	} catch (\Stripe\Error\Card $e) {
		echo "Error with card<br>";
		$body = $e->getJsonBody();
		$err  = $body['error'];

		print('Status is:' . $e->getHttpStatus() . "\n");
		print('Type is:' . $err['type'] . "\n");
		print('Code is:' . $err['code'] . "\n");
		// param is '' in this case
		print('Param is:' . $err['param'] . "\n");
		print('Message is:' . $err['message'] . "\n");
		exit();
	}

	echo $customer->id;
?>