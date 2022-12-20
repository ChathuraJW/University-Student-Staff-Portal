<?php
// structure of code need to write
	Route::set('applyTrainSeason', function () {
		ApplyTrainSeasonController::applyTrainSeason();
	});

	Route::set('checkTrainSeason', function () {
		CheckTrainSeasonController::checkTrainSeason();
	});

	Route::set('application', function () {
		ApplicationController::application();
	});

	Route::set('checkedApplication', function () {
		CheckedApplicationController::checkedApplication();
	});


// check weather the given file exist on the site if not redirect to 404 page
	$available = FALSE;
	foreach (Route::$validRoutes as $pages) {
		if ($_GET['url'] == $pages) {
			$available = TRUE;
			break;
		}
	}
	if (!$available) {
		//put 404 page link hear
		require_once('../../assets/php/page404.php');
	}
?>