<?php
	session_start();
	if(!isset($_SESSION['customer'])){
		$_SESSION['customer'] = array();
	}

	$_SESSION['customer']['lastname'] 	= $_POST['lastname'];
	$_SESSION['customer']['firstname'] 	= $_POST['firstname'];
	$_SESSION['customer']['email'] 		= $_POST['email'];
	$_SESSION['customer']['address'] 	= $_POST['address'];
	$_SESSION['customer']['city'] 		= $_POST['city'];
	$_SESSION['customer']['cp']			= $_POST['cp'];
	$_SESSION['customer']['_token']		= $_POST['token'];
	json_encode($_SESSION['customer']);
?>