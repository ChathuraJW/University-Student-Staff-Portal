// login form placeholder move
var lblUserName= document.getElementById("labelUserName");
var lblPassword= document.getElementById("labelPassword");
var txtUserName=document.getElementById("userName");
var txtPassword=document.getElementById("password");

txtUserName.addEventListener("focus",function () {
    lblUserName.classList.add("small");
})
txtPassword.addEventListener("focus", function () {
    lblPassword.classList.add("small");
})
txtUserName.addEventListener("blur",function () {
    if(txtUserName.value=='')
        lblUserName.classList.remove("small");
})
txtPassword.addEventListener("blur",function () {
    if(txtPassword.value=='')
        lblPassword.classList.remove("small");
})