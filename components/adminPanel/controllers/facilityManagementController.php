<?php

	class facilityManagementController extends Controller {
		// public function __construct(){
		//     parent::__construct();
		// }
		public static function facilityManagementOpen() {
			// setcookie("userName","kek");
			$hallData = facilityManagementModel::getHall();
			self::createModularView("facilityManagementView", "facilityManagementView", $hallData);


			if (isset($_POST['addHall'])) {
				$hallID = $_POST['hallID'];
				$capacity = $_POST['capacity'];
				$hallID = $_POST['hallType'];
				echo("
            <script>
                confirm('Confirm Add this Course ');
            </script>
        ");

				facilityManagementModel::addHall($hallID, $capacity, $hallType);
				//     echo ("
				//     <script>
				//         location.reload();
				//     </script>
				// ");

			}
			if (isset($_POST['editHall'])) {
				$hallID = $_POST['hallIDHidden'];
				$capacity = $_POST['capacity'];
				$hallID = $_POST['hallType'];
				echo $hallID . $capacity;
				echo("
            <script>
                confirm('Confirm edit this Course Details');
            </script>
        ");

				facilityManagementModel::editHall($hallID, $capacity, $hallType);

			}
			if (isset($_POST['deleteHall'])) {
				$hallID = $_POST['deleteHallIDInput'];
				echo $hallID;
				echo("
            <script>
                confirm('Confirm Delete this Course ');
            </script>
        ");

				facilityManagementModel::deleteHall($hallID);
				// window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';

			}
		}

	}

?>