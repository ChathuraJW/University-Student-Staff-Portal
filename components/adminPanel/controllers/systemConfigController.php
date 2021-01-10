<?php

	class SystemConfigController extends Controller {
		public static function doSystemConfigs() {
//			initial data loading and view creation
			$currentConfigurations = SystemConfigModel::takeCurrentConfig();
			self::createModularView('systemConfig', 'scChangeSystemParamView', $currentConfigurations);
//			display error by saying search failed
			if (!$currentConfigurations)
				echo("<script>createToast('Warning (error code: #ADMIN-SC-01)','Failed to load current system configurations.','W')</script>");

			if (isset($_POST['edit'])) {
//				travers through the $_POST array to find weather they are edited or not

				$executionState = true;
				for ($i = 1; $i <= sizeof($currentConfigurations); $i++) {
//					check weather i th parameter enabled
					if (isset($_POST[$i])) {
//						call model function for update
						$executionState = SystemConfigModel::editParameters($i, $_POST[$i]);
					}
				}
				if ($executionState) {
//					display success message
//					create toast and wait three second and reload the page
					echo("
						<script>
							createToast('Success','Parameter update successfully.','S');
							setTimeout(function(){ 
							    location.reload();
							}, 3000);
						</script>
						");
				} else {
//					display operation failed message
					echo("<script>createToast('Warning (error code: #ADMIN-SC-02)','Failed to update selected parameter/s.','W')</script>");
				}
			}
		}
	}