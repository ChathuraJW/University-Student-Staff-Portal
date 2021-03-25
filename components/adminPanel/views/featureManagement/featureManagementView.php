<!--in page style-->
<style>
    .featureTable > table {
        font-size: 16px;
        width: 95%;
        border-collapse: collapse;
    }

    .featureTable table, .featureTable td, .featureTable th {
        border: 1px solid black;
        padding: 10px;
    }

    select {
        width: 200px;
    }
</style>
<div class="featureManagement">
    <span class="sectionTitle">Feature Management</span>
    <p>You can activate or deactivate system features using below control panel. For that select which feature you want to activate or deactivate
        and change the state of it using to dropdown locate at the end of entry.</p><br>
    <div class="featureTable">
        <table>
            <tr>
                <th>Feature ID</th>
                <th>Feature Name</th>
                <th>Path</th>
                <th>State</th>
            </tr>
			<?php
				foreach ($controllerData as $entry) {
					if ($entry->getFeatureState() === 1) {
						$onSelect = "selected";
						$offSelect = "";
					} else {
						$onSelect = "";
						$offSelect = "selected";
					}
					$featureID = $entry->getFeatureID();
					echo("
					<tr>
						<td>$featureID</td>
						<td>" . $entry->getFeatureName() . "</td>
						<td>" . $entry->getFeaturePath() . "</td>
						<td>
						<select name='$featureID' id='$featureID' onchange='saveStateChange(`$featureID`)'>
							<option value='on' $onSelect>Feature activated</option>
							<option value='off' $offSelect>Feature deactivated</option>
						</select>
						</td>
					</tr>
				");

				}
			?>
        </table>
    </div>
</div>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script>
    function saveStateChange(featureID) {
        let featureNewState = document.getElementById(featureID).value;
        let url = "http://localhost/USSP/components/adminPanel/assets/featureOperationAPI.php?operation=chageFeature&feature=" + featureID + "&state=" + featureNewState;
        // call API
        $.getJSON(url, function (reading) {
            console.log(reading);
            if (reading === 'true') {
                createToast('Operation Success', 'Feature(' + featureID + ') state change successful.', 'S');
            } else {
                createToast('Warning (error code: #ADMIN-FM-01)', 'Failed to change the state of feature(' + featureID + ').', 'W')
            }
        });
    }
</script>