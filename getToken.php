<?php
include('token.php');

$user = $_POST['data'];

$secret = 'HZdiBwTKxj8eVc4mIRF2FkA5UhI=';
$args = array('auth', 'coxnews.fyre.co', "$user");
$data=lftokenCreateData(gmdate('c'), 86400, $args);
$value= lftokenCreateToken($data,base64_decode($secret));

echo $value;
/*
 //Generate a token:
$secret= 'Enter your secret key here';
$args=array('auth', 'Enter your fyre.co domain name here (eg yourdomain.fyre.co)', 'Unique user id of authenticated user from your system');
$data=lftokenCreateData(gmdate('c'), 86400, $args);
$value= lftokenCreateToken($data,base64_decode($secret));
*/