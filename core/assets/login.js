let lblUserName = document.getElementById("labelUserName");
let lblPassword = document.getElementById("labelPassword");
let txtUserName = document.getElementById("userName");
let txtPassword = document.getElementById("password");
let btnLogIn=document.getElementById("login");

// login form placeholder move
txtUserName.addEventListener("focus",function () {
    lblUserName.classList.add("small");
})
txtPassword.addEventListener("focus", function () {
    lblPassword.classList.add("small");
})
txtUserName.addEventListener("blur",function () {
    if(txtUserName.value==='')
        lblUserName.classList.remove("small");
})
txtPassword.addEventListener("blur",function () {
    if(txtPassword.value==='')
        lblPassword.classList.remove("small");
})

//validate userName
function validateUserName(){
    let typedValue=txtUserName.value;
    if(typedValue.length===3){
        if(!(isNaN(typedValue[0]) && isNaN(typedValue[1]) && isNaN(typedValue[2]))){ //can solve using de-morgen law
            txtUserName.style.border="3px solid red";
            txtUserName.style.backgroundColor="#efadad";
            btnLogIn.disabled=true;
        }else{
            txtUserName.style.border="3px solid gray";
            txtUserName.style.backgroundColor="#ffffff";
            btnLogIn.disabled=false;
        }
    }else if(typedValue.length===9){
        console.log(typedValue[4],typedValue[5]);
        if((!isNaN(typedValue[4]) | !isNaN(typedValue[5]) | (typedValue[5]!=='s' | !(typedValue[4]==='c' | typedValue[4]==='i')))){
            txtUserName.style.border="3px solid red";
            txtUserName.style.backgroundColor="#efadad";
            btnLogIn.disabled=true;
        }else{
            txtUserName.style.border="3px solid gray";
            txtUserName.style.backgroundColor="#ffffff";
            btnLogIn.disabled=false;
        }
    }else{
        txtUserName.style.border="3px solid red";
        txtUserName.style.backgroundColor="#efadad";
        btnLogIn.disabled=true;
    }
}

//this function for call when login errors
function displayError(){
    txtUserName.style.border="3px solid red";
    txtUserName.style.backgroundColor="#efadad";
    txtPassword.style.border="3px solid red";
    txtPassword.style.backgroundColor="#efadad";
    txtPassword.style.animation="shake 0.3s";
    txtUserName.style.animation="shake 0.3s";
    setTimeout(function(){
        txtUserName.style.border="3px solid gray";
        txtUserName.style.backgroundColor="#ffffff";
        txtPassword.style.border="3px solid gray";
        txtPassword.style.backgroundColor="#ffffff";
    }, 3000);
}

