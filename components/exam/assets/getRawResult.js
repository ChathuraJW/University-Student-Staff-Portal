//PDF download handling
function savePDF() {
    let sTable = document.getElementById('printArea').innerHTML;

    let style = "<style>";
    style = style + "table {width: 100%;font: 16px Times New Roman;}";
    style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "</style>";

    let printWindow = window.open('', '', 'height=700,width=700');
    printWindow.document.write('<html><head><title>Print Raw Result</title>');
    printWindow.document.write(style);
    printWindow.document.write('</head><body>');
    printWindow.document.write(sTable);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}

//open result data
let elementID=document.location.href.toString().split("getRawResult.php")[1];
if(elementID!=""){
    document.getElementById("showFileContent").style.display="inline-grid";
    let notificationCard=document.getElementById(elementID.split("=")[1]);
    notificationCard.style.backgroundColor="#93599E";
    notificationCard.style.color="white";
}