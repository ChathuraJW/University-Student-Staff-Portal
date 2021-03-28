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
    <a href="assignmentManagement" title="Back to managment page" style="font-size: 30px;padding: 20px;color: var(--fontColor)"><i class="fas
    fa-arrow-circle-left"></i></a>
    <h1 class="heading">Assignment Management</h1>
    <div class="row col-2">
        <div class="assignmentPlanManagement">
            <span class="columnHeader">Welcome to <?php echo $controllerData[0]->getSubjectCode(); ?> Assignment Plan</span>
            <div class="row col-2">
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Basic Info:</span>
                    <div>
                        <span class='dataPoint'><?php echo $controllerData[0]->getAssignmentSubjectName(); ?></span>
                    </div>
                    <div>
                        <span class='dataPoint'>Subject Code: <b><?php echo $controllerData[0]->getSubjectCode(); ?></b></span><br>
                        <span class='dataPoint'>Degree Stream: <b><?php echo $controllerData[0]->getDegreeStream(); ?></b></span><br>
                        <span class='dataPoint'>Total Assignments: <b><?php echo $controllerData[0]->getTotalNumberOfAssignment(); ?></b></span><br>
                        <span class='dataPoint'>Assignment Weight: <b><?php echo $controllerData[0]->getAssignmentWeight(); ?>%</b></span>
                    </div>
                </div>
                <div class="conductedBy">
                    <span class="sectionHeader">Conducted By:</span>
                    <ol class='conductBy'>
						<?php
							foreach ($controllerData[0]->getAssignmentConductBy() as $row) {
								echo("<li>" . $row->getSalutation() . ". " . $row->getFullName() . "</li>");
							}
						?>
                    </ol>
                </div>
            </div>
            <div class="buttonCouple">
                <a href="?planID=<?php echo($_GET['planID']); ?>&operation=create" class="button">Create New Assignment</a>
                <a href="assets/finalReport.php?planID=<?php echo($_GET['planID']); ?>&operation=ClosePlan" class="button" target="_blank">
                    Generate Assignment Report
                </a>
                <form action="" method="post">
                    <button type="submit" name="closeAssignment" value="close" class="button" style="background-color: var(--dangerColor)"
                            onclick="confirmMessage
                    ('Are you sure to preform ' +
                     'this ' +
                     'action? Once you do this action can not work with assignment further more and you' +
                    ' will navigate to another page that shows the final assignment report. Make sure to download it as well.');">
                        Close Assignment
                    </button>
                </form>
            </div>
            <div class="assignmentList">
                <span class="sectionHeader">Current Assignment List:</span>
				<?php
					if (sizeof($controllerData[0]->getAssignments()[0]) === 0)
						echo("
                                <span class='emptyMessage'>No Assignments Currently Available for This Plan.</span>
                            ");
				?>
                <div class="row col-2" style="margin:auto;">
					<?php
						foreach ($controllerData[0]->getAssignments()[0] as $row) {
//						    operation buttons/links for each assignment
							echo("
                        <div class='assignment'>
                            <b><span>Assignment (#" . $row->getAssignmentID() . ")</span></b><hr>
                            <span class='assignmentTitle'>" . $row->getAssignmentName() . "</span>
                            <span>Weight: " . $row->getWeight() . "%</span>
                            <div class='row col-3'>
                                <div style='text-align: center;'>
                                <a href='assignmentOperation?planID=" . $controllerData[0]->getPlanID() . "&assignmentID=" . $row->getAssignmentID() . "&operation=edit&assignmentName=" . $row->getAssignmentName() . "&assignmentDescription=" . $row->getDescription() . "&assignmentWeight=" . $row->getWeight() . "'
                                 style='color: var(--baseColor);'><i class='far fa-edit'></i>
                                 </a>
                                 </div>
                                <div style='text-align: center;'><a href='assignmentOperation?planID=" . $controllerData[0]->getPlanID() . "&assignmentID=" . $row->getAssignmentID() . "&operation=open' style='color: var(--baseColor);'><i class='far fa-folder-open'></i></a></div>
                                <div style='text-align: center;'><a href='assignmentOperation?planID=" . $controllerData[0]->getPlanID() . "&assignmentID=" . $row->getAssignmentID() . "&operation=delete' style='color: var(--dangerColor);' onclick='confirmMessage(`Are you sure to to preform this operation? You going to delete a assignment that belong to this assignment plan.`)'><i class='far fa-trash-alt'></i></a></div>
                            </div>
                        </div>
                    ");
						}
					?>
                </div>
            </div>
        </div>

		<?php
			if (isset($_GET['operation']) & $_GET['operation'] === 'open') {
//				load view for assignment open operation
				echo("
                    <style>
                        .addResultToAssignment{
                            display: block;
                        }
                    </style>
                ");
			} elseif (isset($_GET['operation']) & ($_GET['operation'] == 'create' || $_GET['operation'] == 'edit')) {
//				load view for assignment create/update operation and hide operation button for open assignment operation
				echo("
                    <style>
                        .assignmentCreateEdit{
                            display: block;
                        }
                    </style>
                ");
			}
		?>

        <div class="addResultToAssignment">
            <span class="columnHeader">
                <?php
	                if (isset($_GET['assignmentID']) & isset($_GET['planID'])) {
		                echo "Welcome to Assignment ID#" . $_GET['assignmentID'] . " [ Assignment Plan ID #" . $_GET['planID'] . "]";
	                }
                ?>
            </span>
            <div class="row col-2">
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Assignment Info:</span>
                    <span class='dataPoint'>
                            <b>
                                <?php
	                                if (isset($controllerData[2]))
		                                echo $controllerData[2]->getAssignmentName();
	                                else
		                                echo "";
                                ?>
                            </b>
                        </span><br>
                    <span class='dataPoint'>Assignment Weight:
                            <b>
                                <?php
	                                if (isset($controllerData[2]))
		                                echo $controllerData[2]->getWeight();
	                                else
		                                echo "";
                                ?> %
                            </b>
                            </span><br>
                </div>
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Assignment Info (Statistics):</span>
                    <div>
                        <span class='dataPoint'>Total Student Enrollment:
                            <b>
                                <?php
	                                if (isset($controllerData[2]))
		                                echo $controllerData[2]->getTotalStudentEnrollment();
	                                else
		                                echo "";
                                ?>
                            </b>
                        </span><br>
                        <span class='dataPoint'>Currently Attempted:
                            <b>
                                <?php
	                                if (isset($controllerData[2]))
		                                echo $controllerData[2]->getCurrentAttempts();
	                                else
		                                echo "";
                                ?>
                            </b>
                        </span><br>
                        <span class='dataPoint'>Average Performance:
                            <b>
                                <?php
	                                if (isset($controllerData[2]))
		                                echo $controllerData[2]->getMarkAverage();
	                                else
		                                echo "";
                                ?>
                            </b>
                        </span>
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
                            <th colspan="3">Result</th>
                        </tr>
						<?php
							$i = 1;
							foreach ($controllerData[1] as $row) {
//                                $row=new StudentMark();
								$markID = $row->getMarkID();
								$studentIndex = $row->getStudentIndex();
								$studentMark = $row->getMark();
								$elementID = "studentResult$markID";
								$buttonID = "saveButton$markID";
								$checkBoxID = "chkBox$markID";
								echo("
                                      <tr>
                                        <td>$i.</td>
                                        <td style='border-left: 1px solid #ddd;border-right: 1px solid #ddd;'>$studentIndex</td>
                                        <td><input type='checkbox' id='$checkBoxID' onchange='enableDisableInput($markID)'></td>
                                        <td><input type='number' name='$elementID' style='width: 150px' class='assignmentResultValue'  id='$elementID' max='100' min='0' disabled value='$studentMark'></td>
                                        <td><button type='button' class='resultSaveButton' onclick='saveStudentMark($markID)' id='$buttonID'><i class='fa fa-save fa-2x'></i></button></td>
                                      </tr>
                                  ");

								$i++;
							}
						?>
                    </table>
                </form>
            </div>
        </div>


        <!--        assignment create/update section-->
        <div class="assignmentCreateEdit">
            <!--            based on url operation value show the name related to operation-->
            <span class="columnHeader"><?php echo (isset($_GET['operation']) && $_GET['operation'] == 'edit') ? 'Edit' : 'Create'; ?> Assignment</span>
            <!--            prepare data for get url-->
			<?php
				$currentPlanID = $_GET['planID'];
				if (isset($_GET['assignmentID']))
					$assignmentID = $_GET['assignmentID'];
				else
					$assignmentID = null;

				//				this function is use to set edit time value for assignments
				function setValue($key): string {
					if (isset($_GET['operation']) && $_GET['operation'] == 'edit') {
						return $_GET[$key];
					} else {
						return "";
					}
				}

			?>
            <!--            form for edit and create assignments-->
            <form action="#" method="post">
                <div class="row col-2">
                    <div class="showRest">
                        <span>Assignment Name</span><br>
                        <textarea name="assignmentName" id="assignmentName" cols="30" rows="10" equired>
                            <?php echo setValue('assignmentName'); ?>
                        </textarea>
                    </div>
                    <div class="showRest">
                        <span>Description</span><br>
                        <textarea name="assignmentDescription" id="assignmentDescription" cols="30" rows="10" required>
                            <?php echo setValue('assignmentDescription'); ?>
                        </textarea>
                    </div>
                    <div class="showRest">
                        <span>Assignment Weight</span><br>
                        <input type="number" name="assignmentWeight" id="assignmentWeight" max="100" min="0"
                               value="<?php echo setValue('assignmentWeight'); ?>" required>
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
                <!--                operation button couple-->
                <div class="buttonCouple">
                    <input type="submit" name="saveChanges" value="Save Changes" class="button"
                           onclick="confirmMessage('Are you sure to perform this action? ')">
                    <input type="reset" value="Cancel" class="button">
                </div>
            </form>
        </div>
    </div>
</div>
<?php BasicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>
<script src="../../assets/js/changeTheme.js"></script>
<script src="assets/assignmentSection.js"></script>
</body>
</html>