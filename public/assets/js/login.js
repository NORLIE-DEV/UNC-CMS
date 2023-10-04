const showPassword = document.querySelector("#showpassword");
const passWord = document.querySelector("#password");

showPassword.addEventListener('click', function(){
    if(passWord.type==="password"){
        passWord.type = "text";
    }else{
        passWord.type= 'password';
    }
});
