<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/sendMessageStyle.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body class="bodyBackgrond text">
<!-- include header section -->
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php basicLoader::loadHeader('../../'); ?>

<!-- feature body section -->
<div class="featureBody">
    <div class="container">
		<?php
			if (isset($_COOKIE['role']) && $_COOKIE['role'] == 'ST') {
				echo("
        <div class='row col-1'>

            <h1><b> Send Messages </b></h1>
            <br>
        
            <a class=inbox href='receiveMessage'>

                <button class='button' style='position: relative; left: 42%;' id='receiveMessages'>Inbox</button>
            </a>

            <a class=sentBox href='sentBox'>

                <button class='button' style='position: relative; left: 42%;' id='sentMessages'>Sent Box</button>
            </a>

        </div>

        <div class='row col-2'>
            <div class='contacts'>
                <label for='option'><b> Select the contacts</b> </label>
                <br>
                <br>
                <div>

                    <select id='studentList' name='studentList' onchange='addStaffRecipient(`studentList`);'>
                    <option value=''>Student</option>
                         
                    ");
				foreach ($controllerData[3] as $data) {
					echo("<option value='" . $data->getUserName() . "'>" . $data->getUserName() . " - " . $data->getFullName() . "</option>");
				}

				echo("
                    </select>

                    <br>
                    <br>

                </div>

                <br>
                <br>
                <form action=' ' method='POST'>

                    <label style='text-align: left;'>Contacts </label>
                    <br>
                    <textarea cols='70' rows='3' name='contacts' class='textarea' id='contacts'></textarea>
                    <br><br>
            </div>

            <div class='message'>
                <br>
                <br>
                <label> Title </label>
                <br>
                <textarea name='title' cols='50' class='textarea'></textarea>


                <br>
                <br>


                <label> Message </label>
                <br>
                <textarea name='message' rows='5' cols='50' class='textarea'></textarea>


                <br>
                <br>
                <div class='buttonCouple'> 
                    <button class='button' name='submit' type='submit'>Send</button>
                    <button class='button' name='cancel'>Cancel</button>
                </div>

                </form>

                <br>
                <br>
            </div>
    ");
			} else {
				echo("
    
        <div class='row col-1'>

            <h1><b> Send Messages </b></h1>
            <br>
            
            <a class=inbox href='receiveMessage'>

                <button class='button' style='position: relative; left: 42%;' id='receiveMessages'>Inbox</button>
            </a>

            <a class=sentBox href='sentBox'>

                <button class='button' style='position: relative; left: 42%;' id='sentMessages'>Sent Box</button>
            </a>

        </div>

        <div class='row col-2'>
            <div class='contacts'>
                <label for='option'><b> Select the contacts</b> </label>
                <br>
                <br>


                <!--<div class='row col-3'>-->


                
                 
                     
                <div>
                    <select id='academicStaffList' name='academicStaffList' onchange='addStaffRecipient(`academicStaffList`);'>
                    <option value=''>Academic Staff</option>
                    ");
				//print_r($controllerData[0]);
				foreach ($controllerData[0] as $data) {

					echo("<option value='" . $data->getUserName() . "'>" . $data->getUserName() . " - " . $data->getFullName() . "</option>");

				}
				echo("
                    </select>
                    <br>
                    <br>
                </div>

                <div>
                    <select id='academicSupportiveList' name='academicSupportiveList' onchange='addStaffRecipient(`academicSupportiveList`);' >
                    <option value=''>Academic Supportive Staff</option>
                    ");

				foreach ($controllerData[2] as $data) {
					echo("<option value='" . $data->getUserName() . "'>" . $data->getUserName() . " - " . $data->getFullName() . "</option>");
				}

				echo("
                    </select>

                    <br>
                    <br>
                </div>

                <div>
                    <select id='administrativeList' name='administrativeList' onchange='addStaffRecipient('`administrativeList`');'>
                    <option value=''>Administrative Staff</option>
                    ");

				foreach ($controllerData[1] as $data) {
					echo("<option value='" . $data->getUserName() . "'>" . $data->getUserName() . " - " . $data->getFullName() . "</option>");
				}
				echo("
                    </select>

                    <br>
                    <br>

                </div>
                 
                 
                 

                <div>

                    <select id='studentList' name='studentList' onchange='addStaffRecipient(`studentList`);'>
                    <option value=''>Student</option>
                    ");

				foreach ($controllerData[3] as $data) {
					echo("<option value='" . $data->getUserName() . "'>" . $data->getUserName() . " - " . $data->getFullName() . "</option>");
				}

				echo("
                    </select>

                    <br>
                    <br>

                </div>

                <br>
                <br>
                <form action=' ' method='POST'>

                    <label style='text-align: left;'>Contacts </label>
                    <br>
                    <textarea cols='70' rows='3' name='contacts' class='textarea' id='contacts'></textarea>
                    <br><br>
            </div>

            <div class='message'>
                <br>
                <br>
                <label> Title </label>
                <br>
                <textarea name='title' cols='50' class='textarea'></textarea>


                <br>
                <br>


                <label> Message </label>
                <br>
                <textarea name='message' rows='5' cols='50' class='textarea'></textarea>


                <br>
                <br>
                <div class='buttonCouple'> 
                    <button class='button' name='submit' type='submit'>Send</button>
                    <button class='button' name='cancel'>Cancel</button>
                </div>

                </form>

                <br>
                <br>
            </div>
    ");
			}
		?>
    </div>


</div>


<!-- include footer section -->
<?php basicLoader::loadFooter('../../'); ?>

<script src="assets/sendMessageJs.js"></script>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>

</body>
</html>