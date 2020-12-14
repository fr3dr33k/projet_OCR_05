<?php

	use App\Controllers\ControllerUserActions;

	$curl = curl_init();

	if(isset($_POST["email"])){
		$email = $_POST['email'];

	}else{
		$email = "jacky@yahoo.fr";
	}

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://email-checker.p.rapidapi.com/verify/v1?email=".$email,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: email-checker.p.rapidapi.com",
			"x-rapidapi-key: 8f95f8118amshed510089362e44ap11181fjsn596a754a51ca"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$response = json_decode($response, TRUE);
		print_r($response);
	}