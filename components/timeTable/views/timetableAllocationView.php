<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/workloadAllocationStyles.css">
    <link rel="stylesheet" href="../../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- include header section -->
    <?php require('../../assets/php/basicLoader.php')?>
    <?php BasicLoader::loadHeader('../../') ?>
    
    <!-- feature body section -->
    <div class="featureBody" >
        <form class="row col-2" action="">
            <div id="section" class="section">
                <div class="row col-2">
                    <div><button>Academic Staff</button></div>
                    <div><button>Student</button></div>
                </div>
                <div>
                    <label for="myInput">Lecturer</label>
                    <input id="myInput" list="myDropdown" plaseholder="Search lecturer.."onkeyup="findLecture('myInput','myDropdown')">
                    <datalist id="myDropdown">
                        <option value="ABC1"></option>
                        <option value="ACD2"></option>
                        <option value="DAC3"></option>
                        <option value="DEA4"></option>
                        <option value="EWA5"></option>
                    </datalist>
                </div>
                <div>
                    <label for="student">students</label>
                    <input id="student" list="studentDropdown" plaseholder="Search Students.."onkeyup="findLecture('student','studentDropdown')">
                    <datalist id="studentDropdown">
                        <option value="1st year CS Group1"></option>
                        <option value="1st year CS Group2"></option>
                        <option value="1st year IS"></option>
                        <option value="2nd year CS Group1"></option>
                        <option value="2nd year CS Group2"></option>
                        <option value="3rd year CS"></option>
                        <option value="3rd year IS"></option>
                        <option value="4th year CS"></option>
                        <option value="4th year IS"></option>

                    </datalist>
                </div>
            </div>
            <div>

            </div>
        </form>
    <div>
    <script>
        function findLecturer(inputValue,dropdown){
            var input, filter,div, a, i,txtValue;
            input = document.getElementById(inputValue);
            filter = input.value.toUpperCase();
            div = document.getElementById(dropdown);
            a = div.getElementsByTagName("option");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
                } else {
                a[i].style.display = "none";
                }
            }
        }
        // function findStudents(){
        //     var input, filter,div, a, i,txtValue;
        //     input = document.getElementById("student");
        //     filter = input.value.toUpperCase();
        //     div = document.getElementById("studentDropdown");
        //     a = div.getElementsByTagName("option");
        //     for (i = 0; i < a.length; i++) {
        //         txtValue = a[i].textContent || a[i].innerText;
        //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //         a[i].style.display = "";
        //         } else {
        //         a[i].style.display = "none";
        //         }
        //     }
        // }
    
    </script>
    

    <!-- include footer section -->
    <?php BasicLoader::loadFooter('../../') ?>
</body>
</html>