// JAVA-SCRIPT (AJAX) :

const form = document.querySelector(".user-msg-area");
const input_field = form.querySelector(".input-field");
const send_button = form.querySelector("button");

const chat_box = document.querySelector(".chat-box");

form.onsubmit = (e) =>
{
    e.preventDefault();
}

// SEND-BUTTON :
send_button.addEventListener("click", () =>
{
    // AJAX-CODE:
    let xhr = new XMLHttpRequest(); // XML-OBJECT
    xhr.open("POST", "PHP/INSERT-CHAT.PHP", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                input_field.value = ""; // BLANK, INPUT-FIELD 
                scroll_to_bottom();
            }
        }
    }

    // FORM-DATA THROUGH (AJAX):
    let form_data = new FormData(form); // NEW-FORM-DATA OBJECT
    xhr.send(form_data);
});

// SCROLL-FUNCTION :
chat_box.onmouseenter = () =>
{
    chat_box.classList.add("active");
}

chat_box.onmouseleave = () =>
{
    chat_box.classList.remove("active");
}

// SET-INTERVAL-FUNCTION (WILL UPDATE, IN 500MS):
setInterval(()=>
{
    // AJAX-CODE:
    let xhr = new XMLHttpRequest(); // XML-OBJECT
    xhr.open("POST", "PHP/GET-CHAT.PHP", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                chat_box.innerHTML = data;
                
                if(!chat_box.classList.contains("active"))
                {
                    scroll_to_bottom();
                }
            }
        }
    }

    // FORM-DATA :
    let form_data = new FormData(form); // NEW-FORM-DATA OBJECT
    xhr.send(form_data);
}, 500);

// FUNCTION SCROLL-DOWN (CURRENT-CHAT'S):
function scroll_to_bottom()
{
    chat_box.scrollTop = chat_box.scrollHeight;
}