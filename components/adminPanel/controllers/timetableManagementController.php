<?php

	class timetableManagementController extends Controller {
		// public function __construct(){
		//     parent::__construct();
		// }
		public static function timetableManagementOpen() {
			// setcookie("userName","kek");
			// $data=subjectManagementModel::getCourse();
			$data = timetableManagementModel::getHall();
			self::createModularView("timetableManagementView", "timetableManagementView", $data);

			if (isset($_POST['addEntry'])) {
				$hallID = $_POST['hallID'];
				$subjectCode = $_POST['subjectCode'];
				$day = $_POST['day'];
				$fromTime = $_POST['fromTime'];
				$toTime = $_POST['toTime'];
				$fromTime = $_POST['fromTime'];
				$description = $_POST['description'];
				$group = $_POST['groupNameHidden'];
				//     echo ("
				//     <script>
				//         confirm('Confirm Add this Entry ');
				//     </script>
				// ");

				timetableManagementModel::addEntry($hallID, $subjectCode, $day, $fromTime, $toTime, $description, $group);
				//     echo ("
				//     <script>
				//         location.reload();
				//     </script>
				// ");

			}
			if (isset($_POST['editEntry'])) {
				$hallID = $_POST['hallID'];
				$subjectCode = $_POST['subjectCode'];
				$day = $_POST['day'];
				$fromTime = $_POST['fromTime'];
				$toTime = $_POST['toTime'];
				$fromTime = $_POST['fromTime'];
				$description = $_POST['description'];
				$eventID = $_POST['eventHidden'];
				//     echo ("
				//     <script>
				//         confirm('Confirm edit this Entry Details');
				//     </script>
				// ");

				timetableManagementModel::editEntry($hallID, $subjectCode, $day, $fromTime, $toTime, $description, $eventID);

			}
			if (isset($_POST['deleteEntry'])) {
				$eventID = $_POST['deleteEventID'];
				//     echo ("
				//     <script>
				//         confirm('Confirm Delete this Entry ');
				//     </script>
				// ");

				timetableManagementModel::deleteEntry($eventID);
				// window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';

			}


		}

	}

?>