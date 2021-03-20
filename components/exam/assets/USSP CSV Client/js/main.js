function loadSubjectData(){
    let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?loadSubjectData=true";
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

    let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?username=" + username + "&role=AD" + "&password=" + password;
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
    let url = "http://localhost/USSP/components/exam/assets/resultCreateClinetAPI.php?subjectCode=" + subjectCode + "&attempt=" + attempt;
    $.getJSON(url, function (data) {
        let table = document.getElementById("loadHear");
        let tempIndex=0;
        data.forEach(function (item, index) {
            let indexID="index"+(index+1);
            let resultID="result"+(index+1);
            let row = table.insertRow(index+1);
            row.insertCell(0).innerHTML=index+1;
            row.insertCell(1).innerHTML ="<input type='number' name='' id='"+indexID+"' maxlength='8' value='"+item['studentIndexNo']+"' required>";
            row.insertCell(2).innerHTML ="<select name = '' id = '"+resultID+"' required><option value='A+'>A+</option><option value='A'>A</option><option value='A-'>A-</option><option value='B+'>B+</option><option value='B'>B</option><option value='B-'>B-</option><option value='C+'>C+</option><option value='C'>C</option><option value='C-'>C-</option><option value='D+'>D+</option><option value='D'>D</option><option value='E'>E</option><option value='F'>F</option><option value='NC'>NC</option><option value='CM'>CM</option></select>";
            $("#"+indexID).prop('disabled', true);
            tempIndex++;
        });
        totalIndex=tempIndex;
    });
}

function generateFile() {
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
    }
    downloadFile("USSPUploadableResult.csv",finalString);
    location.reload();
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