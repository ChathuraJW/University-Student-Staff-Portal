
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/appointmentStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody bodyBackground text" >
       
        <div id="tabFirst"  class="row col-2 tabContain"  >
    
            <!-- fist lecturer and date -->
            <div class="myAppointments" >
                                
                <div class="row col-1">
<!--                    in this section will list all the user maked appointments-->
                    <h3 id="head">My Requests </h3>
                </div>
                <?php $records=$controllerData[1];?>
                <?php if(count($records)):?>
                    
                    <?php foreach($records as $record){?> 
                        
                        <div class="row col-1">
                            
                        <!-- $userName,$title,$description,$location,$Date,$fromTime,$toTime,$requestDate) -->

                            <span class="appointment text" ><div style="margin-bottom:10px;" class="appointmentDescription messageHead"><?php echo $record['title'];?></div><div class="appointmentDescription"><?php echo substr($record['description'], 0, 80);?> </div><div class="appointmentDescription" style="float:right;"><i class='fa fa-clock-o' aria-hidden='true'></i>  <?php echo $record['requestDate'];?></div></span><br>
                            
                            
                                        
                        </div>
                    <?php }?>
                <?php else: ?>
                    <p>Not find to Records</p>
                <?php endif;?>
            
            </div>
            
            <div  class="row col-1 requestForm" >
                <div class="row col-1">
<!--                    this is the form which use for make new appointments.-->
                    <h2 id="head">New Workload</h2>
                </div>
                <form action="" class="getAppointmentForm" method="post" enctype="multipart/form-data">

                <div style="text-align:center;">Title</div>

                    <div class="row col-1">
                        <input style="width:100%;" class="dataRaws" type="text"  name="title" placeholder="Title"><br>
                    </div>
                    <div style="text-align:center;">Location</div>
                    <select class="dataRaws" name="hall"  id="lecture2">
                        <?php 

                            $halls=$controllerData[0];
                            foreach($halls as $hall){
                                echo("<option value='".$hall['hallID']."'>".$hall['hallID']."</option>");
                            }
                            // ".$lecturer[''].$lecturer['']."
                        ?>
                    </select> <br>

                    <div style="text-align:center;">Date</div>
                            
                    <div><input id="dateValue" style="width:100%;"class="dataRaws" type="date" name="date" ></div>
                    
                    <div class="row col-2">
                    <div style="text-align:center;">From time</div>

                        <div><input style="width:100%;"class="dataRaws" type="time" name="fromTime" ></div>
                    <div style="text-align:center;">To time</div>

                        <div><input style="width:100%;"class="dataRaws" type="time" name="toTime" ></div>
                    </div>
                    <div style="text-align:center;">Description</div>
                
                    <div class="row col-1">
                        <textarea class="description" type="text" id="description" name="msg" placeholder="Description"></textarea><br>
                    </div>

                    <div class="row col-1">
                        <input style="width:100%;" id="submitButton" class="button" type="submit" name="submit" value="Submit">
                    </div>
                    <div class="row col-1">
                        <input style="width:100%;" id="resetButton" class="button" type="reset" value="Reset">
                    </div>

                </form>
            </div>
        
        </div>
        

        
   
    </div>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/toast.js"></script>
    <script src="../../assets/js/changeTheme.js"></script>

    <script src="assets/requestAppointment.js"></script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>