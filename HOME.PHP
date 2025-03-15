<?php
    @include_once 'PHP/CONFIG.PHP';

    session_start();

    $unique_id = $_SESSION["UNIQUE-ID"];
    $message = "";

    if(!isset($unique_id))
    {
        header("location:LOGIN-PAGE.PHP");
    }

    if(isset($_GET['logout']))
    {
        unset($unique_id);
        session_destroy();
        header("location:LOGIN-PAGE.PHP");
    }

    if(isset($_FILES["profile-pic"]["name"]))
    {
        $profile_pic = $_FILES["profile-pic"]["name"];
        $temp_profile_pic = $_FILES["profile-pic"]["tmp_name"];
        $upload_profile = "UPLOAD-PROFILE/".$profile_pic;

        // UPDATE - QUERY:
        $update_pic = mysqli_query($connection, "UPDATE `nexus_user` SET PROFILE = '{$profile_pic}' WHERE UNIQUE_ID = '{$unique_id}'");

        if($profile_pic == "")
        {
            $message = "update-not";
        }
        else
        {
            if($update_pic == true)
            {
                move_uploaded_file($temp_profile_pic, $upload_profile);
                $message = "update-done";
            }
            else
            {
                $message = "update-not";
            }
        }
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

        <!-- ERROR-MESSAGE -->
        <?php
            if($message == "update-not")
            {
                echo 
                "
                <style>
                    .message-container
                    {
                        display: flex;
                    }

                    .message-container .registration-not-message-box
                    {
                        display: flex;
                    }
                </style>  
                ";
            }
            elseif($message == "update-done")
            {
                echo 
                "
                <style>
                    .message-container
                    {
                        display: flex;
                    }

                    .message-container .registration-done-message-box
                    {
                        display: flex;
                    }
                </style>
                ";
            }
        ?>

         <!-- CLOSE (MESSAGE-BOX) -->
         <script>
            function close_message_box(event)
            {
                if(event == "update-not")
                {
                    document.getElementById("message-container").style.display = "none";
                    window.location.href = "HOME.PHP";
                }

                if(event == "update-done")
                {
                    document.getElementById("message-container").style.display = "none";
                    window.location.href = "HOME.PHP";
                }
            }
        </script>

        <!-- PROFILE-PIC -->
        <script>
            function profile_button()
            {
                document.getElementById("profile-pic").click();

                document.getElementById("profile-pic").onchange = () =>
                {
                    document.getElementById("form").submit();
                    console.log(`FILE-NAME : ${document.getElementById("profile-pic").files[0]}`);
                }
            }
        </script>

        <!-- PAGE-LOGO -->
        <link rel="icon" href="IMAGES/page_logo.png" type="img/icon">

        <!-- FONT-AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    </head>

    <body>
        <div class="conatiner">
            <div class="card">
                <div class="header">
                    <div class="menu">
                        <i class="fa fa-bars"></i>
                    </div>

                    <a href="" class="mail">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </a>

                    <div class="main">
                        <div class="image">
                            <div class="image-view">
                               <form action="" id="form" method="post" enctype="multipart/form-data">
                                    <?php 
                                        $select_data = mysqli_query($connection, "SELECT * FROM `nexus_user` WHERE UNIQUE_ID = '{$unique_id}'") or die("QUERY - FAILED");

                                        if(mysqli_num_rows($select_data) > 0)
                                        {
                                            $data = mysqli_fetch_assoc($select_data);

                                            if($data["PROFILE"] == "")
                                            {
                                                echo "<img src='UPLOAD-PROFILE/PROFILE_PIC.PNG' title=".$data['USER_NAME'].">";
                                            }
                                            else
                                            {
                                                echo '<img src="UPLOAD-PROFILE/'.$data['PROFILE'].'" title='.$data["USER_NAME"].'>';
                                            }
                                        }
                                    ?>

                                    <div class="camera-icon" id="profile-button" onclick="profile_button()">
                                        <i class="fas fa-camera"></i>
                                    </div>

                                    <input type="file" name="profile-pic" id="profile-pic" style="display: none;">
                               </form>
                            </div>
                        </div>

                        <h3 class="name" name="user-name">
                            <?php 
                                echo '@'.$data["USER_NAME"];
                            ?>
                        </h3>
                        <h5 class="sub-name" name="user-sub-name">
                            <?php 
                                echo "'".$data["EMAIL"]."'";
                            ?>
                        </h5>
                    </div>
                </div>

                <div class="content">
                    <div class="left">
                        <div class="about-conatiner">
                            <h3 class="title">
                                <i class="fa-solid fa-address-card"></i>
                                <label name="job-type">
                                    <?php 
                                        echo $data["JOB"];
                                    ?>
                                </label>
                            </h3>

                            <p class="text">
                                <?php 
                                    if($data["JOB"] == "Web-Developer")
                                    {
                                        echo 
                                        "
                                        Web development is the work involved in developing a website for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.
                                        ";
                                    }
                                    elseif($data["JOB"] == "App-Developer")
                                    {
                                        echo 
                                        "
                                        Mobile application development is the process of making software for smartphones, tablets and digital assistants, most commonly for the Android and iOS operating systems. The software can be preinstalled on the device, downloaded from a mobile app store or accessed through a mobile web browser.
                                        ";
                                    }
                                    elseif($data["JOB"] == "Software-Developer")
                                    {
                                        echo
                                        "
                                        Software development is the process programmers use to build computer programs. The process, also known as the Software Development Life Cycle (SDLC), includes several phases that provide a method for building products that meet technical specifications and user requirements.
                                        ";
                                    }
                                ?>
                            </p>
                        </div>

                        <div class="icons-conatiner">
                            <a href="" class="icons">
                                <i class="fa-brands fa-google"></i>
                            </a>

                            <a href="" class="icons">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>

                            <a href="" class="icons">
                                <i class="fa-brands fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>

                        <div class="button-wrap">
                            <div class="follow-wrap">
                                <a href="HOME.PHP?logout=<?php echo $data["USER_NAME"]; ?>">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    Logout
                                </a>
                            </div>

                            <div class="share-wrap">
                                <a href="" class="share">
                                    Share
                                    <i class="fa-solid fa-share"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="right">
                        <div class="user-info-number">
                            <h3 class="number">90</h3>
                            <h3 class="number-text">Post's</h3>
                        </div>

                        <div class="user-info-number">
                            <h3 class="number">5.5M</h3>
                            <h3 class="number-text">Following's</h3>
                        </div>

                        <div class="user-info-number">
                            <h3 class="number">100M</h3>
                            <h3 class="number-text">Follower's</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="message-container" id="message-container">
            <div class="registration-not-message-box" id="registration-not-message-box">
                <i class="fa-solid fa-x"></i>

                <p>Profile Not-Updated !</p>

                <span>'Sorry, <label>'@<?php echo $data["USER_NAME"]; ?>'</label>, can't upload pic !'.</span>

                <button id="close-button" onclick="close_message_box('update-not')">OK</button>
            </div>

            <div class="registration-done-message-box" id="registration-done-message-box">
                <i class="fa-solid fa-check"></i>

                <p>Profile Update Successfully !</p>

                <span>"Congrat's, <label>'@<?php echo $data["USER_NAME"]; ?>' - <label>'Pic - Updated'</label> !"</span>

                <button id="close-button" onclick="close_message_box('update-done')">OK</button>
            </div>
        </div>

        <div class="chat-app-container" id="chat-app-container" title="Welcome, to 'NEXUS-CHAT !'">
            <i class="fa-solid fa-comments" id="chat-icon"></i>
        </div>

        <!-- JAVA-SCRIPT -->
        <script src="JAVA-SCRIPT/CHAT-NAVIGATION.JS"></script>
    </body>
</html>