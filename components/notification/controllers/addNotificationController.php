<?php

//require_once "assets/Notification.php";
	class AddNotificationController extends Controller {

		public static function addNotification() {
//
			self::createView("addNotificationView");

			if (isset($_POST['send'])) {
				$notificationTitle = $_POST['title'];
				$notificationContent = $_POST['message'];
				$notificationCategory = $_POST['category'];
				$weeks = $_POST['weeks'];
				$senderRegNo = $_COOKIE['userName'];

				$number = filter_var($weeks, FILTER_VALIDATE_INT);

				if ($number === false) {
					echo "Exit";
					exit('Invalid Integer');

				}
				if (!empty($_POST['email'])) {
					$email = $_POST['email'];
				}
				//continue the process only when all the fields were filled.
				if (!empty($_POST['receiverList']) && !empty($notificationTitle) && !empty($notificationContent) && !empty($notificationCategory) && !empty($weeks) && !empty($senderRegNo)) {
					// Loop to store and display values of individual checked checkbox.
					$receivers = array();
					$temp = 0;
					foreach ($_POST['receiverList'] as $selected) {
//                    echo $selected."</br>";
						if ($selected == '1100') { // all users
							$receivers[] = $selected;
							break;
						} elseif ($selected == '1200') {// all students
							$receivers[] = $selected;
							break;
						} elseif ($selected == '1210') {// first years
							$receivers[] = $selected;
							$temp = 3;// skip 3 element after found first year code.
							continue;
						} elseif ($selected == '1220') {// second years
							$receivers[] = $selected;
							$temp = 3;// skip 3 element after found first year code.
							continue;
						} elseif ($selected == '1230') {// third years
							$receivers[] = $selected;
							$temp = 2;// skip 2 element after found third year code.
							continue;
						} elseif ($selected == '1240') {// fourth years
							$receivers[] = $selected;
							$temp = 3;// skip 3 element after found fourth year code.
							continue;
						} elseif ($temp == 0) {
							$receivers[] = $selected;
						} else {
							$temp--;
						}


					}
					if ($receivers) {
						$receiverRegNoList = array();
						foreach ($receivers as $category) {
//                        echo $category;
							$receiversResult = AddNotificationModel::getReceiverList($category);
//                        print_r($receiversResult);
//                        echo $receiversResult;
							if ($receiversResult) {
								foreach ($receiversResult as $regNo) {
									array_push($receiverRegNoList, $regNo['userName']);
								}
							}

//                        print_r($receiverRegNoList);
							AddNotificationModel::saveNotificationDetails($senderRegNo, $notificationTitle, $notificationContent, $weeks, $notificationCategory, $receiverRegNoList, $receivers);
						}

					}

//                print_r($receivers);
//                print_r("$notificationTitle $notificationContent $notificationCategory,$weeks");
				} else {
					//create toast
				}

			}
		}

	}