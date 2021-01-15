<style>
    .parameterTable > table {
        font-size: 16px;
        width: 95%;
        border-collapse: collapse;
    }

    .parameterTable table, .parameterTable td, .parameterTable th {
        border: 1px solid black;
        padding: 10px;
    }
</style>
<div class="changeSystemParameters">
    <span class="sectionTitle">System Parameters</span>
    <span style="text-align: justify;display: block;">
        In here, the admin can change system parameters. Simply select the parameter and do the necessary update on those parameters. Notice that when
        you update it, please put the parameter in, correct form, if not that it may cause system corruptions as well.
    </span>
    <br>
    <form action="" method="post">
        <div class="parameterTable">
            <table>
                <tr>
                    <th>Parameter ID</th>
                    <th>Parameter Key</th>
                    <th>Parameter Value</th>
                </tr>
				<?php
					foreach ($controllerData as $row) {
						$parameterID = $row->getParameterID();
						echo("
                        <tr>
                            <th>$parameterID</th>
                            <th>" . $row->getParameterKey() . "</th>
                            <th><input type='checkbox' onclick='makeEditable($parameterID);'> <input type='text' name='$parameterID' id='$parameterID' value='"
							. $row->getParameterValue()
							. "' disabled></th>
                        </tr>
                    ");
					}
				?>
            </table>
        </div>
        <div class="buttonCouple">
            <input type="submit" value="Edit Selected" name="edit" class="button" onclick="confirm('Are you sure to edit selected parameter/s?')">
            <input type="reset" value="Cancel" class="button">
        </div>
    </form>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script>
    function makeEditable(elementID) {
        let inputFiled = document.getElementById(elementID);
        if (inputFiled.disabled) {
            inputFiled.disabled = false;
        } else {
            inputFiled.disabled = true;
        }
    }
</script>