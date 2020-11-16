  function getFile() {
            let sTable = document.getElementsByClassName('workloadHistory');
            var i;
            let style = "<style>";
            style = style + "table {width: 100%;font: 16px Times New Roman;}";
            style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
            style = style + "padding: 2px 3px;text-align: center;}";
            style = style + "</style>";

            let printWindow = window.open('', '', 'height=700,width=700');
            printWindow.document.write('<html><head><title>Workload History</title>');
            printWindow.document.write(style);
            printWindow.document.write('</head><body>');
            for(i=0;i<5;i++){
                console.log(sTable[i].innerHTML);
                printWindow.document.write(sTable[i].innerHTML);
            }
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }

        function read(dots, more, link) {
            // var dots = document.getElementById("dots");
            // var more = document.getElementById("more");
            // var link = document.getElementById("link");

            if (document.getElementById(link).getAttribute('attribute') == 1) {
                document.getElementById(link).setAttribute('attribute',0);
                document.getElementById(dots).style.display = "inline";
                document.getElementById(link).innerHTML = "Read more"; 
                document.getElementById(more).style.display = "none";
            } else {
                document.getElementById(link).setAttribute('attribute',1);
                document.getElementById(dots).style.display = "none";
                document.getElementById(link).innerHTML = "Read less"; 
                document.getElementById(more).style.display = "inline";
            }
            }
        function openMsg(){
            document.getElementById("scheduleDescription").style.display="";
            document.getElementById("beforeMessage").style.display="none";
        }
        function closeFirst(){
            document.getElementById("workloadRequest").style.display="none";
            document.getElementById("messageView").style.display="";
        }
        function closeSecond(){
            document.getElementById("scheduleDescription").style.display="none";
            document.getElementById("beforeMessage").style.display="";
        }
        function scheduleCheck(){
            if(document.getElementById("linkOne").getAttribute("check") == 0) {
            document.getElementById("main").style.display="none";
            // document.getElementById("messageView").style.display="none";
            document.getElementById("schedule").style.display="";
            document.getElementById("linkOne").setAttribute("check", 1);
            document.getElementById("linkOne").innerHTML='Back';
            }
            else{
                document.getElementById("schedule").style.display="none";
                // document.getElementById("messageView").style.display="none";
                document.getElementById("main").style.display="";
                document.getElementById("linkOne").setAttribute("check", 0);
                document.getElementById("linkOne").innerHTML='History';
                }
        }
        function openMessage(){
            document.getElementById("messageView").style.display="none";
            document.getElementById("workloadRequest").style.display="";
        }
        
        function messageClose(){
            document.getElementById("messageView").style.display="";
            document.getElementById("workloadRequest").style.display="none";
        }
        function allocation(){
            // document.getElementById("workloadRequest").reset();
            document.getElementById("finalMsg").style.display="";
            setTimeout(function(){
                document.getElementById("workloadRequest").style.display="none";
                document.getElementById("messageView").style.display="";
                document.getElementById("finalMsg").style.display="none";

                }, 2000);
        }
    