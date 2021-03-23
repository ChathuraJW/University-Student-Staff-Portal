<?php
	require_once ('assets/mvc/Database.php');
// if cookie is set
	if(isset($_COOKIE['userName'])){
			header("Location: core/home");
	}else{
		header("Location: core/login");
	}
