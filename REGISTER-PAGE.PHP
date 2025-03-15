<?php
    session_start();

    if(isset($_SESSION["UNIQUE-ID"]))
    {
        // USER, ALREADY LOGGED-IN :
        header("location:HOME.PHP");
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
        <form action="#" method="post" class="form-container" enctype="multipart/form-data">
            <div class="page-text">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <span>'SIGN-UP'</span>
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
                <input type="password" name="password" id="password" placeholder="PASSWORD" required>
                <i class="fa-solid fa-eye"></i>
            </div>

            <div class="input-container">
                <i class="fa fa-key" aria-hidden="true"></i>
                <input type="text" name="confirm-password" id="confirm-password" placeholder="CONFIRM-PASSWORD" required>
            </div>

            <div class="input-container">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <input type="text" name="job" id="" placeholder="PROFESSION" required>
            </div>

            <button type="submit" name="submit-button" id="submit-button">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <span>REGISTER</span>
            </button>
        </form>

        <div class="right-panel-view">
            <div class="content">
                <h3>ONE OF USE ?</h3>
                <p>A web developer is a programmer who develops World Wide Web applications using a client-server model. The applications typically use HTML, CSS and JavaScript in the client, PHP, ASP.NET (C#), Python, Node.js, Go or Java in the server, and http for communications between client and server. A web developer may specialize in client-side applications (front-end developer), server-side applications (back-end developer), or both (full-stack developer).</p>
                <a href="LOGIN-PAGE.PHP"> 
                    <i class="fas fa-user-check"></i> 
                    SIGN-IN
                </a>
            </div>

            <div class="content-image">
                <img src="IMAGES/register.svg" alt="">
            </div>
        </div>

        <div class="message-container" id="message-container">
            <div class="password-message-box" id="password-message-box">
                <i class="fa-solid fa-exclamation"></i>

                <p>Warning !</p>

                <span>"You'r Password Don't Match, Plz try again".</span>

                <button id="close-button" onclick="close_message_container('password-error')">OK</button>
            </div>

            <div class="registration-not-message-box" id="registration-not-message-box">
                <i class="fa-solid fa-x"></i>

                <p>Registration Un-Successfully !</p>

                <span>"Some-thing mit gone wrong, plz try again".</span>

                <button id="close-button" onclick="close_message_container('registration-error')">OK</button>
            </div>

            <div class="registration-done-message-box" id="registration-done-message-box">
                <i class="fa-solid fa-check"></i>

                <p>Registration Successfully !</p>

                <span>"Welcome to, '#QAUMTUM-TECH' !"</span>

                <button id="close-button" onclick="close_message_container('registration-done')">OK</button>
            </div>
        </div>

        <!-- JAVA-SCRIPT -->
        <script src="JAVA-SCRIPT/PASSWORD-SHOW-HIDDEN.JS"></script>
        <script src="JAVA-SCRIPT/REGISTER.JS"></script>
    </body>
</html>