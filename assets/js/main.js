// login form placeholder move
let lblUserName = document.getElementById("labelUserName");
let lblPassword = document.getElementById("labelPassword");
let txtUserName = document.getElementById("userName");
let txtPassword = document.getElementById("password");

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