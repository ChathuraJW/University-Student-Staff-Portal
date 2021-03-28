<?php

	class WorkloadReceiveController extends Controller {
		// public function __construct(){
		//     parent::__construct();
		// }
		public static function open() {
			setcookie('userName', 'kek');
			$username = $_COOKIE['userName'];

			$checked = 1;
			$unChecked = 0;

			$newMessages = WorkLoadReceiveModel::getWorkLoadMessages($unChecked);
			$viewedMessages = WorkLoadReceiveModel::getWorkLoadMessages($checked);
			$passingData = array($newMessages, $viewedMessages);
			self::createView("workloadReceiveView", $passingData);

			if (isset($_POST["accept"])) {
				$reply = $_POST["reply"];
				$workloadID = $_POST["workloadID"];
				$response = 'A';
				WorkLoadReceiveModel::setReply($reply, $workloadID, $response, $username);
				echo("
            <script>
                window.location.href=document.location.href.toString().split('workloadReceive')[0]+'workloadReceive';
            </script>
        ");
			}
			if (isset($_POST["reject"])) {
				$reply = $_POST["reply"];
				$workloadID = $_POST["workloadID"];
				$response = 'R';
				WorkLoadReceiveModel::setReply($reply, $workloadID, $response, $username);
				echo("
            <script>
                window.location.href=document.location.href.toString().split('workloadReceive')[0]+'workloadReceive';
            </script>
        ");
			}
		}
// repling for workload message


	}

?>