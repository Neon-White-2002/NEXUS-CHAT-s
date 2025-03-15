// JAVA-SCRIPT (AJAX):

const form = document.querySelector(".form-container");
const submit_btn = form.querySelector("button");

const message_container = document.getElementById("message-container");
const password_error = message_container.querySelector(".password-message-box");
const registration_error = message_container.querySelector(".registration-not-message-box");
const registration_done = message_container.querySelector(".registration-done-message-box");

form.onsubmit = (e) =>
{
    e.preventDefault();
}

submit_btn.addEventListener("click", () =>
{
    // AJAX-CODE:
    let xhr = new XMLHttpRequest(); // XML-OBJECT
    xhr.open("POST", "PHP/REGISTER.PHP", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                if(data === "REGISTRATION-ERROR")
                {
                    message_container.style.display = "flex";
                    registration_error.style.display = "flex";
                }
                else if(data === "REGISTRATION-DONE")
                {
                    message_container.style.display = "flex";
                    registration_done.style.display = "flex";
                }
                else if(data === "PASSWORD-ERROR")
                {
                    message_container.style.display = "flex";
                    password_error.style.display = "flex";
                }
                else if(data === "DATA-ERROR")
                {
                    let error_msg = password_error.querySelector("span");
                    error_msg.innerHTML = '"Plz, provide vaild data !"';

                    message_container.style.display = "flex";
                    password_error.style.display = "flex";
                }
                else if(data === "VAILD-EMAIL-ERROR")
                {
                    let error_msg = registration_error.querySelector("span");
                    error_msg.innerHTML = '"Plz, provide vaild E-mail Address !"';
                    
                    message_container.style.display = "flex";
                    registration_error.style.display = "flex";
                }
                else if(data === "USER-EXIST-ERROR")
                {
                    let error_msg = registration_error.querySelector("span");
                    error_msg.innerHTML = '"Sorry, User Already Exist, Try Again !"';
                    
                    message_container.style.display = "flex";
                    registration_error.style.display = "flex";
                }
            }
        }
    }

    // FORM-DATA THROUGH (AJAX):
    let form_data = new FormData(form); // NEW-FORM-DATA OBJECT
    xhr.send(form_data);
});

// NAVIGATION-BUTTON:
function close_message_container(msg)
{
    if(msg === "password-error")
    {
        message_container.style.display = "none";
        password_error.style.display = "none";
        window.location.href = "REGISTER-PAGE.PHP";
    }
    else if(msg === "registration-error")
    {
        message_container.style.display = "none";
        registration_error.style.display = "none";
        window.location.href = "REGISTER-PAGE.PHP";
    }
    else if(msg === "registration-done")
    {
        message_container.style.display = "none";
        registration_done.style.display = "none";
        window.location.href = "HOME.PHP";
    }
}