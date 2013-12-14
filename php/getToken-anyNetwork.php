<?php
	include('./Livefyre.php'); // available at https://github.com/Livefyre/Livefyre-APIs/downloads
	
	$_network = $_GET['network'];
	$_key = $_GET['key'];
	$_uid = $_GET['uid'];
	$_displayName = $_GET['dispname'];
	$domain = new Livefyre_Domain($_network, $_key);
	$token_duration = $_GET['duration'] * 86400; //time is in seconds, so 30 days

	
	//echo($token_duration);
	//just took this out for now so I'm not creating tokens
	//add back for production
	$token = $domain->user($_uid, $_displayName)->token($token_duration);
	$user = $domain->user($_uid,$_displayName);
	
	echo($token);
	

?>