<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/viewIQAC.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
<!-- include header section -->
<?php require('../../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../../') ?>

<div class="featureBody bodyBackground text">
    <form method="post" enctype="multipart/form-data">
        <div class="row col-1">
            <p class="heading">View IQAC Reports</p>
        </div>
        <div class="row col-2">
            <div>
                <div class="dropdown row col-2">
                    <div>
                        <label class="label">Examination Year:</label>
                        <select name="examinationYear" id="examinationYear" required>
                            <option value="0" selected></option>
                        </select>
                    </div>
                    <div>
                        <label class="label">Subject:</label><br>

                        <select name="subject" required>
                            <option value="0" selected></option>
							<?php
								foreach ($controllerData[0] as $row) {
									echo("
                                    <option value='" . $row->getCourseCode() . "'>" . $row->getCourseCode() . " - " . $row->getName() . "</option>
                                ");
								}
							?>
                        </select>
                    </div>
                </div>
                <div class=" dropdownContainer row col-2">


                </div>
                <div class="buttonCouple">
                    <button class="button" name="reset"> Cancel</button>
                    <button class="button" type="submit" name="search" id="search">Search</button>
                </div>
            </div>
            <div>
                <div class="row col-1" id="recentDetail">
                    <label class="label"><?php echo($controllerData[2]); ?></label>
                    <hr>
					<?php
						foreach ($controllerData[1] as $data) {
							echo("
                                    <div class='reportDetail normalEntry'>
                                    <a class = 'report' href='assets/IQACreports/" . $data->getReportName() . "' target='_blank'>
                                        
                                        <div>$data->get</div><br>
                                        <div>" . $data->getExaminationYear() . "</div>
                                        <div>" . $data->getReportName() . "</div><br>
                                        <div><i class='fa fa-download'></i></div>
                                        
                                    </a>
                                    </div>
                                ");
						}
					?>


                </div>
            </div>
    </form>


</div>
<!-- include footer section -->
<?php BasicLoader::loadFooter('../../') ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<script src="assets/viewIQAC.js"></script>
</body>
</html>