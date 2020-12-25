<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/assignmentSection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<?php require_once('../../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../../'); ?>
<div class="featureBody bodyBackground text">
    <h1 class="heading">Assignment Management</h1>
    <div class="row col-2">
        <div class="assignmentPlanManagement">
            <span class="columnHeader">Welcome to <?php echo $controllerData->getSubjectCode(); ?> Assignment Plan</span>
            <div class="row col-2">
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Basic Info:</span>
                    <div>
                        <span class='dataPoint'><?php echo $controllerData->getAssignmentSubjectName(); ?></span>
                    </div>
                    <div>
                        <span class='dataPoint'>Subject Code: <b><?php echo $controllerData->getSubjectCode(); ?></b></span><br>
                        <span class='dataPoint'>Degree Stream: <b><?php echo $controllerData->getDegreeStream(); ?></b></span><br>
                        <span class='dataPoint'>Total Assignments: <b><?php echo $controllerData->getTotalNumberOfAssignment(); ?></b></span><br>
                        <span class='dataPoint'>Assignment Weight: <b><?php echo $controllerData->getAssignmentWeight(); ?>%</b></span>
                    </div>
                </div>
                <div class="conductedBy">
                    <span class="sectionHeader">Conducted By:</span>
                    <ol class='conductBy'>
						<?php
							foreach ($controllerData->getAssignmentConductBy() as $row) {
								echo("<li>" . $row->getSalutation() . ". " . $row->getFullName() . "</li>");
							}
						?>
                    </ol>
                </div>
            </div>
            <div class="buttonCouple">
                <a href="?planID=<?php echo($_GET['planID']); ?>&operation=create" class="button">Create New Assignment</a>
                <button class="button" onclick="confirm('Are you sure to preform this action?');">Close and Complete Plane</button>
            </div>
            <div class="assignmentList">
                <span class="sectionHeader">Current Assignment List:</span>
				<?php
					if (sizeof($controllerData->getAssignments()[0]) === 0)
						echo("
                                <span class='emptyMessage'>No Assignments Currently Available for This Plan.</span>
                            ");
				?>
                <div class="row col-2" style="margin:auto;">
					<?php
						foreach ($controllerData->getAssignments()[0] as $row) {
							echo("
                        <div class='assignment'>
                            <b><span>Assignment " . $row->getAssignmentID() . "</span></b><hr>
                            <span class='assignmentTitle'>" . $row->getAssignmentName() . "</span>
                            <span>Weight: " . $row->getWeight() . "%</span>
                            <div class='row col-3'>
                                <div style='text-align: center;'><a href='assignmentOperation?planID=" . $controllerData->getPlanID() . "&assignmentID=" . $row->getAssignmentID() . "&operation=edit' style='color: var(--baseColor);'><i class='far fa-edit'></i></a></div>
                                <div style='text-align: center;'><a href='assignmentOperation?planID=" . $controllerData->getPlanID() . "&assignmentID=" . $row->getAssignmentID() . "&operation=open' style='color: var(--baseColor);'><i class='far fa-folder-open'></i></a></div>
                                <div style='text-align: center;'><a href='assignmentOperation?planID=" . $controllerData->getPlanID() . "&assignmentID=" . $row->getAssignmentID() . "&operation=delete' style='color: var(--dangerColor);' onclick='confirm(`Are you sure to to preform this operation? You going to delete a assignment that belong to this assignment plan.`)'><i class='far fa-trash-alt'></i></a></div>
                            </div>
                        </div>
                    ");
						}
					?>
                </div>
            </div>
        </div>

        <!--        load view for assignment open operation-->
		<?php
			if (isset($_GET['operation']) & $_GET['operation'] === 'open') {
				echo("
                    <style>
                        .addResultToAssignment{
                            display: block;
                        }
                    </style>
                ");
			}
		?>
        <div class="addResultToAssignment">
            <span class="columnHeader">Welcome to SCS2204 Assignment Plan</span>
            <div class="row col-2">
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Assignment Plane Info:</span>
                    <div>
                        <span class='dataPoint dataPointTop'><b>Data Structures and Algorithms 3</b></span>
                    </div>
                    <div>
                        <span class='dataPoint'>Subject Code: <b>SCS2201</b></span><br>
                        <span class='dataPoint'>Degree Stream: <b>Computer Science</b></span><br>
                        <span class='dataPoint'>Total Assignment Weight: <b>40%</b></span>
                    </div>
                </div>
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Assignment Info:</span>
                    <div>
                        <span class='dataPoint dataPointTop'><b>Lorem ipsum dolor sit amet.</b></span>
                    </div>
                    <div>
                        <span class='dataPoint'>Assignment Code: <b>1243453</b></span><br>
                        <span class='dataPoint'>Assignment Weight: <b>40%</b></span><br>
                        <span class='dataPoint'>Total Enrollment: <b>200</b></span>
                    </div>
                </div>
            </div>
            <div class="resultAddSection">
                <span class="sectionHeader">Result Adding Section:</span>
                <form action="#" method="get">
                    <table class="resultAddTable">
                        <tr style="background-color: var(--baseColor)">
                            <th>ID</th>
                            <th>Index Number</th>
                            <th colspan="2">Result</th>
                        </tr>
						<?php
							for ($i = 1; $i <= 10; $i++) {
								$elementID = "studentResult$i";
								$checkBoxID = "chkBox$i";
								echo("
                              <tr>
                                <td>$i.</td>
                                <td style='border-left: 1px solid #ddd;border-right: 1px solid #ddd;'>18001831</td>
                                <td><input type='checkbox' id='$checkBoxID' onchange='enableDisableInput(`$elementID`);'></td>
                                <td><input type='number' name='$elementID' class='assignmentResultValue'  id='$elementID' max='100' min='0' oninput='checkResultInput(`$elementID`);' disabled></td>
                              </tr>
                          ");
							}
						?>
                    </table>

                    <div class="buttonCouple">
                        <input type="reset" class="button" value="Cancel">
                        <input type="submit" class="button" value="Save Data" id="saveAssignmentResult" name="saveAssignmentResult">
                    </div>
                </form>
            </div>
        </div>

        <!--        load view for assignment create/update operation-->
		<?php
			if (isset($_GET['operation']) & ($_GET['operation'] === 'create' || $_GET['operation'] === 'edit')) {
				echo("
                    <style>
                        .assignmentCreateEdit{
                            display: block;
                        }
                    </style>
                ");
			}
		?>
        <!--        assignment create/update section-->
        <div class="assignmentCreateEdit">
            <span class="columnHeader">Create/Edit Assignment</span>
            <!--            prepare data for get url-->
			<?php
				$currentPlanID = $_GET['planID'];
				if (isset($_GET['assignmentID']))
					$assignmentID = $_GET['assignmentID'];
				else
					$assignmentID = null;
			?>
            <form action="#" method="post">
                <div class="row col-2">
                    <div class="showRest">
                        <span>Assignment Name</span><br>
                        <textarea name="assignmentName" id="assignmentName" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="showRest">
                        <span>Description</span><br>
                        <textarea name="assignmentDescription" id="assignmentDescription" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="showRest">
                        <span>Assignment Weight</span><br>
                        <input type="number" name="assignmentWeight" id="assignmentWeight" max="100" min="0" required>
                    </div>
                    <div class="showRest">
                        <span>Assignment Type</span><br>
                        <select name="assignmentType" id="assignmentType" required>
                            <option value="4100">In Class Assignment</option>
                            <option value="4200">Online Assignment</option>
                            <option value="4300">Take Home Assignment</option>
                            <option value="4400">Group Assignment</option>
                        </select>
                    </div>
                </div>
                <div class="buttonCouple">
                    <input type="submit" name="saveChanges" value="Save Changes" class="button" onclick="confirm('Are you sure to perform this action? ')">
                    <input type="reset" value="Cancel" class="button">
                </div>
            </form>
        </div>
    </div>
</div>
<?php BasicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="assets/assignmentSection.js"></script>
</body>
</html>
