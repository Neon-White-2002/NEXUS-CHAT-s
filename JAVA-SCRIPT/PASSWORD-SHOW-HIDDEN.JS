// JAVA-SCRIPT:

const password = document.querySelector(".form-container input[type='password']");
const toggle_btn = document.querySelector(".form-container .input-container .fa-eye");

toggle_btn.addEventListener("click", () =>
{
    if(password.type === "password")
    {
        password.type = "text";
        toggle_btn.classList.replace("fa-eye", "fa-eye-slash");
    }
    else
    {
        password.type = "password";
        toggle_btn.classList.replace("fa-eye-slash", "fa-eye");
    }
});