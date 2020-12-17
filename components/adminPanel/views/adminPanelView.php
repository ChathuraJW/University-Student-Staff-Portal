
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="assets/adminPanelStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody">
        <div class="mainBar">
            <div class="topic">ADMIN Panel</div>
        </div>
        <div class="mainPage">
            <div class="taskList">
                <div class="task one" onclick="subtaskOpen('subsetOne')">Task one</div>
                    <div id="subsetOne" style="display:none;"class="subTasksSet">
                        <div class="subTask">Subtask one</div>
                        <div class="subTask">Subtask two</div>
                        <div class="subTask">Subtask three</div>
                        <div class="subTask">Subtask four</div>
                        <div class="subTask">Subtask five</div>
                        
                    </div>
                <div class="task two" onclick="subtaskOpen('subsetTwo')">Task two</div>
                    <div id="subsetTwo" style="display:none;"class="subTasksSet">
                        <div class="subTask">Subtask one</div>
                        <div class="subTask">Subtask two</div>
                        <div class="subTask">Subtask three</div>
                        <div class="subTask">Subtask four</div>
                        <div class="subTask">Subtask five</div>
                        
                    </div>
                <div class="task three" onclick="subtaskOpen('subsetThree')">Task three</div>
                    <div id="subsetThree" style="display:none;"class="subTasksSet">
                        <div class="subTask">Subtask one</div>
                        <div class="subTask">Subtask two</div>
                        <div class="subTask">Subtask three</div>
                        <div class="subTask">Subtask four</div>
                        <div class="subTask">Subtask five</div>
                        
                    </div>
                <div class="task four">Task four</div>
                <div class="task five">Task five</div>
                <div class="task six">Task six</div>
                <div class="task ">Task seven</div>
                <div class="task ">Task eight</div>
            </div>
            <div class="taskPage">

            </div>
        </div>
    </div>
    <script>
        
        function subtaskOpen(element){
            if(document.getElementById(element).style.display=="none"){
                document.getElementById(element).style.display="";
            }
            else{
                document.getElementById(element).style.display="none";
            }
            // document.getElementById("messageSecond").style.display="none";
            // window.location.href=document.location.href.toString().split('requestAppointment')[0]+'requestAppointment';
            
        }
        function openTab(tabs){
            document.getElementById("tabFirst").style.display="none";
            document.getElementById("tabSecond").style.display="none";
            
            document.getElementById(tabs).style.display="";
        }

        function hover(link){
            document.getElementById("linkFirst").style.backgroundColor  = "rgb(148, 195, 238)";
            document.getElementById("linkSecond").style.backgroundColor  = "rgb(148, 195, 238)";
            document.getElementById(link).style.backgroundColor  = "rgb(58, 189, 212)";
        }

    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>