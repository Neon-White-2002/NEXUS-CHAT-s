<?php
    session_start();
    
    if(isset($_SESSION["UNIQUE-ID"]))
    {
        @include "CONFIG.PHP";

        $out_going_id = mysqli_real_escape_string($connection, $_POST["out-going_id"]);
        $in_coming_id = mysqli_real_escape_string($connection, $_POST["in-coming_id"]);
        $message = mysqli_real_escape_string($connection, $_POST["message"]);

        // MESSAGE-CODE :
        if(!empty($message))
        {
            $sql = mysqli_query($connection, "INSERT INTO messages(IN_COMING_MSG_ID, OUT_GOING_MSG_ID, MSG) 
                                            VALUES ({$in_coming_id}, {$out_going_id}, '{$message}');") or die();
        }
    }
    else
    {
        header("location:LOGIN-PAGE.PHP");
    } 
?>