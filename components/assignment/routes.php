<?php
    // structure of code need to write
    Route::set('assignmentManagement',function(){
        AssignmentManagementController::init();
    });
    Route::set('assignmentOperation',function(){
        AssignmentOperationController::init();
    });

    // check weather the given file exist on the site if not redirect to 404 page
    $available=FALSE;
    foreach (Route::$validRoutes as $pages) {
        if($_GET['url']==$pages){
            $available=TRUE;
            break;
        }
    }
    if(!$available){
        //put 404 page link hear
        require_once('../../assets/php/page404.php');
    }
?>
