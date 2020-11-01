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
        <div class="assignmentList">
            <span class="columnHeader">Current Assignment Planes</span>
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo("
                        <a href='#' class='planItem' id=''>
                            <div class='row col-2'>
                                <div class='planInfo'>
                                    <span class='planItemHeader'>Basic Info:</span>

                                    <div>
                                        <span class='dataPoint'>Data Structures and Algorithms 3</span>
                                    </div>
                                    <div>
                                        <span class='dataPoint'>Subject Code: <b>SCS2201</b></span>
                                        <span class='dataPoint'>Degree Stream: <b>Computer Science</b></span>
                                        <span class='dataPoint'>Total Assignments: <b>15</b></span>
                                        <span class='dataPoint'>Assignment Weight: <b>40%</b></span>
                                    </div>
                                </div>
                                <div class='staffList'>
                                    <span class='planItemHeader'>Conducted By:</span>
                                    <ol class='conductBy'>
                                        <li>Mr. Ruwan Wijesingha (Owner)</li>
                                        <li>Mr. Kamal Gunaasekare</li>
                                        <li>Mrs. Samanthi Hemachandra</li>
                                        <li>Miss. Ruvani Gamage</li>
                                    </ol>
                                </div>
                            </div>
                            <div class='row col-1'>
                                 <span class='dataPoint'>Description:<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias aut eum in natus quam quis quos sit suscipit. Maiores!</span>
                            </div>
                        </a>
                    ");
            }
            ?>
        </div>

        <div class="createNewAssignmentSection">
            <form action="" method="post">
                <span class="columnHeader">Create New Assignment Plane</span>
                <div class="row col-2">
                    <div class="showRadio">
                        <span>Assignments For</span>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination1Y" value="1"
                                   onclick="selectedYear(1)" required>
                            <label for="examination1Y">1<sup>st</sup> Year</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination2Y" value="2"
                                   onclick="selectedYear(2)" required>
                            <label for="examination2Y">2<sup>st</sup> Year</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination3Y" value="3"
                                   onclick="selectedYear(3)" required>
                            <label for="examination3Y">3<sup>st</sup> Year</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="examinationName" id="examination4Y" value="4"
                                   onclick="selectedYear(4)" required>
                            <label for="examination4Y">4<sup>st</sup> Year</label>
                        </div>
                    </div>
                    <div class="showRadio">
                        <span>Semester</span>
                        <div class="radioValue">
                            <input type="radio" name="semester" id="semester1" value="1" onclick="selectSemester(1);"
                                   required>
                            <label for="semester1">1<sup>st</sup> Semester</label>
                        </div>
                        <br>
                        <div class="radioValue">
                            <input type="radio" name="semester" id="semester2" value="2" onclick="selectSemester(2);"
                                   required>
                            <label for="semester2">2<sup>nd</sup> Semester</label>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row col-2">
                    <div class="showRest">
                        <span>Subject <button style="border: none;background-color: transparent;"
                                              onclick="location.reload();"><i class="fas fa-sync"></i></button></span>
                        <select name="subject" id="subject" required>
                            <option value="12">DSA</option>
                            <!--                        --><?php
                            //                        foreach ($controllerData as $data) {
                            //                            $year = ceil($data[semester] / 2) - 1;
                            //                            $semester = ($data[semester] % 2) ? 0 : 1;
                            //                            $semList = array(array(1, 2), array(3, 4), array(5, 6), array(7, 8));
                            //                            echo("<option value='$data[courseCode]'>" . $semList[$year][$semester] . ". $data[name]</option>");
                            //                        }
                            //                        ?>
                        </select>
                    </div>
                    <div class="showRest">
                        <span>Degree Stream</span>
                        <select name="degreeStream" id="degreeStream" required>
                            <option value="CS">Computer Science</option>
                            <option value="IS">Information System</option>
                        </select>
                    </div>
                </div>
                <div class="row col-2">
                    <div class="showRest">
                        <span>Assignment Weight</span>
                        <input type="number" name="assignmentWeight" id="assignmentWeight" max="1" min="0" step="0.01"
                               required>
                    </div>
                    <div class="showRest">
                        <span>Number of Assignments </span>
                        <input type="number" name="totalAssignment" id="totalAssignment" min="1" max="99" required>
                    </div>
                </div>
                <div class="row col-1">
                    <div class="showRest">
                        <span>Description</span><br>
                        <textarea name="assignmentDescription" id="assignmentDescription" cols="30"
                                  rows="10"></textarea>
                    </div>
                </div>
                <span class="staffAddSectionHead">Assignment Plane Conducted By <button
                            style="border: none;background-color: transparent;" onselect="location.reload();"><i
                                class="fas fa-sync"></i></button></span>
                <div class="row col-2">
                    <div>
                        <select name="academicSupportList" id="academicSupportList" onchange="addStaffRecipient();">
                            <option value="">Academic Support Staff</option>
                            <option value="Samanthika Perera-nim">Samanthika Perera</option>
                            <option value="Saman Perera-abc">Saman Perera</option>
                            <option value="Soma Gunasekare-mnh">Soma Gunasekare</option>
                            <option value="Ruvan Hemarathna-qqw">Ruvan Hemarathna</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="conductStaffList" id="conductStaffList" cols="30" rows="6" required
                                  readonly></textarea>
                    </div>
                </div>
                <br>
                <div class="row col-2">
                    <input type="submit" class="submitCancelButton green" value="Create New Assignment Plan">
                    <input type="reset" class="submitCancelButton red" value="Cancel">
                </div>
            </form>
        </div>
        <div class="assignmentPlanManagement">
            <span class="columnHeader">Welcome to SCS2204 Assignment Plan</span>
            <div class="row col-2">
                <div class="basicAssignmentInfo">
                    <span class="sectionHeader">Basic Info:</span>
                    <div>
                        <span class='dataPoint'>Data Structures and Algorithms 3</span>
                    </div>
                    <div>
                        <span class='dataPoint'>Subject Code: <b>SCS2201</b></span><br>
                        <span class='dataPoint'>Degree Stream: <b>Computer Science</b></span><br>
                        <span class='dataPoint'>Total Assignments: <b>15</b></span><br>
                        <span class='dataPoint'>Assignment Weight: <b>40%</b></span>
                    </div>
                </div>
                <div class="conductedBy">
                    <span class="sectionHeader">Conducted By:</span>
                    <ol class='conductBy'>
                        <li>Mr. Ruwan Wijesingha (Owner)</li>
                        <li>Mr. Kamal Gunaasekare</li>
                        <li>Mrs. Samanthi Hemachandra</li>
                        <li>Miss. Ruvani Gamage</li>
                        <li>Miss. Ruvani Gamage</li>
                        <li>Miss. Ruvani Gamage</li>
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
                $namArray=$arrayName = array('Lorem ipsum dolor sit.','Lorem ipsum dolor sit amet, consectetur.','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, neque.');
                for ($i = 1; $i < 13; $i++) {
                    echo("
                        <div class='assignment'>
                            <b><span>Assignment $i</span></b><hr>
                            <span class='assignmentTitle'>".$namArray[$i%3]."</span>
                            <span>Weight: 20%</span> 
                            <div class='row col-3'>
                                <div style='text-align: right;'><a href='#' style='color: black;'><i class='far fa-edit'></i></a></div>
                                <div></div>
                                <div style='text-align: left;'><a href='#' style='color: black;'><i class='far fa-folder-open'></i></a></div>
                            </div>
                        </div>
                    ");
                }
                ?>
              </div>
            </div>
        </div>
    </div>
</div>
<?php BasicLoader::loadFooter('../../'); ?>
<script src="../../assets/js/jquery.js"></script>
<script src="assets/assignmentManagement.js"></script>
</body>
</html>
