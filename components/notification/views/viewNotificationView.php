<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet"  href="assets/viewNotification.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../')?>
    
    <div class="featureBody">
    <div class="row col-1">
                <p class="heading">Notifications</p>
            </div>
        <div class="topicsContainer row col-4">
            <div class="topic" style="background-color:mediumvioletred;" >
                <div class="bell">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="count">5</span>
                </div>
                <div class="row col-1">
                    <span class="notificationName">Topic 1</span>
                </div>
            </div>
            <div class="topic" >
                <div class="bell">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="count">5</span>
                </div>
                <div class="row col-1">
                    <span class= "notificationName">Topic 2</span>
                </div>
            </div>
            <div class="topic" >
                <div class="bell ">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class="count">5</span>
                </div>
                <div class="row col-1">
                    <span  class= "notificationName">Topic 2</span>
                </div>
            </div>
            <div class="topic" >
                <div class="bell">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span  class="count">5</span>
                </div>
                <div class="row col-1">
                    <span  class= "notificationName">Topic 4</span>
                </div>
            </div>
        </div>
        <div class="row col-1">
            <form class="example" action="action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
    <script src="assets/addPastPaper.js"></script>
</body>
</html>