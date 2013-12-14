<?php
	include('./Livefyre.php'); // available at https://github.com/Livefyre/Livefyre-APIs/downloads

	$NETWORK = 'client-solutions-uat.fyre.co'; // this will be livefyre.com for a non-custom domain site
	$NETWORK_KEY = 'hnoVNQcTknTarpqj51WXQ6fXyAo=';
	// $SITE_ID = '329631';
	// $SITE_KEY = '/N0tpQQncouiTc8ZYXkC1Iwzhe4=';
	//$COMMENTS_ELEMENT_ID = 'livefyre_comment_stream';
	$domain = new Livefyre_Domain($NETWORK, $NETWORK_KEY);
	$token_duration = 2592000; //time is in seconds, so 30 days
	

	$_uid = $_GET['uid'];
	$_displayName = $_GET['dispname'];
	//echo($_uid);

	//$user = $domain->user($_uid, $_displayName);
	//$token = $user->token();
	$token = $domain->user($_uid, $_displayName)->token($token_duration);
	$user = $domain->user($_uid,$_displayName);
	//$lf_token = $user->auth_json();
	//echo($lf_token);
	echo($token);
	/*
	
	$json_array = (array)$user;
	$keys = array_keys($json_array);
	//var_dump($user);
	$uid = $keys[0];
	$displayName = $keys[2];

	
	$myarray = array(
		(object)array("uid" => $json_array[$uid], "display" => $json_array[$displayName]),
		//$json_array[$displayName],
		$token
	);
 	
	//echo($myarray[$uid] . '<br>');
	//echo($myarray[$displayName]);

	$json = json_encode($myarray);
		//echo ("<pre>");
		echo($json);

		*/

?>