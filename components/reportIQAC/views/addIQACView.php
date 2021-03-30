<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/addIQAC.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body class="bodyBackground text">
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody">
        <div class="row col-1">
            <P class="heading">Add IQAC Report</P>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="row col-2">
                <div class="row col-2">
                    <div>
                        <label class="label">Lecturer:</label><br>
                        <select name="lecturer" required>
                            <option value="0"></option>

                            <?php
                            foreach ($controllerData[0] as $data ){
                                echo ("
                                    <option value='".$data->getUserName()."'>" .$data->getUserName(). " - " .$data->getFullName(). "</option>
                                ");
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label class="label">Subject:</label><br>
                        <select name="subject" required>
                            <option value="0"></option>

                            <?php
                            foreach ($controllerData[1] as $data ){
                                echo ("
                                    <option value='".$data->getCourseCode()."'>".$data->getCourseCode()." - ".$data->getName()."</option>
                                ");
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label class="label">Examination Year:</label><br>
                        <select name="examinationYear" id="examinationYear" required>
                        </select>
                    </div>
                     
                     
                </div>
                <div id="inputFile" class="inputFile row col-1">
                    
                    <input type="file" name="myFile" id="fileInput" class="fileInput" required>
                </div>
            </div>
            <div class="buttonCouple">
                <button class="button" name="cancel"> Cancel</button>
                <button class="button" type="submit" name="upload" > Upload</button>
            </div>
        </form>

            </div>


    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/toast.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>
    <script src="assets/addIQAC.js"></script>
</body>
</html>