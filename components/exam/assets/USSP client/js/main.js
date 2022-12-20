//uploaded key file operation
let keyFileUploaded = document.getElementById("privateKeyFile");
let keyFileLabel = document.getElementById("privateKeyLabel");
let userPrivateKey = "";
keyFileUploaded.addEventListener("change", function () {
    if (keyFileUploaded.value !== '') {
        let uploadFormat = keyFileUploaded.value.toString().split('.')[1].toLowerCase();
        if (uploadFormat === "key") {
            keyFileLabel.style.backgroundColor = "green";
            readPrivateKeyFile();
        } else {
            keyFileLabel.style.backgroundColor = "red";
            alert("Invalid file format. Please upload ussp formatted file.");
        }
    }
})

function readPrivateKeyFile() {
    let fileToLoad = document.getElementById("privateKeyFile").files[0];
    let fileReader = new FileReader();
    fileReader.onload = function (fileLoadedEvent) {
        userPrivateKey = fileLoadedEvent.target.result;
    };
    fileReader.readAsText(fileToLoad, "UTF-8");
}

function loadSubjectData() {
    let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?loadSubjectData=true";
    $.getJSON(url, function (data) {
        if (data) {
            data.forEach(function (item) {
                $('#subject').append(new Option(item['name'], item['courseCode']));
            })
        }
    });
}

function processData() {
    console.log('in fun');
    let subjectCode = document.getElementById("subject").value;
    let attempt = document.getElementById("attempt").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (subjectCode === '' || attempt === '' || username === '' || password === '' || username.length !== 3) {
        alert("Complete all fields before authenticate and make sure to use correct credentials.");
        location.reload();
    }
    let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?username=" + username + "&role=AS" + "&password=" + password;
    console.log(url);
    $.getJSON(url, function (data) {
        if (data) {
            document.getElementById('container').style.display = 'block';
            document.getElementById('footer').style.position = 'inherit';
            alert("Login Success");
            $("#subject").prop('disabled', true);
            $("#attempt").prop('disabled', true);
            $("#username").prop('disabled', true);
            $("#password").prop('disabled', true);
            $("#authenticate").prop('disabled', true);
            $("#cancel").prop('disabled', true);
            $("#authenticate").css("background-color", "gray");
            $("#cancel").css("background-color", "gray");
            createList(subjectCode, attempt);
        } else {
            alert("Login Failed. Try Again");
        }
    });
}

let totalIndex = 0;

function createList(subjectCode, attempt) {
    let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?subjectCode=" + subjectCode + "&attempt=" + attempt;
    $.getJSON(url, function (data) {
        let table = document.getElementById("loadHear");
        let tempIndex = 0;
        data.forEach(function (item, index) {
            let indexID = "index" + (index + 1);
            let resultID = "result" + (index + 1);
            let row = table.insertRow(index + 1);
            row.insertCell(0).innerHTML = index + 1;
            row.insertCell(1).innerHTML = "<input type='number' name='' id='" + indexID + "' maxlength='8' value='" + item['studentIndexNo'] + "' required>";
            row.insertCell(2).innerHTML = "<input type='number' name='' id='" + resultID + "' max='100' required>";
            $("#" + indexID).prop('disabled', true);
            tempIndex++;
        });
        totalIndex = tempIndex;
    });
}

function generateFile() {
    let finalString = "Serial Number, Index Number, Result\n";
    for (let i = 1; i <= totalIndex; i++) {
        let indexID = "index" + i;
        let resultID = "result" + i;
        let indexValue = document.getElementById(indexID).value;
        let resultValue = document.getElementById(resultID).value;
        if (indexValue === '' || resultValue === '' || resultValue > 100 || resultValue < 0) {
            alert("Complete all filed before generate the file or check your values correctness.");
            return;
        }
        $("#" + resultID).prop('disabled', true);
        let resultRow = i + ',' + indexValue + ',' + resultValue + '\n';
        finalString = finalString.concat(resultRow);
    }
    cryptoAction(finalString);
}

function downloadFile(filename, text) {
    let element = document.createElement('a');
    element.setAttribute('href', 'data:all/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
}

function cryptoAction(text) {
    let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?task=getPubKey";
    $.getJSON(url, function (key) {
        // get public key
        let publicKey = key[0]['publicKey'];
        // create random secret
        let secret = Math.floor(Math.random() * Math.pow(10, 20)).toString();
        //encrypt secrete using SAR public key
        const encryptSec = new JSEncrypt();
        encryptSec.setPublicKey(publicKey);
        let SARPublicKeyEncSecret = encryptSec.encrypt(secret);
        //generate hash for data
        let dataHash = CryptoJS.SHA256(text).toString();
        // encrypt data with secret
        let encryptedData = CryptoJS.AES.encrypt(text, secret).toString();


        //sign the file
        // var signature = sign.sign($('#input').val(), CryptoJS.SHA256, "sha256");
        //let fullDatasetHash = CryptoJS.SHA256(contentInitial).toString();
        const signFile = new JSEncrypt();
        signFile.setPrivateKey(userPrivateKey);
        let fileSign = signFile.sign(encryptedData, CryptoJS.SHA256, "sha256");


        // complete content fo the file
        let finalFileContent = fileSign + "\n" + SARPublicKeyEncSecret + "\n" + dataHash + "\n" + encryptedData;
        // file content
        // -file signature
        // -encrypted secret
        // -data hash
        // -encrypted data
        // call file function to download file
        downloadFile("USSPResultFileRow.ussp", finalFileContent);
    });
}