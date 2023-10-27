// const showPassword = document.querySelector("#btnShowPass");
// const passWord = document.querySelector("#password");
// //const togglePassword = document.querySelector("#togglePassword");
// showPassword.addEventListener('click', function(){
//     if(passWord.type==="password"){
//         passWord.type = "text";

//     }else{
//         passWord.type= 'password';
//     }
// });'

'use strict'
const togglePassword = document.querySelector("#togglePassword");
//const togglePasswordConfirm = document.querySelector("#togglePasswordConfirm");
const password = document.querySelector("#password");
//const password_confirmation = document.querySelector("#password_confirmation");

togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    // toggle the icon
    this.classList.toggle("fa-eye");
});

