<?php 
    session_start();

    @include_once 'CONFIG.PHP';

    $outgoing_id = $_SESSION['UNIQUE-ID'];

    $search_term = mysqli_real_escape_string($connection, $_POST['Search_Term']);
    $output = "";

    $sql = mysqli_query($connection, "SELECT * FROM `nexus_user` WHERE NOT UNIQUE_ID = {$outgoing_id} AND (USER_NAME LIKE '%{$search_term}%')");
    if(mysqli_num_rows($sql) > 0)
    {
        @include 'DATA.PHP';
    }
    else
    {
        $output .= '<b>"No, User Found, Try Again. !"</b>';
    }

    // USER-SEARCH-DATA:
    echo $output;
?>