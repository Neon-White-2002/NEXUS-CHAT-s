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
                <section class="users">
                    <header>
                        <!-- PHP-CODE -->
                        <?php 
                            @include_once 'PHP/CONFIG.PHP';

                            $sql = mysqli_query($connection, "SELECT * FROM `nexus_user` WHERE UNIQUE_ID = '{$_SESSION["UNIQUE-ID"]}'");
                            if(mysqli_num_rows($sql) > 0)
                            {
                                $row = mysqli_fetch_assoc($sql);
                            }
                        ?>

                        <div class="content">
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
                            <div class="details">
                                <span> <?php echo $row["USER_NAME"]; ?> </span>
                                <p> <?php echo $row["STATUS"]; ?> </p>
                            </div>
                        </div>

                        <a href="PHP/LOGOUT.PHP?LOGOUT_ID=<?php echo $row["UNIQUE_ID"]; ?>" class="logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            LOGOUT
                        </a>
                    </header>

                    <div class="search">
                        <input type="text" name="" id="" placeholder="Welcome to, NEXUS-CHAT...">
                        <button>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>

                    <div class="users-list">
                        <!-- <a href="#">
                            <div class="content">
                                <img src="PROFILE_IMAGES/PIC_ONE.PNG" alt="">

                                <div class="details">
                                    <span>Neekunj Chauhan</span>
                                    <p>Hello, & Welcome to 'NEXUS-CHAT' !</p>
                                </div>
                            </div>

                            <div class="status-dot"><i class="fa-solid fa-circle"></i></div>
                        </a> -->
                    </div>
                </section>
            </div>
        </div>

        <!-- JAVA-SCRIPT -->
        <script src="JAVA-SCRIPT/USER-LIST.JS"></script>
    </body>
</html>