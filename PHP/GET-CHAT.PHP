<?php
    session_start();
    
    if(isset($_SESSION["UNIQUE-ID"]))
    {
        @include "CONFIG.PHP";

        $out_going_id = mysqli_real_escape_string($connection, $_POST["out-going_id"]);
        $in_coming_id = mysqli_real_escape_string($connection, $_POST["in-coming_id"]);

        $output = "";

        // CHAT'S :
        $sql = "SELECT * FROM `messages` 
                LEFT JOIN nexus_user ON nexus_user.UNIQUE_ID = messages.OUT_GOING_MSG_ID
                WHERE (OUT_GOING_MSG_ID = {$out_going_id} AND IN_COMING_MSG_ID = {$in_coming_id})
                OR (OUT_GOING_MSG_ID = {$in_coming_id} AND IN_COMING_MSG_ID = {$out_going_id}) ORDER BY MSG_ID"
        ;

        $query = mysqli_query($connection, $sql);
        if(mysqli_num_rows($query) > 0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                // SENDER MSG-ID
                if($row["OUT_GOING_MSG_ID"] === $out_going_id)
                {
                    if ($row["PROFILE"] == "") 
                    {
                        $img_profile = "<img src='UPLOAD-PROFILE/PROFILE_PIC.PNG' title=" . $row['USER_NAME'] . ">";
                    } 
                    else 
                    {
                        $img_profile = '<img src="UPLOAD-PROFILE/' . $row['PROFILE'] . '" title=' . $row["USER_NAME"] . '>';
                    }

                    $output .= 
                    '
                        <div class="chat out-going">
                            <div class="details">
                                <p>'.$row["MSG"].'</p>
                            </div>

                            '.$img_profile.'
                        </div>
                    ';
                }
                else
                {
                    // RECEIVER MSG-ID
                    if ($row["PROFILE"] == "") 
                    {
                        $img_profile = "<img src='UPLOAD-PROFILE/PROFILE_PIC.PNG' title=" . $row['USER_NAME'] . ">";
                    } 
                    else 
                    {
                        $img_profile = '<img src="UPLOAD-PROFILE/' . $row['PROFILE'] . '" title=' . $row["USER_NAME"] . '>';
                    }

                    $output .=
                    '
                        <div class="chat in-going">
                            '.$img_profile.'

                            <div class="details">
                                <p>'.$row["MSG"].'</p>
                            </div>
                        </div>
                    ';
                }
            }
            // MESSAGE'S :
            echo $output;
        }
    }
    else
    {
        header("location:LOGIN-PAGE.PHP");
    } 
?>