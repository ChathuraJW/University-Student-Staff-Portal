//uploaded key file operation
// let keyFileUploaded = document.getElementById("privateKeyFile");
// let keyFileLabel = document.getElementById("privateKeyLabel");
// keyFileUploaded.addEventListener("change", function () {
//     if (keyFileUploaded.value != '') {
//         let uploadFormat = keyFileUploaded.value.toString().split('.')[1].toLowerCase();
//         if (uploadFormat == "key") {
//             keyFileLabel.style.backgroundColor = "green";
//             readPrivateKeyFile();
//         } else {
//             keyFileLabel.style.backgroundColor = "red";
//             alert("Invalid file format. Please upload ussp formatted file.");
//         }
//     }
// })

// function readPrivateKeyFile(){
//     let fileToLoad = document.getElementById("privateKeyFile").files[0];
//     let fileReader = new FileReader();
//     fileReader.onload = function(fileLoadedEvent){
//         let textFromFileLoaded = fileLoadedEvent.target.result;
//         document.getElementById("privateKeyDisplayArea").value = textFromFileLoaded;
//     };
//     fileReader.readAsText(fileToLoad, "UTF-8");
// }
function loadSubjectData(){
    let url = "http://localhost/USSP/assets/API/resultCreateClinetAPI.php?loadSubjectData=true";
    $.getJSON(url,function (data) {
        if(data){
            data.forEach(function (item) {
                $('#subject').append(new Option(item['name'], item['courseCode']));
            })
        }
    });
}

function processData(){
    let subjectCode = document.getElementById("subject").value;
    let attempt = document.getElementById("attempt").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if(subjectCode==='' || attempt ==='' || username ==='' || password ==='' || username.length!==3){
        alert("Complete all fields before authenticate and make sure to use correct credentials.");
        location.reload();
    }
    let url = "http://localhost/USSP/assets/API/resultCreateClinetAPI.php?username=" + username+ "&role=AS" + "&password=" + CryptoJS.SHA256(password).toString(CryptoJS.enc.Hex);
    console.log(url);
    $.getJSON(url,function(data){
            if(data){
                document.getElementById('container').style.display='block';
                document.getElementById('footer').style.position='inherit';
                alert("Login Success");
                $("#subject").prop('disabled', true);
                $("#attempt").prop('disabled', true);
                $("#username").prop('disabled', true);
                $("#password").prop('disabled', true);
                $("#authenticate").prop('disabled', true);
                $("#cancel").prop('disabled', true);
                $("#authenticate").css("background-color", "gray");
                $("#cancel").css("background-color", "gray");
                createList(subjectCode,attempt);
            }else{
                alert("Login Failed. Try Again");
            }
    });
}
let totalIndex=0;
function createList(subjectCode,attempt){
    let url = "http://localhost/USSP/assets/API/resultCreateClinetAPI.php?subjectCode=" + subjectCode + "&attempt=" + attempt;
    // console.log(url);
    $.getJSON(url, function (data) {
        let table = document.getElementById("loadHear");
        let tempIndex=0;
        data.forEach(function (item, index) {
            let indexID="index"+(index+1);
            let resultID="result"+(index+1);
            let row = table.insertRow(index+1);
            row.insertCell(0).innerHTML=index+1;
            row.insertCell(1).innerHTML ="<input type='number' name='' id='"+indexID+"' maxlength='8' value='"+item['studentIndexNo']+"' required>";
            row.insertCell(2).innerHTML ="<input type='number' name='' id='"+resultID+"' max='100' required>";
            $("#"+indexID).prop('disabled', true);
            tempIndex++;
        });
        totalIndex=tempIndex;
    });
}

function generateFile() {
    // let stringArray=new Array();
    let finalString="Serial Number, Index Number, Result\n";
    for (let i=1;i<=totalIndex;i++){
        let indexID="index"+i;
        let resultID="result"+i;
        let indexValue=document.getElementById(indexID).value;
        let resultValue=document.getElementById(resultID).value;
        if(indexValue==='' || resultValue ==='' || resultValue>100 || resultValue<0){
            alert("Complete all filed before generate the file or check your values correctness.");
            return ;
        }
        $("#"+resultID).prop('disabled', true);
        let resultRow=i+','+indexValue+','+resultValue+'\n';
        finalString=finalString.concat(resultRow);
        // data partitioning
        // if(i%5==0){
        //     stringArray.push(finalString);
        //     finalString=new String();
        // }
    }
    downloadFile("USSPUploadableResult.ussp",finalString);
    location.reload();
    // stringArray.push(finalString);
    // console.log(stringArray);
    //do encryption
    // privateKeyEncrypt(stringArray);
}
// function publicKeyEncrypt(strArray){
//     let url = "http://localhost/USSP/assets/API/resultCreateClinetAPI.php?task=getPubKey";
//     let encArray=new Array();
//     $.getJSON(url, function (key) {
//         let publicKey = key[0]['publicKey'];
//         const encrypt = new JSEncrypt();
//         encrypt.setPublicKey(publicKey);
//         for (let i=0;i<strArray.length;i++){
//             let result=encrypt.encrypt(strArray[i]);
//             encArray.push(result);
//         }
//         // console.log(encArray);
//         privateKeyEncrypt(encArray)
//         // downloadFile("result.ussp",encArray[0]);
//     });
// }
// function privateKeyEncrypt(stringArray){
//     let encArray=new Array();
//     let finalStr=new String();
//     const encrypt = new JSEncrypt();
//     encrypt.setPrivateKey(document.getElementById('privateKeyDisplayArea').value);
//     for (let i=0;i<stringArray.length;i++){
//             let result=encrypt.encrypt(stringArray[i]);
//             // encArray.push(result);
//             finalStr=finalStr+"\n"+result;
//     }
//     // console.log(encArray);
//     downloadFile("result.ussp",finalStr);
// }
function downloadFile(filename, text) {
    let element = document.createElement('a');
    element.setAttribute('href', 'data:all/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
}