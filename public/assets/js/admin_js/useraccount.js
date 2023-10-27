document.addEventListener("DOMContentLoaded", function() {
    // Your JavaScript code here
    const togglePasswordConfirm = document.getElementById("togglePasswordConfirm");
    const password_confirmation = document.getElementById("password_confirmation");

    togglePasswordConfirm.addEventListener("click", function () {
        const type = password_confirmation.getAttribute("type") === "password" ? "text" : "password";
        password_confirmation.setAttribute("type", type);
        this.classList.toggle("fa-eye");
    });
});
