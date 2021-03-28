<?php
//	hide errors
	error_reporting(0);
//	set timezone
	date_default_timezone_set('Asia/Colombo');
	require_once('assets/mvc/Database.php');
// if cookie is set
	if (isset($_COOKIE['userName'])) {
		header("Location: core/home");
	} else {
		header("Location: core/login");
	}
