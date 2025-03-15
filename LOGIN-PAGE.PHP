<?php
    session_start();

    if(isset($_SESSION["UNIQUE-ID"]))
    {
        // USER, ALREADY LOGGED-IN :
        header("location:../USER-CHAT-PAGE.PHP");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Welcome, to 'NEXUS-CHAT' !</title>

        <!-- STYLE-SHEET -->
        <link rel="stylesheet" href="STYLE.CSS">

        <!-- PAGE-LOGO -->
        <link rel="icon" href="IMAGES/page_logo.png" type="img/icon">

        <!-- FONT-AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    </head>

    <body>
        <form action="" method="post" class="form-container" enctype="multipart/form-data">
            <div class="page-text">
                <i class="fas fa-user-check"></i>
                <span>'SIGN-IN'</span>
            </div>

            <div class="input-container">
                <i class="fa fa-user-pen" aria-hidden="true"></i>
                <input type="text" name="user-name" id="" placeholder="USER-NAME" required>
            </div>

            <div class="input-container">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input type="email" name="email" id="" placeholder="EMAIL-ADDRESS" required>
            </div>

            <div class="input-container">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="password" id="" placeholder="PASSWORD" required>
                <i class="fa-solid fa-eye"></i>
            </div>

            <button type="submit" name="submit-button">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <span>LOGIN</span>
            </button>
        </form>

        <div class="right-panel-view">
            <div class="content">
                <h3>NEW HERE ?</h3>
                <p>Web designing is the process of planning, conceptualizing, and implementing the plan for designing a website in a way that is functional and offers a good user experience. User experience is central to the web designing process. Websites have an array of elements presented in ways that make them easy to navigate. All these factors, when combined, decide how well the website is designed.</p>
                <a href="REGISTER-PAGE.PHP">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> 
                    SIGN-UP
                </a>
            </div>

            <div class="content-image">
                <img src="IMAGES/log.svg" alt="">
            </div>
        </div>

        <div class="message-container" id="message-container">
            <div class="password-message-box" id="password-message-box">
                <i class="fa-solid fa-exclamation"></i>

                <p>#Warning !</p>

                <span>"Plz, provide some vaild data".</span>

                <button id="close-button" onclick="close_message_container('data-error')">OK</button>
            </div>

            <div class="registration-not-message-box" id="registration-not-message-box">
                <i class="fa-solid fa-x"></i>

                <p>#Login Un-Successfully !</p>

                <span>"Some-thing mit gone wrong, plz try again".</span>

                <button id="close-button"  onclick="close_message_container('login-error')">OK</button>
            </div>

            <div class="registration-done-message-box" id="registration-done-message-box">
                <i class="fa-solid fa-check"></i>

                <p>#Login Successfully !</p>

                <span>"Welcome to, '#NEXUS-CHAT'S' !"</span>

                <button id="close-button"  onclick="close_message_container('login-done')">OK</button>
            </div>
        </div>

        <!-- JAVA-SCRIPT -->
        <script src="JAVA-SCRIPT/PASSWORD-SHOW-HIDDEN.JS"></script>
        <script src="JAVA-SCRIPT/LOGIN.JS"></script>
    </body>
</html>