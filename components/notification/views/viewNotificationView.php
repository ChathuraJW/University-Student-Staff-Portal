
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
    
    <div class="featureBody bodyBackground text">

        <div class="sample">
            <form id="radioButton" method="post" >
            <div class="radioToolbar">
                <?php
                echo("
                <div class='radioStyle'>
                    <input value='6' type='radio' id='radio6' name='notificationName' onclick='submitForm()'>
                    <label for='radio6'><i class='fa fa-desktop' aria-hidden='true'></i> System(".$controllerData[1][0].")</label><hr>
                </div>
                <div class='radioStyle'>
                    <input  value='2' type='radio' id='radio2' name='notificationName' onclick='submitForm()'>
                    <label for='radio2'><i class='fa fa-users' aria-hidden='true'></i> Social & Events(".$controllerData[1][1].")</label><hr>
                </div>
                <div class='radioStyle'>
                    <input value='3' type='radio' id='radio3' name='notificationName' onclick='submitForm()'>
                    <label class='notificationLabel' for='radio3'><i class='fa fa-bullhorn' aria-hidden='true'></i> Director Notices(".$controllerData[1][2].")</label><hr>
                </div>
                <div class='radioStyle'>
                    <input value='4' type='radio' id='radio4' name='notificationName' onclick='submitForm()'>
                    <label for='radio4'><i class='fa fa-calendar' aria-hidden='true'></i> Fundraising Events(".$controllerData[1][3].")</label><hr>
                </div>
                <div class='radioStyle'>
                    <input value='5' type='radio' id='radio5' name='notificationName' onclick='submitForm()'>
                    <label for='radio5'><i class='fa fa-book' aria-hidden='true'></i> Administrative & Exam(".$controllerData[1][4].")</label><hr>
                </div>
                <div class='radioStyle'>
                    <input value='1' type='radio' id='radio1' name='notificationName' onclick='submitForm()'>
                    <label for='radio1'><i class='fa fa-graduation-cap' aria-hidden='true'></i> Assignment, Scholarship & Lecture re-scheduling(".$controllerData[1][5].")</label><hr>
                </div>
                <div class='radioStyle'>
                    <input value='7' type='radio' id='radio7' name='notificationName' onclick='submitForm()'>
                    <label for='radio7'><i class='fa fa-graduation-cap' aria-hidden='true'></i> Other(".$controllerData[1][6].")</label><hr>
                </div>
            </div>
            ");
            ?>

            <div class="inner">
            <div class=" row col-1" >
                <p class="heading">Notifications</p>
            
                <div class="search" >
                    <input  type="text" placeholder="Search..." name="keyWord">
                    <button type="submit" name="search"><i class="fa fa-search"></i></button>
                </div>
                <div class="inner row col-1" id="defaultNotification">
                    <?php
                    foreach($controllerData[0] as $notification){
                        $notificationId = $notification->getNotificationID();
                        $isViewed = $notification->getIsViewed();
                        echo("
                            <div class='notification' id='div$notificationId' onclick='`($notificationId)`'>                               
                                <labe class='topic'><i class='fa fa-bullhorn' aria-hidden='true'></i><b> ".$notification->getNotificationTitle()."</b></labe>                                                                                                                                  
                                <label class='content'>".$notification->getNotificationContent()." Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda error et ex nobis, provident quis repellendus unde! Ab error esse est hic modi possimus qui repellendus soluta? Earum, laboriosam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto, distinctio dolor eligendi eum numquam officia rerum. Aperiam asperiores dolores earum facere fugiat, nesciunt odit repellat reprehenderit soluta temporibus vero?</label>
                                   <label class='senderTime'>By - ".$notification->getSender()."</label>  
                                    <label class='senderTime'>".$notification->getTimeStamp()."</label>                                                                
                                ");
                                if($isViewed==0){
                                    echo("<input type='button'class='markAsReadButton' id='$notificationId' value='$notificationId' onclick='markASRead(`$notificationId`);' >
                                        <div class='markAsRead'><label for='$notificationId' id='marked$notificationId' class='markAsRead'>Mark as read</label></div>");
                                }
                           echo("
                            </div>
                        ");
                    }
                    ?>
                </div>

                
            </div>
                        </div>

        </div>
            </form>
    </div>
    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../')?>
        <script src="../../assets/js/jQuery.js"></script>
    <script src="assets/viewNotification.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>
</body>
</html>