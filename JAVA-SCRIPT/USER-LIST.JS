// JAVA-SCRIPT (AJAX):

const search_bar = document.querySelector(".search input");
const search_button = document.querySelector(".search button");

search_bar.addEventListener("keyup", ()=>
{
    let search_term = search_bar.value;
    if(search_term != "")
    {
        search_bar.classList.add("active");
    }
    else
    {
        search_bar.classList.remove("active");
    }

    // AJAX-CODE:
    let xhr = new XMLHttpRequest(); // XML-OBJECT
    xhr.open("POST", "PHP/SEARCH.PHP", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                user_list.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("Search_Term=" + search_term);
});

// USER-DATA-LIST
const user_list = document.querySelector(".users .users-list");

// SET-INTERVAL-FUNCTION (WILL UPDATE, IN 500MS):
setInterval(()=>
{
    // AJAX-CODE:
    let xhr = new XMLHttpRequest(); // XML-OBJECT
    xhr.open("GET", "PHP/USER-LIST.PHP", true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                if(!search_bar.classList.contains("active"))
                {
                    user_list.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500);