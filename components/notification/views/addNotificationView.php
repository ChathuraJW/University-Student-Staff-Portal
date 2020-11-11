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
    
    <div class="featureBody">
        <form method ="post">
            <div class="row col-1">
                <p class="heading">Notification</p>
            </div>
            <div>
                <label>Announcement for:</label>
            </div>
            <div>
                <input type="checkbox" name="checkAll" value="">All<br>
                <input type="checkbox" name="checkAcademicStaff" value="">Academic Staff<br>
                <input type="checkbox" name="checkAcademicSupport" value="">Academic Support Staff<br>
                <input type="checkbox" name="checkAdministrative" value="">Administrative Staff<br>
                <input type="checkbox" name="checkStudent" value="">Student<br>
                <div class="row col-4">
                    <div>
                        <input type="checkbox" name="check" value="">First Year
                        <div>
                            <input type="checkbox" name="checkAll" value="">CS Group 1<br>
                            <input type="checkbox" name="checkAll" value="">CS Group 2<br>
                            <input type="checkbox" name="checkAll" value="">IS<br>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="checkAll" value="">Second Year
                        <div>
                            <input type="checkbox" name="checkAll" value="">CS Group 1<br>
                            <input type="checkbox" name="checkAll" value="">CS Group 2<br>
                            <input type="checkbox" name="checkAll" value="">IS<br>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="checkAll" value="">Third Year
                        <div>
                            <input type="checkbox" name="checkAll" value="">CS<br>
                            <input type="checkbox" name="checkAll" value="">IS<br>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="checkAll" value="">Fourth Year
                        <div>
                            <input type="checkbox" name="checkAll" value="">CS<br>
                            <input type="checkbox" name="checkAll" value="">IS<br>
                            <input type="checkbox" name="checkAll" value="">SE<br>
                        </div>
                    </div>

                </div>
            </div>
            <div>
                <label>Category:</label>
                <select>
                    <option>Director Notices</option>
                    <option>Academic Related</option>
                </select>
                <div class="row col-1">
                    <textarea name="title" rows="2" cols="130" placeholder="title"></textarea>
                </div>
                <div class="row col-1">
                    <textarea name="message" rows="15" cols="130" placeholder="massage"></textarea>
                </div>
                <div class="row col-2">
                        <div>
                            <button class="submitButton red"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</button>
                        </div>
                        <div>
                            <button class="submitButton green"type="submit" ><i class="fa fa-upload" aria-hidden="true"></i>Send</button>
                        </div>
                    </div>
            </div>



        </form>
    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="assets/addPastPaper.js"></script>
</body>
</html>