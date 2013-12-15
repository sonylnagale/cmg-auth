<?php
	include('./Livefyre.php'); // available at https://github.com/Livefyre/Livefyre-APIs/downloads
	
	$_network = "coxnews.fyre.co";
	$_key = "HZdiBwTKxj8eVc4mIRF2FkA5UhI=";
	$_uid = $_GET['uid'];
	$_displayName = $_GET['dispname'];
	$domain = new Livefyre_Domain($_network, $_key);
	$token_duration = 86400; //time is in seconds, so 1 day

	
	//echo($token_duration);
	//just took this out for now so I'm not creating tokens
	//add back for production
	$token = $domain->user($_uid, $_displayName)->token($token_duration);
	$user = $domain->user($_uid,$_displayName);
	
	echo($token);
	

?>