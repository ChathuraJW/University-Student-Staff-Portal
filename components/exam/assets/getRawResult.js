//PDF download handling
function savePDF() {
    let sTable = document.getElementById('printArea').innerHTML;

    let style = "<style>";
    style = style + "table {width: 100%;font: 16px Times New Roman;}";
    style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "</style>";

    let printWindow = window.open('', '_blank', 'height=700,width=700');
    printWindow.document.write('<html><head><title>Print Raw Result</title>');
    printWindow.document.write(style);
    printWindow.document.write('</head><body>');
    printWindow.document.write(sTable);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}

//open result data
let elementID = document.location.href.toString().split("getRawResult")[1];
if (elementID != "") {
    document.getElementById("showFileContent").style.display = "inline-grid";
    let notificationCard = document.getElementById(elementID.split("=")[1].split("&")[0]);
    notificationCard.style.backgroundColor = "var(--baseColor)";
    notificationCard.style.color = "white";
}

function cryptoOperation(fileOwnerName, fileSign, encSecrete, dataHash, encryptedData) {
    // hide button
    document.getElementById('dataDecrypt').style.display = 'none';
    // take  SAR private key
    let SARPrivateKey = prompt("Enter the private key hear.");
    if (SARPrivateKey !== '') {
        // take sender public key
        //TODO API Point
        let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?task=takeUserPublicKey&userName=" + fileOwnerName;
        $.getJSON(url, function (key) {
            // get public key
            let userPublicKey = key[0]['publicKey'];
            if (userPublicKey !== '') {
                // extract secrete key
                const decryptSecretKey = new JSEncrypt();
                decryptSecretKey.setPrivateKey(SARPrivateKey);
                let secretKey = decryptSecretKey.decrypt(encSecrete);

                //decrypt data
                let decryptedData = CryptoJS.AES.decrypt(encryptedData, secretKey).toString(CryptoJS.enc.Utf8);

                // check authenticity
                const checkAuthenticity = new JSEncrypt();
                checkAuthenticity.setPublicKey(userPublicKey);
                let decryptedHash = checkAuthenticity.verify(encryptedData, fileSign, CryptoJS.SHA256);
                if (decryptedHash) {
                    // check integrity
                    let dataHashRecalculate = CryptoJS.SHA256(decryptedData).toString();
                    if (dataHashRecalculate === dataHash) {
                        //use data hear
                        addDataToTable(decryptedData);
                        //console.log(decryptedData);
                    } else {
                        createToast('Warning (error code: #ERM10)', 'Data file integrity failed.', 'W');
                    }
                } else {
                    createToast('Warning (error code: #ERM09)', 'Data file authenticity failed.', 'W');
                }
            } else {
                createToast('Warning (error code: #ERM08-PUB)', 'Key loading failed.', 'W');
            }
        });
    } else {
        createToast('Warning (error code: #ERM08-PRI)', 'Key loading failed.', 'W');
    }

}

function addDataToTable(fileContent) {
    let resultTable = document.getElementById('dataList');
    // split dataset with new line character and add then into array
    let dataArray = fileContent.split('\n');
    let arrayLength = dataArray.length;
    // iterate only through result entries
    for (let i = 1; i < arrayLength - 1; i++) {
        let splitDataEntry = dataArray[i].split(',');

        // insert data into table
        let row = resultTable.insertRow(i);

        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);

        cell1.innerHTML = splitDataEntry[0];
        cell2.innerHTML = splitDataEntry[1];
        cell3.innerHTML = splitDataEntry[2];
    }
}