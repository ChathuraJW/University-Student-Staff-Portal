<?php
//	add entry to access log
	$userName=$_COOKIE['userName'];
	$timestamp = date("Y-m-d H:i:s");
	$timeDuration=date("H:i:s",time()-$_COOKIE['accessTime']);
	$fileEntry = "$timestamp      ::::    User $userName log out form the system [AD: $timeDuration]\n";
	file_put_contents("../../access.log", $fileEntry, FILE_APPEND);

//	remove cookies
	setcookie('userName',"NULL",time()-8400,"/");
	setcookie('role',"NULL",time()-8400,"/");
	setcookie('fullName',"NULL",time()-8400,"/");
	setcookie('accessTime', "NULL", time() -8400, "/");
	header("Location: ../../core/login");

