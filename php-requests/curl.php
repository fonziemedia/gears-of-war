<!-- get request -->
<?php
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts/1",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json'
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		
		echo $response.'<br>';

		$json = json_decode($response);
		echo 'user id: '.$json->userId.'<br>';
  }
  
?>

<!-- post request -->
<?php
	$curl = curl_init();

	$obj = array('title' => 'foo', 'body' => 'bar', 'userId' => '1');
	
	$data_string = json_encode($obj);

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://jsonplaceholder.typicode.com/posts",
		// CURLOPT_URL => "http://user:passwd@www.server.com/index.html",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $data_string,
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'charset=UTF-8',
			// "Authorization: Basic ".$base64encodedData
			// "Authorization: Bearer ".$token
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response.'<br>';

		$json = json_decode($response);
		echo 'title: '.$json->title.'<br>';
  }
  
?>

<!-- WordPress post request -->
<!-- <?php
	$remoteURL = "https://jsonplaceholder.typicode.com/posts";
	
	$headers = array( 
		'Content-type' => 'application/json',
		'charset=UTF-8',
		// "Authorization: Basic ".$base64encodedData
		// "Authorization: Bearer ".$token
	);
	
	$postData = array('title' => 'foo', 'body' => 'bar', 'userId' => '1');

	$args = array(
		'timeout'	=> 20,
		'headers'	=> $headers,
		'body' => json_encode($postData)
	);
	
	$response = wp_remote_post( $remoteURL, $args );
	echo $response.'<br>';

	$json = json_decode($response);
	echo 'title: '.$json->title.'<br>';  
?> -->