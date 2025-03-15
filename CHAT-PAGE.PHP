<?php
    session_start();

    if(!isset($_SESSION["UNIQUE-ID"]))
    {
        header("location:LOGIN-PAGE.PHP");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome, to 'NEXUS-CHAT's' !</title>

        <!-- STYLE-SHEET -->
        <link rel="stylesheet" href="STYLE.CSS">

        <!-- PAGE-LOGO -->
        <link rel="icon" href="IMAGES/page_logo.png" type="img/icon">

        <!-- FONT-AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    </head>

    <body>
        <div class="chat-container">
            <div class="wrapper">
                <section class="chat-area">
                    <header>
                        <!-- PHP-CODE -->
                        <?php 
                            @include_once 'PHP/CONFIG.PHP';

                            $user_id = mysqli_real_escape_string($connection, $_GET["USER_ID"]);
                            $sql = mysqli_query($connection, "SELECT * FROM `nexus_user` WHERE UNIQUE_ID = '{$user_id}'");
                            if(mysqli_num_rows($sql) > 0)
                            {
                                $row = mysqli_fetch_assoc($sql);
                            }
                        ?>

                        <a href="USER-CHAT-PAGE.PHP" class="back-icon">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>

                        <?php
                            // PROFILE-PIC:
                            if($row["PROFILE"] === "")
                            {
                                echo "<img src='UPLOAD-PROFILE/PROFILE_PIC.PNG' title=".$row['USER_NAME'].">";
                            }
                            else
                            {
                                echo '<img src="UPLOAD-PROFILE/'.$row['PROFILE'].'" title='.$row["USER_NAME"].'>';
                            }
                        ?>

                        <?php
                            // USER-STATUS :
                            if($row["STATUS"] === "Online")
                            {
                                echo '<div class="user-status-online"></div>';
                            } 
                            else
                            {
                                echo '<div class="user-status-offline"></div>';
                            }
                        ?>

                        <div class="details">
                            <span> <?php echo $row["USER_NAME"]; ?> </span>
                            <p> <?php echo $row["STATUS"]; ?> </p>
                        </div>
                    </header>

                    <div class="chat-box">
                        <!-- <div class="chat out-going">
                            <div class="details">
                                <p>Hello, & Welcome to 'NEXUS-CHAT', Build by Quamtum-Tech !</p>
                            </div>
                        </div>

                        <div class="chat in-going">
                            <img src="PROFILE_IMAGES/PIC_ONE.PNG" alt="">

                            <div class="details">
                                <p>Hello, & Welcome to 'NEXUS-CHAT', Build by Quamtum-Tech !</p>
                            </div>
                        </div> -->
                    </div>

                    <form action="#" class="user-msg-area" method="post" autocomplete="off">
                        <div class="emoji-container">
                            <i class="fa-regular fa-face-smile"></i>
                        </div>

                        <input type="text" name="out-going_id" id="" value="<?php echo $_SESSION["UNIQUE-ID"]; ?>" hidden>
                        <input type="text" name="in-coming_id" id="" value="<?php echo $user_id; ?>" hidden>

                        <input type="text" class="input-field" name="message" id="" placeholder="Message, NEXUS-CHAT..."> 

                        <button>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </section>
            </div>
        </div>

        <!-- JAVA-SCRIPT -->
        <script src="JAVA-SCRIPT/CHATS.JS"></script>
    </body>
</html>