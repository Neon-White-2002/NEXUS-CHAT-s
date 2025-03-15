<?php
    @include_once 'CONFIG.PHP';
    
    while ($row = mysqli_fetch_assoc($sql)) 
    {
        $sql_two = "SELECT * FROM messages WHERE (IN_COMING_MSG_ID = {$row['UNIQUE_ID']}
                    OR OUT_GOING_MSG_ID = {$row['UNIQUE_ID']}) AND (OUT_GOING_MSG_ID = {$outgoing_id}
                    OR IN_COMING_MSG_ID = {$outgoing_id}) ORDER BY MSG_ID DESC";

        $query_two = mysqli_query($connection, $sql_two);
        $row_two = mysqli_fetch_assoc($query_two);

        if(mysqli_num_rows($query_two) > 0)
        {
            $result = $row_two["MSG"];
        }
        else
        {
            $result = "No, Message Available... !";
        }

        // TRIMMING THE MESSAGE :
        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'.....' : $msg = $result;

        // YOU : FOR END-USER :
        ($outgoing_id === $row_two["OUT_GOING_MSG_ID"]) ? $you = "You : " : $you = "";

        // USER-STAUTS (ONLINE OR OFFLINE) : 
        ($row["STATUS"] === "Offline") ? $offline = "offline" : $offline = "";

        // PROFILE-IMAGES :
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
                    <a href="CHAT-PAGE.PHP?USER_ID='.$row["UNIQUE_ID"].'">
                        <div class="content">
                            ' . $img_profile . '

                            <div class="details">
                                <span>' . $row["USER_NAME"] . '</span>
                                <p>'.$you.$msg.'</p>
                            </div>
                        </div>

                        <div class="status-dot '.$offline.'"><i class="fa-solid fa-circle"></i></div>
                    </a>
                ';
    }
?>