<?php

	class RequestAppointmentController extends Controller {
		// public function __construct(){
		//     parent::__construct();
		// }
		public static function open() {
			$studentID = $_COOKIE['userName'];
			$lecturers = RequestAppointmentModel::getLectures();
//        $profiles=RequestAppointmentModel::getProfile();
			$records = RequestAppointmentModel::getData($studentID);

			$passingData = array($lecturers, NULL, $records);

			self::createView("requestAppointmentView", $passingData);

			if (isset($_POST['submit'])) {

				$lecturer = $_POST['lecturer'];
				$type = $_POST['type'];
				$title = $_POST['title'];
				$timeDuration = $_POST['durationInput'];
				$message = $_POST['msg'];
				$date = $_POST['date'];
				$time = $_POST['time'];
				if ($type == "Academic Related") {
					$typecode = 5100;
				} elseif ($type == "Personal") {
					$typecode = 5200;
				} elseif ($type == "Social Related") {
					$typecode = 5300;
				} else {
					$typecode = 5400;
				}
				$currentDate = date('Y-m-d');
				if ($currentDate <= $date) {
					if ($lecturer != "" && $typecode != "" && $title != "" && $timeDuration != "" && $message != "" && $date != "" && $time != "") {
						RequestAppointmentModel::insertData($lecturer, $typecode, $title, $timeDuration, $message, $studentID, $date, $time);
					} else {
						echo("<script>createToast('Warning (error code: #APR01)','Failed to Request.Fill the all fields of form ','W')</script>");
					}
				} else {
					echo("<script>createToast('Warning (error code: #APR02)','Failed to Request.Input correct date ','W')</script>");
				}

				// echo ("
				//     <script>
				//         window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
				//     </script>
				// ");
			}
		}

	}

?>