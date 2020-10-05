<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="requestMeetingStyles.css">
</head>
<body>
    <!-- include header section -->
    <?php require('../../assets/php/commonHeader.php')?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <h2 id="head">Appointments</h2>
        <fieldset class="nav">
            <a href="history.php"class="button2">History</a>
            <a href="respondforMeeting.php"class="button2">Pending Appointment</a>


        </fieldset>
        <style>
            #head{
                margin-left:196px;
                padding-bottom:10px;
            }
            .nav{
                width:70%;
                border: none;
                background-color: rgb(148, 195, 238);
                margin:auto;
                margin-bottom:5px;
                padding:15px;
            }
            .button2{
                text-decoration:none;
                color:black;
                padding-right:20px;
                font-family: 'Times New Roman', Times, serif;
                font-weight:10px;
            }
            .appointment:hover{
                background-color: rgb(169, 172, 171);
                cursor:pointer;
            }
            .appointmentMessage{
                display:none;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(179, 226, 211, 0.4);
            }
            .content{
                width: 50%;
                background-color: beige;
                height: fit-content;
                padding: 30px;           
                margin-top: 100px;
                margin-left: auto;
                margin-right: auto;
            }
            .appointment{
                width:70%;
                border: none;
                padding:auto;
                background-color: rgb(205, 209, 208);
                margin-left:196px;
                margin-bottom:10px
                
            }
            #apptp{
                text-align:left;
                padding-left:20px;
            }
        </style>
        <div class="list">
            
                <div>
                    
                    <?php for($i=0;$i<10;$i++):?>
                    <button class="appointment" onclick="open()"><p id="apptp">Appointment <?php echo $i+1?></p></button><br>
                    <?php endfor;?>
                    
                </div>
                
        </div>
        <div class="appointmentMessage" >
            <div class="content">
                <h4>Appointment Topic</h4><br>
                <p>Student Index</p>
                <p> making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                    College in Virginia, looked up one of the more obscure Latin words, consectetur, from
                    a Lorem Ipsum passage, and going through the cites of the word in classical literature, 
                    discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of
                    "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45
                    BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in 
                    section 1.10.32
                </p><br>
                <button type="submit">Approve</button>
                <button type="submit">Reject</button>
            </div>
        </div>
    </div>
    <!-- <p id="demo" onclick="myFunction()">Click me to change my text color.</p> -->

    <script>
        var list= document.getElementsByClassName("list");
        var apt = document.getElementsByClassName("appointment");
        var msg = document.getElementsByClassName("appointmentMessage");
        function open(){
            document.getElementsByClassName("appointmentMessage").style.display  = "block";
            
            
        }
        function myFunction() {
        document.getElementById("demo").style.color = "red";
        }
    </script>
    <!-- include footer section -->
    <?php require('../../assets/php/commonFooter.php')?>
</body>

</html>