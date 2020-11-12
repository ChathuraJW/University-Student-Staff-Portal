<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/timetableStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody" >
        <div  id="main"  >
            <h2 class="head">Time Table</h2>
            <table>
                <tr>
                    <th></th>
                    <th id="monday" style="background-color: rgb(9, 112, 230);">Monday</th>
                    <th id="tuesday" style="background-color: rgb(9, 112, 230);">Tuesday</th>
                    <th id="wednesday" style="background-color: rgb(9, 112, 230);">Wednesday</th>
                    <th id="thursday" style="background-color: rgb(9, 112, 230);">Thursday</th>
                    <th id="friday" style="background-color: rgb(9, 112, 230);">Friday</th>
                    <!-- <th></th> -->
                </tr>
                
                <?php
                    for($i=1;$i<18;$i++){

                        if($i==1){$value="8.00-8.30";}
                        elseif($i==2){ $value="8.30-9.00";}
                        elseif($i==3){ $value="9.00-9.30";}
                        elseif($i==4){$value="9.30-10.00";}
                        elseif($i==5){$value="10.00-10.30";}
                        elseif($i==6){$value="10.30-11.00";}
                        elseif($i==7){$value="11.00-11.30";}
                        elseif($i==8){$value="11.30-12.00";}
                        elseif($i==9){$value="12.00-1.00";}
                        elseif($i==10){$value="1.00-1.30";}
                        elseif($i==11){$value="1.30-2.00";}
                        elseif($i==12){$value="2.00-2.30";}
                        elseif($i==13){$value=" 2.30-3.0";}
                        elseif($i==14){$value="3.00-3.30";}
                        elseif($i==15){$value="3.30-4.00";}
                        elseif($i==16){$value="4.00-4.30";}
                        else{$value="4.30-5.00";}

                        
                        
                            echo "
                                <tr class='line".$i."' id='line".$i."'>
                                    <th >".$value."</th>
                                    <th id='Monday".$i."' ></th>
                                    <th id='Tuesday".$i."'></th>
                                    <th id='Wednesday".$i."'></th>
                                    <th id='Thursday".$i."'></th>
                                    <th id='Friday".$i."'></th>
                                </tr>
                            ";
                        
                    }
                ?>
            </table>
        </div>
    </div>
    <script>
 
    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>