const loginForm=document.getElementById("loginForm");
const registerForm=document.getElementById("registerForm");
const showLogin=document.getElementById("showLogin");
const showRegister=document.getElementById("showRegister");

showRegister.addEventListener("click",()=>{
    loginForm.classList.add("hidden");
    registerForm.classList.remove("hidden");
})

showLogin.addEventListener("click",()=>{
    registerForm.classList.add("hidden");
    loginForm.classList.remove("hidden");
})