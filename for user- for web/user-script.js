document.addEventListener("DOMContentLoaded", () => {
    const loginBtn = document.getElementById("login-btn");
    const registerBtn = document.getElementById("register-btn");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const switches = document.querySelectorAll(".switch");

    // Toggle Forms
    loginBtn.addEventListener("click", () => {
        loginForm.classList.add("active");
        registerForm.classList.remove("active");
        loginBtn.classList.add("active");
        registerBtn.classList.remove("active");
    });

    registerBtn.addEventListener("click", () => {
        registerForm.classList.add("active");
        loginForm.classList.remove("active");
        registerBtn.classList.add("active");
        loginBtn.classList.remove("active");
    });

    switches.forEach(switchElement => {
        switchElement.addEventListener("click", () => {
            loginForm.classList.toggle("active");
            registerForm.classList.toggle("active");
            loginBtn.classList.toggle("active");
            registerBtn.classList.toggle("active");
        });
    });
});
