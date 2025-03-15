// JAVA-SCRIPT:

const chat_app = document.getElementById("chat-app-container");
chat_app.addEventListener("click", ()=>
{
    window.location.href = "USER-CHAT-PAGE.PHP";
});

const chat_icon = document.getElementById("chat-icon");
chat_icon.addEventListener("mouseover", ()=>
{
    chat_icon.classList.add("fa-bounce");
});

chat_icon.addEventListener("mouseout", ()=>
{
    chat_icon.classList.remove("fa-bounce");
});