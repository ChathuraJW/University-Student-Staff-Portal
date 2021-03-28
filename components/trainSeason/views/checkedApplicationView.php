<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="assets/checkedApplicationStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />

</head>
<style>
  .dataEntry{
    display: table;
    width:100%;
    margin-bottom:20px;
  }
  .dataLabel{
    
    width:50%;
    text-align:center;
    font-size:15px;
    font-weight:bold;

  }
  .data{
    display:table-cell;
    width:50%;
  }
  .head{
    padding:20px;
    text-align:center;
    font-size:25px;
    font-weight:bold;


  }
   
  .applicationForm{
    width:100%;
    
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 30px 30px 0 rgba(0, 0, 0, 0.19);

  }
  .inputLabel{
    width: 25%;
    font-size: 18px;
    
  }
  .container2{
    width:90%;
    margin:auto;
    
  }
  .input{
    width:95%;
    margin:auto;
    padding:10px;
    border:solid;
    border-color: rgb(218, 218, 218);
    outline: none;
    font-size: 18px;

  }
  .requestMessage{
    font-size:18px;
    width: 700px;
    height: 700px;
    border: 3px solid gray;
    border-top: 3px solid gray;
    border-radius: 4px;
    padding-top: 10px;
    padding-left: 20px;
    padding-bottom: 20px;
    padding-right: 20px;
    position: absolute;
    top: 60%;
    left: 24%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    box-shadow: 0 16px 18px 0 rgb(97, 107, 97);
    
  }
   
</style>
<body class="bodyBackground text">
<div class="featureBody">
<?php
 
 
if($controllerData[0]){
  echo("
  <div class='requestMessage' id='form'>
  
      <form method='POST' enctype='multipart/form-data' class='checkedApplication'>
        <div>
          <div class='head'>Season Request</div>
        
          
          ");
          foreach($controllerData[0] as $data){
            echo("
            <div style='float:right;'>Date: ".$data->getTimeStamp()."</div><br>
           
          <br>
                
                   
                  <label for='regNo' class='inputLabel regNo'>Full Name:</label><br>
                  <input type='text' id='regNo' name='regNo' style='width: 100%;' class='input regNoText' value=".$data->getRequseterFullName()." readonly><br><br>

                  <label for='address' class='inputLabel name'>Address:</label><br>
                  <input type='text' id='address' name='address' style='width: 100%;' class='input nameText' value=".$data->getAddress()." readonly><br><br>

                  <div class='row col-2'>
                    <div>
                    <label for='fromMonth' class='inputLabel name'>From Month:</label>
                    <input type='text' id='fromMonth' style='width:90%;' name='fromMonth' value=".$data->getFromMonth()." class='input nameText' readonly>
                       <br>
                    </div>

                    <div>
                      <label for='fromMonth' class='inputLabel name'>To Month:</label>
                      <input type='text' style='width:90%;' id='toMonth' name='toMonth' value=".$data->getToMonth()." class='input nameText' readonly>
                        <br>
                    </div>
                    <div>
                      <label for='homeStation' class='inputLabel name'>Nearest Station from Home:</label><br>
                      <input type='text' id='homeStation' style='width:90%;' value=".$data->getNearRailwayStationHome()." class='input nameText' readonly><br><br>
                    </div>
                    <div>
                      <label for='universityStation' class='inputLabel name'>Nearest Station from University:</label><br>
                      <input type='text' id='universityStation' style='width:90%;' value='".$data->getNearRailwayStationHome()."' name='universityStation' class='input nameText' readonly><br><br>
                    </div>

                    

                  </div>
                ");
                }
                echo("
                

                  <label for='seasonID' class='inputLabel name'>Season ID:</label><br>
                  <input type='text' id='seasonID' style='width:90%;' name='seasonID' class='input nameText'><br><br><br><br>
                  <div class='dataEntry'>
                    <div class='dataLabel'>
                  
                      <input type='submit' class='button' value='Checked' name='submit' style='font-size: 16px;' >
                    </div>
                    <div class='data'>
                      <a  href='checkTrainSeason'> 
                    <input type='button' class='button' value='Cancel' style='font-size: 16px;'>
                    </a>
                    <br>
                    </div>
                  </div>
        </div>
        
         
      </form>
  </div>
");
}

if($controllerData[1]){
echo("
  <div class='requestMessage' id='form'>
  
      <form method='POST' enctype='multipart/form-data' class='checkedApplication'>
        <div>
          <div class='head'>Season Request</div>
        
");
          foreach($controllerData[1] as $data){
            echo("
            <div style='float:right;'>Date: ".$data->getTimeStamp()."</div><br>
           
          <br>
                
                   
                  <label for='regNo' class='inputLabel regNo'>Full Name:</label><br>
                  <input type='text' id='regNo' name='regNo' style='width: 100%;' class='input regNoText' value=".$data->getRequseterFullName()." readonly><br><br>

                  <label for='address' class='inputLabel name'>Address:</label><br>
                  <input type='text' id='address' name='address' style='width: 100%;' class='input nameText' value=".$data->getAddress()." readonly><br><br>

                  <div class='row col-2'>
                    <div>
                    <label for='fromMonth' class='inputLabel name'>From Month:</label>
                    <input type='text' id='fromMonth' style='width:90%;' name='fromMonth' value=".$data->getFromMonth()." class='input nameText' readonly>
                       <br>
                    </div>

                    <div>
                      <label for='fromMonth' class='inputLabel name'>To Month:</label>
                      <input type='text' style='width:90%;' id='toMonth' name='toMonth' value=".$data->getToMonth()." class='input nameText' readonly>
                        <br>
                    </div>
                    <div>
                      <label for='homeStation' class='inputLabel name'>Nearest Station from Home:</label><br>
                      <input type='text' id='homeStation' style='width:90%;' value=".$data->getNearRailwayStationHome()." class='input nameText' readonly><br><br>
                    </div>
                    <div>
                      <label for='universityStation' class='inputLabel name'>Nearest Station from University:</label><br>
                      <input type='text' id='universityStation' style='width:90%;' value='".$data->getNearRailwayStationHome()."' name='universityStation' class='input nameText' readonly><br><br>
                    </div>

                    

                  </div>
                "); 
                }
                 

                echo("
                  <label for='seasonID' class='inputLabel name'>Season ID:</label><br>
                  <input type='text' id='seasonID' style='width:90%;' value=".$data->getSeasonID()." name='seasonID' class='input nameText' readonly><br><br>

                  <label for='collectedPerson' class='inputLabel name'>Collected Person:</label><br>
                  <input type='text' id='collectedPerson' style='width:90%;' name='collectedPerson' class='input nameText'><br><br><br>

                  <div class='dataEntry'>
                    <div class='dataLabel'>
                  
                      <input type='submit' class='button' value='Collected' name='collected' style='font-size: 16px;' >
                    </div>
                    <div class='data'>
                      <a  href='checkTrainSeason'> 
                    <input type='button' class='button' value='Cancel' style='font-size: 16px;'>
                    </a>
                    <br>
                    </div>
                  </div>
        </div>
        
         
      </form>
  </div>
");
}

?>
</div>
</body>
</html>

<!--<label for='fullName' class='inputLabel fullName'>Full Name:</label><br>
                  <input type='text' id='fullName' name='fullName' class='input fullNameText' value='aa' readonly><br><br>
                  <label for='name' class='inputLabel name'>Name with initials:</label><br>
                  <input type='text' id='name' name='name' class='input nameText' value='K.Perera' readonly><br><br>-->
<script src="../../assets/js/changeTheme.js"></script>