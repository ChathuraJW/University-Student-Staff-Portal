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
<div class="featureBody">
    <h1 class="heading">Assignment Management</h1>
    <div class="row col-2">
        <div class="assignmentPlanManagement">
            <span class="columnHeader">Welcome to <?php echo $controllerData->getSubjectCode();?> Assignment Plan</span>
            <div class="row col-2">
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Basic Info:</span>
                    <div>
                        <span class='dataPoint'><?php echo $controllerData->getAssignmentSubjectName();?></span>
                    </div>
                    <div>
                        <span class='dataPoint'>Subject Code: <b><?php echo $controllerData->getSubjectCode();?></b></span><br>
                        <span class='dataPoint'>Degree Stream: <b><?php echo $controllerData->getDegreeStream();?></b></span><br>
                        <span class='dataPoint'>Total Assignments: <b><?php echo $controllerData->getTotalNumberOfAssignment();?></b></span><br>
                        <span class='dataPoint'>Assignment Weight: <b><?php echo $controllerData->getAssignmentWeight();?>%</b></span>
                    </div>
                </div>
                <div class="conductedBy">
                    <span class="sectionHeader">Conducted By:</span>
                    <ol class='conductBy'>
                        <?php
                            foreach ($controllerData->getAssignmentConductBy() as $row){
                                echo ("<li>".$row->getSalutation().". ".$row->getFullName()."</li>");
                            }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="createNewAssignment">
                <button class="submitCancelButton blue">Create New Assignment</button>
                <button class="submitCancelButton green">Close and Complete Plane</button>
            </div>
            <div class="assignmentList">
                <span class="sectionHeader">Current Assignment List:</span>
                <div class="row col-2" style="margin:auto;">
                    <?php
//                    $namArray = $arrayName = array('Lorem ipsum dolor sit.', 'Lorem ipsum dolor sit amet, consectetur.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, neque.');
//                    for ($i = 1; $i < 13; $i++) {
//                        echo("
//                        <div class='assignment'>
//                            <b><span>Assignment $i</span></b><hr>
//                            <span class='assignmentTitle'>" . $namArray[$i % 3] . "</span>
//                            <span>Weight: 20%</span>
//                            <div class='row col-3'>
//                                <div style='text-align: right;'><a href='#' style='color: black;'><i class='far fa-edit'></i></a></div>
//                                <div></div>
//                                <div style='text-align: left;'><a href='#' style='color: black;'><i class='far fa-folder-open'></i></a></div>
//                            </div>
//                        </div>
//                    ");
//                    }
                    foreach ($controllerData->getAssignments()[0] as $row){
                        echo("
                        <div class='assignment'>
                            <b><span>Assignment ".$row->getAssignmentID()."</span></b><hr>
                            <span class='assignmentTitle'>" . $row->getAssignmentName() . "</span>
                            <span>Weight: ".$row->getWeight()."%</span>
                            <div class='row col-3'>
                                <div style='text-align: right;'><a href='assignmentOperation?planID=".$controllerData->getPlanID()."&assignmentID=".$row->getAssignmentID()."&operation=edit' style='color: black;'><i class='far fa-edit'></i></a></div>
                                <div></div>
                                <div style='text-align: left;'><a href='assignmentOperation?planID=".$controllerData->getPlanID()."&assignmentID=".$row->getAssignmentID()."&operation=open' style='color: black;'><i class='far fa-folder-open'></i></a></div>
                            </div>
                        </div>
                    ");
                    }
                    ?>
                </div>
            </div>
        </div>

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
                        <tr style="background-color: black;">
                            <th>ID</th>
                            <th>Index Number</th>
                            <th colspan="2">Result</th>
                        </tr>
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            $elementID="studentResult$i";
                            $checkBoxID="chkBox$i";
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

                    <div class="row col-2">
                        <input type="reset" class="submitCancelButton red" value="Cancel">
                        <input type="submit" class="submitCancelButton green" value="Save Data" id="saveAssignmentResult" name="saveAssignmentResult">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php BasicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="assets/assignmentSection.js"></script>
</body>
</html>
