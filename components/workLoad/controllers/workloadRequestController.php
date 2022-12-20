<?php

	class WorkloadRequestController extends Controller {
		// public function __construct(){
		//     parent::__construct();
		// }
		public static function open() {
			setcookie('userName', 'kek');
			$userName = $_COOKIE['userName'];
			$records = WorkloadRequestModel::getData($userName);
			$hall = WorkloadRequestModel::getHall();
			$data = array($hall, $records);
			self::createView("workloadRequestView", $data);

			if (isset($_POST['submit'])) {
				$userName = $_COOKIE['userName'];

				$location = $_POST['hall'];
				$title = $_POST['title'];
				$description = $_POST['msg'];
				$Date = $_POST['date'];
				$fromTime = $_POST['fromTime'];
				$toTime = $_POST['toTime'];

				$requestDate = date('Y-m-d');
				if ($requestDate <= $Date) {
					if ($userName != "" && $title != "" && $description != "" && $location != "" && $Date != "" && $fromTime != "" && $toTime != "" && $requestDate != "") {
						workloadRequestModel::insertData($userName, $title, $description, $location, $Date, $fromTime, $toTime, $requestDate);
					} else {
						echo("<script>createToast('Warning (error code: #APR01)','Failed to Request.Fill the all fields of form ','W')</script>");
					}
				} else {
					echo("<script>createToast('Warning (error code: #APR02)','Failed to Request.Input correct date ','W')</script>");
				}


			}
		}

	}

?>