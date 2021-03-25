<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/viewPastPaper.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody bodyBackground text">
        <form method="post" enctype="multipart/form-data">
            <div class="row col-1">
                <p class="heading">PastPapers</p>
            </div>
            <div class="row col-2">
                <div>
                    <div class="dropdownContainer row col-2">
                        <div>
                            <label class="labelStyle">Examination Year:</label>
                            <select name="examinationYear" id="examinationYear" required >
                                <option value="0" selected></option>
                            </select>
                        </div>
                        <div>
                            <label class="labelStyle">Academic Year:</label>
                            <select name="academicYear" required>
                                <option value="0" selected></option>
                                <option value=1>First Year</option>
                                <option value=2>Second Year</option>
                                <option value=3>Third Year</option>
                                <option value=4>Fourth Year</option>
                            </select>
                        </div>
                    </div>
                    <div class=" dropdownContainer row col-2">
                        <div>
                            <label class="labelStyle">Semester:</label>
                            <select name="semester" required>
                                <option value="0" selected></option>
                                <option value=1>First Semester</option>
                                <option value=2>Second Semester</option>
                            </select>
                        </div>
                        <div>
                            <label class="labelStyle">Subject:</label><br>
                            <select name="subject" required>
                                <option value="0" selected></option>
                                <?php
                                foreach ($controllerData[0] as $row ){
                                    echo ("
                                    <option value='".$row->getCourseCode()."'>".$row->getName()."</option>
                                ");
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="buttonCouple">
                            <button class="button" name="reset"> Cancel</button>
                            <button class="button" type="submit" name="search" id="searchPastPaper" onclick="searchResulta();"> Search</button>
                    </div>
                </div>
                <div>
                    <div class="row col-1" id="recentDetail">
                        <label class="labelStyle" ><?php echo($controllerData[2]); ?></label>
                        <hr>
                        <div style="overflow: hidden" class="row col-3">
                            <?php
//                            print_r($controllerData[1]);
                            function getFileExtension($file_name) {
                                return substr(strrchr($file_name,'.'),1);
                            }

                            foreach ($controllerData[1] as $recent ){
                                $extension = getFileExtension($recent->getPaperName());

//                                convert real semesters in to academic year and semester format
                                 if($recent->getSemester()%2==0){
                                     $semester = "Semester 2";
                                 }else{
                                     $semester = "Semester 1";
                                 }

                                 $academicYear = 0;
                                 switch ($recent->getSemester()){
                                     case 1:
                                     case 2:
                                         $academicYear = "Year 1";
                                         break;
                                     case 3:
                                     case 4:
                                         $academicYear = "Year 2";
                                         break;
                                     case 5:
                                     case 6:
                                         $academicYear = "Year 3";
                                         break;
                                     case 7:
                                     case 8:
                                         $academicYear = "Year 4";
                                         break;
                                 }

                                echo ("         
                                    <div class='pastPaperTile'>
                                <a class='subjectName' href='assets/pastPapers/".$recent->getPaperName()."' target='_blank'>                                   
                                    <span >".$recent->getSubjectCode()."</span><br>
                                    <span >".$recent->getSubjectName()."</span><br>
                                    <span >$academicYear </span>
                                    <span >$semester</span><br>
                                    <span >".$recent->getExaminationYear()."</span><br>
                                    <span><i class='fa fa-download' aria-hidden='true'></i></span>
                                </a>
                            </div>                    
                                    
                                ");
                            }

                            ?>
                        </div>

                    </div>
            </div>
        </form>


    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/toast.js"></script>
    <script src="assets/viewPastPaper.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>
</body>
</html>