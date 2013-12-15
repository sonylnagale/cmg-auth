<?php
	include('./Livefyre.php'); // available at https://github.com/Livefyre/Livefyre-APIs/downloads

	$NETWORK = 'coxnews.fyre.co'; // this will be livefyre.com for a non-custom domain site
	$NETWORK_KEY = 'HZdiBwTKxj8eVc4mIRF2FkA5UhI=';
	$domain = new Livefyre_Domain($NETWORK, $NETWORK_KEY);
	$token_duration = 60; //time is in seconds
	
	$_uid = $_GET['uid'];
	
	//create system owner token
	$token = $domain->user("system", "system")->token($token_duration);
	
	
	//echo($token);
	//call the refresh api for the user id with the system token
	
 	$urltopost = "http://coxnews.fyre.co/api/v3_0/user/" . $_uid ."/refresh";
	$datatopost = array(
	  'lftoken' => $token
	);
	$data = http_build_query($datatopost); //url-encodes it!
	$ch = curl_init ($urltopost);
	curl_setopt ($ch, CURLOPT_POST, true);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);

	$returndata = curl_exec ($ch);
	echo $returndata;

?>