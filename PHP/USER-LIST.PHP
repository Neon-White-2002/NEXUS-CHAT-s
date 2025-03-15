<?php
    session_start();

    @include_once 'CONFIG.PHP';

    $outgoing_id = $_SESSION['UNIQUE-ID'];

    $sql = mysqli_query($connection, "SELECT * FROM `nexus_user` WHERE NOT UNIQUE_ID = {$outgoing_id}");
    $output = "";

    if (mysqli_num_rows($sql) === 1) 
    {
        $output .= "'Sorry No, User's Avaiable To CHAT !'";
    } 
    elseif (mysqli_num_rows($sql) > 0) 
    {
        @include 'DATA.PHP';
    }

    // USER-DATA:
    echo $output;
?>