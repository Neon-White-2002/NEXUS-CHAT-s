<?php
    session_start();

    // CHECK WEATHER (USER-LOGGED-IN OR NOT) :
    if(isset($_SESSION["UNIQUE-ID"]))
    {
        @include "CONFIG.PHP";

        $logout_id = mysqli_real_escape_string($connection, $_GET["LOGOUT_ID"]);

        // LOGGED-OUT (ID) :
        if(isset($logout_id))
        {
            $stauts = "Offline";
            $sql = mysqli_query($connection, "UPDATE `nexus_user` SET STATUS = '{$stauts}' WHERE UNIQUE_ID = {$logout_id}");

            if($sql)
            {
                session_unset();
                session_destroy();
                header("location:../LOGIN-PAGE.PHP");
            }
        }
        else
        {
            header("location:../USER-CHAT-PAGE.PHP");
        }
    }
    else
    {
        header("location:../LOGIN-PAGE.PHP");
    }
?>