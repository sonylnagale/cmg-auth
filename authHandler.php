<?php
$accessPassword = "Ex703b6bw4";
$networkPermissionPassword = "kFkWv558zx";

$payload = $_POST;

if (!isset($payload['type'])) {
	echo '{"return":"error"}';
	die;
}

if ($payload['type'] == "access") {
	if (base64_decode($payload['password']) == $accessPassword) {
		echo '{"return":"success"}';
		die;
	} else {
		header('HTTP/1.0 401 Unauthorized');
		echo 1;
		die;
	}
}

if ($payload['type'] == "network") {
	if (base64_decode($payload['password']) == $networkPermissionPassword) {
		echo '{"return":"success"}';
		die;
	} else {
		header('HTTP/1.0 401 Unauthorized');
		echo 1;
		die;
	}
}
