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
                            <select name="examinationYear" id="examinationYear" required>
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
                                echo ("         
                                    <div class='pastPaperTile'>
                                <a class='subjectName' href='' target='_blank'>
                                    <span >$recent->get</span><br>
                                    <span >Data Structure & Algorithms 1</span><br>
                                    <span >First Year </span>
                                    <span >First Semester</span><br>
                                    <span >2010</span><br>
                                    <span><i class='fa fa-download' aria-hidden='true'></i></span>
                                </a>
                            </div>                    
                                    <div class='paperDetails'>
                                        <a class='subjectName' href='assets/pastPapers/".$recent->getPaperName()."' target='_blank'><span >".$recent->getPaperName()."</span></a>
                                    </div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div class='download'>
                                        <a class='pastPapers' href='#'>  <i class='fa fa-download' aria-hidden='true'></i></a>
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
</body>
</html>