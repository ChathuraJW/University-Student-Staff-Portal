var col9=document.getElementById("timetable").rows[9];
        
        col9.cells[1].innerHTML = "B";
        col9.cells[2].innerHTML = "R";
        col9.cells[3].innerHTML = "E";
        col9.cells[4].innerHTML = "A";
        col9.cells[5].innerHTML = "K";


        var E1 = document.getElementById("timetable").rows[1];
        var E2 = document.getElementById("timetable").rows[2];
        var E3 = document.getElementById("timetable").rows[3];
        var E4 = document.getElementById("timetable").rows[4];
        E2.deleteCell(2);
        E3.deleteCell(2);
        E4.deleteCell(2);
        E1.cells[1].style.backgroundColor = "rgb(253, 144, 144)";
        E1.cells[1].style.textAlign = "center";
        E1.cells[1].rowSpan  = "4";
        E1.cells[1].innerHTML = "<div>SCS1202 lecture</div><div>W002</div>";

        var E5 = document.getElementById("timetable").rows[5];
        var E6 = document.getElementById("timetable").rows[6];
        var E7 = document.getElementById("timetable").rows[7];
        var E8 = document.getElementById("timetable").rows[8];
        E6.deleteCell(3);
        E7.deleteCell(3);
        E8.deleteCell(3);
        E5.cells[2].style.backgroundColor = "rgb(255, 252, 104)";
        E5.cells[2].style.textAlign = "center";
        E5.cells[2].rowSpan  = "4";
        E5.cells[2].innerHTML = "<div>SCS1205 lecture</div><div> E201</div>";