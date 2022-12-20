<?php
	Route::set('workloadRequest', function () {
		WorkloadRequestController::open();
	});
	Route::set('workloadAllocation', function () {
		WorkloadAllocationMessageController::open();
	});
	Route::set('workloadReceive', function () {
		WorkloadReceiveController::open();
	});
	// structure of code need to write
	// Route::set('urlPassVale',function(){
	//     ControllerName::initialFunction();
	// });
	// check weather the given file exist on the site if not redirect to 404 page
	$available = FALSE;
	foreach (Route::$validRoutes as $pages) {
		if ($_GET['url'] == $pages) {
			$available = TRUE;
			break;
		}
	}
	if (!$available) {
		require_once('../../assets/php/404.php');
	}
?>