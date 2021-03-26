<?php
// structure of code need to write
	Route::set('home', function () {
		HomeController::init();
	});
	Route::set('login', function () {
		LoginController::initLogin();
	});
	Route::set('registration', function () {
		RegistrationController::open();
	});
	Route::set('forgetPassword', function () {
		ForgetPasswordController::open();
	});
	Route::set('resetPassword', function () {
		ResetPasswordController::open();
	});
	Route::set('aboutUs', function () {
		AboutUsController::open();
	});
    Route::set('settingPage', function () {
        SettingPageController::open();
    });
	Route::set('selectSubject', function () {
        SelectSubjectController::open();
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
		require_once('../assets/php/page404.php');
	}